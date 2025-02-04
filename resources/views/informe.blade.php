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
            <a href="{{ url('index') }}">
                <img src="{{ url('../img/logo.png') }}" alt="LOGO" class="w-10 h-auto">
            </a>
            <ul class="flex space-x-4">
                <li><a href="{{ url('login') }}" class="text-white-300 hover:text-white">Login</a></li>
                <li><a href="{{ url('registro') }}" class="text-white-300 hover:text-white">Registrarse</a></li>
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
                        <input type="text" id="codigo" class="w-full p-2 border rounded" value="0">
                    </div>
                    <div>
                        <label for="fecha" class="block font-bold">Fecha</label>
                        <input type="date" id="fecha" class="w-full p-2 border rounded start" value="2025-01-01" min="2018-01-01" max="2035-12-31">
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
                        <form id="uploadForm" action="uploader.php" method="post" enctype="multipart/form-data">
                            <label for="archivo_foto" class="block font-bold mb-2">Selecciona de 1 a 6 archivos para subir:</label>
                            <input type="file" name="archivo_foto[]" id="archivo_foto" multiple 
                                   class="border p-2 rounded mb-4" accept=".jpg,.jpeg,.png,.pdf">
                            <input type="submit" name="submit" value="Subir archivos" 
                                   class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        </form>
                    
                        <script>
                            document.getElementById('uploadForm').addEventListener('submit', function (e) {
                                const fileInput = document.getElementById('archivo_foto');
                                const files = fileInput.files;
                    
                                // Validar el número de archivos seleccionados
                                if (files.length < 1 || files.length > 6) {
                                    e.preventDefault(); // Evita que el formulario se envíe
                                    alert('Por favor, selecciona entre 1 y 6 archivos.');
                                }
                            });
                        </script>
                    </div>
                    
                    
                </div>
                <button type="submit" id="vistainforme" class="mt-4 bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-600">Siguiente</button>
            </form>
        </div>
    </div>
    <footer class="bg-gray-800 text-white text-center py-6 mt-auto">
        <div class="container mx-auto">
            <p class="font-bold text-lg">Campeones</p>
            <p class="mt-2 text-sm">
                Somos una empresa especializada en la generación y consulta de informes detallados. Ofrecemos una plataforma intuitiva y segura para gestionar toda tu información en un solo lugar.
            </p>
            <p class="mt-2 text-sm">
                Contáctanos: <a href="mailto:campeones@informes.com" class="text-blue-400 hover:underline">contacto@informes.com</a>
            </p>
            
                
            </p>
        </div>
    </footer>
</body>
</html>
