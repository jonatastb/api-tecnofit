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
            ['name' => 'Joao', 'email' => 'joao@teste.com', 'password' => bcrypt('123456')],
            ['name' => 'Jose', 'email' => 'jose@teste.com', 'password' => bcrypt('123456')],
            ['name' => 'Paulo', 'email' => 'paulo@teste.com', 'password' => bcrypt('123456')],
            ['name' => 'Admin', 'email' => 'admin@teste.com', 'password' => bcrypt('123456')],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
