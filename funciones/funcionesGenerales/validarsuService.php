<?php

/***************llamado servicio */
require_once '../wsdl/clases/consumoApi.class.php';

// Valida el usuario y genera token valido

$token = '';
/*
$siaho = '001';
$salud = '002';
$laboral = '003';
$tecnico = '004';
$Estimacion = '005';
*/
$URL = 'http://'.$_SERVER['HTTP_HOST'].'/funciones/wsdl/auth';
$parametros = [
    'usuario' => $_POST['user'],
    'password' => $_POST['password'],
];

// $parametros = json_encode($parametros);
$rs = API::POST($URL, $token, $parametros);
$rs = API::JSON_TO_ARRAY($rs);

if (@$rs['result']['token']) {
    /* Ws  datos empleado */
    // var_dump('epale');die();
    $token = $rs['result']['token'];
    $URL = 'http://'.$_SERVER['HTTP_HOST'].'/funciones/wsdl/empleados?token='.$rs['result']['token'];
     //print_r(($URL)); die;
    $rs = API::GET($URL, $token);
    $array = API::JSON_TO_ARRAY($rs);
    $datosEmpleado = $array;
   // print_r(($datosEmpleado)); die;
    // echo "entre";exit;
    $_SESSION['usuario'] = $datosEmpleado[0]['log_usu'];
    $_SESSION['id_user'] = @$datosEmpleado[0]['id_usu'];
    $_SESSION['id_rol'] = @$datosEmpleado[0]['rol_usu'];
    $_SESSION['perfil'] = @$datosEmpleado[0]['des_rol'];
    $_SESSION['npe_usu'] = @$datosEmpleado[0]['npe_usu'];
    $_SESSION['are_usu'] = @$datosEmpleado[0]['are_usu'];
    $_SESSION['cor_usu'] = @$datosEmpleado[0]['cor_usu'];
    $_SESSION['id_complejo'] = @$datosEmpleado[0]['com_usu'];
    $_SESSION['siglas_complejo'] = @$datosEmpleado[0]['siglas_complejo'];
    $_SESSION['nombre_complejo'] = @$datosEmpleado[0]['nombre_complejo'];
    $_SESSION['token'] = $token;
    $_SESSION['codComplejoSap'] = @$datosEmpleado[0]['id_sap'];
    $_SESSION['nombre'] = @$datosEmpleado[0]['nom_usu'].', '.@$datosEmpleado[0]['ape_usu'];

    if (($datosEmpleado[0]['rol_usu'] == '60') || ($datosEmpleado[0]['rol_usu'] == '65')) { // Salud 002
        $_SESSION['Cod_Area'] = '002';
        $_SESSION['denArea'] = 'SALUD';
    } elseif (($datosEmpleado[0]['rol_usu'] == '70') || ($datosEmpleado[0]['rol_usu'] == '75')) { // laboral
        $_SESSION['Cod_Area'] = '003';
        $_SESSION['denArea'] = 'LABORAL';
    } elseif (($datosEmpleado[0]['rol_usu'] == '80') || ($datosEmpleado[0]['rol_usu'] == '85')) { // Tecnico
        $_SESSION['Cod_Area'] = '004';
        $_SESSION['denArea'] = 'TECNICA';
    } elseif (($datosEmpleado[0]['rol_usu'] == '90') || ($datosEmpleado[0]['rol_usu'] == '95')) { // Etsimacion
        $_SESSION['Cod_Area'] = '000';
        $_SESSION['denArea'] = 'ESTIMACION';
    } else {
        $_SESSION['Cod_Area'] = '001';
        $_SESSION['denArea'] = 'SIAHO';
    }

    $activo = 'A';
    $id_user = $_SESSION['id_user'];
    $nombre = $_SESSION['nombre'];
    $id_rol = $_SESSION['id_rol'];
    $ced_usu = $_SESSION['npe_usu'];
    $are_usu = $_SESSION['are_usu'];
    $com_usu = $_SESSION['id_complejo'];
    $siglas_complejo = $_SESSION['siglas_complejo'];
    $sal_usu = $_SESSION['sal_usu'];

    // echo "entre";exit;
    $_SESSION['usuario'] = $datosEmpleado[0]['log_usu'];
    $_SESSION['id_user'] = $datosEmpleado[0]['id_usu'];
    $_SESSION['id_rol'] = $datosEmpleado[0]['rol_usu'];
    $_SESSION['perfil'] = $datosEmpleado[0]['des_rol'];
    $_SESSION['npe_usu'] = $datosEmpleado[0]['npe_usu'];
    $_SESSION['are_usu'] = $datosEmpleado[0]['are_usu'];
    $_SESSION['cor_usu'] = $datosEmpleado[0]['cor_usu'];
    $_SESSION['id_complejo'] = $datosEmpleado[0]['com_usu'];
    $_SESSION['siglas_complejo'] = $datosEmpleado[0]['siglas_complejo'];
    $_SESSION['nombre_complejo'] = $datosEmpleado[0]['nombre_complejo'];
    $_SESSION['token'] = $token;
    $_SESSION['nombre'] = $datosEmpleado[0]['nom_usu'].', '.$datosEmpleado[0]['ape_usu'];
    $activo = 'A';
    $id_user = $_SESSION['id_user'];
    $nombre = $_SESSION['nombre'];
    $id_rol = $_SESSION['id_rol'];
    $ced_usu = $_SESSION['npe_usu'];
    $are_usu = $_SESSION['are_usu'];
    $cor_usu = $_SESSION['cor_usu'];
    $com_usu = $_SESSION['id_complejo'];
    $siglas_complejo = $_SESSION['siglas_complejo'];
    $sal_usu = $_SESSION['sal_usu'];

    header('Location:../../dashboard.php');
    exit;
} else {
    header("Location:../../index.php?mensaje=DISCULPE, Sr. '.$usr.', USTED NO ESTA AUTORIZADO");
    exit;
}
