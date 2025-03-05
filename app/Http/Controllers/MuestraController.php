<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Muestra;
use Illuminate\Support\Facades\Log;

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
        try {
            $muestra = Muestra::findOrFail($id);
            
            // Primero eliminamos las interpretaciones asociadas usando forceDelete
            $muestra->interpretaciones()->forceDelete();
            
            // Luego eliminamos la muestra
            $muestra->delete();
            
            return response()->json(['message' => 'Muestra eliminada correctamente'], 200);
        } catch (\Exception $e) {
            \Log::error('Error al eliminar muestra: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error al eliminar la muestra: ' . $e->getMessage(),
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
