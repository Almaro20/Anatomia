<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        // Crear el primer usuario
        User::create([
            'name' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'password' => Hash::make('password123'),
        ]);

        // Crear el segundo usuario
        User::create([
            'name' => 'Ana García',
            'email' => 'ana@example.com',
            'password' => Hash::make('password456'),
        ]);
    }
}
