<?php

namespace App\Http\Livewire;

use App\Models\Drink;
use App\Models\Pizza;
use App\Models\Starter;
use App\Models\Transaction;
use App\Models\User;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;

class AdminOrder extends Component
{
    public $pizzas, $drinks, $starters;
    public $adminCart, $adminCartCount, $subtotal;
    public $custName, $email;

    public function render()
    {
        $this->pizzas = Pizza::all();
        $this->drinks = Drink::all();
        $this->starters = Starter::all();
        $this->adminCart = Cart::content();
        $this->adminCartCount = Cart::count();
        $this->subtotal = Cart::total(2, '.', '');;
        return view('livewire.admin-order');
    }

    public function addAdminCart($name, $price) 
    {
        Cart::add($name, $name, 1, $price);
    }

    public function removeCartitem($rowId)
    {
        Cart::remove($rowId);
    }

    public function increastQty($rowId)
    {
        $cartItem = Cart::get($rowId);
        $newQty = $cartItem->qty + 1;
        Cart::update($rowId, $newQty);
    }

    public function decreastQty($rowId)
    {
        $item = Cart::get($rowId);
        $newQty = $item->qty - 1;
        Cart::update($rowId, $newQty);

        if($newQty = 0) {
            $this->removeCartitem($rowId);
        }
    }

    public $receiptChoose="print";
    public function setReceiptChoose($choose) 
    {
        $this->receiptChoose = $choose;
    }

    public function checkout()
    {
        if($this->adminCartCount == 0){
            session()->flash('failed', 'No Items added in cart');
            return redirect()->to('/admin-order');
        }
        else {
            if($this->receiptChoose == "email") {
                $validatedEmail = $this->validate(['email' => 'required|email']);
            }
            // validasi data
            $validatedData = $this->validate([
                'custName' => 'required|min:2|max:255',
                'subtotal' => 'required|min:0.00'
            ]);
            $currentTime = Carbon::now();
            // insert ke database
            Transaction::create([
                'custName' => $validatedData['custName'],
                'subtotal' => $validatedData['subtotal'],
                'orderDate' => $currentTime,
                'user_id' => auth()->user()->id
            ]);
            User::find(1)->update(['saldo' => auth()->user()->saldo+$validatedData['subtotal']]);
            Cart::destroy();

            // redirect ke signin setelah signup
            $receiptItems = ([
                'receiptName' => $validatedData['custName'], 
                'receiptItems' => $this->adminCart,
                'receiptTotal' => $this->subtotal
            ]);
            session()->put('receipt', $receiptItems);
            return redirect()->to('/admin-order');
        }
    }

    public function removeReceipt()
    {
        session()->forget('receipt');
    }
}
