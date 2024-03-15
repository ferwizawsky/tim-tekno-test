<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admoon',
            'username' => 'admoon',
            'password' => Hash::make('admoon')
        ]);

        for ($x = 0; $x < 30; $x++) {
            Product::create([
                'title' => 'Product Title ' . $x + 1,
                'desc' => 'Lorem Ipsum Dolor Sit Amet.......',
                'price' => ($x + 1) * 1000000
            ]);
        }
    }
}
