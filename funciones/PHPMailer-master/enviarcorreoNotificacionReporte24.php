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

/*******************************************
 * preparacion de la data del encabezado para ser enviada al correo
 */

require '../wsdl/clases/consumoApi.class.php';
$date = date('Y-m-d');
$idR24h = $_GET['R24Hid'];
// WS datos empleado
$token = $_SESSION['token'];
$URL = 'http://'.$_SERVER['HTTP_HOST']."/funciones/wsdl/r24h?R24Hid=$idR24h"; // .$consultarepo ['R24Hid'];
$rs = API::GET($URL, $token);

$arrayReporte24 = API::JSON_TO_ARRAY($rs);

$body = '';

$asunto = 'Reporte 24 horas Notificacion de Creacion';
$body = '
        <table style="width:100%; border:10px sólido #C0C0C0; border-collapse:colapso; padding:5px;">
            <tbody>'; ?>
                    <?php
                        foreach ($arrayReporte24 as $tabsR24) {
                            $body = $body.'   <tr>
                                                <td  style="border:1px sólido; padding:5px; background:#309365;" align="center" colspan="3">'.$tabsR24['tabs']['descripcion'].'</td>
                                            </tr>
                                            <tr  style="border:1px sólido; padding:5px; background:#bbbbbb;" align="center">
                                                <td style="width:50%"> Equipo</td>
                                                <td style="width:10%"> Respuesta </td>
                                                <td style="width:40%"> Observacion</td>
                                            </tr>';
                            foreach ($tabsR24['TabsEquipos']  as $datosEquipos) {
                                $body = $body.'   <tr >
                                                    <td> '.$datosEquipos['nombre'].'</td>
                                                    <td> '.$datosEquipos['respuesta'].'</td>
                                                    <td> '.$datosEquipos['observacion'].'</td>
                                                </tr>';
                            }
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
