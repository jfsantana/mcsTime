<?php
/**
* Clase para consumir API Rest
* Las operaciones soportadas son:.
*
* 	- POST		: Agregar
* 	- GET		: Consultar
* 	- DELETE	: Eliminar
* 	- PUT		: Actualizar
* 	- PATCH		: Actualizar por parte
*
* Extras
* 	- autenticación de acceso básica (Basic Auth)
*  	- Conversor JSON
 *
 * @author     	Jesus Santana
 *
 * @version 	1.0
 */
class API
{
    /**
     * Enviar parámetros a un servidor a través del protocolo HTTP (POST).
     * Se utiliza para agregar datos en una API REST.
     *
     * @param string $URL   URL recurso, ejemplo: http://website.com/recurso
     * @param string $TOKEN token de autenticación
     * @param array  $ARRAY parámetros a envíar
     *
     * @return JSON
     */
    public static function POST($URL, $TOKEN, $ARRAY)
    {
        $datapost = '';

        $headers = ['Authorization: Bearer '.$TOKEN];
        // foreach($ARRAY as $key=>$value) {
        //    $datapost .= $key . "=" . $value . "&";
        // }
        // $datapost=http_build_query($ARRAY);
        $datapost = http_build_query($ARRAY, 'banderas_');
        // print_r($datapost);die;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $datapost);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    /**
     * Enviar parámetros a un servidor a través del protocolo HTTP (POST).
     * Se utiliza para agregar datos en una API REST.
     *
     * @param string $URL   URL recurso, ejemplo: http://website.com/recurso
     * @param string $TOKEN token de autenticación
     * @param array  $ARRAY parámetros a envíar
     *
     * @return JSON
     */
    public static function POSTSAP($URL, $TOKEN, $ARRAY)
    {
        $datapost = '';
        $datapost = $ARRAY; // http_build_query($ARRAY, 'banderas_');

        $username = 'PIUSERWS01';
        $password = 'Pequiven21*';

        $headers = [
            'Content-Type: application/json',
            'Authorization: Basic '.base64_encode("$username:$password"),
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $datapost);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    /**
     * Consultar a un servidor a través del protocolo HTTP (GET).
     * Se utiliza para consultar recursos en una API REST.
     *
     * @param string $URL   URL recurso, ejemplo: http://website.com/recurso/(id) no obligatorio
     * @param string $TOKEN token de autenticación
     *
     * @return JSON
     */
    public static function GET($URL, $TOKEN)
    {
        $headers = ['Authorization: Bearer '.$TOKEN];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        // echo $response;die;
        curl_close($ch);

        return $response;
    }

    /**
     * Consultar a un servidor a través del protocolo HTTP (DELETE).
     * Se utiliza para eliminar recursos en una API REST.
     *
     * @param string $URL   URL recurso, ejemplo: http://website.com/recurso/id
     * @param string $TOKEN token de autenticación
     *
     * @return JSON
     */
    public static function DELETE($URL, $TOKEN)
    {
        $headers = ['Authorization: Bearer '.$TOKEN];
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    /**
     * Enviar parámetros a un servidor a través del protocolo HTTP (PUT).
     * Se utiliza para editar un recurso en una API REST.
     *
     * @param string $URL   URL recurso, ejemplo: http://website.com/recurso/id
     * @param string $TOKEN token de autenticación
     * @param array  $ARRAY parámetros a envíar
     *
     * @return JSON
     */
    public static function PUT($URL, $TOKEN, $ARRAY)
    {
        $datapost = '';
        foreach ($ARRAY as $key => $value) {
            $datapost .= $key.'='.$value.'&';
        }
        //  $datapost = http_build_query($ARRAY);

        $headers = ['Authorization: Bearer '.$TOKEN];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $datapost);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    /**
     * Enviar parámetros a un servidor a través del protocolo HTTP (PATCH).
     * Se utiliza para editar un atributo específico (recurso) en una API REST.
     *
     * @param string $URL   URL recurso, ejemplo: http://website.com/recurso/id
     * @param string $TOKEN token de autenticación
     * @param array  $ARRAY parametros parámetros a envíar
     *
     * @return JSON
     */
    public static function PATCH($URL, $TOKEN, $ARRAY)
    {
        $datapost = '';
        foreach ($ARRAY as $key => $value) {
            $datapost .= $key.'='.$value.'&';
        }

        $headers = ['Authorization: Bearer '.$TOKEN];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $datapost);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    /**
     * Convertir JSON a un ARRAY.
     *
     * @param json $json Formato JSON
     *
     * @return array
     */
    public static function JSON_TO_ARRAY($jsone)
    {
        // echo($jsone);
        return json_decode("$jsone", true);
    }

    public static function notifica($equipment, $short_text, $reportedby, $notif_date, $notiftime, $long_text)
    {
        // $long_text='textoPlano';
        //  $notif_date = '2022-11-29';

        if (strlen($notif_date) > 10) {
            $notif_date = substr($notif_date, 0, 10);
        }

        error_reporting(0);

        if (file_exists('../../public/plugins/nusoap/lib/nusoap.php')) {
            require_once '../../public/plugins/nusoap/lib/nusoap.php';
        } else {
            echo 'no';
            require_once '../../../../public/plugins/nusoap/lib/nusoap.php';
        }

        $ruta = 'http://'.$_SERVER['HTTP_HOST'].'/funciones/wsdl/sap/in/ZEHS_CREATE_NOTIF_Sync_OutService.wsdl';

        $oSoapClient = new nusoap_client($ruta, true);

        $oSoapClient->setCredentials('PIUSERWS01', 'Pequiven21*', 'basic');
        if ($sError = $oSoapClient->getError()) {
            $resultado = [
                'status' => 'error',
                'detalle' => $sError,
                ];
        }

        $RFC_funcion = 'ZEHS_CREATE_NOTIF_Sync_Out';
        $IM_NOTIFHEADER = ['EQUIPMENT' => $equipment, 'SHORT_TEXT' => $short_text,
                             'REPORTEDBY' => $reportedby, 'NOTIF_DATE' => $notif_date,
                             'NOTIFTIME' => $notiftime, 'LONG_TEXT' => $long_text, ];

        $aParametros = ['IM_NOTIFHEADER' => $IM_NOTIFHEADER];
        $aRespuesta = $oSoapClient->call($RFC_funcion, $aParametros);

        if ($oSoapClient->fault) { // Si
            $resultado = [
                'status' => 'error',
                'detalle' => 'Por Favor comuniquese con el Administrador del Sistema',
                ];
        } else {
            $sError = $oSoapClient->getError();
            if ($sError) {
                $resultado = [
                                'status' => 'error',
                                'detalle' => $sError,
                                ];
            } else {
                $resultado = [
                    'status' => 'OK',
                    'detalle' => [
                        'NOTIF_NO' => $aRespuesta['EX_NOTIFHEADER']['NOTIF_NO'],
                        'PLANPLANT' => $aRespuesta['PLANPLANT'],
                        'LOC_ACT' => $aRespuesta['EX_NOTIFHEADER']['LOC_ACT'],
                        'EQUIPMENT' => $aRespuesta['EX_NOTIFHEADER']['EQUIPMENT'],
                        'CREATED_ON' => $aRespuesta['EX_NOTIFHEADER']['CREATED_ON'],
                                ],
                    ];
                $resultado = json_encode($resultado);
            }
        }

        return $resultado;
    }
}
