<?php

if (!isset($_SESSION)) {
    session_start();
}
// ARCHIVO BASE PARA LOS SERVICIOS
require_once 'clases/respuestas.class.php';
require_once 'clases/proyectos.class.php';

$_respuestas = new respuestas();
$_inspecciones = new proyectos();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {// Get READ55
    if (isset($_GET['calendario']) ||
        (
            isset($_GET['tipoProyectoAHO']) ||   // tipoIncidenciaId: iNSPECCION. dIAGNOSTICO , eVENTOS
            isset($_GET['gerenciaProyectoAHO']) ||   //  subSectorId : 1 SIAHO 2 PG 3 AMBIENTE 4 SP SI  5 ADYCN
            isset($_GET['fechaInicioProyectoAHO']) ||
            isset($_GET['fechaFinProyectoAHO'])
        )
    ) {
        $listaInspecciones = $_inspecciones->listaCalendario(
            @$_GET['tipoProyectoAHO'],
            @$_GET['gerenciaProyectoAHO'],
            @$_GET['fechaInicioProyectoAHO'],
            @$_GET['fechaFinProyectoAHO']);
        // print("<pre>".print_r($listaInspecciones ,true)."</pre>"); die;

        header('Content-Type: applictaions/json');
        echo json_encode($listaInspecciones);
        http_response_code(200);
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {// POST CREATE insert
    // recibimos los datos enviados
    // $postBody = file_get_contents("php://input"); // para el plug in de crome
    $postBody = json_encode($_POST);

    // mandamos a insertar la cabecera/
    $datosArray = $_inspecciones->postProyectos($postBody);
    echo json_encode($datosArray);
    exit;

    $incidentesHeaderId = 0;
    if (json_encode($datosArray['status']) == 'ok') {
        // inserto la cabezera correctamente
        $incidentesHeaderId = json_encode($datosArray['result']['error_msg']);
    }

    // Devolvemos la respuesta
    header('Content-Type: applictaions/json');
    if (isset($datosArray['result']['error_id'])) {
        $responseCode = $datosArray['result']['error_id'];
        http_response_code($responseCode);
    } else {
        http_response_code(200);
    }

    echo json_encode($datosArray);
} elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {// PUT  UPDATER
    // recibimos los datos enviados
    $postBody = file_get_contents('php://input');
    // enviamos etso al navegados/
    $datosArray = $_empleados->put($postBody);

    // Devolvemos la respuesta
    header('Content-Type: applictaions/json');
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
    header('Content-Type: applictaions/json');
    if (isset($datosArray['result']['error_id'])) {
        $responseCode = $datosArray['result']['error_id'];
        http_response_code($responseCode);
    } else {
        http_response_code(200);
    }

    echo json_encode($datosArray);
} else {
    header('Content-Type: applictaions/json');
    $datosArray = $_respuestas->error_405();
    echo json_encode($datosArray);
}
