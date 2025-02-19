<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;


class ApiListController extends Controller
{

public function listarRutas()
{
    $rutas = collect(Route::getRoutes())->map(function ($route) {
        return [
            'uri' => $route->uri(),
            'name' => $route->getName(),
            'method' => implode(', ', $route->methods()),
            'action' => $route->getActionName(),
        ];
    });

    return view('rutas', compact('rutas'));
}

}
