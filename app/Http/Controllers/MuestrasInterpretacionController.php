<?php

namespace App\Http\Controllers;

use App\Models\Muestra;
use App\Models\Interpretacion;
use App\Models\MuestrasInterpretacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MuestrasInterpretacionController extends Controller
{
    public function index()
    {
        try {
            $muestrasInterpretaciones = MuestrasInterpretacion::with([
                'muestra.tipoEstudio',
                'interpretacion'
            ])
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'muestra' => [
                        'id' => $item->muestra->id,
                        'codigo' => $item->muestra->codigo,
                        'organo' => $item->muestra->organo,
                        'tipoEstudio' => $item->muestra->tipoEstudio->nombre ?? 'No disponible'
                    ],
                    'interpretacion' => [
                        'id' => $item->interpretacion->id,
                        'codigo' => $item->interpretacion->codigo,
                        'descripcion' => $item->interpretacion->descripcion
                    ],
                    'descripcion' => $item->descripcion
                ];
            });

            return response()->json([
                'status' => true,
                'message' => 'Listado obtenido exitosamente',
                'data' => $muestrasInterpretaciones
            ]);

        } catch (\Exception $e) {
            \Log::error('Error en MuestrasInterpretacionController@index', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);

            return response()->json([
                'status' => false,
                'message' => 'Error al obtener el listado',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Método para obtener interpretaciones disponibles para una muestra
    public function getInterpretacionesDisponibles($muestraId)
    {
        try {
            $muestra = Muestra::with('tipoEstudio')->findOrFail($muestraId);
            Log::info("Muestra encontrada:", ['muestra' => $muestra->toArray()]);

            // Determinar qué código usar para filtrar
            $codigoFiltro = '';
            if ($muestra->tipoEstudio->nombre === 'Estudio de Biopsias') {
                // Si es biopsia, usar el código del órgano exacto
                $codigoFiltro = $muestra->organo;
                // Modificamos la consulta para que coincida exactamente con el código
                $interpretaciones = Interpretacion::where('codigo', 'like', $codigoFiltro . '.%')
                    ->orderBy('codigo')
                    ->get();
            } else {
                // Si no es biopsia, usar el código del tipo de estudio
                $codigoFiltro = $muestra->tipoEstudio->codigo;
                $interpretaciones = Interpretacion::where('codigo', 'like', $codigoFiltro . '.%')
                    ->orderBy('codigo')
                    ->get();
            }

            Log::info("Código de filtro a usar: " . $codigoFiltro);
            Log::info("Interpretaciones encontradas: " . $interpretaciones->count(), [
                'interpretaciones' => $interpretaciones->toArray()
            ]);

            return response()->json([
                'status' => true,
                'data' => $interpretaciones,
                'muestra' => [
                    'organo' => $muestra->organo,
                    'tipoEstudio' => $muestra->tipoEstudio->nombre,
                    'codigoFiltro' => $codigoFiltro
                ]
            ], 200);
        } catch (\Exception $e) {
            Log::error("Error obteniendo interpretaciones", [
                'muestraId' => $muestraId,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'status' => false,
                'message' => 'Error al obtener interpretaciones',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            \Log::info('Datos recibidos:', $request->all());

            $validated = $request->validate([
                'idMuestras' => 'required|exists:muestra,id',
                'idInterpretacion' => 'required|exists:interpretacion,id',
                'descripcion' => 'nullable|string'
            ]);

            \Log::info('Datos validados:', $validated);

            $muestraInterpretacion = MuestrasInterpretacion::create([
                'idMuestras' => $request->idMuestras,
                'idInterpretacion' => $request->idInterpretacion,
                'descripcion' => $request->descripcion
            ]);

            \Log::info('Interpretación creada:', $muestraInterpretacion->toArray());

            return response()->json([
                'status' => true,
                'message' => 'Interpretación creada exitosamente',
                'data' => $muestraInterpretacion->load(['interpretacion', 'muestra'])
            ], 201);

        } catch (\Exception $e) {
            \Log::error('Error en store:', [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ]);

            return response()->json([
                'status' => false,
                'message' => 'Error al crear la interpretación',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getById($id)
    {
        try {
            $muestraInterpretacion = MuestrasInterpretacion::with(['muestra', 'interpretacion'])->findOrFail($id);
            return response()->json([
                'status' => true,
                'message' => 'Muestra interpretación recuperada exitosamente',
                'data' => $muestraInterpretacion
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error al obtener la muestra interpretación',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'calidad' => 'required|string',
                'idMuestras' => 'required|exists:muestra,id',
                'idInterpretacion' => 'required|exists:interpretacion,id'
            ]);

            $muestraInterpretacion = MuestrasInterpretacion::findOrFail($id);
            $muestraInterpretacion->update($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Muestra interpretación actualizada exitosamente',
                'data' => $muestraInterpretacion
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error al actualizar la muestra interpretación',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function delete($id)
    {
        try {
            $muestraInterpretacion = MuestrasInterpretacion::findOrFail($id);
            $muestraInterpretacion->delete();

            return response()->json([
                'status' => true,
                'message' => 'Muestra interpretación eliminada exitosamente'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error al eliminar la muestra interpretación',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
