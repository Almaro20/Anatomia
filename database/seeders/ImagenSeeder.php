<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagenSeeder extends Seeder
{
    public function run()
    {
        DB::table('imagen')->insert([
            [
                'ruta' => 'images/sample1.jpg',
                'zoom' => '100%',
                'muestra_id' => 1
            ],
            [
                'ruta' => 'images/sample2.jpg',
                'zoom' => '150%',
                'muestra_id' => 2
            ]
        ]);
    }
}
