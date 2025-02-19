<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TipoNaturaleza;
use Illuminate\Http\Request;

class TipoNaturalezaController extends Controller
{
    public function index()
    {
        return response()->json(TipoNaturaleza::all(), 200);
    }

    public function getByTipoEstudio($tipoEstudioId)
    {
    $tiposNaturaleza = TipoNaturaleza::where('tipoEstudio_id', $tipoEstudioId)->get();
    return response()->json($tiposNaturaleza);
    }
}


