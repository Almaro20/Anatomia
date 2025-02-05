<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Informe</title>

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons/dist/css/ionicons.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <div class="container-fluid">
                <a href="{{ url('index') }}" class="navbar-brand">
                    <img src="{{ url('../public/img/logo.png') }}" alt="LOGO" class="brand-image img-circle elevation-3" style="width: 30px; height: auto;">
                    
                </a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="{{ url('login') }}" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="{{ url('registro') }}" class="nav-link">Registrarse</a></li>
                </ul>
            </div>
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ url('index') }}" class="nav-link">
                                
                                <p>Inicio</p>
                                
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('informe') }}" class="nav-link">
                                
                                <p>Crear Informe</p>
                                
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('muestras') }}" class="nav-link">
                               
                                <p>Mis Informes</p>
                                
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Title Section -->
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center">
                            <h1 class="display-4 text-gray-800 font-weight-bold">INFORMES</h1>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer class="main-footer">
            <div class="container-fluid text-center">
                <p class="font-weight-bold text-lg">Campeones</p>
                <p class="mt-2 text-sm">
                    Somos una empresa especializada en la generación y consulta de informes detallados. Ofrecemos una plataforma intuitiva y segura para gestionar toda tu información en un solo lugar.
                </p>
                <p class="mt-2 text-sm">
                    Contáctanos: <a href="mailto:campeones@informes.com" class="text-blue-400">contacto@informes.com</a>
                </p>
            </div>
        </footer>
    </div>

    <!-- AdminLTE JS -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
