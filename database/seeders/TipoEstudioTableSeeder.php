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
            ['codigo' => null, 'nombre' => 'Estudio de Biopsias'],
            ['codigo' => 'B','nombre' => 'Estudio Citológico Buccal'],
            ['codigo' => 'C','nombre' => 'Estudio Citológico Cérvico-Vaginal'],
            ['codigo' => 'H','nombre' => 'Estudio Hematológico Completo'],
            ['codigo' => 'U','nombre' => 'Estudio Microscópico y Químico de Orina'],
            ['codigo' => 'E','nombre' => 'Estudio Citológico de Esputo']
        ]);
    }
}
