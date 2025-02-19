<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Formato; // Si estás utilizando un modelo Formato

class FormatoTableSeeder extends Seeder
{
    public function run()
    {
        Formato::create([
            'nombre' => 'Fresco',
        ]);

        Formato::create([
            'nombre' => 'Formol',
        ]);

        Formato::create([
            'nombre' => 'Etanol 70%',
        ]);

        Formato::create([
            'nombre' => 'Etanol 100%',
        ]);
    }
}
