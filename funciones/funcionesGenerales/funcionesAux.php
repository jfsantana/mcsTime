<?php
//extrae la descripcion de las pregunats para las SOLPED
function descripcionPregunta($CodArea,$orderQuery)
{
        $token = $_SESSION['token'];
        $urlPreguntas = 'http://' . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/solped?preguntas=descripcion&codArea=$CodArea&ordenQuery=$orderQuery";
        $datosPreguntas = API::GET($urlPreguntas, $token);
        $detalle = API::JSON_TO_ARRAY($datosPreguntas);
        return $detalle[0]['descripcionQuery'];
        //echo '<pre>'.print_r($detalle[0]['descripcionQuery'], true).'</pre>';  die;
}


//busca la ultima actualñizacion de las observaciones del servicio SAP
function observacion ($tipo, $posicionQuest, $numPreguntas, $solpedQuest){
        $idCiclo = 0;
        $observacionVAL = '';
        $idobservacion=1;
        $observacionSAP = '';
        $respuesta ='';
        
        do {
                $clave = 'OBSERVACION_'.$tipo.'_0'.$idobservacion;
                $observacion = @$solpedQuest[$clave];
                
                //echo $clave.'= '.$observacion .'<br>';
                if (isset($observacion)) {
                        $respuesta = $observacion;
                    } else {
                        break;
                    }
                    ++$idCiclo;
                    ++$idobservacion;
        } while ($idCiclo <= $numPreguntas);
        return $respuesta ;

}

?>