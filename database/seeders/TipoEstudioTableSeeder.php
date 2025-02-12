<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoEstudio; // Asegúrate de tener el modelo TipoEstudio

class TipoEstudioTableSeeder extends Seeder
{
    public function run()
    {
        // Usamos el modelo Eloquent para insertar los registros
        TipoEstudio::insert([
            ['nombre' => 'Estudio Clínico'],
            ['nombre' => 'Estudio Radiológico'],
            ['nombre' => 'Estudio de Laboratorio'],
            ['nombre' => 'Estudio Patológico'],
            ['nombre' => 'Estudio Genético'],
        ]);
    }
}
