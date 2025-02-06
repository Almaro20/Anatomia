<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalidadSeeder extends Seeder
{
    public function run()
    {
        // Limpia la tabla y elimina cualquier dato existente
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Desactiva las restricciones de claves foráneas
        DB::table('calidad')->truncate();         // Vacía la tabla
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Reactiva las restricciones

        // Inserta los nuevos registros
        $calidadData = [
            ['codigo' => 'C.1', 'descripcion' => 'Toma válida para examen.'],
            ['codigo' => 'C.2', 'descripcion' => 'Toma válida para examen aunque limitada por ausencia de células endocervicales/zona de transición.'],
            ['codigo' => 'C.3', 'descripcion' => 'Toma válida para examen aunque limitada por hemorragia.'],
            ['codigo' => 'C.4', 'descripcion' => 'Toma válida para examen aunque limitada por escasez de células.'],
            ['codigo' => 'C.5', 'descripcion' => 'Toma válida para examen aunque limitada por intensa citolisis.'],
            ['codigo' => 'C.6', 'descripcion' => 'Toma válida para examen aunque limitada por otra condición.'],
            ['codigo' => 'C.7', 'descripcion' => 'Toma no valorable por desecación.'],
            ['codigo' => 'C.8', 'descripcion' => 'Toma no valorable por ausencia de células.'],
            ['codigo' => 'C.9', 'descripcion' => 'Toma no valorable por otra condición.'],
        ];

        DB::table('calidad')->insert($calidadData); // Inserta todos los registros
    }
}
