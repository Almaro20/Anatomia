<?php

namespace App\Http\Controllers;

use App\Models\Muestra;
use Illuminate\Http\Request;

class MuestraController extends Controller
{
    // Obtener todas las muestras
    public function index() {
        return response()->json(Muestra::all());
    }

    // Guardar una nueva muestra con validación
    public function store(Request $request) {
        $request->validate([
            'codigo' => 'required|string|max:50',
            'fecha' => 'required|date',
            'tipoNaturaleza_id' => 'required|exists:tipo_naturaleza,tipoNaturaleza_id',
            'formato_id' => 'required|exists:formato,formato_id',
            'calidad_id' => 'required|exists:calidad,calidad_id',
            'sede_id' => 'required|exists:sede,sede_id',
            'organo_id' => 'nullable|exists:organo,organo_id',
            'descripcionMuestra' => 'nullable|string',
            'userCreador_id' => 'required|exists:users,id'
        ]);

        // Guardar la nueva muestra
        $muestra = Muestra::create($request->all());

        return response()->json([
            'message' => 'Muestra guardada correctamente',
            'data' => $muestra
        ], 201);
    }

    // Obtener una muestra específica
    public function show($id) {
        return response()->json(Muestra::findOrFail($id));
    }

    // Actualizar una muestra con validación
    public function update(Request $request, $id) {
        $request->validate([
            'codigo' => 'required|string|max:50',
            'fecha' => 'required|date',
            'tipoNaturaleza_id' => 'required|exists:tipo_naturaleza,tipoNaturaleza_id',
            'formato_id' => 'required|exists:formato,formato_id',
            'calidad_id' => 'required|exists:calidad,calidad_id',
            'sede_id' => 'required|exists:sede,sede_id',
            'organo_id' => 'nullable|exists:organo,organo_id',
            'descripcionMuestra' => 'nullable|string',
            'userCreador_id' => 'required|exists:users,id'
        ]);

        $muestra = Muestra::findOrFail($id);
        $muestra->update($request->all());

        return response()->json([
            'message' => 'Muestra actualizada correctamente',
            'data' => $muestra
        ]);
    }

    // Eliminar una muestra
    public function destroy($id) {
        Muestra::findOrFail($id)->delete();
        return response()->json(['message' => 'Muestra eliminada correctamente'], 204);
    }
}
