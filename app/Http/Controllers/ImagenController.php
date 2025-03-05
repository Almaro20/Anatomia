<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudinary\Cloudinary;
use App\Models\Imagen;
use App\Models\Zoom;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ImagenController extends Controller
{
    protected $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key'    => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
        ]);
    }

    public function subirImagen(Request $request)
    {
        try {
            DB::beginTransaction();

            if (!$request->hasFile('imagen')) {
                throw new \Exception('No se ha proporcionado ninguna imagen');
            }

            $imagen = $request->file('imagen');
            $zoomValue = $request->input('zoom', 'x10');

            // Subir imagen a Cloudinary
            $result = $this->cloudinary->uploadApi()->upload(
                $imagen->getRealPath(),
                ['folder' => 'muestras']
            );

            // Obtener o crear el zoom
            $zoom = Zoom::firstOrCreate(['zoom' => $zoomValue]);

            // Crear registro de imagen
            $imagenDB = new Imagen();
            $imagenDB->url = $result['secure_url'];
            $imagenDB->zoom_id = $zoom->id;
            $imagenDB->save();

            DB::commit();

            return response()->json([
                'message' => 'Imagen subida con éxito',
                'imagen' => $imagenDB->load('zoom')
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al subir imagen: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error al subir la imagen: ' . $e->getMessage()
            ], 500);
        }
    }

    public function subirImagenes(Request $request)
    {
        try {
            DB::beginTransaction();
            
            if (!$request->hasFile('imagenes')) {
                throw new \Exception('No se han proporcionado imágenes');
            }

            $imagenes = [];
            $files = $request->file('imagenes');
            $zooms = $request->input('zooms', []);

            foreach ($files as $index => $imagen) {
                // Subir imagen a Cloudinary
                $result = $this->cloudinary->uploadApi()->upload(
                    $imagen->getRealPath(),
                    ['folder' => 'muestras']
                );

                // Obtener o crear el zoom
                $zoom = Zoom::firstOrCreate(['zoom' => $zooms[$index] ?? 'x10']);

                // Crear registro de imagen
                $imagenDB = new Imagen();
                $imagenDB->url = $result['secure_url'];
                $imagenDB->zoom_id = $zoom->id;
                $imagenDB->save();

                $imagenes[] = $imagenDB->load('zoom');
            }

            DB::commit();

            return response()->json([
                'message' => 'Imágenes subidas con éxito',
                'imagenes' => $imagenes
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al subir imágenes: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error al subir las imágenes: ' . $e->getMessage()
            ], 500);
        }
    }

    public function eliminarImagen($id)
    {
        try {
            DB::beginTransaction();

            $imagen = Imagen::findOrFail($id);
            
            // Extraer el public_id de la URL de Cloudinary
            $urlParts = explode('/', $imagen->url);
            $publicId = 'muestras/' . pathinfo(end($urlParts), PATHINFO_FILENAME);
            
            // Eliminar la imagen de Cloudinary
            $this->cloudinary->uploadApi()->destroy($publicId);
            
            // Eliminar el registro de la base de datos
            $imagen->delete();

            DB::commit();
            return response()->json(['message' => 'Imagen eliminada correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al eliminar imagen: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error al eliminar la imagen: ' . $e->getMessage()
            ], 500);
        }
    }

    public function obtenerImagen($id)
    {
        try {
            $imagen = Imagen::with('zoom')->findOrFail($id);
            return response()->json($imagen, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al obtener la imagen: ' . $e->getMessage()
            ], 404);
        }
    }
}