<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([ 'name' => 'Admin', 'email' => 'admin@example.com', 'password' => Hash::make('password'), // Replace with a secure password 'is_admin' => true, // Ensure you have an is_admin field in your users table ]);
    ]);
}
}