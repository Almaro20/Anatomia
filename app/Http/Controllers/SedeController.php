<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    // Obtener todas las sedes
    public function index()
    {
        return response()->json(Sede::all());
    }

    // Crear una nueva sede
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $sede = Sede::create($request->all());
        return response()->json($sede, 201);
    }

    // Obtener una sede específica
    public function show($id)
    {
        return response()->json(Sede::findOrFail($id));
    }

    // Actualizar una sede
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $sede = Sede::findOrFail($id);
        $sede->update($request->all());
        return response()->json($sede);
    }

    // Eliminar una sede
    public function destroy($id)
    {
        Sede::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
