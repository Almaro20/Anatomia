<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TipoEstudio;
use Illuminate\Http\Request;

class TipoEstudioController extends Controller
{
    public function index()
    {
        return response()->json(TipoEstudio::all(), 200);
    }
}
