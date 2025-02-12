<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MuestraSeeder extends Seeder
{
    public function run()
    {
        // Obtener los IDs reales de las tablas relacionadas
        $tipoNaturaleza = DB::table('tipo_naturaleza')->pluck('id')->toArray();
        $formato = DB::table('formato')->pluck('id')->toArray();
        $calidad = DB::table('calidad')->pluck('id')->toArray();
        $tipoEstudio = DB::table('tipo_estudio')->pluck('id')->toArray();
        $sede = DB::table('sede')->pluck('id')->toArray();
        $users = DB::table('user')->pluck('id')->toArray(); // Asegúrate de usar la clave primaria 'id'

        // Validar que todas las referencias existen antes de insertar
        if (count($tipoNaturaleza) === 0 || count($formato) === 0 || count($calidad) === 0 || count($tipoEstudio) === 0 || count($sede) === 0 || count($users) === 0) {
            return;
        }

        // Insertar datos evitando duplicados
        $muestras = [
            [
                'codigo' => 'M001',
                'fechaEntrada' => '2024-02-06',
                'organo' => 'B',
                'descripcionMuestra' => 'Muestra de tejido blando.',
                'tipo_naturaleza_id' => $tipoNaturaleza[0], // Corregido: nombre clave
                'formato_id' => $formato[0],
                'calidad_id' => $calidad[0],
                'tipo_estudio_id' => $tipoEstudio[0], // Corregido: nombre clave
                'sede_id' => $sede[0],
                'userCreador_id' => $users[0],
            ],
            [
                'codigo' => 'M002',
                'fechaEntrada' => '2024-02-06',
                'organo' => 'CV',
                'descripcionMuestra' => 'Muestra de tejido cardiaco.',
                'tipo_naturaleza_id' => $tipoNaturaleza[1],
                'formato_id' => $formato[1],
                'calidad_id' => $calidad[1],
                'tipo_estudio_id' => $tipoEstudio[1],
                'sede_id' => $sede[1],
                'userCreador_id' => $users[1],
            ]
        ];

        foreach ($muestras as $muestra) {
            DB::table('muestra')->updateOrInsert(
                ['codigo' => $muestra['codigo']], // Evitar duplicados usando 'codigo'
                $muestra
            );
        }
    }
}
