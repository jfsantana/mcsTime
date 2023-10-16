<?php

// ARCHIVO BASE PARA LOS SERVICIOS
require_once 'clases/respuestas.class.php';
require_once 'clases/consultora.class.php';

$_respuestas = new respuestas();
$_consultora = new consultora();

if ($_SERVER['REQUEST_METHOD'] == 'GET') { // Get READ
  if (isset($_GET['idEmpresaConsultora'])) {

    $listaclientes = $_consultora->listaConsultora($_GET['idEmpresaConsultora']);
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($listaclientes);
    http_response_code(200);
  } else {
    http_response_code(200);
  }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') { // POST CREATE
  //$postBody = file_get_contents('php://input'); // para el plug in de crome
  $postBody = json_encode($_POST);

  $datosArray = $_consultora->post($postBody);

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
  // recibimos los datos enviados
  $postBody = file_get_contents('php://input');
  // enviamos etso al navegados/
  $datosArray = $_consultora->delete($postBody);
  // Devolvemos la respuesta
  header('Content-Type: application/json;charset=utf-8');
  if (isset($datosArray['result']['error_id'])) {
    $responseCode = $datosArray['result']['error_id'];
    http_response_code($responseCode);
  } else {
    http_response_code(200);
  }
  echo json_encode($datosArray);
} else {
  header('Content-Type: application/json;charset=utf-8');
  $datosArray = $_respuestas->error_405();
  echo json_encode($datosArray);
}
