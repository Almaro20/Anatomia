<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Primero los seeders de tablas sin dependencias
        $this->call(UsersTableSeeder::class);
        $this->call(SedeTableSeeder::class);
        $this->call(TipoNaturalezaTableSeeder::class);
        $this->call(TipoEstudioTableSeeder::class);
        $this->call(CalidadSeeder::class);
        $this->call(FormatoSeeder::class);

        // Por último los seeders que dependen de otras tablas
        $this->call(MuestraSeeder::class);
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
                ['codigo' => 'C.1', 'descripcion' => 'Toma válida para examen.', 'tipoEstudio_id' => $tipoEstudios['Estudio Clínico'] ?? null],
            ['codigo' => 'C.2', 'descripcion' => 'Toma válida para examen aunque limitada por ausencia de células endocervicales/zona de transición.', 'tipoEstudio_id' => $tipoEstudios['Estudio Radiológico'] ?? null],
            ['codigo' => 'C.3', 'descripcion' => 'Toma válida para examen aunque limitada por hemorragia.', 'tipoEstudio_id' => $tipoEstudios['Estudio de Laboratorio'] ?? null],
            ['codigo' => 'C.4', 'descripcion' => 'Toma válida para examen aunque limitada por escasez de células.', 'tipoEstudio_id' => $tipoEstudios['Estudio Patológico'] ?? null],
            ['codigo' => 'C.5', 'descripcion' => 'Toma válida para examen aunque limitada por intensa citolisis.', 'tipoEstudio_id' => $tipoEstudios['Estudio Genético'] ?? null],
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
        // Obtener los IDs de las tablas relacionadas
        $tipoNaturalezaIds = DB::table('tipo_naturaleza')->pluck('id')->toArray();
        $formatoIds = DB::table('formato')->pluck('id')->toArray();
        $calidadIds = DB::table('calidad')->pluck('id')->toArray();  // Traemos todos los IDs de `calidad`
        $tipoEstudioIds = DB::table('tipo_estudio')->pluck('id')->toArray();
        $sedeIds = DB::table('sede')->pluck('id')->toArray();
        $userIds = DB::table('users')->pluck('id')->toArray();

        // Verificar que todos los datos necesarios existen
        if (empty($tipoNaturalezaIds) || empty($formatoIds) || empty($calidadIds) || empty($tipoEstudioIds) || empty($sedeIds) || empty($userIds)) {
            echo "⚠️ No se insertaron datos en `muestra` porque faltan datos en las tablas relacionadas.\n";
            echo "tipoNaturalezaIds: " . implode(", ", $tipoNaturalezaIds) . "\n";
            echo "formatoIds: " . implode(", ", $formatoIds) . "\n";
            echo "calidadIds: " . implode(", ", $calidadIds) . "\n";
            echo "tipoEstudioIds: " . implode(", ", $tipoEstudioIds) . "\n";
            echo "sedeIds: " . implode(", ", $sedeIds) . "\n";
            echo "userIds: " . implode(", ", $userIds) . "\n";
            return;
        }

        // Si todo está bien, insertamos los datos
        $muestras = [
            [
                'codigo' => 'M001',
                'fechaEntrada' => '2024-02-06',
                'organo' => 'B',
                'descripcionMuestra' => 'Muestra de tejido blando.',
                'tipoNaturaleza_id' => $tipoNaturalezaIds[0],
                'formato_id' => $formatoIds[0],
                'calidad_id' => $calidadIds[0],  // Usamos el primer ID de `calidad`
                'tipoEstudio_id' => $tipoEstudioIds[0],
                'sede_id' => $sedeIds[0],
                'userCreador_id' => $userIds[0],
            ],
            [
                'codigo' => 'M002',
                'fechaEntrada' => '2024-02-07',
                'organo' => 'CV',
                'descripcionMuestra' => 'Muestra de tejido cardiaco.',
                'tipoNaturaleza_id' => $tipoNaturalezaIds[1],
                'formato_id' => $formatoIds[1],
                'calidad_id' => $calidadIds[1],  // Usamos el segundo ID de `calidad`
                'tipoEstudio_id' => $tipoEstudioIds[1],
                'sede_id' => $sedeIds[1],
                'userCreador_id' => $userIds[1],
            ],
        ];

        // Insertar las muestras en la base de datos
        DB::table('muestra')->insert($muestras);
    }
}
