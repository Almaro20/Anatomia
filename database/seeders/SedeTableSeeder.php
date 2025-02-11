<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SedeTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sede')->insert([
            ['codigo' => 'A', 'nombre' => 'Albacete'],
            ['codigo' => 'AL', 'nombre' => 'Alicante'],
            ['codigo' => 'ALII', 'nombre' => 'Alicante 2'],
            ['codigo' => 'I', 'nombre' => 'Almería'],
            ['codigo' => 'C', 'nombre' => 'Córdoba'],
            ['codigo' => 'L', 'nombre' => 'Leganés'],
            ['codigo' => 'G', 'nombre' => 'Granada'],
            ['codigo' => 'H', 'nombre' => 'Huelva'],
            ['codigo' => 'J', 'nombre' => 'Jerez'],
            ['codigo' => 'M', 'nombre' => 'Madrid'],
            ['codigo' => 'MG', 'nombre' => 'Málaga'],
            ['codigo' => 'MU', 'nombre' => 'Murcia'],
            ['codigo' => 'S', 'nombre' => 'Sevilla'],
            ['codigo' => 'V', 'nombre' => 'Valencia'],
            ['codigo' => 'Z', 'nombre' => 'Zaragoza']
        ]);
    }
}
