<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <link rel="icon" type="image/ico" href="{{ asset('img/favicon.ico') }}"/>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-sm">
    <nav class="bg-gradient-to-r from-blue-800 to-black fixed top-0 w-full z-50 shadow-md">
        <div class="mx-auto max-w-full sm:px-4 lg:px-8">
            <div class="flex justify-between items-center h-14">
                <div class="flex items-center transition-all duration-200 ease-in-out">
                    <a href="{{ route('dashboard') }}">
                        <img class="h-12" src="{{ asset('img/logo.png') }}" alt="logo" />
                    </a>
                </div>
                <div class="relative">
                    <button class="flex items-center text-white focus:outline-none" id="user-menu-button">
                        {{ Auth::user()->name }}
                        <span class="material-icons-round ml-2">arrow_drop_down</span>
                    </button>
                    <div id="user-menu" class="absolute right-0 mt-2 w-48 bg-white shadow-md rounded-md hidden">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Perfil</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">Cerrar Sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex min-h-screen pt-14">
        <!-- Panel lateral -->
        <div id="mostrar_menu" class="select-none transform -translate-x-full lg:translate-x-0 transition-all duration-200 ease-in-out opacity-0 lg:opacity-100 invisible lg:visible fixed top-14 left-0 h-screen bg-gray-100 z-50">
            <div class="w-64 h-full px-6 py-4 bg-blue-800 shadow-lg">
                <div class="flex flex-col">
                    <h1 class="text-lg font-bold px-3 text-white">Bienvenido</h1>
                </div>
                <hr class="my-4 border-blue-300" />
                <ul class="text-sm mt-2 leading-8">
                    <li>
                        <a href="{{ route('dashboard') }}" 
                           class="text-white flex items-center px-3 py-2 rounded-md transition-all duration-200 ease-in-out {{ request()->routeIs('dashboard') ? 'bg-white/20 shadow-lg' : 'hover:bg-blue-700' }}">
                            <span class="material-icons-round text-white mr-2">account_balance</span>
                            <span class="{{ request()->routeIs('dashboard') ? 'font-semibold' : '' }}">Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('informe') }}" 
                           class="text-white flex items-center px-3 py-2 rounded-md transition-all duration-200 ease-in-out {{ request()->routeIs('informe') ? 'bg-white/20 shadow-lg' : 'hover:bg-blue-700' }}">
                            <span class="material-icons-round text-white mr-2">info</span>
                            <span class="{{ request()->routeIs('informe') ? 'font-semibold' : '' }}">Muestras</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('interpretaciones') }}" 
                           class="text-white flex items-center px-3 py-2 rounded-md transition-all duration-200 ease-in-out {{ request()->routeIs('interpretaciones') ? 'bg-white/20 shadow-lg' : 'hover:bg-blue-700' }}">
                            <span class="material-icons-round text-white mr-2">visibility</span>
                            <span class="{{ request()->routeIs('interpretaciones') ? 'font-semibold' : '' }}">Interpretaciones</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('usuarios') }}" 
                           class="text-white flex items-center px-3 py-2 rounded-md transition-all duration-200 ease-in-out {{ request()->routeIs('usuarios') ? 'bg-white/20 shadow-lg' : 'hover:bg-blue-700' }}">
                            <span class="material-icons-round text-white mr-2">group</span>
                            <span class="{{ request()->routeIs('usuarios') ? 'font-semibold' : '' }}">Usuarios</span>
                        </a>
                    </li>
                    <hr class="my-4 border-blue-300" />
                    <li>
                        <a href="{{ route('profile.edit') }}" 
                           class="text-white flex items-center px-3 py-2 rounded-md transition-all duration-200 ease-in-out {{ request()->routeIs('profile.edit') ? 'bg-white/20 shadow-lg' : 'hover:bg-blue-700' }}">
                            <span class="material-icons-round text-white mr-2">account_circle</span>
                            <span class="{{ request()->routeIs('profile.edit') ? 'font-semibold' : '' }}">Perfil</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Contenedor principal con el footer al final -->
        <div class="flex-1 flex flex-col min-h-screen lg:ml-64">
            <!-- Contenido principal -->
            <main class="flex-grow p-6">
                @yield('content')
            </main>

            <!-- Footer -->
            @include('layouts.footer')
        </div>
    </div>

    @stack('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const userMenuButton = document.getElementById("user-menu-button");
            const userMenu = document.getElementById("user-menu");
            userMenuButton.addEventListener("click", function () {
                userMenu.classList.toggle("hidden");
            });
            document.addEventListener("click", function (event) {
                if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                    userMenu.classList.add("hidden");
                }
            });
        });
    </script>
    @vite(['resources/js/panel.js'])
</body>

</html>