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
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'zoom'  => 'required|in:x4,x10,x40,x100'
        ]);
    
        // Obtener la imagen y el zoom del request
        $image = $request->file('image');
        $zoom = $request->input('zoom');
    
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
                'folder' => 'imagenes/'
            ]);
    
            $url = $uploadResponse['secure_url'] ?? null;
    
            if (!$url) {
                return response()->json(['error' => 'La URL de la imagen no se pudo obtener'], 400);
            }
    
            // Guardar la imagen en la base de datos
            $imagen = Imagen::create(['url' => $url]);
    
            // Guardar el zoom en la tabla zooms
            $imagen->zooms()->create([
                'zoom' => $zoom
            ]);
    
            return response()->json([
                'message' => 'Imagen subida con éxito',
                'image_url' => $imagen->url,
                'zoom' => $zoom
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al subir la imagen: ' . $e->getMessage()], 500);
        }
    }
}