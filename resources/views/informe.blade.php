<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Nuevo Informe</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <div class="container-fluid">
                <a href="{{ url('index') }}" class="navbar-brand">
                    <img src="{{ url('img/logo.png') }}" alt="LOGO" style="width: 30px; height: auto;">
                </a>
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
                                            <input type="date" id="fecha" class="form-control" value="2025-01-01">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="naturaleza">Naturaleza de la muestra</label>
                                            <select id="naturaleza" class="form-control"></select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="biopsia">Opciones biopsia</label>
                                            <select id="biopsia" class="form-control"></select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="conservacion">Conservación de muestra</label>
                                            <select id="conservacion" class="form-control"></select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="procedencia">Centro de procedencia</label>
                                            <select id="procedencia" class="form-control"></select>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="guardarMuestra" class="btn btn-primary mt-4">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="main-footer">
            <div class="container-fluid">
                <p class="text-center">&copy; 2025 Campeones. Todos los derechos reservados.</p>
            </div>
        </footer>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const endpoints = {
                naturaleza: '{{ url("api/tipo-naturaleza") }}',
                organo: '{{ url("api/organos") }}',
                conservacion: '{{ url("api/calidades") }}',
                procedencia: '{{ url("api/sedes") }}',
                guardar: '{{ url("api/muestras") }}'
            };

            // Función para cargar datos en un combobox
            async function cargarDatos(endpoint, selectId, idField, nameField) {
                const select = document.getElementById(selectId);
                try {
                    const response = await fetch(endpoint);
                    if (!response.ok) throw new Error('Error al cargar los datos');
                    const data = await response.json();
                    data.forEach(item => {
                        const option = document.createElement('option');
                        option.value = item[idField];
                        option.textContent = item[nameField];
                        select.appendChild(option);
                    });
                } catch (error) {
                    alert('Error al cargar los datos');
                    console.error('Error al cargar:', error);
                }
            }

            // Cargar datos para cada combo box
            cargarDatos(endpoints.naturaleza, 'naturaleza', 'tipoNaturaleza_id', 'nombre');
            cargarDatos(endpoints.organo, 'biopsia', 'organo_id', 'nombre');
            cargarDatos(endpoints.conservacion, 'conservacion', 'calidad_id', 'descripcion');
            cargarDatos(endpoints.procedencia, 'procedencia', 'sede_id', 'nombre');

            // Manejar el clic del botón Guardar
            document.getElementById('guardarMuestra').addEventListener('click', async function () {
                // Crear el objeto formData con los valores del formulario
                const formData = {
                    codigo: document.getElementById('codigo').value,
                    fechaEntrada: document.getElementById('fecha').value,
                    tipoNaturaleza_id: document.getElementById('naturaleza').value,
                    organo_id: document.getElementById('biopsia').value, // organo_id enviado correctamente
                    formato_id: document.getElementById('conservacion').value,
                    calidad_id: document.getElementById('conservacion').value,
                    sede_id: document.getElementById('procedencia').value,
                    descripcionMuestra: "Ejemplo desde formulario"
                };

                console.log("Datos enviados al backend:", formData); // Depuración

                try {
                    const response = await fetch(endpoints.guardar, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").getAttribute("content")
                        },
                        body: JSON.stringify(formData)
                    });

                    if (!response.ok) {
                        const errorData = await response.json();
                        console.error('Errores devueltos por el backend:', errorData);
                        throw new Error(errorData.message || 'Error desconocido');
                    }

                    const data = await response.json();
                    console.log("Respuesta del servidor:", data);
                    alert('Muestra guardada correctamente.');
                } catch (error) {
                    alert(`Error al guardar la muestra: ${error.message}`);
                    console.error("Error al guardar la muestra:", error);
                }
            });
        });
        </script>

</body>
</html>
