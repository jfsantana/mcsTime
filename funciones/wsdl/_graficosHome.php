<?php
if (!isset($_SESSION)) {
    session_start();  }
//ARCHIVO BASE PARA LOS SERVICIOS
require_once 'clases/respuestas.class.php';
require_once 'clases/graficosHome.class.php';

$_respuestas= new respuestas;
$_inspecciones= new graficosHome;

if($_SERVER['REQUEST_METHOD'] == "GET"){//Get READ

    if(     isset($_GET['recomendacionesXComplejo'])  ){
         $listaInspecciones = $_inspecciones->recomendacionesXComplejo();

        //prepara salida del ws       
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($listaInspecciones);
        http_response_code(200);
    }

    if( isset($_GET['simulacionesXComplejo']) ){
        
        $listaInspecciones = $_inspecciones->simulacionesXComplejo();

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
    http_response_code(200);
    echo json_encode(http_response_code(200));

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