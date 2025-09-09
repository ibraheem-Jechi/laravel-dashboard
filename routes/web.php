<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;

// Routes that require authentication
Route::middleware('auth')->group(function () {
    // Dashboard / Welcome page (with products)
    Route::get('/', [ProductController::class, 'welcome'])->name('welcome');

    // Add new product
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');

    // Logout
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});

// Routes for guests (not logged in)
Route::middleware('guest')->group(function () {
    // Register
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

    // Login
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});
