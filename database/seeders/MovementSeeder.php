<?php

namespace Database\Seeders;

use App\Models\Movement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovementSeeder extends Seeder
{
    public function run(): void
    {
        $movements = ['Deadlift', 'Back Squat', 'Bench Press'];

        foreach ($movements as $movement) {
            Movement::create(['name' => $movement]);
        }
    }
}
