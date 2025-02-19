<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Calidad;
use Illuminate\Http\Request;

class CalidadController extends Controller
{
    public function index()
    {
        return response()->json(Calidad::all(), 200);
    }

    public function getByTipo(Request $request, $tipo)
    {
        // Filtrar por prefijo en el código
        $calidades = Calidad::where('codigo', 'LIKE', "$tipo.%")->get();

        if ($calidades->isEmpty()) {
            return response()->json(['message' => 'No se encontraron calidades para el tipo especificado'], 404);
        }

        return response()->json($calidades, 200);
    }
}

