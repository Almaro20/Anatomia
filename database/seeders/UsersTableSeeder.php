<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'email' => 'admin@example.com',
            'name' => 'Admin User',
            'password' => Hash::make('password'), // Asegúrate de hashear la contraseña
        ]);

        // Puedes agregar más usuarios si lo deseas
        User::create([
            'email' => 'user@example.com',
            'name' => 'Regular User',
            'password' => Hash::make('password'),
        ]);
    }
}
