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

    public function getByCodigo($codigo)
    {
        $calidades = Calidad::where('codigo', 'like', "$codigo.%")
            ->get();

        return response()->json($calidades, 200);
    }

}
