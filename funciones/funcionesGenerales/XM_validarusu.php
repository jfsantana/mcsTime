<?php
  if (!isset($_SESSION)) {
      session_start();
  }
  require_once '../wsdl/clases/consumoApi.class.php';

  if ((@$_POST['user'] == '') && ($_POST['password'] == '')) {
      header('Location:../../index.php');
      exit;
  }

  $token = '';
  $URL = 'http://'.$_SERVER['HTTP_HOST'].'/funciones/wsdl/auth';
  $parametros = [
      'usuario' => $_POST['user'],
      'password' => $_POST['password'],
    ];

    $rs = API::POST($URL, $token, $parametros);
  $rs = API::JSON_TO_ARRAY($rs);

  if (@$rs['result']['token']) {

      $token = $rs['result']['token'];
      $URL = 'http://'.$_SERVER['HTTP_HOST'].'/funciones/wsdl/empleados?token='.$rs['result']['token'];
      $rs = API::GET($URL, $token);
      $array = API::JSON_TO_ARRAY($rs);
      $datosEmpleado = $array;

      $_SESSION['usuario'] = $datosEmpleado[0]['log_usu'];
      $_SESSION['id_user'] = @$datosEmpleado[0]['id_usu'];
      $_SESSION['id_rol'] = @$datosEmpleado[0]['rol_usu'];
      $_SESSION['perfil'] = @$datosEmpleado[0]['des_rol'];
      $_SESSION['token'] = $token;
      $_SESSION['nombre'] = @$datosEmpleado[0]['nom_usu'].', '.@$datosEmpleado[0]['ape_usu'];
      $_SESSION['cargo'] = @$datosEmpleado[0]['"car_usu'];
      $_SESSION['activo'] = @$datosEmpleado[0]['"act_usu'];
      $_SESSION['HOY'] = @date('Y-m-d');

      header('Location:../../vistas/home.php');
      exit;
  } else {
      header("Location:../../index.php?mensaje= Login No Autorizado");
      exit;
  }