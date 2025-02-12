@extends('layouts.panel')

@section('title')
Panel
@endsection

@section('content')

<header class="relative bg-cover bg-center text-white text-center p-20" style="background-image: url('{{ asset('img/banner.png') }}');">
    <div class="absolute inset-0 bg-blue-700 opacity-60"></div>
    <div class="relative z-10">
        <h2 class="text-3xl font-bold">Genera y consulta informes fácilmente</h2>
        <p class="mt-4">Administra y visualiza todos tus informes en un solo lugar</p>
    </div>
</header class="">
<div class="container mx-auto px-4 py-12">
    <h3 class="text-3xl font-bold text-center text-blue-800 mb-10">🚀 Ventajas de hacer un informe</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Tarjeta 1 -->
        <div class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white shadow-xl rounded-3xl p-8 transform hover:scale-105 transition duration-300">
            <h4 class="text-2xl font-semibold mb-3">📂 Organización Eficiente</h4>
            <p class="text-base">Estructura la información de forma clara para un análisis más efectivo.</p>
        </div>

        <!-- Tarjeta 2 -->
        <div class="bg-gradient-to-r from-green-400 to-teal-500 text-white shadow-xl rounded-3xl p-8 transform hover:scale-105 transition duration-300">
            <h4 class="text-2xl font-semibold mb-3">💡 Toma de Decisiones</h4>
            <p class="text-base">Identifica datos clave para tomar decisiones estratégicas con confianza.</p>
        </div>

        <!-- Tarjeta 3 -->
        <div class="bg-gradient-to-r from-purple-500 to-pink-500 text-white shadow-xl rounded-3xl p-8 transform hover:scale-105 transition duration-300">
            <h4 class="text-2xl font-semibold mb-3">📊 Seguimiento Constante</h4>
            <p class="text-base">Monitorea el progreso de tus proyectos de manera continua y efectiva.</p>
        </div>
    </div>
</div>


@endsection

@vite(['resources/js/dashboard.js'])
