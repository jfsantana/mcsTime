<?php
//ARCHIVO BASE PARA LOS SERVICIOS
require_once 'clases/respuestas.class.php';
require_once 'clases/solped.class.php';

$_respuestas= new respuestas;
$_r24h= new solped;

//echo(json_encode($_SERVER['REQUEST_METHOD']));   die;

if($_SERVER['REQUEST_METHOD'] == "GET"){//Get READ
  
   //GET PARA LA PRECARGA VARIABLE  preCargaComplejo_id2
    if  (
            @$_GET['preguntas']=='true'&&
            isset($_GET['codArea'])
        ){  
        $codArea = $_GET['codArea'];
        $listaPrecarga = $_r24h->precargaPreguntas($codArea);
        //prepara salida del ws       
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($listaPrecarga);
        http_response_code(200);
    }

    //GET PARA OBTENER LAS CABECERAS DE LOS REPORTES fecha, centro, gerencia, status
    elseif(
            @$_GET['listado']=='true'||
            (
                isset($_GET['solpedSAP'])|| //origen Cabecera solped
                isset($_GET['fechaSolped'])|| //origen Cabecera solped
                isset($_GET['centroSolped'])|| //origen Cabecera solped
                isset($_GET['unidadSolicitanteSolped'])|| //origen Cabecera solped
                isset($_GET['estatusResp'])  //este campo esta en las respuestas
            )
          ){
                
                $solpedSAP = @$_GET['solpedSAP'];
                $fechaSolped = @$_GET['fechaSolped'];
                $centroSolped = @$_GET['centroSolped'];
                $unidadSolicitanteSolped = @$_GET['unidadSolicitanteSolped'];
                $estatusResp = @$_GET['estatusResp'];

               // print("<pre>".print_r(($_GET),true)."</pre>"); die;

                $listaPrecarga = $_r24h->consultaSolped(@$fechaSolped,@$centroSolped,@$unidadSolicitanteSolped,@$estatusResp,@$solpedSAP);
                //prepara salida del ws       
                header('Content-Type: application/json;charset=utf-8');
                echo json_encode($listaPrecarga);
                http_response_code(200);
            }

    //GET PARA OBTENER LAS CABECERAS DE LOS REPORTES 
            elseif(
                @$_GET['CodArea']=='true'&&
                isset($_GET['codAreaSolped']) //origen Cabecera solped    

            ){
                $codAreaSolped = $_GET['codAreaSolped'];
                
                $listaPrecarga = $_r24h->GetCodArea($codAreaSolped);
                //prepara salida del ws       
                header('Content-Type: application/json;charset=utf-8');
                echo json_encode($listaPrecarga);
                http_response_code(200);
            }
            
            elseif( 
                @$_GET['respuestas']=='true'&&
                isset($_GET['solpedSap'])&&
                isset($_GET['codArea'])
                ) //origen Cabecera solped
            {
                $solpedSap = $_GET['solpedSap'];
                $codArea = $_GET['codArea'];
                $listaPrecarga = $_r24h->GetRespuetas($solpedSap,$codArea);
                 //prepara salida del ws       
                 header('Content-Type: application/json;charset=utf-8');
                 echo json_encode($listaPrecarga);
                 http_response_code(200);

            }
        
            elseif(@$_GET['respuestas']=='true'&&
                isset($_GET['codArea']))
                {
                    
                    $codArea = $_GET['codArea'];
                    $updarePretunta = $_r24h->updatePreguntas($codArea);
                     //prepara salida del ws       
                     header('Content-Type: application/json;charset=utf-8');
                     echo json_encode($updarePretunta);
                     http_response_code(200);
            }

            elseif(
                    @$_GET['preguntas']=='descripcion'&&
                    isset($_GET['codArea'])&&
                    isset($_GET['ordenQuery'])
                )
                {
                    
                    $codArea = $_GET['codArea'];
                    $ordenQuery = $_GET['ordenQuery'];
                    $updarePretunta = $_r24h->descripcionPreguntas($codArea,$ordenQuery);
                     //prepara salida del ws       
                     header('Content-Type: application/json;charset=utf-8');
                     echo json_encode($updarePretunta);
                     http_response_code(200);
            }
            elseif(
                @$_GET['email']=='true'&&
                isset($_GET['codArea'])&&
                isset($_GET['solped'])
            )
            {
                
                $codArea = $_GET['codArea'];
                $solped = $_GET['solped'];
                $updarePretunta = $_r24h->envioNotificacionCorreo($codArea,$solped);
                 //prepara salida del ws       
                 header('Content-Type: application/json;charset=utf-8');
                 echo json_encode($updarePretunta);
                 http_response_code(200);
        }

 


}elseif ($_SERVER['REQUEST_METHOD'] == "POST" ){//POST INSERT


   //recibimos los datos enviados
        //$postBody = file_get_contents("php://input"); // para el plug in de crome
        $postBody = json_encode($_POST);

        $datosArray = $_r24h->insertarRespuestas($postBody);

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
    /********************$datosArray = $_empleados->put($postBody);*/

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
    /*****************************$datosArray = $_empleados->delete($postBody);*/

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