<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Inertia\Inertia;

class CartController extends Controller
{
    public function index()
    {
        return Inertia::render('Cart');
    }
}
