<?php

namespace App\Http\Controllers;

use App\Models\Calidad;
use Illuminate\Http\Request;

class CalidadController extends Controller
{
    // Obtener todas las calidades
    public function index()
    {
        return response()->json(Calidad::all());
    }

    // Crear una nueva calidad
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:10|unique:calidad,codigo',
            'descripcion' => 'required|string|max:255',
        ]);

        $calidad = Calidad::create($request->all());
        return response()->json($calidad, 201);
    }

    // Obtener una calidad específica por ID
    public function show($id)
    {
        return response()->json(Calidad::findOrFail($id));
    }

    // Actualizar una calidad existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'codigo' => 'required|string|max:10',
            'descripcion' => 'required|string|max:255',
        ]);

        $calidad = Calidad::findOrFail($id);
        $calidad->update($request->all());
        return response()->json($calidad);
    }

    // Eliminar una calidad
    public function destroy($id)
    {
        Calidad::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
