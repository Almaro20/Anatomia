<?php

use Illuminate\Support\Facades\Route;


Route::get('/index', function () {
    return view('index');
});
Route::get('/informe', function () {
    return view('informe');
});
Route::get('/registro', function () {
    return view('registro');
});