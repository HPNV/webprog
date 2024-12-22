<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'userId' => Str::uuid(),
            'name' => 'Ivan',
            'email' => 'ivan@example.com',
            'password' => Hash::make('password123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'userId' => Str::uuid(),
            'name' => 'Joy',
            'email' => 'joy@example.com',
            'password' => Hash::make('pw12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'userId' => Str::uuid(),
            'name' => 'olin',
            'email' => 'olin@example.com',
            'password' => Hash::make('asda123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
