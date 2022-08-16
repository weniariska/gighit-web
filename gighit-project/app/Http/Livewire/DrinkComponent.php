<?php

namespace App\Http\Livewire;

use App\Models\Drink;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class DrinkComponent extends Component
{
    public $drinks;

    public function render()
    {
        $this->drinks = Drink::all();
        return view('livewire.drink-component');
    }

    public function addToCart($name, $price, $image)
    {
        // $imageDir = str_replace('/','//',$image);
        Cart::add($name, $image, 1, $price);
        session()->flash('success', 'Item added in cart');
        return redirect()->to('/drinks');
    }
}
