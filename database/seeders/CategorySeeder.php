<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Fruits', 'icon' => '🍎'],
            ['name' => 'Vegetables', 'icon' => '🥦'],
            ['name' => 'Dairy', 'icon' => '🧀'],
            ['name' => 'Bakery', 'icon' => '🍞'],
            ['name' => 'Meat', 'icon' => '🍖'],
            ['name' => 'Beverages', 'icon' => '🥤'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
