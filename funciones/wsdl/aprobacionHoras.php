<?php

// ARCHIVO BASE PARA LOS SERVICIOS
require_once 'clases/respuestas.class.php';
require_once 'clases/aprobacionHoras.class.php';

$_respuestas = new respuestas();
$_aprobacionHoras = new aprobacionHoras();

if ($_SERVER['REQUEST_METHOD'] == 'GET') { // Get
  if (isset($_GET['corte']) && isset($_GET['idAprobador'])) {

    $listaclientes = $_aprobacionHoras->listdoConsultoresConsolidado(@$_GET['corte'], @$_GET['idAprobador']);
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($listaclientes);
    http_response_code(200);

  } elseif (isset($_GET['corte'] ) && isset($_GET['Consultora']) ) {

    $listaclientes = $_aprobacionHoras->listdoConsultoresConsolidadoConsultora($_GET['corte'],$_GET['Consultora']);
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($listaclientes);
    http_response_code(200);

  } elseif (isset($_GET['idTipoActividad'])  ) {

    $listaclientes = $_aprobacionHoras->listTipoActividad($_GET['idTipoActividad']);
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($listaclientes);
    http_response_code(200);

  } elseif (isset($_GET['cargaXcorteXconsultor']) &&(isset($_GET['corte'])) &&(isset($_GET['carga']))  ) {

    $listaclientes = $_aprobacionHoras->cargaXcorteXconsultor($_GET['corte'], $_GET['carga']);
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($listaclientes);
    http_response_code(200);

  } else {
    http_response_code(200);
  }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') { // POST
  //$postBody = file_get_contents('php://input'); // para el plugd in de crome
  $postBody = json_encode($_POST);

  $datosArray = $_aprobacionHoras->post($postBody);

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
