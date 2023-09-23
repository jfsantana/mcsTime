<!-- <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback'> -->
<link rel="stylesheet" href='./plugins/fontawesome-free/css/all.css'>
<link rel="stylesheet" href='./plugins/sweetalert2/sweetalert2.min.css'>
<link rel="stylesheet" href='./plugins/toastr/toastr.min.css'>
<link rel="stylesheet" href='./plugins/toastr/toastr.min.js'>
<link rel="stylesheet" href='./dist/css/adminlte.min.css'>
<?php
// se inicia sesion para poder usar la variable TOKENssshh
if (!isset($_SESSION)) {
    session_start();
}
// llamas el servicio
require_once '../wsdl/clases/consumoApi.class.php';

$respuesta = [
    'header' => [
                    ],
    'body' => [
                        ],
                    ];

$token = $_SESSION['token'];
$_POST['token'] = $_SESSION['token'];
$_POST['creadoPor'] = $_SESSION['usuario'];

/***************************************************
 * Servicio que actualiza las respuetsas en SAP
 ***************************************************/

if ($_POST['header']['mod'] == 1) {
    $_POST['header']['estatusValidacion'] = 'NO TRATADO';
}
$_POST['header']['token'] = $_SESSION['token'];

$parametrosIN['updateReg'] = $_POST['header'];
$FormatRespuestas['Respuestas']['item'] = $_POST['body'];
$data = [];
$data1 = [];
$valores = '';
foreach ($FormatRespuestas['Respuestas']['item'] as $respuestasAux) {
    foreach ($respuestasAux as $Preguntas => $respuesta) {
        if ($Preguntas != 'id') {
            $data += ["$Preguntas" => $respuesta];
        }
    }
}
$parametrosIN['Respuestas']['item'] = $data;
print("<pre>".print_r(($parametrosIN),true)."</pre>"); die;

$parametrosSAP = json_encode($parametrosIN);
 //print("<pre>".print_r(($parametrosSAP),true)."</pre>"); die;

$token = '';
$URL = 'http://pqvmorsap03.pequiven.com:50000/RESTAdapter/Portal_SIAHO/updateRecordControlTabReqMM';
$rs = API::POSTSAP($URL, $token, $parametrosSAP);
$rs = API::JSON_TO_ARRAY($rs);

// AGREGAR LA VAIDACION DE ESTE CAMPO JSNTANA
if (@$rs['ZFM_UPDATE_RECOD_CONTROL_TAB.Response']['EX_RESULT'] == 4) {
    $url = 'onclick="history.back()"'; ?>
  <div class="modal fade" id="modal-success">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">Error</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><?php echo $rs['ZFM_UPDATE_RECOD_CONTROL_TAB.Response']['EX_T_MESSAGES']['item'][0]; ?></p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" <?php echo $url; ?>>Close</button>
      </div>
    </div>
  </div>
</div>
<?php
} else {
    // print("<pre>".print_r(json_encode($_POST),true)."</pre>"); die;
    $token = '';
    $URL = 'http://'.$_SERVER['HTTP_HOST'].'/funciones/wsdl/solped';
    $r1sRespuestas = API::POST($URL, $token, $_POST);
    $rsWeb = API::JSON_TO_ARRAY($r1sRespuestas);
    if (@$rsWeb['status'] == 'OK') {
        $url = "onclick=\"location.href='../../dashboard.php?activo=Evalca';\"";
    } else {
        $url = 'onclick="history.back()"';
    }
    ?>
  <div class="modal fade" id="modal-success">
    <div class="modal-dialog">
      <div class="modal-content <?php if ($rsWeb['status'] == 'OK') {
          echo 'bg-success';
      } else {
          echo 'bg-danger';
      }?>">
        <div class="modal-header">
          <h4 class="modal-title"><?php if ($rsWeb['status'] == 'OK') {
              echo 'Completado';
          } else {
              echo 'Error';
          }?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p><?php echo $rsWeb['result']['error_msg']; ?></p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" <?php echo $url; ?>>Close</button>
        </div>
      </div>
    </div>
  </div>
<?php }?>
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