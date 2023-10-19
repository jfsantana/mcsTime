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
class proyecto extends conexion
{
  // Tabla Principal de Empleados
  private $tabla = 'dg_proyecto';

  // se debe crear atributos para las tablas que se van a validar en la funcion "post"
  private $idProyecto = '';
  private $nameProyecto = '';
  private $fechaInicio = '';
  private $fechaFin = '';
  private $Cliente = '';
  private $gerenteProyecto = '';
  private $activoCliente = '';
  private $creadoPor = '';


  private $fechaCreacion = '0000-00-00';

  // Activaciond e token
  private $token = '';



  public function listaProyectoConsultora($idConsultora, $mes)
  {
    $mes= $mes+0;
    $where = " WHERE  dg_reporte_tiempo.estadoAP1=3 ";
    if ($idConsultora) {
      $where =  $where . " and dg_reporte_tiempo.idEmpresaConsultora = " . $idConsultora ;
    }
    if ($mes) {
      $where =  $where . " AND  CONCAT(MONTH(dg_reporte_tiempo.fechaActividad),YEAR(dg_reporte_tiempo.fechaActividad))=$mes";
    }


    $query = "SELECT
                  DISTINCT
                    dg_reporte_tiempo.idEmpresaConsultora,
                    dg_empresa_consultora.nombreEmpresaConsultora,
                    dg_reporte_tiempo.idProyecto,
                    dg_proyecto.nameProyecto
                  FROM
                    dg_reporte_tiempo
                    INNER JOIN
                    dg_empresa_consultora
                    ON
                      dg_reporte_tiempo.idEmpresaConsultora = dg_empresa_consultora.idEmpresaConsultora
                    INNER JOIN
                    dg_proyecto
                    ON
                      dg_reporte_tiempo.idProyecto = dg_proyecto.idProyecto
                  $where";
    //echo $query;    die;
    $datos = parent::ObtenerDatos($query);
    return $datos;
  }

  /**
   * Listaod de Cliente
   * http://mcstime/funciones/wsdl/clientes?id
   */
  public function listaProyecto($idProyecto)
  {
    $where = " WHERE dg_proyecto.idProyecto <> '' ";
    if ($idProyecto != '') {
      $where =  $where . " and dg_proyecto.idProyecto = " . $idProyecto;
    }
    $query = "SELECT
                  dg_proyecto.idProyecto,
                  dg_proyecto.nameProyecto,
                  dg_proyecto.fechaInicio,
                  dg_proyecto.fechaFin,
                  dg_proyecto.activo,
                  dg_proyecto.gerenteProyecto,
                  dg_cliente.NombreCliente,
                  dg_proyecto.pais as pais,
                  dg_proyecto.country as country

                FROM
                  rel_clienteproyecto
                  INNER JOIN
                  dg_cliente
                  ON
                    rel_clienteproyecto.idCliente = dg_cliente.idCliente
                  INNER JOIN
                  dg_proyecto
                  ON
                    rel_clienteproyecto.idProyecto = dg_proyecto.idProyecto
                  $where";

    $datos = parent::ObtenerDatos($query);
    return $datos;
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
          (!isset($datos['nameProyecto'])) ||
          (!isset($datos['fechaInicio'])) ||
          (!isset($datos['Cliente'])) ||
          (!isset($datos['gerenteProyecto'])) ||
          (!isset($datos['activoCliente']))

        ) {
          // en caso de que la validacion no se cumpla se arroja un error
          $datosArray = $_respuestas->error_400();
          echo json_encode($datosArray);
        } else {


          // Asignacion de datos validados su existencia en el If anterior
          $this->nameProyecto = @$datos['nameProyecto'];
          $this->fechaInicio = @$datos['fechaInicio'];
          $this->fechaFin = @$datos['fechaFin'];
          $this->gerenteProyecto = @$datos['gerenteProyecto'];
          $this->activoCliente = @$datos['activoCliente'];
          $this->creadoPor = @$datos['creadoPor'];
          $this->fechaCreacion = date('Y-m-d');
          $this->Cliente = @$datos['Cliente'];



          if ($datos['mod'] != 1) {

            $this->idProyecto = @$datos['idProyecto'];

            $resp = $this->Update();
          } else {
            $resp = $this->Insertar();
            $resp2 = $this->InsertarClienteProyecto($resp);
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
              'mensaje' => 'ERROR EN LA ACCION SOBRE EL PROYECTO'
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
                nameProyecto,
                fechaInicio,
                fechaFin,
                activo,
                gerenteProyecto
                  )
          value
          (
              '$this->nameProyecto',
              '$this->fechaInicio',
              '$this->fechaFin',
              $this->activoCliente,
              '$this->gerenteProyecto'
              )";

    $Insertar = parent::nonQueryId($query);

    // print_r ($Insertar);die;
    if ($Insertar) {
      return $Insertar;
    } else {
      return 0;
    }
  }
  private function InsertarClienteProyecto($idProyecto)
  {
    $query = "insert Into rel_clienteproyecto
              (
                idCliente,
                idProyecto
                  )
          value
          (
              $this->Cliente,
              $idProyecto
              )";
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

                          nameProyecto ='$this->nameProyecto',
                          fechaInicio ='$this->fechaInicio',
                          fechaFin ='$this->fechaFin',
                          activo =$this->activoCliente,
                          gerenteProyecto ='$this->gerenteProyecto'
                      WHERE idProyecto = $this->idProyecto";
    //      echo $query; die;
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
