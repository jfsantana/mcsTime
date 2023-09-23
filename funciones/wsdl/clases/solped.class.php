<?php

/************************************************************
 * Diseñado por Jesus Santana
 * Fecha: 02/08/2022
 * CLASE r24h   usado en : REPORTE 24 HORAS
 *
 * 'clases/r24h.class.php';
 *************************************************************/

require_once 'conexion/conexion.php';
require_once 'respuestas.class.php';
require_once 'consumoApi.class.php';

// hereda de la clase conexion
class solped extends conexion
{
    private $R24Hid = '';
    private $complejoId = '';
    private $empleados_nroPersonal = '';
    // Activaciond e token para desarrollo
    private $token = '';   // b43bbfc8bcf8625eed413d91186e8534

    private $turno = '';
    private $complejo_id = '';
    private $Supervisor = '';
    private $Equipo = '';
    private $tabs = '';
    private $Id = '';
    private $Resp = '';
    private $Observacion = '';
    private $fechaCreacion = '';
    private $status = '';

    private $idRespuesta = '';
    private $solpedSapResp = ''; // banfn
    private $id_Quest = ''; // idPregunta
    private $estatusResp = '';  // respouesta
    private $fechaValidacionResp = '2000-01-01';
    private $fechaCorreccionResp = '2000-01-01';
    private $observacionResp = '';
    private $creadoPor = '';
    private $codArea = '';



    

    /************************************************************
     * Diseñado por Jesus Santana
     * Fecha: 18/01/2023
     * este metodo de la funcion preCarga  Preguntas de validacion de Solped
     *************************************************************/
    public function envioNotificacionCorreo($codArea = 0, $solped)
    {
        
        $_respuestas = new respuestas();

        //DATOS DE LA SOLPED
        $parametrosIN = [
            'rangCodArea' => [
                    'codAreaInic' => "000",
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
        $solpe = $rs['ZFM_GET_RECORDS_CONTROL_TAB.Response']['EX_TAB_HEAD'];
       //echo '<pre>'.print_r($solpe, true).'</pre>';  exit;

        $body = '';

        $asunto = 'Reporte 24 horas Notificacion de Creacion';
        $body = '
                <table style="width:100%; border:10px sólido #C0C0C0; border-collapse:colapso; padding:5px;">
                    <tbody>'; ?>
                            <?php
                                foreach ($solpe as $solpeDatos) {
                                    $body = $body.'   <tr>
                                                        <td  style="border:1px sólido; padding:5px; background:#309365;" align="center" colspan="3">
                                                        Notificaion de Getsion de SOlPED: '.$solpeDatos['BANFN'] .'</td>
                                                    </tr>
                                                    <tr>
                                                        <td  style="border:1px sólido; padding:5px; background:#309365;" align="center" colspan="3">
                                                        Los detalle de los Items se muestran a continuación</td>
                                                    </tr>
                                                    <tr  style="border:1px sólido; padding:5px; background:#bbbbbb;" align="center">
                                                        <td style="width:50%"> Equipo</td>
                                                        <td style="width:10%"> Respuesta </td>
                                                        <td style="width:40%"> Observacion</td>
                                                    </tr>';
                                                    //print_r($solpeDatos['DETALLE_SOLP']['item'] ); die;
                                    foreach ($solpeDatos['DETALLE_SOLP']as $Items) {
                                        
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

  

                echo   $body ; die;

    }
    
    /************************************************************
     * Diseñado por Jesus Santana
     * Fecha: 18/01/2023
     * este metodo de la funcion preCarga  Preguntas de validacion de Solped
     *************************************************************/
    public function descripcionPreguntas($codArea = 0, $ordenQuery)
    {
        $_respuestas = new respuestas();
        $condicion = '';
        if ($codArea != '') {
            $condicion = " where dm_solped_preguntas.cod_Area = '$codArea'";
        }
        if ($ordenQuery != '') {
            $condicionordenQuery = " and dm_solped_preguntas.ordenQuery = '$ordenQuery'";
        }

        $query = "SELECT
                    dm_solped_preguntas.descripcionQuery
                FROM
                    dm_solped_preguntas

                $condicion $condicionordenQuery
                ";
              
        $preguntas = parent::ObtenerDatos($query);
        if ($preguntas) {
            return $preguntas;
        } else {
            return 0;
        }
    }

    /************************************************************
     * Diseñado por Jesus Santana
     * Fecha: 18/01/2023
     * este metodo de la funcion preCarga  Preguntas de validacion de Solped
     *************************************************************/
    public function precargaPreguntas($codArea = 0)
    {
        $_respuestas = new respuestas();
        $condicion = '';
        if ($codArea != '') {
            $condicion = " where dm_solped_preguntas.cod_Area = '$codArea'";
        }
        $query = "SELECT dm_solped_preguntas.*
                FROM
                dm_solped_preguntas

                $condicion
                order by ordenQuery";
        $preguntas = parent::ObtenerDatos($query);
        if ($preguntas) {
            return $preguntas;
        } else {
            return 0;
        }
    }

    /************************************************************
     * Diseñado por Jesus Santana
     * Fecha: 06/08/2022
     * este metodo de la funcion R24H  verifica q1ue el token sea valido
     * OK
     *************************************************************/
    private function buscarToken()
    {
        $query = "select * from dg_empleado_token where token = '$this->token' and estado = 1";

        $resp = parent::ObtenerDatos($query);

        if ($resp) {
            $actualizarToken = $this->actualizarToken($resp[0]['empleadoTokenId']);

            return $resp;
        } else {
            return 0;
        }
    }

    /************************************************************
     * Diseñado por Jesus Santana
     * Fecha: 06/08/2022
     * este metodo de la funcion R24H  Actualiza la fecha del token
     * OK
     *************************************************************/
    private function actualizarToken($tokenId)
    {
        $date = date('Y-m-d H:i');
        $query = "update dg_empleado_token set fecha = '$date' where empleadoTokenId = '$tokenId'";
        $resp = parent::nonQuery($query);

        if ($resp >= 1) {
            return $resp;
        } else {
            return 0;
        }
    }

    /************************************************************
     * Diseñado por Jesus Santana
     * Fecha: 06/08/2022
     * este metodo de la funcion R24H  Inserta el Reporte24R
     *
     *************************************************************/
    public function insertarRespuestas($json)
    {
        // echo $json;die;
        $_respuestas = new respuestas();
        $datos = json_decode($json, true);
        // print("<pre>".print_r($datos,true)."</pre>"); die;

        if (!isset($datos['header']['token'])) {
            return $_respuestas->error_401();
        } else {
            $this->token = $datos['header']['token'];

            $arrayToken = $this->buscarToken();

            if ($arrayToken) {
                $fechaCreacion = date('Y-m-d');

                // valida los campos obligatorios
                if (
                    (!isset($datos['header']['banfn'])) ||
                    (!isset($datos['header']['fechaValidacion'])) |
                    (!isset($datos['header']['codArea']))
                ) {
                    $datosArray = $_respuestas->error_400();
                    echo json_encode($datosArray);
                } else {
                    $this->solpedSapResp = $datos['header']['banfn'];
                    $this->fechaValidacionResp = $datos['header']['fechaValidacion'];
                    $this->codArea = $datos['header']['codArea'];
                    $this->creadoPor = $datos['header']['Usuario_Evalua'];

                    // print("<pre>".print_r( $this->codArea ,true)."</pre>"); die;
                    $j = 1;

                    foreach ($datos['body'] as $respuestasInser) { // recorre todas las respuetsas
                        $this->id_Quest = '';
                        $this->estatusResp = '';
                        $this->observacionResp = '';
                        foreach ($respuestasInser as $clave => $valor) { // recorre los tes campos
                            $posicion_coincidenciaquest = strpos($clave, 'quest');
                            $posicion_coincidenciaobserv = strpos($clave, 'observ');

                            if ($clave == 'id') {
                                $this->id_Quest = $valor; // idPregunta
                            }
                            if ($posicion_coincidenciaquest === false) {
                                echo '';
                            } else {
                                $this->estatusResp = $valor;
                            }
                            if ($posicion_coincidenciaobserv === false) {
                                echo '';
                            } else {
                                $this->observacionResp = $valor;
                            }
                        }

                        if ($datos['header']['mod'] == 1) {
                            $rep24hHeaderDatos = $this->insertarRespuestasDestalle();
                        } elseif ($datos['header']['mod'] == 2) {
                            if (!empty($this->estatusResp)) {
                                $rep24hHeaderDatos = $this->updateRespuestasDestalle();

                                // print("<pre>".print_r($this->estatusResp,true)."</pre>"); die;
                            }
                        }
                        ++$j;
                    }

                    $respuesta = $_respuestas->response;
                    $respuesta['status'] = 'OK';
                    $respuesta['result'] = [
                        'error_id' => 200,
                        'error_msg' => 'Se culmino el proceso de actualizacion correctamente',
                    ];

                    return $respuesta;
                }
            } else {
                return $_respuestas->error_401('El Token que envio es invalido o ha caducado');
            }
        }
    }

    /************************************************************
     * Diseñado por Jesus Santana
     * Fecha: 06/08/2022
     * Metodo que insertsa las nuevas respuesta en la DB
     *************************************************************/
    private function insertarRespuestasDestalle()
    {
        $query = "insert Into dg_solped_respuestas ( 
            codArea,
            solpedSapResp,
            id_Quest,
            estatusResp,
            fechaValidacionResp,
            fechaCorreccionResp,
            observacionResp,
            creadoPor)
        value
        (
            '$this->codArea',
            '$this->solpedSapResp',
            '$this->id_Quest',
            '$this->estatusResp',
            '$this->fechaValidacionResp',
            '$this->fechaValidacionResp',
            '$this->observacionResp',
            '$this->creadoPor'
        )";

        // echo  $query ; die;
        $Insertar = parent::nonQueryId($query);

        if ($Insertar) {
            return $Insertar;
        } else {
            return 0;
        }
    }

    /************************************************************
     * Diseñado por Jesus Santana
     * Fecha: 08/02/2023
     * Este Metodo actualiza las respuesta ya existentes
     *************************************************************/
    private function updateRespuestasDestalle()
    {
        // filtar por la solpe y el id de la pregunta
        $date = date('Y-m-d');
        $query = "update dg_solped_respuestas 
                    set 
                        estatusResp = '$this->estatusResp',
                        observacionResp = '$this->observacionResp',
                        fechaCorreccionResp = '$date'
                    where 
                        solpedSapResp = '$this->solpedSapResp' and
                        id_Quest = '$this->id_Quest' and
                        codArea = '$this->codArea'";
        // echo       $query; die;
        $resp = parent::nonQuery($query);

        if ($resp >= 1) {
            return $resp;
        } else {
            return 0;
        }
    }

    /************************************************************
     * Diseñado por Jesus Santana
     * Fecha: 06/08/2022
     * este metodo de la funcion consulta que entrega un listado de Solped segun los parametros entregadpos
     * OK
     *************************************************************/
    public function consultaSolped($fechaSolped, $centroSolped, $unidadSolicitanteSolped, $estatusResp, $solpedSAP)
    {
        $_respuestas = new respuestas();

        $bandera = 0;
        $condicion = '';

        if ($solpedSAP != '') {
            $condicionsolpedSAP = " and dg_solped_cabecera.solpedSAP = '$solpedSAP'";
            $bandera = 1;
        } else {
            $condicionsolpedSAP = ' ';
        }

        if ($fechaSolped != '') {
            $condicionTurno = " and dg_solped_cabecera.fechaSolped = '$fechaSolped'";
            $bandera = 1;
        } else {
            $condicionTurno = ' ';
        }

        if ($centroSolped != '') {
            $condicioncomplejo_id = " and  dg_solped_cabecera.centroSolped = '$centroSolped'";
            $bandera = 1;
        } else {
            $condicioncomplejo_id = ' ';
        }
        if ($unidadSolicitanteSolped != '') {
            $condicionSupervisor = " and  dg_solped_cabecera.unidadSolicitanteSolped = '$unidadSolicitanteSolped'";
            $bandera = 1;
        } else {
            $condicionSupervisor = ' ';
        }
        if ($estatusResp != '') {
            $condicionfechaCreacion = " and  dg_solped_cabecera.estatusResp = '$estatusResp'";
            $bandera = 1;
        } else {
            $condicionfechaCreacion = ' ';
        }

        if ($bandera != 0) {
            $condicion = " Where dg_solped_cabecera.solpedSAP<>''  $condicionTurno $condicioncomplejo_id $condicionSupervisor $condicionfechaCreacion $condicionsolpedSAP";
        }

        $query = "SELECT DISTINCT
                        dg_solped_cabecera.id_solped_cabecera, 
                        dg_solped_cabecera.solpedSAP, 
                        dg_solped_cabecera.controlAlcanceSolped, 
                        dg_solped_cabecera.fechaSolped, 
                        dg_solped_cabecera.centroSolped, 
                        dg_solped_cabecera.grupoComprasSolped, 
                        dg_solped_cabecera.unidadSolicitanteSolped, 
                        dg_solped_cabecera.importeSolped, 
                        dg_solped_cabecera.numNecesidadSolped, 
                        dg_solped_cabecera.codAreaSolped, 
                        dg_solped_cabecera.creadoPor, 
                        dg_solped_cabecera.claseSolped, 
                        dg_solped_cabecera.fechaCreacionSolped
                    FROM
                        dg_solped_cabecera
                        INNER JOIN
                        dg_solped_respuestas
                        ON 
                            dg_solped_cabecera.solpedSAP = dg_solped_respuestas.solpedSapResp
                    $condicion
                    order by 2";
        // echo   $query ; die;
        $datosHeader = parent::ObtenerDatos($query);
        $tabsCount = 0;   // controla la posicion del array para el insert en la variable

        if ($datosHeader) { // recorre cada tabs
            return $datosHeader;
        } else {
            return $_respuestas->error_401('No existen Solped con los parametros solicitados');
        }
    }

    public function GetCodArea($DesAreaSolped)
    {
        $_respuestas = new respuestas();

        $bandera = 0;
        $condicion = '';

        if ($DesAreaSolped != '') {
            $condicionDesAreaSolped = " and  dm_solped_areas.codArea = '$DesAreaSolped'";
            $bandera = 1;
        } else {
            $condicionDesAreaSolped = ' ';
        }

        if ($bandera != 0) {
            $condicion = " Where codArea <> ''  $condicionDesAreaSolped ";
        }

        // se busca los datos de los tabd del complejo a mostrar
        $query = "  SELECT
                        dm_solped_areas.codArea
                    FROM
                        dm_solped_areas
                        
                    
                    $condicion";
         //     $query; die;
        $datostabs = parent::ObtenerDatos($query);
        $tabsCount = 0;   // controla la posicion del array para el insert en la variable
        // echo $query; die;
        if ($datostabs) { // recorre cada tabs
            return $datostabs;
        } else {
            return $_respuestas->error_401('La Desripcion de la Solped solicitado no tiene datos de ID');
        }
    }

    public function updatePreguntas($codArea)
    {
        require_once 'consumoApi.class.php';
        $_respuestas = new respuestas();

        $preguntasArea['codArea'] = $codArea;
        $preguntasAreaIn = json_encode($preguntasArea);
        $token = '';
        $URLp = 'http://pqvmorsap03.pequiven.com:50000/RESTAdapter/Portal_SIAHO/getRecordsQuestTabReqMM';
        $rs = API::POSTSAP($URLp, $token, $preguntasAreaIn);
        $rs = API::JSON_TO_ARRAY($rs);

        $COD_AREA = $codArea;
        $COD_QUEST = '';
        $cantdadPreguntas = 0;

        if (!isset($rs)) {
            return 'Verifique la Red. Error al conectar con el Servicio de Sap';
            exit;
        }

        foreach ($rs['ZFM_GET_RECORDS_QUEST_TAB.Response']['EX_QUEST_TAB']['item'] as $datosPreguntas) {
            $COD_AREA = $datosPreguntas['COD_AREA'];
            $COD_QUEST = 'quest'.$datosPreguntas['COD_QUEST'];
            $preguntaDescripcion = '';
            // return $datosPreguntas['TEXTO']['item']; die;

            if (count($datosPreguntas['TEXTO']['item']) == 1) {
                $preguntaDescripcion = $datosPreguntas['TEXTO']['item']['TEXTO'];
            } else {
                foreach ($datosPreguntas['TEXTO']['item'] as $pregunta) {
                    $preguntaDescripcion = $preguntaDescripcion.$pregunta['TEXTO'].' ';
                }
            }

            // Buscar si el id de la pregunta esta registrado en la DB
            $query = "Select idquery from dm_solped_preguntas where cod_Area=$COD_AREA and ordenQuery='$COD_QUEST'";

            $existePregunta = parent::nonQuery($query);

            if ($existePregunta) {
                // Update
                $queryPregunta = "	UPDATE 
                                    dm_solped_preguntas 
                                SET 
                                    descripcionQuery='$preguntaDescripcion' 
                                WHERE
                                    cod_Area='$COD_AREA' AND
                                    ordenQuery = '$COD_QUEST'";
            } else {
                // insert
                $queryPregunta = "	 INSERT INTO dm_solped_preguntas (cod_Area, ordenQuery, descripcionQuery, status) 
                                 VALUES ('$COD_AREA','$COD_QUEST', '$preguntaDescripcion',1)";
            }
            $preguntaUpdate = $this->nonQuery($queryPregunta);

            ++$cantdadPreguntas;
        }
        $respuesta['estatus'] = 'OK';

        return $respuesta;
    }

    public function GetRespuetas($solpedSap, $codArea)
    {
        $_respuestas = new respuestas();

        $bandera = 0;
        $condicion = '';

        if ($solpedSap != '') {
            $condicionsolpedSap = " and  dg_solped_respuestas.solpedSapResp = '$solpedSap'";
            $bandera = 1;
        } else {
            $condicionsolpedSap = ' ';
        }

        if ($codArea != '') {
            $condicioncodArea = " and  dg_solped_respuestas.codArea = '$codArea'";
            $bandera = 1;
        } else {
            $condicioncodArea = ' ';
        }

        if ($bandera != 0) {
            $condicion = " Where dg_solped_respuestas.idRespuesta<>''  $condicionsolpedSap $condicioncodArea";
        }

        // se busca los datos de los tabd del complejo a mostrar
        $query = "  SELECT
                        dg_solped_respuestas.idRespuesta AS 'idquery', 
                        dm_solped_preguntas.cod_Area,
                        dm_solped_preguntas.ordenQuery, 
                        dg_solped_respuestas.solpedSapResp, 
                        dg_solped_respuestas.id_Quest, 
                        dm_solped_preguntas.descripcionQuery, 
                        dg_solped_respuestas.estatusResp, 
                        dg_solped_respuestas.fechaValidacionResp, 
                        dg_solped_respuestas.fechaCorreccionResp, 
                        dg_solped_respuestas.observacionResp, 
                        dg_solped_respuestas.creadoPor, 
                        dm_solped_preguntas.idquery
                    FROM
                        dg_solped_respuestas
                        INNER JOIN
                        dm_solped_preguntas
                        ON 
                            dg_solped_respuestas.id_Quest = dm_solped_preguntas.idquery
                    
                    $condicion";
        // echo         $query; die;
        $datostabs = parent::ObtenerDatos($query);
        $tabsCount = 0;   // controla la posicion del array para el insert en la variable
        // echo $query; die;
        if ($datostabs) { // recorre cada tabs
            return $datostabs;
        } else {
            return $_respuestas->error_401('La Desripcion de la Solped solicitado no tiene Respuestas almacenadas');
        }
    }
}
