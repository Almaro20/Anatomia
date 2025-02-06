<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,           // Usuarios
            SedeTableSeeder::class,            // Sedes
            TipoNaturalezaTableSeeder::class,  // Tipos de naturaleza
            TipoEstudioTableSeeder::class,     // Tipos de estudio
            CalidadSeeder::class,              // Calidades
            OrganoSeeder::class,               // Órganos
            FormatoSeeder::class,              // Formatos (si falta, agrégalo)
            MuestraSeeder::class,              // Muestras (al final para cumplir las dependencias)
        ]);
    }
}

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::updateOrInsert(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
            ]
        );

        User::updateOrInsert(
            ['email' => 'user@example.com'],
            [
                'name' => 'Regular User',
                'password' => Hash::make('password'),
            ]
        );
    }
}

class SedeTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sede')->insert([
            ['codigo' => 'A', 'nombre' => 'Albacete'],
            ['codigo' => 'B', 'nombre' => 'Barcelona'],
            ['codigo' => 'C', 'nombre' => 'Madrid'],
        ]);
    }
}

class TipoNaturalezaTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipo_naturaleza')->insert([
            ['codigo' => 'B', 'nombre' => 'Biopsia'],
            ['codigo' => 'C', 'nombre' => 'Citología'],
        ]);
    }
}

class TipoEstudioTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipo_estudio')->insert([
            ['nombre' => 'Estudio Radiológico'],
            ['nombre' => 'Estudio Clínico'],
        ]);
    }
}

class CalidadSeeder extends Seeder
{
    public function run()
    {
        DB::table('calidad')->insert([
            ['codigo' => 'C.1', 'descripcion' => 'Buena calidad'],
            ['codigo' => 'C.2', 'descripcion' => 'Calidad regular'],
        ]);
    }
}

class FormatoSeeder extends Seeder
{
    public function run()
    {
        DB::table('formato')->insert([
            ['nombre' => 'Formato 1'],
            ['nombre' => 'Formato 2'],
        ]);
    }
}

class MuestraSeeder extends Seeder
{
    public function run()
    {
        $tipoNaturalezaId = DB::table('tipo_naturaleza')->value('id');
        $formatoId = DB::table('formato')->value('id');
        $calidadId = DB::table('calidad')->value('id');
        $tipoEstudioId = DB::table('tipo_estudio')->value('id');
        $sedeId = DB::table('sede')->value('id');
        $userId = DB::table('users')->value('id');

        if ($tipoNaturalezaId && $formatoId && $calidadId && $tipoEstudioId && $sedeId && $userId) {
            DB::table('muestra')->insert([
                [
                    'codigo' => 'M001',
                    'fechaEntrada' => '2024-02-06',
                    'organo' => 'B',
                    'descripcionMuestra' => 'Muestra de tejido blando.',
                    'tipoNaturaleza_id' => $tipoNaturalezaId,
                    'formato_id' => $formatoId,
                    'calidad_id' => $calidadId,
                    'tipoEstudio_id' => $tipoEstudioId,
                    'sede_id' => $sedeId,
                    'userCreador_id' => $userId,
                ],
            ]);
        } else {
            echo "Algunos datos requeridos para `muestra` no existen. Revisa las dependencias.\n";
        }
    }
}
