<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Imagen</title>
</head>
<body>

    <h1>Subir Imagen a Cloudinary</h1>

    <form action="{{ route('subir-imagen') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" accept="image/*" required>
        
        <select name="zoom" required>
            <option value="x4">x4</option>
            <option value="x10">x10</option>
            <option value="x40">x40</option>
            <option value="x100">x100</option>
        </select>
    
        <button type="submit">Subir Imagen</button>
    </form>

</body>
</html>