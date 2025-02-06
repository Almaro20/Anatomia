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

// Rutas de Muestra (CRUD)
Route::prefix('muestras')->group(function () {
    Route::get('/', [MuestraController::class, 'index']); // Listar todas las muestras
    Route::post('/', [MuestraController::class, 'store']); // Crear una muestra
    Route::get('/{id}', [MuestraController::class, 'show']); // Ver una muestra específica
    Route::put('/{id}', [MuestraController::class, 'update']); // Actualizar muestra
    Route::delete('/{id}', [MuestraController::class, 'destroy']); // Eliminar muestra
});


Route::get('/sedes', [SedeController::class, 'index']);

Route::get('/tipo-naturaleza', [TipoNaturalezaController::class, 'index']);

Route::get('/calidades', [CalidadController::class, 'index']);

Route::get('/organos', [OrganoController::class, 'index']);

Route::get('/insertar-muestra-prueba', [MuestraController::class, 'insertarMuestraPrueba']);


