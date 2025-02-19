<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoNaturalezaTableSeeder extends Seeder
{
    public function run()
    {

        $tipoEstudios = DB::table('tipo_estudio')->pluck('id', 'nombre')->toArray();

        $naturalezas = [
            ['codigo' => 'B', 'nombre' => 'Biopsias', 'tipoEstudio' => 'Estudio de Biopsias'],
            ['codigo' => 'BV', 'nombre' => 'Biopsias Veterinarias', 'tipoEstudio' => 'Estudio de Biopsias'],
            ['codigo' => 'CB', 'nombre' => 'Cavidad Bucal', 'tipoEstudio' => 'Estudio Citológico Buccal'],
            ['codigo' => 'CV', 'nombre' => 'Citología Vaginal', 'tipoEstudio' => 'Estudio Citológico Cérvico-Vaginal'],
            ['codigo' => 'EX', 'nombre' => 'Extensión Sanguínea', 'tipoEstudio' => 'Estudio Hematológico Completo'],
            ['codigo' => 'O', 'nombre' => 'Orinas', 'tipoEstudio' => 'Estudio Microscópico y Químico de Orina'],
            ['codigo' => 'E', 'nombre' => 'Esputos', 'tipoEstudio' => 'Estudio Citológico de Esputo'],
            ['codigo' => 'ES', 'nombre' => 'Semen', 'tipoEstudio' => 'Estudio Hematológico Completo'],
            ['codigo' => 'I', 'nombre' => 'Improntas', 'tipoEstudio' => 'Estudio Citológico Buccal'],
            ['codigo' => 'F', 'nombre' => 'Frotis', 'tipoEstudio' => 'Estudio Hematológico Completo']
        ];

        foreach ($naturalezas as $naturaleza) {
            if (isset($tipoEstudios[$naturaleza['tipoEstudio']])) {
                DB::table('tipo_naturaleza')->insert([
                    'codigo' => $naturaleza['codigo'],
                    'nombre' => $naturaleza['nombre'],
                    'tipoEstudio_id' => $tipoEstudios[$naturaleza['tipoEstudio']],
                ]);
            }
        }
    }
}
