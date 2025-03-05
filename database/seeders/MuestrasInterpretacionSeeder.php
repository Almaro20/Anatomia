<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MuestrasInterpretacion;
use App\Models\Muestra;
use App\Models\Interpretacion;

class MuestrasInterpretacionSeeder extends Seeder
{
    public function run()
    {
        // Crear algunas interpretaciones de muestra por defecto
        MuestrasInterpretacion::create([
            'idMuestras' => 1,
            'idInterpretacion' => 79
        ]);

        MuestrasInterpretacion::create([
            'idMuestras' => 2,
            'idInterpretacion' => 80
        ]);

        // Obtener algunas muestras e interpretaciones existentes
        $muestras = Muestra::all();
        $interpretaciones = Interpretacion::all();

        if ($muestras->isEmpty() || $interpretaciones->isEmpty()) {
            echo "No hay muestras o interpretaciones disponibles para crear relaciones.\n";
            return;
        }

        // Crear algunas interpretaciones de prueba
        foreach ($muestras as $muestra) {
            // Asignar 2-3 interpretaciones aleatorias a cada muestra
            $numInterpretaciones = rand(2, 3);

            for ($i = 0; $i < $numInterpretaciones; $i++) {
                MuestrasInterpretacion::create([
                    'idMuestras' => $muestra->id,
                    'idInterpretacion' => $interpretaciones->random()->id
                ]);
            }
        }

        echo "Interpretaciones de muestra creadas exitosamente.\n";
    }
}
