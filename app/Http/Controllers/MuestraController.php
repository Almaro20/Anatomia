<?php

namespace App\Http\Controllers;

use App\Models\Muestra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MuestraController extends Controller
{
    /**
     * Listar todas las muestras.
     */
    public function index()
    {
        try {
            $muestras = Muestra::all();
            return response()->json($muestras, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener las muestras', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Crear una nueva muestra.
     */
    public function store(Request $request)
    {
        // Validaciones
        $validatedData = $request->validate([
            'codigo' => 'required|string|max:50',
            'fecha' => 'required|date',
            'tipoNaturaleza_id' => 'required|exists:tipo_naturaleza,tipoNaturaleza_id',
            'organo_id' => 'required|exists:organo,organo_id',
            'formato_id' => 'required|exists:formato,formato_id',
            'calidad_id' => 'required|exists:calidad,calidad_id',
            'sede_id' => 'required|exists:sede,sede_id',
            'descripcionMuestra' => 'nullable|string'
        ]);

        try {
            // Crear la muestra
            $muestra = Muestra::create($validatedData);
            return response()->json(['message' => 'Muestra creada correctamente', 'data' => $muestra], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear la muestra', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Mostrar una muestra específica.
     */
    public function show($id)
    {
        try {
            $muestra = Muestra::findOrFail($id);
            return response()->json($muestra, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Muestra no encontrada', 'error' => $e->getMessage()], 404);
        }
    }

    /**
     * Actualizar una muestra existente.
     */
    public function update(Request $request, $id)
    {
        // Validaciones
        $validatedData = $request->validate([
            'codigo' => 'sometimes|string|max:50',
            'fecha' => 'sometimes|date',
            'tipoNaturaleza_id' => 'sometimes|exists:tipo_naturaleza,tipoNaturaleza_id',
            'organo_id' => 'sometimes|exists:organo,organo_id',
            'formato_id' => 'sometimes|exists:formato,formato_id',
            'calidad_id' => 'sometimes|exists:calidad,calidad_id',
            'sede_id' => 'sometimes|exists:sede,sede_id',
            'descripcionMuestra' => 'nullable|string'
        ]);

        try {
            $muestra = Muestra::findOrFail($id);
            $muestra->update($validatedData);
            return response()->json(['message' => 'Muestra actualizada correctamente', 'data' => $muestra], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar la muestra', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Eliminar una muestra.
     */
    public function destroy($id)
    {
        try {
            $muestra = Muestra::findOrFail($id);
            $muestra->delete();
            return response()->json(['message' => 'Muestra eliminada correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar la muestra', 'error' => $e->getMessage()], 500);
        }
    }

    public function insertarMuestraPrueba()
{
    DB::table('muestra')->insert([
        'codigo' => '005',
        'fecha' => '2025-01-05',
        'tipoNaturaleza_id' => 1,
        'organo_id' => 1,
        'formato_id' => 1,
        'calidad_id' => 1,
        'sede_id' => 1,
        'descripcionMuestra' => 'Insertado desde el controlador'
    ]);

    return response()->json(['message' => 'Muestra insertada correctamente'], 201);
}

}


