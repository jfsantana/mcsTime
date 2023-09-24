<?php

// ARCHIVO BASE PARA LOS SERVICIOS
require_once 'clases/respuestas.class.php';
require_once 'clases/factura.class.php';

$_respuestas = new respuestas();
$_factura = new factura();

if ($_SERVER['REQUEST_METHOD'] == 'GET') { // Get READ
  if (
    isset($_GET['id']) ||     isset($_GET['corte'])
  ) {
    $listaclientes = $_factura->listaHoras($_GET['id'], $_GET['corte']);
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($listaclientes);
    http_response_code(200);
  } elseif (
    isset($_GET['idUser']) ||     isset($_GET['corteFactura'])
  ) {
    $listaclientes = $_factura->detalleFactura($_GET['idUser'], $_GET['corteFactura']);
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($listaclientes);
    http_response_code(200);
  } elseif (
    isset($_GET['idTipoActividad'])
  ) {
    $listaclientes = $_factura->listTipoActividad($_GET['idTipoActividad']);
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($listaclientes);
    http_response_code(200);
  } else {
    http_response_code(200);
  }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') { // POST CREATE
  //$postBody = file_get_contents('php://input'); // para el plugd in de crome
  $postBody = json_encode($_POST);

  $datosArray = $_factura->post($postBody);

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
