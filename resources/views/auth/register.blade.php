<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-500 to-purple-600 p-4">
    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-2xl">
        <div class="flex justify-center mb-6">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-14">
        </div>
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Registro</h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" class="block text-gray-700 font-medium" />
                <x-text-input id="name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Ingresa tu nombre" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="block text-gray-700 font-medium" />
                <x-text-input id="email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Ingresa tu email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Contraseña')" class="block text-gray-700 font-medium" />
                <x-text-input id="password" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                                type="password"
                                name="password"
                                required autocomplete="new-password"
                                placeholder="Ingresa tu contraseña" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="block text-gray-700 font-medium" />
                <x-text-input id="password_confirmation" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Confirma tu contraseña" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between">
               
                    <a href="{{ route('login') }}" class="text-purple-600 hover:underline">¿Ya tienes cuenta?</a>

                <x-primary-button class="bg-purple-600 text-white py-2 px-4 rounded-lg hover:bg-purple-700 transition-all duration-300 shadow-lg">
                    {{ __('Registrado') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</body>
</html>