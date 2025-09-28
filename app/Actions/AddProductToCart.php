<?php

declare(strict_types= 1);

namespace App\Actions;

use App\Models\Cart;

class AddProductToCart
{
    public function handle(array $data): Cart
    {
        return Cart::create($data);
    }
}