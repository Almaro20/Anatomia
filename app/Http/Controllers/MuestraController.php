<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Muestra;
use Illuminate\Http\Request;

class MuestraController extends Controller
{
    public function index()
    {
        return response()->json(Muestra::all(), 200);
    }

    public function store(Request $request)
    {
        $muestra = Muestra::create($request->all());
        return response()->json($muestra, 201);
    }

    public function show($id)
    {
        return response()->json(Muestra::findOrFail($id), 200);
    }

    public function update(Request $request, $id)
    {
        $muestra = Muestra::findOrFail($id);
        $muestra->update($request->all());
        return response()->json($muestra, 200);
    }

    public function destroy($id)
    {
        Muestra::destroy($id);
        return response()->json(null, 204);
    }
}
