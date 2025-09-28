<?php

namespace App\Http\Controllers;

use App\Actions\AddProductToCart;
use App\Models\Cart;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{
    public function index()
    {
        return Inertia::render('Cart');
    }
}
