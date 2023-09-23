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
    private $idEmpleado = '';
    private $nom_usu = '';
    private $ape_usu = '';
    private $log_usu = '';
    private $pass_usu = '';
    private $act_usu = '';
    private $tel_usu = '';
    private $ced_usu = '';
    private $rol_usu = '';
    private $car_usu = '';
    private $cor_usu = '';


    private $fechaCreacion = '0000-00-00';

    // Activaciond e token
    private $token = ''; // b43bbfc8bcf8625eed413d91186e8534

    public function listaEmpleados($id_usu)
    {
        $where = " WHERE id_usu <> '' ";

        if ($id_usu > 1) {
          $where = $where. ' AND id_usu = '.$id_usu;
        }

        $query = "SELECT
                    dg_empleados.id_usu,
                    dg_empleados.nom_usu,
                    dg_empleados.ape_usu,
                    dg_empleados.log_usu,
                    dg_empleados.pass_usu,
                    CASE
                        WHEN dg_empleados.act_usu = 1 THEN 'Activo'
                        ELSE 'Inactivo'
                    END AS act_usu,
                    dg_empleados.tel_usu,
                    dg_empleados.ced_usu,
                    dg_empleados.car_usu,
                    dg_empleados.cor_usu,
                    dg_empleados.rol_usu,
                    dm_rol.des_rol
                  FROM
                    dg_empleados
                    INNER JOIN
                    dm_rol
                    ON
                      dg_empleados.rol_usu = dm_rol.id_rol $where ORDER BY ape_usu";
        //echo $query; die;
        $datos = parent::ObtenerDatos($query);

        return $datos;
    }

    public function roles()
    {
        $query = 'select * from dm_rol order by 2';

        return parent::ObtenerDatos($query);
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
            (!isset($datos['nom_usu'])) ||
            (!isset($datos['ape_usu'])) ||
            (!isset($datos['log_usu'])) ||
            (!isset($datos['pass_usu'])) ||
            (!isset($datos['ced_usu'])) ||
            (!isset($datos['cor_usu']))
          ) {
            // en caso de que la validacion no se cumpla se arroja un error
            $datosArray = $_respuestas->error_400();
            echo json_encode($datosArray);
          } else {


            // Asignacion de datos validados su existencia en el If anterior
            $this->nom_usu = @$datos['nom_usu'];
            $this->ape_usu = @$datos['ape_usu'];
            $this->log_usu = @$datos['log_usu'];
            $this->pass_usu = @$datos['pass_usu'];
            $this->tel_usu = @$datos['tel_usu'];
            $this->ced_usu = @$datos['ced_usu'];
            $this->car_usu = @$datos['car_usu'];
            $this->cor_usu = @$datos['cor_usu'];
            $this->act_usu = @$datos['act_usu'];
            $this->rol_usu = @$datos['rol_usu'];
            $this->fechaCreacion = date('Y-m-d');

            if ($datos['mod'] != 1) {

              $this->idEmpleado = @$datos['idEmpleado'];
              $resp = $this->Update();

            } else {
              $resp = $this->Insertar();
            }


            if ($resp) {
              $respuesta = $_respuestas->response;
              $respuesta['status'] = 'OK';
              $respuesta['result'] = [
                'idHeaderNew' => $resp,
                'mensaje' => 'Ejecutado Correctamente'
              ];
            } else {
              $respuesta = $_respuestas->response;
              $respuesta['status'] = 'ERROR';
              $respuesta['result'] = [
                'idHeaderNew' => $resp,
                'mensaje' => 'ERROR EN LA ACCION SOBRE EL CLIENTE'
              ];
            }
            return $respuesta;
          }
        } else {
          return $_respuestas->error_401('El Token que envio es invalido o ha caducado');
        }
      }
    }

    private function Insertar()
    {
      $query = 'insert Into ' . $this->tabla . "
              (
                nom_usu,
                ape_usu,
                log_usu,
                pass_usu,
                act_usu,
                tel_usu,
                ced_usu,
                car_usu,
                cor_usu,
                rol_usu
                  )
          value
          (
              '$this->nom_usu',
              '$this->ape_usu',
              '$this->log_usu',
              '$this->pass_usu',
              '$this->act_usu',
              '$this->tel_usu',
              '$this->ced_usu',
              '$this->car_usu',
              '$this->cor_usu',
              '$this->rol_usu'
              )";
              //echo $query; die;
      $Insertar = parent::nonQueryId($query);

      // print_r ($Insertar);die;
      if ($Insertar) {
        return $Insertar;
      } else {
        return 0;
      }
    }

    private function Update()
    {
      $query = 'update ' . $this->tabla . "
                          set
                          nom_usu='$this->nom_usu',
                          ape_usu='$this->ape_usu',
                          log_usu='$this->log_usu',
                          pass_usu='$this->pass_usu',
                          act_usu='$this->act_usu',
                          tel_usu='$this->tel_usu',
                          ced_usu='$this->ced_usu',
                          car_usu='$this->car_usu',
                          cor_usu='$this->cor_usu',
                          rol_usu='$this->rol_usu'
                      WHERE id_usu = $this->idEmpleado";
      //echo  $query; die;
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
                   // $this->id = $datos['id'];

                    // llama a la funcion de insertar
                    $resp = $this->EliminarEmpleados();

                    // valida que paso d/rante el inser
                    if ($resp) {
                        $respuesta = $_respuestas->response;
                        $respuesta['result'] = [
                            'Msg' => "eliminado el registro $ this->id",
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
        WHERE id = $ this->id";

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
