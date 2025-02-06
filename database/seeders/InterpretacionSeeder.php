<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterpretacionSeeder extends Seeder
{
    public function run()
    {
        DB::table('interpretacion')->insert([
            [
                'texto' => 'Interpretación inicial de la muestra.',
                'muestra_id' => 1,
                'userAutor_id' => 1
            ],
            [
                'texto' => 'Segunda interpretación detallada.',
                'muestra_id' => 2,
                'userAutor_id' => 2
            ]
        ]);
    }
}
