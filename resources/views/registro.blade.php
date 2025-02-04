<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

    <nav class="bg-blue-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <img src="{{ url('../img/logo.png') }}" alt="LOGO" class="w-10 h-auto">
            <ul class="flex space-x-4">
                <li><a href="{{ url('index') }}" class="text-white-300 hover:text-white">Inicio</a>
                </li>
                <li><a href="{{ url('login') }}" class="text-white-300 hover:text-white">Login</a>
                </li>
            </ul>
        </div>
    </nav>

   
    <div class="flex-1 p-6">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Crear una cuenta</h2>
            <form>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="nombre" class="block font-semibold mb-1">Nombre</label>
                        <input type="text" id="nombre" class="w-full p-3 border rounded-lg" placeholder="Ingresa tu nombre">
                    </div>
                    <div>
                        <label for="apellido" class="block font-semibold mb-1">Apellido</label>
                        <input type="text" id="apellido" class="w-full p-3 border rounded-lg" placeholder="Ingresa tu apellido">
                    </div>
                    <div>
                        <label for="email" class="block font-semibold mb-1">Correo Electrónico</label>
                        <input type="email" id="email" class="w-full p-3 border rounded-lg" placeholder="correo@ejemplo.com">
                    </div>
                    <div>
                        <label for="telefono" class="block font-semibold mb-1">Teléfono</label>
                        <input type="tel" id="telefono" class="w-full p-3 border rounded-lg" placeholder="Número de contacto">
                    </div>
                    <div>
                        <label for="password" class="block font-semibold mb-1">Contraseña</label>
                        <input type="password" id="password" class="w-full p-3 border rounded-lg" placeholder="Crea una contraseña">
                    </div>
                    <div>
                        <label for="confirm_password" class="block font-semibold mb-1">Confirmar Contraseña</label>
                        <input type="password" id="confirm_password" class="w-full p-3 border rounded-lg" placeholder="Confirma tu contraseña">
                    </div>
                </div>
                <button type="submit" class="mt-6 w-full bg-blue-500 text-white py-3 rounded-lg shadow-md hover:bg-blue-600 transition">
                    Registrarse
                </button>
            </form>
        </div>
    </div>

  
    <footer class="bg-gray-800 text-white text-center py-4 mt-auto">
        <p>Información</p>
    </footer>
</body>
</html>
