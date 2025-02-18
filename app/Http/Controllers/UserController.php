<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all(), 200);
    }

    public function create(Request $request)
    {
        $User = User::create($request->all());
        return response()->json($User, 201);
    }

    public function getById($id)
    {
        $User = User::find($id);
        if (!$User) {
            return response()->json(['message' => 'User no encontrado'], 404);
        }
        return response()->json($User, 200);
    }

    public function update(Request $request, $id)
    {
        $User = User::find($id);
        if (!$User) {
            return response()->json(['message' => 'User no encontrado'], 404);
        }
        $User->update($request->all());
        return response()->json($User, 200);
    }

    public function delete($id)
    {
        $User = User::find($id);
        if (!$User) {
            return response()->json(['message' => 'User no encontrado'], 404);
        }
        $User->delete();
        return response()->json(['message' => 'User eliminado'], 200);
    }
}

