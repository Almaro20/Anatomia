<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Muestra;

class MuestraController extends Controller
{
    public function getAll() {
        return response()->json(Muestra::with('tipoNaturaleza', 'organo', 'formato', 'calidad', 'sede', 'user')->get(), 200);
    }

    public function create(Request $request) {
        $muestra = new Muestra();
        $muestra->codigo = $request->codigo;
        $muestra->fechaEntrada = $request->fechaEntrada;
        $muestra->organo = $request->organo;
        $muestra->descripcionMuestra = $request->descripcionMuestra;
        $muestra->tipoNaturaleza_id = $request->tipoNaturaleza_id;
        $muestra->formato_id = $request->formato_id;
        $muestra->calidad_id = $request->calidad_id;
        $muestra->sede_id = $request->sede_id;
        $muestra->user_id = $request->user_id;
        if ($muestra->save()) {
            return response()->json($muestra, 201);
        } else {
            return response()->json(['message' => 'No se ha podido crear la muestra'], 400);
        }
    }

    public function getById($id) {
        $muestra = Muestra::with('tipoNaturaleza', 'organo', 'formato', 'calidad', 'sede', 'user')->find($id);
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
        if ($muestra->update($request->all())) {
            return response()->json($muestra, 200);
        } else {
            return response()->json(['message' => 'No se ha podido actualizar la muestra'], 400);
        }
    }

    public function delete($id) {
        $muestra = Muestra::find($id);
        if (!$muestra) {
            return response()->json(['message' => 'Muestra no encontrada'], 404);
        }
        if ($muestra->delete()) {
            return response()->json(['message' => 'Muestra eliminada'], 200);
        } else {
            return response()->json(['message' => 'No se ha podido eliminar la muestra'], 400);
        }
    }
}

