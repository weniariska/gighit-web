<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SigninComponent extends Component
{
    public $username, $password;

    public function render()
    {
        return view('livewire.signin-component');
    }

    private function resetInputFields(){
        $this->username = '';
        $this->password = '';
    }
    
    public function signin()
    {
        $credentials = $this->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            session()->regenerate();
            if(Auth::user()->userType === 'admin') {
                return redirect()->to('/admin-order')->with('success', 'Sign In Succesfull!');
            } else{
                return redirect()->to('/')->with('success', 'Sign In Succesfull!');
            }
        } else {
            session()->flash('failed', 'Sign In Failed!');
            return redirect()->to('/signin');
        }

        $this->resetInputFields();
    }
}
