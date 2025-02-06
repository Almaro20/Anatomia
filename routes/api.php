<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuestraController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TipoNaturalezaController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\CalidadController;
use App\Http\Controllers\OrganoController;


// Ruta protegida para obtener el usuario autenticado (requiere Sanctum)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/muestras', [MuestraController::class, 'index']);
Route::post('/muestras', [MuestraController::class, 'store']);
Route::get('/tipo-naturaleza', [TipoNaturalezaController::class, 'index']);
Route::get('/organos', [OrganoController::class, 'index']);
Route::get('/calidades', [CalidadController::class, 'index']);
Route::get('/sedes', [SedeController::class, 'index']);


