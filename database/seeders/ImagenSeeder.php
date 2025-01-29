<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagenSeeder extends Seeder
{
    public function run()
    {
        DB::table('imagen')->insert([
            ['ruta' => 'images/img1.jpg', 'descripcion' => 'Imagen 1'],
            ['ruta' => 'images/img2.jpg', 'descripcion' => 'Imagen 2'],
        ]);
    }
}
