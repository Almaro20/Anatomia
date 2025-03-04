<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col justify-between min-h-screen bg-gradient-to-r from-blue-500 to-purple-600 p-4">

    <div class="flex items-center justify-center flex-grow">
        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-2xl">
            <div class="flex justify-center mb-6">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-14">
            </div>
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Bienvenido</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="block text-gray-700 font-medium" />
                    <x-text-input id="email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Ingresa tu email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Contraseña')" class="block text-gray-700 font-medium" />
                    <x-text-input id="password" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password"
                                    placeholder="Ingresa tu contraseña" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <x-primary-button class="w-full bg-purple-600 text-white py-3 rounded-lg hover:bg-purple-700 transition-all duration-300 shadow-lg">
                    {{ __('Iniciar Sesión') }}
                </x-primary-button>
            </form>
            <div class="text-center mt-6">
                <a href="{{ route('register') }}" class="text-purple-600 hover:underline">¿No tienes cuenta? Regístrate aquí</a>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    @include('layouts.footer')

</body>
</html>
