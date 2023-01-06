<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\HomeController;

Route::view('/', 'welcome')->name('welcome');
Route::view('/login', 'login')->name('login');
// Route::view('/checkout', 'checkout')->name('checkout');
// Route::view('/success-checkout', 'success-checkout')->name('success-checkout');

// Route::view('/checkout/{camp:slug}', 'checkout')->name('checkout');




Route::middleware(['auth'])->group(function () {
    // checkout
    Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('checkout/{camp:slug}', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('checkout/{camp}', [CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/user/dashboard', [HomeController::class, 'dashboard'])->name('user.dashboard');
});

// socialite routes
Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// group auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
