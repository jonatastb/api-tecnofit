<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run(): void
    {

        $users = [
            ['name' => 'Joao', 'email' => fake()->email, 'password' => bcrypt('123456')],
            ['name' => 'Jose', 'email' => fake()->email, 'password' => bcrypt('123456')],
            ['name' => 'Paulo', 'email' => fake()->email, 'password' => bcrypt('123456')],
            ['name' => 'Admin', 'email' => 'admin@teste.com', 'password' => bcrypt('123456')],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
