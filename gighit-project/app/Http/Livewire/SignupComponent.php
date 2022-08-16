<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class SignupComponent extends Component
{
    public $fullName, $email, $address, $username, $password;

    public function render()
    {
        return view('livewire.signup-component');
    }
    
    private function resetInputFields()
    {
        $this->fullName = '';
        $this->email = '';
        $this->address = '';
        $this->username = '';
        $this->password = '';
    }

    public function signup()
    {
        // validasi data
        $validatedData = $this->validate([
            'fullName' => 'required|min:2|max:255',
            'email' => 'required|email|unique:users',
            'address' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'password' => 'required|min:3|max:255'
        ]);
        // enkripsi password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // insert ke database
        User::create($validatedData);

        // flash message
        session()->flash('success', 'Sign up successfull! Please sign in');

        // redirect ke signin setelah signup
        return redirect()->to('/signin');

        $this->resetInputFields();
    }
}
