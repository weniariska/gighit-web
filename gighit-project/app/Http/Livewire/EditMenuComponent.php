<?php

namespace App\Http\Livewire;

use App\Models\Drink;
use App\Models\Pizza;
use App\Models\Starter;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditMenuComponent extends Component
{
    use WithFileUploads;

    public $pizzas, $drinks, $starters;
    public $showOnSide, $model;
    public $modelNew = "Pizza";
    public $editImage = "no";
    public $oldName, $oldImage;

    public function render()
    {
        $this->pizzas = Pizza::all();
        $this->drinks = Drink::all();
        $this->starters = Starter::all();
        return view('livewire.edit-menu-component');
    }

    public $name, $image, $price, $desc;

    public function showThis($prodShow, $model)
    {
        $this->showOnSide = $prodShow;
        $this->model = $model;
        $this->name = $prodShow['name'];
        $this->image = $prodShow['image'];
        $this->price = $prodShow['price'];
        $this->desc = $prodShow['desc'];
        $this->oldName = $prodShow['name'];
        $this->oldImage = $prodShow['image'];
    }

    public function setNull()
    {
        $this->showOnSide = null;
        $this->model = null;
        $this->name = null;
        $this->image = null;
        $this->price = null;
        $this->desc = null;
    }

    public function setModel($modelNew)
    {
        $this->modelNew = $modelNew;
    }

    public function addNew()
    {
        $validatedPrice = $this->validate(['price' => 'required|integer']);
        $validatedDesc = $this->validate(['desc' => 'required|min:2|max:255']);

        if($this->modelNew == 'Pizza')
        {
            $validatedName = $this->validate(['name' => 'required|min:2|max:255|unique:pizzas']);
            if($this->image != "") {
                $validatedImage = $this->validate(['image' => 'image|file|mimes:jpg|max:1024']);
                $this->image->storeAs('images//pizzas', str_replace(' ', '', $this->name.'.jpg'));
                $validatedDataNew = ([
                    'name' => $validatedName['name'],
                    'image' => 'pizzas//'.str_replace(' ', '', $this->name.'.jpg'),
                    'price' => $validatedPrice['price'],
                    'desc' => $validatedDesc['desc']
                ]);
            } else {
                $validatedDataNew = ([
                    'name' => $validatedName['name'],
                    'price' => $validatedPrice['price'],
                    'desc' => $validatedDesc['desc']
                ]);
            }
            Pizza::create($validatedDataNew);
        }
        else if($this->modelNew == 'Drink')
        {
            $validatedName = $this->validate(['name' => 'required|min:2|max:255|unique:drinks']);
            if($this->image != "") {
                $validatedImage = $this->validate(['image' => 'image|file|mimes:jpg|max:1024']);
                $this->image->storeAs('images//drinks', str_replace(' ', '', $this->name.'.jpg'));
                $validatedDataNew = ([
                    'name' => $validatedName['name'],
                    'image' => 'drinks//'.str_replace(' ', '', $this->name.'.jpg'),
                    'price' => $validatedPrice['price'],
                    'desc' => $validatedDesc['desc']
                ]);
            } else {
                $validatedDataNew = ([
                    'name' => $validatedName['name'],
                    'price' => $validatedPrice['price'],
                    'desc' => $validatedDesc['desc']
                ]);
            }
            Drink::create($validatedDataNew);
        }
        else if($this->modelNew == 'Starter')
        {
            $validatedName = $this->validate(['name' => 'required|min:2|max:255|unique:starters']);
            if($this->image != "") {
                $validatedImage = $this->validate(['image' => 'image|file|mimes:jpg|max:1024']);
                $this->image->storeAs('images//starters', str_replace(' ', '', $this->name.'.jpg'));
                $validatedDataNew = ([
                    'name' => $validatedName['name'],
                    'image' => 'starters//'.str_replace(' ', '', $this->name.'.jpg'),
                    'price' => $validatedPrice['price'],
                    'desc' => $validatedDesc['desc']
                ]);
            } else {
                $validatedDataNew = ([
                    'name' => $validatedName['name'],
                    'price' => $validatedPrice['price'],
                    'desc' => $validatedDesc['desc']
                ]);
            }
            Starter::create($validatedDataNew);
        }

        session()->flash('success','Add New Item Succesfully!');
        return redirect()->to('/admin-edit');
    }

    public function setEditImage()
    {
        $this->editImage = "yes";
    }

    public function updateThis()
    {
        $validatedPrice = $this->validate(['price' => 'required|integer']);
        $validatedDesc = $this->validate(['desc' => 'required|min:2|max:255']);

        if($this->model == 'Pizza')
        {
            if($this->name == $this->oldName) {$validatedName = $this->validate((['name' => 'required|min:2|max:255']));} 
            else {$validatedName = $this->validate((['name' => 'required|min:2|max:255|unique:pizzas']));}

            if($this->editImage == "yes") {
                $validatedImage = $this->validate(['image' => 'image|file|mimes:jpg|max:1024']);
                if (Storage::exists('images//'.$this->oldImage)  and $this->oldImage != "pizzas//pizza.jpg") {
                    Storage::delete('images//'.$this->oldImage);
                }
                $this->image->storeAs('images//pizzas', str_replace(' ', '', $this->name.'.jpg'));
                $validatedDataNew = ([
                    'name' => $validatedName['name'],
                    'image' => 'pizzas//'.str_replace(' ', '', $this->name.'.jpg'),
                    'price' => $validatedPrice['price'],
                    'desc' => $validatedDesc['desc']
                ]);
            } else {
                $validatedDataNew = ([
                    'name' => $validatedName['name'],
                    'price' => $validatedPrice['price'],
                    'desc' => $validatedDesc['desc']
                ]);
            }
            Pizza::find($this->showOnSide['id'])->update($validatedDataNew);
        }

        else if($this->model == 'Drink')
        {
            if($this->name == $this->oldName) {$validatedName = $this->validate((['name' => 'required|min:2|max:255']));} 
            else {$validatedName = $this->validate((['name' => 'required|min:2|max:255|unique:drinks']));}

            if($this->editImage == "yes") {
                $validatedImage = $this->validate(['image' => 'image|file|mimes:jpg|max:1024']);
                if (Storage::exists('images//'.$this->oldImage) and $this->oldImage != "drinks//drink.jpg") {
                    Storage::delete('images//'.$this->oldImage);
                }
                $this->image->storeAs('images//drinks', str_replace(' ', '', $this->name.'.jpg'));
                $validatedDataNew = ([
                    'name' => $validatedName['name'],
                    'image' => 'drinks//'.str_replace(' ', '', $this->name.'.jpg'),
                    'price' => $validatedPrice['price'],
                    'desc' => $validatedDesc['desc']
                ]);
            } else {
                $validatedDataNew = ([
                    'name' => $validatedName['name'],
                    'price' => $validatedPrice['price'],
                    'desc' => $validatedDesc['desc']
                ]);
            }
            Drink::find($this->showOnSide['id'])->update($validatedDataNew);
        }

        else if($this->model == 'Starter')
        {
            if($this->name == $this->oldName) {$validatedName = $this->validate((['name' => 'required|min:2|max:255']));} 
            else {$validatedName = $this->validate((['name' => 'required|min:2|max:255|unique:starters']));}

            if($this->editImage == "yes") {
                $validatedImage = $this->validate(['image' => 'image|file|mimes:jpg|max:1024']);
                if (Storage::exists('images//'.$this->oldImage) and $this->oldImage != "starters//starter.jpg") {
                    Storage::delete('images//'.$this->oldImage);
                }
                $this->image->storeAs('images//starters', str_replace(' ', '', $this->name.'.jpg'));
                $validatedDataNew = ([
                    'name' => $validatedName['name'],
                    'image' => 'starters//'.str_replace(' ', '', $this->name.'.jpg'),
                    'price' => $validatedPrice['price'],
                    'desc' => $validatedDesc['desc']
                ]);
            } else {
                $validatedDataNew = ([
                    'name' => $validatedName['name'],
                    'price' => $validatedPrice['price'],
                    'desc' => $validatedDesc['desc']
                ]);
            }
            Starter::find($this->showOnSide['id'])->update($validatedDataNew);
        }

        session()->flash('success','Update Succesfully!');
        return redirect()->to('/admin-edit');
    }

    public function deleteThis($prodDel, $modelDel)
    {
        if($modelDel == "Pizza") {
            if (Storage::exists('images//'.$prodDel['image'])  and $prodDel['image'] != "pizzas//pizza.jpg") {
                Storage::delete('images//'.$prodDel['image']);
            }
            Pizza::find($prodDel['id'])->delete();
        }

        else if($modelDel == "Drink") {
            if (Storage::exists('images//'.$prodDel['image'])  and $prodDel['image'] != "drinks//drink.jpg") {
                Storage::delete('images//'.$prodDel['image']);
            }
            Drink::find($prodDel['id'])->delete();
        }

        else if($modelDel == "Starter") {
            if (Storage::exists('images//'.$prodDel['image'])  and $prodDel['image'] != "starters//starter.jpg") {
                Storage::delete('images//'.$prodDel['image']);
            }
            Starter::find($prodDel['id'])->delete();
        }

        session()->flash('success','Delete Item Succesfully!');
        return redirect()->to('/admin-edit');
    }

}
