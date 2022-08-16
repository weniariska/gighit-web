<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Transaction;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartComponent extends Component
{
    public $cartItems, $cartCount, $subtotal;
    public $custName;

    public function render()
    {
        $this->custName = auth()->user()->fullName;
        $this->cartItems = Cart::content();
        $this->cartCount = Cart::count();
        $this->subtotal = Cart::total(2, '.', '');
        // $this->receiptItems;
        return view('livewire.cart-component');
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
        $cartItem = Cart::get($rowId);
        $newQty = $cartItem->qty - 1;
        Cart::update($rowId, $newQty);

        if($newQty = 0) {
            $this->removeCartitem($rowId);
        }
    }

    public function checkout()
    {
        // validasi data
        $validatedData = $this->validate([
            'custName' => 'required',
            'subtotal' => 'required|min:0'
        ]);
        $currentTime = Carbon::now();
        // insert ke database

        if(auth()->user()->saldo < $validatedData['subtotal']){
            session()->flash('failed', 'Balance is not enough');
            return redirect()->to('/cart');
        }
        else {
            // insert transaction
            Transaction::create([
                'custName' => $validatedData['custName'],
                'subtotal' => $validatedData['subtotal'],
                'orderDate' => $currentTime,
                'user_id' => auth()->user()->id
            ]);
            // kurangin saldo
            User::where('id', auth()->user()->id)->update(['saldo' => auth()->user()->saldo - $validatedData['subtotal']]);
            // tambahin ke admin
            $ad_saldo = User::find(1)->value('saldo');
            User::find(1)->update(['saldo' => $ad_saldo + $validatedData['subtotal']]);
    
            Cart::destroy();

            // flash message
            $orderId = Transaction::where('user_id', auth()->user()->id)->latest()->get()->first()->id;
            $receiptItems = ([
                'receiptName' => $validatedData['custName'], 
                'receiptItems' => $this->cartItems,
                'receiptTotal' => $this->subtotal,
                'orderId' => $orderId
            ]);
            session()->put('receipt', $receiptItems);
            return redirect()->to('/cart');
        }
    }

    public function removeReceipt()
    {
        session()->forget('receipt');
    }
    
}
