<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalidadSeeder extends Seeder
{
    public function run()
    {
        DB::table('calidad')->insert([
            ['nombre' => 'Alta'],
            ['nombre' => 'Media'],
            ['nombre' => 'Baja'],
        ]);
    }
}
