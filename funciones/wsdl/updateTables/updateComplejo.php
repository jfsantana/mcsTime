<?php

require_once '../../../funciones/wsdl/clases/consumoApi.class.php';

function verificar($connBD, $centro, $nombre, $direccion)
{
    $dateCreate = date('Y-m-d');
    $user = 'updateSap';
    $query = "select * from  dm_complejo where id_sap='$centro'";  // dm_complejo
    $result = $connBD->query($query);

    switch (substr($centro, 0, 1)) {
        case 'D':
            $dato_extra = 'CEN';
            break;
        case 'A':
            $dato_extra = 'CEN';
            break;
        case 'B':
            $dato_extra = 'OCC';
            break;
        case 'C':
            $dato_extra = 'ORI';
            break;
    }

    $numRow = $connBD->affected_rows;

    if ($numRow) {
        $query = "UPDATE dm_complejo
                    SET
                    nombre_complejo='$nombre',
                    ciudad_reporte='$direccion',
                    ciudad_origen='$direccion',
                    fecha_mod='$dateCreate',
                    user_mod='$user',
                    dato_extra='".@$dato_extra."'
                     where id_sap='$centro'";

                     $result = $connBD->query($query);

        return $connBD->affected_rows;
    } else {
        $query = "
        INSERT INTO dm_complejo (
                    siglas_complejo, 
                    id_sap,
                    nombre_complejo,
                    ciudad_reporte,
                    ciudad_origen,
                    fecha_crea,
                    user_crea,
                    dato_extra) 
                VALUES (
                    '$centro', 
                    '$centro', 
                    '$nombre',
                    '$direccion', 
                    '$direccion', 
                    '$dateCreate',
                    '$user',
                    '".@$dato_extra."'
                    )";
        $result = $connBD->query($query);

        return $connBD->affected_rows;
    }
}

// set_time_limit(0);
set_time_limit(6000000);
ini_set('max_execution_time', 6000000);

$connBD = new mysqli('localhost', 'root', 'R12345', 'siaho_bd');

$connBD->query("SET NAMES 'utf8'");
if (!$connBD) {
    echo 'Error: No se pudo conectar a MySQL.'.PHP_EOL;
    exit;
}

$token = '';

// WS Centro
$parametros['listaCentros'] = 'X';
$parametros = json_encode($parametros);
$URL = 'http://pqvmorsap03.pequiven.com:50000/RESTAdapter/Portal_PP/GetCentros_T001W';
$rsSector = API::POSTSAP($URL, $token, $parametros);
$arraySector = API::JSON_TO_ARRAY($rsSector);
$sector = $arraySector;

 //echo '<pre>'.print_r($sector, true).'</pre>';

$count = 0;
$counterror = 0;
foreach ($sector['getCentros_t001wResp']['Centros'] as $complejos) {
    $verificaCentro = verificar($connBD, @$complejos['centro'], @$complejos['nombre'], @$complejos['direccion']);

    if ($verificaCentro > 0) {
        $count = $count + 1;
    } else {
        $counterror = $counterror + 1;
    }
}
$result['status'] = 'ok';
$result['insert'] = $count;
$result['update'] = $counterror;

echo json_encode($result);
