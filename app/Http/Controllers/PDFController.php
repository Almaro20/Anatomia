<?php

namespace App\Http\Controllers;

use App\Models\Muestra;
use Dompdf\Dompdf;
use Dompdf\Options;

class PDFController extends Controller
{
    public function generarPDF($id)
    {
        // Buscar la muestra por su ID
        $muestra = Muestra::findOrFail($id);

        // Crear una nueva instancia de DOMPDF
        $dompdf = new Dompdf();

        // Opciones para DOMPDF (si quieres configurar cosas como el tamaño de la página)
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf->setOptions($options);

        // El contenido HTML que será transformado en PDF
        $html = view('pdf', compact('muestra'))->render();

        // Cargar el contenido HTML
        $dompdf->loadHtml($html);

        // (Opcional) Establecer el tamaño del papel y orientación
        $dompdf->setPaper('A4', 'portrait');

        // Renderizar el PDF
        $dompdf->render();

        // Descargar el PDF generado
        return $dompdf->stream("informe_muestra_{$muestra->codigo}.pdf");
    }
}
