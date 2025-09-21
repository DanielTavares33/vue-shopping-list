<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Welcome', [
            'categories' => Category::with('products')->get(),
        ]);
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3|unique:products,name',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
        ]);

        return to_route('home');
    }
}
