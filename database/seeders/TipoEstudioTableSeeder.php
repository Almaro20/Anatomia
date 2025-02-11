<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoEstudioTableSeeder extends Seeder
{
    public function run()
    {
        // Insertamos los registros correctamente con la clave 'nombre' para cada tipo de estudio
        DB::table('tipo_estudio')->insert([
            ['nombre' => 'Estudio Clínico'],
            ['nombre' => 'Estudio Radiológico'],
            ['nombre' => 'Estudio de Laboratorio'],
            ['nombre' => 'Estudio Patológico'],
            ['nombre' => 'Estudio Genético'],
        ]);
    }
}
