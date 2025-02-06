<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MuestraSeeder extends Seeder
{
    public function run()
    {
        DB::table('muestra')->insert([
            [
                'codigo' => 'M001',
                'fechaEntrada' => '2024-02-06',
                'organo' => 'B',
                'descripcionMuestra' => 'Muestra de tejido blando.',
                'tipoNaturaleza_id' => 1,
                'formato_id' => 2,
                'calidad_id' => 3,
                'tipoEstudio_id' => 4,
                'sede_id' => 1,
                'userCreador_id' => 1
            ],
            [
                'codigo' => 'M002',
                'fechaEntrada' => '2024-02-06',
                'organo' => 'CV',
                'descripcionMuestra' => 'Muestra de tejido cardiaco.',
                'tipoNaturaleza_id' => 2,
                'formato_id' => 3,
                'calidad_id' => 1,
                'tipoEstudio_id' => 2,
                'sede_id' => 2,
                'userCreador_id' => 2
            ]
        ]);
    }
}

