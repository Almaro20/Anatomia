<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterpretacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $interpretacion = [
            //corazon
            ['codigo' => 'BC.1', 'descripcion' => 'Se observa una arquitectura cardíaca conservada, con una adecuada distribución de miocitos y estructuras vasculares.'],
            ['codigo' => 'BC.2', 'descripcion' => 'No se observan signos evidentes de necrosis en el tejido cardíaco, lo que sugiere una integridad estructural relativamente normal.'],
            ['codigo' => 'BC.3', 'descripcion' => 'Identificación de células inflamatorias dispersas en el tejido, indicativas de una respuesta inflamatoria leve o moderada.'],
            ['codigo' => 'BC.4', 'descripcion' => 'Presencia de áreas de fibrosis en el miocardio, posiblemente como resultado de un proceso de cicatrización tras una lesión cardíaca previa.'],
            ['codigo' => 'BC.5', 'descripcion' => 'Se detecta una adecuada perfusión sanguínea en los vasos coronarios, indicativa de una circulación coronaria funcional.'],
            ['codigo' => 'BC.6', 'descripcion' => 'Observación de células cardíacas con una apariencia histológica normal, incluyendo la presencia de discos intercalares y estriaciones transversales.'],
            ['codigo' => 'BC.7', 'descripcion' => 'No se observan células tumorales ni signos de infiltración neoplásica en el tejido cardíaco.'],
            ['codigo' => 'BC.8', 'descripcion' => 'Identificación de células endoteliales íntegras en los vasos sanguíneos, sugiriendo una función endotelial adecuada.'],
            ['codigo' => 'BC.9', 'descripcion' => 'Se observa una distribución regular de fibras de colágeno en el miocardio, indicativo de una matriz extracelular bien organizada.'],
            ['codigo' => 'BC.10', 'descripcion' => 'No se identifican anomalías estructurales significativas en las válvulas cardíacas ni en las cámaras cardíacas.'],

            // Hígado
            ['codigo' => 'BH.1', 'descripcion' => 'Se observa una arquitectura hepática conservada, con cordones de hepatocitos bien definidos y distribución lobulillar normal.'],
            ['codigo' => 'BH.2', 'descripcion' => 'Hay presencia de infiltración celular en los sinusoides hepáticos, sugiriendo una respuesta inflamatoria o un proceso infiltrativo.'],
            ['codigo' => 'BH.3', 'descripcion' => 'Se identifica una acumulación de lípidos en los hepatocitos, indicativo de esteatosis hepática.'],
            ['codigo' => 'BH.4', 'descripcion' => 'Se observan signos de necrosis focal en el tejido, posiblemente debido a isquemia o daño tóxico.'],
            ['codigo' => 'BH.5', 'descripcion' => 'Existe una marcada fibrosis periportal, sugiriendo un proceso crónico de inflamación hepática.'],
            ['codigo' => 'BH.6', 'descripcion' => 'Se observan nódulos de regeneración, indicativos de un proceso de reparación hepática.'],
            ['codigo' => 'BH.7', 'descripcion' => 'Presencia de células de Kupffer activadas, sugiriendo una respuesta inmunitaria o inflamatoria.'],
            ['codigo' => 'BH.8', 'descripcion' => 'Se detectan células endoteliales anormales en los vasos sanguíneos hepáticos, lo que podría indicar un proceso neoplásico.'],
            ['codigo' => 'BH.9', 'descripcion' => 'Se observa una marcada congestión sinusoidal, posiblemente debido a una obstrucción del flujo sanguíneo hepático.'],
            ['codigo' => 'BH.10', 'descripcion' => 'Hay signos de colestasis intrahepática, indicando una obstrucción en el flujo de la bilis dentro del hígado.'],

            // Estómago
            ['codigo' => 'BES.1', 'descripcion' => 'Se observa un epitelio gástrico intacto y bien conservado.'],
            ['codigo' => 'BES.2', 'descripcion' => 'Presencia de infiltración de células inflamatorias en la lámina propia, sugiriendo una respuesta inflamatoria crónica.'],
            ['codigo' => 'BES.3', 'descripcion' => 'Identificación de células caliciformes productoras de moco en las glándulas gástricas.'],
            ['codigo' => 'BES.4', 'descripcion' => 'Signos de erosión superficial de la mucosa gástrica, posiblemente debido a irritación crónica.'],
            ['codigo' => 'BES.5', 'descripcion' => 'Presencia de gastritis aguda, evidenciada por la infiltración de neutrófilos en la mucosa gástrica.'],
            ['codigo' => 'BES.6', 'descripcion' => 'Observación de cambios displásicos en el epitelio gástrico, sugiriendo un proceso preneoplásico.'],
            ['codigo' => 'BES.7', 'descripcion' => 'Detección de Helicobacter pylori en la mucosa gástrica, indicando una infección bacteriana.'],
            ['codigo' => 'BES.8', 'descripcion' => 'Presencia de metaplasia intestinal en la mucosa gástrica, sugiriendo una adaptación al ambiente ácido del estómago.'],
            ['codigo' => 'BES.9', 'descripcion' => 'Identificación de células neuroendocrinas en las glándulas gástricas, indicando una función endocrina.'],
            ['codigo' => 'BES.10', 'descripcion' => 'Signos de ulceración profunda en la mucosa gástrica, posiblemente relacionada con un proceso ulceroso crónico.'],

                        // Riñón
            ['codigo' => 'BR.1', 'descripcion' => 'Se observa una arquitectura renal conservada, con una adecuada distribución de los diferentes componentes histológicos.'],
            ['codigo' => 'BR.2', 'descripcion' => 'Presencia de infiltración de tejido adiposo perirrenal.'],
            ['codigo' => 'BR.3', 'descripcion' => 'Identificación de glóbulos rojos en los túbulos renales, indicativo de hematuria y posible lesión glomerular.'],
            ['codigo' => 'BR.4', 'descripcion' => 'Signos de esclerosis glomerular, evidenciada por la presencia de matriz extracelular aumentada y segmentos glomerulares colapsados.'],
            ['codigo' => 'BR.5', 'descripcion' => 'Presencia de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.'],
            ['codigo' => 'BR.6', 'descripcion' => 'Observación de necrosis tubular aguda, caracterizada por la pérdida de la arquitectura tubular y la presencia de células necróticas en el lumen tubular.'],
            ['codigo' => 'BR.7', 'descripcion' => 'Detección de cilindros hialinos en los túbulos renales, indicando una posible proteinuria.'],
            ['codigo' => 'BR.8', 'descripcion' => 'Presencia de células inflamatorias en el intersticio renal, sugiriendo una respuesta inflamatoria crónica.'],
            ['codigo' => 'BR.9', 'descripcion' => 'Identificación de cuerpos ovales grasos en los túbulos renales, indicativos de daño renal crónico y degeneración lipídica.'],
            ['codigo' => 'BR.10', 'descripcion' => 'Signos de fibrosis intersticial, evidenciada por la presencia de tejido conectivo fibroso entre los túbulos renales y los glomérulos.'],

                        // Útero
            ['codigo' => 'BU.1', 'descripcion' => 'Se observa un endometrio bien conservado, con una adecuada proliferación glandular y estroma endometrial.'],
            ['codigo' => 'BU.2', 'descripcion' => 'Presencia de sangre en el espécimen, indicando la fase menstrual del ciclo uterino.'],
            ['codigo' => 'BU.3', 'descripcion' => 'Identificación de escaso tejido endometrial en el corte, sugiriendo una posible atrofia endometrial.'],
            ['codigo' => 'BU.4', 'descripcion' => 'Signos de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.'],
            ['codigo' => 'BU.5', 'descripcion' => 'Observación de células descamadas en el endometrio, indicativas de la fase de descamación menstrual.'],
            ['codigo' => 'BU.6', 'descripcion' => 'Detección de hiperplasia glandular endometrial, sugiriendo un desequilibrio hormonal.'],
            ['codigo' => 'BU.7', 'descripcion' => 'Presencia de infiltración de células inflamatorias en el estroma endometrial, indicando una respuesta inflamatoria crónica.'],
            ['codigo' => 'BU.8', 'descripcion' => 'Identificación de cuerpos de Arias-Stella en las células glandulares, sugiriendo cambios hormonales asociados con el embarazo o condiciones patológicas.'],
            ['codigo' => 'BU.9', 'descripcion' => 'Signos de adenomiosis, evidenciada por la presencia de glándulas endometriales dentro del miometrio.'],
            ['codigo' => 'BU.10', 'descripcion' => 'Presencia de células atípicas en las glándulas endometriales, sugiriendo una posible neoplasia endometrial.'],

                // Intestino
            ['codigo' => 'BI.1', 'descripcion' => 'Se observa una mucosa intestinal con vellosidades bien conservadas y un epitelio columnar intacto.'],
            ['codigo' => 'BI.2', 'descripcion' => 'Presencia de contenido fecal en el lumen intestinal, indicando la fase digestiva del proceso.'],
            ['codigo' => 'BI.3', 'descripcion' => 'Identificación de escaso tejido mucoso en el corte, sugiriendo una posible atrofia de las glándulas mucosas.'],
            ['codigo' => 'BI.4', 'descripcion' => 'Signos de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.'],
            ['codigo' => 'BI.5', 'descripcion' => 'Observación de tejido adiposo perivisceral, indicativo de la ubicación anatómica de la muestra.'],
            ['codigo' => 'BI.6', 'descripcion' => 'Detección de células caliciformes en las criptas intestinales, indicativas de producción de moco.'],
            ['codigo' => 'BI.7', 'descripcion' => 'Presencia de infiltración de células inflamatorias en la lámina propia, sugiriendo una respuesta inflamatoria crónica.'],
            ['codigo' => 'BI.8', 'descripcion' => 'Identificación de placas de Peyer en la mucosa intestinal, indicativas de tejido linfoide asociado al intestino.'],
            ['codigo' => 'BI.9', 'descripcion' => 'Signos de metaplasia intestinal, evidenciada por la presencia de células caliciformes en áreas no habituales.'],
            ['codigo' => 'BI.10', 'descripcion' => 'Presencia de signos de regeneración epitelial, indicativos de un proceso de reparación tras una lesión o inflamación.'],

                // Esófago
            ['codigo' => 'BEF.1', 'descripcion' => 'Se observa un epitelio escamoso estratificado bien conservado en la mucosa esofágica.'],
            ['codigo' => 'BEF.2', 'descripcion' => 'Presencia de contenido alimenticio en la luz esofágica, indicando la fase de tránsito del proceso digestivo.'],
            ['codigo' => 'BEF.3', 'descripcion' => 'Identificación de escaso tejido epitelial en el corte, sugiriendo posible atrofia o adelgazamiento del epitelio.'],
            ['codigo' => 'BEF.4', 'descripcion' => 'Signos de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.'],
            ['codigo' => 'BEF.5', 'descripcion' => 'Observación de tejido conectivo periesofágico, indicativo de la ubicación anatómica de la muestra.'],
            ['codigo' => 'BEF.6', 'descripcion' => 'Detección de células caliciformes dispersas en la mucosa esofágica, sugiriendo producción de moco.'],
            ['codigo' => 'BEF.7', 'descripcion' => 'Presencia de infiltración de células inflamatorias en la lámina propia, indicando una respuesta inflamatoria.'],
            ['codigo' => 'BEF.8', 'descripcion' => 'Identificación de vasos sanguíneos y nervios en la submucosa esofágica, componentes normales del tejido.'],
            ['codigo' => 'BEF.9', 'descripcion' => 'Signos de hiperplasia epitelial, evidenciada por un aumento en el número de capas celulares.'],
            ['codigo' => 'BEF.10', 'descripcion' => 'Presencia de células de Langerhans en la mucosa esofágica, indicativas de una función inmunológica local.'],

            // Testículos
            ['codigo' => 'BT.1', 'descripcion' => 'Se observa una arquitectura testicular conservada, con la presencia de túbulos seminíferos bien definidos.'],
            ['codigo' => 'BT.2', 'descripcion' => 'Presencia de células germinales escasas en los túbulos seminíferos, lo que puede indicar una disminución en la espermatogénesis.'],
            ['codigo' => 'BT.3', 'descripcion' => 'Identificación de tejido fibroso intersticial entre los túbulos seminíferos, sugiriendo una posible fibrosis testicular.'],
            ['codigo' => 'BT.4', 'descripcion' => 'Signos de artefactos de fijación en el tejido, lo que puede afectar la visualización precisa de algunas estructuras.'],
            ['codigo' => 'BT.5', 'descripcion' => 'Observación de deshidratación del tejido, lo que puede causar contracción y distorsión de las células y estructuras.'],
            ['codigo' => 'BT.6', 'descripcion' => 'Detección de células de Sertoli en los túbulos seminíferos, indicativas de su función de soporte para las células germinales.'],
            ['codigo' => 'BT.7', 'descripcion' => 'Presencia de células de Leydig en el tejido intersticial, responsables de la producción de testosterona.'],
            ['codigo' => 'BT.8', 'descripcion' => 'Identificación de células inmaduras o anormales en los túbulos seminíferos, sugiriendo un posible trastorno en la espermatogénesis.'],
            ['codigo' => 'BT.9', 'descripcion' => 'Signos de inflamación testicular, evidenciados por la presencia de células inflamatorias en el tejido.'],
            ['codigo' => 'BT.10', 'descripcion' => 'Presencia de células apoptóticas en los túbulos seminíferos, indicando un proceso de muerte celular programada, posiblemente relacionado con el daño testicular.'],

            // Pulmón
            ['codigo' => 'BP.1', 'descripcion' => 'Se observa una arquitectura pulmonar conservada, con la presencia de alvéolos bien definidos y paredes alveolares íntegras.'],
            ['codigo' => 'BP.2', 'descripcion' => 'Presencia de tejido necrótico en el corte, sugiriendo un proceso de necrosis tisular, posiblemente debido a una lesión o enfermedad.'],
            ['codigo' => 'BP.3', 'descripcion' => 'Identificación de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.'],
            ['codigo' => 'BP.4', 'descripcion' => 'Signos de inflamación pulmonar, indicados por la presencia de células inflamatorias abundantes en el tejido.'],
            ['codigo' => 'BP.5', 'descripcion' => 'Observación de deshidratación del tejido, lo que puede causar contracción y distorsión de las células y estructuras.'],
            ['codigo' => 'BP.6', 'descripcion' => 'Detección de tejido fibroso en los espacios alveolares, sugiriendo fibrosis pulmonar.'],
            ['codigo' => 'BP.7', 'descripcion' => 'Presencia de células de metaplasia escamosa en las vías respiratorias, indicativas de una respuesta adaptativa al daño crónico.'],
            ['codigo' => 'BP.8', 'descripcion' => 'Identificación de células neoplásicas en el tejido, sugiriendo un proceso tumoral pulmonar.'],
            ['codigo' => 'BP.9', 'descripcion' => 'Signos de edema pulmonar, evidenciados por la presencia de líquido en los espacios alveolares.'],
            ['codigo' => 'BP.10', 'descripcion' => 'Presencia de cuerpos extraños en el tejido, indicando inhalación de material extraño.'],

            // Bazo
            ['codigo' => 'BB.1', 'descripcion' => 'Se observa una arquitectura esplénica conservada, con una adecuada distribución de la pulpa blanca y roja.'],
            ['codigo' => 'BB.2', 'descripcion' => 'Presencia de áreas de tejido hemorrágico en el corte, indicativo de hemorragia intraparenquimatosa reciente o traumática.'],
            ['codigo' => 'BB.3', 'descripcion' => 'Identificación de escaso tejido linfoide en la muestra, sugiriendo una posible atrofia o disminución de la actividad inmunológica.'],
            ['codigo' => 'BB.4', 'descripcion' => 'Signos de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.'],
            ['codigo' => 'BB.5', 'descripcion' => 'Observación de deshidratación del tejido, lo que puede causar contracción y distorsión de las células y estructuras.'],
            ['codigo' => 'BB.6', 'descripcion' => 'Se detecta un aumento en el tamaño de los folículos linfoides, indicativo de una respuesta inmunológica activa.'],
            ['codigo' => 'BB.7', 'descripcion' => 'Presencia de células plasmáticas en la pulpa blanca, sugiriendo una respuesta inmunitaria o inflamatoria.'],
            ['codigo' => 'BB.8', 'descripcion' => 'Identificación de células de la serie eritroide en la pulpa roja, indicando actividad hematopoyética.'],


                        // Feto
            ['codigo' => 'BF.1', 'descripcion' => 'Presencia de tejido fetal bien desarrollado.'],
            ['codigo' => 'BF.2', 'descripcion' => 'Presencia de órganos internos correctamente formados.'],
            ['codigo' => 'BF.3', 'descripcion' => 'Presencia de tejido nervioso en desarrollo.'],
            ['codigo' => 'BF.4', 'descripcion' => 'Presencia de células sanguíneas en formación.'],
            ['codigo' => 'BF.5', 'descripcion' => 'Presencia de huesos en proceso de osificación.'],
            ['codigo' => 'BF.6', 'descripcion' => 'Presencia de tejido muscular en desarrollo.'],
            ['codigo' => 'BF.7', 'descripcion' => 'Presencia de membranas fetales intactas.'],
            ['codigo' => 'BF.8', 'descripcion' => 'Presencia de cordón umbilical sin anomalías evidentes.'],
            ['codigo' => 'BF.9', 'descripcion' => 'Presencia de estructuras faciales reconocibles.'],
            ['codigo' => 'BF.10', 'descripcion' => 'Presencia de extremidades bien formadas.'],

            // Cerebro
            ['codigo' => 'BCB.1', 'descripcion' => 'Presencia de neuronas.'],
            ['codigo' => 'BCB.2', 'descripcion' => 'Presencia de células gliales.'],
            ['codigo' => 'BCB.3', 'descripcion' => 'Presencia de fibras nerviosas mielinizadas.'],
            ['codigo' => 'BCB.4', 'descripcion' => 'Presencia de fibras nerviosas no mielinizadas.'],
            ['codigo' => 'BCB.5', 'descripcion' => 'Presencia de vasos sanguíneos.'],
            ['codigo' => 'BCB.6', 'descripcion' => 'Presencia de células inflamatorias.'],
            ['codigo' => 'BCB.7', 'descripcion' => 'Presencia de infiltración de células neoplásicas.'],
            ['codigo' => 'BCB.8', 'descripcion' => 'Presencia de cuerpos de inclusión intracelulares.'],
            ['codigo' => 'BCB.9', 'descripcion' => 'Presencia de placas de proteína beta-amiloide.'],
            ['codigo' => 'BCB.10', 'descripcion' => 'Presencia de cuerpos de Lewy.'],

            // Lengua
            ['codigo' => 'BL.1', 'descripcion' => 'Presencia de epitelio escamoso estratificado.'],
            ['codigo' => 'BL.2', 'descripcion' => 'Presencia de papilas gustativas filiformes.'],
            ['codigo' => 'BL.3', 'descripcion' => 'Presencia de papilas gustativas fungiformes.'],
            ['codigo' => 'BL.4', 'descripcion' => 'Presencia de papilas gustativas foliadas.'],
            ['codigo' => 'BL.5', 'descripcion' => 'Presencia de células caliciformes.'],
            ['codigo' => 'BL.6', 'descripcion' => 'Presencia de células basales.'],
            ['codigo' => 'BL.7', 'descripcion' => 'Presencia de células parabasales.'],
            ['codigo' => 'BL.8', 'descripcion' => 'Presencia de células intermedias.'],
            ['codigo' => 'BL.9', 'descripcion' => 'Presencia de células superficiales.'],
            ['codigo' => 'BL.10', 'descripcion' => 'Presencia de células inflamatorias.'],
            ['codigo' => 'BL.11', 'descripcion' => 'Presencia de células de Langerhans.'],
            ['codigo' => 'BL.12', 'descripcion' => 'Presencia de células glandulares.'],
            ['codigo' => 'BL.13', 'descripcion' => 'Presencia de células neoplásicas.'],
            ['codigo' => 'BL.14', 'descripcion' => 'Presencia de células con cambios atípicos.'],
            ['codigo' => 'BL.15', 'descripcion' => 'Presencia de cuerpos extraños.'],

            // Ovario
            ['codigo' => 'BO.1', 'descripcion' => 'Presencia de folículos primordiales.'],
            ['codigo' => 'BO.2', 'descripcion' => 'Presencia de folículos primarios.'],
            ['codigo' => 'BO.3', 'descripcion' => 'Presencia de folículos secundarios.'],
            ['codigo' => 'BO.4', 'descripcion' => 'Presencia de folículos maduros.'],
            ['codigo' => 'BO.5', 'descripcion' => 'Presencia de células de la granulosa.'],
            ['codigo' => 'BO.6', 'descripcion' => 'Presencia de células de la teca.'],
            ['codigo' => 'BO.7', 'descripcion' => 'Presencia de células lúteas.'],
            ['codigo' => 'BO.8', 'descripcion' => 'Presencia de cuerpos albicans.'],
            ['codigo' => 'BO.9', 'descripcion' => 'Presencia de células intersticiales.'],
            ['codigo' => 'BO.10', 'descripcion' => 'Presencia de células estromales.'],

             // Trompas de Falopio
            ['codigo' => 'BTF.1', 'descripcion' => 'Presencia de epitelio cilíndrico.'],
            ['codigo' => 'BTF.2', 'descripcion' => 'Presencia de células ciliadas.'],
            ['codigo' => 'BTF.3', 'descripcion' => 'Presencia de células secretoras.'],
            ['codigo' => 'BTF.4', 'descripcion' => 'Presencia de células endometriales ectópicas.'],
            ['codigo' => 'BTF.5', 'descripcion' => 'Presencia de células inflamatorias.'],
            ['codigo' => 'BTF.6', 'descripcion' => 'Presencia de células escamosas metaplásicas.'],
            ['codigo' => 'BTF.7', 'descripcion' => 'Presencia de células glandulares atípicas.'],
            ['codigo' => 'BTF.8', 'descripcion' => 'Presencia de células endometriales.'],
            ['codigo' => 'BTF.9', 'descripcion' => 'Presencia de células estromales.'],
            ['codigo' => 'BTF.10', 'descripcion' => 'Presencia de cuerpos extraños.'],

            // Páncreas
            ['codigo' => 'BPA.1', 'descripcion' => 'Presencia de células acinares.'],
            ['codigo' => 'BPA.2', 'descripcion' => 'Presencia de islotes de Langerhans.'],
            ['codigo' => 'BPA.3', 'descripcion' => 'Presencia de células ductales.'],
            ['codigo' => 'BPA.4', 'descripcion' => 'Presencia de infiltración de células inflamatorias.'],
            ['codigo' => 'BPA.5', 'descripcion' => 'Presencia de necrosis focal.'],
            ['codigo' => 'BPA.6', 'descripcion' => 'Presencia de fibrosis intersticial.'],
            ['codigo' => 'BPA.7', 'descripcion' => 'Presencia de células neoplásicas.'],
            ['codigo' => 'BPA.8', 'descripcion' => 'Presencia de cuerpos de inclusión eosinofílicos.'],
            ['codigo' => 'BPA.9', 'descripcion' => 'Presencia de calcificación distrófica.'],
            ['codigo' => 'BPA.10', 'descripcion' => 'Presencia de células adiposas en el estroma.'],

            // Piel
            ['codigo' => 'BPI.1', 'descripcion' => 'Predominio de células epiteliales escamosas superficiales.'],
            ['codigo' => 'BPI.2', 'descripcion' => 'Predominio de células epiteliales escamosas intermedias.'],
            ['codigo' => 'BPI.3', 'descripcion' => 'Predominio de células epiteliales escamosas parabasales.'],
            ['codigo' => 'BPI.4', 'descripcion' => 'Poli nucleares neutrófilos.'],
            ['codigo' => 'BPI.8', 'descripcion' => 'Células metaplásicas inmaduras.'],
            ['codigo' => 'BPI.9', 'descripcion' => 'Células reactivas.'],
            ['codigo' => 'BPI.11', 'descripcion' => 'Alteraciones celulares sugerentes de HPV.'],
            ['codigo' => 'BPI.12', 'descripcion' => 'Alteraciones celulares sugerentes de Herpes.'],
            ['codigo' => 'BPI.13', 'descripcion' => 'Células neoplásicas.'],
            ['codigo' => 'BPI.14', 'descripcion' => 'Células superficiales e intermedias con cambios atípicos.'],
            ['codigo' => 'BPI.15', 'descripcion' => 'Células intermedias y parabasales con algunos cambios atípicos.'],
            ['codigo' => 'BPI.16', 'descripcion' => 'Células parabasales con algunos cambios atípicos.'],
            ['codigo' => 'BPI.17', 'descripcion' => 'Células escamosas de significado incierto.'],
            ['codigo' => 'BPI.18', 'descripcion' => 'Células epiteliales glandulares de significado incierto.'],


            // Estudio Citológico Cérvico-Vaginal
            ['codigo' => 'C.1', 'descripcion' => 'Predominio de células epiteliales escamosas superficiales.'],
            ['codigo' => 'C.2', 'descripcion' => 'Predominio de células epiteliales escamosas intermedias.'],
            ['codigo' => 'C.3', 'descripcion' => 'Predominio de células epiteliales escamosas parabasales.'],
            ['codigo' => 'C.4', 'descripcion' => 'Polinucleares neutrófilos.'],
            ['codigo' => 'C.5', 'descripcion' => 'Hematíes.'],
            ['codigo' => 'C.6', 'descripcion' => 'Células endocervicales en exocervix.'],
            ['codigo' => 'C.7', 'descripcion' => 'Células metaplásicas en exocérvix.'],
            ['codigo' => 'C.8', 'descripcion' => 'Células metaplásicas inmaduras.'],
            ['codigo' => 'C.9', 'descripcion' => 'Células reactivas.'],
            ['codigo' => 'C.10', 'descripcion' => 'Células endometriales en mujer ≥ de 40 años.'],
            ['codigo' => 'C.11', 'descripcion' => 'Alteraciones celulares sugerentes con HPV.'],
            ['codigo' => 'C.12', 'descripcion' => 'Alteraciones celulares sugerentes de Herpes.'],
            ['codigo' => 'C.13', 'descripcion' => 'Células neoplásicas.'],
            ['codigo' => 'C.14', 'descripcion' => 'Células superficiales e intermedias con cambios atípicos.'],
            ['codigo' => 'C.15', 'descripcion' => 'Células intermedias y parabasales con algunos cambios atípicos.'],
            ['codigo' => 'C.16', 'descripcion' => 'Células parabasales con algunos cambios atípicos.'],
            ['codigo' => 'C.17', 'descripcion' => 'Células escamosas de significado incierto.'],
            ['codigo' => 'C.18', 'descripcion' => 'Células epiteliales glandulares de significado incierto.'],
            ['codigo' => 'C.19', 'descripcion' => 'Estructuras micóticas correspondientes a Candida albicans.'],
            ['codigo' => 'C.20', 'descripcion' => 'Estructuras micóticas correspondientes a Candida glabrata.'],
            ['codigo' => 'C.21', 'descripcion' => 'Estructuras bacterianas con disposición característica de actinomyces.'],
            ['codigo' => 'C.22', 'descripcion' => 'Estructuras bacterianas correspondiente de Gardnerella vaginalis.'],
            ['codigo' => 'C.23', 'descripcion' => 'Estructuras bacterianas de naturaleza cocácea.'],
            ['codigo' => 'C.24', 'descripcion' => 'Estructuras bacterianas sugerentes de Leptothrix.'],
            ['codigo' => 'C.25', 'descripcion' => 'Estructuras correspondientes a Trichomonas vaginalis.'],
            ['codigo' => 'C.26', 'descripcion' => 'Células histiocitarias multinucleadas.'],
            ['codigo' => 'C.27', 'descripcion' => 'Células epiteliales de tipo escamoso con intensos cambios atípicos.'],
            ['codigo' => 'C.28', 'descripcion' => 'Presencia de epitelio endometrial sin cambios atípicos.'],
            ['codigo' => 'C.29', 'descripcion' => 'Células epiteliales de apariencia glandular con núcleos amplios e irregulares.'],


                        // Estudio Hematológico Completo
            ['codigo' => 'H.1', 'descripcion' => 'Predominio de eritrocitos normocíticos normocrómicos.'],
            ['codigo' => 'H.2', 'descripcion' => 'Predominio de eritrocitos microcíticos hipocrómicos.'],
            ['codigo' => 'H.3', 'descripcion' => 'Presencia de esferocitos.'],
            ['codigo' => 'H.4', 'descripcion' => 'Presencia de dianocitos (células en forma de lágrima).'],
            ['codigo' => 'H.5', 'descripcion' => 'Leucocitos con predominio de neutrófilos.'],
            ['codigo' => 'H.6', 'descripcion' => 'Leucocitos con predominio de linfocitos.'],
            ['codigo' => 'H.7', 'descripcion' => 'Presencia de células blásticas.'],
            ['codigo' => 'H.8', 'descripcion' => 'Presencia de eosinófilos aumentados.'],
            ['codigo' => 'H.9', 'descripcion' => 'Presencia de basófilos aumentados.'],
            ['codigo' => 'H.10', 'descripcion' => 'Trombocitosis (aumento de plaquetas).'],
            ['codigo' => 'H.11', 'descripcion' => 'Trombocitopenia (disminución de plaquetas).'],
            ['codigo' => 'H.12', 'descripcion' => 'Anomalías en la morfología plaquetaria.'],
            ['codigo' => 'H.13', 'descripcion' => 'Presencia de células atípicas sugestivas de neoplasia.'],
            ['codigo' => 'H.14', 'descripcion' => 'Presencia de células inmaduras del linaje mieloide.'],
            ['codigo' => 'H.15', 'descripcion' => 'Presencia de células inmaduras del linaje linfático.'],
            ['codigo' => 'H.16', 'descripcion' => 'Anisocitosis (variabilidad en el tamaño de los eritrocitos).'],
            ['codigo' => 'H.17', 'descripcion' => 'Poiquilocitosis (variabilidad en la forma de los eritrocitos).'],
            ['codigo' => 'H.18', 'descripcion' => 'Presencia de cuerpos de Howell-Jolly.'],
            ['codigo' => 'H.19', 'descripcion' => 'Células con inclusiones de hierro (cuerpos de Pappenheimer).'],
            ['codigo' => 'H.20', 'descripcion' => 'Presencia de parásitos intraeritrocitarios.'],

            // Estudio Microscópico y Químico de Orina
            ['codigo' => 'U.1', 'descripcion' => 'pH normal.'],
            ['codigo' => 'U.2', 'descripcion' => 'pH elevado.'],
            ['codigo' => 'U.3', 'descripcion' => 'pH reducido.'],
            ['codigo' => 'U.4', 'descripcion' => 'Presencia de proteínas.'],
            ['codigo' => 'U.5', 'descripcion' => 'Negativo para proteínas.'],
            ['codigo' => 'U.6', 'descripcion' => 'Glucosa presente.'],
            ['codigo' => 'U.7', 'descripcion' => 'Negativo para la glucosa.'],
            ['codigo' => 'U.8', 'descripcion' => 'Cetonas detectadas.'],
            ['codigo' => 'U.9', 'descripcion' => 'Negativo para cetonas.'],
            ['codigo' => 'U.10', 'descripcion' => 'Hemoglobina presente.'],
            ['codigo' => 'U.11', 'descripcion' => 'Negativo para hemoglobina.'],
            ['codigo' => 'U.12', 'descripcion' => 'Bilirrubina detectada.'],
            ['codigo' => 'U.13', 'descripcion' => 'Negativo para bilirrubina.'],
            ['codigo' => 'U.14', 'descripcion' => 'Urobilinógeno normal.'],
            ['codigo' => 'U.15', 'descripcion' => 'Urobilinógeno elevado.'],
            ['codigo' => 'U.16', 'descripcion' => 'Presencia de nitritos.'],
            ['codigo' => 'U.17', 'descripcion' => 'Negativo para nitritos.'],
            ['codigo' => 'U.18', 'descripcion' => 'Presencia de leucocitos.'],
            ['codigo' => 'U.19', 'descripcion' => 'Ausencia de leucocitos.'],
            ['codigo' => 'U.20', 'descripcion' => 'Presencia de eritrocitos.'],
            ['codigo' => 'U.21', 'descripcion' => 'Ausencia de eritrocitos.'],
            ['codigo' => 'U.22', 'descripcion' => 'Células epiteliales.'],
            ['codigo' => 'U.23', 'descripcion' => 'Cilindros hialinos.'],
            ['codigo' => 'U.24', 'descripcion' => 'Cilindros granulosos.'],
            ['codigo' => 'U.25', 'descripcion' => 'Cristales (oxalato de calcio, ácido úrico, etc.).'],
            ['codigo' => 'U.26', 'descripcion' => 'Bacterias.'],
            ['codigo' => 'U.27', 'descripcion' => 'Levaduras.'],
            ['codigo' => 'U.28', 'descripcion' => 'Parásitos.'],


                        // Estudio Citológico de Esputo
            ['codigo' => 'E.1', 'descripcion' => 'Presencia de células epiteliales escamosas.'],
            ['codigo' => 'E.2', 'descripcion' => 'Presencia de células epiteliales columnares.'],
            ['codigo' => 'E.3', 'descripcion' => 'Presencia de células inflamatorias (neutrófilos, linfocitos, eosinófilos, macrófagos).'],
            ['codigo' => 'E.4', 'descripcion' => 'Presencia de células metaplásicas.'],
            ['codigo' => 'E.5', 'descripcion' => 'Presencia de células malignas.'],
            ['codigo' => 'E.6', 'descripcion' => 'Presencia de células atípicas sugestivas de neoplasia.'],
            ['codigo' => 'E.7', 'descripcion' => 'Presencia de microorganismos (bacterias, hongos, micobacterias).'],
            ['codigo' => 'E.8', 'descripcion' => 'Presencia de células sanguíneas (eritrocitos, plaquetas).'],
            ['codigo' => 'E.9', 'descripcion' => 'Presencia de material mucoso o mucopurulento.'],
            ['codigo' => 'E.10', 'descripcion' => 'Presencia de cristales (de colesterol, calcio, etc.).'],
            ['codigo' => 'E.11', 'descripcion' => 'Ausencia de células significativas para el análisis.'],

            // Estudio Citológico Bucal
            ['codigo' => 'B.1', 'descripcion' => 'Presencia de células epiteliales escamosas.'],
            ['codigo' => 'B.2', 'descripcion' => 'Presencia de células epiteliales cilíndricas.'],
            ['codigo' => 'B.3', 'descripcion' => 'Presencia de células inflamatorias (neutrófilos, linfocitos, macrófagos).'],
            ['codigo' => 'B.4', 'descripcion' => 'Presencia de células glandulares.'],
            ['codigo' => 'B.5', 'descripcion' => 'Presencia de células metaplásicas.'],
            ['codigo' => 'B.6', 'descripcion' => 'Presencia de células atípicas sugestivas de neoplasia.'],
            ['codigo' => 'B.7', 'descripcion' => 'Presencia de microorganismos (bacterias, hongos, levaduras).'],
            ['codigo' => 'B.8', 'descripcion' => 'Presencia de células anormales con cambios citológicos.'],
            ['codigo' => 'B.9', 'descripcion' => 'Ausencia de células significativas para el análisis.'],

        ];

        DB::table('interpretacion')->insert($interpretacion);
    }
}
