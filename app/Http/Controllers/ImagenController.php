<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudinary\Cloudinary;
use Cloudinary\Api\Upload\UploadApi;
use App\Models\Imagen;

class ImagenController extends Controller
{
    public function subirImagen(Request $request)
    {
        // Validar que se haya subido una imagen
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Obtener la imagen del request
        $image = $request->file('image');
        
        // Instanciar Cloudinary
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key' => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET')
            ]
        ]);

        // Subir la imagen a Cloudinary
        try {
            $uploadResponse = $cloudinary->uploadApi()->upload($image->getRealPath(), [
                'folder' => 'imagenes/'  // Define una carpeta en tu Cloudinary
            ]);

            // Verificar si la URL fue obtenida correctamente
            $url = $uploadResponse['secure_url'] ?? null;

            if (!$url) {
                return response()->json(['error' => 'La URL de la imagen no se pudo obtener'], 400);
            }

            // Crear la nueva imagen en la base de datos
            $imagen = new Imagen();
            $imagen->url = $url;
            $imagen->save();

            return response()->json([
                'message' => 'Imagen subida con éxito',
                'image_url' => $imagen->url,
            ]);

        } catch (\Exception $e) {
            // Manejar cualquier error de la API
            return response()->json(['error' => 'Error al subir la imagen: ' . $e->getMessage()], 500);
        }
    }
}