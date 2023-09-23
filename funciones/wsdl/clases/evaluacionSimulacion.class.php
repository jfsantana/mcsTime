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
class evaluacionSimulacion extends conexion {

    //Tabla Principal de Empleados
    private $tabla = "dg_incidencias_header";

    //se debe crear atributos para las tablas que se van a validar en la funcion "post" 
    //Header
    private $id='';
    private $complejo_id='';
    private $area='';
    private $fecha_Ejecucion='1980-01-01';
    private $hora_inicio='';
    private $hora_fin='';
    private $producto='';
    private $equipo='';
    private $simulacion='';
    private $Tipo_Emergencia='';
    private $creadoPor='';
    private $fechaCreacion='1980-01-01';
    
    private $idTabs='';
    private $isPregunta='';
    private $Respuesta='';
    private $observacion='';


    //Activaciond e token
    private $token = '';

    /***************************************************
     * Autor: Jesus Santana
     * Metodo publico que entrega todas los tipos de evaluaciones
     * aplicando los filtros de la cabecera 
    ***************************************************/
    public function precargaItems(){
        $precarga = array();
        $query = "SELECT
                    dg_eva_sim_tabs_precarga.id, 
                    dg_eva_sim_tabs_precarga.DescripcionTabs
                FROM
                    dg_eva_sim_tabs_precarga
                ORDER BY ID";
        $datos = parent::ObtenerDatos($query);
    
        $i = 0;
        foreach($datos as $informe){
            $precarga[$i] = $informe;
            $itemsSQL = "SELECT
                            dg_eva_sim_item_precarga.id, 
                            dg_eva_sim_item_precarga.DescripcionPregunta
                        FROM
                            dg_eva_sim_item_precarga
                        WHERE idTab = ".$informe['id']."
                        ORDER BY id";
            $ItemsList = parent::ObtenerDatos($itemsSQL);
            $precarga[$i]['items']=$ItemsList;
            $i++;
        }
        return ($precarga);
    }

    /***************************************************
     * Autor: Jesus Santana
     * Metodo publico CREATE cualqueir tipo de incicencia metoco POST
     * recibe por POST las variables de los formularios de cualquier incidencia 
     * OK.
    ***************************************************/
    public function postHeader($json){
       
        //ruta para almacenar las imagenes de las simulacion
        $_respuestas = new respuestas;
        $datos = json_decode($json,true);
        
       
        if(!isset($datos['header']['token'])){ 
            return $_respuestas->error_401();
        }else{
              
            $this->token = $datos['header']['token'];
            $arrayToken = $this->buscarToken();
         //   print_r($datos); die;                
            if($arrayToken){
               //valida los campos obligatorios
                if  (
                    (!isset($datos['header']['complejo_id']))||
                    (!isset($datos['header']['area']))||
                    (!isset($datos['header']['fecha_Ejecucion']))||
                    (!isset($datos['header']['Hora_inicio']))||
                    (!isset($datos['header']['Hora_fin']))||
                    (!isset($datos['header']['producto']))||
                    (!isset($datos['header']['Equipo']))||
                    (!isset($datos['header']['Simulacion']))||
                    (!isset($datos['header']['Tipo_Emergencia']))
                ){
                    $datosArray =$_respuestas->error_400();
                    echo(json_encode($datosArray));
                }else{
                    //header de simulacion
                    $this->id = 0; 
                    $this->complejo_id =  @$datos['header']['complejo_id'];
                    $this->area =  @$datos['header']['area'];
                    $this->fecha_Ejecucion =  @$datos['header']['fecha_Ejecucion'];
                    $this->hora_inicio =  @$datos['header']['Hora_inicio'];
                    $this->hora_fin =  @$datos['header']['Hora_fin'];
                    $this->producto =  @$datos['header']['producto'];
                    $this->equipo =  @$datos['header']['Equipo'];
                    $this->simulacion =  @$datos['header']['Simulacion'];
                    $this->Tipo_Emergencia =  @$datos['header']['Tipo_Emergencia'];
                    $this->creadoPor =  @$datos['header']['creadoPor']; 
                    $this->fechaCreacion =  date('Y-m-d');

                   // print_r($arrayToken); die;  
                    $SimulacionHeader = $this->InsertarSimulacionHeader();
                     
                    //valida la insercion de la cabecera
                    if(@$SimulacionHeader){
                        
                        $insertArray="";                       
                        //print("<pre>".print_r($datos['body'],true)."</pre>"); die;
                        foreach ($datos['body'] as $Tabs  ){

                            $this->idTabs=$Tabs['idTabs'];

                         //   echo $this->idTabs; die;
                            if (count($Tabs['Respuesta'])>0){
                                $this->isPregunta='';
                                $this->Respuesta='';
                                $this->observacion='';
                                foreach ($Tabs['Respuesta'] as $RespuestaValor ){
                                    $this->isPregunta=@$RespuestaValor['id'];
                                    $this->Respuesta=@$RespuestaValor['Respuesta'];
                                    $this->observacion=@$RespuestaValor['observacion'];
                                    $SimulacionItems = $this->InsertarSimulacionItems($SimulacionHeader);
                                
                                    if($SimulacionItems ){
                                        $this->isPregunta='';
                                        $this->Respuesta='';
                                        $this->observacion='';
                                    }

                                }

                            }else{
                                return $_respuestas->error_401("El tabs de la simulacion no tiene Respuestas");
                            }
                           
                                                        
                        }  

                        if (@$SimulacionHeader|| $SimulacionItems ){
                            
                            $respuesta =$_respuestas->response;
                            $respuesta["status"] ='OK';
                            $respuesta["result"] =array(
                                "error_id"   =>  '200',
                                "error_msg"  => 'Simulacion Generada con exito'
                            );
                            return $respuesta;
                        }else{
                            return $_respuestas->error_500(); 
                        }
                    }else{
                        return $_respuestas->error_500(); 
                    }
                }
            }else{
                return $_respuestas->error_401("El Token que envio es invalido o ha caducado");
            }
        }
    }

    /******
     * INSERTAR EL HEADER DE LA SIMULACION 
     * 
     */

    private function InsertarSimulacionHeader(){
        $query ="insert Into dg_eva_sim_header
        (
            complejo_id,
            area_id,
            fecha_Ejecucion,
            hora_inicio,
            hora_fin,
            producto,
            equipo_id,
            simulacion_id,
            Tipo_Emergencia,
            creado_Por,
            fechaCreacion
        )
        value
        (
            '".$this->complejo_id."',
            '".$this->area."',
            '".$this->fecha_Ejecucion."',
            '".$this->hora_inicio."',
            '".$this->hora_fin."',
            '".$this->producto."',
            '".$this->equipo."',
            '".$this->simulacion."', 
            '".$this->Tipo_Emergencia."',
            '".$this->creadoPor."',
            '".$this->fechaCreacion."'
            
        )";

        $Insertar = parent::nonQueryId($query);
        // print_r ($Insertar);die;
        if($Insertar){
            return($Insertar);
        }else{
            return 0;
        }
    }

        /******
     * INSERTAR EL HEADER DE LA SIMULACION 
     * 
     */

     private function InsertarSimulacionItems($idHeaderSimulacion){
        $query ="insert Into dg_eva_sim_items_resp
        ( 
            id_dg_eva_sim_Header,
            idTab,
            idPregunta,
            Respuesta,
            Observacion
            
        )
        value
        (
            '".$idHeaderSimulacion."',
            '".$this->idTabs."',
            '".$this->isPregunta."',
            '".$this->Respuesta."',
            '".$this->observacion."'            
        )";

        $Insertar = parent::nonQueryId($query);
        // print_r ($Insertar);die;
        if($Insertar){
            return($Insertar);
        }else{
            return 0;
        }
    }

    /***************************************************
     * Autor: Jesus Santana
     * Metodo publico que entrega todas los tipos de evaluaciones
     * aplicando los filtros de la cabecera 
    ***************************************************/
    public function ListHeader($idComplejo, $idArea){
        $response = array();

        $where =" WHERE  id <>'' ";

        if($idComplejo != 'todas'){
            $where= $where." and complejo_id= $idComplejo";
        }
        if($idArea != 'todas'){
            $where= $where." and area_id= $idArea";
        }

        $query = "SELECT
                        dg_eva_sim_header.*
                    FROM
                        dg_eva_sim_header
                    $where
                    order by FechaCreacion DESC	
                    ";
        $datos = parent::ObtenerDatos($query);
        //print_r($datos); die;
        
        $i = 0;
        foreach($datos as $informe){
            
            $response[$i]['header'] = $informe;
           
            $itemsSQL = "SELECT
                            DISTINCT
	                        dg_eva_sim_items_resp.idTab
                        FROM
                            dg_eva_sim_items_resp
                            
                            where 
                            id_dg_eva_sim_Header= ".$informe['id']."
                            
                            order by idTab, idPregunta";
            $ItemsList = parent::ObtenerDatos($itemsSQL);
            //$response[$i]['items']['tabs']=$ItemsList;
            
            foreach($ItemsList as $tabsValor){
            // ); 
                $queryRespuetsas = "SELECT
                                        dg_eva_sim_items_resp.id, 
                                        dg_eva_sim_items_resp.id_dg_eva_sim_Header, 
                                        dg_eva_sim_items_resp.idTab, 
                                        dg_eva_sim_items_resp.idPregunta, 
                                        dg_eva_sim_items_resp.Respuesta, 
                                        dg_eva_sim_items_resp.Observacion
                                    FROM
                                        dg_eva_sim_items_resp
                                        
                                        where 
                                        id_dg_eva_sim_Header=".$informe['id']." and 
                                        dg_eva_sim_items_resp.idTab= ".$tabsValor['idTab']."
                                        
                                        order by  idPregunta";

                $RespuestasFormulario = parent::ObtenerDatos($queryRespuetsas);
               // print_r($RespuestasFormulario); die;
                
               //$response[$i]['items'][$tabsValor['idTab']]=$tabsValor['idTab'];
                
                //$response[$i]['items']['tabs']=$RespuestasFormulario;
                $response[$i]['items'][$tabsValor['idTab']]['result']=$RespuestasFormulario ;
                //print_r($response); die;
            }
            

            $i++;
        }
        return ($response);
    }


    /*****************
     * 
     * 
     */
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