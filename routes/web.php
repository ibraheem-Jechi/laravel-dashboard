<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;

Route::get('/', function () {
    return view('welcome');
});






Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
});

