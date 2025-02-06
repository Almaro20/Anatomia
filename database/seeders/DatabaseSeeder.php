<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Sede;  // Asegúrate de usar las clases correctas
use App\Models\TipoEstudio;
use App\Models\TipoNaturaleza;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear un usuario de prueba
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            CalidadSeeder::class,
            ImagenSeeder::class,
            InterpretacionSeeder::class,
            MuestraSeeder::class,
            OrganoSeeder::class,
            // SedeTableSeeder::class,
            // TipoEstudioTableSeeder::class,
            // TipoNaturalezaTableSeeder::class,
            // UsersTableSeeder::class,
        ]);
    }
}
