<?php

// echo '<pre>'.print_r($rs['informe']['Attachament']['docRefencia'], true).'</pre>'; exit;
if (!isset($_SESSION)) {
    session_start();
}

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

// rutade los archivos
require 'Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

/*******************************************
 * preparacion de la data del encabezado para ser enviada al correo
 */

require '../wsdl/clases/consumoApi.class.php';
$date = date('Y-m-d');

// WS datos empleado
$token = $_SESSION['token'];

$idInforme = $_GET['idInforme'];
$URL = 'http://' . $_SERVER['HTTP_HOST'] . '/funciones/wsdl/ambienteInforme?idInforme=$idInforme';

$rs = API::GET($URL, $token);
$rs = API::JSON_TO_ARRAY($rs);

$asunto = 'Informe de Amiente Notificacion de Creacion';
$body = '<table style="width:100%; border:10px sólido #C0C0C0; border-collapse:colapso; padding:5px;"> <tbody>';

// ************************** Tabla para los attachament ****************************
if (@$rs['informe']['Attachament']['docRefencia']) {
    $bodydocRefencia = '<table style="width:50%; border:10px sólido #C0C0C0; border-collapse:colapso; padding:5px;"> <tbody>   <tr >';
    foreach (@$rs['informe']['Attachament']['docRefencia']  as $datosEquipos) {
        $bodydocRefencia1 = $bodydocRefencia.'<td  style="width:10px"> <img style="width:100%" src="data:'.$datosEquipos['tipo'].';base64,'.$datosEquipos['imagen'].'" ></td>';
    }
    $bodydocRefencia1 = $bodydocRefencia.' </tr> </tbody> </table>';
}
// ************************** Tabla para los attachament ****************************
if (@$rs['informe']['Attachament']['puntoMuetsreo']) {
    $bodyoMuetsreo = '<table style="width:50%; border:10px sólido #C0C0C0; border-collapse:colapso; padding:5px;"> <tbody>   <tr >';
    foreach (@$rs['informe']['Attachament']['puntoMuetsreo']  as $datosEquipos) {
        $bodyoMuetsreo1 = $bodyoMuetsreo.'<td  style="width:10px"> <img style="width:100%" src="data:'.$datosEquipos['tipo'].';base64,'.$datosEquipos['imagen'].'" ></td>';
    }
    $bodyoMuetsreo1 = $bodyoMuetsreo.' </tr> </tbody> </table>';
}
// ************************** Tabla para los attachament ****************************
if (@$rs['informe']['Attachament']['anexosArchivos']) {
    $bodyoanexosArchivos = '<table style="width:50%; border:10px sólido #C0C0C0; border-collapse:colapso; padding:5px;"> <tbody>   <tr >';
    foreach (@$rs['informe']['Attachament']['anexosArchivos']  as $datosEquipos) {
        $bodyoanexosArchivos1 = $bodyoanexosArchivos.'<td  style="width:10px"> <img style="width:100%" src="data:'.$datosEquipos['tipo'].';base64,'.$datosEquipos['imagen'].'" ></td>';
    }
    $bodyoanexosArchivos1 = $bodyoanexosArchivos.' </tr> </tbody> </table>';
}

// ***************************************TABLA PRINCIPA:L************************
foreach ($rs as $datos) {
    if ($datos['sector'] == 1) {
        $SectorName = 'Administradtivo';
    } else {
        $SectorName = 'Industrual';
    }
    $body = $body.'     <tr>
                        <td  style="border:1px sólido; padding:5px; background:#309365;" align="center" colspan="3"><H2>Informe creado el dia '.$datos['fechaCreacion'].': Con el identificador N:'.$datos['idInformeAmbiente'].'</H2></td>
                    </tr>
                    <tr  style="border:1px sólido; padding:5px; background:#bbbbbb;" align="center">
                        <td style="width:10%"> Fecha</td>
                        <td style="width:30%"> Sector </td>
                        <td style="width:30%"> Complejo</td>
                    </tr>
                        <tr   align="center">
                        <td style="width:30%"> '.$datos['fechaCreacion'].'</td>
                        <td style="width:30%"> '.$SectorName.' </td>
                        <td style="width:30%"> '.$datos['siglas_complejo'].'</td>
                    </tr>
                    <tr  style="border:1px sólido; padding:5px; background:#bbbbbb;" align="center">
                        <td style="width:30%"> Gerencia</td>
                        <td style="width:30%"> Area </td>
                        <td style="width:30%"> Custodio </td>
                    </tr>
                        <tr   align="center">
                        <td style="width:30%"> '.$datos['gerencia'].'</td>
                        <td style="width:30%"> '.$datos['des_area'].' </td>
                        <td style="width:30%"> '.$datos['custodio'].'</td>
                    </tr>
                    <tr  style="border:1px sólido; padding:5px; background:#bbbbbb;" align="center">
                        <td colspan="3"> Ubicacion </td>
                    </tr>
                        <tr   align="center">
                        <td style="width:50%"> '.$datos['ubicacion'].'</td>
                    </tr>
                        </tbody>
                    </table>
                    </br>
                    <table style="width:100%; border:10px sólido #C0C0C0; border-collapse:colapso; padding:5px;">
                    <tbody>
                    <tr  >
                        <td style="border:1px sólido; padding:5px; background:#dddddd;" align="center" style="width:20%"> Objetivo </td>
                        <td style="width:80%" colspan="2"> '.$datos['objetivo'].' </td>
                    </tr>
                    <tr  >
                        <td style="border:1px sólido; padding:5px; background:#dddddd;" align="center" style="width:20%"> Alcance </td>
                        <td style="width:80%" colspan="2"> '.$datos['alcance'].' </td>
                    </tr>
                    <tr  >
                        <td style="border:1px sólido; padding:5px; background:#dddddd;" align="center" style="width:20%"> Documentacion de Referencia </td>
                        <td style="width:80%" colspan="2"> '.@$bodydocRefencia.' </td>
                    </tr>
                    <tr  style="border:1px sólido; padding:5px; background:#dddddd;" align="Left">
                        <td colspan="3">Observacion de la documentacion de Referencia:  '.$datos['docRefenciaObservacion'].' </td>
                    </tr>
                    <tr  >
                        <td style="border:1px sólido; padding:5px; background:#dddddd;" align="center" style="width:20%"> Punto de Muestreo </td>
                        <td style="width:80%" colspan="2"> '.@$bodyoMuetsreo.' </td>
                    </tr>
                    <tr  style="border:1px sólido; padding:5px; background:#dddddd;" align="Left">
                        <td colspan="3">Observacion de la documentacion de Referencia:  '.$datos['puntoMuetsreoObservacion'].' </td>
                    </tr>
                    <tr  >
                        <td style="border:1px sólido; padding:5px; background:#dddddd;" align="center" style="width:20%"> resultado </td>
                        <td style="width:80%" colspan="2"> '.$datos['resultado'].' </td>
                    </tr>
                    <tr  >
                        <td style="border:1px sólido; padding:5px; background:#dddddd;" align="center" style="width:20%"> conclusiones </td>
                        <td style="width:80%" colspan="2"> '.$datos['conclusiones'].' </td>
                    </tr>
                    <tr  >
                        <td style="border:1px sólido; padding:5px; background:#dddddd;" align="center" style="width:20%"> recomendaciones </td>
                        <td style="width:80%" colspan="2"> '.$datos['recomendaciones'].' </td>
                    </tr>
                    <tr  >
                        <td style="border:1px sólido; padding:5px; background:#dddddd;" align="center" style="width:20%"> Anexos </td>
                        <td style="width:80%" colspan="2"> '.@$bodyoanexosArchivos.' </td>
                    </tr>
                    <tr  style="border:1px sólido; padding:5px; background:#dddddd;" align="Left">
                        <td colspan="3">Observacion de la documentacion de Referencia:  '.$datos['anexosObservacion'].' </td>
                    </tr>
                    
                    ';
}
$body = $body.'
            </tbody>
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
    $mail->setFrom('noreply.siaho@gmail.com', 'Informacion SIAHO ');
    $mail->addAddress ($_SESSION['cor_usu'], $_SESSION['nombre']);     // Add a recipient
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
    $mail->AltBody = 'Este Correo a sido enviado automaticamente por el sistema SIAHO';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
