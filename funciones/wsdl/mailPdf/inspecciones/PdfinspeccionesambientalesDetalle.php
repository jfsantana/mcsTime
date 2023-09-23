<?php
$titulo = '';
if (!isset($_SESSION)) {
    session_start();
}

$tipo_incidencia = 1;

$fecha_actual = date('d/m/Y');
$hereg = date('h:i:A');
if (isset($_REQUEST['bandera'])) {
    $bandera = $_REQUEST['bandera'];  // Ver Registro
} else {
    $bandera = 1;  // Crear Registro
}

require '../../../../funciones/wsdl/clases/consumoApi.class.php';

$date = date('Y-m-d');
$headerId = $_GET['codigo_incidencia'];
$token = '99';
$URL = 'http://'.$_SERVER['HTTP_HOST']."/funciones/wsdl/inspecciones?detalleIncidenciaId=$headerId";

$rs = API::GET($URL, $token);
$arrayInspeccion = API::JSON_TO_ARRAY($rs);

// ESTILOS Y VARIALES DEL FORMULARIO   //
$color = 'color:#002c00;';
$image = 'public/img/sistema/icon/inspeciona_verde1.png';
$colorAlert = 'background-color:#ee9528d1; border: 2px solid rgba(121, 91, 25, 0.95); font-size:1.1em;border-radius: 10px;color: rgb(16, 14, 14);text-shadow: 0;font-weight: normal;';
$fecha_incidencia = 'Inspección';
$subsector = '3';
// include( 'vistas/layouts/stylesstartRegistro.php' );
$colorpie = 'color:#632a00; font-weight: bold;';
$colort = 'color: #549127';
// **********************
$titulo = 'Consulta de Inspecciones';

?>
<!-- Ekko Lightbox -->
<html style="width: ;100%">
  <table>
      <tr>
        <td colspan="3" style="font-size: 1.5rem; font-weight: bold;" align="center" >INSPECCIONES</td>
    </tr>
    <tr>
         <?php include 'pdfincidencia_encabezado.php'; ?>
    </tr>
    <tr>
        <?php include 'pdfInspecciones_hallazgoNew.php'; ?>
    </tr>

    <?php
    if ($bandera == 2) {
        if ($arrayInspeccion['inspeccion']['attachament']) {
            echo ' <tr>
                    <td colspan="4" style="font-size: 1.5rem; font-weight: bold;" >Documentos Adjuntos</td>
                  </tr>';
            foreach ($arrayInspeccion['inspeccion']['attachament'] as $attachament) {
                ?>
              <tr>
                <td colspan="4"  ><?php echo '<img src="data:'.$attachament['tipo'].';base64,'.$attachament['imagen'].'"> '; ?></td>
              </tr>
          <?php }
            }
    }
?>
  </table>


 

 </html>