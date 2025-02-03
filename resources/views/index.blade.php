<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
        <button class="text-gray-700">&#9776;</button>
        <a href="#" class="text-gray-700 font-semibold">Inicio</a>
    </nav>
    
    <div class="flex flex-1">
        <aside class="w-64 bg-gray-800 text-white p-4">
            <h2 class="text-xl font-bold mb-4">LOGO</h2>
            <ul>
                <li class="py-2"><a href="#" class="block hover:bg-gray-700 p-2 rounded">Inicio</a></li>
                <li class="py-2"><a href="#" class="block hover:bg-gray-700 p-2 rounded">Informe</a></li>
                <li class="py-2"><a href="#" class="block hover:bg-gray-700 p-2 rounded">Contacto</a></li>
            </ul>
        </aside>
        
        <main class="flex-1 p-6">
            <div class="text-center mb-6">
                <button class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-600">REALIZAR INFORME</button>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <p class="font-semibold">Ventaja 1</p>
                </div>
                <div class="bg-white shadow-md rounded-lg p-4">
                    <p class="font-semibold">Ventaja 2</p>
                </div>
                <div class="bg-white shadow-md rounded-lg p-4">
                    <p class="font-semibold">Ventaja 3</p>
                </div>
            </div>
        </main>
    </div>
    
    <footer class="bg-gray-200 text-center py-4 mt-6">
        <strong>INFORMACIÓN</strong>
    </footer>
</body>
</html>
