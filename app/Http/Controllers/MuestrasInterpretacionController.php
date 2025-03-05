<?php

namespace App\Http\Controllers;

use App\Models\MuestrasInterpretacion;
use Illuminate\Http\Request;

class MuestrasInterpretacionController extends Controller
{
    public function index()
    {
        try {
            $muestrasInterpretaciones = MuestrasInterpretacion::with(['muestra', 'interpretacion'])->get();
            return response()->json([
                'status' => true,
                'message' => 'Listado de muestras interpretaciones recuperado exitosamente',
                'data' => $muestrasInterpretaciones
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error al obtener el listado de muestras interpretaciones',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'calidad' => 'required|string',
                'idMuestras' => 'required|exists:muestra,id',
                'idInterpretacion' => 'required|exists:interpretacion,id'
            ]);

            $muestraInterpretacion = MuestrasInterpretacion::create($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Muestra interpretación creada exitosamente',
                'data' => $muestraInterpretacion
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error al crear la muestra interpretación',
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
