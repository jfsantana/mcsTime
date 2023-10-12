<?php

// ARCHIVO BASE PARA LOS SERVICIOS
require_once 'clases/respuestas.class.php';
require_once 'clases/clientes.class.php';

$_respuestas = new respuestas();
$_clientes = new clientes();

if ($_SERVER['REQUEST_METHOD'] == 'GET') { // Get READ
  if (isset($_GET['id'])) {
    $listaclientes = $_clientes->listaClientes($_GET['id']);
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($listaclientes);
    http_response_code(200);
  }elseif(isset($_GET['idActivos'])){
    $listaclientes = $_clientes->listaClientesActivos($_GET['idActivos']);
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($listaclientes);
    http_response_code(200);
  } else {
    http_response_code(200);
  }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') { // POST CREATE
  //$postBody = file_get_contents('php://input'); // para el plugd in de crome
  $postBody = json_encode($_POST);

  $datosArray = $_clientes->post($postBody);

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
