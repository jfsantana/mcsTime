<!-- <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback'> -->
<link rel="stylesheet" href='./plugins/fontawesome-free/css/all.css'>
<link rel="stylesheet" href='./plugins/sweetalert2/sweetalert2.min.css'>
<link rel="stylesheet" href='./plugins/toastr/toastr.min.css'>
<link rel="stylesheet" href='./plugins/toastr/toastr.min.js'>
<link rel="stylesheet" href='./dist/css/adminlte.min.css'>
<?php
//se inicia sesion para poder usar la variable TOKEN
if (!isset($_SESSION)) {
  session_start();
}
//declaras el array que se enviara al servicio
$respuesta = array(
  "header" => array(
    "codigo" => "",
    "registro_fecha" => "",
    "Complejo_id" => "",
    "MPreg_gerencia" => "",
    "MPreg_area" => "",
    "MPreg_custodio" => "",
    "MPreg_nrousu" => "",
    "MPreg_ubicacion" => "",
    "creadoPor" => ""
  ),
  "body" => array(
    "ID" => "",
    "Nombre de Material" => "",
    "Nro. Identificación" => "",
    "Características Físicas" => "",
    "Clase de Riesgos" => "",
    "División" => "",
    "Nro. de Guia de respuesta" => "",
    "Volumen Almacenado" => ""
  )


);
//print("<pre>".print_r(($_POST),true)."</pre>");die;

//recorres el array con los valores y se asignan al nuevo array
foreach ($_POST as $key => $value) {
  if ($key == "inspecciones_tipo") {
    //aqui se agregan las validaciones
    //echo $value;
  }
}


//llamas el servicio
require_once('../wsdl/clases/consumoApi.class.php');

//Valida el usuario y genera token valido
$token = $_SESSION['token'];
$_POST["token"] = $_SESSION['token'];
$_POST["creadoPor"] = $_SESSION['usuario'];
//print("<pre>".print_r(json_encode($_POST),true)."</pre>"); die;
$URL  = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/materialesPeligrosos";
$parametros = $respuesta;
$rs = API::POST($URL, $token, $_POST);
//print("<pre>".print_r($rs,true)."</pre>"); die;
$rs = API::JSON_TO_ARRAY($rs);
//print("<pre>".print_r($rs,true)."</pre>"); die;



if (@$rs['status'] == 'OK') {
  $url = "onclick=\"location.href='../../dashboard.php?activo=mp';";
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


?>

<div class="" id="modal-success">
  <div class="modal-dialog">
    <div class="modal-content <?php if ($rs['status'] == 'OK') {
                                echo 'bg-success';
                              } else {
                                echo 'bg-danger';
                              } ?>">
      <div class="modal-header">
        <h4 class="modal-title"><?php if ($rs['status'] == 'OK') {
                                  echo 'Completado con Exito. <br><br> Se envio el correo para solicitar su aprobacion';
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
  <script src="funciones/funcionesGenerales/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="funciones/funcionesGenerales/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="funciones/funcionesGenerales/dist/js/adminlte.min.js"></script>
<script>
  

$( document ).ready(function() {
    $('#modal-success').modal('toggle')
});

</script>