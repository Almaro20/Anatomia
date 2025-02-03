<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro e Inicio de Sesión</title>
    
    
    <style>
        .login-register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Header -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="" class="nav-link">Inicio</a>
                    
                </li>
            </ul>
        </nav>
        
        
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="authTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab">Iniciar Sesión</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab">Registrarse</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content mt-3">
                                        <div class="tab-pane fade show active" id="login" role="tabpanel">
                                            <form>
                                                <div class="form-group">
                                                    <label for="login-email">Correo Electrónico</label>
                                                    <input type="email" class="form-control" id="login-email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="login-password">Contraseña</label>
                                                    <input type="password" class="form-control" id="login-password" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="register" role="tabpanel">
                                            <form>
                                                <div class="form-group">
                                                    <label for="register-name">Nombre</label>
                                                    <input type="text" class="form-control" id="register-name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="register-email">Correo Electrónico</label>
                                                    <input type="email" class="form-control" id="register-email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="register-password">Contraseña</label>
                                                    <input type="password" class="form-control" id="register-password" required>
                                                </div>
                                                <button type="submit" class="btn btn-success btn-block">Registrarse</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        
        <footer class="main-footer text-center">
            <strong>INFORMACIÓN</strong>
        </footer>
    </div>
    
 
</body>
</html>
