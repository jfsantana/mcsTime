<?php
if (!isset($_SESSION)) {
    session_start();  }
//ARCHIVO BASE PARA LOS SERVICIOS
require_once 'clases/respuestas.class.php';
require_once 'clases/evaluaciones.class.php';

$_respuestas= new respuestas;
$_inspecciones= new evaluaciones;

if($_SERVER['REQUEST_METHOD'] == "GET"){//Get READ

    if(     isset($_GET['tipoEvaluaciones'])  ){
         $listaInspecciones = $_inspecciones->listaEvaluaciones(
                                                @$_GET['tipoEvaluaciones']);

        //prepara salida del ws       
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($listaInspecciones);
        http_response_code(200);
    }

    if(isset($_GET['Precarga']) )
            {
                $listaInspeccioneshallazgos = $_inspecciones->Precarga(@$_GET['Precarga']);
        
                if($listaInspeccioneshallazgos){
                    //prepara salida del ws       
                    header('Content-Type: application/json;charset=utf-8');
                    echo json_encode($listaInspeccioneshallazgos);
                    http_response_code(200);
                }
                
            }
    if(isset($_GET['detalleIncidenciaId'])){
        if(isset($_GET['detalleIncidenciaId'])){
            $detalleIncidenciaId = @$_GET['detalleIncidenciaId'];
        } 

        $datoDetalleIncidenciaId = $_inspecciones->detalleIncidenciaId(@$detalleIncidenciaId);

        if($datoDetalleIncidenciaId){
            //prepara salida del ws       
            header('Content-Type: application/json;charset=utf-8');
            echo json_encode($datoDetalleIncidenciaId);
            http_response_code(200);
        } 


    }
    

}elseif ($_SERVER['REQUEST_METHOD'] == "POST" ){//POST CREATE insert

    //recibimos los datos enviados
    //$postBody = file_get_contents("php://input"); // para el plug in de crome
    $postBody = json_encode($_POST);

   //mandamos a insertar la cabecera/
    $datosArray = $_inspecciones->postHeader($postBody);
    //print_r($datosArray); die; 

    $incidentesHeaderId=0;
    if($datosArray['status']== 'ok'){
        //inserto la cabezera correctamente
        $incidentesHeaderId=$datosArray['result']['MSG'];
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