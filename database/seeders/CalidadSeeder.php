<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Calidad;
use App\Models\TipoEstudio;

class CalidadSeeder extends Seeder
{
    public function run()
    {
        // Obtener los IDs de tipo_estudio
        $tipoEstudios = TipoEstudio::pluck('id', 'nombre')->toArray();

        $calidades = [
            // Biopsias
                // CORAZÓN
                ['codigo' => 'BC.1.', 'descripcion' => 'Toma válida para examen.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BC.2.', 'descripcion' => 'Toma válida para examen aunque limitada por ausencia de células endocárdicas/zona de transición.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BC.3.', 'descripcion' => 'Toma válida para examen aunque limitada por hemorragia.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BC.4.', 'descripcion' => 'Toma válida para examen aunque limitada por escasez de células.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BC.5.', 'descripcion' => 'Toma válida para examen aunque limitada por intensa citólisis.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BC.6.', 'descripcion' => 'Toma válida para examen aunque limitada por...', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BC.7.', 'descripcion' => 'Toma no valorable por desecación.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BC.8.', 'descripcion' => 'Toma no valorable por ausencia de células.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BC.9.', 'descripcion' => 'Toma no valorable por...', 'tipoEstudio' => 'Estudio de Biopsias'],

                // HÍGADO
                ['codigo' => 'BH.1.', 'descripcion' => 'Muestra válida para examen.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BH.2.', 'descripcion' => 'Muestra válida para examen aunque limitada por ausencia de células endoteliales/hepatocitos periportales.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BH.3.', 'descripcion' => 'Muestra válida para examen aunque limitada por presencia de hemorragia.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BH.4.', 'descripcion' => 'Muestra válida para examen aunque limitada por escasez de células.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BH.5.', 'descripcion' => 'Muestra válida para examen aunque limitada por intensa citólisis.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BH.6.', 'descripcion' => 'Muestra válida para examen aunque limitada por...', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BH.7.', 'descripcion' => 'Muestra no valorable por desecación.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BH.8.', 'descripcion' => 'Muestra no valorable por ausencia de células.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BH.9.', 'descripcion' => 'Muestra no valorable por...', 'tipoEstudio' => 'Estudio de Biopsias'],

                // ESTÓMAGO
                ['codigo' => 'BES.1.', 'descripcion' => 'Muestra válida para examen.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BES.2.', 'descripcion' => 'Muestra válida para examen aunque limitada por presencia de contenido gástrico residual.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BES.3.', 'descripcion' => 'Muestra válida para examen aunque limitada por presencia de sangre.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BES.4.', 'descripcion' => 'Muestra válida para examen aunque limitada por escasez de células.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BES.5.', 'descripcion' => 'Muestra válida para examen aunque limitada por presencia de moco.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BES.6.', 'descripcion' => 'Muestra válida para examen aunque limitada por...', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BES.7.', 'descripcion' => 'Muestra no valorable por desecación.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BES.8.', 'descripcion' => 'Muestra no valorable por ausencia de tejido gástrico.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BES.9.', 'descripcion' => 'Muestra no valorable por...', 'tipoEstudio' => 'Estudio de Biopsias'],

                // RIÑÓN
                ['codigo' => 'BR.1.', 'descripcion' => 'Muestra válida para examen.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BR.2.', 'descripcion' => 'Muestra válida para examen aunque limitada por presencia de tejido adiposo perirrenal.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BR.3.', 'descripcion' => 'Muestra válida para examen aunque limitada por presencia de sangre en el espécimen.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BR.4.', 'descripcion' => 'Muestra válida para examen aunque limitada por escasez de glomérulos en el corte.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BR.5.', 'descripcion' => 'Muestra válida para examen aunque limitada por presencia de artefactos de fijación.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BR.6.', 'descripcion' => 'Muestra válida para examen aunque limitada por...', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BR.7.', 'descripcion' => 'Muestra no valorable por desecación.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BR.8.', 'descripcion' => 'Muestra no valorable por ausencia de tejido renal.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BR.9.', 'descripcion' => 'Muestra no valorable por...', 'tipoEstudio' => 'Estudio de Biopsias'],

                    // ÚTERO
                ['codigo' => 'BU.1.', 'descripcion' => 'Muestra válida para examen.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BU.2.', 'descripcion' => 'Muestra válida para examen aunque limitada por presencia de sangre menstrual en el espécimen.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BU.3.', 'descripcion' => 'Muestra válida para examen aunque limitada por escasez de tejido endometrial en el corte.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BU.4.', 'descripcion' => 'Muestra válida para examen aunque limitada por presencia de artefactos de fijación.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BU.5.', 'descripcion' => 'Muestra válida para examen aunque limitada por presencia de células descamadas en el endometrio.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BU.6.', 'descripcion' => 'Muestra válida para examen aunque limitada por...', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BU.7.', 'descripcion' => 'Muestra no valorable por desecación.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BU.8.', 'descripcion' => 'Muestra no valorable por ausencia de tejido uterino.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BU.9.', 'descripcion' => 'Muestra no valorable por...', 'tipoEstudio' => 'Estudio de Biopsias'],


                // INTESTINO
                ['codigo' => 'BI.1.', 'descripcion' => 'La muestra es válida para el examen.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BI.2.', 'descripcion' => 'Aunque válida, la muestra está limitada por la presencia de contenido fecal en el lumen intestinal.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BI.3.', 'descripcion' => 'La muestra es válida para el examen, pero está limitada por la escasez de tejido mucoso en el corte.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BI.4.', 'descripcion' => 'La muestra es válida para el examen, pero está limitada por la presencia de artefactos de fijación.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BI.5.', 'descripcion' => 'La muestra es válida para el examen, aunque está limitada por la presencia de tejido adiposo perivisceral.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BI.6.', 'descripcion' => 'La muestra es válida para el examen, aunque está limitada por...', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BI.7.', 'descripcion' => 'La muestra no es valorable debido a la desecación.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BI.8.', 'descripcion' => 'La muestra no es valorable debido a la ausencia de tejido intestinal.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BI.9.', 'descripcion' => 'La muestra no es valorable debido a...', 'tipoEstudio' => 'Estudio de Biopsias'],

                    // ESÓFAGO
                ['codigo' => 'BEF.1.', 'descripcion' => 'La muestra es válida para el examen.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BEF.2.', 'descripcion' => 'Aunque válida, la muestra está limitada por la presencia de contenido alimenticio en la luz esofágica.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BEF.3.', 'descripcion' => 'La muestra es válida para el examen, pero está limitada por la escasez de tejido epitelial en el corte.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BEF.4.', 'descripcion' => 'La muestra es válida para el examen, pero está limitada por la presencia de artefactos de fijación.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BEF.5.', 'descripcion' => 'La muestra es válida para el examen, aunque está limitada por la presencia de tejido conectivo periesofágico.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BEF.6.', 'descripcion' => 'La muestra es válida para el examen, aunque está limitada por...', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BEF.7.', 'descripcion' => 'La muestra no es valorable debido a la desecación.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BEF.8.', 'descripcion' => 'La muestra no es valorable debido a la ausencia de tejido esofágico.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BEF.9.', 'descripcion' => 'La muestra no es valorable debido a...', 'tipoEstudio' => 'Estudio de Biopsias'],

                // TESTÍCULOS
                ['codigo' => 'BT.1.', 'descripcion' => 'La muestra es válida para el examen.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BT.2.', 'descripcion' => 'Aunque válida, la muestra está limitada por la presencia de células germinales escasas.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BT.3.', 'descripcion' => 'La muestra es válida para el examen, pero está limitada por la presencia de tejido fibroso intersticial.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BT.4.', 'descripcion' => 'La muestra es válida para el examen, pero está limitada por la presencia de artefactos de fijación.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BT.5.', 'descripcion' => 'La muestra es válida para el examen, aunque está limitada por la deshidratación del tejido.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BT.6.', 'descripcion' => 'La muestra es válida para el examen, aunque está limitada por...', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BT.7.', 'descripcion' => 'La muestra no es valorable debido a la desecación.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BT.8.', 'descripcion' => 'La muestra no es valorable debido a la ausencia de tejido testicular.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BT.9.', 'descripcion' => 'La muestra no es valorable debido a...', 'tipoEstudio' => 'Estudio de Biopsias'],


                 // PULMÓN
                ['codigo' => 'BP.1.', 'descripcion' => 'La muestra es válida para el examen.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BP.2.', 'descripcion' => 'Aunque válida, la muestra está limitada por la presencia de tejido necrótico en el corte.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BP.3.', 'descripcion' => 'La muestra es válida para el examen, pero está limitada por la presencia de artefactos de fijación.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BP.4.', 'descripcion' => 'La muestra es válida para el examen, pero está limitada por la presencia de células inflamatorias abundantes.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BP.5.', 'descripcion' => 'La muestra es válida para el examen, aunque está limitada por la deshidratación del tejido.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BP.6.', 'descripcion' => 'La muestra es válida para el examen, aunque está limitada por...', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BP.7.', 'descripcion' => 'La muestra no es valorable debido a la desecación.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BP.8.', 'descripcion' => 'La muestra no es valorable debido a la ausencia de tejido pulmonar.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BP.9.', 'descripcion' => 'La muestra no es valorable debido a...', 'tipoEstudio' => 'Estudio de Biopsias'],

                // BAZO
                ['codigo' => 'BB.1.', 'descripcion' => 'La muestra es válida para el examen.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BB.2.', 'descripcion' => 'Aunque válida, la muestra está limitada por la presencia de tejido hemorrágico en el corte.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BB.3.', 'descripcion' => 'La muestra es válida para el examen, pero está limitada por la escasez de tejido linfoide en la muestra.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BB.4.', 'descripcion' => 'La muestra es válida para el examen, pero está limitada por la presencia de artefactos de fijación.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BB.5.', 'descripcion' => 'La muestra es válida para el examen, aunque está limitada por la deshidratación del tejido.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BB.6.', 'descripcion' => 'La muestra es válida para el examen, aunque está limitada por...', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BB.7.', 'descripcion' => 'La muestra no es valorable debido a la desecación.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BB.8.', 'descripcion' => 'La muestra no es valorable debido a la ausencia de tejido esplénico.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BB.9.', 'descripcion' => 'La muestra no es valorable debido a...', 'tipoEstudio' => 'Estudio de Biopsias'],


                // FETO
                ['codigo' => 'BF.1.', 'descripcion' => 'Toma válida para examen.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BF.2.', 'descripcion' => 'Toma válida para examen aunque limitada por tamaño del feto.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BF.3.', 'descripcion' => 'Toma válida para examen aunque limitada por artefactos de procesamiento.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BF.4.', 'descripcion' => 'Toma válida para examen aunque limitada por deterioro del tejido fetal.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BF.5.', 'descripcion' => 'Toma válida para examen aunque limitada por presencia de líquido amniótico.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BF.6.', 'descripcion' => 'Toma no valorable por desecación.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BF.7.', 'descripcion' => 'Toma no valorable por ausencia de tejido fetal.', 'tipoEstudio' => 'Estudio de Biopsias'],



                // CEREBRO
                ['codigo' => 'BCB.1.', 'descripcion' => 'Toma válida para examen.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BCB.2.', 'descripcion' => 'Toma válida para examen aunque limitada por escasez de tejido cerebral.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BCB.3.', 'descripcion' => 'Toma válida para examen aunque limitada por artefactos de procesamiento.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BCB.4.', 'descripcion' => 'Toma válida para examen aunque limitada por hemorragia.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BCB.5.', 'descripcion' => 'Toma válida para examen aunque limitada por necrosis extensa.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BCB.6.', 'descripcion' => 'Toma no valorable por desecación.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BCB.7.', 'descripcion' => 'Toma no valorable por ausencia de tejido cerebral.', 'tipoEstudio' => 'Estudio de Biopsias'],


                // LENGUA
                ['codigo' => 'BL.1.', 'descripcion' => 'Toma válida para examen.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BL.2.', 'descripcion' => 'Toma válida para examen aunque limitada por escasez de tejido lingual.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BL.3.', 'descripcion' => 'Toma válida para examen aunque limitada por artefactos de procesamiento.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BL.4.', 'descripcion' => 'Toma válida para examen aunque limitada por hemorragia.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BL.5.', 'descripcion' => 'Toma válida para examen aunque limitada por presencia de saliva.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BL.6.', 'descripcion' => 'Toma no valorable por desecación.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BL.7.', 'descripcion' => 'Toma no valorable por ausencia de tejido lingual.', 'tipoEstudio' => 'Estudio de Biopsias'],


                 // OVARIO
                ['codigo' => 'BO.1.', 'descripcion' => 'Toma válida para examen.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BO.2.', 'descripcion' => 'Toma válida para examen aunque limitada por escasez de tejido ovárico.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BO.3.', 'descripcion' => 'Toma válida para examen aunque limitada por artefactos de procesamiento.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BO.4.', 'descripcion' => 'Toma válida para examen aunque limitada por hemorragia.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BO.5.', 'descripcion' => 'Toma válida para examen aunque limitada por necrosis extensa.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BO.6.', 'descripcion' => 'Toma no valorable por desecación.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BO.7.', 'descripcion' => 'Toma no valorable por ausencia de tejido ovárico.', 'tipoEstudio' => 'Estudio de Biopsias'],


                // TROMPAS DE FALOPIO
                ['codigo' => 'BTF.1.', 'descripcion' => 'Toma válida para examen.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BTF.2.', 'descripcion' => 'Toma válida para examen aunque limitada por escasez de tejido tubárico.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BTF.3.', 'descripcion' => 'Toma válida para examen aunque limitada por artefactos de procesamiento.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BTF.4.', 'descripcion' => 'Toma válida para examen aunque limitada por hemorragia.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BTF.5.', 'descripcion' => 'Toma válida para examen aunque limitada por presencia de moco cervical.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BTF.6.', 'descripcion' => 'Toma no valorable por desecación.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BTF.7.', 'descripcion' => 'Toma no valorable por ausencia de tejido tubárico.', 'tipoEstudio' => 'Estudio de Biopsias'],


                    // PÁNCREAS
                ['codigo' => 'BPA.1.', 'descripcion' => 'Toma válida para examen.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BPA.2.', 'descripcion' => 'Toma válida para examen aunque limitada por escasez de tejido pancreático.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BPA.3.', 'descripcion' => 'Toma válida para examen aunque limitada por artefactos de procesamiento.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BPA.4.', 'descripcion' => 'Toma válida para examen aunque limitada por necrosis extensa.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BPA.5.', 'descripcion' => 'Toma válida para examen aunque limitada por hemorragia.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BPA.6.', 'descripcion' => 'Toma no valorable por desecación.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BPA.7.', 'descripcion' => 'Toma no valorable por ausencia de tejido pancreático.', 'tipoEstudio' => 'Estudio de Biopsias'],


                // PIEL
                ['codigo' => 'BPI.1.', 'descripcion' => 'Toma válida para examen.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BPI.2.', 'descripcion' => 'Toma válida para examen aunque limitada por ausencia de células endocervicales/zona de transición.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BPI.3.', 'descripcion' => 'Toma válida para examen aunque limitada por hemorragia.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BPI.4.', 'descripcion' => 'Toma válida para examen aunque limitada por escasez de células.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BPI.5.', 'descripcion' => 'Toma válida para examen aunque limitada por intensa citólisis.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BPI.6.', 'descripcion' => 'Toma no valorable por desecación.', 'tipoEstudio' => 'Estudio de Biopsias'],
                ['codigo' => 'BPI.7.', 'descripcion' => 'Toma no valorable por ausencia de células.', 'tipoEstudio' => 'Estudio de Biopsias'],


            // Citología Vaginal
            ['codigo' => 'C.1', 'descripcion' => 'Toma válida para examen.', 'tipoEstudio' => 'Estudio Citológico Cérvico-Vaginal'],
            ['codigo' => 'C.2', 'descripcion' => 'Toma válida para examen aunque limitada por ausencia de células endocervicales / zona de transición.', 'tipoEstudio' => 'Estudio Citológico Cérvico-Vaginal'],
            ['codigo' => 'C.3', 'descripcion' => 'Toma válida para examen aunque limitada por hemorragia.', 'tipoEstudio' => 'Estudio Citológico Cérvico-Vaginal'],
            ['codigo' => 'C.4', 'descripcion' => 'Toma válida para examen aunque limitada por escasez de células.', 'tipoEstudio' => 'Estudio Citológico Cérvico-Vaginal'],
            ['codigo' => 'C.5', 'descripcion' => 'Toma válida para examen aunque limitada por intensa citolisis.', 'tipoEstudio' => 'Estudio Citológico Cérvico-Vaginal'],
            ['codigo' => 'C.6', 'descripcion' => 'Toma válida para examen aunque limitada por...', 'tipoEstudio' => 'Estudio Citológico Cérvico-Vaginal'],
            ['codigo' => 'C.7', 'descripcion' => 'Toma no valorable por desecación.', 'tipoEstudio' => 'Estudio Citológico Cérvico-Vaginal'],
            ['codigo' => 'C.8', 'descripcion' => 'Toma no valorable por ausencia de células.', 'tipoEstudio' => 'Estudio Citológico Cérvico-Vaginal'],
            ['codigo' => 'C.9', 'descripcion' => 'Toma no valorable por...', 'tipoEstudio' => 'Estudio Citológico Cérvico-Vaginal'],


            // Hematología
            ['codigo' => 'H.1', 'descripcion' => 'Muestra válida para examen.', 'tipoEstudio' => 'Estudio Hematológico Completo'],
            ['codigo' => 'H.2', 'descripcion' => 'Muestra válida para examen aunque limitada por lipemia.', 'tipoEstudio' => 'Estudio Hematológico Completo'],
            ['codigo' => 'H.3', 'descripcion' => 'Muestra válida para examen aunque limitada por hemólisis.', 'tipoEstudio' => 'Estudio Hematológico Completo'],
            ['codigo' => 'H.4', 'descripcion' => 'Muestra válida para examen aunque limitada por aglutinación.', 'tipoEstudio' => 'Estudio Hematológico Completo'],
            ['codigo' => 'H.5', 'descripcion' => 'Muestra válida para examen aunque limitada por coagulación.', 'tipoEstudio' => 'Estudio Hematológico Completo'],
            ['codigo' => 'H.6', 'descripcion' => 'Muestra válida para examen aunque limitada por...', 'tipoEstudio' => 'Estudio Hematológico Completo'],
            ['codigo' => 'H.7', 'descripcion' => 'Muestra no valorable por desnaturalización de proteínas.', 'tipoEstudio' => 'Estudio Hematológico Completo'],
            ['codigo' => 'H.8', 'descripcion' => 'Muestra no valorable por contaminación bacteriana.', 'tipoEstudio' => 'Estudio Hematológico Completo'],
            ['codigo' => 'H.9', 'descripcion' => 'Muestra no valorable por...', 'tipoEstudio' => 'Estudio Hematológico Completo'],

            // Orina
            ['codigo' => 'U.1', 'descripcion' => 'Muestra válida para examen.', 'tipoEstudio' => 'Estudio Microscópico y Químico de Orina'],
            ['codigo' => 'U.2', 'descripcion' => 'Muestra válida para examen aunque limitada por turbidez.', 'tipoEstudio' => 'Estudio Microscópico y Químico de Orina'],
            ['codigo' => 'U.3', 'descripcion' => 'Muestra válida para examen aunque limitada por coloración anormal.', 'tipoEstudio' => 'Estudio Microscópico y Químico de Orina'],
            ['codigo' => 'U.4', 'descripcion' => 'Muestra válida para examen aunque limitada por contaminación fecal.', 'tipoEstudio' => 'Estudio Microscópico y Químico de Orina'],
            ['codigo' => 'U.5', 'descripcion' => 'Muestra válida para examen aunque limitada por preservación inadecuada.', 'tipoEstudio' => 'Estudio Microscópico y Químico de Orina'],
            ['codigo' => 'U.6', 'descripcion' => 'Muestra válida para examen aunque limitada por volumen insuficiente.', 'tipoEstudio' => 'Estudio Microscópico y Químico de Orina'],
            ['codigo' => 'U.7', 'descripcion' => 'Muestra no valorable por deterioro.', 'tipoEstudio' => 'Estudio Microscópico y Químico de Orina'],
            ['codigo' => 'U.8', 'descripcion' => 'Muestra no valorable por contaminación con agentes externos.', 'tipoEstudio' => 'Estudio Microscópico y Químico de Orina'],
            ['codigo' => 'U.9', 'descripcion' => 'Muestra no valorable por…', 'tipoEstudio' => 'Estudio Microscópico y Químico de Orina'],

            // Esputo
            ['codigo' => 'E.1', 'descripcion' => 'Muestra válida para examen.', 'tipoEstudio' => 'Estudio Citológico de Esputo'],
            ['codigo' => 'E.2', 'descripcion' => 'Muestra válida para examen aunque limitada por volumen insuficiente.', 'tipoEstudio' => 'Estudio Citológico de Esputo'],
            ['codigo' => 'E.3', 'descripcion' => 'Muestra válida para examen aunque limitada por presencia de sangre.', 'tipoEstudio' => 'Estudio Citológico de Esputo'],
            ['codigo' => 'E.4', 'descripcion' => 'Muestra válida para examen aunque limitada por contaminación con saliva.', 'tipoEstudio' => 'Estudio Citológico de Esputo'],
            ['codigo' => 'E.5', 'descripcion' => 'Muestra válida para examen aunque limitada por contaminación con secreciones nasales.', 'tipoEstudio' => 'Estudio Citológico de Esputo'],
            ['codigo' => 'E.6', 'descripcion' => 'Muestra válida para examen aunque limitada por presencia de alimentos.', 'tipoEstudio' => 'Estudio Citológico de Esputo'],
            ['codigo' => 'E.7', 'descripcion' => 'Muestra no valorable por descomposición.', 'tipoEstudio' => 'Estudio Citológico de Esputo'],
            ['codigo' => 'E.8', 'descripcion' => 'Muestra no valorable por...', 'tipoEstudio' => 'Estudio Citológico de Esputo'],
            ['codigo' => 'E.9', 'descripcion' => 'Muestra no valorable por...', 'tipoEstudio' => 'Estudio Citológico de Esputo'],

            //buccal
            ['codigo' => 'B.1.', 'descripcion' => 'Muestra válida para examen.', 'tipoEstudio' => 'Estudio Citológico Buccal'],
            ['codigo' => 'B.2.', 'descripcion' => 'Muestra válida para examen aunque limitada por cantidad insuficiente de células.', 'tipoEstudio' => 'Estudio Citológico Buccal'],
            ['codigo' => 'B.3.', 'descripcion' => 'Muestra válida para examen aunque limitada por presencia de sangre.', 'tipoEstudio' => 'Estudio Citológico Buccal'],
            ['codigo' => 'B.4.', 'descripcion' => 'Muestra válida para examen aunque limitada por contaminación con alimentos.', 'tipoEstudio' => 'Estudio Citológico Buccal'],
            ['codigo' => 'B.5.', 'descripcion' => 'Muestra válida para examen aunque limitada por contaminación con saliva.', 'tipoEstudio' => 'Estudio Citológico Buccal'],
            ['codigo' => 'B.6.', 'descripcion' => 'Muestra válida para examen aunque limitada por...', 'tipoEstudio' => 'Estudio Citológico Buccal'],
            ['codigo' => 'B.7.', 'descripcion' => 'Muestra no valorable por deshidratación.', 'tipoEstudio' => 'Estudio Citológico Buccal'],
            ['codigo' => 'B.8.', 'descripcion' => 'Muestra no valorable por contaminación con microorganismos.', 'tipoEstudio' => 'Estudio Citológico Buccal'],
            ['codigo' => 'B.9.', 'descripcion' => 'Muestra no valorable por...', 'tipoEstudio' => 'Estudio Citológico Buccal']
        ];

        foreach ($calidades as $calidad) {
            if (isset($tipoEstudios[$calidad['tipoEstudio']])) {
                Calidad::create([
                    'codigo' => $calidad['codigo'],
                    'descripcion' => $calidad['descripcion'],
                    'tipoEstudio_id' => $tipoEstudios[$calidad['tipoEstudio']],
                ]);
            }
        }
    }
}
