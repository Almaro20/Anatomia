<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Llamar a los seeders individuales
        $this->call([
            SedeTableSeeder::class,
            TipoEstudioTableSeeder::class,
            TipoNaturalezaTableSeeder::class,
            FormatoTableSeeder::class,
            OrganoSeeder::class,
            CalidadSeeder::class,
            ZoomTableSeeder::class,
            UserTableSeeder::class,
            MuestraSeeder::class,
            InterpretacionSeeder::class,
            MuestrasInterpretacionSeeder::class,
        ]);
    }
}
