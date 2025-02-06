<?php

namespace App\Http\Controllers;

use App\Models\Muestra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
     * Guardar una nueva muestra.
     */
    public function store(Request $request)
{
    Log::info('Datos recibidos en la solicitud:', $request->all());

    try {
        $validatedData = $request->validate([
            'codigo' => 'required|string|max:50',
            'fechaEntrada' => 'required|date',
            'tipoNaturaleza_id' => 'required|exists:tipo_naturaleza,tipoNaturaleza_id',
            'organo' => 'required|in:B,BV,CB,CV,EX,O,E,ES,T,F', 
            'formato_id' => 'required|exists:formato,formato_id',
            'calidad_id' => 'required|exists:calidad,calidad_id',
            'sede_id' => 'required|exists:sede,sede_id',
            'descripcionMuestra' => 'nullable|string',
            'tipoEstudio_id' => 'nullable|exists:tipo_estudio,tipoEstudio_id',
        ]);

        if (!isset($validatedData['tipoEstudio_id'])) {
            $validatedData['tipoEstudio_id'] = 1; // Valor por defecto
        }

        $muestra = Muestra::create($validatedData);

        Log::info('Muestra creada correctamente:', $muestra->toArray());

        return response()->json([
            'success' => true,
            'message' => 'Muestra guardada correctamente',
            'data' => $muestra
        ], 201);
    } catch (\Exception $e) {
        Log::error('Error al guardar la muestra:', ['error' => $e->getMessage()]);

        return response()->json([
            'success' => false,
            'message' => 'Error al guardar la muestra',
            'error' => $e->getMessage()
        ], 500);
    }
}




}
