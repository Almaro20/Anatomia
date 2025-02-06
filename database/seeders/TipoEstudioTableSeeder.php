<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoEstudioTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipo_estudio')->insert([
            ['nombre' => 'Estudio Clínico'],
            ['nombre' => 'Estudio Radiológico'],
            ['nombre' => 'Estudio de Laboratorio'],
            ['nombre' => 'Estudio Patológico'],
            ['nombre' => 'Estudio Genético'],
        ]);
    }
}
