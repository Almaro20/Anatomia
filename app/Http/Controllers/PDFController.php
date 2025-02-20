<?php

namespace App\Http\Controllers;

use App\Models\Muestra;
use Dompdf\Dompdf;
use Dompdf\Options;

class PDFController extends Controller
{
    public function generarPDF($id)
    {
        // Buscar la muestra por su ID con todas las relaciones existentes
        $muestra = Muestra::with([
            'tipoNaturaleza',
            'formato',
            'calidad',
            'sede',
            'user'
            // 'imagen' lo quitamos ya que aún no está implementado
        ])->findOrFail($id);

        // Crear una nueva instancia de DOMPDF
        $dompdf = new Dompdf();

        // Configurar opciones
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf->setOptions($options);

        // Renderizar la vista
        $html = view('pdf', compact('muestra'))->render();

        // Cargar el HTML
        $dompdf->loadHtml($html);

        // Establecer el tamaño del papel y orientación
        $dompdf->setPaper('A4', 'portrait');

        // Renderizar el PDF
        $dompdf->render();

        // Descargar el PDF
        return $dompdf->stream("informe_muestra_{$muestra->codigo}.pdf", [
            "Attachment" => false
        ]);
    }
}
