<link rel="stylesheet" href='./plugins/fontawesome-free/css/all.css'>
<link rel="stylesheet" href='./plugins/sweetalert2/sweetalert2.min.css'>
<link rel="stylesheet" href='./plugins/toastr/toastr.min.css'>
<link rel="stylesheet" href='./plugins/toastr/toastr.min.js'>
<link rel="stylesheet" href='./dist/css/adminlte.min.css'>
<?php

require_once '../wsdl/clases/consumoApi.class.php';
require_once '../wsdl/clases/consulta.class.php';


if (!isset($_SESSION)) {
  session_start();
}

// Valida el usuario y genera token valido
$token = $_SESSION['token'];
$_POST['token'] = $_SESSION['token'];
$_POST['creadoPor'] = $_SESSION['usuario'];

 //print("<pre>".print_r(($_POST),true)."</pre>"); die;

//print("<pre>".print_r(json_encode($_POST),true)."</pre>");//die;

$URL = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/inspeccionesHo";
//echo $URL; die;//
$rs = API::POST($URL, $token, $_POST);
$rs = API::JSON_TO_ARRAY($rs);
//print("<pre>" . print_r($rs, true) . "</pre>");die;

if (@$rs['status'] == 'OK') {
  $url = "onclick=\"location.href='../../dashboard.php?activo=ho';";

  /*****FLUJO DE TRABAJO POR DEFINIR */
} else {
  $url = 'onclick="history.back()"';

  /*****FLUJO DE TRABAJO POR DEFINIR */
}
//print_r($rs);die;
?>
<div class="" id="modal-success">
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
<script src="/funciones/funcionesGenerales/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./public/adminver3/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- SweetAlert2 -->
<script src="/funciones/funcionesGenerales/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="/funciones/funcionesGenerales/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="/funciones/funcionesGenerales/dist/js/adminlte.min.js"></script>

<script>
    $(document).ready(function() {
        $('#modal-success').modal('toggle')
    });
</script>