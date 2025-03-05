<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MuestraSeeder extends Seeder
{
    public function run()
    {
        echo "Ejecutando MuestraSeeder...\n";

        // Obtener los IDs de las tablas relacionadas
        $tipoNaturaleza = DB::table('tipo_naturaleza')->pluck('id')->toArray();
        $formato = DB::table('formato')->pluck('id')->toArray();
        $calidad = DB::table('calidad')->pluck('id')->toArray();
        $tipoEstudio = DB::table('tipo_estudio')->pluck('id')->toArray();
        $sede = DB::table('sede')->pluck('id')->toArray();
        $users = DB::table('user')->pluck('id')->toArray();
        $imagenes = DB::table('imagenes')->pluck('id')->toArray();

        // Verificar si hay imágenes
        if (empty($imagenes)) {
            // Insertar al menos una imagen para poder usarla
            $id = DB::table('imagenes')->insertGetId([
                'url' => 'https://placeholder-image.com/default.jpg',
                'zoom_id' => 1, // Asegúrate de que este ID exista en la tabla zooms
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $imagenes = [$id];
        }

        // Mostrar los IDs obtenidos
        print_r([
            'tipoNaturaleza' => $tipoNaturaleza,
            'formato' => $formato,
            'calidad' => $calidad,
            'tipoEstudio' => $tipoEstudio,
            'sede' => $sede,
            'users' => $users,
            'imagenes' => $imagenes
        ]);

        // Validar que todas las referencias existen antes de insertar
        if (empty($tipoNaturaleza) || empty($formato) || empty($calidad) ||
            empty($tipoEstudio) || empty($sede) || empty($users) || empty($imagenes)) {
            echo "Faltan datos en las tablas relacionadas. No se insertarán muestras.\n";
            return;
        }

        // Insertar datos evitando duplicados
        $muestras = [
            [
                'codigo' => 'M001',
                'fechaEntrada' => '2024-02-06',
                'organo' => 'BC',
                'descripcionMuestra' => 'Muestra de tejido blando.',
                'tipoEstudio_id' => $tipoEstudio[0],
                'tipoNaturaleza_id' => $tipoNaturaleza[0],
                'formato_id' => $formato[0],
                'calidad_id' => $calidad[0],
                'sede_id' => $sede[0],
                'user_id' => $users[0],
                'imagen_id' => $imagenes[0],
            ],
            [
                'codigo' => 'M002',
                'fechaEntrada' => '2024-02-06',
                'organo' => 'BC',
                'descripcionMuestra' => 'Muestra de tejido cardiaco.',
                'tipoEstudio_id' => $tipoEstudio[1] ?? $tipoEstudio[0],
                'tipoNaturaleza_id' => $tipoNaturaleza[1] ?? $tipoNaturaleza[0],
                'formato_id' => $formato[1] ?? $formato[0],
                'calidad_id' => $calidad[1] ?? $calidad[0],
                'sede_id' => $sede[1] ?? $sede[0],
                'user_id' => $users[1] ?? $users[0],
                'imagen_id' => $imagenes[0],
            ]
        ];

        echo "Insertando muestras...\n";

        foreach ($muestras as $muestra) {
            print_r($muestra);
            DB::table('muestra')->updateOrInsert(
                ['codigo' => $muestra['codigo']],
                $muestra
            );
        }

        echo "Muestras insertadas correctamente.\n";
    }

}
