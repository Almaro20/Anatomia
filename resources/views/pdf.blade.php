<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Informe de Muestra</title>
    <style>
        body {
            font-family: sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #4a5568;
        }

        .header h1 {
            color: #2d3748;
            font-size: 24px;
            margin: 0 0 10px 0;
        }

        .header p {
            color: #4a5568;
            margin: 5px 0;
        }

        .section {
            margin-bottom: 25px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }

        .section h2 {
            color: #2d3748;
            font-size: 18px;
            margin: 0 0 15px 0;
            padding-bottom: 8px;
            border-bottom: 1px solid #cbd5e0;
        }

        .info-grid {
            display: table;
            width: 100%;
            margin-bottom: 10px;
        }

        .info-row {
            display: table-row;
        }

        .info-label {
            display: table-cell;
            font-weight: bold;
            padding: 5px 15px 5px 0;
            width: 30%;
            color: #4a5568;
        }

        .info-value {
            display: table-cell;
            padding: 5px 0;
            color: #2d3748;
        }

        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #cbd5e0;
            text-align: center;
            font-size: 12px;
            color: #718096;
        }

        .descripcion-box {
            background-color: white;
            border: 1px solid #e2e8f0;
            padding: 15px;
            margin-top: 10px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Informe de Muestra Anatomopatológica</h1>
        <p>Código: {{ $muestra->codigo }}</p>
        <p>Fecha de Generación: {{ date('d/m/Y H:i') }}</p>
    </div>

    <div class="section">
        <h2>Información General</h2>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Fecha de Entrada:</div>
                <div class="info-value">{{ \Carbon\Carbon::parse($muestra->fechaEntrada)->format('d/m/Y') }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tipo de Estudio:</div>
                <div class="info-value">{{ $muestra->tipoEstudio->nombre ?? 'No disponible' }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tipo de Naturaleza:</div>
                <div class="info-value">{{ $muestra->tipoNaturaleza->nombre ?? 'No disponible' }}</div>
            </div>
            @if($muestra->organo)
            <div class="info-row">
                <div class="info-label">Órgano:</div>
                <div class="info-value">{{ $muestra->organo }}</div>
            </div>
            @endif
        </div>
    </div>

    <div class="section">
        <h2>Detalles Técnicos</h2>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Formato:</div>
                <div class="info-value">{{ $muestra->formato->nombre ?? 'No disponible' }}</div>
            </div>
            @if($muestra->calidad)
            <div class="info-row">
                <div class="info-label">Calidad:</div>
                <div class="info-value">
                    {{ $muestra->calidad->descripcion ?? 'No disponible' }}
                    @if($muestra->calidad->codigo)
                        (Código: {{ $muestra->calidad->codigo }})
                    @endif
                </div>
            </div>
            @endif
            <div class="info-row">
                <div class="info-label">Sede:</div>
                <div class="info-value">{{ $muestra->sede->nombre ?? 'No disponible' }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <h2>Descripción de la Muestra</h2>
        <div class="descripcion-box">
            {{ $muestra->descripcionMuestra ?? 'Sin descripción disponible' }}
        </div>
    </div>

    <div class="footer">
        <p>Este documento es un informe oficial generado el {{ date('d/m/Y') }} a las {{ date('H:i') }}</p>
        <p>Para verificar la autenticidad de este documento, contacte con el laboratorio</p>
        <p>Sede: {{ $muestra->sede->nombre ?? 'No disponible' }}</p>
    </div>
</body>
</html>
