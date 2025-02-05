<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Informe</title>
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
 
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <div class="container-fluid">
                <a href="{{ url('index') }}" class="navbar-brand">
                    <img src="{{ url('../public/img/logo.png') }}" alt="LOGO" style="width: 30px; height: auto;">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="{{ url('login') }}" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="{{ url('registro') }}" class="nav-link">Registrarse</a></li>
                </ul>
            </div>
        </nav>

   
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

      
        <div class="content-wrapper">
          
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Nuevo Informe</h1>
                        </div>
                    </div>
                </div>
            </div>

         
            <div class="content">
                <div class="container-fluid">
            
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

    
        <footer class="main-footer" style="background-color: #004085; color: white;">
            <div class="container-fluid text-center py-4">
                <p class="font-weight-bold text-lg">Campeones</p>
                <p class="mt-2 text-sm">
                    Somos una empresa especializada en la generación y consulta de informes detallados. Ofrecemos una plataforma intuitiva y segura para gestionar toda tu información en un solo lugar.
                </p>
                <p class="mt-2 text-sm">
                    Contáctanos: <a href="mailto:campeones@informes.com" class="text-blue-200">contacto@informes.com</a>
                </p>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>

  
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

{{-- <script src="{{ asset('js/informe.js') }}"></script> --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Selecciona el combo-box de naturaleza
        const selectNaturaleza = document.getElementById('naturaleza');

        // Función para cargar los datos desde la API
        async function cargarNaturaleza() {
            try {
                // Realiza la solicitud GET a la API
                const response = await fetch('{{ url('api/tipo-naturaleza') }}');

                if (!response.ok) {
                    throw new Error(`Error al cargar los datos: ${response.statusText}`);
                }

                // Convierte la respuesta a JSON
                const datos = await response.json();

                // Agrega cada tipo de naturaleza como una opción
                datos.forEach(tipo => {
                    const option = document.createElement('option');
                    option.textContent = tipo.nombre; // Nombre del tipo de naturaleza
                    selectNaturaleza.appendChild(option);
                });
            } catch (error) {
                alert('Hubo un error al cargar los tipos de naturaleza');
            }
        }
        // Llama a la función para cargar los datos al inicializar la página
        cargarNaturaleza();
    });
</script>



</body>
</html>
