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
                <li><a href="{{ url('index') }}" class="text-white-300 hover:text-white">inicio</a>
                </li>
                <li><a href="{{ url('login') }}" class="text-white-300 hover:text-white">Login</a>
                </li>
                <li><a href="{{ url('registrarse') }}" class="text-white-300 hover:text-white">Registrarse</a>
                </li>
            </ul>
        </div>
    </nav>

    
    <div class="flex-1 p-6">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4">Nuevo Informe</h2>
            <form>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="codigo" class="block font-bold">Código de la muestra</label>
                        <input type="text" id="codigo" class="w-full p-2 border rounded" value="804003">
                    </div>
                    <div>
                        <label for="fecha" class="block font-bold">Fecha de recolección</label>
                        <input type="date" id="fecha" class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label for="naturaleza" class="block font-bold">Naturaleza de la muestra</label>
                        <select id="naturaleza" class="w-full p-2 border rounded">
                            <option>Tipo</option>
                        </select>
                    </div>
                    <div>
                        <label for="biopsia" class="block font-bold">Opciones biopsia</label>
                        <select id="biopsia" class="w-full p-2 border rounded">
                            <option>Órgano</option>
                            <option>Diego</option>
                        </select>
                    </div>
                    <div>
                        <label for="conservacion" class="block font-bold">Conservación de muestra</label>
                        <select id="conservacion" class="w-full p-2 border rounded">
                            <option>Formato</option>
                        </select>
                    </div>
                    <div>
                        <label for="procedencia" class="block font-bold">Centro de procedencia</label>
                        <select id="procedencia" class="w-full p-2 border rounded">
                            <option>Sede</option>
                        </select>
                    </div>
                    <div>
                        <label for="imagen" class="block font-bold">Imágenes de la muestra</label>
                        <input type="file" id="imagen" class="w-full p-2 border rounded">
                    </div>
                </div>
                <button type="submit" class="mt-4 bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-600">Siguiente</button>
            </form>
        </div>
    </div>
    <footer class="bg-gray-800 text-white text-center py-4 mt-auto">
        <p>Informacion</p>
    </footer>
</body>
</html>
