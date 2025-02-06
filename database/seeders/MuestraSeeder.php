<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MuestraSeeder extends Seeder
{
    public function run()
    {
        DB::table('muestra')->insert([
            [
                'codigo' => 'MX001',
                'fecha' => now(),
                'tipo_naturaleza_id' => 1,
                'organo_id' => 1,
                'formato_id' => 1,
                'calidad_id' => 1,
                'sede_id' => 1,
                'descripcionMuestra' => 'Muestra de prueba',
            ],
        ]);
    }
}
