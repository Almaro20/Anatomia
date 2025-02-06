<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MuestraSeeder extends Seeder
{
    public function run()
    {
        // Obtener los IDs reales de las tablas relacionadas con el nombre correcto
        $tipoNaturaleza = DB::table('tipo_naturaleza')->pluck('tipoNaturaleza_id')->toArray();
        $formato = DB::table('formato')->pluck('formato_id')->toArray();
        $calidad = DB::table('calidad')->pluck('calidad_id')->toArray();
        $tipoEstudio = DB::table('tipo_estudio')->pluck('tipoEstudio_id')->toArray();
        $sede = DB::table('sede')->pluck('sede_id')->toArray();
        $users = DB::table('users')->pluck('id')->toArray(); // En users, la clave primaria sí es 'id'

        // Validar que todas las referencias existen antes de insertar
        if (empty($tipoNaturaleza) || empty($formato) || empty($calidad) || empty($tipoEstudio) || empty($sede) || empty($users)) {
            echo "⚠️ No se insertaron datos en `muestra` porque faltan datos en las tablas relacionadas.\n";
            return;
        }

        // Insertar datos evitando duplicados
        $muestras = [
            [
                'codigo' => 'M001',
                'fechaEntrada' => '2024-02-06',
                'organo' => 'B',
                'descripcionMuestra' => 'Muestra de tejido blando.',
                'tipoNaturaleza_id' => $tipoNaturaleza[0] ?? null,
                'formato_id' => $formato[0] ?? null,
                'calidad_id' => $calidad[0] ?? null,
                'tipoEstudio_id' => $tipoEstudio[0] ?? null,
                'sede_id' => $sede[0] ?? null,
                'userCreador_id' => $users[0] ?? null,
            ],
            [
                'codigo' => 'M002',
                'fechaEntrada' => '2024-02-06',
                'organo' => 'CV',
                'descripcionMuestra' => 'Muestra de tejido cardiaco.',
                'tipoNaturaleza_id' => $tipoNaturaleza[1] ?? null,
                'formato_id' => $formato[1] ?? null,
                'calidad_id' => $calidad[1] ?? null,
                'tipoEstudio_id' => $tipoEstudio[1] ?? null,
                'sede_id' => $sede[1] ?? null,
                'userCreador_id' => $users[1] ?? null,
            ]
        ];

        foreach ($muestras as $muestra) {
            DB::table('muestra')->updateOrInsert(
                ['codigo' => $muestra['codigo']], // Evita duplicados
                $muestra
            );
        }
    }
}
