<?php

declare(strict_types=1);

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/add-product', [HomeController::class, 'addProduct'])->name('addProduct');
Route::post('/delete-product/{product}', [HomeController::class, 'deleteProduct'])->name('deleteProduct');
Route::post('/add-product-to-cart', [HomeController::class, 'addProductToCart'])->name('addProductToCart');

Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::get('/sign-in', [AuthController::class, 'index'])->name('login');