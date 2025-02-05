<?php

namespace App\Http\Controllers;

use App\Models\Muestra;
use Illuminate\Http\Request;

class MuestraController extends Controller
{
    public function index() {
        return response()->json(Muestra::all());
    }

    public function store(Request $request) {
        $muestra = Muestra::create($request->all());
        return response()->json($muestra, 201);
    }

    public function show($id) {
        return response()->json(Muestra::findOrFail($id));
    }

    public function update(Request $request, $id) {
        $muestra = Muestra::findOrFail($id);
        $muestra->update($request->all());
        return response()->json($muestra);
    }

    public function destroy($id) {
        Muestra::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
