<?php

require_once '../../../funciones/wsdl/clases/consumoApi.class.php';

function verificar($connBD, $centro, $complejo)
{
    $dateCreate = date('Y-m-d');
    $user = 'updateSap';
    $token = '';

    // WS EQUIPOS
    $parametros['centro'] = $centro;
    $parametros = json_encode($parametros);

    $URL = 'http://pqvmorsap03.pequiven.com:50000/RESTAdapter/Portal_SIAHO/GetEquiposCentroPM';
    $rsSector = API::POSTSAP($URL, $token, $parametros);
    $arraySector = API::JSON_TO_ARRAY($rsSector);
    $equipos = $arraySector;
    // echo '<pre>'.print_r($equipos['getEquiposCentroResp']['lista'], true).'</pre>';    exit;

    $cantidad = 0;
    if (isset($equipos['getEquiposCentroResp']['lista'])) {
        $cantidad = 0;
        foreach ($equipos['getEquiposCentroResp']['lista'] as $equipoDatos) {
            $query = "
            INSERT INTO dm_equipos (
                        complejoId,
                        localidad,
                        plantaId,
                        plantaIdSap,
                        EquipoCodSap,
                        nombre,
                        descripcion,
                        custorio,
                        Emplazamiento) 
                    VALUES (
                        '$complejo', 
                        '$centro',  
                        '1',
                        '".@$equipoDatos['Emplazamiento']."',
                        '".@$equipoDatos['equipo']."',
                        '".@$equipoDatos['descEquipo']."',
                        '".@$equipoDatos['descEquipo']."',
                        '-',
                        '".@$equipoDatos['Emplazamiento']."'
                        )";
            $result = $connBD->query($query);
            if ($result) {
                $cantidad = $cantidad + 1;
            }
        }
        echo 'Cantidad de Equipos '.$cantidad.' para el Centro: '.$centro.'</br>';
    } else {
        echo 'sin Equipos para el Centro: '.$centro.'</br>';
        // exit;
    }

    return $cantidad;
}

// set_time_limit(0);
set_time_limit(6000000);
ini_set('max_execution_time', 6000000);

$connBD = new mysqli('localhost', 'seip', 'adminsyaait', 'siaho_bd');

$connBD->query("SET NAMES 'utf8'");
if (!$connBD) {
    echo 'Error: No se pudo conectar a MySQL.'.PHP_EOL;
    exit;
}

$token = '';

// WS CENTROS
$parametros = '';
$token = '0';
$URL = 'http://'.$_SERVER['HTTP_HOST'].'/funciones/wsdl/estructura';
$rs = API::GET($URL, $token, $parametros);
$centros = API::JSON_TO_ARRAY($rs);

if ($centros) {
    $queryDelete = 'delete from dm_equipos';
    $del = $connBD->query($queryDelete);
}

if ($del) {
    foreach ($centros as $idCentroSap) {
        $verificaEquipo = verificar($connBD, @$idCentroSap['id_sap'], @$idCentroSap['id_complejo']);
    }

    // UPDATE IDPLANTAS
    $updateQuery = 'UPDATE  dm_equipos AS E, dm_planta AS P
    SET E.plantaId=P.plantaId
    WHERE
     E.plantaIdSap=P.plantaIdSAP';
    $resultUpdate = $connBD->query($updateQuery);
} else {
    echo 'No se llevo a cabo la actualizacion por favor verifique con el adminsitardor';
}
?>

<button onclick="window.history.back();">Volver atrás</button>