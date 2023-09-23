<?php

// ARCHIVO BASE PARA LOS SERVICIOS
require_once 'clases/respuestas.class.php';
require_once 'clases/empleados.class.php';

$_respuestas = new respuestas();
$_empleados = new empleados();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {// Get READ
    if (isset($_GET['page']) || isset($_GET['filtro'])) {
        $pagina = $_GET['page'];
        $filtro = $_GET['filtro'];
        $listaEmpleados = $_empleados->listaEmpleados($pagina, $filtro);
        // prepara salida del ws
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($listaEmpleados);
        http_response_code(200);
    } elseif (isset($_GET['NumPersonal'])) {
        $empleado = $_GET['NumPersonal'];
        $datosEmpleado = $_empleados->obtenerEmpleado($empleado);
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
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {// POST CREATE
    // $postBody = file_get_contents('php://input'); // para el plug in de crome
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
    $datosArray = $_empleados->put($_PUT);

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
    $datosArray = $_empleados->delete($postBody);
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
