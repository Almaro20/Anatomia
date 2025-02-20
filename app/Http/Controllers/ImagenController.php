<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudinary\Cloudinary;
use Cloudinary\Api\Upload\UploadApi;
use App\Models\Imagen;
use App\Models\Zoom; // Asegurar que Zoom esté importado

class ImagenController extends Controller
{
    public function subirImagen(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'zoom' => 'nullable|in:x4,x10,x40,x100' // Validación de zoom opcional
        ]);

        try {
            // Obtener la imagen del request
            $image = $request->file('image');
            $zoomInput = $request->input('zoom', 'x10'); // Zoom por defecto 'x10' si no se envía

            // Instanciar Cloudinary
            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key' => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET')
                ]
            ]);

            // Subir la imagen a Cloudinary
            $uploadResponse = $cloudinary->uploadApi()->upload($image->getRealPath(), [
                'folder' => 'imagenes/'
            ]);

            // Verificar si la URL fue obtenida correctamente
            $url = $uploadResponse['secure_url'] ?? null;

            if (!$url) {
                return response()->json(['error' => 'La URL de la imagen no se pudo obtener'], 400);
            }

            // Buscar o crear el zoom en la base de datos
            $zoom = Zoom::firstOrCreate(['zoom' => $zoomInput]);

            // Guardar la imagen en la base de datos
            $imagen = new Imagen();
            $imagen->url = $url;
            $imagen->zoom_id = $zoom->id; // Asociar la imagen con el zoom correspondiente
            $imagen->save();

            return response()->json([
                'message' => 'Imagen subida con éxito',
                'image_url' => $imagen->url,
                'zoom' => $zoom->zoom
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al subir la imagen: ' . $e->getMessage()], 500);
        }
    }
}