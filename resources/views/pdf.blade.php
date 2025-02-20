<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Informe de Muestra</title>
    <style>
        /* Fuente Moderna */
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            color: #555;
        }

        /* Contenedor Principal */
        .container {
            width: 80%;
            margin: 40px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            line-height: 1.6;
        }

        /* Título Principal */
        .titulo {
            font-size: 36px;
            font-weight: 700;
            text-align: center;
            color: #1A1A1A;
            margin-bottom: 40px;
            border-bottom: 2px solid #d1d1d1;
            padding-bottom: 15px;
        }

        /* Campo de Información */
        .campo {
            margin-bottom: 18px;
            display: flex;
            justify-content: space-between;
        }

        .campo strong {
            font-weight: 700;
            color: #333;
            width: 200px;
            font-size: 18px;
        }

        .campo span {
            font-weight: 400;
            color: #555;
            font-size: 16px;
        }

        /* Sección de Detalles */
        .section {
            margin-bottom: 30px;
        }

        hr {
            border: 0;
            border-top: 1px solid #e0e0e0;
            margin: 40px 0;
        }

        /* Pie de Página */
        .footer {
            font-size: 14px;
            text-align: center;
            color: #999;
            margin-top: 30px;
        }

        /* Estilo de la Tabla (si se necesita) */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        .data-table th, .data-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        .data-table th {
            background-color: #f2f2f2;
            font-weight: 600;
            color: #333;
        }

        .data-table td {
            color: #555;
        }

        .data-table td span {
            color: #888;
        }

        .data-table td a {
            color: #3498db;
            text-decoration: none;
        }

        .data-table td a:hover {
            text-decoration: underline;
        }

        /* Encabezado de Página */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-header .logo {
            font-size: 24px;
            font-weight: 700;
            color: #2c3e50;
        }

        .page-header .fecha {
            font-size: 16px;
            color: #7f8c8d;
        }

        /* Encabezado de la Tabla */
        .table-header {
            background-color: #f9f9f9;
            padding: 12px;
            text-align: left;
            font-size: 18px;
            font-weight: 500;
            color: #2c3e50;
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Encabezado -->
        <div class="page-header">
            <div class="logo">Informe de Muestra</div>
            <div class="fecha">{{ date('d M, Y') }}</div>
        </div>

        <!-- Información General del Informe -->
        <h2 class="titulo">Detalles del la Muestra</h2>

        <div class="section">
            <div class="campo">
                <strong>Código:</strong> {{ $muestra->codigo ?? 'No disponible' }}
            </div>
            <div class="campo">
                <strong>Fecha:</strong> {{ $muestra->fechaEntrada ?? 'No disponible' }}
            </div>
        </div>
        
        <div class="section">
            <div class="campo">
                <strong>Órgano:</strong> {{ $muestra->organo ?? 'No disponible' }}
            </div>
            <div class="campo">
                <strong>Descripción:</strong> {{ $muestra->descripcionMuestra ?? 'No disponible' }}
            </div>
        </div>
        
        <div class="section">
            <div class="campo">
                <strong>Tipo de Naturaleza:</strong> {{ $muestra->naturaleza ?? 'No disponible' }}
            </div>
            <div class="campo">
                <strong>Conservación:</strong> {{ $muestra->conservacion ?? 'No disponible' }}
            </div>
            <div class="campo">
                <strong>Procedencia:</strong> {{ $muestra->procedencia ?? 'No disponible' }}
            </div>
        </div>

        <!-- Si es necesario añadir una tabla de detalles adicionales -->
        <div class="section">
            <h3 class="table-header">Detalles Adicionales</h3>
            <table class="data-table">
                <tr>
                    <th>Detalle 1</th>
                    <td>{{ $muestra->detalle1 }}</td>
                </tr>
                <tr>
                    <th>Detalle 2</th>
                    <td>{{ $muestra->detalle2 }}</td>
                </tr>
            </table>
        </div>
    </div>

</body>
</html>