<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
                ['email' => 'admin@xyz.com'],
                [
                    'name' => 'Admin XYZ',
                    'password' => Hash::make('password123'),
                ]
            );
    }
}
