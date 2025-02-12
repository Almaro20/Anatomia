<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MuestrasInterpretacionSeeder extends Seeder
{
    public function run()
    {
        // Obtener los IDs reales de las tablas relacionadas
        $muestras = DB::table('muestra')->pluck('id')->toArray();
        $interpretaciones = DB::table('interpretacion')->pluck('id')->toArray();

        // Validar que todas las referencias existen antes de insertar
        if (count($muestras) === 0 || count($interpretaciones) === 0) {
            echo "Faltan muestras o interpretaciones para insertar.\n";
            return;
        }

        // Insertar datos evitando duplicados en la tabla muestras_interpretacion
        $muestrasInterpretacion = [
            [
                'calidad' => 'Alta', // Calidad asignada
                'idMuestras' => $muestras[0], // Primer id de muestra
                'idInterpretacion' => $interpretaciones[0], // Primer id de interpretacion
            ],
            [
                'calidad' => 'Media', // Calidad asignada
                'idMuestras' => $muestras[1], // Segundo id de muestra
                'idInterpretacion' => $interpretaciones[1], // Segundo id de interpretacion
            ],
            [
                'calidad' => 'Baja', // Calidad asignada
                'idMuestras' => $muestras[2] ?? $muestras[0], // Si hay menos de 3 muestras, se usa la primera muestra
                'idInterpretacion' => $interpretaciones[2] ?? $interpretaciones[0], // Si hay menos de 3 interpretaciones, se usa la primera interpretacion
            ]
        ];

        // Insertar o actualizar las relaciones
        foreach ($muestrasInterpretacion as $registro) {
            DB::table('muestras_interpretacion')->updateOrInsert(
                [
                    'idMuestras' => $registro['idMuestras'],
                    'idInterpretacion' => $registro['idInterpretacion'],
                ],
                $registro
            );
        }

        echo "Relaciones entre muestras e interpretaciones insertadas correctamente.\n";
    }
}
