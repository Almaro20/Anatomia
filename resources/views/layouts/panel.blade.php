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
    <nav class="bg-white fixed top-0 w-full z-50 shadow-md">
        <div class="mx-auto max-w-full sm:px-4 lg:px-8">
            <div class="flex justify-between items-center h-14">
                <div class="flex items-center transition-all duration-200 ease-in-out">
                    <a href="{{ route('dashboard') }}">
                        <img class="h-12" src="{{ asset('img/logo.png') }}" alt="logo" />
                    </a>
                </div>

                <div class="relative">
                    <button class="flex items-center text-gray-600 focus:outline-none" id="user-menu-button">
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

    <!-- Panel -->
    <div>
        <div id="mostrar_menu" class="select-none transform -translate-x-full lg:translate-x-0 transition-all duration-200 ease-in-out opacity-0 lg:opacity-100 invisible lg:visible md:flex lg:flex h-screen fixed top-14 left-0 bg-gray-100 z-50">
            <div class="w-64 h-screen px-6 py-4 bg-white shadow-lg">
                <div class="flex flex-col">
                    <h1 class="text-lg font-bold px-3">Bienvenido</h1>
                </div>

                <hr class="my-4 border-gray-300" />

                <ul class="text-sm mt-2 leading-8">
                    <li @class(['mb-1 flex', request()->routeIs('dashboard') ? 'px-3 font-medium hover:font-semibold bg-blue-100 w-full rounded-md box-border' : 'hover:px-3 hover:bg-blue-50 hover:rounded-md ease-in-out hover:transition-all duration-200'])>
                        <a href="{{ route('dashboard') }}" class="text-gray-600 w-full flex justify-start items-center">
                            <span class="material-icons-round text-slate-600 ml-4 mr-2">
                                account_balance
                            </span>
                            Inicio
                        </a>
                    </li>

                    <li @class(['mb-1 flex', request()->routeIs('welcome') ? 'px-3 font-medium hover:font-semibold bg-blue-100 w-full rounded-md box-border' : 'hover:px-3 hover:bg-blue-50 hover:rounded-md ease-in-out hover:transition-all duration-200'])>
                        <a href="{{ route('informe') }}" class="text-gray-600 w-full flex justify-start items-center">
                            <span class="material-icons-round text-slate-600 ml-4 mr-2">
                                info
                            </span>
                            Informes
                        </a>
                    </li>

                    <li @class(['mb-1 flex', request()->routeIs('welcome') ? 'px-3 font-medium hover:font-semibold bg-blue-100 w-full rounded-md box-border' : 'hover:px-3 hover:bg-blue-50 hover:rounded-md ease-in-out hover:transition-all duration-200'])>
                        <a href="{{ route('usuarios') }}" class="text-gray-600 w-full flex justify-start items-center">
                            <span class="material-icons-round text-slate-600 ml-4 mr-2">
                                    group
                            </span>
                            Usuarios
                        </a>
                    </li>

                    <hr class="my-4 border-gray-300" />

                    <li @class(['mb-1 flex', request()->routeIs('welcome') ? 'px-3 font-medium hover:font-semibold bg-blue-100 w-full rounded-md box-border' : 'hover:px-3 hover:bg-blue-50 hover:rounded-md ease-in-out hover:transition-all duration-200'])>
                        <a href="{{ route('profile.edit') }}" class="text-gray-600 w-full flex justify-start items-center">
                            <span class="material-icons-round text-gray-600 ml-4 mr-2">
                                account_circle
                            </span>
                            Perfil
                        </a>
                    </li>


                </ul>
            </div>
        </div>

        <div class="flex-grow mx-auto p-6 mt-14 lg:ml-64">
            <main>
                @yield('content')
            </main>
        </div>

        <!-- Footer -->

    </div>

    @stack('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const userMenuButton = document.getElementById("user-menu-button");
            const userMenu = document.getElementById("user-menu");

            userMenuButton.addEventListener("click", function () {
                userMenu.classList.toggle("hidden");
            });

            // Cerrar el menú si se hace clic fuera de él
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
