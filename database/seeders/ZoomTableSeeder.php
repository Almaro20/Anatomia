<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run()
    {
        DB::table('zooms')->insert([
            ['zoom' => '4x'],
            ['zoom' => '10x'],
            ['zoom' => '40x'],
            ['zoom' => '100x'],
        ]);
    }

}
