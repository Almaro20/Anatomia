<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Informe</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons/dist/css/ionicons.min.css">
    <style>
        .content-wrapper {
            padding: 20px;
        }
        .card {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            margin-top: 20px;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Muestras</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contacto</a>
                </li>
            </ul>
        </nav>

        <div class="content-wrapper">
            <div class="container-fluid">
                <h2 class="mb-4">Nuevo Informe</h2>
                <div class="card">
                    <form>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="codigo">Código de la muestra</label>
                                <input type="text" id="codigo" class="form-control" value="804003">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="fecha">Fecha de recolección</label>
                                <input type="date" id="fecha" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="naturaleza">Naturaleza de la muestra</label>
                                <select id="naturaleza" class="form-control">
                                    <option>Tipo</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="biopsia">Opciones biopsia</label>
                                <select id="biopsia" class="form-control">
                                    <option>Órgano</option>
                                    <option>Diego</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="conservacion">Conservación de muestra</label>
                                <select id="conservacion" class="form-control">
                                    <option>Formato</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="procedencia">Centro de procedencia</label>
                                <select id="procedencia" class="form-control">
                                    <option>Sede</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="imagen">Imágenes de la muestra</label>
                                <input type="file" id="imagen" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Siguiente</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
