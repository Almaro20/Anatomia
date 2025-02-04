<?php

use App\Http\Controllers\SedeController;
use Illuminate\Support\Facades\Route;

Route::get('/sedes', [SedeController::class, 'index']);
Route::get('/sedes/{id}', [SedeController::class, 'show']);
