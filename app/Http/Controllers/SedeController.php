<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sede;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    public function index()
    {
        return response()->json(Sede::all(), 200);
    }
}
