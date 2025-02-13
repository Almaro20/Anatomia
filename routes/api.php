<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuestraController;
use App\Http\Controllers\OrganoController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\TipoEstudioController;
use App\Http\Controllers\TipoNaturalezaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CalidadController;
use App\Http\Controllers\FormatoController;
use App\Http\Controllers\ImagenController;

Route::prefix('v1')->group(function () {
    Route::get('muestras/listar', [MuestraController::class, 'getAll']);
    Route::post('muestras/crear', [MuestraController::class, 'create']);
    Route::get('muestras/ver/{id}', [MuestraController::class, 'getById']);
    Route::put('muestras/editar/{id}', [MuestraController::class, 'update']);
    Route::delete('muestras/eliminar/{id}', [MuestraController::class, 'delete']);
    Route::get('organos', [OrganoController::class, 'index']);
    Route::get('sedes', [SedeController::class, 'index']);
    Route::get('tipos-estudio', [TipoEstudioController::class, 'index']);
    Route::get('tipos-naturaleza', [TipoNaturalezaController::class, 'index']);
    Route::get('usuarios', [UserController::class, 'index']);
    Route::get('calidades', [CalidadController::class, 'index']);
    Route::get('formatos', [FormatoController::class, 'index']);
    Route::get('imagenes', [ImagenController::class, 'index']);
});

