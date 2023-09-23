<?php

// ARCHIVO BASE PARA LOS SERVICIOS
require_once 'clases/respuestas.class.php';
require_once 'clases/proyecto.class.php';

$_respuestas = new respuestas();
$_proyecto = new proyecto();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {// Get READ
    if (isset($_GET['idProyecto']) ) {

        $listaclientes = $_proyecto->listaProyecto($_GET['idProyecto']);
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($listaclientes);
        http_response_code(200);

    }else {
        http_response_code(200);
    }

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {// POST CREATE
    // $postBody = file_get_contents('php://input'); // para el plug in de crome
    $postBody = json_encode($_POST);

    $datosArray = $_proyecto->post($postBody);

    // Devolvemos la respuesta
    header('Content-Type: application/json;charset=utf-8');
    if (isset($datosArray['result']['error_id'])) {
        $responseCode = $datosArray['result']['error_id'];
        http_response_code($responseCode);
    } else {
        http_response_code(200);
    }
    echo json_encode($datosArray);
} elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {// PUT  UPDATER
    // $postBody = file_get_contents('php://input'); // para el plug in de crome
    // $postBody = json_encode($_PUT);
    parse_str(file_get_contents('php://input'), $_PUT);
    $PUT = json_encode($_PUT, true);

    // recibimos los datos enviados
    // $PUT = file_get_contents('php://input');

    // $PUT = file_get_contents('php://input');
    // parse_str(file_get_contents('php://input'), $PUT);
    // $PUT = json_decode($PUT, true);

    // json_decode($PUT, true)

    // enviamos etso al navegados/
    $datosArray = $_proyecto->put($_PUT);

    // Devolvemos la respuesta
    header('Content-Type: application/json;charset=utf-8');
    if (isset($datosArray['result']['error_id'])) {
        $responseCode = $datosArray['result']['error_id'];
        http_response_code($responseCode);
    } else {
        http_response_code(200);
    }
    echo json_encode($datosArray);
} elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {// DELETE
    // recibimos los datos enviados
    $postBody = file_get_contents('php://input');
    // enviamos etso al navegados/
    $datosArray = $_proyecto->delete($postBody);
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
