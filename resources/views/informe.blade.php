<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Informe</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <div class="container-fluid">
                <a href="{{ url('index') }}" class="navbar-brand">
                    <img src="{{ url('../public/img/logo.png') }}" alt="LOGO" style="width: 30px; height: auto;">
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
                                <button type="submit" class="btn btn-primary mt-4">Guardar</button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
document.addEventListener('DOMContentLoaded', function () {
        const selectNaturaleza = document.getElementById('naturaleza');
        async function cargarNaturaleza() {
            try {
                const response = await fetch('{{ url('api/tipo-naturaleza') }}');

                if (!response.ok) {
                    throw new Error(`Error al cargar los datos: ${response.statusText}`);
                }

                const datos = await response.json();
                datos.forEach(tipo => {
                    const option = document.createElement('option');
                    option.textContent = tipo.nombre; 
                    selectNaturaleza.appendChild(option);
                });
            } catch (error) {
                alert('Hubo un error al cargar los tipos de naturaleza');
            }
        }
        cargarNaturaleza();
        });

        const selectSede = document.getElementById('procedencia');
        async function cargarSede() {
            try {
                const response = await fetch('{{ url('api/sedes') }}');

                if (!response.ok) {
                    throw new Error(`Error al cargar los datos`);
                }

                const datos = await response.json();
                datos.forEach(tipo => {
                    const option = document.createElement('option');
                    option.textContent = tipo.nombre;
                    selectSede.appendChild(option);
                });
            } catch (error) {
                alert('Hubo un error al cargar los tipos de sedes');
            }
        }
        cargarSede();


        const selectConservacion = document.getElementById('conservacion');
        async function cargarConservacion() {
            try {
                const response = await fetch('{{ url('api/calidades') }}');

                if (!response.ok) {
                    throw new Error(`Error al cargar los datos`);
                }
                const datos = await response.json();

                datos.forEach(tipo => {
                    const option = document.createElement('option');
                    option.textContent = tipo.descripcion; 
                    selectConservacion.appendChild(option);
                });
            } catch (error) {
                alert('Hubo un error al cargar los tipos de conservacion');
            }
        }
        cargarConservacion();

        const selectOrgano = document.getElementById('biopsia');
        async function cargarOrgano() {
            try {
                const response = await fetch('{{ url('api/organos') }}');

                if (!response.ok) {
                    throw new Error(`Error al cargar los datos`);
                }
                const datos = await response.json();

                datos.forEach(tipo => {
                    const option = document.createElement('option');
                    option.textContent = tipo.nombre; 
                    selectOrgano.appendChild(option);
                });
            } catch (error) {
                alert('Hubo un error al cargar los tipos de organos');
            }
        }
        cargarOrgano();



        
        document.getElementById('uploadForm').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = {
                codigo: document.getElementById('codigo').value,
                fecha: document.getElementById('fecha').value,
                tipoNaturaleza_id: document.getElementById('naturaleza').value,
                organo_id: document.getElementById('biopsia').value,
                formato_id: document.getElementById('conservacion').value,
                calidad_id: document.getElementById('conservacion').value,
                sede_id: document.getElementById('procedencia').value,
                descripcionMuestra: "Ejemplo desde formulario"
            };

            try {
                const response = await fetch('{{ url('api/muestras') }}', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(formData)
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Error desconocido');
                }

                alert('Muestra guardada correctamente');
            } catch (error) {
                alert(`Error al guardar la muestra: ${error.message}`);
                console.error(error);
            }
        });
    </script>
</body>
</html>
