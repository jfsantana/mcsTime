<?php
//declaras el array que se enviara al servicio
$respuesta = array(
    "header" => array(
                        "codigo" => "",
                        "turno" => "",
                        "complejoId" => "",
                        "supervisor" => "",
                        "fechaCreacion" => "",
                        "estatus" => "",
                        "creadoPor" => ""
                    ),
    "equipos" => array(
                        "id"=>"",
                        "respuesta" => "",
                        "Observacion"=>""
                        )

                        
                    );
print("<pre>".print_r($respuesta,true)."</pre>"); 
print("<pre>".print_r($_POST,true)."</pre>"); die;

//recorres el array con los valores y se asignan al nuevo array
foreach($_POST as $key => $value){
        if ($key=="incidencia_tipo"){
            //aqui se agregan las validaciones
            echo $value;
        }
    }


//llamas el servicio
require_once ('../wsdl/clases/consumoApi.class.php');

//Valida el usuario y genera token valido
$token = '';
$URL	= "http://localhost/siaho/funciones/wsdl/auth";
$parametros = $respuesta;
//$rs = API::POST($URL,$token,$parametros);
 //$rs = API::JSON_TO_ARRAY($rs);

 print_r($rs['result']['token']); die;

?>