<?php

if (!isset($_SESSION)) {
    session_start();
}

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

// rutade los archivos  d
require 'Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

/*******************************************
 * preparacion de la data del encabezado para ser enviada al correo
 */
echo 'entro'; die;
require '../wsdl/clases/consumoApi.class.php';
$date = date('Y-m-d');
$proyectoAHOHeaderId = $_GET['proyectoAHOHeaderId'];
// WS datos empleado
$token = $_SESSION['token'];
$URL = 'http://' . $_SERVER['HTTP_HOST'] . '/funciones/wsdl/proyectos?proyectoAHOHeaderId=$proyectoAHOHeaderId';
$rs = API::GET($URL, $token);
$arrayProyecto = API::JSON_TO_ARRAY($rs);

// if ($arrayProyecto[0]['estatus'] == 1) {
//     $estatusProyecto = 'Activo';
// }

$asunto = 'Proyectos Planificados en Calendario de actividades Cod: '.$arrayProyecto[0]['proyectoAHOHeaderId'];
$body = '
        <table style="width:100%; border:10px sólido #C0C0C0; border-collapse:colapso; padding:5px;">
            <thead>
                <tr>
                    <th style="border:1px sólido; padding:5px; background:#309365;" colspan="3" align="center">Codigo del Proyecto: '.$arrayProyecto[0]['proyectoAHOHeaderId'].' </th>
                </tr>
            </thead>
            <tbody>
                <tr style=" background:#DBD7D4;">
                    <td style="border:1px sólido; padding:5px; font-size:small">Gerencia Responsable</td>
                    <td style="border:1px sólido; padding:5px; font-size:small">Tipo de Proyecto</td>
                </tr>
                <tr>
                    <td style="border:1px sólido; padding:5px;">'.$arrayProyecto[0]['gerenciaProyectoAHO'].'</td>
                    <td style="border:1px sólido; padding:5px;">'.$arrayProyecto[0]['tipoProyectoAHO'].'</td>
                </tr>
                <tr style=" background:#DBD7D4;">
                    <td style="border:1px sólido; padding:5px; font-size:small">Fecha Inicio Proyecto</td>
                    <td style="border:1px sólido; padding:5px; font-size:small">Fecha Fin Proyecto</td>
                </tr>
                <tr>
                    <td style="border:1px sólido; padding:5px;">'.$arrayProyecto[0]['fechaInicioProyectoAHO'].'</td>
                    <td style="border:1px sólido; padding:5px;">'.$arrayProyecto[0]['fechaFinProyectoAHO'].'</td>
                </tr>
                <tr style=" background:#DBD7D4;">
                    <td style="border:1px sólido; padding:5px; font-size:small" colspan="3" >Nombre del Proyecto</td>
                </tr>
                <tr>
                    <td style="border:1px sólido; padding:5px;" colspan="3" >'.$arrayProyecto[0]['nombreProyectoAHO'].'</td>
                </tr>

                <tr style=" background:#DBD7D4;">
                    <td style="border:1px sólido; padding:5px; font-size:small" colspan="3" >Descripcion del Proyecto</td>
                </tr>
                <tr>
                    <td style="border:1px sólido; padding:5px;" colspan="3" >'.$arrayProyecto[0]['descripcionProyectoAHO'].'</td>
                </tr>
                <tr style=" background:#DBD7D4;">
                    <td style="border:1px sólido; padding:5px; font-size:small" colspan="3" >Resposables</td>
                </tr>
                <tr>
                    <td style="border:1px sólido; padding:5px;" colspan="3" >'.$arrayProyecto[0]['responsableProyectoAHO'].'</td>
                </tr>
                <tr style=" background:#DBD7D4;">
                    <td style="border:1px sólido; padding:5px; font-size:small" colspan="3" >Participantes</td>
                </tr>
                <tr>
                    <td style="border:1px sólido; padding:5px;" colspan="3" >'.$arrayProyecto[0]['participantesProyectoAHO'].'</td>
                </tr>
                <tr style=" background:#DBD7D4;">
                    <td style="border:1px sólido; padding:5px; font-size:small">Estatus del Proyecto</td>
                    <td style="border:1px sólido; padding:5px; font-size:small">Fecha de Creacion</td>
                </tr>
                <tr>
                    <td style="border:1px sólido; padding:5px;">'.$estatusProyecto.'</td>
                    <td style="border:1px sólido; padding:5px;">'.$arrayProyecto[0]['fechaCreacion'].'</td>
                </tr>

                <tr>
                    <td style="border:1px sólido; padding:5px; font-size:small" colspan="3" ></td>
                </tr>
                <tr>
                    <td style="border:1px sólido; padding:5px; font-size:small" colspan="3" ></td>
                </tr>
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
