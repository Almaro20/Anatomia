<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuestraController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TipoNaturalezaController;

// Ruta protegida para obtener el usuario autenticado (requiere Sanctum)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas de Muestra (CRUD)
Route::prefix('muestras')->group(function () {
    Route::get('/', [MuestraController::class, 'index']); // Listar todas las muestras
    Route::post('/', [MuestraController::class, 'store']); // Crear una muestra
    Route::get('/{id}', [MuestraController::class, 'show']); // Ver una muestra específica
    Route::put('/{id}', [MuestraController::class, 'update']); // Actualizar muestra
    Route::delete('/{id}', [MuestraController::class, 'destroy']); // Eliminar muestra
});

Route::prefix('tipo-naturaleza')->group(function () {
    Route::get('/', [TipoNaturalezaController::class, 'index']); // Listar todos los tipos de naturaleza
    Route::post('/', [TipoNaturalezaController::class, 'store']); // Crear un nuevo tipo de naturaleza
    Route::get('/{id}', [TipoNaturalezaController::class, 'show']); // Ver un tipo de naturaleza específico
    Route::put('/{id}', [TipoNaturalezaController::class, 'update']); // Actualizar un tipo de naturaleza
    Route::delete('/{id}', [TipoNaturalezaController::class, 'destroy']); // Eliminar un tipo de naturaleza
});


Route::get('/tipo-naturaleza', [TipoNaturalezaController::class, 'index']);

