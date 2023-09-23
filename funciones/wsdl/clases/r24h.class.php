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

// hereda de la clase conexion
class r24h extends conexion
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

    /************************************************************
     * Diseñado por Jesus Santana
     * Fecha: 06/08/2022
     * este metodo de la funcion R24H  mentrega todos los Tabs y los equipos para la carga de un reporte fintrado por complejo_id
     * OK
     *************************************************************/
    public function precargaR24H($complejo_id = 0)
    {
        $_respuestas = new respuestas();
        $condicion = '';
        if ($complejo_id != 0) {
            $condicion = " where dg_r24h_precarga.complejoId = $complejo_id";
        }
        $query = "SELECT DISTINCT
                    dg_r24htabs.R24HTabsId,
                    dg_r24htabs.descripcion,
                    dg_r24htabs.posicion
                FROM
                dg_r24h_precarga
                INNER JOIN dg_r24htabs ON dg_r24htabs.R24HTabsId = dg_r24h_precarga.tabs
                INNER JOIN dm_complejo ON dm_complejo.id_complejo = dg_r24h_precarga.complejoId
                $condicion
                order by 3";
        $datosTabs = parent::ObtenerDatos($query);
        $tabsCount = 0;   // controla la posicion del array para el insert en la variable

        if ($datosTabs) { // recorre cada tabs
            foreach ($datosTabs as $Tabs) {
                $estructuraR24H[$tabsCount]['tabs'] = $Tabs; // guarta los dtos del tabs  //print_r($estructuraR24H); die;
                $condicionTabsEquipo = '';
                if ($Tabs['R24HTabsId']) {
                    $condicionTabsEquipo = " where dg_r24h_precarga.complejoId =$complejo_id and  dg_r24h_precarga.tabs = ".$Tabs['R24HTabsId'].'';
                }
                $querytablsEquipos = "SELECT
                                        dg_r24h_precarga.equipoId,
                                        dm_equipos.nombre,
                                        dg_r24h_precarga.tipoInput
                                      FROM
                                        dg_r24h_precarga
                                        INNER JOIN dm_equipos ON dg_r24h_precarga.equipoId = dm_equipos.equipoId                
                                      $condicionTabsEquipo
                                      order by 1";

                $datosTabsEquipos = parent::ObtenerDatos($querytablsEquipos);
                $estructuraR24H[$tabsCount]['TabsEquipos'] = $datosTabsEquipos;   // inserta los equipos en el array de salida
                ++$tabsCount;
            }

            return $estructuraR24H;
        } else {
            return $_respuestas->error_401('El complejo solicitado no tiene datos de Precarga');
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
     * OK
     *************************************************************/
    public function postR24h($json)
    {
        $_respuestas = new respuestas();

        $datos = json_decode($json, true);

        if (!isset($datos['header']['token'])) {
            return $_respuestas->error_401();
        } else {
            $this->token = $datos['header']['token'];

            $arrayToken = $this->buscarToken();

            if ($arrayToken) {
                $fechaCreacion = date('Y-m-d');

                // valida los campos obligatorios
                if (
                    (!isset($datos['header']['Turno'])) ||
                    (!isset($datos['header']['complejo_id'])) ||
                    (!isset($datos['header']['Supervisor']))
                ) {
                    // en caso de que la validacion no se cumpla se arroja un error
                    $datosArray = $_respuestas->error_400();
                    echo json_encode($datosArray);
                } else {
                    $this->turno = $datos['header']['Turno'];
                    $this->complejo_id = $datos['header']['complejo_id'];
                    $this->Supervisor = $datos['header']['Supervisor'];
                    $this->Observacion = '';
                    $this->status = 1;
                    $this->fechaCreacion = $fechaCreacion;

                    // llama a la funcion de insertar y recibe el id del header insertado
                    $rep24hHeaderDatos = $this->InsertarR24hHeader();

                    // valida que paso d/rante el inser
                    if ($rep24hHeaderDatos) {
                        $i = 0;
                        $insertArray = '';

                        foreach ($datos['Equipos'] as $respuestas) {
                            $equipoCode = trim(key($datos['Equipos']));
                            $equipoId = substr($equipoCode, -2);
                            $tabsID = substr($equipoCode, -5);
                            $tabsID = substr($tabsID, 0, 2);

                            $resp = '';
                            $Observacion = '';

                            foreach ($respuestas as $key => $value) {
                                if ($key == 'Resp') {
                                    if (isset($value)) {
                                        $resp = $value;
                                    }
                                } elseif ($key == 'Observacion') {
                                    if (isset($value)) {
                                        $Observacion = $value;
                                    }
                                    $Observacion = $value;
                                }
                            }
                            $insertArray = $insertArray.('('.$rep24hHeaderDatos.',"'.$equipoId.'","'.@$resp.'","'.@$Observacion.'",'.$tabsID.'),');
                            next($datos['Equipos']);
                        }
                        // print_r(json_encode($insertArray)); die;
                        $insertArray = substr($insertArray, 0, -1);
                        $insertArray = 'insert into dg_r24h_body ( R24HHeader, equipoId, respuesta, observacion,tabs) value '.$insertArray;
                        $rep24hEquiposEquipos = $this->InsertarR24hEquipos($insertArray);

                        if ($rep24hHeaderDatos || $rep24hEquiposEquipos) {
                            $respuesta = $_respuestas->response;
                            $respuesta['status'] = 'OK';
                            $respuesta['result'] = [
                                'error_id' => '200',
                                'error_msg' => 'Reporte Generado con exito',
                                'R24Hid' => $rep24hHeaderDatos,
                            ];

                            return $respuesta;
                        }
                    } else {
                        return $_respuestas->error_500();
                    }
                }
            } else {
                return $_respuestas->error_401('El Token que envio es invalido o ha caducado');
            }
        }
    }

    /************************************************************
     * Diseñado por Jesus Santana
     * Fecha: 06/08/2022
     * este metodo de la funcion R24H  Inserta la cabecera del reporte
     * OK
     *************************************************************/
    private function InsertarR24hHeader()
    {
        $query = "insert Into dg_r24h_header (  fechaCreacion, complejoId, supervisor, status, observacion, turno)
        value
        ('$this->fechaCreacion','$this->complejo_id','$this->Supervisor','$this->status','$this->Observacion','$this->turno')";
        // return  $query ; die;
        $Insertar = parent::nonQueryId($query);

        if ($Insertar) {
            return $Insertar;
        } else {
            return 0;
        }
    }

    /************************************************************
     * Diseñado por Jesus Santana
     * Fecha: 06/08/2022
     * este metodo de la funcion R24H  Inserta los equipos del reporte
     * OK
     *************************************************************/
    private function InsertarR24hEquipos($insertArray)
    {
        $query = $insertArray;

        $Insertar = parent::nonQueryId($query);

        if ($Insertar) {
            return $Insertar;
        } else {
            return 0;
        }
    }

    /************************************************************
     * Diseñado por Jesus Santana
     * Fecha: 06/08/2022
     * este metodo de la funcion R24H  mentrega todos los Tabs y los equipos para la carga de un reporte fintrado por complejo_id
     * OK
     *************************************************************/
    public function consultaR24hHeader($Turno, $complejo_id, $Supervisor, $fechaCreacion)
    {
        $_respuestas = new respuestas();

        $bandera = 0;
        $condicion = '';
        if ($Turno != '') {
            $condicionTurno = " and dg_r24h_header.Turno = '$Turno'";
            $bandera = 1;
        } else {
            $condicionTurno = ' ';
        }
        if ($complejo_id != '') {
            $condicioncomplejo_id = " and  dg_r24h_header.complejoId = $complejo_id";
            $bandera = 1;
        } else {
            $condicioncomplejo_id = ' ';
        }
        if ($Supervisor != '') {
            $condicionSupervisor = " and  dg_r24h_header.Supervisor = '$Supervisor'";
            $bandera = 1;
        } else {
            $condicionSupervisor = ' ';
        }
        if ($fechaCreacion != '') {
            $condicionfechaCreacion = " and  dg_r24h_header.fechaCreacion = '$fechaCreacion'";
            $bandera = 1;
        } else {
            $condicionfechaCreacion = ' ';
        }

        if ($bandera != 0) {
            $condicion = " Where status=1  $condicionTurno $condicioncomplejo_id $condicionSupervisor $condicionfechaCreacion";
        }

        $query = "SELECT DISTINCT
                    dg_r24h_header.R24Hid, 
                    dg_r24h_header.fechaCreacion, 
                    dg_r24h_header.complejoId, 
                    dg_r24h_header.turno, 
                    dg_r24h_header.supervisor, 
                    dm_complejo.siglas_complejo, 
                    dm_complejo.nombre_complejo
                FROM
                    dg_r24h_header
                    INNER JOIN
                    dg_r24h_body
                    ON 
                        dg_r24h_header.R24Hid = dg_r24h_body.R24HHeader
                    INNER JOIN
                    dm_complejo
                    ON 
                        dg_r24h_header.complejoId = dm_complejo.id_complejo 
                    $condicion
                    order by 2";
        // echo   $query ; die;
        $datosHeader = parent::ObtenerDatos($query);
        $tabsCount = 0;   // controla la posicion del array para el insert en la variable

        if ($datosHeader) { // recorre cada tabs
            return $datosHeader;
        } else {
            return $_respuestas->error_401('El complejo solicitado no tiene datos de Precarga');
        }
    }

    public function consultaR24hEquipos($R24Hid)
    {
        $_respuestas = new respuestas();

        $bandera = 0;
        $condicion = '';

        if ($R24Hid != '') {
            $condicionfechaCreacion = " and  dg_r24h_header.R24Hid = $R24Hid";
            $bandera = 1;
        } else {
            $condicionfechaCreacion = ' ';
        }

        if ($bandera != 0) {
            $condicion = " Where dg_r24h_header.R24Hid  <>'' $condicionfechaCreacion ";
        }

        // se busca los datos de los tabd del complejo a mostrar
        $query = "SELECT DISTINCT
                        dg_r24h_header.R24Hid, 
                        dg_r24h_header.fechaCreacion, 
                        dg_r24h_header.complejoId, 
                        dg_r24h_header.supervisor, 
                        dg_r24h_header.turno, 
                        dg_r24htabs.R24HTabsId,
                        dg_r24htabs.posicion, 
                        dg_r24htabs.descripcion, 
	                    dg_r24h_precarga.tipoInput
                    FROM
                        dg_r24h_header
                        INNER JOIN
                        dg_r24h_precarga
                        ON 
                            dg_r24h_header.complejoId = dg_r24h_precarga.complejoId
                        INNER JOIN
                        dg_r24htabs
                        ON 
                            dg_r24h_precarga.tabs = dg_r24htabs.R24HTabsId
                    
                    $condicion
                    order by dg_r24htabs.posicion";
        $datostabs = parent::ObtenerDatos($query);
        $tabsCount = 0;   // controla la posicion del array para el insert en la variable
        // echo $query; die;
        if ($datostabs) { // recorre cada tabs
            foreach ($datostabs as $Tabs) {
                $estructuraR24H[$tabsCount]['tabs'] = $Tabs;

                $condicionTabsEquipo = '';
                if ($R24Hid) {
                    $condicionTabsEquipo = ' where siaho_bd.dg_r24h_body.R24HHeader='.$Tabs['R24Hid'].' and dg_r24h_body.tabs='.$Tabs['R24HTabsId'];
                }
                $querytablsEquipos = "SELECT DISTINCT
                                        dg_r24h_body.*, 
                                        dm_equipos.nombre, 
                                        dg_r24h_precarga.tipoInput
                                    FROM
                                        dg_r24h_body
                                        INNER JOIN
                                        dm_equipos
                                        ON 
                                            dg_r24h_body.equipoId = dm_equipos.equipoId
                                        INNER JOIN
                                        dg_r24h_precarga
                                        ON 
                                            dg_r24h_body.tabs = dg_r24h_precarga.tabs  
                                  $condicionTabsEquipo
                                  order by 1";
                $datosTabsEquipos = parent::ObtenerDatos($querytablsEquipos);
                $estructuraR24H[$tabsCount]['TabsEquipos'] = $datosTabsEquipos;   // inserta los equipos en el array de salida

                ++$tabsCount;
            }

            return $estructuraR24H;
        } else {
            return $_respuestas->error_401('El complejo solicitado no tiene datos de Precarga');
        }
    }
}
