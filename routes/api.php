<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZoomController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\OrganoController;
use App\Http\Controllers\CalidadController;
use App\Http\Controllers\FormatoController;
use App\Http\Controllers\MuestraController;
use App\Http\Controllers\TipoEstudioController;
use App\Http\Controllers\InterpretacionController;
use App\Http\Controllers\TipoNaturalezaController;
use App\Http\Controllers\MuestrasInterpretacionController;

Route::prefix('v1')->group(function () {
    Route::get('organos', [OrganoController::class, 'index']);
    Route::get('/organo/{codigo}', [OrganoController::class, 'getOrganoByCodigo']);
    Route::get('sedes', [SedeController::class, 'index']);
    Route::get('tipos-estudio', [TipoEstudioController::class, 'index']);
    Route::get('tipos-naturaleza', [TipoNaturalezaController::class, 'index']);
    Route::get('calidades', [CalidadController::class, 'index']);
    Route::get('formatos', [FormatoController::class, 'index']);
    Route::get('imagenes', [ImagenController::class, 'index']);
    Route::get('/zooms', [ZoomController::class, 'index']);
    Route::post('imagenes/subir', [ImagenController::class, 'subirImagen']);
    Route::post('imagenes/subir-multiple', [ImagenController::class, 'subirImagenes']);
    Route::delete('imagenes/{id}', [ImagenController::class, 'eliminarImagen']);
    Route::get('imagenes/{id}', [ImagenController::class, 'obtenerImagen']);
});

Route::prefix('v2')->group(function () {
    Route::get('muestras/listar', [MuestraController::class, 'getAll']);
    Route::post('muestras/crear', [MuestraController::class, 'create']);
    Route::get('muestras/ver/{id}', [MuestraController::class, 'getById']);
    Route::put('muestras/editar/{id}', [MuestraController::class, 'update']);
    Route::delete('muestras/eliminar/{id}', [MuestraController::class, 'delete']);

});


Route::prefix('v3')->group(function () {
    Route::get('usuarios/listar', [UserController::class, 'index']);
    Route::post('usuarios/crear', [UserController::class, 'create']);
    Route::get('usuarios/ver/{id}', [UserController::class, 'getById']);
    Route::put('usuarios/editar/{id}', [UserController::class, 'update']);
    Route::delete('usuarios/eliminar/{id}', [UserController::class, 'delete']);

});

Route::prefix('v4')->group(function () {
    Route::get('calidades', [CalidadController::class, 'index']);
    Route::get('/calidades/{codigo}', [CalidadController::class, 'getByCodigo']);

    Route::get('/interpretaciones', [InterpretacionController::class, 'index']);
    Route::get('/interpretaciones/{codigo}', [InterpretacionController::class, 'getByCodigo']);
});

Route::prefix('v5')->group(function () {
    Route::get('muestras-interpretacion/listar', [MuestrasInterpretacionController::class, 'index']);
    Route::post('muestras-interpretacion/crear', [MuestrasInterpretacionController::class, 'create']);
    Route::get('muestras-interpretacion/ver/{id}', [MuestrasInterpretacionController::class, 'getById']);
    Route::put('muestras-interpretacion/editar/{id}', [MuestrasInterpretacionController::class, 'update']);
    Route::delete('muestras-interpretacion/eliminar/{id}', [MuestrasInterpretacionController::class, 'delete']);
    Route::get('muestras-interpretacion/interpretaciones-disponibles/{muestraId}',
        [MuestrasInterpretacionController::class, 'getInterpretacionesDisponibles']);
});

// En api.php
Route::get('tipos-estudio', [TipoEstudioController::class, 'index']);
Route::get('tipos-naturaleza/{tipoEstudioId}', [TipoNaturalezaController::class, 'getByTipoEstudio']);
Route::get('organos', [OrganoController::class, 'index']);
Route::get('calidades/tipo-naturaleza/{tipoNaturalezaId}', [CalidadController::class, 'getByTipoNaturaleza']);
Route::get('calidades/organo/{organoId}', [CalidadController::class, 'getByOrgano']);
