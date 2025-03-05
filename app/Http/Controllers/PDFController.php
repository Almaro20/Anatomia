<?php

namespace App\Http\Controllers;

use App\Models\Muestra;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Log;

class PDFController extends Controller
{
    public function generarPDF($id)
    {
        try {
            // Obtener la muestra
            $muestra = Muestra::with([
                'tipoEstudio',
                'tipoNaturaleza',
                'formato',
                'calidad',
                'sede',
                'user'
            ])->findOrFail($id);

            // Crear una nueva instancia de DOMPDF
            $dompdf = new Dompdf();

            // Renderizar la vista a HTML
            $html = view('pdf', ['muestra' => $muestra])->render();

            // Cargar el HTML en DOMPDF
            $dompdf->loadHtml($html);

            // Renderizar el PDF (obligatorio)
            $dompdf->render();

            // Obtener el contenido del PDF
            $output = $dompdf->output();

            // Devolver como respuesta con los headers correctos
            return response($output, 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="informe.pdf"',
                'Content-Length' => strlen($output)
            ]);

        } catch (\Exception $e) {
            Log::error('Error en PDF: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'error' => 'Error al generar el PDF',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}
