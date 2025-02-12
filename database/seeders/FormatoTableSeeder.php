<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Formato; // Si estás utilizando un modelo Formato

class FormatoTableSeeder extends Seeder
{
    public function run()
    {
        Formato::create([
            'codigo' => 'A',
            'nombre' => 'Formato A',
        ]);
    }
}
