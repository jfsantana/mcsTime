<?php

if (!isset($_SESSION)) {
    session_start();
}

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

// rutade los archivos
require 'Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

/*********************************************
 * preparacion de la data del encabezado para ser enviada al correo
 */

require '../wsdl/clases/consumoApi.class.php';
$date = date('Y-m-d');
$headerId = $_GET['idHeaderNew'];
// WS datos empleado
$token = $_SESSION['token'];
$URL = 'http://'.$_SERVER['HTTP_HOST']."/funciones/wsdl/inspecciones?detalleIncidenciaId=$headerId";

$rs = API::GET($URL, $token);
$arrayInspeccion = API::JSON_TO_ARRAY($rs);

switch ($arrayInspeccion['inspeccion']['tipoIncidenciaId']) {
    case 1:
        $tipo = 'Inspecciones';
        break;
    case 2:
        $tipo = 'Diagnosticos';
        break;
    case 3:
        $tipo = 'Eventos';
        break;
}
//foreach()

$hallazgos='';
$TITLE1='';
$TITLE2='';
$hallazgos=$hallazgos.'<TR><td style="border:1px sólido;  background:#F7F7F7;" COLSPAN=2 ><strong>.</strong></td></TR>';
foreach($arrayInspeccion['inspeccion']['hallazgos']  as $valor){
    
    $hallazgos="<TR>".$hallazgos;
  //  echo '<pre>'.print_r($hallazgos, true).'</pre>'; exit;
    foreach($valor as $clave => $valor){
        if (
                (@$clave != 'recomendaciones')
                &&(@$clave != 'incidenciaBodyId')
                &&(@$clave != 'incidenciaHeaderId')
                &&(@$clave != 'tipo')
                &&(@$clave != 'fechaInicio')
                &&(@$clave != 'FechaFin')
                &&(@$clave != 'creadoPor')
                &&(@$clave != 'estatus')
                &&(@$clave != 'heredadas')
                &&(@$clave != 'danoAmbiental')
                &&(@$clave != 'causaEvento')
                &&(@$clave != 'responsable')

            ){
                IF($clave=='descripcion'){$clave='HALLAZGOS. descripcion';}
                $hallazgos=$hallazgos.'<td style="border:1px sólido; padding:5px; font-size:small"><strong>'.strtoupper($clave).'</strong><br>'. $valor.'</td>';
        }
        
        if(@$clave == 'recomendaciones'){          
            foreach($valor as $datosRecomendacion){
                $hallazgos=$hallazgos.'<tr>';
                foreach ($datosRecomendacion as $claveRecomendacion => $valorRecomendacion){
                    if (
                        (@$claveRecomendacion != 'recomendacionesId')
                        &&(@$claveRecomendacion != 'incidenciaBodyId')
                        &&(@$claveRecomendacion != 'fechaCreacion')
                        &&(@$claveRecomendacion != 'fechaInicio')
                        &&(@$claveRecomendacion != 'fechaPlanificaicon')
                        &&(@$claveRecomendacion != 'estatus')
                        &&(@$claveRecomendacion != 'creadoPor')
                    ){
                        IF($claveRecomendacion=='descripcion'){$claveRecomendacion='RECOMENDACION. descripcion';}
                        $hallazgos=$hallazgos.'<td style="border:1px sólido; padding:5px; font-size:small"><strong>'.strtoupper(@$claveRecomendacion).'</strong><br>'. @$valorRecomendacion.'</td>';
                    }
                    
                }
                $hallazgos=$hallazgos.'</tr>';
            }          
        }  
        
    }$hallazgos=$hallazgos.'<td style="border:1px sólido;  background:#549127;" COLSPAN=2 ><strong>.</strong></td>';
    
    $hallazgos=$hallazgos.'</tr>';
}
//$hallazgos=$hallazgos.'</tr><tr><td>-------------------</td></tr>';
//echo '<pre>'.print_r($arrayInspeccion['inspeccion']['hallazgos'], true).'</pre>'; exit;


$asunto = 'Inspecciones '.$arrayInspeccion['inspeccion']['incidenciaHeaderId'];
$body = '
        <table style="width:100%; border:10px sólido #C0C0C0; border-collapse:colapso; padding:5px;">
            <thead>
                <tr>
                    <th style="border:1px sólido; padding:5px; background:#309365;" colspan="3" align="center">Inspecciones ('.$tipo.') codigo:'.$arrayInspeccion['inspeccion']['incidenciaHeaderId'].'</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border:1px sólido; padding:5px; font-size:small">Fecha</td>
                    <td style="border:1px sólido; padding:5px; font-size:small">Sector</td>
                    <td style="border:1px sólido; padding:5px; font-size:small">Complejo</td>
                </tr>
                <tr>
                    <td style="border:1px sólido; padding:5px;">'.substr($arrayInspeccion['inspeccion']['fechaEjecucionInicio'], 0, 10).'</td>
                    <td style="border:1px sólido; padding:5px;">'.$arrayInspeccion['inspeccion']['nomSector'].'</td>
                    <td style="border:1px sólido; padding:5px;">'.$arrayInspeccion['inspeccion']['nombre_complejo'].'</td>
                </tr>
                <tr>
                    <td style="border:1px sólido; padding:5px; font-size:small">Gerencia</td>
                    <td style="border:1px sólido; padding:5px; font-size:small">Area</td>
                    <td style="border:1px sólido; padding:5px; font-size:small">Custorio</td>
                </tr>
                <tr>
                    <td style="border:1px sólido; padding:5px;">'.$arrayInspeccion['inspeccion']['nomGerencia'].'</td>
                    <td style="border:1px sólido; padding:5px;">'.$arrayInspeccion['inspeccion']['des_area'].'</td>
                    <td style="border:1px sólido; padding:5px;">'.$arrayInspeccion['inspeccion']['custorioID'].'</td>
                </tr>
                <tr>
                    <td style="border:1px sólido; padding:5px; font-size:small" colspan="3" >Ubicacion Fisica</td>
                </tr>
                <tr>
                    <td style="border:1px sólido; padding:5px;" colspan="3" >'.$arrayInspeccion['inspeccion']['ubicacion'].'</td>
                </tr>
                <tr>
                    <td style="border:1px sólido; padding:5px; font-size:small" colspan="3" ></td>
                </tr>
                
                   '.$hallazgos.'
                
                <tr>
                    <td style="border:1px sólido; padding:5px; font-size:small" colspan="3" >Para visualizar la informacion completa por favor ingresar al sistema SIAHO a traves del sigueinte enlace <a href="http://localhost/siaho/">SIAHO</a> </td>
                </tr>
            <tbody>
        </table>';

/*******************************************
 * Preparacion del contenido del correo para notificaicon de inspecciones
 */
// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'noreply.siaho@gmail.com';
    $mail->Password = 'gqkownjelyrdzijx';        // token Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    // Recipients
    $mail->setFrom('noreply.siaho@gmail.com', 'Informacion SIAHO (Notificacion)');
    $mail->addAddress($_SESSION['cor_usu'], $_SESSION['nombre']);     // Add a recipient
    /*$mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');*/

    // Attachments
    /*$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); */ // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body = $body;
    $mail->AltBody = 'Este Correo a sido enviado automaticamente por el sistema de SIAHO';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
