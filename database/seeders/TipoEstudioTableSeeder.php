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
            ['nombre' => 'Estudio de Biopsias'],
            ['nombre' => 'Estudio Citológico Buccal'],
            ['nombre' => 'Estudio Cilogico Cervico-Vaginal'],
            ['nombre' => 'Estudio Hematologico Completo'],
            ['nombre' => 'Estudio Microscopico y Quimico de Orina'],
            ['nombre' => 'Estudio Citologico de Esputo']
        ]);
    }
}