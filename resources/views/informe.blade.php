<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Informe</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
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
                <!-- Sidebar Menu -->
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
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Nuevo Informe</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <!-- Formulario de Informe -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Datos del Informe</h3>
                        </div>
                        <div class="card-body">
                            <form id="uploadForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="codigo">Código de la muestra</label>
                                            <input type="text" id="codigo" class="form-control" value="0">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fecha">Fecha</label>
                                            <input type="date" id="fecha" class="form-control" value="2025-01-01" min="2018-01-01" max="2035-12-31">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="naturaleza">Naturaleza de la muestra</label>
                                            <select id="naturaleza" class="form-control">
                                                <option value="">Selecciona un tipo</option>
                                            </select>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="biopsia">Opciones biopsia</label>
                                            <select id="biopsia" class="form-control">
                                                <option>Órgano</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="conservacion">Conservación de muestra</label>
                                            <select id="conservacion" class="form-control">
                                                <option>Formato</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="procedencia">Centro de procedencia</label>
                                            <select id="procedencia" class="form-control">
                                                <option>Sede</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="archivo_foto">Selecciona de 1 a 6 archivos para subir:</label>
                                            <input type="file" name="archivo_foto[]" id="archivo_foto" multiple class="form-control-file" accept=".jpg,.jpeg,.png,.pdf">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="vistainforme" class="btn btn-primary mt-4">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="main-footer">
            <div class="container-fluid">
                <p class="text-center">&copy; 2025 Campeones. Todos los derechos reservados.</p>
                <p class="text-center">
                    Somos una empresa especializada en la generación y consulta de informes detallados. Ofrecemos una plataforma intuitiva y segura para gestionar toda tu información en un solo lugar.
                </p>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>

    <!-- Script de validación de archivos -->
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

<script src="{{ asset('js/informe.js') }}"></script>

</body>
</html>
