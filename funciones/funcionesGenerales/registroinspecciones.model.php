<link rel="stylesheet" href='./plugins/fontawesome-free/css/all.css'>
<link rel="stylesheet" href='./plugins/sweetalert2/sweetalert2.min.css'>
<link rel="stylesheet" href='./plugins/toastr/toastr.min.css'>
<link rel="stylesheet" href='./plugins/toastr/toastr.min.js'>
<link rel="stylesheet" href='./dist/css/adminlte.min.css'>
<?php
// llamas el servicio
require_once '../wsdl/clases/consumoApi.class.php';
require_once '../wsdl/clases/consulta.class.php';

// se inicia sesion para poder usar la variable TOKEN
if (!isset($_SESSION)) {
    session_start();
}

$respuesta = $_POST;
$respuesta['header']['estatus'] = 1;
$respuesta['header']['creadoPor'] = $_SESSION['usuario'];
$respuesta['header']['fechaCreacion'] = date('Y-m-d');

//print("<pre>".print_r(($respuesta) ,true)."</pre>");
/******************************
 * MODIFICADO POR JESUS SANTANA 24/08/2022
 * VALIDACION PARA PREPARAR EL ENVIO DE LOS ARCHIVOS ADJUNTOS AL SERVICIO
 * ****************************/
if (@$_FILES['archivo']['name'][0] != null) {
    foreach ($_FILES['archivo']['name'] as $key => $value) {
        $imagedata = base64_encode(file_get_contents($_FILES['archivo']['tmp_name'][$key]));
        $FileService[] = [
            'nombre' => $_FILES['archivo']['name'][$key],
            'tipo' => $_FILES['archivo']['type'][$key],
            'base64' => $imagedata,
        ];
    }
    $respuesta['header']['adjuntos'] = $FileService;
}


$token = $_SESSION['token'];
$respuesta['token'] = $_SESSION['token'];
///print("<pre>".print_r(($respuesta) ,true)."</pre>");die;
$URL1 = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/inspecciones";

$rs = API::POST($URL1, $token, $respuesta);
$rs = API::JSON_TO_ARRAY($rs);

$idHeaderNew = @$rs['result']['idHeaderNew'];

print("<pre>".print_r(($rs) ,true)."</pre>"); die;

if (@$rs['status'] == 'OK') {

    //**********************************INSERCION EN SAP DE LA INSPECCION
    $text_N1 = '';
    $text_N2 = '';

    foreach ($_POST['hallazgosNew'] as $items) {
        $text_N1 = $items['descripcion'] . ':/N';
        $text_N2 = '';
        foreach ($items['recomendacion'] as $itemsRecomendacion) {
            $text_N2 = $text_N2 . '>' . $itemsRecomendacion['descripcion'] . '/N';
        }
        $text_N2 = $text_N2 . '';
    }
    $text_N1 = $text_N1 . $text_N2;


    $equipment = @$_POST['header']['custodio']; //EQUIPO
    $short_text = @$_POST['hallazgosNew'][0]['descripcion']; //texto corto
    $reportedby = @$_SESSION['usuario']; // EL CREADOR
    $notif_date = @$_POST['header']['fecha']; //fecha de notificacion
    $notiftime = date('h:m:s'); //
    $long_text = @$text_N1;

    //print("<pre>".print_r(($text_N1) ,true)."</pre>"); die;
    $inyeccionSAP = API::notifica($equipment, $short_text, $reportedby, $notif_date, $notiftime, $long_text);
    $inyeccionSAP = API::JSON_TO_ARRAY($inyeccionSAP);

    $idSap = $inyeccionSAP['detalle']['NOTIF_NO'];
    $whereUpdate = 'incidenciaHeaderId =' . $rs['result']['idHeaderNew'];
    $tableUpdate = 'dg_incidencias_header';
    $campo = 'idRegSAP';
    $URL = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/consulta?idSap=" . trim($inyeccionSAP['detalle']['NOTIF_NO']) . "&incidenciaHeaderId=incidenciaHeaderId=" . trim($rs['result']['idHeaderNew']) . "&tableUpdate=" . trim($tableUpdate) . "&campo=" . trim($campo);
    $update = API::GET($URL, $token, $respuesta);
    $update = API::JSON_TO_ARRAY($update);

    //********************************** fin INSERCION EN SAP DE LA INSPECCION


    // envio de notificaciones
    $URL11 = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/PHPMailer-master/enviarcorreoNotificacionInspecciones.php?idHeaderNew=$idHeaderNew";
    $email = API::GET($URL11, $token, $respuesta);

    if ($respuesta['header']['subsector'] == '3') {
        $activo = 'admoninspecciones';
    } else if ($respuesta['header']['subsector'] == '4') {
        $activo = 'sico';
    } else if ($respuesta['header']['subsector'] == '5') {
        $activo = 'rpad';
    }

    $url = "onclick=\"location.href='../../dashboard.php?activo=$activo';\"";
} else {
    $url = 'onclick="history.back()"';
}


?>

<div class="modal fade" id="modal-success">
    <div class="modal-dialog">
        <div class="modal-content <?php if (@$rs['status'] == 'OK') {
                                        echo 'bg-success';
                                    } else {
                                        echo 'bg-danger';
                                    } ?>">
            <div class="modal-header">
                <h4 class="modal-title"><?php if (@$rs['status'] == 'OK') {
                                            echo 'Completado con Exito. <br><br> Se envio el correo para solicitar su aprobacion';
                                        } else {
                                            echo 'Error';
                                        } ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><?php echo @$rs['result']['MSG']; ?></p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" <?php echo @$url; ?>>Close</button>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="./plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="./plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>

<script>
    $(document).ready(function() {
        $('#modal-success').modal('toggle')
    });
</script>