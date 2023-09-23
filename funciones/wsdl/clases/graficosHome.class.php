<?php
/************************************************************
 * Diseñado por Jesus Santana
 * CLASE EMPLEADOS 
 * Metodo servidor: $_GET, $_POST, $_PUT, $_DELETE
 * 
 * 'clases/empleados.class.php';graficosHome.class.php 
 *************************************************************/
if (!isset($_SESSION)) {
    session_start();  }

require_once 'conexion/conexion.php';
require_once 'respuestas.class.php';

//hereda de la clase conexion
class graficosHome extends conexion {

    //Tabla Principal de Empleados
    private $tabla = "dg_incidencias_header";

    //se debe crear atributos para las tablas que se van a validar en la funcion "post" 
    //Header
    private $idEvaluacionesHO='';
    private $codEvaluaiocnesHO='';
    private $NombreEvaluacionesHO='';
    private $fechaCreacion='1980-01-01';
    private $creadoPor='';
    private $estatus='';
    

    //halazgos
    private $idEvaluacioensHOCampos='';
    //private $idEvaluacionesHO='';
    private $campoEvaluacionesHO='';
    private $tipoEvaluacionesHO='';
    private $ordenEvaluaacionesHO='';
    private $ayudaCampoEvaluacionesHO='';
    private $ubicacion='';
    private $opcionesCampoSelect='';

    //Activaciond e token
    private $token = '';

    /***************************************************
     * Autor: Jesus Santana
     * Metodo publico que entrega todas los tipos de evaluaciones
     * aplicando los filtros de la cabecera 
    ***************************************************/
    public function simulacionesXComplejo(){

        $query = "
            SELECT
                complejo_id, 	Count(id) as 'total'
                FROM
                    dg_eva_sim_header
                
                group by complejo_id
                order by 1";
        //        echo $query; die;
         $datos = parent::ObtenerDatos($query);
        return ($datos);
    }

    /***************************************************
     * Autor: Jesus Santana
     * Metodo publico que entrega todas los tipos de evaluaciones
     * aplicando los filtros de la cabecera 
    ***************************************************/
    public function recomendacionesXComplejo(){

        $query = "
            SELECT
                dg_incidencias_header.complejoId, 
                COUNT(dg_incidencias_recomendaicones.recomendacionesId) as recomensaciones
            FROM
                dg_incidencias_header
                INNER JOIN
                dg_incidencias_recomendaicones
                ON 
                    dg_incidencias_header.incidenciaHeaderId = dg_incidencias_recomendaicones.incidenciaBodyId
                    
                    GROUP BY 	dg_incidencias_header.complejoId";
        //        echo $query; die;
         $datos = parent::ObtenerDatos($query);
        return ($datos);
    }

    /***************************************************
     * Autor: Jesus Santana
     * Metodo publico que entrega todas hallazgo abiertos de una inspeccion 
     * que se se filtra por sector, complejo, gerencia y area
    ***************************************************/
    public function Precarga(  $codEvaluaiocnesHO)
        {    
            $i=0;                                        
            $_respuestas = new respuestas;
            $precarga = array();
            $bandera=0;
            $condicion='WHERE 	dg_evaluaciones_ho_informes.estatus = 1';
           
            if($codEvaluaiocnesHO != ''){
                $incidencia_codEvaluaiocnesHO ="and dg_evaluaciones_ho_informes.codEvaluaiocnesHO ='$codEvaluaiocnesHO'";
                $bandera=1;
            }else{
                $incidencia_codEvaluaiocnesHO =" ";
            }
            
            if($bandera!=0){
                $condicion=" $condicion $incidencia_codEvaluaiocnesHO ";
            }

            $query = "SELECT
                            dg_evaluaciones_ho_informes.idEvaluacionesHO, 
                            dg_evaluaciones_ho_informes.codEvaluaiocnesHO, 
                            dg_evaluaciones_ho_informes.NombreEvaluacionesHO
                        FROM
                            dg_evaluaciones_ho_informes
                                $condicion
                       ";
            $datos = parent::ObtenerDatos($query);

           
            $precarga[$i]['infome']['datos']=$datos;

            foreach($datos as $informe){
                /* campos adicioales para la cabecera*/
                $queryHeader = "SELECT
                                dg_evaluaciones_ho_campos.idEvaluacioensHOCampos, 
                                dg_evaluaciones_ho_campos.campoEvaluacionesHO, 
                                dg_evaluaciones_ho_campos.tipoEvaluacionesHO, 
                                dg_evaluaciones_ho_campos.ordenEvaluaacionesHO, 
                                dg_evaluaciones_ho_campos.ayudaCampoEvaluacionesHO, 
                                dg_evaluaciones_ho_campos.ubicacion, 
                                dg_evaluaciones_ho_campos.opcionesCampoSelect
                            FROM
                                dg_evaluaciones_ho_informes
                                INNER JOIN
                                dg_evaluaciones_ho_campos
                                ON 
                                    dg_evaluaciones_ho_informes.idEvaluacionesHO = dg_evaluaciones_ho_campos.idEvaluacionesHO
                            WHERE 	
                                dg_evaluaciones_ho_campos.estatus = 1 
                                and dg_evaluaciones_ho_informes.codEvaluaiocnesHO ='".$informe['codEvaluaiocnesHO']."'
                                and ubicacion = 'header'
                            ORDER BY 	dg_evaluaciones_ho_campos.ordenEvaluaacionesHO ASC";

                $header = parent::ObtenerDatos($queryHeader);
                $precarga[$i]['infome']['equipo']=$header;

                /* campos adicioales para las tablas*/
                $queryCampos = "SELECT
                                dg_evaluaciones_ho_campos.idEvaluacioensHOCampos, 
                                dg_evaluaciones_ho_campos. idEvaluacionesHO,
                                dg_evaluaciones_ho_campos.campoEvaluacionesHO, 
                                dg_evaluaciones_ho_campos.tipoEvaluacionesHO, 
                                dg_evaluaciones_ho_campos.ordenEvaluaacionesHO, 
                                dg_evaluaciones_ho_campos.ayudaCampoEvaluacionesHO, 
                                dg_evaluaciones_ho_campos.ubicacion, 
                                dg_evaluaciones_ho_campos.opcionesCampoSelect
                            FROM
                                dg_evaluaciones_ho_informes
                                INNER JOIN
                                dg_evaluaciones_ho_campos
                                ON 
                                    dg_evaluaciones_ho_informes.idEvaluacionesHO = dg_evaluaciones_ho_campos.idEvaluacionesHO
                            WHERE 	
                                dg_evaluaciones_ho_campos.estatus = 1 
                                and dg_evaluaciones_ho_informes.codEvaluaiocnesHO ='".$informe['codEvaluaiocnesHO']."'
                                and ubicacion = 'body'
                            ORDER BY 	dg_evaluaciones_ho_campos.ordenEvaluaacionesHO ASC";

                $campos = parent::ObtenerDatos($queryCampos);
                $precarga[$i]['infome']['campos']=$campos;



            }
            return ($precarga);
        }

    




    /***************************************************
     * Autor: Jesus Santana
     * Metodo private para verificar que el Token existe
     *  
    ***************************************************/
    private function buscarToken(){
        $query ="select * from dg_empleado_token where token = '$this->token' and estado = 1";

        $resp = parent::ObtenerDatos($query);

        if($resp){
            $actualizarToken = $this->actualizarToken($resp[0]['empleadoTokenId']);
            return($resp);
        }else{
            return 0;
        }
    }

    /***************************************************
     * Autor: Jesus Santana
     * Metodo private actualizar la fecha del token
     *  
    ***************************************************/
    private function actualizarToken($tokenId){
        $date = date("Y-m-d H:i");
        $query = "update dg_empleado_token set date = '$date' where empleadoTokenId = '$tokenId'";
        $resp = parent::nonQuery($query);
    
        if($resp>=1){
            return($resp);
        }else{
            return 0;
        }

    }

    public function detalleIncidenciaId($detalleIncidenciaId){ 
         
        $_respuestas = new respuestas;
        $condicion ="";
        if($detalleIncidenciaId != 0){
            $condicion =" WHERE incidenciaHeaderId =  $detalleIncidenciaId ";
        }else{
            return $_respuestas->error_401("No es valido el numero de Inspeccion, vuelva a intenarlo");
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
        
        if($datosHeader){
            /****cabecera */
            foreach($datosHeader  as $header){
                $inspeccion['inspeccion']=$header; 
                
            }
            
            $condicionHallazgo =" WHERE incidenciaHeaderId =  $detalleIncidenciaId ";
            $queryHallazgoz="SELECT
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

            if($datoshallazgos){
                $i=-1;
                foreach($datoshallazgos  as $hallazgos){
                   $i++;
                     /****Hallazgos */
                    $inspeccion['inspeccion']['hallazgos'][$i]=$hallazgos;
                    $condicionRecomendacion =" WHERE incidenciaBodyId=".$hallazgos['incidenciaBodyId'];
                    $queryRecomendaciones="SELECT
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
                    $inspeccion['inspeccion']['hallazgos'][$i]['recomendaciones']=$datosRecomenaciones;

                    
                   
                }
                /****Attachament */
                $condicionAttachament =" WHERE incidenciasId=".$detalleIncidenciaId;
                $queryAttachament1="SELECT * FROM dg_incidencias_attachament  $condicionAttachament  Order by attachamentID";
                // echo $queryAttachament1; die;                       
                 $datosAttachaments = parent::ObtenerDatos($queryAttachament1); 
                $inspeccion['inspeccion']['attachament']=$datosAttachaments;
            }

            return($inspeccion); 
            


        }else{
            return $_respuestas->error_401("La inspeccion solicitada no tiene datos para visualizar");
        }

        
        

            /*hace la consulta que muetsre todos los id de un tabs*/
            //  $estructuraPreCargaHO[$tabsCount]['tabs']['idItemsValidate']=$Tabs['inspeccionesTabsId'].','; 
            
            
        
    }   

}

?>