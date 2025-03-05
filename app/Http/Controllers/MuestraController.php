<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Muestra;
use App\Models\Imagen;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class MuestraController extends Controller
{
    protected $imagenController;

    public function __construct(ImagenController $imagenController)
    {
        $this->imagenController = $imagenController;
    }

    public function getAll()
    {
        try {
            $muestras = Muestra::with(['imagen', 'imagen.zoom', 'tipoEstudio', 'formato'])->get();
            return response()->json($muestras, 200);
        } catch (\Exception $e) {
            Log::error('Error al obtener muestras: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error al obtener las muestras',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function create(Request $request)
    {
        try {
            DB::beginTransaction();

            // Crear la muestra primero sin la imagen
            $muestra = Muestra::create($request->except(['imagenes', 'zooms']));

            // Si hay imágenes, procesarlas usando el ImagenController
            if ($request->hasFile('imagenes')) {
                $imagenes = $request->file('imagenes');
                $zooms = json_decode($request->input('zooms', '[]'));

                // Asegurarse de que tenemos la misma cantidad de zooms que imágenes
                if (count($imagenes) !== count($zooms)) {
                    throw new \Exception('La cantidad de imágenes y zooms no coincide');
                }

                // Crear un nuevo request para el ImagenController
                $imageRequest = new Request();
                $imageRequest->files->set('imagenes', $imagenes);
                $imageRequest->merge(['zooms' => $zooms]);

                $imagenResponse = $this->imagenController->subirImagenes($imageRequest)->getData();
                
                if (isset($imagenResponse->imagenes) && !empty($imagenResponse->imagenes)) {
                    // Asignar la primera imagen a la muestra
                    $muestra->imagen_id = $imagenResponse->imagenes[0]->id;
                    $muestra->save();
                }
            }

            DB::commit();
            return response()->json($muestra->load(['imagen', 'imagen.zoom']), 201);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al crear muestra: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error al crear la muestra: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getById($id)
    {
        try {
            $muestra = Muestra::with(['imagen', 'imagen.zoom'])->find($id);
            if (!$muestra) {
                return response()->json(['message' => 'Muestra no encontrada'], 404);
            }
            return response()->json($muestra, 200);
        } catch (\Exception $e) {
            Log::error('Error al obtener muestra: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error al obtener la muestra',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $muestra = Muestra::findOrFail($id);
            
            // Actualizar los datos básicos de la muestra
            $muestra->fill($request->except(['imagenes', 'zooms', 'eliminar_imagen', '_method']));

            // Manejar las imágenes
            if ($request->hasFile('imagenes')) {
                // Si hay una imagen anterior, eliminarla
                if ($muestra->imagen_id) {
                    $this->imagenController->eliminarImagen($muestra->imagen_id);
                    $muestra->imagen_id = null;
                }

                // Subir la nueva imagen
                $imageRequest = new Request();
                $imageRequest->files->set('imagenes', $request->file('imagenes'));
                $imageRequest->merge(['zooms' => json_decode($request->input('zooms', '[]'))]);

                $imagenResponse = $this->imagenController->subirImagenes($imageRequest)->getData();
                
                if (isset($imagenResponse->imagenes) && !empty($imagenResponse->imagenes)) {
                    $muestra->imagen_id = $imagenResponse->imagenes[0]->id;
                }
            } elseif ($request->has('eliminar_imagen')) {
                // Si se solicita eliminar la imagen y existe una
                if ($muestra->imagen_id) {
                    $this->imagenController->eliminarImagen($muestra->imagen_id);
                    $muestra->imagen_id = null;
                }
            }

            $muestra->save();
            
            DB::commit();

            // Cargar la muestra con sus relaciones
            $muestra->load(['imagen', 'imagen.zoom', 'tipoEstudio', 'formato']);
            
            return response()->json($muestra, 200);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al actualizar muestra: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error al actualizar la muestra: ' . $e->getMessage()
            ], 500);
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            
            $muestra = Muestra::findOrFail($id);
            
            if ($muestra->imagen_id) {
                $this->imagenController->eliminarImagen($muestra->imagen_id);
            }
            
            $muestra->interpretaciones()->forceDelete();
            $muestra->delete();
            
            DB::commit();
            return response()->json(['message' => 'Muestra eliminada correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al eliminar muestra: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error al eliminar la muestra',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
