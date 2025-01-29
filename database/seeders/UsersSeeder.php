<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Admin', 'email' => 'admin@example.com', 'password' => Hash::make('password')],
            ['name' => 'User1', 'email' => 'user1@example.com', 'password' => Hash::make('password')],
        ]);
    }
}
