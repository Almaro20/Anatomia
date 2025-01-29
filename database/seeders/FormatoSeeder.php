<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormatoSeeder extends Seeder
{
    public function run()
    {
        DB::table('formato')->insert([
            ['tipo' => 'JPEG'],
            ['tipo' => 'PNG'],
            ['tipo' => 'TIFF'],
        ]);
    }
}
