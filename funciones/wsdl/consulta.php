<?php
//ARCHIVO BASE PARA LOS SERVICIOS
require_once 'clases/respuestas.class.php';
require_once 'clases/consulta.class.php';

$_respuestas= new respuestas;
$_consulta= new consulta;

if($_SERVER['REQUEST_METHOD'] == "GET"){//Get READ
    if(isset($_GET['tabla']) && isset($_GET['where'])){
        $tabla = $_GET['tabla'];
        $where = $_GET['where'];
        $listaTabla = $_consulta->consultaSimple($tabla,$where);
        //prepara salida del ws       
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($listaTabla);
        http_response_code(200);
    }elseif(    isset($_GET['idSap']) && 
                isset($_GET['idSap']) && 
                isset($_GET['tableUpdate']) && 
                isset($_GET['campo'])
            ){
        $idSap = $_GET['idSap'];
        $incidenciaHeaderId = $_GET['incidenciaHeaderId'];
        $tableUpdate= $_GET['tableUpdate'];
        $campo= $_GET['campo'];
        
        $listaTabla = $_consulta->UpdateSimple($tableUpdate,$campo,$idSap,$incidenciaHeaderId );
        
        //prepara salida del ws       
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($listaTabla);
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