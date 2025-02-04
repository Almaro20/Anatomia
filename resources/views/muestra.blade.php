<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Informe</title>
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
                <li><a href="{{ url('registro') }}" class="text-white-300 hover:text-white">Registrarse</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="flex-4 flex justify-center items-center t">
        <h1 class="text-6xl font-bold text-gray-800">INFORME</h1>
    </div>
    
    
    <footer class="bg-gray-800 text-white text-center py-4 mt-auto">
        <p>Informacion</p>
    </footer>
</body>
</html>
