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
class aprobacionHoras extends conexion
{
  // Tabla Principal de Empleados
  private $tabla = 'dg_reporte_tiempo';


  private $id_usu = '';
  private $corte = '';
  // se debe crear atributos para las tablas que se van a validar en la funcion "post"
  // private $idRegistro = '';
  private $idEmpleado = '';
  //  private $corte = '';
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

  private $observacionEstado = '';

  private $creadoPor = '';
  private $fechaCreacion = '0000-00-00';

  // Activaciond e token
  private $token = '';





  public function listdoConsultoresConsolidadoConsultora($corte, $consultora)
  {

    $where = " WHERE corte <> '' ";

    if ($consultora != '') {
      $where =  $where . " and nombreEmpresaConsultora = '" . $consultora . "'";
    }

    if ($corte != '') {
      $where =  $where . " and corte = '" . $corte . "'";
    }

    $query = "
              select * from vw_consolidado_horas_consultores
                $where order by vw_consolidado_horas_consultores.nombre ";

                //echo $query; die;
    $datos = parent::ObtenerDatos($query);
    return $datos;
  }


  /**
   * Listaod de Cliente
   * http://mcstime/funciones/wsdl/clientes?id
   */
  public function listdoConsultoresConsolidado($corte, $idAprobador)
  {


    $where = " WHERE corte <> '' ";

    if ($idAprobador != '') {
      $where =  $where . " and idAprobador = '" . $idAprobador . "'";
    }

    if ($corte != '') {
      $where =  $where . " and corte = '" . $corte . "'";
    }

    $query = "
              select * from vw_consolidado_horas_consultores
                $where order by vw_consolidado_horas_consultores.nombre ";

                //echo $query; die;
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
    $id = $idUser;
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
    if ($idTipoActividad <> '')
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
          (!isset($datos['id_usu'])) ||
          (!isset($datos['corte']))
        ) {
          // en caso de que la validacion no se cumpla se arroja un error
          $datosArray = $_respuestas->error_400();
          echo json_encode($datosArray);
        } else {

          // Asignacion de datos validados su existencia en el If anterior
          $this->id_usu = @$datos['id_usu'];
          $this->corte = @$datos['corte'];
          $this->observacionEstado = @$datos['observacionEstado'];

          $this->idProyecto = @$datos['idProyecto'];


          $this->creadoPor = @$datos['creadoPor'];
          $this->fechaCreacion = date('Y-m-d');


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
                        observacionEstado ='Aprobacion por Lote',
                        estadoAP1 ='3',
                        fechaActualizacion ='$this->fechaCreacion',
                        actualizadoPor ='$this->creadoPor'
                    WHERE
                      idEmpleado=$this->id_usu
                      AND corte='$this->corte'
                      and estadoAP1=1
                      and idProyecto=$this->idProyecto";

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
