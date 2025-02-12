<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Calidad;
use App\Models\TipoEstudio;

class CalidadSeeder extends Seeder
{
    public function run()
    {
        // Obtener los IDs de tipo_estudio
        $tipoEstudios = TipoEstudio::pluck('id', 'nombre')->toArray();

        // Insertar los datos en la tabla calidad usando Eloquent
        Calidad::create([
            'codigo' => 'C.1',
            'descripcion' => 'Toma válida para examen.',
            'tipoEstudio_id' => $tipoEstudios['Estudio Radiológico'],
        ]);

        Calidad::create([
            'codigo' => 'C.2',
            'descripcion' => 'Toma válida para examen aunque limitada por ausencia de células endocervicales/zona de transición.',
            'tipoEstudio_id' => $tipoEstudios['Estudio Clínico'],
        ]);

        Calidad::create([
            'codigo' => 'C.3',
            'descripcion' => 'Toma válida para examen aunque limitada por hemorragia.',
            'tipoEstudio_id' => $tipoEstudios['Estudio Radiológico'],
        ]);

        Calidad::create([
            'codigo' => 'C.4',
            'descripcion' => 'Toma válida para examen aunque limitada por escasez de células.',
            'tipoEstudio_id' => $tipoEstudios['Estudio Clínico'],
        ]);

        Calidad::create([
            'codigo' => 'C.5',
            'descripcion' => 'Toma válida para examen aunque limitada por intensa citolisis.',
            'tipoEstudio_id' => $tipoEstudios['Estudio Radiológico'],
        ]);
    }
}
