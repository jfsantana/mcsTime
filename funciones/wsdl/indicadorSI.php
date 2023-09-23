<?php
//ARCHIVO BASE PARA LOS SERVICIOS
require_once 'clases/respuestas.class.php';
require_once 'clases/indicadorSI.class.php';

$_respuestas= new respuestas;
$_indicadores= new indicadorSI;


if($_SERVER['REQUEST_METHOD'] == "GET"){//Get READs LISTO...ddd..
    if (
        isset($_GET['idComplejo'])||
        isset($_GET['fecha'])
        ) {
        $idComplejo=$_GET['idComplejo'];
        $fecha=$_GET['fecha'];
        $datosSector = $_indicadores->listaIndicadorSI($idComplejo, $fecha);
        //prepara salida del ws 
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($datosSector);
        http_response_code(200);
    }

}elseif ($_SERVER['REQUEST_METHOD'] == "POST" ){
   
    //$postBody = file_get_contents("php://input"); // para el plug in de chrome
    $postBody = json_encode($_POST);
    //print_r($postBody);die;
    
    $datosArray = $_indicadores->post($postBody);
    //print_r($_indicadores);die;
   //Devolvemos la respuesta
    header('Content-Type: application/json;charset=utf-8');
    if(isset($datosArray["result"]["error_id"])){
        $responseCode =  $datosArray["result"]["error_id"];
        http_response_code($responseCode);
        }else{
            http_response_code(200);
        }

        echo json_encode($datosArray);

}elseif($_SERVER['REQUEST_METHOD'] == "PUT" ) {//PUT  UPDATER
    
    //recibimos los datos enviados
    $postBody = file_get_contents("php://input");
    //print_r($postBody);die;
    //enviamos esto al navegados/
    $datosArray = $_empleados->put($postBody);
    //print_r($datosArray);die;
    //Devolvemos la respuesta
    header('Content-Type: application/json;charset=utf-8');
    if(isset($datosArray["result"]["error_id"])){
        $responseCode =  $datosArray["result"]["error_id"];
        http_response_code($responseCode);
        }else{
            http_response_code(200);
        }
        echo json_encode($datosArray);

}elseif($_SERVER['REQUEST_METHOD'] == "DELETE" ) {//DELETE
    //recibimos los datos enviados
    $postBody = file_get_contents("php://input");
    //enviamos etso al navegados/
    $datosArray = $_empleados->delete($postBody);
    //print_r($datosArray);die;
    //Devolvemos la respuesta
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
