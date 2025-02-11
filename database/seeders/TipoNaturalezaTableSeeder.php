<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoNaturalezaTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipo_naturaleza')->insert([
            ['codigo' => 'B', 'nombre' => 'Biopsias'],
            ['codigo' => 'BV', 'nombre' => 'Biopsias veterinarias'],
            ['codigo' => 'CB', 'nombre' => 'Cavidad bucal'],
            ['codigo' => 'CV', 'nombre' => 'Citología vaginal'],
            ['codigo' => 'EX', 'nombre' => 'Extensión sanguínea'],
            ['codigo' => 'O', 'nombre' => 'Orinas'],
            ['codigo' => 'E', 'nombre' => 'Esputos'],
            ['codigo' => 'ES', 'nombre' => 'Semen'],
            ['codigo' => 'I', 'nombre' => 'Improntas'],
            ['codigo' => 'F', 'nombre' => 'Frotis'],
        ]);
    }
}
