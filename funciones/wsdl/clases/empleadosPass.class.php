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
class empleadosPass extends conexion
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

    private $ubicacionResidencia = '';
    private $ident = '';
    private $frenteAsignado = '';
    private $carnetizacion = '';
    private $pcModelo = '';
    private $pcSerial = '';
    private $pcMacLan = '';
    private $pcMacWam = '';

    private $foraneo = '';
    private $idConsultoraContratante = '';
    private $equipoAsignado = '';
    private $vehiculoTipo = '';
    private $vehiculoModelo = '';
    private $vehiculoMarca = '';
    private $vehiculoColor = '';
    private $vehiculoPlaca = '';
    private $vehiculoAnio = '';
    private $vehiculoAseguradora = '';
    private $vehiculoContrato = '';




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
                    dg_empleados.*,
                    CASE
                        WHEN dg_empleados.act_usu = 1 THEN 'Activo'
                        ELSE 'Inactivo'
                    END AS act_usu,

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
                    dm_rol.des_rol,
                    dg_empresa_consultora.idEmpresaConsultora,
                    dg_empresa_consultora.nombreEmpresaConsultora
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
                    LEFT JOIN
                    dg_empresa_consultora
                    ON
                      dg_empleados.id_usu = dg_empresa_consultora.idAprobador
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
            (!isset($datos['idEmpleado'])) ||
            (!isset($datos['tel_usu'])) ||
            (!isset($datos['pass_usu']))
          ) {
            // en caso de que la validacion no se cumpla se arroja un error
            $datosArray = $_respuestas->error_400();
            echo json_encode($datosArray);
          } else {


            // Asignacion de datos validados su existencia en el If anterior
            $this->idEmpleado = @$datos['idEmpleado'];
            $this->tel_usu = @$datos['tel_usu'];
            $this->pass_usu = @$datos['pass_usu'];
            //equipo
            $this->pcModelo = @$datos['pcModelo'];
            $this->pcSerial = @$datos['pcSerial'];
            $this->pcMacLan = @$datos['pcMacLan'];
            $this->pcMacWam = @$datos['pcMacWam'];

            //vehiculo
            $this->vehiculoTipo = @$datos['vehiculoTipo'];
            $this->vehiculoModelo = @$datos['vehiculoModelo'];
            $this->vehiculoMarca = @$datos['vehiculoMarca'];
            $this->vehiculoColor = @$datos['vehiculoColor'];
            $this->vehiculoPlaca = @$datos['vehiculoPlaca'];
            $this->vehiculoAnio = @$datos['vehiculoAnio'];
            $this->vehiculoAseguradora = @$datos['vehiculoAseguradora'];
            $this->vehiculoContrato = @$datos['vehiculoContrato'];


            $this->fechaCreacion = date('Y-m-d');

              $this->idEmpleado = @$datos['idEmpleado'];
              $resp = $this->Update();


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

    private function Update()
    {
      $query = 'update ' . $this->tabla . "
                          set
                          pass_usu='$this->pass_usu',
                          tel_usu='$this->tel_usu',
                          pcModelo='$this->pcModelo',
                          pcSerial='$this->pcSerial',
                          pcMacLan='$this->pcMacLan',
                          pcMacWam='$this->pcMacWam',
                          vehiculoTipo='$this->vehiculoTipo',
                          vehiculoModelo='$this->vehiculoModelo',
                          vehiculoMarca='$this->vehiculoMarca',
                          vehiculoColor='$this->vehiculoColor',
                          vehiculoPlaca='$this->vehiculoPlaca',
                          vehiculoAnio='$this->vehiculoAnio',
                          vehiculoAseguradora='$this->vehiculoAseguradora',
                          vehiculoContrato='$this->vehiculoContrato'
                      WHERE id_usu = $this->idEmpleado";

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
