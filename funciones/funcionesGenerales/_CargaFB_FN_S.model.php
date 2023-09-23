<!-- <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback'> -->
<link rel="stylesheet" href='./plugins/fontawesome-free/css/all.css'>
<link rel="stylesheet" href='./plugins/sweetalert2/sweetalert2.min.css'>
<link rel="stylesheet" href='./plugins/toastr/toastr.min.css'>
<link rel="stylesheet" href='./plugins/toastr/toastr.min.js'>
<link rel="stylesheet" href='./dist/css/adminlte.min.css'>
<?php
// LIBRERIA DE CONSUMO DE SERVICIOS
require_once '../wsdl/clases/consumoApi.class.php';

if (!isset($_SESSION)) {
  session_start();
}
//print("<pre>".print_r(($_SESSION),true)."</pre>"); die;
$_SESSION['id_complejo'] = $_POST['header']['id_complejo'];
$_SESSION['siglas_complejo'] = $_POST['header']['siglas_complejo'];
$_POST['header'] = $_SESSION;

$token = $_SESSION['token'];
//print("<pre>".print_r(json_encode($_POST),true)."</pre>"); 
$URL  = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/indicadorSI";
//echo $URL ; die;
$parametros = json_encode($_POST);

$rs = API::POST($URL, $token, $_POST);
//print("<pre>".print_r(($rs),true)."</pre>"); die;

$rs = API::JSON_TO_ARRAY($rs);
//print("<pre>".print_r(($rs),true)."</pre>"); die;

if (@$rs['status'] == 'ok') {


  $url = "onclick=\"location.href='../../dashboard.php?activo=sp';\"";
  $color = 'bg-success';
  $titulo = 'Completado';
  //
  /*****FLUJO DE TRABAJO POR DEFINIR */
} else {

  $url = "onclick=\"history.back()\"";
  $color = 'bg-danger';
  $titulo = 'Error';

  /*****FLUJO DE TRABAJO POR DEFINIR */
}


$token = $_SESSION['token'];
//echo $rs['status']; die;
?>
<div class="modal fade" id="modal-success">
  <div class="modal-dialog">
    <div class="modal-content <?php if ($rs['status'] == 'ok') {
                                echo 'bg-success';
                              } else {
                                echo 'bg-danger';
                              } ?>">
      <div class="modal-header">
        <h4 class="modal-title"><?php if ($rs['status'] == 'ok') {
                                  echo 'Completado';
                                } else {
                                  echo 'Error';
                                } ?></h4>
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

<script>
  $(document).ready(function() {
    $('#modal-success').modal('toggle')
  });
</script>