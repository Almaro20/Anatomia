<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Formato;
use Illuminate\Http\Request;

class FormatoController extends Controller
{
    public function index()
    {
        return response()->json(Formato::all(), 200);
    }
}
