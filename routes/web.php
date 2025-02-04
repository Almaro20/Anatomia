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
Route::get('/login', function () {
    return view('login');
});
Route::get('/muestra', function () {
    return view('muestra');
});