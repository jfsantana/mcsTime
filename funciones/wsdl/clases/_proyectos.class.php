<?php
/************************************************************
 * Diseñado por Jesus Santana
 * CLASE EMPLEADOS
 * Metodo servidor: $_GET, $_POST, $_PUT, $_DELETE
 *
 * 'clases/empleados.class.php'; <div class=""></div>
 *************************************************************/
if (!isset($_SESSION)) {
    session_start();
}

require_once 'conexion/conexion.php';
require_once 'respuestas.class.php';

// hereda de la clase conexion
class proyectos extends conexion
{
    // Tabla Principal de Empleados
    private $tabla = 'dg_incidencias_header';

    // Tabla Proyectos
    private $proyectoAHOHeaderId = '';
    private $tipoProyectoAHO = '';
    private $gerenciaProyectoAHO = '';
    private $fechaInicioProyectoAHO = '';
    private $fechaFinProyectoAHO = '';
    private $nombreProyectoAHO = '';
    private $descripcionProyectoAHO = '';
    private $responsableProyectoAHO = '';
    private $participantesProyectoAHO = '';
    private $estatus = '';
    private $fechaCreacion = '';
    private $creadoPor = '';

    // Activaciond e token
    private $token = '';

    /***************************************************
     * Autor: Jesus Santana
     * Metodo publico CREATE cualqueir tipo de incicencia metoco POST
     * recibe por POST las variables de los formularios de cualquier incidencia
     * OK
    ***************************************************/
    public function postProyectos($json)
    {
        $_respuestas = new respuestas();
        $datos = json_decode($json, true);

        if (!isset($datos['token'])) {
            return $_respuestas->error_401();
        } else {
            $this->token = $datos['token'];
            // print_r($datos['token']); die;
            $arrayToken = $this->buscarToken();

            if ($arrayToken) {
                if (
                    (!isset($datos['tipoProyectoAHO'])) ||
                    (!isset($datos['gerenciaProyectoAHO'])) ||
                    (!isset($datos['fechaInicioProyectoAHO'])) ||
                    (!isset($datos['fechaFinProyectoAHO'])) ||
                    (!isset($datos['incidencia_tipo'])) ||
                    (!isset($datos['nombreProyectoAHO'])) ||
                    (!isset($datos['descripcionProyectoAHO'])) ||
                    (!isset($datos['responsableProyectoAHO'])) ||
                    (!isset($datos['participantesProyectoAHO'])) ||
                    (!isset($datos['estatus'])) ||
                    (!isset($datos['creadoPor'])) ||
                    (!isset($datos['fechaCreacion']))
                ) {
                    $datosArray = $_respuestas->error_400();
                    echo json_encode($datosArray);
                } else {
                    $this->tipoProyectoAHO = $datos['tipoProyectoAHO'];
                    $this->gerenciaProyectoAHO = $datos['gerenciaProyectoAHO'];
                    $this->fechaInicioProyectoAHO = $datos['fechaInicioProyectoAHO'];
                    $this->fechaFinProyectoAHO = $datos['fechaFinProyectoAHO'];
                    $this->incidencia_tipo = $datos['incidencia_tipo'];
                    $this->nombreProyectoAHO = $datos['nombreProyectoAHO'];
                    $this->descripcionProyectoAHO = $datos['descripcionProyectoAHO'];
                    $this->responsableProyectoAHO = $datos['responsableProyectoAHO'];
                    $this->participantesProyectoAHO = $datos['participantesProyectoAHO'];
                    $this->estatus = $datos['estatus'];
                    $this->creadoPor = $datos['creadoPor'];
                    $this->fechaCreacion = $datos['fechaCreacion'];

                    $inserProyectos = $this->InsertarProyectos();

                    if ($inserProyectos) {
                        $respuesta = $_respuestas->response;
                        $respuesta['status'] = 'OK';
                        $respuesta['result'] = [
                                                    'error_id' => '500',
                                                    'error_msg' => 'Proyecto Generado con exito',
                                                ];
                        print_r(json_encode($respuesta));
                        exit;

                        return $respuesta;
                    } else {
                        return $_respuestas->error_500();
                    }
                }
            } else {
                return $_respuestas->error_401('El Token que envio es invalido o ha caducado');
            }
        }
    }

    /***************************************************
     * Autor: Jesus Santana
     * Metodo private para insertar la cabecera de las incidecnias
     *  OK
    ***************************************************/
    private function InsertarProyectos()
    {
        $query = "insert Into  dg_proyectos_header ( 
            tipoProyectoAHO,
            gerenciaProyectoAHO,
            fechaInicioProyectoAHO,
            fechaFinProyectoAHO,
            nombreProyectoAHO,
            descripcionProyectoAHO,
            responsableProyectoAHO,
            participantesProyectoAHO,
            estatus,
            fechaCreacion,
            creadoPor
            )            
        value
        (   '$this->tipoProyectoAHO',
            '$this->gerenciaProyectoAHO',
            '$this->fechaInicioProyectoAHO',
            '$this->fechaFinProyectoAHO',
            '$this->nombreProyectoAHO',
            '$this->descripcionProyectoAHO',
            '$this->responsableProyectoAHO',
            '$this->participantesProyectoAHO',
            '$this->estatus',
            '$this->fechaCreacion',
            '$this->creadoPor')";
        // echo $query; die;
        $Insertar = parent::nonQueryId($query);

        // print_r ($Insertar);die;
        if ($Insertar) {
            return $Insertar;
        } else {
            return 0;
        }
    }

    /************************************************************
     * Diseñado por Jesus Santana
     * Fecha: 06/08/2022
     * este metodo   mentrega todos los Proyectos para el calendario
     * OK
     *************************************************************/
    public function listaCalendario($tipoProyectoAHO, $gerenciaProyectoAHO, $fechaInicioProyectoAHO, $fechaFinProyectoAHO)
    {
        // tipoIncidenciaId  //subSectorId  TABLA dg_incidencias_header
        $_respuestas = new respuestas();

        $bandera = 0;
        $condicion = '';
        if ($tipoProyectoAHO != '') {
            $condiciontipoProyectoAHO = " and tipoIncidenciaId = '$tipoProyectoAHO'";
            $bandera = 1;
        } else {
            $condiciontipoProyectoAHO = ' ';
        }
        if ($gerenciaProyectoAHO != '') {
            $condiciongerenciaProyectoAHO = " and  subSectorId = '$gerenciaProyectoAHO'";
            $bandera = 1;
        } else {
            $condiciongerenciaProyectoAHO = ' ';
        }
        if ($fechaInicioProyectoAHO != '') {
            $condicionfechaInicioProyectoAHO = " and  fechaCreacion >= '$fechaInicioProyectoAHO'";
            $bandera = 1;
        } else {
            $condicionfechaInicioProyectoAHO = ' ';
        }
        if ($fechaFinProyectoAHO != '') {
            $condicionfechaFinProyectoAHO = " and  fechaCreacion <= '$fechaFinProyectoAHO'";
            $bandera = 1;
        } else {
            $condicionfechaFinProyectoAHO = ' ';
        }

        if ($bandera != 0) {
            $condicion = " Where estatus=1  $condiciontipoProyectoAHO $condiciongerenciaProyectoAHO $condicionfechaInicioProyectoAHO $condicionfechaFinProyectoAHO";
        }

        $query = "  SELECT 	dg_incidencias_header.incidenciaHeaderId AS 'proyectoAHOHeaderId',
                            CASE
                                    dg_incidencias_header.subSectorId 
                                    WHEN 1 THEN
                                    'Gerencial' 
                                    WHEN 2 THEN
                                    'Sin Status' 
                                    WHEN 3 THEN
                                    'Ambiente' 
                                    WHEN 4 THEN
                                    'Seguridad' 
                                    WHEN 5 THEN
                                    'ADYCN' 
                                END AS 'tipoProyectoAHO',
                            CONCAT(
                                'PQV-',
                                dm_complejo.siglas_complejo,
                                '-',
                                CASE
                                        dg_incidencias_header.subSectorId 
                                        WHEN 1 THEN
                                        'Ger' 
                                        WHEN 3 THEN
                                        'A' 
                                        WHEN 4 THEN
                                        'S' 
                                        WHEN 5 THEN
                                        'ADYCN' 
                                    END,
                                '-',
                                dg_incidencias_header.incidenciaHeaderId 
                            ) AS 'title',
                            CONCAT('/dashboard.php?activo=inspeccionesambientalesDetalle&bandera=2&tipo_incidencia=',tipoIncidenciaId,'&codigo_incidencia=',incidenciaHeaderId) AS url,
                            
                            CASE
                                WHEN dg_incidencias_header.subSectorId  = '1' THEN
                                '#FFC707' 
                                WHEN dg_incidencias_header.subSectorId  = '2' THEN
                                '#17a2b8' 
                                WHEN dg_incidencias_header.subSectorId  = '3' THEN
                                '#007bff' 
                                WHEN dg_incidencias_header.subSectorId  = '4' THEN
                                '#28a745' 
                                WHEN dg_incidencias_header.subSectorId  = '5' THEN
                                '#DC3545' 
                            END AS backgroundColor,
                            '#CCC' AS borderColor,
                            dg_incidencias_header.tipoIncidenciaId,
                            dg_incidencias_header.gerenciaId,
                            dg_incidencias_header.areaId,
                            dg_incidencias_header.custorioID,
                            dg_incidencias_header.fechaEjecucionFin AS `end`,
                            dg_incidencias_header.creadorId,
                            dg_incidencias_header.sectorId,
                            dg_incidencias_header.subSectorId,
                            dg_incidencias_header.fechaEjecucionInicio AS `start`,
                            dg_incidencias_header.complejoId,
                            dg_incidencias_header.estatus,
                            dg_incidencias_header.fechaCreacion,
                            dg_incidencias_header.ubicacion,
                            dg_incidencias_header.aspectos,
                            dg_incidencias_header.condiciones 
                     FROM dg_incidencias_header
	                    INNER JOIN dm_complejo ON dg_incidencias_header.complejoId = dm_complejo.id_complejo
                    $condicion  or subSectorId = '1'
                    ORDER BY   `start`";

        $datosHeader = parent::ObtenerDatos($query);
        $tabsCount = 0;   // controla la posicion del array para el insert en la variable

        if ($datosHeader) { // recorre cada tabs
            return $datosHeader;
        } else {
            return $_respuestas->error_401('No existen datos para estos filtros');
        }
    }

    public function put($json)
    {
        $_respuestas = new respuestas();
        $datos = json_decode($json, true);

        if (!isset($datos['token'])) {
            return $_respuestas->error_401();
        } else {
            $this->token = $datos['token'];
            $arrayToken = $this->buscarToken();

            if ($arrayToken) {
                // solo validamos que tenga la clave primaria para poder eliminar correctamente el resgitro
                if (
                    !isset($datos['id'])
                ) {
                    // en caso de que la validacion no se cumpla se arroja un error
                    $datosArray = $_respuestas->error_400();
                    echo json_encode($datosArray);
                } else {
                    // Asignacion de datos validados su existencia en el If anterior
                    $this->id = $datos['id'];
                    // Asignacion del resto de los campos sin validacion
                    if (isset($datos['empleados_nroPersonal'])) {
                        $this->empleados_nroPersonal = $datos['empleados_nroPersonal'];
                    }
                    if (isset($datos['empleados_cedula'])) {
                        $this->empleados_cedula = $datos['empleados_cedula'];
                    }
                    if (isset($datos['cargoSap'])) {
                        $this->cargoSap = $datos['cargoSap'];
                    }
                    if (isset($datos['password'])) {
                        $this->password = $datos['password'];
                    }
                    if (isset($datos['nombre'])) {
                        $this->nombre = $datos['nombre'];
                    }
                    if (isset($datos['userSap'])) {
                        $this->userSap = $datos['userSap'];
                    }
                    if (isset($datos['cargoActual'])) {
                        $this->cargoActual = $datos['cargoActual'];
                    }
                    if (isset($datos['creador'])) {
                        $this->creador = $datos['creador'];
                    }
                    if (isset($datos['fechaCreacion'])) {
                        $this->fechaCreacion = $datos['fechaCreacion'];
                    }
                    if (isset($datos['activo'])) {
                        $this->activo = $datos['activo'];
                    }

                    // llama a la funcion de insertar
                    $resp = $this->UpdateInspecciones();

                    // valida que paso d/rante el inser
                    if ($resp) {
                        $respuesta = $_respuestas->response;
                        $respuesta['result'] = [
                            'Id' => $this->id,
                        ];

                        return $respuesta;
                    } else {
                        return $_respuestas->error_500();
                    }
                }
            } else {
                return $_respuestas->error_401('El Token que envio es invalido o ha caducado');
            }
        }
    }

    private function UpdateInspecciones()
    {
        $query = 'update '.$this->tabla." set empleados_cedula = $this->empleados_cedula , 
        empleados_nroPersonal =$this->empleados_nroPersonal, 
        password ='$this->password', 
        nombre ='$this->nombre', 
        userSap = '$this->userSap', 
        cargoSap = '$this->cargoSap', 
        cargoActual = '$this->cargoActual', 
        creador = '$this->creador', 
        fechaCreacion = '$this->fechaCreacion', 
        activo = '$this->activo'
        WHERE id = $this->id";

        // print_r ($query);die;

        $update = parent::nonQuery($query);

        if ($update >= 1) {
            return $update;
        } else {
            return 0;
        }
    }

    public function delete($json)
    {
        $_respuestas = new respuestas();
        $datos = json_decode($json, true);

        if (!isset($datos['token'])) {
            return $_respuestas->error_401();
        } else {
            $this->token = $datos['token'];
            $arrayToken = $this->buscarToken();

            if ($arrayToken) {
                // solo validamos que tenga la clave primaria para poder eliminar correctamente el resgitro
                if (
                    !isset($datos['id'])
                ) {
                    // en caso de que la validacion no se cumpla se arroja un error
                    $datosArray = $_respuestas->error_400();
                    echo json_encode($datosArray);
                } else {
                    // Asignacion de datos validados su existencia en el If anterior
                    $this->id = $datos['id'];

                    // llama a la funcion de insertar
                    $resp = $this->EliminarInspecciones();

                    // valida que paso d/rante el inser
                    if ($resp) {
                        $respuesta = $_respuestas->response;
                        $respuesta['result'] = [
                            'Msg' => "eliminado el registro $this->id",
                        ];

                        return $respuesta;
                    } else {
                        return $_respuestas->error_500();
                    }
                }
            } else {
                return $_respuestas->error_401('El Token que envio es invalido o ha caducado');
            }
        }
    }

    private function EliminarInspecciones()
    {
        $query = "delete from $this->tabla 
        WHERE id = $this->id";

        $update = parent::nonQuery($query);

        if ($update >= 1) {
            return $update;
        } else {
            return 0;
        }
    }

    /***************************************************
     * Autor: Jesus Santana
     * Metodo private para verificar que el Token existe
     *
    ***************************************************/
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

    /***************************************************
     * Autor: Jesus Santana
     * Metodo private actualizar la fecha del token
     *
    ***************************************************/
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
}
