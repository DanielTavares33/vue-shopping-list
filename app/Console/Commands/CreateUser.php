<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\User;
use Hash;
use Illuminate\Console\Command;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new testing user';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('Creating a new user...');

        // Create a new user
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('123456'),
        ]);

        User::create([
            'name' => 'Test User',
            'email' => 'test@admin.com',
            'password' => Hash::make('123456'),
        ]);

        $this->info('User created successfully.');
    }
}
