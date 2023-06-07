<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Critic;

class CriticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Critic::create([
            'user_id' => 1,
            'film_id' => 1,
            'score' => 10,
            'comment' => 'Best movie'
        ]);

        Critic::create([
            'user_id' => 2,
            'film_id' => 2,
            'score' => 8,
            'comment' => 'It is fine.'
        ]);

        Critic::create([
            'user_id' => 2,
            'film_id' => 3,
            'score' => 5,
            'comment' => 'It is not good.'
        ]);
    }
}
