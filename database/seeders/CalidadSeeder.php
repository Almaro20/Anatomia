<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalidadSeeder extends Seeder
{
    public function run()
    {
        $calidadData = [
            ['codigo' => 'C.1', 'descripcion' => 'Toma válida para examen.'],
            ['codigo' => 'C.2', 'descripcion' => 'Toma válida para examen aunque limitada por ausencia de células endocervicales/zona de transición.'],
            ['codigo' => 'C.3', 'descripcion' => 'Toma válida para examen aunque limitada por hemorragia.'],
            ['codigo' => 'C.4', 'descripcion' => 'Toma válida para examen aunque limitada por escasez de células.'],
            ['codigo' => 'C.5', 'descripcion' => 'Toma válida para examen aunque limitada por intensa citolisis.'],
            ['codigo' => 'C.6', 'descripcion' => 'Toma válida para examen aunque limitada por otra condición.'],
            ['codigo' => 'C.7', 'descripcion' => 'Toma no valorable por desecación.'],
            ['codigo' => 'C.8', 'descripcion' => 'Toma no valorable por ausencia de células.'],
            ['codigo' => 'C.9', 'descripcion' => 'Toma no valorable por otra condición.'],
        ];

        foreach ($calidadData as $data) {
            DB::table('calidad')->updateOrInsert(
                ['codigo' => $data['codigo']],
                ['descripcion' => $data['descripcion']]
            );
        }
    }


    }



