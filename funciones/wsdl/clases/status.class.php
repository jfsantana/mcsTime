<?php
/************************************************************
 * Diseñado por Jesus Santana
 * CLASE EMPLEADOS
 * Metodo servidor: $_GET, $_POST, $_PUT, $_DELETE
 *
 * 'clases/empleados.class.php';
 *************************************************************/
if (!isset($_SESSION)) {
    session_start();
}

require_once 'conexion/conexion.php';
require_once 'respuestas.class.php';

// hereda de la clase conexion
class status extends conexion
{
    // variables para automatizar el mismo servicio para todos los procesos
    private $incidenciaHeaderId = '';
    private $tipoIncidenciaId = '';

    // Activaciond e token
    private $token = '';

    /***************************************************
     * Autor: Jesus Santana
     * Metodo publico que entrega todas las incidencias teneradas por tipo
     * aplicando los filtros de la cabecera
    ***************************************************/
    public function statusInspeccion($incidenciasHederId)
    {
        $_respuestas = new respuestas();
        if ($incidenciasHederId != '') {
            $aspectos = " where dg_incidencias_header.incidenciaHeaderId = $incidenciasHederId";
            $query = "select * from dg_incidencias_header  $aspectos";
            $datos = parent::ObtenerDatos($query);
        }

        if ($datos) {
            return $datos;
        } else {
            $respuesta['status'] = 'OK';
            $respuesta['result'] = [
                                        'MSG' => 'No se encontraron Valores',
                                    ];
        }

        return $respuesta;
    }

    /***************************************************
     * Autor: Jesus Santana
     * Metodo publico que entrega todas hallazgo abiertos de una inspeccion
     * que se se filtra por sector, complejo, gerencia y area
    ***************************************************/
    public function statusUpdate($incidenciaHeaderId,
                                $statusUpdate)
    {
        $_respuestas = new respuestas();
        $bandera = 0;
        if ($incidenciaHeaderId != '') {
            $condicion = " WHERE  dg_incidencias_header.incidenciaHeaderId = '$incidenciaHeaderId'";
            if ($statusUpdate != '') {
                $query = "   UPDATE  dg_incidencias_header 
                             SET     dg_incidencias_header.estatus = $statusUpdate
                             $condicion";
                $update = parent::nonQuery($query);
                
            }
        }
        if (@$update) {
            $respuesta['status'] = 'OK';
            $respuesta['result'] = [
                                        'MSG' => 'Se actualizo correctamente',
                                    ];
        } else {
            $respuesta['status'] = 'error';
            $respuesta['result'] = [
                                        'MSG' => 'No se realizo la actualizacion',
                                    ];
        }

        return $respuesta;
    }

        public function obtenerInspecciones($NumPersonal)
        {
            $query = 'select * from '.$this->tabla." where npe_usu ='$NumPersonal'";

            return parent::ObtenerDatos($query);
        }

    /***************************************************
         * Autor: Jesus Santana
         * Metodo publico CREATE cualqueir tipo de incicencia metoco POST
         * recibe por POST las variables de los formularios de cualquier incidencia
        ***************************************************/
    public function postHeader($json)
    {
        // ruta para almacenar las imagenes de las inspecciones
        $patch = $_SERVER['DOCUMENT_ROOT'].'/siaho/public/attachment/inspecciones/';
        $_respuestas = new respuestas();

        $datos = json_decode($json, true);

        if (!isset($datos['token'])) {
            return $_respuestas->error_401();
        } else {
            $this->token = $datos['token'];
            $arrayToken = $this->buscarToken();

            if ($arrayToken) {
                // valida los campos obligatorios
                if (
                    (!isset($datos['header']['tipo'])) ||
                    (!isset($datos['header']['sector'])) ||
                    (!isset($datos['header']['fecha'])) ||
                    (!isset($datos['header']['complejo'])) ||
                    (!isset($datos['header']['gerencia'])) ||
                    (!isset($datos['header']['custodio'])) ||
                    (!isset($datos['header']['estatus'])) ||
                    (!isset($datos['header']['subsector']))
                ) {
                    // en caso de que la validacion no se cumpla se arroja un error
                    $datosArray = $_respuestas->error_400();
                    echo json_encode($datosArray);
                } else {
                    // Asignacion de datos validados su existencia
                    $this->tipoIncidenciaId = $datos['header']['tipo'];
                    $this->gerenciaId = $datos['header']['gerencia'];
                    $this->areaId = $datos['header']['area'];
                    $this->custorioID = $datos['header']['custodio'];
                    $this->fechaEjecucionFin = $datos['header']['fecha'];
                    $this->creadorId = $datos['header']['creadoPor'];
                    $this->sectorId = $datos['header']['sector'];
                    $this->subSectorId = $datos['header']['subsector'];
                    $this->fechaEjecucionInicio = $datos['header']['fecha'];
                    $this->complejoId = $datos['header']['complejo'];
                    $this->ubicacion = $datos['header']['ubicacion'];
                    $this->FechaCreacion = date('Y-m-d');

                    if ($this->tipoIncidenciaId == 1) {
                        $ruta = 'incidencias';
                        $this->aspectos = 'N/A';
                        $this->condiciones = 'N/A';
                    } elseif ($this->tipoIncidenciaId == 2) {
                        $ruta = 'diagnosticos';
                        $this->aspectos = $datos['header']['aspectos'];
                        $this->condiciones = $datos['header']['condiciones'];
                    } elseif ($this->tipoIncidenciaId == 3) {
                        $ruta = 'eventos';
                        $this->aspectos = 'N/A';
                        $this->condiciones = 'N/A';
                    }

                    /***************************************************************
                     * llama a la funcion de insertar y recibe el id del header insertado
                     * funciona para todos los tipos de incidencias
                     * en el caso de que laincidencia no aplicque los cambios aparce N/A
                     * **************************************************************/
                    $inspeccionHeader = $this->InsertarInspeccionesHeader();

                    // valida la insercion de la cabecera
                    if ($inspeccionHeader) {
                        /***************************************************************
                         * Inserta los adjuntos de cualqueira sea el tipo de incicencias
                         * **************************************************************/
                        $idFoto = 1;
                        if (@$datos['header']['adjuntos'][0] != null) {
                            foreach ($datos['header']['adjuntos'] as $adjuntos) {
                                $nombreImagenGuardada = $inspeccionHeader.'-'.$idFoto.'.'.substr($adjuntos['tipo'], -4);
                                $patch = $_SERVER['DOCUMENT_ROOT']."/siaho/public/attachment/inspecciones/$ruta/";
                                $this->incidenciasId = $inspeccionHeader;
                                $this->patch = $patch;
                                $this->nombre = $nombreImagenGuardada;
                                $this->tipo = $adjuntos['tipo'];
                                $this->imagen = $adjuntos['base64'];
                                $this->nombreOriginal = $adjuntos['nombre'];

                                $inspeccionAdjuntoInsert = $this->InsertarInspeccionesAdjunto($this->tipoIncidenciaId);

                                if ($inspeccionAdjuntoInsert) {
                                    // guarda el archivo en una ubicaicon fisica del servidor
                                    $imagenCodificada = $adjuntos['base64'];
                                    $imagenDecodificada = base64_decode($imagenCodificada);
                                    file_put_contents($patch.$nombreImagenGuardada, $imagenDecodificada);
                                }
                                ++$idFoto;
                            }
                        }

                        /***************************************************************
                        * proceos insert de hallazgos de la incidencia tipo 1
                        * **************************************************************/
                        if ($this->tipoIncidenciaId == 1) {
                            $insertArray = '';
                            // print_r($datos['hallazgosNew']); die;
                            foreach ($datos['hallazgosNew'] as $hallazgosNew) {
                                // print_r($hallazgosNew); die;
                                $resp = '';
                                $hallazgodescripcion = $hallazgosNew['descripcion'];
                                $this->descripcion = $hallazgodescripcion;

                                // $this->responsable = $hallazgosNew['incidencia_responsable'];
                                $this->creadoPor = $datos['header']['creadoPor'];
                                $this->estatus = 1;
                                $this->danoAmbiental = 'N/A';
                                $this->causaEvento = 'N/A';

                                $inspeccionHallazgo = $this->InsertarInspeccionesHallazgo($inspeccionHeader);

                                foreach ($hallazgosNew['recomendacion'] as $key) {
                                    $descripcionHallazgo = $key['descripcion'];
                                    $responsableHallazgo = $key['responsable'];

                                    $this->recomendacionesId = '';
                                    $this->descripcionRecomendacion = $descripcionHallazgo;
                                    $this->fechaCreacionRecomendacion = date('Y-m-d');
                                    $this->responsableRecomendacion = $responsableHallazgo;
                                    $this->estatusRecomendacion = 1;

                                    $inspeccionRecomendaciones = $this->InsertarInspeccionesRecomendaciones($inspeccionHeader, $inspeccionHallazgo, $this->tipoIncidenciaId);
                                }
                            }
                        }
                        /***************************************************************
                        * proceos insert de hallazgos de la incidencia tipo 2
                        * **************************************************************/
                        elseif ($this->tipoIncidenciaId == 2) {
                            // inseta los hallazgos de las incidencias TIPO = 2 diagnostico
                            $insertArray = '';

                            foreach ($datos['hallazgosNew'] as $hallazgosNew) {
                                $resp = '';
                                $hallazgodescripcion = $hallazgosNew['incidencia_hallazgo_descripcion'];
                                $this->descripcion = $hallazgodescripcion;
                                $this->responsable = $datos['header']['creadoPor'];
                                $this->creadoPor = $datos['header']['creadoPor'];
                                $this->estatus = 1;

                                $this->danoAmbiental = 'N/A';
                                $this->causaEvento = 'N/A';

                                $inspeccionHallazgo = $this->InsertarInspeccionesHallazgo($inspeccionHeader);

                                foreach ($hallazgosNew['hallazgorecomendaciones'] as $key) {
                                    $descripcionHallazgo = $key['incidencia_recomendacion'];
                                    $responsableHallazgo = 'N/A';

                                    $this->recomendacionesId = '';
                                    $this->descripcionRecomendacion = $descripcionHallazgo;
                                    $this->fechaCreacionRecomendacion = date('Y-m-d');
                                    $this->responsableRecomendacion = $responsableHallazgo;
                                    $this->estatusRecomendacion = 1;

                                    $inspeccionRecomendaciones = $this->InsertarInspeccionesRecomendaciones($inspeccionHeader, $inspeccionHallazgo, $this->tipoIncidenciaId);
                                }
                            }
                        }
                        /***************************************************************
                        * proceos insert de hallazgos de la incidencia tipo 3
                        * **************************************************************/
                        elseif ($this->tipoIncidenciaId == 3) {
                            // inseta los hallazgos de las incidencias TIPO = 2 diagnostico
                            $insertArray = '';

                            $resp = '';

                            $hallazgodescripcion = $datos['hallazgosNew']['descripcion'];
                            $this->descripcion = $hallazgodescripcion;
                            $this->responsable = 'N/A';
                            $this->creadoPor = $datos['header']['creadoPor'];
                            $this->estatus = 1;

                            $this->tipo = $datos['hallazgosNew']['tipoevento'];
                            $this->heredadas = '0';
                            $this->danoAmbiental = $datos['hallazgosNew']['danioambiental'];
                            $this->causaEvento = $datos['hallazgosNew']['causas'];

                            $inspeccionHallazgo = $this->InsertarInspeccionesHallazgo($inspeccionHeader);
                        }

                        /**************************************************************
                         * Valida que todos los insert del proceso se ejecutaran correctamente para enviar el mensaje
                         *******************************************************************/

                        if ($inspeccionHeader || $inspeccionHallazgo || $inspeccionRecomendaciones) {
                            $respuesta = $_respuestas->response;
                            $respuesta['status'] = 'OK';
                            $respuesta['result'] = [
                                                        'MSG' => 'Inspeccion Generada con exito',
                                                    ];

                            return $respuesta;
                        } else {
                            return $_respuestas->error_500();
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

    /***************************************************
     * Autor: Jesus Santana
     * Metodo private para insertar la cabecera de las incidecnias
     *
    ***************************************************/
    private function InsertarInspeccionesHeader()
    {
        $query = 'insert Into '.$this->tabla."( 
                        tipoIncidenciaId, 
                        gerenciaId,
                        areaId, 
                        custorioID, 
                        fechaEjecucionFin, 
                        creadorId, 
                        sectorId, 
                        subSectorId, 
                        fechaEjecucionInicio, 
                        complejoId, 
                        estatus,  
                        fechaCreacion, 
                        ubicacion,
                        aspectos,
                        condiciones)            
        value
        (   '$this->tipoIncidenciaId',
            '$this->gerenciaId',
            '$this->areaId',
            '$this->custorioID',
            '$this->fechaEjecucionFin',
            '$this->creadorId',
            '$this->sectorId',
            '$this->subSectorId',
            '$this->fechaEjecucionInicio',
            '$this->complejoId',
            '1',
            '$this->FechaCreacion',
            '$this->ubicacion',
            '$this->aspectos',
            '$this->condiciones')";
        // echo $query; die;
        $Insertar = parent::nonQueryId($query);

        // print_r ($Insertar);die;
        if ($Insertar) {
            return $Insertar;
        } else {
            return 0;
        }
    }

    /***************************************************
     * Autor: Jesus Santana
     * Metodo private para insertar los hallazgos de las incidecnias
     *
    ***************************************************/
    private function InsertarInspeccionesHallazgo($inspeccionHeader)
    {
        $query = "insert Into dg_incidencias_hallazgos (  incidenciaHeaderId, 
                                                    descripcion, 
                                                    fechaInicio, 
                                                    FechaFin, 
                                                    FechaCreacion, 
                                                    responsable, 
                                                    creadoPor, 
                                                    estatus,
                                                    heredadas,
                                                    danoAmbiental,
                                                    causaEvento)
                value
                (   '$inspeccionHeader',
                    '$this->descripcion',
                    '$this->fechaInicio',
                    '$this->FechaFin',
                    '$this->FechaCreacion',
                    '$this->responsable',
                    '$this->creadorId',
                    '$this->estatus',
                    '0',
                    '$this->danoAmbiental',
                    '$this->causaEvento')";
        // echo $query ;die;
        $Insertar = parent::nonQueryId($query);

        if ($Insertar) {
            return $Insertar;
        } else {
            return 0;
        }
    }

    /***************************************************
     * Autor: Jesus Santana
     * Metodo private para insertar los adjuntos de las incidecnias
     *
    ***************************************************/
    private function InsertarInspeccionesAdjunto($tipoIncidenciaId)
    {
        $query = "insert Into dg_incidencias_attachament (  incidenciasId, patch, nombre, tipo, imagen, nombreOriginal, tipoIncidencia)
                value
                ('$this->incidenciasId','$this->patch','$this->nombre','$this->tipo','$this->imagen ','$this->nombreOriginal','$tipoIncidenciaId')";
        $Insertar = parent::nonQueryId($query);
        // echo  $query; die;
        if ($Insertar) {
            return $Insertar;
        } else {
            return 0;
        }
    }

    /***************************************************
     * Autor: Jesus Santana
     * Metodo private para insertar las recomencaciones de las incidecnias
     *
    ***************************************************/
    private function InsertarInspeccionesRecomendaciones($inspeccionHeader, $inspeccionHallazgo, $tipo)
    {
        $query = "insert Into dg_incidencias_recomendaicones (   incidenciaBodyId, 
                                                    descripcion, 
                                                    fechaCreacion, 
                                                    fechaInicio, 
                                                    fechaPlanificaicon, 
                                                    responsable, 
                                                    estatus, 
                                                    creadoPor)
                            value
                            (   '$inspeccionHallazgo',
                                '$this->descripcionRecomendacion',
                                '$this->fechaCreacionRecomendacion',
                                '$this->fechaInicioRecomendacion',
                                '$this->fechaFinRecomendacion',
                                '$this->responsableRecomendacion', 
                                '$this->estatusRecomendacion',
                                '$this->creadorId')";

        $Insertar = parent::nonQueryId($query);

        if ($Insertar) {
            return $Insertar;
        } else {
            return 0;
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
        $query = "update dg_empleado_token set date = '$date' where empleadoTokenId = '$tokenId'";
        $resp = parent::nonQuery($query);

        if ($resp >= 1) {
            return $resp;
        } else {
            return 0;
        }
    }

    public function detalleIncidenciaId($detalleIncidenciaId)
    {
        $_respuestas = new respuestas();
        $condicion = '';
        if ($detalleIncidenciaId != 0) {
            $condicion = " WHERE incidenciaHeaderId =  $detalleIncidenciaId ";
        } else {
            return $_respuestas->error_401('No es valido el numero de Inspeccion, vuelva a intenarlo');
        }

        $queryHeader = "  SELECT 
                            dg_incidencias_header.incidenciaHeaderId, 
                            dg_incidencias_header.tipoIncidenciaId, 
                            dg_incidencias_header.complejoId, 
                            dm_complejo.nombre_complejo, 
                            dg_incidencias_header.gerenciaId, 
                            dm_gerencia.nombre as nomGerencia, 
                            dg_incidencias_header.areaId, 
                            dm_area.des_area, 
                            dg_incidencias_header.sectorId, 
                            dm_sector.nombre as nomSector, 
                            dg_incidencias_header.subSectorId, 
                            dm_subsector.nombre, 
                            dg_incidencias_header.custorioID, 
                            dg_incidencias_header.creadorId, 
                            dg_incidencias_header.fechaEjecucionInicio, 
                            dg_incidencias_header.estatus, 
                            dg_incidencias_header.fechaCreacion, 
                            dg_incidencias_header.ubicacion, 
                            dg_incidencias_header.aspectos, 
                            dg_incidencias_header.condiciones
                            FROM 
                            dg_incidencias_header
                                LEFT JOIN
                                dm_complejo
                                ON 
                                    dg_incidencias_header.complejoId = dm_complejo.id_complejo
                                LEFT JOIN
                                dm_gerencia
                                ON 
                                    dg_incidencias_header.gerenciaId = dm_gerencia.gerencia_id
                                LEFT JOIN
                                dm_sector
                                ON 
                                    dg_incidencias_header.sectorId = dm_sector.sectorId
                                LEFT JOIN
                                dm_subsector
                                ON 
                                    dg_incidencias_header.subSectorId = dm_subsector.subsectorId
                                LEFT JOIN
                                dm_area
                                ON 
                                    dg_incidencias_header.areaId = dm_area.id_area
                                    $condicion ";

        $datosHeader = parent::ObtenerDatos($queryHeader);

        if ($datosHeader) {
            /****cabecera */
            foreach ($datosHeader  as $header) {
                $inspeccion['inspeccion'] = $header;
            }

            $condicionHallazgo = " WHERE incidenciaHeaderId =  $detalleIncidenciaId ";
            $queryHallazgoz = "SELECT
                                dg_incidencias_hallazgos.incidenciaBodyId, 
                                dg_incidencias_hallazgos.incidenciaHeaderId, 
                                dg_incidencias_hallazgos.tipo, 
                                dg_incidencias_hallazgos.descripcion, 
                                dg_incidencias_hallazgos.fechaInicio, 
                                dg_incidencias_hallazgos.FechaFin, 
                                dg_incidencias_hallazgos.FechaCreacion, 
                                dg_incidencias_hallazgos.responsable, 
                                dg_incidencias_hallazgos.creadoPor, 
                                dg_incidencias_hallazgos.estatus, 
                                dg_incidencias_hallazgos.heredadas, 
                                dg_incidencias_hallazgos.danoAmbiental, 
                                dg_incidencias_hallazgos.causaEvento
                            FROM
                                dg_incidencias_hallazgos 
                            $condicionHallazgo
                            Order by incidenciaBodyId";

            $datoshallazgos = parent::ObtenerDatos($queryHallazgoz);

            if ($datoshallazgos) {
                $i = -1;
                foreach ($datoshallazgos  as $hallazgos) {
                    ++$i;
                    /****Hallazgos */
                    $inspeccion['inspeccion']['hallazgos'][$i] = $hallazgos;
                    $condicionRecomendacion = ' WHERE incidenciaBodyId='.$hallazgos['incidenciaBodyId'];
                    $queryRecomendaciones = "SELECT
                                                dg_incidencias_recomendaicones.recomendacionesId, 
                                                dg_incidencias_recomendaicones.incidenciaBodyId, 
                                                dg_incidencias_recomendaicones.descripcion, 
                                                dg_incidencias_recomendaicones.fechaCreacion, 
                                                dg_incidencias_recomendaicones.fechaInicio, 
                                                dg_incidencias_recomendaicones.fechaPlanificaicon, 
                                                dg_incidencias_recomendaicones.responsable, 
                                                dg_incidencias_recomendaicones.estatus, 
                                                dg_incidencias_recomendaicones.creadoPor
                                            FROM
                                                dg_incidencias_recomendaicones 
                                            $condicionRecomendacion
                                            Order by recomendacionesId";

                    $datosRecomenaciones = parent::ObtenerDatos($queryRecomendaciones);
                    $inspeccion['inspeccion']['hallazgos'][$i]['recomendaciones'] = $datosRecomenaciones;
                }
                /****Attachament */
                $condicionAttachament = ' WHERE incidenciasId='.$detalleIncidenciaId;
                $queryAttachament1 = "SELECT * FROM dg_incidencias_attachament  $condicionAttachament  Order by attachamentID";
                // echo $queryAttachament1; die;
                $datosAttachaments = parent::ObtenerDatos($queryAttachament1);
                $inspeccion['inspeccion']['attachament'] = $datosAttachaments;
            }

            return $inspeccion;
        } else {
            return $_respuestas->error_401('La inspeccion solicitada no tiene datos para visualizar');
        }

        /* hace la consulta que muetsre todos los id de un tabs */
        //  $estructuraPreCargaHO[$tabsCount]['tabs']['idItemsValidate']=$Tabs['inspeccionesTabsId'].',';
    }
}
