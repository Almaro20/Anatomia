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
            SedeTableSeeder::class,                // Seeder de la tabla 'sede'
            TipoEstudioTableSeeder::class,         // Seeder de la tabla 'tipo_estudio'
            TipoNaturalezaTableSeeder::class,      // Seeder de la tabla 'tipo_naturaleza'
            FormatoTableSeeder::class,                   // Seeder de la tabla 'organo'
            OrganoSeeder::class,                   // Seeder de la tabla 'organo'
            CalidadSeeder::class,                  // Seeder de la tabla 'calidad'
            MuestraSeeder::class,                  // Seeder de la tabla 'muestra'
            // Aquí puedes añadir más seeders si los tienes
        ]);
    }
}
