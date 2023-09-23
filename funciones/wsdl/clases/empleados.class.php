<?php
/************************************************************
 * Diseñado por Jesus Santana
 * CLASE EMPLEADOS
 * Metodo servidor: $_GET, $_POST, $_PUT, $_DELETE
 *
 * 'clases/empleados.class.php';
 *************************************************************/

require_once 'conexion/conexion.php';
require_once 'respuestas.class.php';

// hereda de la clase conexion
class empleados extends conexion
{
    // Tabla Principal de Empleados
    private $tabla = 'dg_empleados';

    // se debe crear atributos para las tablas que se van a validar en la funcion "post"
    private $id_usu = '';
    private $nom_usu = '';
    private $ape_usu = '';
    private $log_usu = '';
    private $pass_usu = '';
    private $act_usu = '';
    private $tel_usu = '';
    private $ced_usu = '';
    private $npe_usu = '';
    private $car_usu = '';
    private $cor_usu = '';
    private $com_usu = '';
    private $ger_usu = '';
    private $are_usu = '';
    private $niv = '';
    private $sal_usu = '';
    private $rol_usu = '';
    private $fcr_usu = '';
    private $ucr_usu = '';
    private $fmo_usu = '';
    private $umo_usu = '';
    private $creador = '';
    private $fechaCreacion = '0000-00-00';

    // Activaciond e token
    private $token = ''; // b43bbfc8bcf8625eed413d91186e8534

    public function listaEmpleados($paginas = 1, $filtro)
    {
        $inicio = 0;
        $cantidad = 100; // numero de registrois

        if ($paginas > 1) {
            $inicio = ($cantidad * ($paginas - 1)) + 1;
            $cantidad = $cantidad * $paginas;
        }

        $query = "select * from $this->tabla where act_usu = '$filtro' limit $inicio,$cantidad";

        $datos = parent::ObtenerDatos($query);

        return $datos;
    }

    public function obtenerEmpleado($NumPersonal)
    {
        $query = 'select * from '.$this->tabla." where npe_usu ='$NumPersonal'";

        return parent::ObtenerDatos($query);
    }

    public function obtenerEmpleadoToken($token)
    {
        $query = "SELECT
                       dg_empleados.*,
                        dm_rol.des_rol
                    FROM
                      dg_empleado_token
                        INNER JOIN
                        dg_empleados
                        ON
                            dg_empleado_token.log_usu = dg_empleados.log_usu
                        INNER JOIN
                        dm_rol
                        ON
                            dg_empleados.rol_usu = dm_rol.id_rol
                      where
                            dg_empleado_token.token = '$token'";

        return parent::ObtenerDatos($query);
    }

    public function post($json)
    {
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
                    (!isset($datos['ced_usu'])) ||
                    (!isset($datos['npe_usu'])) ||
                    (!isset($datos['car_usu'])) ||
                    (!isset($datos['cor_usu'])) ||
                    (!isset($datos['nom_usu'])) ||
                    (!isset($datos['ape_usu'])) ||
                    (!isset($datos['log_usu'])) ||
                    (!isset($datos['rol_usu'])) ||
                    (!isset($datos['act_usu'])) ||
                    (!isset($datos['com_usu'])) ||
                    (!isset($datos['are_usu'])) ||
                    (!isset($datos['ger_usu']))
                    // ||                     (!isset($datos['pass_usu']))
                ) {
                    // en caso de que la validacion no se cumpla se arroja un error
                    $datosArray = $_respuestas->error_400();
                    echo json_encode($datosArray);
                } else {
                    // Asignacion de datos validados su existencia en el If anterior
                    $this->ced_usu = $datos['ced_usu'];
                    $this->npe_usu = $datos['npe_usu'];
                    $this->car_usu = $datos['car_usu'];

                    $this->tel_usu = @$datos['tel_usu'];
                    $this->cor_usu = $datos['cor_usu'];
                    $this->nom_usu = $datos['nom_usu'];
                    $this->ape_usu = $datos['ape_usu'];
                    $this->log_usu = $datos['log_usu'];
                    $this->rol_usu = $datos['rol_usu'];
                    $this->act_usu = $datos['act_usu'];
                    $this->com_usu = $datos['com_usu'];
                    $this->ger_usu = $datos['ger_usu'];
                    $this->pass_usu = @$datos['pass_usu'];

                    $this->fechaCreacion = date('Y-m-d');

                    // llama a la funcion de insertar
                    $resp = $this->InsertarEmpleados();

                    // valida que paso d/rante el inser
                    if ($resp) {
                        $respuesta = $_respuestas->response;
                        $respuesta['status'] = 'OK';
                        $respuesta['result'] = [
                            'idHeaderNew' => $resp,
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

    private function InsertarEmpleados()
    {
        $query = 'insert Into '.$this->tabla."
            (
                ced_usu,
                npe_usu,
                car_usu,
                tel_usu,
                cor_usu,
                nom_usu,
                ape_usu,
                log_usu,
                rol_usu,
                act_usu,
                com_usu,
                ger_usu,
                fcr_usu,
                pass_usu
                )
        value
        (
            '$this->ced_usu',
            '$this->npe_usu',
            '$this->car_usu',
            '$this->tel_usu',
            '$this->cor_usu',
            '$this->nom_usu',
            '$this->ape_usu',
            '$this->log_usu',
            '$this->rol_usu',
            '$this->act_usu',
            '$this->com_usu',
            '$this->ger_usu',
            '$this->fechaCreacion',
            '$this->pass_usu'
            )";

        $Insertar = parent::nonQueryId($query);

        // print_r ($Insertar);die;
        if ($Insertar) {
            return $Insertar;
        } else {
            return 0;
        }
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
                        $this->are_usu = $datos['are_usu'];
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
