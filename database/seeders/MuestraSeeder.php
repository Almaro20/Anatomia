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

    // Mostrar los IDs obtenidos
    print_r([
        'tipoNaturaleza' => $tipoNaturaleza,
        'formato' => $formato,
        'calidad' => $calidad,
        'tipoEstudio' => $tipoEstudio,
        'sede' => $sede,
        'users' => $users
    ]);

    // Validar que todas las referencias existen antes de insertar
    if (empty($tipoNaturaleza) || empty($formato) || empty($calidad) || empty($tipoEstudio) || empty($sede) || empty($users)) {
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
            'tipoNaturaleza_id' => $tipoNaturaleza[0], // Corregido
            'formato_id' => $formato[0],
            'calidad_id' => $calidad[0],
            'sede_id' => $sede[0],
            'user_id' => $users[0], // Corregido
        ],
        [
            'codigo' => 'M002',
            'fechaEntrada' => '2024-02-06',
            'organo' => 'BC',
            'descripcionMuestra' => 'Muestra de tejido cardiaco.',
            'tipoNaturaleza_id' => $tipoNaturaleza[1] ?? null, // Corregido
            'formato_id' => $formato[1] ?? null,
            'calidad_id' => $calidad[1] ?? null,
            'sede_id' => $sede[1] ?? null,
            'user_id' => $users[1] ?? null, // Corregido
        ]
    ];


    echo "Insertando muestras...\n";

    foreach ($muestras as $muestra) {
        print_r($muestra); // Mostrar cada muestra antes de insertarla

        DB::table('muestra')->updateOrInsert(
            ['codigo' => $muestra['codigo']],
            $muestra
        );
    }

    echo "Muestras insertadas correctamente.\n";
}

}
