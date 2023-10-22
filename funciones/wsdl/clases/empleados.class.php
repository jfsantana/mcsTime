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

  private $ubicacionResidencia = '';
  private $ident = '';
  private $frenteAsignado = '';
  private $carnetizacion = '';
  private $pcModelo = '';
  private $pcSerial = '';
  private $pcMacLan = '';
  private $pcMacWam = '';

  private $foraneo = '';
  private $equipoAsignado = '';
  private $idConsultoraContratante = '';
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
      $where = $where . ' AND id_usu = ' . $id_usu;
    }

    $query = "SELECT
                      dg_empleados.*,
                    CASE

                        WHEN dg_empleados.act_usu = 1 THEN
                        'Activo' ELSE 'Inactivo'
                      END AS act_usu,
                      dg_empresa_consultora.nombreEmpresaConsultora,
                      dm_rol.des_rol
                    FROM
                      dg_empleados
                      INNER JOIN dm_rol ON dg_empleados.rol_usu = dm_rol.id_rol
                      LEFT JOIN dg_empresa_consultora ON dg_empresa_consultora.idEmpresaConsultora = dg_empleados.idConsultoraContratante
                      $where ORDER BY ape_usu";
    //        echo $query; die;
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
    $query = 'select * from ' . $this->tabla . " where npe_usu ='$NumPersonal'";

    return parent::ObtenerDatos($query);
  }

  public function obtenerEmpleadoConsultoraMes($idEmpresaConsultora, $mes)
  {
    $where = " Where consultor <> ''";
    if ($idEmpresaConsultora) {
      $where = $where . " and idEmpresaConsultora = $idEmpresaConsultora";
    }
    if ($mes) {
      //$where = $where . "  and  mes=$mes";
      $where =  $where . " and DATE_FORMAT(fechaActividad, '%m%Y')  = " . $mes;
    }
    $query = "SELECT
                distinct id_usu,Consultor
              FROM
                vw_reporteFIConsultoresxProyecto
              $where
                ";
    //echo $query; die;
    return parent::ObtenerDatos($query);
  }


  ///agregar el filtro de fecha y continuar con el reporte
  public function obtenerEmpleadoConsultora($idConsultora, $idProyecto, $mes)
  {
    $where = " Where consultor <> ''";
    if ($idConsultora) {

      $where = $where . " and idEmpresaConsultora = $idConsultora";
    }
    if ($idProyecto) {

      $where = $where . " and idProyecto = $idProyecto";
    }
    if ($mes) {
      $where . " and DATE_FORMAT(fechaActividad, '%m%Y')  = " . $mes;
    }
    $query = "SELECT
                *
              FROM
                vw_reporteFIConsultoresxProyecto
              $where
                ";
    //echo $query; die;
    return parent::ObtenerDatos($query);
  }


  public function obtenerEmpleadoDetalleMes($id_empleado,$idEmpresaConsultora,$idProyecto, $mes)
  {
    $where = " Where idEmpleado <> ''";
    if ($id_empleado) {
      $where = $where . " and idEmpleado = $id_empleado";
    }

    if ($idEmpresaConsultora) {
      $where = $where . " and idEmpresaConsultora = $idEmpresaConsultora";
    }
    if ($idProyecto) {
      $where = $where . " and idProyecto = $idProyecto";
    }
    if ($mes) {
      $where = $where . "  and  CONCAT(MONTH(fechaActividad),YEAR(fechaActividad))=$mes";
    }


    $query = "SELECT
                *
              FROM
              vw_reportefi_diario_mensual_detalle
              $where

              order by fechaActividad
                ";
    //echo $query; die;
    return parent::ObtenerDatos($query);
  }

  public function obtenerEmpleadoAprobadores()
  {
    $query = 'select * from dg_empleados where rol_usu < 21 and act_usu=1';

    return parent::ObtenerDatos($query);
  }


  public function obtenerEmpleadoToken($token)
  {
    $query = "SELECT
    dg_empleados.*,
    dm_rol.des_rol,
    (
    SELECT
      #GROUP_CONCAT(dg_empresa_consultora.idEmpresaConsultora ',') as idEmpresaConsultora#dg_empresa_consultora.nombreEmpresaConsultora
      GROUP_CONCAT(dg_empresa_consultora.idEmpresaConsultora SEPARATOR ',') as idEmpresaConsultora
    FROM
      dg_empleado_token
      INNER JOIN dg_empleados ON dg_empleado_token.log_usu = dg_empleados.log_usu
      INNER JOIN dm_rol ON dg_empleados.rol_usu = dm_rol.id_rol
      LEFT JOIN dg_empresa_consultora ON FIND_IN_SET( dg_empleados.id_usu, dg_empresa_consultora.idAprobador ) > 0
    WHERE
      dg_empleado_token.token = '$token'
    ) AS idEmpresaConsultora,
    (
    SELECT
      #GROUP_CONCAT(dg_empresa_consultora.idEmpresaConsultora ',') as idEmpresaConsultora#dg_empresa_consultora.nombreEmpresaConsultora
      GROUP_CONCAT(dg_empresa_consultora.nombreEmpresaConsultora SEPARATOR ',') as idEmpresaConsultora
    FROM
      dg_empleado_token
      INNER JOIN dg_empleados ON dg_empleado_token.log_usu = dg_empleados.log_usu
      INNER JOIN dm_rol ON dg_empleados.rol_usu = dm_rol.id_rol
      LEFT JOIN dg_empresa_consultora ON FIND_IN_SET( dg_empleados.id_usu, dg_empresa_consultora.idAprobador ) > 0
    WHERE
      dg_empleado_token.token = '$token'
    ) AS nombreEmpresaConsultora
  FROM
    dg_empleado_token
    INNER JOIN dg_empleados ON dg_empleado_token.log_usu = dg_empleados.log_usu
    INNER JOIN dm_rol ON dg_empleados.rol_usu = dm_rol.id_rol
    LEFT JOIN dg_empresa_consultora ON FIND_IN_SET( dg_empleados.id_usu, dg_empresa_consultora.idAprobador ) > 0
  WHERE
    dg_empleado_token.token = '$token'

  group by 	dg_empleados.id_usu";
    //echo $query; die;
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

          $this->ubicacionResidencia = @$datos['ubicacionResidencia'];
          $this->ident = @$datos['ident'];
          $this->frenteAsignado = @$datos['frenteAsignado'];
          $this->carnetizacion = @$datos['carnetizacion'];
          $this->pcModelo = @$datos['pcModelo'];
          $this->pcSerial = @$datos['pcSerial'];
          $this->pcMacLan = @$datos['pcMacLan'];
          $this->pcMacWam = @$datos['pcMacWam'];

          $this->foraneo = @$datos['foraneo'];
          $this->equipoAsignado = @$datos['equipoAsignado'];
          $this->idConsultoraContratante = @$datos['idConsultoraContratante'];

          $this->vehiculoTipo = @$datos['vehiculoTipo'];
          $this->vehiculoModelo = @$datos['vehiculoModelo'];
          $this->vehiculoMarca = @$datos['vehiculoMarca'];
          $this->vehiculoColor = @$datos['vehiculoColor'];
          $this->vehiculoPlaca = @$datos['vehiculoPlaca'];
          $this->vehiculoAnio = @$datos['vehiculoAnio'];
          $this->vehiculoAseguradora = @$datos['vehiculoAseguradora'];
          $this->vehiculoContrato = @$datos['vehiculoContrato'];



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
                rol_usu,
                ubicacionResidencia,
                ident,
                frenteAsignado,
                carnetizacion,
                pcModelo,
                pcSerial,
                pcMacLan,
                pcMacWam,
                foraneo,
                equipoAsignado,
                idConsultoraContratante,
                vehiculoTipo,
                vehiculoModelo,
                vehiculoMarca,
                vehiculoColor,
                vehiculoPlaca,
                vehiculoAnio,
                vehiculoAseguradora,
                vehiculoContrato
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
              '$this->rol_usu',

              '$this->ubicacionResidencia',
              '$this->ident',
              '$this->frenteAsignado',
              '$this->carnetizacion',
              '$this->pcModelo',
              '$this->pcSerial',
              '$this->pcMacLan',
              '$this->pcMacWam',

              '$this->foraneo',
              '$this->equipoAsignado',
              '$this->idConsultoraContratante',

              '$this->vehiculoTipo',
              '$this->vehiculoModelo',
              '$this->vehiculoMarca',
              '$this->vehiculoColor',
              '$this->vehiculoPlaca',
              '$this->vehiculoAnio',
              '$this->vehiculoAseguradora',
              '$this->vehiculoContrato'
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
                          rol_usu='$this->rol_usu',

                          ubicacionResidencia='$this->ubicacionResidencia',
                          ident='$this->ident',
                          frenteAsignado='$this->frenteAsignado',
                          carnetizacion='$this->carnetizacion',
                          pcModelo='$this->pcModelo',
                          pcSerial='$this->pcSerial',
                          pcMacLan='$this->pcMacLan',
                          pcMacWam='$this->pcMacWam',


                          foraneo='$this->foraneo',
                          equipoAsignado='$this->equipoAsignado',
                          idConsultoraContratante='$this->idConsultoraContratante',

                          vehiculoTipo='$this->vehiculoTipo',
                          vehiculoModelo='$this->vehiculoModelo',
                          vehiculoMarca='$this->vehiculoMarca',
                          vehiculoColor='$this->vehiculoColor',
                          vehiculoPlaca='$this->vehiculoPlaca',
                          vehiculoAnio='$this->vehiculoAnio',
                          vehiculoAseguradora='$this->vehiculoAseguradora',
                          vehiculoContrato='$this->vehiculoContrato'
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
