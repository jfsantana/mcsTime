<?php

require_once '../../../vendor/autoload.php';
// require_once '../clases/consumoApi.class.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();

$html = file_get_contents('http://localhost/siaho/funciones/wsdl/mailPdf/inspecciones/PdfinspeccionesambientalesDetalle.php?activo=inspeccionesambientalesDetalle&bandera=2&tipo_incidencia=1&codigo_incidencia=197');
$dompdf->loadHtml($html);

$dompdf->render();

$dompdf->stream('test.pdf');
