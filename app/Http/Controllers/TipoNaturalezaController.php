<?php
namespace App\Http\Controllers;

use App\Models\TipoNaturaleza;
use Illuminate\Http\Request;

class TipoNaturalezaController extends Controller
{
    public function index()
    {
        return response()->json(TipoNaturaleza::all());
    }

    public function store(Request $request)
    {
        $tipo = TipoNaturaleza::create($request->all());
        return response()->json($tipo, 201);
    }

    public function show($id)
    {
        return response()->json(TipoNaturaleza::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $tipo = TipoNaturaleza::findOrFail($id);
        $tipo->update($request->all());
        return response()->json($tipo);
    }

    public function destroy($id)
    {
        TipoNaturaleza::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
