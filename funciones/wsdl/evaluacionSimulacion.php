<?php
if (!isset($_SESSION)) {
    session_start();  }
//ARCHIVO BASE PARA LOS SERVICIOS
require_once 'clases/respuestas.class.php';
require_once 'clases/evaluacionSimulacion.class.php';

$_respuestas= new respuestas;
$_evaluacionSimulacion= new evaluacionSimulacion;

if($_SERVER['REQUEST_METHOD'] == "GET"){//Get READ

    if(     isset($_GET['precarga'])  ){
         $listaInspecciones = $_evaluacionSimulacion->precargaItems();

        //prepara salida del ws       
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($listaInspecciones);
        http_response_code(200);
    } elseif(   isset($_GET['idComplejo'])&&
                isset($_GET['idArea'])){
       
        $listaInspecciones = $_evaluacionSimulacion-> ListHeader($_GET['idComplejo'],$_GET['idArea']);

        //prepara salida del ws       
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($listaInspecciones);
        http_response_code(200);
    }

    // if(isset($_GET['Precarga']) )
    //         {
    //             $listaInspeccioneshallazgos = $_evaluacionSimulacion->Precarga(@$_GET['Precarga']);
        
    //             if($listaInspeccioneshallazgos){
    //                 //prepara salida del ws       
    //                 header('Content-Type: application/json;charset=utf-8');
    //                 echo json_encode($listaInspeccioneshallazgos);
    //                 http_response_code(200);
    //             }
                
    //         }
    if(isset($_GET['detalleIncidenciaId'])){  // no se ha tocado aun 
        if(isset($_GET['detalleIncidenciaId'])){
            $detalleIncidenciaId = @$_GET['detalleIncidenciaId'];
        } 

        $datoDetalleIncidenciaId = $_evaluacionSimulacion->detalleIncidenciaId(@$detalleIncidenciaId);

        if($datoDetalleIncidenciaId){
            //prepara salida del ws       
            header('Content-Type: application/json;charset=utf-8');
            echo json_encode($datoDetalleIncidenciaId);
            http_response_code(200);
        } 


    }
    

}elseif ($_SERVER['REQUEST_METHOD'] == "POST" ){
    
    //$postBody = file_get_contents("php://input"); // para el plug in de crome
    $postBody = json_encode($_POST);

   //mandamos a insertar la cabecera/
    $datosArray = $_evaluacionSimulacion->postHeader($postBody);
    
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
    http_response_code(200);
    echo json_encode(http_response_code(200));

}elseif($_SERVER['REQUEST_METHOD'] == "DELETE" ) {//DELETE
            http_response_code(200);
            echo json_encode(http_response_code(200));

}else{
    header('Content-Type: application/json;charset=utf-8');
    $datosArray =$_respuestas->error_405();
    echo(json_encode($datosArray));
}
?>