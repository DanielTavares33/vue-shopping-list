<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\AddProductToCart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(Request $request): Response
    {
        return Inertia::render('Welcome', [
            'categories' => Category::with('products')->get(),
            'user' => auth()->user(),
        ]);
    }

    public function addProduct(Request $request): RedirectResponse
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

    public function addProductToCart(Request $request, AddProductToCart $productToCart): RedirectResponse
    {
        $productToCart = $productToCart->handle($request->all());

        return to_route('cart');
    }

    public function deleteProduct(Product $product): RedirectResponse
    {
        $product->delete();

        return to_route('home');
    }
}
