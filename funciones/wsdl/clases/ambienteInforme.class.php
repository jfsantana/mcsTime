<?php
/************************************************************
 * Diseñado por Jesus Santana
 * CLASE EMPLEADOS
 * Metodo servidor: $_GET, $_POST, $_PUT, $_DELETE
 *
 * 'clases/empleados.class.php';uudd
 *************************************************************/

require_once 'conexion/conexion.php';
require_once 'respuestas.class.php';

// hereda de la clase conexion
class informeAmbiente extends conexion
{
    // Header
    private $idInformeAmbiente = '';
    private $fechaRegristro = '0000-00-00';
    private $sector = '';
    private $complejo_id = '';
    private $gerencia = '';
    private $area = '';
    private $custodio = '';
    private $ubicacion = '';
    private $fechaCreacion = '';
    private $creadoPor = '';
    private $estatus = '';

    // Body
    private $idBodyInformeAmbiente = '';
    private $idInfomeAmbienteHeader = '';
    private $objetivo = '';
    private $alcance = '';
    private $docRefenciaObservacion = '';
    private $puntoMuetsreoObservacion = '';
    private $resultado = '';
    private $conclusiones = '';
    private $recomendaciones = '';
    private $anexosObservacion = '';
    private $insert = '';
    // private $fechaCreacion = '0000-00-00';
    // private $estatus     = '';

    // attachament
    private $idAdjunto = '';
    private $idInformeBody = '';
    private $tipoAdjunto = '';
    private $patch = '';
    private $nombre = '';
    private $tipo = '';
    private $imagen = '';
    private $nombreOriginal = '';

    // Activaciond e token
    private $token = ''; // b43bbfc8bcf8625eed413d91186e8534

    /***********************
     * Servicio que ingrea un infome en el sistemas
     * Jesus Santana
     */
    public function post($json)
    {
        $_respuestas = new respuestas();
        $datos = json_decode($json, true);

        if (!isset($datos['header']['token'])) {
            return $_respuestas->error_401();
        } else {
            $this->token = $datos['header']['token'];
            $arrayToken = $this->buscarToken();

            if ($arrayToken) {
                // valida los campos obligatorios
                if (
                    (!isset($datos['header']['fechaRegistro'])) ||
                    (!isset($datos['header']['sector'])) ||
                    (!isset($datos['header']['complejo_id'])) ||
                    (!isset($datos['header']['gerencia'])) ||
                    (!isset($datos['header']['area'])) ||
                    (!isset($datos['header']['custodio'])) ||
                    (!isset($datos['header']['ubicacion']))
                    // ||                     (!isset($datos['pass_usu']))
                ) {
                    // en caso de que la validacion no se cumpla se arroja un error
                    $datosArray = $_respuestas->error_400();
                    echo json_encode($datosArray);
                } else {
                    // $this->idInformeAmbiente = '';
                    $this->fechaRegristro = $datos['header']['fechaRegistro'];
                    $this->sector = $datos['header']['sector'];
                    $this->complejo_id = $datos['header']['complejo_id'];
                    $this->gerencia = $datos['header']['gerencia'];
                    $this->area = $datos['header']['area'];
                    $this->custodio = $datos['header']['custodio'];
                    $this->ubicacion = $datos['header']['ubicacion'];
                    $this->fechaCreacion = date('Y-m-d');
                    $this->creadoPor = $datos['header']['usuario'];
                    $this->estatus = 1;

                    // llama a la funcion de insertar
                    $idHeaderInformeAmbiente = $this->InsertarHeaderInfome();

                    if ($idHeaderInformeAmbiente) {
                        // valida los campos obligatorios

                        // $this->idInformeAmbiente = '';
                        //  $this->idBodyInformeAmbiente = $datos['header']['fechaRegistro'];
                        $this->idInfomeAmbienteHeader = $idHeaderInformeAmbiente;
                        $this->objetivo = $datos['body']['objetivo'];
                        $this->alcance = $datos['body']['alcance'];
                        $this->docRefenciaObservacion = $datos['body']['docRefenciaObservacion'];
                        $this->puntoMuetsreoObservacion = $datos['body']['puntoMuetsreoObservacion'];
                        $this->resultado = $datos['body']['resultado'];
                        $this->conclusiones = $datos['body']['conclusiones'];
                        $this->recomendaciones = $datos['body']['recomendaciones'];
                        $this->anexosObservacion = $datos['body']['anexosObservacion'];
                        $this->fechaCreacion = date('Y-m-d');
                        $this->estatus = 1;

                        // llama a la funcion de insertar
                        $idBodyInformeAmbiente = $this->InsertarBodyInfome();

                        $this->patch = $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/public/attachment/informenAmbiente/docRefencia';

                        // docRefencia
                        // print_r(count($datos['body']['docRefencia']['adjuntos']));                        exit;
                        $this->insert = 'VALUE(';
                        if (@$datos['body']['docRefencia']['adjuntos'][0] != null) {
                            foreach ($datos['body']['docRefencia']['adjuntos'] as $keyDocRefencia) {
                                $this->nombre = $idHeaderInformeAmbiente.'-docRefencia-'.$idBodyInformeAmbiente;
                                $this->imagen = $keyDocRefencia['base64'];
                                $this->nombreOriginal = $keyDocRefencia['nombre'];
                                $this->insert = $this->insert.$idBodyInformeAmbiente.",'docRefencia','".$this->patch."','".$this->nombre."','".$keyDocRefencia['tipo']."','".$this->imagen."','".$this->nombreOriginal."'";
                                $this->insert = $this->insert.'),(';
                            }

                            $this->insert = substr($this->insert, 0, -1);
                            $this->insert = substr($this->insert, 0, -1);

                            $InformeAmbienteAttachamentdocRefencia = $this->InsertarAttachamentInfome();
                        }

                        // puntoMuetsreo

                        $this->insert = 'VALUE(';
                        if (@$datos['body']['puntoMuetsreo']['adjuntos'][0] != null) {
                            foreach ($datos['body']['puntoMuetsreo']['adjuntos'] as $keyDocRefencia) {
                                $this->nombre = $idHeaderInformeAmbiente.'-puntoMuetsreo-'.$idBodyInformeAmbiente;
                                $this->imagen = $keyDocRefencia['base64'];
                                $this->nombreOriginal = $keyDocRefencia['nombre'];
                                $this->insert = $this->insert.$idBodyInformeAmbiente.",'puntoMuetsreo','".$this->patch."','".$this->nombre."','".$keyDocRefencia['tipo']."','".$this->imagen."','".$this->nombreOriginal."'";
                                $this->insert = $this->insert.'),(';
                            }

                            $this->insert = substr($this->insert, 0, -1);
                            $this->insert = substr($this->insert, 0, -1);
                            $InformeAmbienteAttachamentpuntoMuetsreo = $this->InsertarAttachamentInfome();
                        }

                        // anexosArchivos
                        $this->insert = 'VALUE(';
                        if (@$datos['body']['anexos']['adjuntos'][0] != null) {
                            foreach ($datos['body']['anexos']['adjuntos'] as $keyDocRefencia) {
                                $this->nombre = $idHeaderInformeAmbiente.'-anexos-'.$idBodyInformeAmbiente;
                                $this->imagen = $keyDocRefencia['base64'];
                                $this->nombreOriginal = $keyDocRefencia['nombre'];
                                $this->insert = $this->insert.$idBodyInformeAmbiente.",'anexos','".$this->patch."','".$this->nombre."','".$keyDocRefencia['tipo']."','".$this->imagen."','".$this->nombreOriginal."'";
                                $this->insert = $this->insert.'),(';
                            }

                            $this->insert = substr($this->insert, 0, -1);
                            $this->insert = substr($this->insert, 0, -1);
                            $InformeAmbienteAttachamentanexosArchivos = $this->InsertarAttachamentInfome();
                        }

                        // respuesta  para todos los insert
                        $respuesta = $_respuestas->response;
                        $respuesta['status'] = 'OK';
                        $respuesta['result'] = [
                            'idHeaderNew' => $idHeaderInformeAmbiente,
                            'MSG' => 'Se ingreso correctamente el Informe',
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

    /***********************************
     * Inser en la tabl ade header del infomre de ambiente
     */
    private function InsertarHeaderInfome()
    {
        $query = "insert Into dg_informeambiente_header 
            (
                fechaRegristro,
                sector,
                complejo_id,
                gerencia,
                area,
                custodio,
                ubicacion,
                fechaCreacion,
                creadoPor,
                estatus
                )
        value
        (
            '$this->fechaRegristro',
            '$this->sector',
            '$this->complejo_id',
            '$this->gerencia',
            '$this->area',
            '$this->custodio',
            '$this->ubicacion', 
            '$this->fechaCreacion',
            '$this->creadoPor',
            '$this->estatus'
            )";

        $Insertar = parent::nonQueryId($query);

        // print_r ($Insertar);die;
        if ($Insertar) {
            return $Insertar;
        } else {
            return 0;
        }
    }

    /**********************************
     * insert en la tabla de body del informe de ambiente
     */
    private function InsertarBodyInfome()
    {
        $query = "insert Into dg_informeambiente_body 
            (
                idInfomeAmbienteHeader,
                objetivo,
                alcance,
                docRefenciaObservacion,
                puntoMuetsreoObservacion,
                resultado,
                conclusiones,
                recomendaciones,
                anexosObservacion,
                fechaCreacion,
                estatus
                )
        value
        (
            '$this->idInfomeAmbienteHeader',
            '$this->objetivo',
            '$this->alcance',
            '$this->docRefenciaObservacion',
            '$this->puntoMuetsreoObservacion',
            '$this->resultado',
            '$this->conclusiones', 
            '$this->recomendaciones',
            '$this->anexosObservacion',
            '$this->fechaCreacion',
            '$this->estatus'
            )";

        $Insertar = parent::nonQueryId($query);

        // print_r ($Insertar);die;
        if ($Insertar) {
            return $Insertar;
        } else {
            return 0;
        }
    }

        /**********************************
     * insert en la tabla de insert
     */
    private function InsertarAttachamentInfome()
    {
        $query = 'insert Into dg_informeambiente_attachament 
            (
                idInformeBody,
                tipoAdjunto,
                patch,
                nombre,
                tipo,
                imagen,
                nombreOriginal
                )'.
                $this->insert;

        $Insertar = parent::nonQueryId($query);

        if ($Insertar) {
            return $Insertar;
        } else {
            return 0;
        }
    }

    public function detalleInforme($idInforme)
    {
        $condicion = 'where dg_informeambiente_header.estatus=1 ';
        if ($idInforme != 'todas') {
            $selectidInforme = " and idInformeAmbiente = '$idInforme'";
            $bandera = 1;
        } else {
            $selectidInforme = ' ';
        }

        $query = "SELECT
                    dg_informeambiente_header.idInformeAmbiente, 
                    dg_informeambiente_body.idBodyInformeAmbiente,
                    dg_informeambiente_header.fechaRegristro, 
                    dg_informeambiente_header.sector, 
                    dm_sector.nombre, 
                    dg_informeambiente_header.complejo_id, 
                    dm_complejo.siglas_complejo, 
                    dg_informeambiente_header.gerencia, 
                    dm_gerencia.nombre, 
                    dg_informeambiente_header.area, 
                    dm_area.des_area, 
                    dg_informeambiente_header.custodio, 
                    dg_informeambiente_header.ubicacion, 
                    dg_informeambiente_header.fechaCreacion, 
                    dg_informeambiente_header.creadoPor, 
                    dg_informeambiente_header.estatus, 
                    dg_informeambiente_body.objetivo, 
                    dg_informeambiente_body.alcance, 
                    dg_informeambiente_body.docRefenciaObservacion, 
                    dg_informeambiente_body.puntoMuetsreoObservacion, 
                    dg_informeambiente_body.resultado, 
                    dg_informeambiente_body.conclusiones, 
                    dg_informeambiente_body.recomendaciones, 
                    dg_informeambiente_body.anexosObservacion, 
                    dg_informeambiente_body.fechaCreacion, 
                    dg_informeambiente_body.estatus
                FROM
                    dg_informeambiente_header
                    LEFT JOIN
                    dm_sector
                    ON 
                        dg_informeambiente_header.sector = dm_sector.sectorId
                    LEFT JOIN
                    dm_complejo
                    ON 
                        dg_informeambiente_header.complejo_id = dm_complejo.id_complejo
                    LEFT JOIN
                    dm_gerencia
                    ON 
                        dg_informeambiente_header.gerencia = dm_gerencia.gerencia_id
                    LEFT JOIN
                    dm_area
                    ON 
                        dg_informeambiente_header.area = dm_area.id_area
                    INNER JOIN
                    dg_informeambiente_body
                    ON 
                        dg_informeambiente_header.idInformeAmbiente = dg_informeambiente_body.idInfomeAmbienteHeader
                        $condicion $selectidInforme order by 2";
        $datos = parent::ObtenerDatos($query);

        if ($datos) {
            $detalles['informe'] = $datos[0];

            $idInformeBodyAmbiente = $datos['0']['idBodyInformeAmbiente'];
            $queryAttachament = "SELECT
                                    dg_informeambiente_attachament.idAdjunto, 
                                    dg_informeambiente_attachament.idInformeBody, 
                                    dg_informeambiente_attachament.tipoAdjunto, 
                                    dg_informeambiente_attachament.patch, 
                                    dg_informeambiente_attachament.nombre, 
                                    dg_informeambiente_attachament.tipo, 
                                    dg_informeambiente_attachament.imagen, 
                                    dg_informeambiente_attachament.nombreOriginal
                                FROM
                                    dg_informeambiente_attachament
                                    
                                    WHERE
                                    dg_informeambiente_attachament.idInformeBody = $idInformeBodyAmbiente ";
            $datosBodyAttachament = parent::ObtenerDatos($queryAttachament);

            if ($datosBodyAttachament) {
                foreach ($datosBodyAttachament as $datosAttachamet) {
                    $detalles['informe']['Attachament'][$datosAttachamet['tipoAdjunto']][] = $datosAttachamet;
                }
            }
        }

        return $detalles;
    }

    public function put($datos)
    {
        $_respuestas = new respuestas();
        // $datos = json_decode($json, true);
        // $datos = explode('&', $json);

        if (!isset($datos['token'])) {
            return $_respuestas->error_401();
        } else {
            $this->token = $datos['token'];
            $arrayToken = $this->buscarToken();

            if ($arrayToken) {
                // solo validamos que tenga la clave primaria para poder eliminar correctamente el resgitro
                if (
                    !isset($datos['id_usu'])
                ) {
                    // en caso de que la validacion no se cumpla se arroja un error
                    $datosArray = $_respuestas->error_400();
                    echo json_encode($datosArray);
                } else {
                    $this->id_usu = $datos['id_usu'];
                    $this->creador = $datos['creadoPor'];
                    $this->fechaCreacion = date('Y-m-d');

                    // Validaciones de campos
                    if (isset($datos['ced_usu'])) {
                        $this->ced_usu = $datos['ced_usu'];
                    } else {
                        return $_respuestas->error_401('El numero de Cedula no puede estar en Blanco');
                    }

                    if (isset($datos['npe_usu'])) {
                        $this->npe_usu = $datos['npe_usu'];
                    } else {
                        return $_respuestas->error_401('El numero de Personal no puede estar en Blanco');
                    }

                    if (isset($datos['car_usu'])) {
                        $this->car_usu = $datos['car_usu'];
                    } else {
                        return $_respuestas->error_401('El Cargo del Personal no puede estar en Blanco');
                    }

                    if (isset($datos['tel_usu'])) {
                        $this->tel_usu = $datos['tel_usu'];
                    }

                    if (isset($datos['cor_usu'])) {
                        $this->cor_usu = $datos['cor_usu'];
                    } else {
                        return $_respuestas->error_401('El Correo del Personal no puede estar en Blanco');
                    }

                    if (isset($datos['nom_usu'])) {
                        $this->nom_usu = $datos['nom_usu'];
                    } else {
                        return $_respuestas->error_401('El Nombre del Personal no puede estar en Blanco');
                    }

                    if (isset($datos['ape_usu'])) {
                        $this->ape_usu = $datos['ape_usu'];
                    } else {
                        return $_respuestas->error_401('El Apellido del Personal no puede estar en Blanco');
                    }

                    if (isset($datos['log_usu'])) {
                        $this->log_usu = $datos['log_usu'];
                    } else {
                        return $_respuestas->error_401('El Usuaio del Personal no puede estar en Blanco');
                    }

                    if (isset($datos['rol_usu'])) {
                        $this->rol_usu = $datos['rol_usu'];
                    } else {
                        return $_respuestas->error_401('El ROL del Personal no puede estar en Blanco');
                    }

                    if (isset($datos['act_usu'])) {
                        $this->act_usu = $datos['act_usu'];
                    } else {
                        return $_respuestas->error_401('El Personal debe tener un Estado (adtivo / Desactivado)');
                    }

                    if (isset($datos['com_usu'])) {
                        $this->com_usu = $datos['com_usu'];
                    } else {
                        return $_respuestas->error_401('El Personal debe Complejo Asignado)');
                    }

                    if (isset($datos['ger_usu'])) {
                        $this->ger_usu = $datos['ger_usu'];
                    } else {
                        return $_respuestas->error_401('El Personal debe Gerencia Asignado)');
                    }

                    if (isset($datos['are_usu'])) {
                        $this->are_usu = $datos['ger_usu'];
                    } else {
                        $this->are_usu = 0;
                    }
                    if (isset($datos['niv'])) {
                        $this->niv = $datos['niv'];
                    } else {
                        $this->niv = 0;
                    }
                    if (isset($datos['ucr_usu'])) {
                        $this->ucr_usu = $datos['ucr_usu'];
                    } else {
                        $this->ucr_usu = 0;
                    }
                    if (isset($datos['umo_usu'])) {
                        $this->umo_usu = $datos['umo_usu'];
                    } else {
                        $this->umo_usu = 0;
                    }

                    // llama a la funcion de insertar
                    $resp = $this->UpdateEmpleados();

                    // valida que paso d/rante el inser
                    if ($resp) {
                        $respuesta = $_respuestas->response;
                        $respuesta['status'] = 'OK';
                        $respuesta['result'] = [
                            'Id' => $this->id_usu,
                        ];

                        return $respuesta;
                    } else {
                        return $_respuestas->error_201('No se actualizo ningun valor');
                    }
                }
            } else {
                return $_respuestas->error_401('El Token que envio es invalido o ha caducado');
            }
        }
    }

    private function UpdateEmpleados()
    {
        $query = 'update '.$this->tabla." 
                        set 
                        
                        nom_usu ='$this->nom_usu', 
                        ape_usu ='$this->ape_usu', 
                        log_usu ='$this->log_usu', 
                        pass_usu = '$this->pass_usu', 
                        act_usu = '$this->act_usu', 
                        tel_usu = '$this->tel_usu', 
                        ced_usu = '$this->ced_usu', 
                        npe_usu = '$this->npe_usu', 
                        car_usu = '$this->car_usu', 
                        com_usu = '$this->com_usu', 
                        ger_usu = '$this->ger_usu', 
                        are_usu = $this->are_usu, 
                        niv = $this->niv, 
                        ucr_usu = $this->ucr_usu, 
                        fmo_usu = '$this->fechaCreacion', 
                        umo_usu = $this->umo_usu, 
                        npe_usu = '$this->npe_usu', 
                        npe_usu = '$this->npe_usu', 
                        npe_usu = '$this->npe_usu', 
                        npe_usu = '$this->npe_usu', 
                        npe_usu = '$this->npe_usu'
                    WHERE id_usu = $this->id_usu";

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
                    $resp = $this->EliminarEmpleados();

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

    private function EliminarEmpleados()
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
}
