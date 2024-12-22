<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Ivan',
            'email' => 'ivan@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Joy',
            'email' => 'joy@example.com',
            'password' => Hash::make('pw12345'),
        ]);

        User::create([
            'name' => 'olin',
            'email' => 'olin@example.com',
            'password' => Hash::make('asda123'),
        ]);
    }
}
