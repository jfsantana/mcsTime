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
class time extends conexion
{
  // Tabla Principal de Empleados
  private $tabla = 'dg_reporte_tiempo';

  // se debe crear atributos para las tablas que se van a validar en la funcion "post"
  private $idRegistro = '';
  private $idEmpleado = '';
  private $corte = '';
  private $fechaActividad = '0000-00-00';
  private $hora = '';
  private $idEmpresaConsultora = '';
  private $idCliente = '';
  private $idProyecto = '';
  private $idTipoActividad = '';
  private $tipoAtencion = '';
  private $descripcion = '';

  private $estadoAP1 = '';
  private $estadoAP2 = '';
  private $fechaActualizacion = '';
  private $actualizadoPor = '';



  private $creadoPor = '';
  private $fechaCreacion = '0000-00-00';

  // Activaciond e token
  private $token = '';

  /**
   * Listaod de Cliente
   * http://mcstime/funciones/wsdl/clientes?id
   */
  public function listaHoras($id, $corte)
  {
    $where = " WHERE idRegistro <> '' ";
    if ($id != '') {
      $where =  $where . " and idEmpleado = " . $id;
    }
    if ($corte != '') {
      $where =  $where . " and corte = " . $corte;
    }

    $query = "
              SELECT
                dg_reporte_tiempo.idRegistro,
                dg_empleados.nom_usu,
                dg_empleados.ape_usu,
                dg_empresa_consultora.nombreEmpresaConsultora,
                dg_cliente.NombreCliente,
                dg_proyecto.nameProyecto,
                dm_tipo_actividad.descripcionTipoActividad,
                dg_reporte_tiempo.tipoAtencion,
                dg_reporte_tiempo.descripcion,
                dg_reporte_tiempo.fechaActividad,
                dg_reporte_tiempo.hora,
                dg_reporte_tiempo.corte,
                dg_reporte_tiempo.estadoAP1
              FROM
                dg_reporte_tiempo
                INNER JOIN
                dg_empleados
                ON
                  dg_reporte_tiempo.idEmpleado = dg_empleados.id_usu
                INNER JOIN
                dg_empresa_consultora
                ON
                  dg_reporte_tiempo.idEmpresaConsultora = dg_empresa_consultora.idEmpresaConsultora
                INNER JOIN
                dg_cliente
                ON
                  dg_reporte_tiempo.idCliente = dg_cliente.idCliente
                INNER JOIN
                dg_proyecto
                ON
                  dg_reporte_tiempo.idProyecto = dg_proyecto.idProyecto
                INNER JOIN
                dm_tipo_actividad
                ON
                  dg_reporte_tiempo.idTipoActividad = dm_tipo_actividad.irTipoActividad

                $where order by dg_reporte_tiempo.fechaActividad DESC";
    $datos = parent::ObtenerDatos($query);
    return $datos;
  }

  public function detalleRegistro($idRegistro)
  {

    $where = " WHERE idRegistro <> '' ";
    $where =  $where . " and idRegistro = " . $idRegistro;
    $query = "
              SELECT
                dg_reporte_tiempo.*,
                CONCAT(dg_empleados.ape_usu,', ', dg_empleados.nom_usu) as nombre

              FROM
                dg_reporte_tiempo
                INNER JOIN
                dg_empleados
                ON
                  dg_reporte_tiempo.idEmpleado = dg_empleados.id_usu

              $where
                ";
               // echo $query; die;
    $datos = parent::ObtenerDatos($query);
    return $datos;
  }
  public function detalleFactura($idUser, $corte)
  {
    $id=$idUser;
    $where = " WHERE idFactura <> '' ";

    $where =  $where . " and idEmpleado = " . $id;
    $where =  $where . " and corte = " . $corte;


    $query = "
              SELECT
                *
              FROM
              dg_reporte_factura

              $where
                ";
    $datos = parent::ObtenerDatos($query);
    return $datos;
  }

  public function listTipoActividad($idTipoActividad)
  {

    $where = " WHERE irTipoActividad <> '' ";
    if($idTipoActividad<>'')
    $where =  $where . " and irTipoActividad = " . $idTipoActividad;

    $query = "
              SELECT
                *
              FROM
              dm_tipo_actividad

              $where
              order by 1
                ";
                //echo $query; die;
    $datos = parent::ObtenerDatos($query);
    return $datos;
  }



  public function obtenerEmpleado($NumPersonal)
  {
    $query = 'select * from ' . $this->tabla . " where npe_usu ='$NumPersonal'";
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
          (!isset($datos['idEmpleado'])) ||
          (!isset($datos['corte']))||
          (!isset($datos['fechaActividad']))||
          (!isset($datos['hora']))||
          (!isset($datos['idEmpresaConsultora']))||
          (!isset($datos['idCliente']))||
          (!isset($datos['idProyecto']))||
          (!isset($datos['idTipoActividad']))||
          (!isset($datos['tipoAtencion']))||
          (!isset($datos['descripcion']))
        ) {
          // en caso de que la validacion no se cumpla se arroja un error
          $datosArray = $_respuestas->error_400();
          echo json_encode($datosArray);
        } else {

          // Asignacion de datos validados su existencia en el If anterior
          $this->idEmpleado = @$datos['idEmpleado'];
          $this->corte = @$datos['corte'];
          $this->fechaActividad = @$datos['fechaActividad'];
          $this->hora = @$datos['hora'];
          $this->idEmpresaConsultora = @$datos['idEmpresaConsultora'];
          $this->idCliente = @$datos['idCliente'];
          $this->idProyecto = @$datos['idProyecto'];
          $this->idTipoActividad = @$datos['idTipoActividad'];
          $this->tipoAtencion = @$datos['tipoAtencion'];
          $this->descripcion = @$datos['descripcion'];

          $this->creadoPor = @$datos['creadoPor'];
          $this->fechaCreacion = date('Y-m-d');

          if (($datos['mod'])==2) {
            $this->idRegistro = @$datos['idRegistro'];
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
                    idEmpleado,
                    idEmpresaConsultora,
                    idCliente,
                    idProyecto,
                    idTipoActividad,
                    tipoAtencion,
                    descripcion,
                    fechaActividad,
                    hora,
                    corte,
                    fechaCreacion,
                    creadoPor,
                    estadoAP1,
                    estadoAP2,
                    fechaActualizacion,
                    actualizadoPor
                  )
              value
              (
                  '$this->idEmpleado',
                  '$this->idEmpresaConsultora',
                  '$this->idCliente',
                  '$this->idProyecto',
                  '$this->idTipoActividad',
                  '$this->tipoAtencion',
                  '$this->descripcion',
                  '$this->fechaActividad',
                  '$this->hora',
                  '$this->corte',
                  '$this->fechaCreacion',
                  '$this->creadoPor',
                  '1',
                  '1',
                  '$this->fechaCreacion',
                  '$this->creadoPor'
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
                        idEmpresaConsultora ='$this->idEmpresaConsultora',
                        idCliente ='$this->idCliente',
                        idProyecto ='$this->idProyecto',
                        idTipoActividad ='$this->idTipoActividad',
                        tipoAtencion ='$this->tipoAtencion',
                        descripcion ='$this->descripcion',
                        fechaActividad ='$this->fechaActividad',
                        hora ='$this->hora',
                        fechaActualizacion ='$this->fechaCreacion',
                        actualizadoPor ='$this->creadoPor'
                    WHERE idRegistro = $this->idRegistro ";
      //echo $query; die;
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
        WHERE id =";

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