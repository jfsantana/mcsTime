<?php
//ARCHIVO BASE PARA LOS SERVICIOS
require_once 'clases/respuestas.class.php';
require_once 'clases/estructura.class.php';

$_respuestas= new respuestas;
$_estructura= new estructura;

if($_SERVER['REQUEST_METHOD'] == "GET"){//Get READ
    if(!isset($_GET['complejoid'])){    //sin parametros
        $listaComplejo = $_estructura->listaComplejo();      
        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($listaComplejo);
        http_response_code(200);
    }elseif(isset($_GET['complejoid'])){    
        if(!isset($_GET['tipo'])){  
            $complejoid = $_GET['complejoid'];
            if(isset($_GET['plantaid'])){
                $complejoid = $_GET['complejoid'];
                $plantaid = $_GET['plantaid'];
                $datosquery = $_estructura->datoEquipos($complejoid,$plantaid);
                header('Content-Type: application/json;charset=utf-8');
                echo json_encode($datosquery);
                http_response_code(200); 
            }else{
                $datosquery = $_estructura->datoComplejo($complejoid);
                header('Content-Type: application/json;charset=utf-8');
                echo json_encode($datosquery);
                http_response_code(200);
            }
        }elseif (isset($_GET['tipo'])) {          
            $complejoid = $_GET['complejoid'];
            if($_GET['tipo']=='gerencia')
                $datosquery = $_estructura->listaGerencia($complejoid);
            elseif ($_GET['tipo']=='planta')
                $datosquery = $_estructura->listaPlanta($complejoid);  
            header('Content-Type: application/json;charset=utf-8');
            echo json_encode($datosquery);
            http_response_code(200);
        }

   

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