<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoNaturaleza;

class TipoNaturalezaTableSeeder extends Seeder
{
    public function run()
    {
        // Ya no necesitas truncar la tabla, simplemente inserta o actualiza los datos
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

        // Usamos 'updateOrCreate' de Eloquent para insertar o actualizar
        foreach ($data as $item) {
            TipoNaturaleza::updateOrCreate(
                ['codigo' => $item['codigo']], // Condición para evitar duplicados
                ['nombre' => $item['nombre']]  // Los valores que se van a insertar o actualizar
            );
        }
    }
}
