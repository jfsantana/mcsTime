<?php
/************************************************************
 * Diseñado por Jesus Santana
 * CLASE INSPECCIONES HO 
 * Metodo servidor: $_GET, $_POST, $_PUT, $_DELETE
 * 
 * 'clases/inspeccionesho.class.php'; ccc
 *************************************************************/
if (!isset($_SESSION)) {
    session_start();  }

require_once 'conexion/conexion.php';
require_once 'respuestas.class.php';

//hereda de la clase conexion
class evaluacionesHO extends conexion {

    //header de evaluaciones Header
	private $id = 0; 
	private $tipoincidenciaId = 0;
	private $registro_fecha = '1900-01-01';
	private $inspeccion_tipo = '';
	private $inspeccion_sector = '';
	private $complejo_id = 0;
	private $inspeccion_gerencia = 0;
	private $inspeccion_area = 0;
	private $inspeccionHO_Custodio = '';
	private $inspeccionHO_nrousu = 0;
	private $inspeccion_ubicacion = '';
    private $fechaCreacion ='1900-01-01';
    private $estatus = 1;
    private $creadorId='';

 //campos y valores de la cabecera
    //private $idcampos =0;
    private $idEvaluacionHoHeader =0;
    private $idEvaluacionHOCampos =0;
    private $valor ='';



    //Header
    private $inspeccionesHeaderId = 0;
    private $tipoInspeccionesId=0;
    private $sectorId=0;
    private $complejoId=0;
    private $gerenciaId=0;
    private $areaId=0;
    private $custorioID=0;
    private $numUsuarios=0;
    private $ubicacion='';
    private $fechaInspoeccion ='1900-01-01';


    //ITEMS
    private $incidenciaBodyId=0;
    private $subTabs='';
    private $respRadio ='';
    private $respSucio ='';
    private $respInstalado='';
    private $respDeficiente='';
    private $respObservacion='';
    private $respPuntuacion='';
    
    //recomendaciones
    private $recomendacionesId='';

    //Adjuntos
    //private $attachamentID='';


    //Activaciond e token
    private $token = '';


    /************************************************************
     * Diseñado por Jesus Santana
     * Fecha: 06/08/2022
     * este metodo de la funcion R24H  mentrega todos los Tabs y los items para la carga de un reporte fintrado por tipo de inspeccion
     * OK.www
     *************************************************************/
    public function preCargaInspeccionesHO ($preCargaInspeccionTipoHO = 0){  
        $_respuestas = new respuestas;
        $condicion ="";
        if($preCargaInspeccionTipoHO != 0){
            $condicion =" where dg_inspecciones_ho_tipo.inspeccionesHOID= $preCargaInspeccionTipoHO";
        }

        $query = "  SELECT
                        dg_inspecciones_ho_tabs.inspeccionesTabsId, 
                        dg_inspecciones_ho_tabs.inspeccionesHOID, 
                        dg_inspecciones_ho_tipo.descripcionInspeccionHO, 
                        dg_inspecciones_ho_tabs.descripcionTabs, 
                        dg_inspecciones_ho_tabs.ponderacionTabs, 
                        dg_inspecciones_ho_tabs.posicionTabs
                    FROM
                        dg_inspecciones_ho_tabs
                        INNER JOIN
                        dg_inspecciones_ho_tipo
                        ON 
                            dg_inspecciones_ho_tabs.inspeccionesHOID = dg_inspecciones_ho_tipo.inspeccionesHOID
                    $condicion
                    order by dg_inspecciones_ho_tabs.posicionTabs";
        $idItemsValidate ='';
        $datosTabsHO = parent::ObtenerDatos($query);
        $tabsCount =0;   // controla la posicion del array para el insert en la variable

       if($datosTabsHO){ //recorre cada tabs
            foreach($datosTabsHO as $Tabs){         
               // print_r($Tabs); die; 
                
                $estructuraPreCargaHO[$tabsCount]['tabs']=$Tabs; 
               
                //$idItemsValidate= $idItemsValidate.$Tabs['inspeccionesTabsId'].',';
                $condicionTabsEquipo ='';
                if($Tabs['inspeccionesHOID']){
                    $condicionTabsItems ="WHERE dg_inspecciones_ho_tabs.inspeccionesTabsId = ".$Tabs['inspeccionesTabsId']."";
                }
                $querytablsItems = "SELECT
                                        dg_inspecciones_ho_tabs_items.inspeccionesItemsTabsId, 
                                        dg_inspecciones_ho_tabs_items.descripcionSubTabs, 
                                        dg_inspecciones_ho_tabs_items.descripcionItens, 
                                        dg_inspecciones_ho_tabs_items.tipoInput, 
                                        dg_inspecciones_ho_tabs_items.ponderado, 
                                        dg_inspecciones_ho_tabs_items.observacion
                                    FROM
                                        dg_inspecciones_ho_tabs
                                        INNER JOIN
                                        dg_inspecciones_ho_tabs_items
                                        ON 
                                            dg_inspecciones_ho_tabs.inspeccionesTabsId = dg_inspecciones_ho_tabs_items.inspeccionesTabsId              
                                      $condicionTabsItems
                                      order by 1";
                $datosTabsItems = parent::ObtenerDatos($querytablsItems);
                $estructuraPreCargaHO[$tabsCount]['TabsItems']=$datosTabsItems;   //inserta los equipos en el array de salida

                $queryItemsIdValidate=" SELECT
                                            dg_inspecciones_ho_tabs_items.inspeccionesItemsTabsId as 'id'
                                        FROM
                                            dg_inspecciones_ho_tabs_items
                                            WHERE
                                            dg_inspecciones_ho_tabs_items.inspeccionesTabsId=".$Tabs['inspeccionesTabsId']."";
                $datosItemsIdValidate = parent::ObtenerDatos($queryItemsIdValidate);
                $idItems='';
                foreach($datosItemsIdValidate as $ItemsIdValidate){
                    
                    $idItems=$ItemsIdValidate['id'].','.$idItems;
                }
                //print_r(substr($idItems,0,-1)); die;
                $datosItemsIdValidate = parent::ObtenerDatos($queryItemsIdValidate);
                $estructuraPreCargaHO[$tabsCount]['tabs']['idItemsValidate']=substr($idItems,0,-1); 
                $tabsCount++; 


            }

            /*hace la consulta que muetsre todos los id de un tabs*/
          //  $estructuraPreCargaHO[$tabsCount]['tabs']['idItemsValidate']=$Tabs['inspeccionesTabsId'].','; 
           
            return($estructuraPreCargaHO);
        }else{
            return $_respuestas->error_401("El complejo solicitado no tiene datos de Precarga");
        }
    }    

    /************************************************************
     * Diseñado por Jesus Santana
     * Fecha: 08/09/2022
     * este metodo de la funcion R24H  mentrega todos los tipos de inspeccioens que existen
     * OK.
     *************************************************************/
    public function ListEvaluacionesHO ($idEvaluaacionesHOHeader){
        
        if($idEvaluaacionesHOHeader=='todos'){
            $query = "SELECT
                            dg_evaluaciones_ho_header.*
                        FROM
                            dg_evaluaciones_ho_header";
        }else{
            $query = "SELECT
                            dg_evaluaciones_ho_header.*
                        FROM
                            dg_evaluaciones_ho_header 
                            WHERE id=$idEvaluaacionesHOHeader";
        }   
        
        $header = parent::ObtenerDatos($query); 
        //cuanod estas consultando una sola evaluacion
        if(count($header)==1){
            $idHeader = $header[0]['id']; 
            // $queryCampos = "SELECT
            //                     id, 
            //                     idEvaluacionHoHeader, 
            //                     idEvaluacionHOCampos, 
            //                     valor
            //                 FROM
            //                     dg_evaluaciones_ho_header_campos_result
            //                 WHERE 
            //                 idEvaluacionHoHeader =  $idHeader";

            $queryCampos = "SELECT
            dg_evaluaciones_ho_header_campos_result.id,
            dg_evaluaciones_ho_header_campos_result.idEvaluacionHoHeader,
            dg_evaluaciones_ho_header_campos_result.idEvaluacionHOCampos,
            dg_evaluaciones_ho_header_campos_result.valor,
            dg_evaluaciones_ho_campos.campoEvaluacionesHO
            FROM
            dg_evaluaciones_ho_header_campos_result
            INNER JOIN dg_evaluaciones_ho_campos ON dg_evaluaciones_ho_header_campos_result.idEvaluacionHOCampos = dg_evaluaciones_ho_campos.idEvaluacioensHOCampos
            WHERE
                idEvaluacionHoHeader  =  $idHeader";




            $campos = parent::ObtenerDatos($queryCampos);
            $respuestasCampos = [];
            foreach($campos as $camposDat){
                $respuestasCampos[]=$camposDat;
            }
            $header[0]['Respuesta'] = $respuestasCampos;
            $datos=$header;
            


            


        }else{
            $ii=0;
            foreach($header as $evaluacionHo){
                  

                $idHeader = $evaluacionHo['id'];
                // $queryCampos = "SELECT
                //                 id, 
                //                 idEvaluacionHoHeader, 
                //                 idEvaluacionHOCampos, 
                //                 valor
                //             FROM
                //                 dg_evaluaciones_ho_header_campos_result
                //             WHERE 
                //             idEvaluacionHoHeader =  $idHeader";
                $queryCampos = "SELECT
                dg_evaluaciones_ho_header_campos_result.id,
                dg_evaluaciones_ho_header_campos_result.idEvaluacionHoHeader,
                dg_evaluaciones_ho_header_campos_result.idEvaluacionHOCampos,
                dg_evaluaciones_ho_header_campos_result.valor,
                dg_evaluaciones_ho_campos.campoEvaluacionesHO
                FROM
                dg_evaluaciones_ho_header_campos_result
                INNER JOIN dg_evaluaciones_ho_campos ON dg_evaluaciones_ho_header_campos_result.idEvaluacionHOCampos = dg_evaluaciones_ho_campos.idEvaluacioensHOCampos
                WHERE
                    idEvaluacionHoHeader  =  $idHeader";
                            

                $campos = parent::ObtenerDatos($queryCampos);
                $respuestasCampos = [];
                foreach($campos as $camposDat){
                                $respuestasCampos[]=$camposDat;
                }

                



                $header[$ii]['Respuesta'] = $respuestasCampos;
                $ii++;
                $datos=$header;
                
            }

        }
       
    //    $datos = parent::ObtenerDatos($query);
        return ($datos);
    }

    /***************************************************
     * Autor: Jesus Santana
     * Metodo publico que entrega todas las incidencias teneradas por tipo
     * aplicando los filtros de la cabecera 
    ***************************************************/
    public function listaInspecciones($tipoIncidencia, $gerencia, $area, $custodio, $fechaFin, $creador, $sector, $fechaInicio, $complejo, $estatus, $fechaCreacion, $aspectos){

        $condicion="where dg_incidencias_header.tipoIncidenciaId=$tipoIncidencia ";
        if($gerencia != ''){
            $gerencia =" and dg_incidencias_header.gerenciaId = '$gerencia'";
            $bandera=1;
         }else{
            $gerencia =" ";
         }

        if($area != ''){
            $area =" and  dg_incidencias_header.areaId = $area";
            $bandera=1;
         }else{
            $area =" ";
         }

        if($custodio != ''){
            $custodio =" and  dg_incidencias_header.custorioID = $custodio";
            $bandera=1;
         }else{
            $custodio =" ";
         }

        if($fechaFin != ''){
            $fechaFin =" and  dg_incidencias_header.fechaEjecucionFin = $fechaFin";
            $bandera=1;
         }else{
            $fechaFin =" ";
         }
        if($creador != ''){
            $creador =" and  dg_incidencias_header.creadorId = $creador";
            $bandera=1;
         }else{
            $creador =" ";
         }
        if($sector != ''){
            $sector =" and  dg_incidencias_header.sectorId = $sector";
            $bandera=1;
         }else{
            $sector =" ";
         }
         if($fechaInicio != ''){
            $fechaInicio =" and dg_incidencias_header.fechaEjecucionInicio = '$fechaInicio'";
            $bandera=1;
         }else{
            $fechaInicio =" ";
         }

        if($complejo != ''){
            $complejo =" and  dg_incidencias_header.complejoId = $complejo";
            $bandera=1;
         }else{
            $complejo =" ";
         }

        if($estatus != ''){
            $estatus =" and  dg_incidencias_header.estatus = $estatus";
            $bandera=1;
         }else{
            $estatus =" ";
         }
        if($fechaCreacion != ''){
            $fechaCreacion =" and  dg_incidencias_header.fechaCreacion = $fechaCreacion";
            $bandera=1;
         }else{
            $fechaCreacion =" ";
         }
        if($aspectos != ''){
            $aspectos =" and  dg_incidencias_header.aspectos = $aspectos";
            $bandera=1;
         }else{
            $aspectos =" ";
         }




        $query = "select * from dg_incidencias_header $condicion $gerencia $area $custodio $fechaFin $creador $sector $fechaInicio $complejo $estatus $fechaCreacion $aspectos";
        //echo $query; die;
         $datos = parent::ObtenerDatos($query);
        return ($datos);
    }

    /***************************************************
     * Autor: Jesus Santana
     * Metodo publico CREATE cualqueir tipo de incicencia metoco POST
     * recibe por POST las variables de los formularios de cualquier incidencia 
     * OK.
    ***************************************************/
    public function postHeader($json){
   
        //ruta para almacenar las imagenes de las inspecciones
        $_respuestas = new respuestas;
        $datos = json_decode($json,true);

       
        if(!isset($datos['token'])){ 
            return $_respuestas->error_401();
        }else{
                        
            $this->token = $datos['token'];
            $arrayToken = $this->buscarToken();
                                  
            if($arrayToken){
               //valida los campos obligatorios
                if  (
                    (!isset($datos['tipoincidenciaId']))||
                    (!isset($datos['registro_fecha']))||
                    (!isset($datos['inspeccion_tipo']))||
                    (!isset($datos['inspeccion_sector']))||
                    (!isset($datos['complejo_id']))||
                    (!isset($datos['inspeccion_gerencia']))||
                    (!isset($datos['inspeccion_area']))||
                    (!isset($datos['inspeccionHO_Custodio']))||
                    (!isset($datos['inspeccionHO_nrousu']))
                ){
                //en caso de que la validacion no se cumpla se arroja un error
                    $datosArray =$_respuestas->error_400();
                    echo(json_encode($datosArray));
                }else{
                  
                      
                    
                    //header de evaluaciones
                    //$this->id = 0; 
                    $this->tipoincidenciaId =  @$datos['tipoincidenciaId'];
                    $this->registro_fecha =  @$datos['registro_fecha'];
                    $this->inspeccion_tipo =  @$datos['inspeccion_tipo'];
                    $this->inspeccion_sector =  @$datos['inspeccion_sector'];
                    $this->complejo_id =  @$datos['complejo_id'];
                    $this->inspeccion_gerencia =  @$datos['inspeccion_gerencia'];
                    $this->inspeccion_area = @$datos['inspeccion_area'];
                    $this->inspeccionHO_Custodio =  @$datos['inspeccionHO_Custodio'];
                    $this->inspeccionHO_nrousu =  @$datos['inspeccionHO_nrousu'];
                    $this->inspeccion_ubicacion =  @$datos['inspeccion_ubicacion'];
                    $this->fechaCreacion =  date('Y-m-d');
                    $this->creadorId =  $datos['creadoPor']; 
                    $this->estatus = 1;


                    $inspeccionHeader = $this->InsertarEvaluacionesHOHeader();
                     
                    //valida la insercion de la cabecera
                    if($inspeccionHeader){
                        
                        $insertArray="";                       
                        
                        foreach ($datos['Respuesta'] as $idcampo => $valor  ){

                            $this->id =0;
                            $this->idEvaluacionHoHeader =$inspeccionHeader;
                            $this->idEvaluacionHOCampos =$idcampo;
                            $this->valor ="$valor";

                             $inspeccionItems = $this->InsertarEvaluacionesHOItems($inspeccionHeader);
                                                        
                        }  

                        if ($inspeccionHeader || $inspeccionItems ){
                            
                            $respuesta =$_respuestas->response;
                            $respuesta["status"] ='OK';
                            $respuesta["result"] =array(
                                "error_id"   =>  '200',
                                "error_msg"  => 'Inspeccion generada con Generado con exito'
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

    /***************************************************
     * Autor: Jesus Santana
     * Metodo private para insertar la cabecera de las inspecciones
     *  OK.
    ***************************************************/
    private function InsertarEvaluacionesHOHeader(){
        $query ="insert Into dg_evaluaciones_ho_header ( 
            tipoincidenciaId,
            registro_fecha,
            inspeccion_tipo,
            inspeccion_sector,
            complejo_id,
            inspeccion_gerencia,
            inspeccion_area,
            inspeccionHO_Custodio,
            inspeccionHO_nrousu,
            inspeccion_ubicacion,
            fecha_creacion)            
        value
        (   $this->tipoincidenciaId,
            '$this->registro_fecha',
            '$this->inspeccion_tipo',
            '$this->inspeccion_sector',
            $this->complejo_id,
            $this->inspeccion_gerencia,
            $this->inspeccion_area,
            '$this->inspeccionHO_Custodio',
            $this->inspeccionHO_nrousu,
            '$this->inspeccion_ubicacion',
            '$this->fechaCreacion')";     
        $Insertar = parent::nonQueryId($query);

        if($Insertar){
            return($Insertar);
        }else{
            return 0;
        }
    }

    /***************************************************
     * Autor: Jesus Santana
     * Metodo private para insertar los hallazgos de las incidecnias
     *  OK. listo para evaluaciones
    ***************************************************/
    private function InsertarEvaluacionesHOItems($inspeccionHeader){
        $query ="insert Into dg_evaluaciones_ho_header_campos_result (  
                        idEvaluacionHoHeader,
                        idEvaluacionHOCampos,
                        valor
                    )

                value
                (   
                    $this->idEvaluacionHoHeader,
                    $this->idEvaluacionHOCampos,
                    '$this->valor')";      
                $Insertar = parent::nonQueryId($query);

        if($Insertar){
            return($Insertar);
        }else{
            return 0;
        }
    }







    /***************************************************
     * Autor: Jesus Santana
     * Metodo private para verificar que el Token existe
     * OK
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
     * OK
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


}

?>