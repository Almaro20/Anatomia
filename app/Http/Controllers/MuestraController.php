<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Muestra;

class MuestraController extends Controller
{
    public function getAll() {
        return response()->json(Muestra::all(), 200);
    }

    public function create(Request $request) {
        $muestra = Muestra::create($request->all());
        return response()->json($muestra, 201);
    }

    public function getById($id) {
        $muestra = Muestra::find($id);
        if (!$muestra) {
            return response()->json(['message' => 'Muestra no encontrada'], 404);
        }
        return response()->json($muestra, 200);
    }

    public function update(Request $request, $id) {
        $muestra = Muestra::find($id);
        if (!$muestra) {
            return response()->json(['message' => 'Muestra no encontrada'], 404);
        }
        $muestra->update($request->all());
        return response()->json($muestra, 200);
    }

    public function delete($id) {
        $muestra = Muestra::find($id);
        if (!$muestra) {
            return response()->json(['message' => 'Muestra no encontrada'], 404);
        }
        $muestra->delete();
        return response()->json(['message' => 'Muestra eliminada'], 200);
    }
}
