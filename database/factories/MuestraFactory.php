<?php
namespace App\Http\Controllers;

use App\Models\Muestra;
use Illuminate\Http\Request;

class MuestraController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'codigo' => 'required|string|max:50',
            'fecha' => 'required|date',
            'tipoNaturaleza_id' => 'required|exists:tipo_naturaleza,tipoNaturaleza_id',
            'organo_id' => 'required|exists:organo,organo_id',
            'formato_id' => 'required|exists:formato,formato_id',
            'calidad_id' => 'required|exists:calidad,calidad_id',
            'sede_id' => 'required|exists:sede,sede_id',
            'descripcionMuestra' => 'nullable|string|max:255'
        ]);

        $muestra = Muestra::create($validatedData);

        return response()->json([
            'message' => 'Muestra guardada correctamente',
            'data' => $muestra
        ], 201);
    }
}
