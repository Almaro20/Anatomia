<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CalidadSeeder::class,
            FormatoSeeder::class,
            ImagenSeeder::class,
            TipoEstudioSeeder::class,
            UsersSeeder::class,
            SedeSeeder::class,
        ]);
    }
}

