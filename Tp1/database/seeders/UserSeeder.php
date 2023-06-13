<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'role_id' => 1,
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10)
        ]);

        $user2 = User::create([
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'role_id' => 2,
            'email' => fake()->email(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10)
        ]);

        $user3 = User::create([
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'role_id' => 2,
            'email' => fake()->email(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10)
        ]);
    }
}
