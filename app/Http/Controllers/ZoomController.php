<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zoom;

class ZoomController extends Controller
{
    public function index()
    {
        return response()->json(Zoom::all(), 200);
    }
}
