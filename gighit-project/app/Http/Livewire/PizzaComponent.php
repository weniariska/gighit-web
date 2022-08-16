<?php

namespace App\Http\Livewire;

use App\Models\Pizza;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class PizzaComponent extends Component
{
    public $pizzas;

    public function render()
    {
        $this->pizzas = Pizza::all();
        return view('livewire.pizza-component');
    }

    public function addToCart($name, $price, $image)
    {
        Cart::add($name, $image, 1, $price);
        session()->flash('success', 'Item added in cart');
        return redirect()->to('/pizza');
    }
}
