<?php
if (!isset($_SESSION)) {
    session_start();  }
//ARCHIVO BASE PARA LOS SERVICIOS
require_once 'clases/respuestas.class.php';
require_once 'clases/materialesPeligrosos.class.php';

$_respuestas= new respuestas;
$_inspeccionesHO= new mp; //MP materialesPeñligrosos

if($_SERVER['REQUEST_METHOD'] == "GET"){//Get READ

    if(     isset($_GET['allheadMP'])||
            isset($_GET['registro_fecha'])||
            isset($_GET['complejo_id'])||
            isset($_GET['MPreg_gerencia'])||
            isset($_GET['MPreg_area']) ||
            isset($_GET['inspeccionHO_custodio'])
            ){
         $listaInspeccionesHO = $_inspeccionesHO->ListaHeaderMP(@$_GET['registro_fecha'],@$_GET['complejo_id'],@$_GET['MPreg_gerencia'],@$_GET['MPreg_area'],@$_GET['inspeccionHO_custodio']);
        //prepara salida del ws       
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($listaInspeccionesHO);
        http_response_code(200);
    }

    if( isset($_GET['headerMPId'])){
        $listaInspeccionesHO = $_inspeccionesHO->ListaMaterialesHeader(@$_GET['headerMPId']);
        //prepara salida del ws       
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($listaInspeccionesHO);
        http_response_code(200);
    }

    if( isset($_GET['MPCod'])||
        isset($_GET['MPname'])){
        $listaInspeccionesHO = $_inspeccionesHO->mpDetail(@$_GET['MPCod'],@$_GET['MPname']);
        //prepara salida del ws       
        //header('Content-Type: application/json;charset=utf-8');
        header("Content-Type: application/json;charset=utf-8");
        echo json_encode($listaInspeccionesHO);
        http_response_code(200);
    }

    if( isset($_GET['totales'])||
        isset($_GET['tot_fecha'])||
        isset($_GET['tot_complejo_id'])||
        isset($_GET['tot_gerenciaId'])||
        isset($_GET['tot_areaId'])||
        isset($_GET['tot_custorioID'])
        
    ){
        $listaInspeccionesHO = $_inspeccionesHO->indMPTotales(@$_GET['tot_fecha'],@$_GET['tot_complejo_id'],@$_GET['tot_gerenciaId'],@$_GET['tot_areaId'],@$_GET['tot_custorioID']);
        //prepara salida del ws       
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($listaInspeccionesHO);
        http_response_code(200);
    }

}elseif ($_SERVER['REQUEST_METHOD'] == "POST" ){//POST CREATE insert
    //print_r($_POST);die;
    //recibimos los datos enviados
    //$postBody = file_get_contents("php://input"); // para el plug in de crome
    $postBody = json_encode($_POST);
    //print_r($postBody);
    $datosArray = $_inspeccionesHO->postHeader($postBody);
     //print_r($datosArray);die;
    $incidentesHeaderId=0;
    if($datosArray['status']== 'ok'){
        $incidentesHeaderId=$datosArray['result']['error_msg'];
    }

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
    //enviamos etso al navegados/
    $datosArray = $_empleados->put($postBody);

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
?>