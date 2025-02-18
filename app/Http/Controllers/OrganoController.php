<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Organo;
use Illuminate\Http\Request;

class OrganoController extends Controller
{
    public function index()
    {
        return response()->json(Organo::all(), 200);
    }

    public function getOrganoByCodigo($codigo)
{
    $organo = Organo::where('codigo', $codigo)->first();

    if ($organo) {
        return response()->json(['nombre' => $organo->nombre], 200);
    } else {
        return response()->json(['error' => 'Órgano no encontrado'], 404);
    }
}

}

