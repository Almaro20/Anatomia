<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
})->name('welcome');*/

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/index', function () {
    return view('index');
})->name('index');
Route::get('/informe', function () {
    return view('informe');
})->name('informe');
Route::get('/muestras', function () {
    return view('muestras');
})->name('muestras');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard2');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
