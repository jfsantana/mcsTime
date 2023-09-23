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


//hereda de la clase conexion
class estructura extends conexion {

    //Tabla Principal de Empleados
    private $tabla = "dm_complejo";

    //Activaciond e token
  //  private $token = '';//b43bbfc8bcf8625eed413d91186e8534

    public function listaComplejo(){
        // COMPLEJO ES LO  MISMO QUE CENTRO DE EMPLAZAMIENTO
        $query = "SELECT
        dm_complejo.id_complejo,
        dm_complejo.siglas_complejo,
        dm_complejo.id_sap,
        dm_complejo.nombre_complejo,
        dm_complejo.ciudad_reporte,
        dm_complejo.ciudad_origen,
        dm_complejo.dato_extra,
        dm_complejo.fecha_crea,
        dm_complejo.fecha_mod,
        dm_complejo.user_crea,
        dm_complejo.user_mod,
        dm_complejo_custodio.custodioNumPersonal as 'numPersonalCustodio',
        dm_complejo_custodio.nombre as 'nombreCustodio'
        FROM
            dm_complejo
            LEFT JOIN dm_complejo_custodio ON dm_complejo_custodio.complejoId = dm_complejo.id_complejo ORDER BY 3";
            
        $datos = parent::ObtenerDatos($query);
        return ($datos);
    }

    public function datoComplejo($complejoid){
        // COMPLEJO ES LO  MISMO QUE gerencias
        $query = "SELECT
        dm_complejo.id_complejo,
        dm_complejo.siglas_complejo,
        dm_complejo.id_sap,
        dm_complejo.nombre_complejo,
        dm_complejo.ciudad_reporte,
        dm_complejo.ciudad_origen,
        dm_complejo.dato_extra,
        dm_complejo.fecha_crea,
        dm_complejo.fecha_mod,
        dm_complejo.user_crea,
        dm_complejo.user_mod,
        dm_complejo_custodio.custodioNumPersonal as 'numPersonalCustodio',
        dm_complejo_custodio.nombre as 'nombreCustodio'
        FROM
            dm_complejo
            left JOIN dm_complejo_custodio ON dm_complejo.id_complejo = dm_complejo_custodio.complejoId
        WHERE
        dm_complejo.id_complejo = $complejoid";

        $datos = parent::ObtenerDatos($query);
        return ($datos);
    }

    public function listaGerencia($complejoid){
        // COMPLEJO ES LO  MISMO QUE gerencias
        $query = "SELECT
        dm_gerencia.gerencia_id,
        dm_gerencia.nombre,
        dm_gerencia.localidad,
        dm_gerencia.centro_costo,
        dm_gerencia.cod_proceso,
        dm_gerencia.cod_seip,
        dm_gerencia.nivelCod_seip,
        dm_gerencia_custodio_copy.custodioNumPersonal as 'numPersonalCustodio',
        dm_gerencia_custodio_copy.nombre as 'nombreCustorio'
        FROM    dm_gerencia
                left JOIN dm_gerencia_custodio_copy ON dm_gerencia_custodio_copy.gerenciaId = dm_gerencia.gerencia_id
        WHERE
        dm_gerencia.complejoid = $complejoid ORDER BY 2";

        $datos = parent::ObtenerDatos($query);
        return ($datos);
    }

    public function listaPlanta($complejoid){
        // COMPLEJO ES LO  MISMO QUE gerencias
        $query = "SELECT
        dm_planta.plantaId,
        dm_planta.complejoId,
        dm_planta.complejoIDSAP,
        dm_planta.plantaIdSAP,
        dm_planta.nombre,
        dm_planta.descripcion,
        dm_planta.fecha,
        dm_planta_custodio.custodioNumPersonal as 'numPersonalCustodio',
        dm_planta_custodio.nombre as 'nombreCustodio'
        FROM
            dm_planta
            LEFT JOIN dm_planta_custodio ON dm_planta.plantaId = dm_planta_custodio.plantaId
        WHERE
        dm_planta.complejoId= $complejoid ORDER BY 5";

        $datos = parent::ObtenerDatos($query);
        return ($datos);
    }


    public function datoEquipos($complejoid,$plantaId){
        // COMPLEJO ES LO  MISMO QUE gerencias
        $query = "SELECT
        dm_equipos.equipoId,
        dm_equipos.complejoId,
        dm_equipos.localidad,
        dm_equipos.plantaId,
        dm_equipos.plantaIdSap,
        dm_equipos.EquipoCodSap,
        dm_equipos.nombre,
        dm_equipos.descripcion,
        dm_equipos.custorio
        FROM
        dm_equipos
        WHERE
        dm_equipos.complejoId=$complejoid
        and dm_equipos.plantaId = $plantaId ORDER BY 7";

        $datos = parent::ObtenerDatos($query);
        return ($datos);
    }

    





}


?>