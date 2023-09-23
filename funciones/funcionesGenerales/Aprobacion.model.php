<link rel="stylesheet" href='./plugins/fontawesome-free/css/all.css'>
<link rel="stylesheet" href='./plugins/sweetalert2/sweetalert2.min.css'>
<link rel="stylesheet" href='./plugins/toastr/toastr.min.css'>
<link rel="stylesheet" href='./plugins/toastr/toastr.min.js'>
<link rel="stylesheet" href='./dist/css/adminlte.min.css'>

<?php
// se inicia sesion para poder usar la variable TOKEN
if (!isset($_SESSION)) {
    session_start();
}
$token = "";
require_once '../wsdl/clases/consumoApi.class.php';
//echo '<pre>'.print_r($_POST, true).'</pre>'; die;

if (isset($_POST['Aprobado'])) {
    $status = 2;
} elseif (isset($_POST['Revisar'])) {
    $status = 3;
}
//print_r($status);
$respuesta = "";
$URL = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/status?incidenciaHeaderId=" . $_POST['IDinspeccion'] . "&statusUpdate=$status";

$rs = API::GET($URL, $token);
$rs = API::JSON_TO_ARRAY($rs);
//print_r($URL);die;
$url = "onclick=\"location.href='../../dashboard.php?activo=ambiente';\"";
//print_r($actualizar);die;
//print_r($rs); 

if (@$rs['status'] == 'OK') {

    //**********************************INSERCION EN SAP DE LA INSPECCION
    if ($_POST['Aprobado'] == 'Aprobado') {  // solo si esta aprobado genera la orden en SAP
        $text_N1 = '';

        foreach ($_REQUEST as $items) {
            $text_N1 = $items;
        }
        $text_N1 = (json_encode($text_N1));

        $equipment = @$_POST['header']['equipo']; //EQUIPO
        $short_text = @$_POST['hallazgosNew']['descripcion']; //texto corto
        $reportedby = @$_SESSION['usuario']; // EL CREADOR
        $notif_date = @$_POST['header']['fecha']; //fecha de notificacion
        $notiftime = date('h:m:s'); //
        $long_text = @$text_N1;


        $inyeccionSAP = API::notifica($equipment, $short_text, $reportedby, $notif_date, $notiftime, $long_text);
        $inyeccionSAP = API::JSON_TO_ARRAY($inyeccionSAP);
        $idSap = $inyeccionSAP['detalle']['NOTIF_NO'];
        $whereUpdate = 'incidenciaHeaderId =' . $rs['result']['idHeaderNew'];
        $tableUpdate = 'dg_incidencias_header';
        $campo = 'idRegSAP';
        $URL = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/consulta?idSap=" . trim($inyeccionSAP['detalle']['NOTIF_NO']) . "&incidenciaHeaderId=incidenciaHeaderId=" . $_POST['IDinspeccion'] . "&tableUpdate=" . trim($tableUpdate) . "&campo=" . trim($campo);

        $update = API::GET($URL, $token, $respuesta);
        $update = API::JSON_TO_ARRAY($update);
    }
    //********************************** fin INSERCION EN SAP DE LA INSPECCION


    // envio de notificaciones
    $URL = 'http://' . $_SERVER['HTTP_HOST'] . "/funciones/PHPMailer-master/enviarcorreoNotificacionInspecciones.php?idHeaderNew=" . $_POST['IDinspeccion'];
    $email = API::GET($URL, $token, $respuesta);
    //print_r($URL);die;
    $activo = "";
    if ($_POST['header']['subsector'] == 3){
        $activo='admoninspecciones';
    } if ($_POST['header']['subsector'] == 4){
        $activo='sico';  
    } if ($_POST['header']['subsector'] == 5){
    $activo='adycnco';  
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