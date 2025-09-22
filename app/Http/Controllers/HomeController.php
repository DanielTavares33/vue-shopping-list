<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

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

    public function deleteProduct(Product $product)
    {
        $product->delete();

        return to_route('home');
    }
}
