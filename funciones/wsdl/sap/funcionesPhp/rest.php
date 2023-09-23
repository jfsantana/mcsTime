<?php
/* REST
PM: AVISOS - NOTIFICACIONES => pman
PM: ORDENES => pmod
*/
if (file_exists( "vendor/autoload.php" ) ) {
  require_once ( "vendor/autoload.php" );
}


use \GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Message;
use GuzzleHttp\Exception\ClientException;

/* Parametros para el Request */
$HEADERS = [
  'Authorization' => 'Basic UElVU0VSV1MwMTpQZXF1aXZlbjIxKg==',
  'Content-Type' => 'application/json',
  'Cookie' => 'saplb_*=(J2EE8042120)8042150'
];
/* */
$pman_number = isset($_REQUEST['pman_number']) ? $_REQUEST['pman_number'] : '100021216';
$aviNot = obtenerAvisosNotificaciones($pman_number, $HEADERS);
$aviNot = json_decode(json_encode($aviNot), true);

$pmod_number = isset($_REQUEST['pmod_number']) ? $_REQUEST['pmod_number'] : '3000013700';
$orden = obtenerOrdenes($pmod_number, $HEADERS);
$orden = json_decode(json_encode($orden), true);

$bodyLista = "X";
$lista_centros = obtenerListaCentros($bodyLista, $HEADERS);
$lista_centros = json_decode(json_encode($lista_centros), true);

$codArea = isset($_REQUEST['codArea']) ? $_REQUEST['codArea'] : '001';
$registrosCuestionario = obtenerRegistrosCuestionario($codArea, $HEADERS);
$registrosCuestionario = json_decode(json_encode($registrosCuestionario), true);

var_dump($registrosCuestionario);


/******  Variables de Parametros Obtener Registros******/

list($codAreaInic ,$codAreaFin ,$banfnInic, $banfnFin ,$nroAlcInic ,$nroAlcFin ,$fechaInic ,$fechaFin) = array(
  isset($_REQUEST['codAreaInic']) ? $_REQUEST['codAreaInic'] : '001' ,
  isset($_REQUEST['codAreaFin']) ? $_REQUEST['codAreaFin'] : '', 
  isset($_REQUEST['banfnInic']) ? $_REQUEST['banfnInic'] : '', 
  isset($_REQUEST['banfnFin']) ? $_REQUEST['banfnFin'] : '', 
  isset($_REQUEST['nroAlcInic']) ? $_REQUEST['nroAlcInic'] : '', 
  isset($_REQUEST['nroAlcFin']) ? $_REQUEST['nroAlcFin'] : '', 
  isset($_REQUEST['fechaInic']) ? $_REQUEST['fechaInic'] : '2022-01-01', 
  isset($_REQUEST['fechaFin']) ? $_REQUEST['fechaFin'] : '2022-12-31', 
  );

$vars = array($codAreaInic ,$codAreaFin ,$banfnInic, $banfnFin ,$nroAlcInic ,$nroAlcFin ,$fechaInic ,$fechaFin);

$registros = obtenerRegistros($vars, $HEADERS);
$registros = json_decode(json_encode($registros), true);

/******  Variables de Parametros Acutalizar records control ******/
/* Variable de update */

list($codArea ,$denArea ,$nroCtrlAlcan, $banfn ,$ernam ,$evaluador ,$fechaValidacion ,$estatusValidacion) = array(
  isset($_REQUEST['codArea']) ? $_REQUEST['codArea'] : '001' ,
  isset($_REQUEST['denArea']) ? $_REQUEST['denArea'] : 'LABORAL', 
  isset($_REQUEST['nroCtrlAlcan']) ? $_REQUEST['nroCtrlAlcan'] : 'CLALC_0100003047', 
  isset($_REQUEST['banfn']) ? $_REQUEST['banfn'] : '0100003047', 
  isset($_REQUEST['ernam']) ? $_REQUEST['ernam'] : 'POUSER', 
  isset($_REQUEST['evaluador']) ? $_REQUEST['evaluador'] : 'EVAL_WEB', 
  isset($_REQUEST['fechaValidacion']) ? $_REQUEST['fechaValidacion'] : '2022-11-02', 
  isset($_REQUEST['estatusValidacion']) ? $_REQUEST['estatusValidacion'] : 'NO TRATADO', 
  );

/* Variable de Respuesta */

list($quest01 ,$quest02 ,$quest03, $quest04 ,$quest05 ,$quest06 ,$quest07 ,$quest08, $quest09, $quest10, $observ01 ,$observ02 ,$observ03, $observ04 ,$observ05 ,$observ06 ,$observ07 ,$observ08, $observ09, $observ10) = array(
  isset($_REQUEST['quest01']) ? $_REQUEST['quest01'] : 'AP' ,
  isset($_REQUEST['quest02']) ? $_REQUEST['quest02'] : 'AP', 
  isset($_REQUEST['quest03']) ? $_REQUEST['quest03'] : 'AP', 
  isset($_REQUEST['quest04']) ? $_REQUEST['quest04'] : 'AP', 
  isset($_REQUEST['quest05']) ? $_REQUEST['quest05'] : 'AP', 
  isset($_REQUEST['quest06']) ? $_REQUEST['quest06'] : 'NA', 
  isset($_REQUEST['quest07']) ? $_REQUEST['quest07'] : 'AP', 
  isset($_REQUEST['quest08']) ? $_REQUEST['quest08'] : 'AP', 
  isset($_REQUEST['quest09']) ? $_REQUEST['quest09'] : 'AP', 
  isset($_REQUEST['quest10']) ? $_REQUEST['quest10'] : 'RZ', 
  isset($_REQUEST['observ01']) ? $_REQUEST['observ01'] : '01_o' ,
  isset($_REQUEST['observ02']) ? $_REQUEST['observ02'] : '02_o', 
  isset($_REQUEST['observ03']) ? $_REQUEST['observ03'] : '03_o', 
  isset($_REQUEST['observ04']) ? $_REQUEST['observ04'] : '', 
  isset($_REQUEST['observ05']) ? $_REQUEST['observ05'] : '', 
  isset($_REQUEST['observ06']) ? $_REQUEST['observ06'] : '', 
  isset($_REQUEST['observ07']) ? $_REQUEST['observ07'] : '', 
  isset($_REQUEST['observ08']) ? $_REQUEST['observ08'] : '', 
  isset($_REQUEST['observ09']) ? $_REQUEST['observ09'] : '', 
  isset($_REQUEST['observ10']) ? $_REQUEST['observ10'] : '', 
  );

$varsUpdateReg = array($codArea ,$denArea ,$nroCtrlAlcan, $banfn ,$ernam ,$evaluador ,$fechaValidacion ,$estatusValidacion);
$varRespuestas = array($quest01 ,$quest02 ,$quest03, $quest04 ,$quest05 ,$quest06 ,$quest07 ,$quest08, $quest09, $quest10, $observ01 ,$observ02 ,$observ03, $observ04 ,$observ05 ,$observ06 ,$observ07 ,$observ08, $observ09, $observ10);

$responseJson = updateRecordControl($varsUpdateReg, $varRespuestas, $HEADERS); 
echo $responseJson;

//var_dump($aviNot);
echo '<br><br><br>';
//var_dump($orden);
echo '<br><br><br>';
//var_dump($lista_centros);
echo '<br><br><br>';
//

function obtenerAvisosNotificaciones($pman_number, $headers){
		//error_reporting(0); 
    $client = new Client();
    $parts = array("number" => $pman_number);
    $bodyArray = $parts;
    $ruta = 'http://pqvmorsap03.pequiven.com:50000/RESTAdapter/Portal_SIAHO/GetNotificacionesPM';
    $request = new Request('GET', $ruta, $headers, json_encode($bodyArray));
    try {
      $res = $client->sendAsync($request)->wait();
      if ($res->getStatusCode() == 200) {
        return json_decode($res->getBody()->getContents());
      }
    } catch (ClientException $e) {
      // echo GuzzleHttp\Psr7\Message::toString($e->getRequest());
      // echo $e->getResponse()->getStatusCode();
      echo Message::toString($e->getResponse()); 
    }
}

function obtenerOrdenes($pmod_number, $headers){
    //error_reporting(0);
    $client = new Client();
    $parts = array("number" => $pmod_number);
    $bodyArray = $parts;
    $ruta = 'http://pqvmorsap03.pequiven.com:50000/RESTAdapter/Portal_SIAHO/GetOrdenesPM';
    $request = new Request('GET', $ruta, $headers, json_encode($bodyArray));
    try {
        $res = $client->sendAsync($request)->wait();
        if ($res->getStatusCode() == 200) {
            return json_decode($res->getBody()->getContents());
        }
    } catch (ClientException $e) {
        // echo GuzzleHttp\Psr7\Message::toString($e->getRequest());
        // echo $e->getResponse()->getStatusCode();
        echo Message::toString($e->getResponse()); 
    }
}

function obtenerListaCentros($lista_centros, $headers){
  $client = new Client();
  $parts = array("listaCentros" => $lista_centros);
  $bodyArray = $parts;
  $ruta = 'http://pqvmorsap03.pequiven.com:50000/RESTAdapter/Portal_PP/GetCentros_T001W';
  $request = new Request('GET', $ruta, $headers, json_encode($bodyArray));
  try{
    $res = $client->sendAsync($request)->wait();
    if ($res->getStatusCode() == 200) {
      return json_decode($res->getBody()->getContents());
    }
  }catch (ClientException $e) {
    echo Message::toString($e->getResponse()); 
  }
}

function obtenerRegistrosCuestionario($codArea, $headers){
  $client = new Client();
  $parts = array("codArea" => $codArea);
  $bodyArray = $parts;
  $ruta = 'http://pqvmorsap03.pequiven.com:50000/RESTAdapter/Portal_SIAHO/getRecordsQuestTabReqMM';
  $request = new Request('GET', $ruta, $headers, json_encode($bodyArray));
  try{
    $res = $client->sendAsync($request)->wait();
    if ($res->getStatusCode() == 200) {
      return json_decode($res->getBody()->getContents());
    }
  }catch (ClientException $e) {
    echo Message::toString($e->getResponse()); 
  }
}

function obtenerRegistros($vars, $headers){
  $client = new Client();
  $parts = array("rangCodArea" => array("codAreaInic" => $vars[0], "codAreaFin" => $vars[1]), "rangSolp" => array("banfnInic" => $vars[2], "banfnFin" => $vars[3]), "rangNroAlc" => array("nroAlcInic" => $vars[4], "nroAlcFin" => $vars[5]), "rangFechas" => array("fechaInic" => $vars[6], "fechaFin" => $vars[7]));
  $bodyArray = json_encode($parts);
  $ruta = 'http://pqvmorsap03.pequiven.com:50000/RESTAdapter/Portal_SIAHO/getRecordControlTabReqMM';
  $request = new Request('GET', $ruta , $headers, $bodyArray);
  try{
    $res = $client->sendAsync($request)->wait();
    if ($res->getStatusCode() == 200) {
      return json_decode($res->getBody()->getContents());
    }
  }catch (ClientException $e) {
    echo Message::toString($e->getResponse()); 
  }

}

function updateRecordControl($varsUpdateReg, $varRespuestas, $headers){
  $client = new Client();
  $parts = array("updateReg" => array("codArea" => $varsUpdateReg[0], "denArea" => $varsUpdateReg[1], "nroCtrlAlcan" => $varsUpdateReg[2], "banfn" => $varsUpdateReg[3], "ernam" => $varsUpdateReg[4], "evaluador" => $varsUpdateReg[5], "fechaValidacion" => $varsUpdateReg[6], "estatusValidacion" => $varsUpdateReg[7]),"Respuestas" => array("item" => array("quest01" => $varRespuestas[0], "quest02" => $varRespuestas[1], "quest03" => $varRespuestas[2], "quest04" => $varRespuestas[3], "quest05" => $varRespuestas[4], "quest06" => $varRespuestas[5], "quest07" => $varRespuestas[6], "quest08" => $varRespuestas[7], "quest09" => $varRespuestas[8], "quest10" => $varRespuestas[9], "observ01" => $varRespuestas[10], "observ02" => $varRespuestas[11], "observ03" => $varRespuestas[12], "observ04" => $varRespuestas[13], "observ05" => $varRespuestas[14], "observ06" => $varRespuestas[15], "observ07" => $varRespuestas[16], "observ08" => $varRespuestas[17], "observ09" => $varRespuestas[18], "observ10" => $varRespuestas[19] )));
  $bodyArray = json_encode($parts);
  $ruta = "http://pqvmorsap03.pequiven.com:50000/RESTAdapter/Portal_SIAHO/updateRecordControlTabReqMM";
  $request = new Request('POST', $ruta , $headers, $bodyArray);
  try{
    $res = $client->sendAsync($request)->wait();
    if ($res->getStatusCode() == 200) {
      echo $res->getBody();
    }
  }catch (ClientException $e) {
    echo Message::toString($e->getResponse()); 
  }
}