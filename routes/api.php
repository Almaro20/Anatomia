<?php

use App\Http\Controllers\SedeController;
use Illuminate\Support\Facades\Route;

Route::get('api/sedes', [SedeController::class, 'index']);
Route::get('api/sedes/{id}', [SedeController::class, 'show']);
