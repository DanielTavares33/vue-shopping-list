<?php

declare(strict_types=1);

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/add-product', [HomeController::class, 'addProduct'])->name('addProduct');
Route::post('/delete-product/{product}', [HomeController::class, 'deleteProduct'])->name('deleteProduct');

Route::get('/cart', [CartController::class, 'index'])->name('cart');