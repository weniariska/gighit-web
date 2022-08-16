<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminGigpayComponent extends Component
{
    public $username, $totalTopup;

    public function render()
    {
        return view('livewire.admin-gigpay-component');
    }

    private function resetInputFields(){
        $this->username = '';
        $this->totalTopup = '';
    }

    public function isiSaldo()
    {
        $credentials = $this->validate([
            'username' => 'required',
            'totalTopup' => 'required'
        ]);

        if($credentials['totalTopup'] <= 0) {
            session()->flash('failed','Total Top Up must be greater than 0');
        }
        else {
            $user = User::where('username', $credentials['username'])->first();

            if($user != null) {
                // update
                $user->update(['saldo' => $user->saldo + $credentials['totalTopup']]);

                // flash message
                session()->flash('success', 'Topup Success');

                // reset
                $this->resetInputFields();
            }
            else {
                session()->flash('failed','Username not found');
            }
        }

        return redirect()->to('/admin-gigpay');
    }
}
