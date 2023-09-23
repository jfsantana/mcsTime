<?php

require 'funciones/wsdl/clases/consumoApi.class.php';

$date = date('Y-m-d');

// WS datos empleado
$token = $_SESSION['token'];
$URL = "http://localhost/siaho/funciones/wsdl/empleados?token=$token";
$rs = API::GET($URL, $token);
$arrayPersonal = API::JSON_TO_ARRAY($rs);
$user = $arrayPersonal;
$Complejo_id = @$user[0]['com_usu'];
//print_r($token);die;
/* Ws  datos complejo Nombre por Usuario Logueado */
$token = $_SESSION['token'];
$URL = "http://localhost/siaho/funciones/wsdl/estructura?complejoid=$Complejo_id";
$rs = API::GET($URL, $token);
$arraycomplejoUsuario = API::JSON_TO_ARRAY($rs);
$complejo = $arraycomplejoUsuario;
// $Complejo_nombre=@$complejo[0]['nombre_complejo'];

// print("<pre>".print_r(($complejo),true)."</pre>"); die;

/* Ws  datos Lista de TODOS los Complejos */
$token = $_SESSION['token'];
$URL = 'http://localhost/siaho/funciones/wsdl/estructura';
$rs = API::GET($URL, $token);
$arrayComplejos = API::JSON_TO_ARRAY($rs);
$complejos = $arrayComplejos;

/* Ws  datos de Todas las Gerencias del Complejo al que pertenece el Usuario */
$token = $_SESSION['token'];
$URL = "http://localhost/siaho/funciones/wsdl/estructura?complejoid=$Complejo_id&tipo=gerencia";
$rs = API::GET($URL, $token);
$arrayGerencias = API::JSON_TO_ARRAY($rs);
$gerencias = $arrayGerencias;

if (@$bandera == 2) {
    $token = $_SESSION['token'];
    $URL = 'http://localhost/siaho/funciones/wsdl/inspecciones?tipoIncidencia=3';
    $rs = API::GET($URL, $token);
    $inspecciones = API::JSON_TO_ARRAY($rs);
    // print("******<pre>".print_r($inspecciones[0],true)); die;

    $URL = 'http://localhost/siaho/funciones/wsdl/inspecciones?detalleIncidenciaId=208';
    $rs = API::GET($URL, $token);
    $detalleInspecciones = API::JSON_TO_ARRAY($rs);
    // print("******<pre>".print_r($detalleInspecciones,true));
}
