<?php

// ARCHIVO BASE PARA LOS SERVICIOS
require_once 'clases/respuestas.class.php';
require_once 'clases/empleados.class.php';

$_respuestas = new respuestas();
$_empleados = new empleados();

if ($_SERVER['REQUEST_METHOD'] == 'GET') { // Get READ
  if (isset($_GET['id_usu'])) {
    $id_usu = $_GET['id_usu'];
    $listaEmpleados = $_empleados->listaEmpleados($id_usu);
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($listaEmpleados);
    http_response_code(200);
  } elseif (isset($_GET['rol'])) {
    $rol = $_GET['rol'];
    $datosEmpleado = $_empleados->roles($rol);
    // prepara salida del ws
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($datosEmpleado);
    http_response_code(200);
  } elseif (isset($_GET['token'])) {
    $token = $_GET['token'];
    $datosEmpleado = $_empleados->obtenerEmpleadoToken($token);
    // prepara salida del ws
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($datosEmpleado);
    http_response_code(200);
  }elseif (isset($_GET['aprobadores'])) {
    $datosEmpleado = $_empleados->obtenerEmpleadoAprobadores();
    // prepara salida del ws
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($datosEmpleado);
    http_response_code(200);
  }elseif ( isset($_GET['idConsultora']) && isset($_GET['idProyecto']) && isset($_GET['mes'])) {
    $datosEmpleado = $_empleados->obtenerEmpleadoConsultora($_GET['idConsultora'],$_GET['idProyecto'], $_GET['mes']);
    // prepara salida del ws
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($datosEmpleado);
    http_response_code(200);
  }elseif ( isset($_GET['id_empleado']) && isset($_GET['idEmpresaConsultora']) && isset($_GET['idProyecto']) && isset($_GET['mes'])) {
    $datosEmpleado = $_empleados->obtenerEmpleadoDetalleMes($_GET['id_empleado'],$_GET['idEmpresaConsultora'],$_GET['idProyecto'], $_GET['mes']);
    // prepara salida del ws
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($datosEmpleado);
    http_response_code(200);
  }elseif ( isset($_GET['idEmpresaConsultora']) && isset($_GET['mes'])) {
    $datosEmpleado = $_empleados->obtenerEmpleadoConsultoraMes($_GET['idEmpresaConsultora'], $_GET['mes']);
    // prepara salida del ws
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($datosEmpleado);
    http_response_code(200);
  }

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') { // POST CREATE
  //$postBody = file_get_contents('php://input'); // para el plug in de crome
  $postBody = json_encode($_POST);

  $datosArray = $_empleados->post($postBody);

  // Devolvemos la respuesta
  header('Content-Type: application/json;charset=utf-8');
  if (isset($datosArray['result']['error_id'])) {
    $responseCode = $datosArray['result']['error_id'];
    http_response_code($responseCode);
  } else {
    http_response_code(200);
  }
  echo json_encode($datosArray);
} elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') { // PUT  UPDATER

  $responseCode = $datosArray['result']['error_id'];
  http_response_code($responseCode);

  echo json_encode($datosArray);
} elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') { // DELETE

  $responseCode = $datosArray['result']['error_id'];
  http_response_code($responseCode);

  echo json_encode($datosArray);
} else {
  header('Content-Type: application/json;charset=utf-8');
  $datosArray = $_respuestas->error_405();
  echo json_encode($datosArray);
}
