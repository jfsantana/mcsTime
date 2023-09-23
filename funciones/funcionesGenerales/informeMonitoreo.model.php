<header>
<!-- <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback'> -->


<link rel="stylesheet" href='/funciones/funcionesGenerales/dist/css/adminlte.min.css'> 
</header>
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

<?php
if (!isset($_SESSION)) {
    session_start();
}

$respuesta = $_POST;

// docRefenciaArchivos
if (@$_FILES['body']['name']['docRefenciaArchivos'][0] != null) {
    foreach ($_FILES['body']['name']['docRefenciaArchivos'] as $keydocRefencia => $value) {
        $imagedata = base64_encode(file_get_contents($_FILES['body']['tmp_name']['docRefenciaArchivos'][$keydocRefencia]));
        $FileServicedocRefencia[] = [
            'nombre' => $_FILES['body']['name']['docRefenciaArchivos'][$keydocRefencia],
            'tipo' => $_FILES['body']['type']['docRefenciaArchivos'][$keydocRefencia],
            'base64' => $imagedata,
        ];
    }
    $respuesta['body']['docRefencia']['adjuntos'] = $FileServicedocRefencia;
}

// puntoMuetsreoArchivos
if (@$_FILES['body']['name']['puntoMuetsreoArchivos'][0] != null) {
    foreach ($_FILES['body']['name']['puntoMuetsreoArchivos'] as $keypuntoMuetsreo => $value) {
        $imagedata = base64_encode(file_get_contents($_FILES['body']['tmp_name']['puntoMuetsreoArchivos'][$keypuntoMuetsreo]));
        $FileServicepuntoMuetsreo[] = [
            'nombre' => $_FILES['body']['name']['puntoMuetsreoArchivos'][$keypuntoMuetsreo],
            'tipo' => $_FILES['body']['type']['puntoMuetsreoArchivos'][$keypuntoMuetsreo],
            'base64' => $imagedata,
        ];
    }
    $respuesta['body']['puntoMuetsreo']['adjuntos'] = $FileServicepuntoMuetsreo;
}

// anexosArchivos
if (@$_FILES['body']['name']['anexosArchivos'][0] != null) {
    foreach ($_FILES['body']['name']['anexosArchivos'] as $keyanexos => $value) {
        $imagedata = base64_encode(file_get_contents($_FILES['body']['tmp_name']['anexosArchivos'][$keyanexos]));
        $FileServiceanexos[] = [
            'nombre' => $_FILES['body']['name']['anexosArchivos'][$keyanexos],
            'tipo' => $_FILES['body']['type']['anexosArchivos'][$keyanexos],
            'base64' => $imagedata,
        ];
    }
    $respuesta['body']['anexos']['adjuntos'] = $FileServiceanexos;
}

// llamas el servicio
require_once '../wsdl/clases/consumoApi.class.php';

// Valida el usuario y genera token valido
$token = $_SESSION['token'];
$respuesta['header']['token'] = $_SESSION['token'];
$respuesta['header']['usuario'] = $_SESSION['usuario'];
$_POST = $respuesta;

$URL = 'http://'.$_SERVER['HTTP_HOST'].'/funciones/wsdl/ambienteInforme';

$rs = API::POST($URL, $token, $respuesta);
$rs = API::JSON_TO_ARRAY($rs);

$idHeaderNew = $rs['result']['idHeaderNew'];

if (@$rs['status'] == 'OK') {
    $URL = 'http://'.$_SERVER['HTTP_HOST']."/funciones/PHPMailer-master/enviarcorreoNotificacionInformeAmbiente.php?idInforme=$idHeaderNew";
    $email = API::GET($URL, $token, $respuesta);

    $url = "onclick=\"location.href='../../dashboard.php?activo=infomoni';\"";

    /*****FLUJO DE TRABAJO POR DEFINIR */
} else {
    $url = 'onclick="history.back()"';

    /*****FLUJO DE TRABAJO POR DEFINIR */
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
                <p> <?php echo @$rs['result']['MSG']; ?> </p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button"  <?php echo @$url; ?> > Close </button>
            </div>
        </div>
    </div>
</div>





<!-- AdminLTE App -->
<script src="'/funciones/funcionesGenerales/dist/js/adminlte.min.js"></script>

<script>
    $(document).ready(function() {
        $('#modal-success').modal('toggle')
    });
</script>