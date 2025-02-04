<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sede;

class SedeController extends Controller
{
    public function index()
    {
        return response()->json(Sede::all());
    }

    public function show($id)
    {
        $sede = Sede::find($id);
        if (!$sede) {
            return response()->json(['message' => 'Sede no encontrada'], 404);
        }
        return response()->json($sede);
    }
}
