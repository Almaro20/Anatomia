<?php

namespace App\Http\Controllers;

use App\Models\Organo;
use App\Models\Calidad;
use Illuminate\Http\Request;
use App\Models\TipoNaturaleza;
use App\Http\Controllers\Controller;

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

    // CalidadController.php
    public function getByTipoNaturaleza($tipoNaturalezaId)
    {
    $calidades = Calidad::where('tipoNaturaleza_id', $tipoNaturalezaId)->get();
    return response()->json($calidades);
    }

    public function getByOrgano($organoId)
{
    $organo = Organo::findOrFail($organoId);
    $calidades = Calidad::where('codigo', 'LIKE', $organo->codigo . '%')->get();
    return response()->json($calidades);
}
}