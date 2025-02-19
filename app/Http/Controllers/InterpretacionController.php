<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Interpretacion;
use Illuminate\Http\Request;

class InterpretacionController extends Controller
{
    public function index()
    {
        return response()->json(Interpretacion::all(), 200);
    }

    public function getByCodigo($codigo)
    {
        $interpretaciones = Interpretacion::where('codigo', 'like', "$codigo.%") // Busca con el número antes del punto
            ->get();

        return response()->json($interpretaciones, 200);
    }
}
