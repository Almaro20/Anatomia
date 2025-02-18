<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-500 to-purple-600 p-4">
    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-2xl">
        <div class="flex justify-center mb-6">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-14">
        </div>
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Bienvenido</h2>
        <form action="/login" method="POST" class="space-y-6">
            <div>
                <label for="usuario" class="block text-gray-700 font-medium">Usuario</label>
                <input type="text" id="usuario" name="usuario" autocomplete="off"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                    placeholder="Ingresa tu usuario">
            </div>
            <div>
                <label for="password" class="block text-gray-700 font-medium">Contraseña</label>
                <input type="password" id="password" name="password" autocomplete="off"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                    placeholder="Ingresa tu contraseña">
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="mr-2">
                    <label for="remember" class="text-gray-600">Recordarme</label>
                </div>
                <a href="/password/reset" class="text-purple-600 hover:underline">¿Olvidaste tu contraseña?</a>
            </div>
            <button type="submit" class="w-full bg-purple-600 text-white py-3 rounded-lg hover:bg-purple-700 transition-all duration-300 shadow-lg">
                Iniciar Sesión
            </button>
        </form>
        <div class="text-center mt-6">
            <a href="#" class="text-purple-600 hover:underline">¿No tienes cuenta? Regístrate aquí</a>
        </div>
    </div>
</body>
</html>
