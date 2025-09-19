<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Example products
        $products = [
            ['name' => 'Apple', 'category_id' => 1],
            ['name' => 'Banana', 'category_id' => 1],
            ['name' => 'Carrot', 'category_id' => 2],
            ['name' => 'Broccoli', 'category_id' => 2],
            ['name' => 'Milk', 'category_id' => 3],
            ['name' => 'Cheese', 'category_id' => 3],
            ['name' => 'Bread', 'category_id' => 4],
            ['name' => 'Chicken', 'category_id' => 5],
            ['name' => 'Beef', 'category_id' => 5],
            ['name' => 'Soda', 'category_id' => 6],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
