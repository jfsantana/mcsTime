<?php
//ARCHIVO BASE PARA LOS SERVICIOS
require_once 'clases/respuestas.class.php';
require_once 'clases/r24h.class.php';

$_respuestas= new respuestas;
$_r24h= new r24h;

//echo(json_encode($_SERVER['REQUEST_METHOD']));   die;

if($_SERVER['REQUEST_METHOD'] == "GET"){//Get READ
  
   //GET PARA LA PRECARGA VARIABLE  preCargaComplejo_id
    if(isset($_GET['preCargaComplejo_id'])){  
        $complejo_id = $_GET['preCargaComplejo_id'];
        $listaPrecarga = $_r24h->precargaR24H($complejo_id);
        //prepara salida del ws       
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($listaPrecarga);
        http_response_code(200);
    }
    //GET PARA OBTENER LAS CABECERAS DE LOS REPORTES 
    elseif(isset($_GET['Turno'])||
            isset($_GET['complejo_id'])||
            isset($_GET['Supervisor'])||
            isset($_GET['fechaCreacion'])
            ){
                if(isset($_GET['Turno'])){
                    $Turno = @$_GET['Turno'];
                }
                if(isset($_GET['complejo_id'])){
                    $complejo_id = @$_GET['complejo_id'];
                }
                if(isset($_GET['Supervisor'])){
                    $Supervisor = @$_GET['Supervisor'];
                }
                if(isset($_GET['fechaCreacion'])){
                    $fechaCreacion = @$_GET['fechaCreacion'];
                }
               // print("<pre>".print_r(($_GET),true)."</pre>"); die;

                $listaPrecarga = $_r24h->consultaR24hHeader(@$Turno,@$complejo_id,@$Supervisor,@$fechaCreacion);
                //prepara salida del ws       
                header('Content-Type: application/json;charset=utf-8');
                echo json_encode($listaPrecarga);
                http_response_code(200);
            }
            //GET PARA OBTENER LAS CABECERAS DE LOS REPORTES 
            elseif(isset($_GET['R24Hid'])){
                $R24Hid = $_GET['R24Hid'];
                
                $listaPrecarga = $_r24h->consultaR24hEquipos($R24Hid);
                //prepara salida del ws       
                header('Content-Type: application/json;charset=utf-8');
                echo json_encode($listaPrecarga);
                http_response_code(200);
            }


}elseif ($_SERVER['REQUEST_METHOD'] == "POST" ){//POST INSERT

   //recibimos los datos enviados
        // $postBody = file_get_contents("php://input"); // para el plug in de crome
        $postBody = json_encode($_POST);

   //enviamos etso al navegados/
        $datosArray = $_r24h->postR24h($postBody);
       // print_r($datosArray); die;  
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