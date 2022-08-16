<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;

class AdminTransactionComponent extends Component
{
    public $transactions;

    public function render()
    {
        $this->transactions = Transaction::all();
        return view('livewire.admin-transaction-component');
    }
}
