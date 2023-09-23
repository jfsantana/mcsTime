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


      $dia_actual = date('j'); // Obtener el día actual
      $dia_semana_actual = date('N'); // Obtener el día de la semana actual (1 para lunes, 7 para domingo)

      if ($dia_actual <= 27 ) {
        $_SESSION['corte'] = @date('mY');
      } else {//&& $dia_semana_actual >= 1 && $dia_semana_actual <= 5
          $prox_dia_habil = strtotime('next weekday', strtotime(date('Y-m-27')));
          $mes=date('m', $prox_dia_habil)+1;
          $_SESSION['corte']= $mes.date('Y', $prox_dia_habil);
      }


      //$_SESSION['corte'] = @date('mY');

      header('Location:../../vistas/home.php');
      exit;
  } else {
      header("Location:../../index.php?mensaje= Login No Autorizado");
      exit;
  }
