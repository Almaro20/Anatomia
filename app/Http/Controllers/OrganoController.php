<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Organo;
use Illuminate\Http\Request;

class OrganoController extends Controller
{
    public function index()
    {
        return response()->json(Organo::all(), 200);
    }
}
