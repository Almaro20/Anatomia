<?php

use App\Http\Controllers\ApiListController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ImagenController;

/*Route::get('/', function () {
    return view('welcome');
})->name('welcome');*/

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/informe', function () {
        return view('informe');
    })->name('informe');

    Route::get('/usuarios', function () {
        return view('usuarios');
    })->name('usuarios');

    Route::get('/imprimir/muestra/{id}', [PDFController::class, 'generarPDF'])
        ->name('imprimir.muestra');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/principal', function () {
    return view('principal');
})->name('principal');

Route::get('/interpretaciones', function () {
    return view('interpretaciones');
})->name('interpretaciones');

// Para ver las rutas disponibles
Route::get('/rutas', [ApiListController::class, 'listarRutas']);

Route::post('/subir-imagen', [ImagenController::class, 'subirImagen'])
    ->name('subir-imagen');

Route::get('/imagen', function () {
    return view('imagen');
})->name('imagen');

require __DIR__.'/auth.php';
