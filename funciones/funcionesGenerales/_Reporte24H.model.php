<!-- <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback'> -->
<link rel="stylesheet" href='./plugins/fontawesome-free/css/all.css'>
<link rel="stylesheet" href='./plugins/sweetalert2/sweetalert2.min.css'>
<link rel="stylesheet" href='./plugins/toastr/toastr.min.css'>
<link rel="stylesheet" href='./plugins/toastr/toastr.min.js'>
<link rel="stylesheet" href='./dist/css/adminlte.min.css'>

<?php
/****************
 * Modelo para la vista del Reprote 24h
 * Realizado por Jesus Santana
 * fecha 17/08/2022
 *****************/
// se inicia sesion para poder usar la variable TOKEN
  if (!isset($_SESSION)) {
      session_start();
  }

  // print("<pre>".print_r(($_POST),true)."</pre>"); die;// En este caso la Vista respeto la estructura

  // LIBRERIA DE CONSUMO DE SERVICIOS
  require_once '../wsdl/clases/consumoApi.class.php';

$token = $_SESSION['token'];

$URL = 'http://localhost/siaho/funciones/wsdl/r24h';
$parametros = $_POST;
$rs = API::POST($URL, $token, $parametros);
$rs = API::JSON_TO_ARRAY($rs);

if (@$rs['status'] == 'OK') {
    $R24Hid = $rs['result']['R24Hid'];
    // envio de notificaciones
    $URL = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/PHPMailer-master/enviarcorreoNotificacionReporte24.php?R24Hid=$R24Hid";
    $email = API::GET($URL, $token, $R24Hid);
    $url = "onclick=\"location.href='../../dashboard.php?activo=adcn';\"";
} else {
    $url = 'onclick="history.back()"';
}//
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
         <p><?php echo $rs['result']['error_msg']; ?></p>
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
<!-- AdminLTE for demo purposes -->
<script src="./dist/js/demo.js"></script>
<script>

$( document ).ready(function() {
    $('#modal-success').modal('toggle')
});

</script>
