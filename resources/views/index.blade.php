<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Informe - Inicio</title>

    <title>Index</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons/dist/css/ionicons.min.css">

   


    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    
    <!-- Navbar -->
    <nav class="bg-blue-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <img src="{{ url('../img/logo.png') }}" alt="LOGO" class="w-10 h-auto">
            <ul class="flex space-x-4">
                <li><a href="{{ url('informe') }}" class="text-white-300 hover:text-white">Informe</a>
                </li>
                <li><a href="{{ url('login') }}" class="text-white-300 hover:text-white">Login</a>
                </li>
                <li><a href="{{ url('registro') }}" class="text-white-300 hover:text-white">Registrarse</a>
                </li>
            </ul>

        </div>
    </nav>

 
    <main class="flex-grow">

        
        
        <header class="relative bg-cover bg-center text-white text-center py-20" style="background-image: url('/img/banner.png');">
            <div class="absolute inset-0 bg-blue-700 opacity-60"></div>
            <div class="relative z-10">
                <h2 class="text-3xl font-bold">Genera y consulta informes fácilmente</h2>
                <p class="mt-4">Administra y visualiza todos tus informes en un solo lugar</p>
                <a href="{{ url('muestra') }}" class="mt-6 inline-block bg-white text-blue-600 px-6 py-2 rounded-lg font-semibold hover:bg-gray-200">Ver Informes</a>
                
            </div>
        </header>

        <section class="container mx-auto my-12 px-6 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <h3 class="text-xl font-bold">Fácil de usar</h3>
                <p class="mt-2 text-gray-600">Nuestra plataforma es intuitiva y rápida.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <h3 class="text-xl font-bold">Acceso seguro</h3>
                <p class="mt-2 text-gray-600">Protegemos tu información con los mejores estándares.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <h3 class="text-xl font-bold">Informes detallados</h3>
                <p class="mt-2 text-gray-600">Consulta datos detallados en tiempo real.</p>
            </div>
        </section>
    </main>

   
   

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
