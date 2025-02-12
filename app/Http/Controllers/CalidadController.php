<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Calidad;
use Illuminate\Http\Request;

class CalidadController extends Controller
{
    public function index()
    {
        return response()->json(Calidad::all(), 200);
    }
}
