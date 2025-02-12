<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Formato; // Si estás utilizando un modelo Formato

class FormatoTableSeeder extends Seeder
{
    public function run()
    {
        // Insertar el primer formato
        Formato::create([
            'codigo' => 'A',
            'nombre' => 'Formato A',
        ]);

        // Insertar el segundo formato
        Formato::create([
            'codigo' => 'B',
            'nombre' => 'Formato B',
        ]);

        // Insertar un tercer formato si es necesario
        Formato::create([
            'codigo' => 'C',
            'nombre' => 'Formato C',
        ]);
    }
}
