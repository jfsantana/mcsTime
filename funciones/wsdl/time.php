<?php

// ARCHIVO BASE PARA LOS SERVICIOS
require_once 'clases/respuestas.class.php';
require_once 'clases/time.class.php';

$_respuestas = new respuestas();
$_time = new time();

if ($_SERVER['REQUEST_METHOD'] == 'GET') { // Get
  if (  isset($_GET['id']) ||
        isset($_GET['corte']) ||
        isset($_GET['idProyecto']) ||
        isset($_GET['idAprobador']) ) {

    $listaclientes = $_time->listaHoras($_GET['id'], $_GET['corte'],$_GET['idProyecto'],@$_GET['idAprobador']);
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($listaclientes);
    http_response_code(200);

  } elseif ( isset($_GET['idRegister'])
  ) {

    $listaclientes = $_time->detalleRegistro($_GET['idRegister']);
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($listaclientes);
    http_response_code(200);

  }  elseif (     isset($_GET['idUser']) ||     isset($_GET['corteFactura'])  ) {

    //$listaclientes = $_time->detalleFactura($_GET['idUser'], $_GET['corteFactura']);
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($listaclientes);
    http_response_code(200);

  } elseif (    isset($_GET['idTipoActividad'])  ) {

    $listaclientes = $_time->listTipoActividad($_GET['idTipoActividad']);
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($listaclientes);
    http_response_code(200);

  } elseif (    isset($_GET['modulos'])  ) {

    $listaclientes = $_time->listModulos();
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($listaclientes);
    http_response_code(200);

  }elseif ( isset($_GET['idEmpleadoDetalle']) &&  isset($_GET['idEmpresaConsultoraDetalle']) && isset($_GET['mes'])) {
    $listaclientes = $_time->getDetalleMensual($_GET['idEmpleadoDetalle'], $_GET['idEmpresaConsultoraDetalle'], $_GET['mes']);
    // prepara salida del ws
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($listaclientes);
    http_response_code(200);
  } else {
    http_response_code(200);
  }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') { // POST
  //$postBody = file_get_contents('php://input'); // para el plugd in de crome
  $postBody = json_encode($_POST);

  $datosArray = $_time->post($postBody);

  // Devolvemos la respuesta
  header('Content-Type: application/json;charset=utf-8');
  if (isset($datosArray['result']['error_id'])) {
    $responseCode = $datosArray['result']['error_id'];
    http_response_code($responseCode);
  } else {
    http_response_code(200);
  }
  echo json_encode($datosArray);
} elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') { // PUT
  // Devolvemos la respuesta
  header('Content-Type: application/json;charset=utf-8');
  $responseCode = $datosArray['result']['error_id'];
  http_response_code($responseCode);
  echo json_encode($datosArray);
} elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') { // DELETE

  header('Content-Type: application/json;charset=utf-8');
  $responseCode = $datosArray['result']['error_id'];
  http_response_code($responseCode);
  echo json_encode($datosArray);
} else {
  header('Content-Type: application/json;charset=utf-8');
  $datosArray = $_respuestas->error_405();
  echo json_encode($datosArray);
}
