<?php
if (!isset($_SESSION)) {
    session_start();  }
require_once 'clases/respuestas.class.php';
require_once 'clases/evaluacionesho.class.php';
$_respuestas= new respuestas;
$_evaluacionesHO= new evaluacionesHO;
if($_SERVER['REQUEST_METHOD'] == "GET"){//Get READ
    if(isset($_GET['idEvaluacionHoHeader'])  ){
        $listaevaluacionesHO = $_evaluacionesHO->ListEvaluacionesHO($_GET['idEvaluacionHoHeader']);
       header('Content-Type: application/json;charset=utf-8');
       echo json_encode($listaevaluacionesHO);
       http_response_code(200);
   }
}elseif ($_SERVER['REQUEST_METHOD'] == "POST" ){
   //$postBody = file_get_contents("php://input"); // para el plug in de crome
    $postBody = json_encode($_POST);
    $datosArray = $_evaluacionesHO->postHeader($postBody);
    $incidentesHeaderId=0;
    if($datosArray['status']== 'ok'){
        $incidentesHeaderId=$datosArray['result']['MSG'];
    }
    header('Content-Type: application/json;charset=utf-8');
    if(isset($datosArray["result"]["error_id"])){
        $responseCode =  $datosArray["result"]["error_id"];
        http_response_code($responseCode);
        }else{
            http_response_code(200);
        }
        echo json_encode($datosArray);
}elseif($_SERVER['REQUEST_METHOD'] == "PUT" ) {//PUT  UPDATER
    $postBody = file_get_contents("php://input");
    $datosArray = $_empleados->put($postBody);
    header('Content-Type: application/json;charset=utf-8');
    if(isset($datosArray["result"]["error_id"])){
        $responseCode =  $datosArray["result"]["error_id"];
        http_response_code($responseCode);
        }else{
            http_response_code(200);
        }
        echo json_encode($datosArray);
}elseif($_SERVER['REQUEST_METHOD'] == "DELETE" ) {//DELETE
    $postBody = file_get_contents("php://input");
    $datosArray = $_empleados->delete($postBody);
    header('Content-Type: application/json;charset=utf-8');
    if(isset($datosArray["result"]["error_id"])){
        $responseCode =  $datosArray["result"]["error_id"];
        http_response_code($responseCode);
        }else{
            http_response_code(200);
        }
        echo json_encode($datosArray);
}else{
    header('Content-Type: application/json;charset=utf-8');
    $datosArray =$_respuestas->error_405();
    echo(json_encode($datosArray));
}
?>