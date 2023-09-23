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

$solped = $_GET['solped'];
// DATOS DE LA SOLPED
$parametrosIN = [
    'rangCodArea' => [
            'codAreaInic' => '000',
            'codAreaFin' => '',
    ],
    'rangSolp' => [
            'banfnInic' => "$solped",
            'banfnFin' => '',
    ],
    'rangNroAlc' => [
            'nroAlcInic' => '',
            'nroAlcFin' => '',
    ],
    'rangFechas' => [
            'fechaInic' => '2023-01-01',
            'fechaFin' => '2023-12-31',
    ],
  ];
// pasas el array a json
$parametros = json_encode($parametrosIN);
$token = '';

$URL = 'http://pqvmorsap03.pequiven.com:50000/RESTAdapter/Portal_SIAHO/getRecordControlTabReqMM';
$rs = API::POSTSAP($URL, $token, $parametros);
$rs = API::JSON_TO_ARRAY($rs);
$lista = $rs['ZFM_GET_RECORDS_CONTROL_TAB.Response']['EX_TAB_HEAD'];
// echo '<pre>'.print_r($lista, true).'</pre>';  exit;
$body = '';

$asunto = 'Se Notifica la Aprobacion de Solped '.$lista['item']['BANFN'];
$body = '
                <table style="width:100%; border:10px sólido #C0C0C0; border-collapse:colapso; padding:5px;">
                    <tbody>'; ?>
                            <?php
                        foreach ($lista as $solpeDatos) {
                            $body = $body.'   <tr>
                                                        <td  style="border:1px sólido; padding:5px; background:#309365;" align="center" colspan="3">
                                                        Notificaion de Getsion de SOlPED: '.$solpeDatos['BANFN'].'</td>
                                                    </tr>
                                                    <tr>
                                                        <td  style="border:1px sólido; padding:5px; background:eeeeee;" align="center" colspan="3">
                                                        Los detalle de los Items se muestran a continuación</td>
                                                    </tr>
                                                    <tr  style="border:1px sólido; padding:5px; background:#bbbbbb;" align="center">
                                                        <td style="width:50%"> Equipo</td>
                                                        <td style="width:10%"> Respuesta </td>
                                                        <td style="width:40%"> Observacion</td>
                                                    </tr>';
                            // print_r($solpeDatos['DETALLE_SOLP']['item'] ); die;
                            // echo '<pre>'.print_r($solpeDatos['DETALLE_SOLP']['item']['BANFN'], true).'</pre>';

                            if (@$solpeDatos['DETALLE_SOLP']['item']['BANFN']) {
                                $datos = $solpeDatos['DETALLE_SOLP'];
                            } else {
                                $datos = $solpeDatos['DETALLE_SOLP']['item'];
                            }
                            // echo count($solpeDatos['DETALLE_SOLP']['item']); die;
                            foreach ($datos as $Items) {
                                // echo '<pre>'.print_r($lista, true).'</pre>';  exit;
                                $body = $body.'   <tr >
                                                            <td> '.$Items['TXZ01'].'</td>
                                                            <td> '.$Items['MENGE'].'</td>
                                                            <td> '.$Items['BEDNR'].'</td>
                                                        </tr>';
                            }
                        }
$body = $body.'
                    </tbody>
                </table>';
// echo $body; die;
// http://siaho/funciones/PHPMailer-master/enviarcorreoNotificacionEstimacion.php?solped=0100003490

// echo '<pre>'.print_r($lista, true).'</pre>';  exit;

/*******************************************
 * Preparacion del contenido del correo para notificaicon de inspecciones
 */
// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'noreply.siaho@gmail.com';
    $mail->Password = 'gqkownjelyrdzijx';        // token Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    // Recipients
    $To = @$lista['item']['EVALUADOR_MAIL'];
    if (@$To) {
        $mail->addAddress($To);
    }
    $mail->setFrom('noreply.siaho@gmail.com', 'Informacion SIAHO (Notificacion)');

    $mail->addCC($_SESSION['cor_usu'], $_SESSION['nombre']);

    // Attachments
    /*$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); */ // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body = $body;
    $mail->AltBody = 'Este Correo a sido enviado automaticamente por el sistema de SIAHO - Verificacion de SOLPED';

    $mail->send();

    echo "Tu email ha sido enviado de forma exitosa a $To!";
    header('Location: ../../dashboard.php?activo=Evalca');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    header('Location: ../../dashboard.php?activo=Evalca');
}// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
