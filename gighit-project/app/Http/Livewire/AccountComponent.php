<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountComponent extends Component
{
    public $transactions;
    public $fullName, $email, $address, $username, $password;

    public function render()
    {
        $user_id = auth()->user()->id;
        $this->transactions = Transaction::where('user_id','=',$user_id)->get();
        return view('livewire.account-component');
    }

    public function mount()
    {
        $this->fullName = auth()->user()->fullName;
        $this->email = auth()->user()->email;
        $this->address = auth()->user()->address;
        $this->username = auth()->user()->username;
    }

    public function editAcc()
    {
        if($this->fullName == auth()->user()->fullName 
            and $this->email == auth()->user()->email 
            and $this->address == auth()->user()->address 
            and $this->username == auth()->user()->username
            and $this->password == "" ){
                return redirect('/account')->with('failed', 'Nothing changes');
        } else {
            $validatedFullname = $this->validate(['fullName' => 'required|min:2|max:255']);
            $validatedAddress = $this->validate(['address' => 'required|max:255']);
            if($this->email != auth()->user()->email) {
                $validatedEmail = $this->validate(['email' => 'required|email|unique:users']);
            } else {
                $validatedEmail['email'] = auth()->user()->email;
            }
            if($this->username != auth()->user()->username) {
                $validatedUsername = $this->validate(['username' => 'required|min:3|max:255|unique:users']);
            } else {
                $validatedUsername['username'] = auth()->user()->username;
            }
            if($this->password != "" ) {
                $validatedPassword = $this->validate(['password' => 'required|min:3|max:255']);
                $validatedPassword['password'] = Hash::make($validatedPassword['password']);
            } else {
                $validatedPassword['password'] = auth()->user()->password;
            }
            
            $validatedData = ([
                'fullName' => $validatedFullname['fullName'],
                'address' => $validatedAddress['address'],
                'email' => $validatedEmail['email'],
                'username' => $validatedUsername['username'],
                'password' => $validatedPassword['password']
            ]);
            
            User::find(auth()->user()->id)->update($validatedData);
    
            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();
            session()->flash('success', 'Update data succesfully! Please sign in');
            return redirect()->to('/signin');
        }
    }

    public function signout()
    {
        Auth::logout();

        session()->invalidate();

        session()->regenerateToken();

        return redirect('/')->with('success', 'Sign Out Succesfull!');
    }
}
