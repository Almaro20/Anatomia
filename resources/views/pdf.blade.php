<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Informe de Muestra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin: 20px;
        }
        .titulo {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }
        .campo {
            margin: 10px 0;
        }
        .campo strong {
            width: 120px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="titulo">Informe de Muestra</h1>

        <div class="campo">
            <strong>Código:</strong> {{ $muestra->codigo }}
        </div>
        <div class="campo">
            <strong>Fecha:</strong> {{ $muestra->fechaEntrada }}
        </div>
        <div class="campo">
            <strong>Órgano:</strong> {{ $muestra->organo }}
        </div>
        <div class="campo">
            <strong>Descripción:</strong> {{ $muestra->descripcionMuestra }}
        </div>
        <div class="campo">
            <strong>Tipo de Naturaleza:</strong> {{ $muestra->naturaleza }}
        </div>
        <div class="campo">
            <strong>Conservación:</strong> {{ $muestra->conservacion }}
        </div>
        <div class="campo">
            <strong>Procedencia:</strong> {{ $muestra->procedencia }}
        </div>
    </div>
</body>
</html>
