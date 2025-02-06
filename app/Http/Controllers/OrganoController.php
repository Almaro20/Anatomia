<?php

namespace App\Http\Controllers;

use App\Models\Organo;
use Illuminate\Http\Request;

class OrganoController extends Controller
{
    // Obtener todos los órganos
    public function index()
    {
        return response()->json(Organo::all());
    }

    // Crear un nuevo órgano
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:10|unique:organo,codigo',
            'nombre' => 'required|string|max:50',
        ]);

        $organo = Organo::create($request->all());
        return response()->json($organo, 201);
    }

    // Obtener un órgano por ID
    public function show($id)
    {
        return response()->json(Organo::findOrFail($id));
    }

    // Actualizar un órgano existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'codigo' => 'required|string|max:10',
            'nombre' => 'required|string|max:50',
        ]);

        $organo = Organo::findOrFail($id);
        $organo->update($request->all());
        return response()->json($organo);
    }

    // Eliminar un órgano
    public function destroy($id)
    {
        Organo::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
