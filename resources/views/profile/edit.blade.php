<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Editar Perfil</title>
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

    <div class="flex">
        <!-- Sidebar -->
        <div id="mostrar_menu" class="w-64 h-screen px-6 py-4 bg-white shadow-lg fixed top-14 left-0">
            <h1 class="text-lg font-bold px-3">Bienvenido</h1>
            <hr class="my-4 border-gray-300" />
            <ul class="text-sm mt-2 leading-8">
                <li>
                    <a href="{{ route('dashboard') }}" class="text-gray-600 flex items-center">
                        <span class="material-icons-round text-slate-600 ml-4 mr-2">account_balance</span>
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ route('informe') }}" class="text-gray-600 flex items-center">
                        <span class="material-icons-round text-slate-600 ml-4 mr-2">info</span>
                        Informes
                    </a>
                </li>
                <li>
                    <a href="{{ route('usuarios') }}" class="text-gray-600 flex items-center">
                        <span class="material-icons-round text-slate-600 ml-4 mr-2">account_circle</span>
                        Usuarios
                    </a>
                </li>
                <hr class="my-4 border-gray-300" />
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-600 flex items-center w-full text-left px-4 py-2">
                            <span class="material-icons-round text-red-600 ml-4 mr-2">logout</span>
                            Cerrar Sesión
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        
        <!-- Main Content -->
        <div class="flex-grow mx-auto p-6 mt-14 lg:ml-64">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-blue-800 shadow-md mt-auto lg:ml-64">
        <div class="max-w-7xl mx-auto py-4 px-6">
            <div class="flex justify-between items-center">
                <div class="text-sm text-white-100">
                    <strong>Copyright &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}.</strong>
                    Todos los derechos reservados.
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
    @vite(['resources/js/panel.js'])

    <script>
        document.getElementById('user-menu-button').addEventListener('click', function() {
            document.getElementById('user-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
