<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoNaturaleza;
use App\Models\TipoEstudio; // Importar el modelo de TipoEstudio

class TipoNaturalezaTableSeeder extends Seeder
{
    public function run()
    {
        // Obtenemos el primer registro de la tabla tipo_estudio (o puedes elegir otro)
        $tipoEstudio = TipoEstudio::first(); // Asegúrate de que hay registros en tipo_estudio

        // Si no hay ningún registro en tipo_estudio, debemos evitar insertar datos en tipo_naturaleza
        if ($tipoEstudio) {
            $data = [
                ['codigo' => 'B', 'nombre' => 'Biopsias', 'tipoEstudio_id' => $tipoEstudio->id],
                ['codigo' => 'BV', 'nombre' => 'Biopsias veterinarias', 'tipoEstudio_id' => $tipoEstudio->id],
                ['codigo' => 'CB', 'nombre' => 'Cavidad bucal', 'tipoEstudio_id' => $tipoEstudio->id],
                ['codigo' => 'CV', 'nombre' => 'Citología vaginal', 'tipoEstudio_id' => $tipoEstudio->id],
                ['codigo' => 'EX', 'nombre' => 'Extensión sanguínea', 'tipoEstudio_id' => $tipoEstudio->id],
                ['codigo' => 'O', 'nombre' => 'Orinas', 'tipoEstudio_id' => $tipoEstudio->id],
                ['codigo' => 'E', 'nombre' => 'Esputos', 'tipoEstudio_id' => $tipoEstudio->id],
                ['codigo' => 'ES', 'nombre' => 'Semen', 'tipoEstudio_id' => $tipoEstudio->id],
                ['codigo' => 'I', 'nombre' => 'Improntas', 'tipoEstudio_id' => $tipoEstudio->id],
                ['codigo' => 'F', 'nombre' => 'Frotis', 'tipoEstudio_id' => $tipoEstudio->id],
            ];

            // Usamos 'updateOrCreate' de Eloquent para insertar o actualizar los registros
            foreach ($data as $item) {
                TipoNaturaleza::updateOrCreate(
                    ['codigo' => $item['codigo']], // Condición para evitar duplicados
                    ['nombre' => $item['nombre'], 'tipoEstudio_id' => $item['tipoEstudio_id']]  // Los valores que se van a insertar o actualizar
                );
            }
        } else {
            // Si no hay registros en tipo_estudio, puedes manejarlo de la forma que prefieras
            echo "No hay registros en la tabla tipo_estudio, no se pueden insertar datos en tipo_naturaleza.";
        }
    }
}