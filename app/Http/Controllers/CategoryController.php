<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return Inertia::render('Welcome', [
            'categories' => Category::with('products')->get(),
        ]);
    }
}
