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
            Log::info("Iniciando carga de muestras con interpretaciones");

            // Primero verificar si hay muestras
            $muestrasCount = Muestra::count();
            Log::info("Total de muestras encontradas: " . $muestrasCount);

            // Cargar las muestras con sus relaciones
            $muestras = Muestra::with(['interpretaciones.interpretacion', 'tipoEstudio'])
                ->get();

            Log::info("Muestras cargadas con éxito", [
                'total_muestras' => $muestras->count(),
                'primera_muestra' => $muestras->first() ? [
                    'id' => $muestras->first()->id,
                    'codigo' => $muestras->first()->codigo
                ] : null
            ]);

            // Transformar los datos
            $muestrasFormateadas = $muestras->map(function ($muestra) {
                try {
                    return [
                        'id' => $muestra->id,
                        'codigo' => $muestra->codigo,
                        'descripcionMuestra' => $muestra->descripcionMuestra,
                        'tipoEstudio' => $muestra->tipoEstudio ? $muestra->tipoEstudio->nombre : null,
                        'organo' => $muestra->organo,
                        'interpretaciones' => $muestra->interpretaciones->map(function ($interp) {
                            return [
                                'id' => $interp->id,
                                'calidad' => $interp->calidad,
                                'interpretacion' => $interp->interpretacion ? [
                                    'id' => $interp->interpretacion->id,
                                    'codigo' => $interp->interpretacion->codigo,
                                    'descripcion' => $interp->interpretacion->descripcion
                                ] : null
                            ];
                        })->toArray()
                    ];
                } catch (\Exception $e) {
                    Log::error("Error procesando muestra ID: " . $muestra->id, [
                        'error' => $e->getMessage()
                    ]);
                    return null;
                }
            })->filter()->values();

            return response()->json([
                'status' => true,
                'message' => 'Listado recuperado exitosamente',
                'data' => $muestrasFormateadas
            ], 200);

        } catch (\Exception $e) {
            Log::error("Error en MuestrasInterpretacionController@index", [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
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

    public function create(Request $request)
    {
        try {
            Log::info("Iniciando creación de interpretación", [
                'request' => $request->all()
            ]);

            $request->validate([
                'idMuestras' => 'required|exists:muestra,id',
                'idInterpretacion' => 'required|exists:interpretacion,id'
            ]);

            $muestra = Muestra::with('tipoEstudio')->findOrFail($request->idMuestras);
            $interpretacion = Interpretacion::findOrFail($request->idInterpretacion);

            Log::info("Muestra e interpretación encontradas", [
                'muestra' => $muestra->toArray(),
                'interpretacion' => $interpretacion->toArray()
            ]);

            // Determinar qué código debería tener la interpretación
            $codigoEsperado = '';
            if ($muestra->tipoEstudio->nombre === 'Estudio de Biopsias') {
                $codigoEsperado = $muestra->organo . '.';
            } else {
                $codigoEsperado = $muestra->tipoEstudio->codigo . '.';
            }

            // Verificar que el código de la interpretación coincide exactamente
            if (!str_starts_with($interpretacion->codigo, $codigoEsperado)) {
                Log::warning("Código de interpretación no coincide", [
                    'esperado' => $codigoEsperado,
                    'recibido' => $interpretacion->codigo
                ]);

                return response()->json([
                    'status' => false,
                    'message' => 'La interpretación seleccionada no corresponde al tipo de estudio o órgano de la muestra'
                ], 400);
            }

            // Crear la relación
            $muestraInterpretacion = MuestrasInterpretacion::create([
                'idMuestras' => $request->idMuestras,
                'idInterpretacion' => $request->idInterpretacion
            ]);

            Log::info("Interpretación creada exitosamente", [
                'muestraInterpretacion' => $muestraInterpretacion->toArray()
            ]);

            $muestraInterpretacion->load(['muestra', 'interpretacion']);

            return response()->json([
                'status' => true,
                'message' => 'Interpretación creada exitosamente',
                'data' => $muestraInterpretacion
            ], 201);

        } catch (\Exception $e) {
            Log::error("Error creando interpretación", [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
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
