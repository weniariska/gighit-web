<?php

namespace App\Http\Livewire;

use App\Models\Starter;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class StarterComponent extends Component
{
    public $starters;

    public function render()
    {
        $this->starters = Starter::all();
        return view('livewire.starter-component');
    }

    public function addToCart($name, $price, $image)
    {
        // $imageDir = str_replace('/','//',$image);
        Cart::add($name, $image, 1, $price);
        session()->flash('success', 'Item added in cart');
        return redirect()->to('/starters');
    }
}
