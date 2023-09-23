<?php
//ARCHIVO BASE PARA LOS SERVICIOS
require_once 'clases/respuestas.class.php';
require_once 'clases/sector.class.php';

$_respuestas= new respuestas;
$_sector= new sector;


if($_SERVER['REQUEST_METHOD'] == "GET"){//Get READs LISTO.....
    if (!isset($_GET['sectorid'])) {
      
        $datosSector = $_sector->listaSector();
        //prepara salida del ws 
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($datosSector);
        http_response_code(200);
    }elseif(isset($_GET['sectorid'])) {
        $sector=$_GET['sectorid'];
        $datosSubSector = $_sector->listaSubSector($sector);
        //prepara salida del ws 
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($datosSubSector);
        http_response_code(200);
    }

}elseif ($_SERVER['REQUEST_METHOD'] == "POST" ){//POST CREATE
   //recibimos los datos enviados
    $postBody = file_get_contents("php://input");
   //enviamos etso al navegados/
    $datosArray = $_empleados->post($postBody);

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