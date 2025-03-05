@extends('layouts.panel')

@section('title')
Clinica SerranitoxXx
@endsection

@section('content')
<header class="relative bg-cover bg-center text-white p-24 md:p-32 overflow-hidden" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{ asset('img/banner.png') }}');">
    <div class="absolute inset-0 bg-gradient-to-r from-blue-600/80 to-blue-900/80 transform scale-105"></div>
    <div class="relative z-10 max-w-4xl mx-auto text-center">
        <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight animate-fade-in">
            Genera y consulta informes fácilmente
        </h2>
        <p class="mt-6 text-xl md:text-2xl text-gray-100 leading-relaxed">
            Administra y visualiza todos tus informes en un solo lugar
        </p>
        <div class="mt-8 flex justify-center gap-4">
            <a href="{{ route('informe') }}" class="inline-flex items-center px-6 py-3 rounded-lg bg-white text-blue-600 font-semibold hover:bg-gray-100 transition duration-300 transform hover:scale-105">
                <span class="material-icons-round mr-2">add_circle</span>
                Crear Informe
            </a>
        </div>
    </div>
</header>



<!-- Ventajas -->
<div id="ventajas" class="container mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h3 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">
            🚀 Ventajas de hacer un informe
        </h3>
        <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
            Optimiza tu trabajo y mejora la toma de decisiones con nuestras herramientas especializadas
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Tarjeta 1 -->
        <div class="group bg-white border border-gray-200 rounded-2xl p-8 hover:shadow-xl transition duration-300">
            <div class="bg-blue-500/10 rounded-xl p-3 inline-block group-hover:bg-blue-500 transition-colors duration-300">
                <span class="material-icons-round text-3xl text-blue-500 group-hover:text-white">folder</span>
            </div>
            <h4 class="text-xl font-semibold text-gray-900 mt-4">Organización Eficiente</h4>
            <p class="mt-2 text-gray-600 leading-relaxed">
                Estructura la información de forma clara para un análisis más efectivo y toma mejores decisiones basadas en datos.
            </p>
        </div>

        <!-- Tarjeta 2 -->
        <div class="group bg-white border border-gray-200 rounded-2xl p-8 hover:shadow-xl transition duration-300">
            <div class="bg-green-500/10 rounded-xl p-3 inline-block group-hover:bg-green-500 transition-colors duration-300">
                <span class="material-icons-round text-3xl text-green-500 group-hover:text-white">lightbulb</span>
            </div>
            <h4 class="text-xl font-semibold text-gray-900 mt-4">Toma de Decisiones</h4>
            <p class="mt-2 text-gray-600 leading-relaxed">
                Identifica datos clave para tomar decisiones estratégicas con confianza y respaldo analítico.
            </p>
        </div>

        <!-- Tarjeta 3 -->
        <div class="group bg-white border border-gray-200 rounded-2xl p-8 hover:shadow-xl transition duration-300">
            <div class="bg-purple-500/10 rounded-xl p-3 inline-block group-hover:bg-purple-500 transition-colors duration-300">
                <span class="material-icons-round text-3xl text-purple-500 group-hover:text-white">trending_up</span>
            </div>
            <h4 class="text-xl font-semibold text-gray-900 mt-4">Seguimiento Constante</h4>
            <p class="mt-2 text-gray-600 leading-relaxed">
                Monitorea el progreso de tus proyectos de manera continua y efectiva con reportes actualizados.
            </p>
        </div>
    </div>
</div>



@endsection

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
    animation: fadeIn 0.8s ease-out forwards;
}
</style>

@vite(['resources/js/dashboard.js'])