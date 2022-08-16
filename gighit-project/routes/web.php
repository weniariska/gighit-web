<?php

use App\Http\Livewire\AccountComponent;
use App\Http\Livewire\AdminGigpayComponent;
use App\Http\Livewire\AdminOrder;
use App\Http\Livewire\AdminTransactionComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\DashboardComponent;
use App\Http\Livewire\DrinkComponent;
use App\Http\Livewire\EditMenuComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\NotsignComponent;
use App\Http\Livewire\PizzaComponent;
use App\Http\Livewire\SigninComponent;
use App\Http\Livewire\SignupComponent;
use App\Http\Livewire\StarterComponent;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeComponent::class)->middleware('guestcustomer');

Route::get('/pizza', PizzaComponent::class)->middleware('guestcustomer');

Route::get('/drinks', DrinkComponent::class)->middleware('guestcustomer');

Route::get('/starters', StarterComponent::class)->middleware('guestcustomer');

Route::get('/notsign', NotsignComponent::class)->name('notsign')->middleware('guest');

Route::get('/signup', SignupComponent::class)->middleware('guest');

Route::get('/signin', SigninComponent::class)->middleware('guest');

Route::get('/account', AccountComponent::class)->middleware('auth');

Route::get('/cart', CartComponent::class)->middleware('authuser');

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function(){
    Route::get('/admin-order', AdminOrder::class);
    Route::get('/admin-transaction', AdminTransactionComponent::class);
    Route::get('/admin-gigpay', AdminGigpayComponent::class);
    Route::get('/admin-edit', EditMenuComponent::class);
});
