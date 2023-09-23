<!-- <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback'> -->
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
$respuesta = $_POST;
$respuesta['header']['estatus'] = 1;
$respuesta['header']['creadoPor'] = $_SESSION['usuario'];
$respuesta['header']['fechaCreacion'] = date('Y-m-d');

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

// llamas el servicio
require_once '../wsdl/clases/consumoApi.class.php';
$token = $_SESSION['token'];
$respuesta['token'] = $_SESSION['token'];
// print("<pre>".print_r(($respuesta) ,true)."</pre>"); die;
$URL = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/inspecciones";
$rs = API::POST($URL, $token, $respuesta);
$rs = API::JSON_TO_ARRAY($rs);
$idHeaderNew = @$rs['result']['idHeaderNew'];

if (@$rs['status'] == 'OK') {
    // envio de notificaciones
    $URL = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/PHPMailer-master/enviarcorreoNotificacionInspecciones.php?idHeaderNew=$idHeaderNew";
    $email = API::GET($URL, $token, $respuesta);

    $url = "onclick=\"location.href='../../dashboard.php?activo=inspeccionesambiente';\"";
} else {
    $url = 'onclick="history.back()"';
}
?>
              
<div class="modal fade" id="modal-success">
   <div class="modal-dialog">
     <div class="modal-content <?php if ($rs['status'] == 'OK') {
         echo 'bg-success';
     } else {
         echo 'bg-danger';
     }?>">
       <div class="modal-header">
         <h4 class="modal-title"><?php if ($rs['status'] == 'OK') {
             echo 'Completado con Exito. <br><br> Se envio el correo para solicitar su aprobacion';
         } else {
             echo 'Error';
         }?></h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <p><?php echo @$rs['result']['MSG']; ?></p>
       </div>
       <div class="modal-footer justify-content-between">
         <button type="button" class="btn btn-outline-light" <?php echo $url; ?>>Close</button>
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

$( document ).ready(function() {
    $('#modal-success').modal('toggle')
});

</script>
