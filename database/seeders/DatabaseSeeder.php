<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin1'),
        ]);

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
