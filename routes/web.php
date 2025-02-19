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

Route::get('/informe', function () {
    return view('informe');
})->middleware(['auth', 'verified'])->name('informe');
Route::get('/usuarios', function () {
    return view('usuarios');
})->middleware(['auth', 'verified'])->name('usuarios');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/principal', function () {
    return view('principal');
})->name('principal');


Route::get('/imprimir/muestra/{id}', [PDFController::class, 'generarPDF']);


Route::middleware('auth')->group(function () { //esto es pa la movida esa d tener q loguearte
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Para ver las rutas disponibles
Route::get('/rutas', [ApiListController::class, 'listarRutas']);


require __DIR__.'/auth.php';






Route::post('/subir-imagen', [ImagenController::class, 'subirImagen'])
->name('subir-imagen');


Route::get('/imagen', function () {
    return view('imagen');
})->name('imagen');
