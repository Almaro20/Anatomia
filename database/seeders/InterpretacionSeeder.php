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
            ['codigo' => '1.1', 'descripcion' => 'Se observa una arquitectura cardíaca conservada, con una adecuada distribución de miocitos y estructuras vasculares.'],
            ['codigo' => '1.2', 'descripcion' => 'No se observan signos evidentes de necrosis en el tejido cardíaco, lo que sugiere una integridad estructural relativamente normal.'],
            ['codigo' => '1.3', 'descripcion' => 'Identificación de células inflamatorias dispersas en el tejido, indicativas de una respuesta inflamatoria leve o moderada.'],
            ['codigo' => '1.4', 'descripcion' => 'Presencia de áreas de fibrosis en el miocardio, posiblemente como resultado de un proceso de cicatrización tras una lesión cardíaca previa.'],
            ['codigo' => '1.5', 'descripcion' => 'Se detecta una adecuada perfusión sanguínea en los vasos coronarios, indicativa de una circulación coronaria funcional.'],
            ['codigo' => '1.6', 'descripcion' => 'Observación de células cardíacas con una apariencia histológica normal, incluyendo la presencia de discos intercalares y estriaciones transversales.'],
            ['codigo' => '1.7', 'descripcion' => 'No se observan células tumorales ni signos de infiltración neoplásica en el tejido cardíaco.'],
            ['codigo' => '1.8', 'descripcion' => 'Identificación de células endoteliales íntegras en los vasos sanguíneos, sugiriendo una función endotelial adecuada.'],
            ['codigo' => '1.9', 'descripcion' => 'Se observa una distribución regular de fibras de colágeno en el miocardio, indicativo de una matriz extracelular bien organizada.'],
            ['codigo' => '1.10', 'descripcion' => 'No se identifican anomalías estructurales significativas en las válvulas cardíacas ni en las cámaras cardíacas.'],

            // Hígado
            ['codigo' => '2.1', 'descripcion' => 'Se observa una arquitectura hepática conservada, con cordones de hepatocitos bien definidos y distribución lobulillar normal.'],
            ['codigo' => '2.2', 'descripcion' => 'Hay presencia de infiltración celular en los sinusoides hepáticos, sugiriendo una respuesta inflamatoria o un proceso infiltrativo.'],
            ['codigo' => '2.3', 'descripcion' => 'Se identifica una acumulación de lípidos en los hepatocitos, indicativo de esteatosis hepática.'],
            ['codigo' => '2.4', 'descripcion' => 'Se observan signos de necrosis focal en el tejido, posiblemente debido a isquemia o daño tóxico.'],
            ['codigo' => '2.5', 'descripcion' => 'Existe una marcada fibrosis periportal, sugiriendo un proceso crónico de inflamación hepática.'],
            ['codigo' => '2.6', 'descripcion' => 'Se observan nódulos de regeneración, indicativos de un proceso de reparación hepática.'],
            ['codigo' => '2.7', 'descripcion' => 'Presencia de células de Kupffer activadas, sugiriendo una respuesta inmunitaria o inflamatoria.'],
            ['codigo' => '2.8', 'descripcion' => 'Se detectan células endoteliales anormales en los vasos sanguíneos hepáticos, lo que podría indicar un proceso neoplásico.'],
            ['codigo' => '2.9', 'descripcion' => 'Se observa una marcada congestión sinusoidal, posiblemente debido a una obstrucción del flujo sanguíneo hepático.'],
            ['codigo' => '2.10', 'descripcion' => 'Hay signos de colestasis intrahepática, indicando una obstrucción en el flujo de la bilis dentro del hígado.'],

            // Estómago
            ['codigo' => '3.1', 'descripcion' => 'Se observa un epitelio gástrico intacto y bien conservado.'],
            ['codigo' => '3.2', 'descripcion' => 'Presencia de infiltración de células inflamatorias en la lámina propia, sugiriendo una respuesta inflamatoria crónica.'],
            ['codigo' => '3.3', 'descripcion' => 'Identificación de células caliciformes productoras de moco en las glándulas gástricas.'],
            ['codigo' => '3.4', 'descripcion' => 'Signos de erosión superficial de la mucosa gástrica, posiblemente debido a irritación crónica.'],
            ['codigo' => '3.5', 'descripcion' => 'Presencia de gastritis aguda, evidenciada por la infiltración de neutrófilos en la mucosa gástrica.'],
            ['codigo' => '3.6', 'descripcion' => 'Observación de cambios displásicos en el epitelio gástrico, sugiriendo un proceso preneoplásico.'],
            ['codigo' => '3.7', 'descripcion' => 'Detección de Helicobacter pylori en la mucosa gástrica, indicando una infección bacteriana.'],
            ['codigo' => '3.8', 'descripcion' => 'Presencia de metaplasia intestinal en la mucosa gástrica, sugiriendo una adaptación al ambiente ácido del estómago.'],
            ['codigo' => '3.9', 'descripcion' => 'Identificación de células neuroendocrinas en las glándulas gástricas, indicando una función endocrina.'],
            ['codigo' => '3.10', 'descripcion' => 'Signos de ulceración profunda en la mucosa gástrica, posiblemente relacionada con un proceso ulceroso crónico.'],

                        // Riñón
            ['codigo' => '4.1', 'descripcion' => 'Se observa una arquitectura renal conservada, con una adecuada distribución de los diferentes componentes histológicos.'],
            ['codigo' => '4.2', 'descripcion' => 'Presencia de infiltración de tejido adiposo perirrenal.'],
            ['codigo' => '4.3', 'descripcion' => 'Identificación de glóbulos rojos en los túbulos renales, indicativo de hematuria y posible lesión glomerular.'],
            ['codigo' => '4.4', 'descripcion' => 'Signos de esclerosis glomerular, evidenciada por la presencia de matriz extracelular aumentada y segmentos glomerulares colapsados.'],
            ['codigo' => '4.5', 'descripcion' => 'Presencia de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.'],
            ['codigo' => '4.6', 'descripcion' => 'Observación de necrosis tubular aguda, caracterizada por la pérdida de la arquitectura tubular y la presencia de células necróticas en el lumen tubular.'],
            ['codigo' => '4.7', 'descripcion' => 'Detección de cilindros hialinos en los túbulos renales, indicando una posible proteinuria.'],
            ['codigo' => '4.8', 'descripcion' => 'Presencia de células inflamatorias en el intersticio renal, sugiriendo una respuesta inflamatoria crónica.'],
            ['codigo' => '4.9', 'descripcion' => 'Identificación de cuerpos ovales grasos en los túbulos renales, indicativos de daño renal crónico y degeneración lipídica.'],
            ['codigo' => '4.10', 'descripcion' => 'Signos de fibrosis intersticial, evidenciada por la presencia de tejido conectivo fibroso entre los túbulos renales y los glomérulos.'],

                        // Útero
            ['codigo' => '5.1', 'descripcion' => 'Se observa un endometrio bien conservado, con una adecuada proliferación glandular y estroma endometrial.'],
            ['codigo' => '5.2', 'descripcion' => 'Presencia de sangre en el espécimen, indicando la fase menstrual del ciclo uterino.'],
            ['codigo' => '5.3', 'descripcion' => 'Identificación de escaso tejido endometrial en el corte, sugiriendo una posible atrofia endometrial.'],
            ['codigo' => '5.4', 'descripcion' => 'Signos de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.'],
            ['codigo' => '5.5', 'descripcion' => 'Observación de células descamadas en el endometrio, indicativas de la fase de descamación menstrual.'],
            ['codigo' => '5.6', 'descripcion' => 'Detección de hiperplasia glandular endometrial, sugiriendo un desequilibrio hormonal.'],
            ['codigo' => '5.7', 'descripcion' => 'Presencia de infiltración de células inflamatorias en el estroma endometrial, indicando una respuesta inflamatoria crónica.'],
            ['codigo' => '5.8', 'descripcion' => 'Identificación de cuerpos de Arias-Stella en las células glandulares, sugiriendo cambios hormonales asociados con el embarazo o condiciones patológicas.'],
            ['codigo' => '5.9', 'descripcion' => 'Signos de adenomiosis, evidenciada por la presencia de glándulas endometriales dentro del miometrio.'],
            ['codigo' => '5.10', 'descripcion' => 'Presencia de células atípicas en las glándulas endometriales, sugiriendo una posible neoplasia endometrial.'],

                // Intestino
            ['codigo' => '6.1', 'descripcion' => 'Se observa una mucosa intestinal con vellosidades bien conservadas y un epitelio columnar intacto.'],
            ['codigo' => '6.2', 'descripcion' => 'Presencia de contenido fecal en el lumen intestinal, indicando la fase digestiva del proceso.'],
            ['codigo' => '6.3', 'descripcion' => 'Identificación de escaso tejido mucoso en el corte, sugiriendo una posible atrofia de las glándulas mucosas.'],
            ['codigo' => '6.4', 'descripcion' => 'Signos de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.'],
            ['codigo' => '6.5', 'descripcion' => 'Observación de tejido adiposo perivisceral, indicativo de la ubicación anatómica de la muestra.'],
            ['codigo' => '6.6', 'descripcion' => 'Detección de células caliciformes en las criptas intestinales, indicativas de producción de moco.'],
            ['codigo' => '6.7', 'descripcion' => 'Presencia de infiltración de células inflamatorias en la lámina propia, sugiriendo una respuesta inflamatoria crónica.'],
            ['codigo' => '6.8', 'descripcion' => 'Identificación de placas de Peyer en la mucosa intestinal, indicativas de tejido linfoide asociado al intestino.'],
            ['codigo' => '6.9', 'descripcion' => 'Signos de metaplasia intestinal, evidenciada por la presencia de células caliciformes en áreas no habituales.'],
            ['codigo' => '6.10', 'descripcion' => 'Presencia de signos de regeneración epitelial, indicativos de un proceso de reparación tras una lesión o inflamación.'],

                // Esófago
            ['codigo' => '7.1', 'descripcion' => 'Se observa un epitelio escamoso estratificado bien conservado en la mucosa esofágica.'],
            ['codigo' => '7.2', 'descripcion' => 'Presencia de contenido alimenticio en la luz esofágica, indicando la fase de tránsito del proceso digestivo.'],
            ['codigo' => '7.3', 'descripcion' => 'Identificación de escaso tejido epitelial en el corte, sugiriendo posible atrofia o adelgazamiento del epitelio.'],
            ['codigo' => '7.4', 'descripcion' => 'Signos de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.'],
            ['codigo' => '7.5', 'descripcion' => 'Observación de tejido conectivo periesofágico, indicativo de la ubicación anatómica de la muestra.'],
            ['codigo' => '7.6', 'descripcion' => 'Detección de células caliciformes dispersas en la mucosa esofágica, sugiriendo producción de moco.'],
            ['codigo' => '7.7', 'descripcion' => 'Presencia de infiltración de células inflamatorias en la lámina propia, indicando una respuesta inflamatoria.'],
            ['codigo' => '7.8', 'descripcion' => 'Identificación de vasos sanguíneos y nervios en la submucosa esofágica, componentes normales del tejido.'],
            ['codigo' => '7.9', 'descripcion' => 'Signos de hiperplasia epitelial, evidenciada por un aumento en el número de capas celulares.'],
            ['codigo' => '7.10', 'descripcion' => 'Presencia de células de Langerhans en la mucosa esofágica, indicativas de una función inmunológica local.'],

            // Testículos
            ['codigo' => '8.1', 'descripcion' => 'Se observa una arquitectura testicular conservada, con la presencia de túbulos seminíferos bien definidos.'],
            ['codigo' => '8.2', 'descripcion' => 'Presencia de células germinales escasas en los túbulos seminíferos, lo que puede indicar una disminución en la espermatogénesis.'],
            ['codigo' => '8.3', 'descripcion' => 'Identificación de tejido fibroso intersticial entre los túbulos seminíferos, sugiriendo una posible fibrosis testicular.'],
            ['codigo' => '8.4', 'descripcion' => 'Signos de artefactos de fijación en el tejido, lo que puede afectar la visualización precisa de algunas estructuras.'],
            ['codigo' => '8.5', 'descripcion' => 'Observación de deshidratación del tejido, lo que puede causar contracción y distorsión de las células y estructuras.'],
            ['codigo' => '8.6', 'descripcion' => 'Detección de células de Sertoli en los túbulos seminíferos, indicativas de su función de soporte para las células germinales.'],
            ['codigo' => '8.7', 'descripcion' => 'Presencia de células de Leydig en el tejido intersticial, responsables de la producción de testosterona.'],
            ['codigo' => '8.8', 'descripcion' => 'Identificación de células inmaduras o anormales en los túbulos seminíferos, sugiriendo un posible trastorno en la espermatogénesis.'],
            ['codigo' => '8.9', 'descripcion' => 'Signos de inflamación testicular, evidenciados por la presencia de células inflamatorias en el tejido.'],
            ['codigo' => '8.10', 'descripcion' => 'Presencia de células apoptóticas en los túbulos seminíferos, indicando un proceso de muerte celular programada, posiblemente relacionado con el daño testicular.'],

            // Pulmón
            ['codigo' => '9.1', 'descripcion' => 'Se observa una arquitectura pulmonar conservada, con la presencia de alvéolos bien definidos y paredes alveolares íntegras.'],
            ['codigo' => '9.2', 'descripcion' => 'Presencia de tejido necrótico en el corte, sugiriendo un proceso de necrosis tisular, posiblemente debido a una lesión o enfermedad.'],
            ['codigo' => '9.3', 'descripcion' => 'Identificación de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.'],
            ['codigo' => '9.4', 'descripcion' => 'Signos de inflamación pulmonar, indicados por la presencia de células inflamatorias abundantes en el tejido.'],
            ['codigo' => '9.5', 'descripcion' => 'Observación de deshidratación del tejido, lo que puede causar contracción y distorsión de las células y estructuras.'],
            ['codigo' => '9.6', 'descripcion' => 'Detección de tejido fibroso en los espacios alveolares, sugiriendo fibrosis pulmonar.'],
            ['codigo' => '9.7', 'descripcion' => 'Presencia de células de metaplasia escamosa en las vías respiratorias, indicativas de una respuesta adaptativa al daño crónico.'],
            ['codigo' => '9.8', 'descripcion' => 'Identificación de células neoplásicas en el tejido, sugiriendo un proceso tumoral pulmonar.'],
            ['codigo' => '9.9', 'descripcion' => 'Signos de edema pulmonar, evidenciados por la presencia de líquido en los espacios alveolares.'],
            ['codigo' => '9.10', 'descripcion' => 'Presencia de cuerpos extraños en el tejido, indicando inhalación de material extraño.'],

            // Bazo
            ['codigo' => '10.1', 'descripcion' => 'Se observa una arquitectura esplénica conservada, con una adecuada distribución de la pulpa blanca y roja.'],
            ['codigo' => '10.2', 'descripcion' => 'Presencia de áreas de tejido hemorrágico en el corte, indicativo de hemorragia intraparenquimatosa reciente o traumática.'],
            ['codigo' => '10.3', 'descripcion' => 'Identificación de escaso tejido linfoide en la muestra, sugiriendo una posible atrofia o disminución de la actividad inmunológica.'],
            ['codigo' => '10.4', 'descripcion' => 'Signos de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.'],
            ['codigo' => '10.5', 'descripcion' => 'Observación de deshidratación del tejido, lo que puede causar contracción y distorsión de las células y estructuras.'],
            ['codigo' => '10.6', 'descripcion' => 'Se detecta un aumento en el tamaño de los folículos linfoides, indicativo de una respuesta inmunológica activa.'],
            ['codigo' => '10.7', 'descripcion' => 'Presencia de células plasmáticas en la pulpa blanca, sugiriendo una respuesta inmunitaria o inflamatoria.'],
            ['codigo' => '10.8', 'descripcion' => 'Identificación de células de la serie eritroide en la pulpa roja, indicando actividad hematopoyética.'],


                        // Feto
            ['codigo' => '11.1', 'descripcion' => 'Presencia de tejido fetal bien desarrollado.'],
            ['codigo' => '11.2', 'descripcion' => 'Presencia de órganos internos correctamente formados.'],
            ['codigo' => '11.3', 'descripcion' => 'Presencia de tejido nervioso en desarrollo.'],
            ['codigo' => '11.4', 'descripcion' => 'Presencia de células sanguíneas en formación.'],
            ['codigo' => '11.5', 'descripcion' => 'Presencia de huesos en proceso de osificación.'],
            ['codigo' => '11.6', 'descripcion' => 'Presencia de tejido muscular en desarrollo.'],
            ['codigo' => '11.7', 'descripcion' => 'Presencia de membranas fetales intactas.'],
            ['codigo' => '11.8', 'descripcion' => 'Presencia de cordón umbilical sin anomalías evidentes.'],
            ['codigo' => '11.9', 'descripcion' => 'Presencia de estructuras faciales reconocibles.'],
            ['codigo' => '11.10', 'descripcion' => 'Presencia de extremidades bien formadas.'],

            // Cerebro
            ['codigo' => '12.1', 'descripcion' => 'Presencia de neuronas.'],
            ['codigo' => '12.2', 'descripcion' => 'Presencia de células gliales.'],
            ['codigo' => '12.3', 'descripcion' => 'Presencia de fibras nerviosas mielinizadas.'],
            ['codigo' => '12.4', 'descripcion' => 'Presencia de fibras nerviosas no mielinizadas.'],
            ['codigo' => '12.5', 'descripcion' => 'Presencia de vasos sanguíneos.'],
            ['codigo' => '12.6', 'descripcion' => 'Presencia de células inflamatorias.'],
            ['codigo' => '12.7', 'descripcion' => 'Presencia de infiltración de células neoplásicas.'],
            ['codigo' => '12.8', 'descripcion' => 'Presencia de cuerpos de inclusión intracelulares.'],
            ['codigo' => '12.9', 'descripcion' => 'Presencia de placas de proteína beta-amiloide.'],
            ['codigo' => '12.10', 'descripcion' => 'Presencia de cuerpos de Lewy.'],

            // Lengua
            ['codigo' => '13.1', 'descripcion' => 'Presencia de epitelio escamoso estratificado.'],
            ['codigo' => '13.2', 'descripcion' => 'Presencia de papilas gustativas filiformes.'],
            ['codigo' => '13.3', 'descripcion' => 'Presencia de papilas gustativas fungiformes.'],
            ['codigo' => '13.4', 'descripcion' => 'Presencia de papilas gustativas foliadas.'],
            ['codigo' => '13.5', 'descripcion' => 'Presencia de células caliciformes.'],
            ['codigo' => '13.6', 'descripcion' => 'Presencia de células basales.'],
            ['codigo' => '13.7', 'descripcion' => 'Presencia de células parabasales.'],
            ['codigo' => '13.8', 'descripcion' => 'Presencia de células intermedias.'],
            ['codigo' => '13.9', 'descripcion' => 'Presencia de células superficiales.'],
            ['codigo' => '13.10', 'descripcion' => 'Presencia de células inflamatorias.'],
            ['codigo' => '13.11', 'descripcion' => 'Presencia de células de Langerhans.'],
            ['codigo' => '13.12', 'descripcion' => 'Presencia de células glandulares.'],
            ['codigo' => '13.13', 'descripcion' => 'Presencia de células neoplásicas.'],
            ['codigo' => '13.14', 'descripcion' => 'Presencia de células con cambios atípicos.'],
            ['codigo' => '13.15', 'descripcion' => 'Presencia de cuerpos extraños.'],

            // Ovario
            ['codigo' => '14.1', 'descripcion' => 'Presencia de folículos primordiales.'],
            ['codigo' => '14.2', 'descripcion' => 'Presencia de folículos primarios.'],
            ['codigo' => '14.3', 'descripcion' => 'Presencia de folículos secundarios.'],
            ['codigo' => '14.4', 'descripcion' => 'Presencia de folículos maduros.'],
            ['codigo' => '14.5', 'descripcion' => 'Presencia de células de la granulosa.'],
            ['codigo' => '14.6', 'descripcion' => 'Presencia de células de la teca.'],
            ['codigo' => '14.7', 'descripcion' => 'Presencia de células lúteas.'],
            ['codigo' => '14.8', 'descripcion' => 'Presencia de cuerpos albicans.'],
            ['codigo' => '14.9', 'descripcion' => 'Presencia de células intersticiales.'],
            ['codigo' => '14.10', 'descripcion' => 'Presencia de células estromales.'],

             // Trompas de Falopio
            ['codigo' => '15.1', 'descripcion' => 'Presencia de epitelio cilíndrico.'],
            ['codigo' => '15.2', 'descripcion' => 'Presencia de células ciliadas.'],
            ['codigo' => '15.3', 'descripcion' => 'Presencia de células secretoras.'],
            ['codigo' => '15.4', 'descripcion' => 'Presencia de células endometriales ectópicas.'],
            ['codigo' => '15.5', 'descripcion' => 'Presencia de células inflamatorias.'],
            ['codigo' => '15.6', 'descripcion' => 'Presencia de células escamosas metaplásicas.'],
            ['codigo' => '15.7', 'descripcion' => 'Presencia de células glandulares atípicas.'],
            ['codigo' => '15.8', 'descripcion' => 'Presencia de células endometriales.'],
            ['codigo' => '15.9', 'descripcion' => 'Presencia de células estromales.'],
            ['codigo' => '15.10', 'descripcion' => 'Presencia de cuerpos extraños.'],

            // Páncreas
            ['codigo' => '16.1', 'descripcion' => 'Presencia de células acinares.'],
            ['codigo' => '16.2', 'descripcion' => 'Presencia de islotes de Langerhans.'],
            ['codigo' => '16.3', 'descripcion' => 'Presencia de células ductales.'],
            ['codigo' => '16.4', 'descripcion' => 'Presencia de infiltración de células inflamatorias.'],
            ['codigo' => '16.5', 'descripcion' => 'Presencia de necrosis focal.'],
            ['codigo' => '16.6', 'descripcion' => 'Presencia de fibrosis intersticial.'],
            ['codigo' => '16.7', 'descripcion' => 'Presencia de células neoplásicas.'],
            ['codigo' => '16.8', 'descripcion' => 'Presencia de cuerpos de inclusión eosinofílicos.'],
            ['codigo' => '16.9', 'descripcion' => 'Presencia de calcificación distrófica.'],
            ['codigo' => '16.10', 'descripcion' => 'Presencia de células adiposas en el estroma.'],

            // Piel
            ['codigo' => '17.1', 'descripcion' => 'Predominio de células epiteliales escamosas superficiales.'],
            ['codigo' => '17.2', 'descripcion' => 'Predominio de células epiteliales escamosas intermedias.'],
            ['codigo' => '17.3', 'descripcion' => 'Predominio de células epiteliales escamosas parabasales.'],
            ['codigo' => '17.4', 'descripcion' => 'Poli nucleares neutrófilos.'],
            ['codigo' => '17.8', 'descripcion' => 'Células metaplásicas inmaduras.'],
            ['codigo' => '17.9', 'descripcion' => 'Células reactivas.'],
            ['codigo' => '17.11', 'descripcion' => 'Alteraciones celulares sugerentes de HPV.'],
            ['codigo' => '17.12', 'descripcion' => 'Alteraciones celulares sugerentes de Herpes.'],
            ['codigo' => '17.13', 'descripcion' => 'Células neoplásicas.'],
            ['codigo' => '17.14', 'descripcion' => 'Células superficiales e intermedias con cambios atípicos.'],
            ['codigo' => '17.15', 'descripcion' => 'Células intermedias y parabasales con algunos cambios atípicos.'],
            ['codigo' => '17.16', 'descripcion' => 'Células parabasales con algunos cambios atípicos.'],
            ['codigo' => '17.17', 'descripcion' => 'Células escamosas de significado incierto.'],
            ['codigo' => '17.18', 'descripcion' => 'Células epiteliales glandulares de significado incierto.'],


            // Estudio Citológico Cérvico-Vaginal
            ['codigo' => '100.1', 'descripcion' => 'Predominio de células epiteliales escamosas superficiales.'],
            ['codigo' => '100.2', 'descripcion' => 'Predominio de células epiteliales escamosas intermedias.'],
            ['codigo' => '100.3', 'descripcion' => 'Predominio de células epiteliales escamosas parabasales.'],
            ['codigo' => '100.4', 'descripcion' => 'Polinucleares neutrófilos.'],
            ['codigo' => '100.5', 'descripcion' => 'Hematíes.'],
            ['codigo' => '100.6', 'descripcion' => 'Células endocervicales en exocervix.'],
            ['codigo' => '100.7', 'descripcion' => 'Células metaplásicas en exocérvix.'],
            ['codigo' => '100.8', 'descripcion' => 'Células metaplásicas inmaduras.'],
            ['codigo' => '100.9', 'descripcion' => 'Células reactivas.'],
            ['codigo' => '100.10', 'descripcion' => 'Células endometriales en mujer ≥ de 40 años.'],
            ['codigo' => '100.11', 'descripcion' => 'Alteraciones celulares sugerentes con HPV.'],
            ['codigo' => '100.12', 'descripcion' => 'Alteraciones celulares sugerentes de Herpes.'],
            ['codigo' => '100.13', 'descripcion' => 'Células neoplásicas.'],
            ['codigo' => '100.14', 'descripcion' => 'Células superficiales e intermedias con cambios atípicos.'],
            ['codigo' => '100.15', 'descripcion' => 'Células intermedias y parabasales con algunos cambios atípicos.'],
            ['codigo' => '100.16', 'descripcion' => 'Células parabasales con algunos cambios atípicos.'],
            ['codigo' => '100.17', 'descripcion' => 'Células escamosas de significado incierto.'],
            ['codigo' => '100.18', 'descripcion' => 'Células epiteliales glandulares de significado incierto.'],
            ['codigo' => '100.19', 'descripcion' => 'Estructuras micóticas correspondientes a Candida albicans.'],
            ['codigo' => '100.20', 'descripcion' => 'Estructuras micóticas correspondientes a Candida glabrata.'],
            ['codigo' => '100.21', 'descripcion' => 'Estructuras bacterianas con disposición característica de actinomyces.'],
            ['codigo' => '100.22', 'descripcion' => 'Estructuras bacterianas correspondiente de Gardnerella vaginalis.'],
            ['codigo' => '100.23', 'descripcion' => 'Estructuras bacterianas de naturaleza cocácea.'],
            ['codigo' => '100.24', 'descripcion' => 'Estructuras bacterianas sugerentes de Leptothrix.'],
            ['codigo' => '100.25', 'descripcion' => 'Estructuras correspondientes a Trichomonas vaginalis.'],
            ['codigo' => '100.26', 'descripcion' => 'Células histiocitarias multinucleadas.'],
            ['codigo' => '100.27', 'descripcion' => 'Células epiteliales de tipo escamoso con intensos cambios atípicos.'],
            ['codigo' => '100.28', 'descripcion' => 'Presencia de epitelio endometrial sin cambios atípicos.'],
            ['codigo' => '100.29', 'descripcion' => 'Células epiteliales de apariencia glandular con núcleos amplios e irregulares.'],


                        // Estudio Hematológico Completo
            ['codigo' => '200.1', 'descripcion' => 'Predominio de eritrocitos normocíticos normocrómicos.'],
            ['codigo' => '200.2', 'descripcion' => 'Predominio de eritrocitos microcíticos hipocrómicos.'],
            ['codigo' => '200.3', 'descripcion' => 'Presencia de esferocitos.'],
            ['codigo' => '200.4', 'descripcion' => 'Presencia de dianocitos (células en forma de lágrima).'],
            ['codigo' => '200.5', 'descripcion' => 'Leucocitos con predominio de neutrófilos.'],
            ['codigo' => '200.6', 'descripcion' => 'Leucocitos con predominio de linfocitos.'],
            ['codigo' => '200.7', 'descripcion' => 'Presencia de células blásticas.'],
            ['codigo' => '200.8', 'descripcion' => 'Presencia de eosinófilos aumentados.'],
            ['codigo' => '200.9', 'descripcion' => 'Presencia de basófilos aumentados.'],
            ['codigo' => '200.10', 'descripcion' => 'Trombocitosis (aumento de plaquetas).'],
            ['codigo' => '200.11', 'descripcion' => 'Trombocitopenia (disminución de plaquetas).'],
            ['codigo' => '200.12', 'descripcion' => 'Anomalías en la morfología plaquetaria.'],
            ['codigo' => '200.13', 'descripcion' => 'Presencia de células atípicas sugestivas de neoplasia.'],
            ['codigo' => '200.14', 'descripcion' => 'Presencia de células inmaduras del linaje mieloide.'],
            ['codigo' => '200.15', 'descripcion' => 'Presencia de células inmaduras del linaje linfático.'],
            ['codigo' => '200.16', 'descripcion' => 'Anisocitosis (variabilidad en el tamaño de los eritrocitos).'],
            ['codigo' => '200.17', 'descripcion' => 'Poiquilocitosis (variabilidad en la forma de los eritrocitos).'],
            ['codigo' => '200.18', 'descripcion' => 'Presencia de cuerpos de Howell-Jolly.'],
            ['codigo' => '200.19', 'descripcion' => 'Células con inclusiones de hierro (cuerpos de Pappenheimer).'],
            ['codigo' => '200.20', 'descripcion' => 'Presencia de parásitos intraeritrocitarios.'],

            // Estudio Microscópico y Químico de Orina
            ['codigo' => '300.1', 'descripcion' => 'pH normal.'],
            ['codigo' => '300.2', 'descripcion' => 'pH elevado.'],
            ['codigo' => '300.3', 'descripcion' => 'pH reducido.'],
            ['codigo' => '300.4', 'descripcion' => 'Presencia de proteínas.'],
            ['codigo' => '300.5', 'descripcion' => 'Negativo para proteínas.'],
            ['codigo' => '300.6', 'descripcion' => 'Glucosa presente.'],
            ['codigo' => '300.7', 'descripcion' => 'Negativo para la glucosa.'],
            ['codigo' => '300.8', 'descripcion' => 'Cetonas detectadas.'],
            ['codigo' => '300.9', 'descripcion' => 'Negativo para cetonas.'],
            ['codigo' => '300.10', 'descripcion' => 'Hemoglobina presente.'],
            ['codigo' => '300.11', 'descripcion' => 'Negativo para hemoglobina.'],
            ['codigo' => '300.12', 'descripcion' => 'Bilirrubina detectada.'],
            ['codigo' => '300.13', 'descripcion' => 'Negativo para bilirrubina.'],
            ['codigo' => '300.14', 'descripcion' => 'Urobilinógeno normal.'],
            ['codigo' => '300.15', 'descripcion' => 'Urobilinógeno elevado.'],
            ['codigo' => '300.16', 'descripcion' => 'Presencia de nitritos.'],
            ['codigo' => '300.17', 'descripcion' => 'Negativo para nitritos.'],
            ['codigo' => '300.18', 'descripcion' => 'Presencia de leucocitos.'],
            ['codigo' => '300.19', 'descripcion' => 'Ausencia de leucocitos.'],
            ['codigo' => '300.20', 'descripcion' => 'Presencia de eritrocitos.'],
            ['codigo' => '300.21', 'descripcion' => 'Ausencia de eritrocitos.'],
            ['codigo' => '300.22', 'descripcion' => 'Células epiteliales.'],
            ['codigo' => '300.23', 'descripcion' => 'Cilindros hialinos.'],
            ['codigo' => '300.24', 'descripcion' => 'Cilindros granulosos.'],
            ['codigo' => '300.25', 'descripcion' => 'Cristales (oxalato de calcio, ácido úrico, etc.).'],
            ['codigo' => '300.26', 'descripcion' => 'Bacterias.'],
            ['codigo' => '300.27', 'descripcion' => 'Levaduras.'],
            ['codigo' => '300.28', 'descripcion' => 'Parásitos.'],


                        // Estudio Citológico de Esputo
            ['codigo' => '400.1', 'descripcion' => 'Presencia de células epiteliales escamosas.'],
            ['codigo' => '400.2', 'descripcion' => 'Presencia de células epiteliales columnares.'],
            ['codigo' => '400.3', 'descripcion' => 'Presencia de células inflamatorias (neutrófilos, linfocitos, eosinófilos, macrófagos).'],
            ['codigo' => '400.4', 'descripcion' => 'Presencia de células metaplásicas.'],
            ['codigo' => '400.5', 'descripcion' => 'Presencia de células malignas.'],
            ['codigo' => '400.6', 'descripcion' => 'Presencia de células atípicas sugestivas de neoplasia.'],
            ['codigo' => '400.7', 'descripcion' => 'Presencia de microorganismos (bacterias, hongos, micobacterias).'],
            ['codigo' => '400.8', 'descripcion' => 'Presencia de células sanguíneas (eritrocitos, plaquetas).'],
            ['codigo' => '400.9', 'descripcion' => 'Presencia de material mucoso o mucopurulento.'],
            ['codigo' => '400.10', 'descripcion' => 'Presencia de cristales (de colesterol, calcio, etc.).'],
            ['codigo' => '400.11', 'descripcion' => 'Ausencia de células significativas para el análisis.'],

            // Estudio Citológico Bucal
            ['codigo' => '500.1', 'descripcion' => 'Presencia de células epiteliales escamosas.'],
            ['codigo' => '500.2', 'descripcion' => 'Presencia de células epiteliales cilíndricas.'],
            ['codigo' => '500.3', 'descripcion' => 'Presencia de células inflamatorias (neutrófilos, linfocitos, macrófagos).'],
            ['codigo' => '500.4', 'descripcion' => 'Presencia de células glandulares.'],
            ['codigo' => '500.5', 'descripcion' => 'Presencia de células metaplásicas.'],
            ['codigo' => '500.6', 'descripcion' => 'Presencia de células atípicas sugestivas de neoplasia.'],
            ['codigo' => '500.7', 'descripcion' => 'Presencia de microorganismos (bacterias, hongos, levaduras).'],
            ['codigo' => '500.8', 'descripcion' => 'Presencia de células anormales con cambios citológicos.'],
            ['codigo' => '500.9', 'descripcion' => 'Ausencia de células significativas para el análisis.'],

        ];

        DB::table('interpretacion')->insert($interpretacion);
    }
}
