<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');
Route::view('/login', 'login')->name('login');
Route::view('/checkout', 'checkout')->name('checkout');
Route::view('/success-checkout', 'success-checkout')->name('success-checkout');

// Route::get('/shop', ShopComponent::class)->name('shop');
