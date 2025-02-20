<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Informe Detallado de Muestra</title>
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

        /* Nuevos estilos */
        .header-logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .header-logo img {
            max-width: 200px;
        }

        .info-section {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .info-section h3 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-size: 20px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .campo {
            background-color: white;
            padding: 12px;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .campo strong {
            color: #2c3e50;
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .campo span {
            color: #34495e;
            font-size: 15px;
        }

        .estado-muestra {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 14px;
            font-weight: 500;
            text-align: center;
            margin-top: 10px;
        }

        .estado-activo {
            background-color: #27ae60;
            color: white;
        }

        .estado-inactivo {
            background-color: #e74c3c;
            color: white;
        }

        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #eee;
            font-size: 12px;
            color: #7f8c8d;
            text-align: center;
        }

        .qr-code {
            text-align: right;
            margin-top: 20px;
        }

        .qr-code img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-logo">
            <h1 style="color: #2c3e50;">Informe de Muestra</h1>
        </div>

        <div class="page-header">
            <div class="logo">Código: {{ $muestra->codigo }}</div>
            <div class="fecha">Generado el: {{ date('d/m/Y H:i') }}</div>
        </div>

        <div class="info-section">
            <h3>Información General</h3>
            <div class="grid-container">
                <div class="campo">
                    <strong>Fecha de Entrada:</strong>
                    <span>{{ \Carbon\Carbon::parse($muestra->fechaEntrada)->format('d/m/Y') }}</span>
                </div>
                <div class="campo">
                    <strong>Órgano:</strong>
                    <span>{{ $muestra->organo ?? 'No especificado' }}</span>
                </div>
                <div class="campo">
                    <strong>Tipo de Naturaleza:</strong>
                    <span>{{ $muestra->tipoNaturaleza['nombre'] }} ({{ $muestra->tipoNaturaleza['codigo'] }})</span>
                </div>
                <div class="campo">
                    <strong>Formato:</strong>
                    <span>{{ $muestra->formato['nombre'] }}</span>
                </div>
            </div>
        </div>

        <div class="info-section">
            <h3>Detalles de la Muestra</h3>
            <div class="grid-container">
                <div class="campo">
                    <strong>Calidad:</strong>
                    <span>
                        <strong>Código:</strong> {{ $muestra->calidad['codigo'] }}<br>
                        <strong>Descripción:</strong> {{ $muestra->calidad['descripcion'] }}
                    </span>
                </div>
                <div class="campo">
                    <strong>Sede:</strong>
                    <span>{{ $muestra->sede['nombre'] }} ({{ $muestra->sede['codigo'] }})</span>
                </div>

            </div>
        </div>

        <div class="info-section">
            <h3>Descripción de la Muestra</h3>
            <div class="campo" style="margin-bottom: 20px;">
                <span>{{ $muestra->descripcionMuestra }}</span>
            </div>
        </div>

        <div class="footer">
            <p>Este documento es un informe oficial generado el {{ date('d/m/Y') }}</p>
            <p>Para verificar la autenticidad de este documento, contacte con el laboratorio</p>
            <p>Sede: {{ $muestra->sede['nombre'] }}</p>
        </div>

        <div class="qr-code">
            <!-- Aquí puedes agregar un código QR si lo deseas -->
        </div>
    </div>
</body>
</html>
