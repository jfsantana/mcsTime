<!-- <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback'> -->
<link rel="stylesheet" href='./plugins/fontawesome-free/css/all.css'>
<link rel="stylesheet" href='./plugins/sweetalert2/sweetalert2.min.css'>
<link rel="stylesheet" href='./plugins/toastr/toastr.min.css'>
<link rel="stylesheet" href='./plugins/toastr/toastr.min.js'>
<link rel="stylesheet" href='./dist/css/adminlte.min.css'>
<?php 
//se inicia sesion para poder usar la variable TOKEN
if (!isset($_SESSION)) {
    session_start();  }

    //print("<pre>".print_r(($_POST),true)."</pre>"); die;
//recorres el array con los valores y se asignan al nuevo array
foreach($_POST as $key => $value){
        if ($key=="inspecciones_tipo"){
            //aqui se agregan las validaciones
            echo $value;
        }
    }
//llamas el servicio
require_once ('../wsdl/clases/consumoApi.class.php');
//Valida el usuario y genera token valido
$token= $_SESSION['token'];
$_POST["token"]= $_SESSION['token'];
$_POST["creadoPor"]=$_SESSION['usuario'];
$respuesta = json_encode($_POST);
$URL	= "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/evaluacionesHo";
$parametros = $respuesta;
$rs = API::POST($URL,$token,$_POST);
$rs = API::JSON_TO_ARRAY($rs);
 if(@$rs['status']=='OK'){
    $url="onclick=\"location.href='../../dashboard.php?activo=ho';\"";
  }else{
    $url= "onclick=\"history.back()\"";   
  }
  $token = $_SESSION['token'];
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
               echo 'Completado';
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
  <script>
  $( document ).ready(function() {
      $('#modal-success').modal('toggle')
  });
  </script>