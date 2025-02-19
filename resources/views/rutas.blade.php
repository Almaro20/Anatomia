<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Rutas</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h2>Listado de Rutas Disponibles</h2>
    <table>
        <thead>
            <tr>
                <th>Método</th>
                <th>URI</th>
                <th>Nombre</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rutas as $ruta)
                <tr>
                    <td>{{ $ruta['method'] }}</td>
                    <td>{{ $ruta['uri'] }}</td>
                    <td>{{ $ruta['name'] ?? 'N/A' }}</td>
                    <td>{{ $ruta['action'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
