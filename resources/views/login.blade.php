<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
  
    <nav class="bg-blue-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <img src="{{ url('../img/logo.png') }}" alt="LOGO" class="w-10 h-auto">
            <ul class="flex space-x-4">
                <li><a href="{{ url('index') }}" class="text-white-300 hover:text-white">Inicio</a></li>
                <li><a href="{{ url('login') }}" class="text-white-300 hover:text-white">Login</a></li>
                <li><a href="{{ url('registrarse') }}" class="text-white-300 hover:text-white">Registrarse</a></li>
            </ul>
        </div>
    </nav>

    <div class="flex-1 p-6">
        <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Iniciar Sesión</h2>
            <form>
                <div class="mb-4">
                    <label for="email" class="block font-semibold mb-1">Correo Electrónico</label>
                    <input type="email" id="email" class="w-full p-3 border rounded-lg" placeholder="correo@ejemplo.com">
                </div>
                <div class="mb-4">
                    <label for="password" class="block font-semibold mb-1">Contraseña</label>
                    <input type="password" id="password" class="w-full p-3 border rounded-lg" placeholder="Ingresa tu contraseña">
                </div>
                <div class="flex items-center justify-between mb-4">
                    <div>
                    </div>
                    
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-lg shadow-md hover:bg-blue-600 transition">
                    Iniciar Sesión
                </button>
            </form>
        
        </div>
    </div>

    
    <footer class="bg-gray-800 text-white text-center py-4 mt-auto">
        <p>Información</p>
    </footer>
</body>
</html>
