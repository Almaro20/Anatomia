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
            ['nombre' => 'Estudio Citológico Cérvico-Vaginal'],
            ['nombre' => 'Estudio Hematológico Completo'],
            ['nombre' => 'Estudio Microscópico y Químico de Orina'],
            ['nombre' => 'Estudio Citológico de Esputo']
        ]);
    }
}
