<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoNaturalezaTableSeeder extends Seeder
{
    public function run()
    {
        // Limpia la tabla antes de insertar nuevos datos
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('tipo_naturaleza')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Insertar datos evitando duplicados
        $data = [
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
        ];

        foreach ($data as $item) {
            DB::table('tipo_naturaleza')->updateOrInsert(
                ['codigo' => $item['codigo']], // Evita duplicados
                ['nombre' => $item['nombre']]
            );
        }
    }
}
