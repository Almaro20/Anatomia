<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoEstudioSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipo_estudio')->insert([
            ['nombre' => 'Radiografía'],
            ['nombre' => 'Tomografía'],
            ['nombre' => 'Resonancia Magnética'],
        ]);
    }
}
