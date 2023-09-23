<?php

if (!isset($_SESSION)) {
    session_start();
}
// ARCHIVO BASE PARA LOS SERVICIOS
require_once 'clases/respuestas.class.php';
require_once 'clases/inspecciones.class.php';

$_respuestas = new respuestas();
$_inspecciones = new inspecciones();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {// Get READ
    if (isset($_GET['tipoIncidencia']) ||
        (
            isset($_GET['complejo']) ||
            isset($_GET['gerencia']) ||
            isset($_GET['area']) ||
            isset($_GET['custodio']) ||
            isset($_GET['fechaFin']) ||
            isset($_GET['creador']) ||
            isset($_GET['sector']) ||
            isset($_GET['fechaInicio']) ||
            isset($_GET['complejo']) ||
            isset($_GET['estatus']) ||
            isset($_GET['fechaCreacion']) ||
            isset($_GET['aspectos']) ||
            isset($_GET['tipoIncidenciaId'])
        )
    ) {
        if (isset($_GET['tipoIncidencia'])) {
            $tipoIncidencia = @$_GET['tipoIncidencia'];
        }
        if (isset($_GET['gerencia'])) {
            $gerencia = @$_GET['gerencia'];
        }
        if (isset($_GET['area'])) {
            $area = @$_GET['area'];
        }
        if (isset($_GET['custodio'])) {
            $custodio = @$_GET['custodio'];
        }
        if (isset($_GET['fechaFin'])) {
            $fechaFin = @$_GET['fechaFin'];
        }
        if (isset($_GET['creador'])) {
            $creador = @$_GET['creador'];
        }
        if (isset($_GET['sector'])) {
            $sector = @$_GET['sector'];
        }

        if (isset($_GET['fechaInicio'])) {
            $fechaInicio = @$_GET['fechaInicio'];
        }
        if (isset($_GET['complejo'])) {
            $complejo = @$_GET['complejo'];
        }
        if (isset($_GET['estatus'])) {
            $estatus = @$_GET['estatus'];
        }
        if (isset($_GET['fechaCreacion'])) {
            $fechaCreacion = @$_GET['fechaCreacion'];
        }
        if (isset($_GET['aspectos'])) {
            $aspectos = @$_GET['aspectos'];
        }
        if (isset($_GET['tipoIncidenciaId'])) {
            $tipoIncidenciaId = @$_GET['tipoIncidenciaId'];
        }

        $listaInspecciones = $_inspecciones->listaInspecciones(
            @$tipoIncidencia,
            @$gerencia,
            @$area,
            @$custodio,
            @$fechaFin,
            @$creador,
            @$sector,
            @$fechaInicio,
            @$complejo,
            @$estatus,
            @$fechaCreacion,
            @$aspectos);
        // prepara salida del ws
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($listaInspecciones);
        http_response_code(200);
    }

    if (isset($_GET['hallazgosOld']) &&
        (
            isset($_GET['incidencia_sector']) ||
            isset($_GET['incidencia_subsector']) ||
            isset($_GET['incidencia_complejo']) ||
            isset($_GET['incidencia_gerencia']) ||
            isset($_GET['incidencia_area'])
        )
    ) {
        if (isset($_GET['incidencia_sector'])) {
            $incidencia_sector = @$_GET['incidencia_sector'];
        }
        if (isset($_GET['incidencia_subsector'])) {
            $incidencia_subsector = @$_GET['incidencia_subsector'];
        }
        if (isset($_GET['incidencia_complejo'])) {
            $incidencia_complejo = @$_GET['incidencia_complejo'];
        }
        if (isset($_GET['incidencia_gerencia'])) {
            $incidencia_gerencia = @$_GET['incidencia_gerencia'];
        }
        if (isset($_GET['incidencia_area'])) {
            $incidencia_area = @$_GET['incidencia_area'];
        }
        // print("<pre>".print_r(($_GET),true)."</pre>"); die;

        $listaInspeccioneshallazgos = $_inspecciones->listaInspeccionesHallazgosOld(
            @$incidencia_sector,
            @$incidencia_subsector,
            @$incidencia_complejo,
            @$incidencia_gerencia,
            @$incidencia_area);

        if ($listaInspeccioneshallazgos) {
            // prepara salida del ws
            header('Content-Type: application/json;charset=utf-8');
            echo json_encode($listaInspeccioneshallazgos);
            http_response_code(200);
        }
    }
    if (isset($_GET['detalleIncidenciaId'])) {
        if (isset($_GET['detalleIncidenciaId'])) {
            $detalleIncidenciaId = @$_GET['detalleIncidenciaId'];
        }

        $datoDetalleIncidenciaId = $_inspecciones->detalleIncidenciaId(@$detalleIncidenciaId);

        if ($datoDetalleIncidenciaId) {
            // prepara salida del ws
            header('Content-Type: application/json;charset=utf-8');
            echo json_encode($datoDetalleIncidenciaId);
            http_response_code(200);
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {// POST CREATE insert

    $postBody = file_get_contents("php://input"); // para el plug in de chrome
    //$postBody = json_encode($_POST);

    $datosArray = $_inspecciones->postHeader($postBody);

    $incidentesHeaderId = 0;
    if ($datosArray['status'] == 'ok') {
        $incidentesHeaderId = $datosArray['result']['MSG'];
    }

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
    // recibimos los datos enviados
    $postBody = file_get_contents('php://input');
    // enviamos etso al navegados/
    $datosArray = $_empleados->put($postBody);

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
