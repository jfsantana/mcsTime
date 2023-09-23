<?php
/************************************************************
 * Diseñado por Jesus Santana
 * CLASE INSPECCIONES HO 
 * Metodo servidor: $_GET, $_POST, $_PUT, $_DELETE
 * 
 * 'clases/inspeccionesho.class.php'; ddddd
 *************************************************************/
if (!isset($_SESSION)) {
    session_start();  }

require_once 'conexion/conexion.php';
require_once 'respuestas.class.php';

//hereda de la clase conexion
class inspeccionesHO extends conexion {

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
    private $fechaInspeccion ='1900-01-01';
    private $fechaInspoeccion ='1900-01-01';
    private $fechaCreacion ='1900-01-01';
    private $estatus = 1;
    private $creadorId='';
    private $SubSector='';

    //ITEMS
    private $incidenciaBodyId=0;
    private $subTabs='';
    private $respRadio ='';
    private $respSucio ='';
    private $respInstalado='';
    private $respDeficiente='';
    private $respObservacion='';
    private $respPuntuacion='';
    private $campoId=0;
    private $respIntegridad='';
    private $respAdecuado='';
    private $respOportuno='';
    private $numLamparas='';
    



    
    //recomendaciones
    private $recomendacionesId='';

    //Adjuntos
    //private $attachamentID='';


    //Activaciond e token
    private $token = '';

    public function ConsultHeader($complejoId,$tipoIncidenciaId,$creadorId,$gerenciaId, $incidenciaHeaderId){
        $where="";

        if($incidenciaHeaderId){
            $where= "WHERE  incidenciaHeaderId =  $incidenciaHeaderId";
        }else{

            $where = " WHERE tipoIncidenciaId=$tipoIncidenciaId";

            if(isset($complejoId)){ //entra si  existe
                $where =$where . " AND complejoId=$complejoId";
            }
            if(isset($creadorId)){ //entra si  existe
                $where =$where . " AND creadorId='$creadorId'";
            }
            if(isset($gerenciaId)){ //entra si  existe
                $where =$where . " AND gerenciaId=$gerenciaId";
            }
        }




        $query="SELECT
                        *
                FROM
                dg_inspecciones_ho_header
                $where
                order by 1 desc";

                
        $datosHeader = parent::ObtenerDatos($query);

        return ($datosHeader);
    }





    public function DetalleInspeccionHO($idHeaderInspeccionHO){
        $respuesta= array();
        $where="";
        $where = " where dg_inspecciones_ho_items.inspeccionesHeaderId=$idHeaderInspeccionHO";



        $query="SELECT
                    DISTINCT dg_inspecciones_ho_items.subTabs
                    FROM
                    dg_inspecciones_ho_items
                    $where
                    order by 1 ";

        $datosItemsAll = parent::ObtenerDatos($query);

  
        
        if($datosItemsAll){ 
            foreach($datosItemsAll as $datosItems){
                //print_r($datosItems['subTabs']);die;
                $idTab=$datosItems['subTabs'];
                $queryDetail="SELECT
                                    dg_inspecciones_ho_items.inspeccionesItemsId,
                                    dg_inspecciones_ho_items.inspeccionesHeaderId,
                                    dg_inspecciones_ho_items.subTabs,
                                    dg_inspecciones_ho_tabs.descripcionTabs,
                                    dg_inspecciones_ho_items.respRadio,
                                    dg_inspecciones_ho_items.respSucio,
                                    dg_inspecciones_ho_items.respInstalado,
                                    dg_inspecciones_ho_items.respDeficiente,
                                    dg_inspecciones_ho_items.respObservacion,
                                    dg_inspecciones_ho_items.respPuntuacion,
                                    dg_inspecciones_ho_items.fechaCreacion,
                                    dg_inspecciones_ho_items.estatus,
                                    dg_inspecciones_ho_items.creadorId,
                                    dg_inspecciones_ho_items.campoId,
                                    dg_inspecciones_ho_tabs_items.descripcionItens,
                                    dg_inspecciones_ho_items.respIntegridad,
                                    dg_inspecciones_ho_items.respAdecuado,
                                    dg_inspecciones_ho_items.respOportuno,
                                    dg_inspecciones_ho_items.numLamparas
                                    FROM
                                    dg_inspecciones_ho_items
                                    INNER JOIN dg_inspecciones_ho_tabs ON dg_inspecciones_ho_tabs.inspeccionesTabsId = dg_inspecciones_ho_items.subTabs
                                    INNER JOIN dg_inspecciones_ho_tabs_items ON dg_inspecciones_ho_items.campoId = dg_inspecciones_ho_tabs_items.inspeccionesItemsTabsId 
                                 where dg_inspecciones_ho_items.inspeccionesHeaderId=$idHeaderInspeccionHO 
                                        and dg_inspecciones_ho_items.subTabs= $idTab
                                order by campoId ";

//echo $queryDetail ; die;
                $camposByTabs = parent::ObtenerDatos($queryDetail);   
                $respuesta[$idTab]= $camposByTabs;           
            }

            return ($respuesta);
        }else{
            echo 'Sini datos'; die;
        }
    }
            
    /************************************************************
     * Diseñado por Jesus Santana
     * Fecha: 06/08/2022
     * este metodo de la funcion R24H  mentrega todos los Tabs y los items para la carga de un reporte fintrado por tipo de inspeccion
     * OK.
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

            /*hace la consulta que muestre todos los id de un tabs*/
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
    public function tipoInspeccionesHO (){
        $query = "SELECT * FROM dg_inspecciones_ho_tipo ORDER BY 2";
        $datos = parent::ObtenerDatos($query);
        return ($datos);
    }

    /***************************************************
     * Autor: Jesus Santana
     * Metodo publico que entrega todas las incidencias Generadas por tipo
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
        //$patch= $_SERVER['DOCUMENT_ROOT'].'/siaho/public/attachment/inspecciones/';
        $_respuestas = new respuestas;
     
        $datos = json_decode($json,true);
       
        if(!isset($datos['token'])){ 
            return $_respuestas->error_401();
        }else{
                        
            $this->token = $datos['token'];
            $arrayToken = $this->buscarToken();
                           
            if($arrayToken){
                    //print_r($datos['header']['inspeccion_tipo']);die;
               //valida los campos obligatorios
                if  (
                    (!isset($datos['header']['registro_fecha']))||
                    (!isset($datos['header']['inspeccion_tipo']))||
                    (!isset($datos['header']['inspeccion_sector']))||
                    (!isset($datos['header']['complejo_id']))||
                    (!isset($datos['header']['inspeccion_gerencia']))||
                    (!isset($datos['header']['inspeccion_area']))||
                    (!isset($datos['header']['inspeccionHO_custodio']))||
                    (!isset($datos['header']['inspeccionHO_nrousu']))||
                    (!isset($datos['header']['inspeccion_ubicacion']))
                ){
                //en caso de que la validacion no se cumpla se arroja un error
                    $datosArray =$_respuestas->error_400();
                    echo(json_encode($datosArray));
                }else{
                  
                                                                                             
                //Asignacion de datos validados su existencia 
                    $this->tipoInspeccionesId = $datos['header']['inspeccion_tipo'];
                    $this->sectorId = $datos['header']['inspeccion_sector'];
                    $this->complejoId = $datos['header']['complejo_id'];
                    $this->gerenciaId = $datos['header']['inspeccion_gerencia']; 
                    $this->areaId = $datos['header']['inspeccion_area'];
                    $this->custorioID = $datos['header']['inspeccionHO_custodio']; 
                    $this->numUsuarios = $datos['header']['inspeccionHO_nrousu'];
                    $this->ubicacion = $datos['header']['inspeccion_ubicacion'];
                    $this->fechaInspoeccion = $datos['header']['registro_fecha'];
                    $this->fechaCreacion =  date('Y-m-d');
                    $this->estatus = 1;
                    $this->creadorId =  $datos['creadoPor']; 
                    $this->SubSector =  $datos['header']['SubSector']; 
                    //print_r($datos);die;   
                    $inspeccionHeader = $this->InsertarInspeccionesHeader();

                    //valida la insercion de la cabecera
                    if($inspeccionHeader){
                        $insertArray="";
                        
                        //echo $this->tipoInspeccionesId; die;
                        if($this->tipoInspeccionesId != '' ){

                            foreach ($datos['Item'] as $ItemsAll  ){
                                foreach($ItemsAll as $Items){
                                 //   print_r(@$Items); die;
                                    $this->subTabs =         @$Items['TabsId'];
                                    $this->campoId =         @$Items['ItemsId'];
                                    if($this->tipoInspeccionesId == 3 ){
                                   //=3    
                                        $this->respIntegridad =  @$Items['Integridad']; 
                                        $this->respSucio =       @$Items['Lipieza']; 
                                        $this->respDeficiente =  @$Items['ParteDeteriorada'];
                                        $this->respAdecuado=     @$Items['Adecuado'];  
                                        $this->respOportuno=     @$Items['Oportuno']; 
                                        $this->respObservacion=  @$Items['resObservacion'];  
                                    }else{
                                    //!= 3
                                        $this->respRadio      = @$Items['Resp'];
                                        $this->respSucio      = @$Items['respSucio']; 
                                        $this->respInstalado  = @$Items['respInstalado'];
                                        $this->respDeficiente = @$Items['respDeficiente'];
                                        $this->respObservacion= @$Items['resObservacion'];
                                        $this->respPuntuacion = @$Items['respPuntuacion'];
                                        $this->numLamparas =    @$Items['numLamparas'];
                                    }
                                    



                                    $inspeccionItems = $this->InsertarInspeccionesItems($inspeccionHeader);  
                                }
                            }  
                        }else{
                            foreach ($datos['Item'] as $Items  ){
                                $resp='';

                                $this->subTabs        = @$Items['subTabs'];
                                $this->respRadio      = @$Items['Resp'];
                                $this->respSucio      = @$Items['respSucio']; 
                                $this->respInstalado  = @$Items['respInstalado'];
                                $this->respDeficiente = @$Items['respDeficiente'];
                                $this->respObservacion= @$Items['respObservacion'];
                                $this->respPuntuacion = @$Items['respPuntuacion'];
                                
                                $inspeccionItems = $this->InsertarInspeccionesItems($inspeccionHeader);                           
                            } 
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

    private function InsertarInspeccionesHeader(){
        $query ="insert Into dg_inspecciones_ho_header ( 
            tipoIncidenciaId,
            sectorId,
            complejoId,
            gerenciaId,
            areaId,
            custorioID,
            numUsuarios,
            ubicacion,
            fechaEjecucionInicio,
            fechaCreacion,
            estatus,
            creadorId,
            subSectorId)            
        value
        (   '$this->tipoInspeccionesId',
            '$this->sectorId',
            '$this->complejoId',
            '$this->gerenciaId',
            '$this->areaId',
            '$this->custorioID',
            '$this->numUsuarios',
            '$this->ubicacion',
            '$this->fechaInspoeccion',
            '$this->fechaCreacion',
            '$this->estatus',
            '$this->creadorId',
            '$this->SubSector')";   
        
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
     *  OK.
    ***************************************************/
    private function InsertarInspeccionesItems($inspeccionHeader){

        $query ="insert Into dg_inspecciones_ho_items (  
                    inspeccionesHeaderId,
                    subTabs,
                    respRadio,
                    respSucio,
                    respInstalado,
                    respDeficiente,
                    respObservacion,
                    respPuntuacion,
                    fechaCreacion,
                    estatus,
                    creadorId,
                    campoId,
                    respIntegridad,
                    respAdecuado,
                    respOportuno,
                    numLamparas)
                value
                (   $inspeccionHeader,
                    '$this->subTabs',
                    '$this->respRadio',
                    '$this->respSucio',
                    '$this->respInstalado',
                    '$this->respDeficiente',
                    '$this->respObservacion',
                    '$this->respPuntuacion',
                    '$this->fechaCreacion',
                    '$this->estatus',
                    '$this->creadorId',
                    '$this->campoId',
                    '$this->respIntegridad',
                    '$this->respAdecuado',
                    '$this->respOportuno',
                    '$this->numLamparas')";   

                   // print_r($query);die;    
        //echo $query ;die;
                $Insertar = parent::nonQueryId($query);

        if($Insertar){
            return($Insertar);
        }else{
            return 0;
        }
    }

    public function put($json){
        // $_respuestas = new respuestas;
        // $datos = json_decode($json,true);

        // if(!isset($datos['token'])){
        //     return $_respuestas->error_401();
        // }else{
        //     $this->token = $datos['token'];
        //     $arrayToken = $this->buscarToken();

        //     if($arrayToken){
        //      //solo validamos que tenga la clave primaria para poder eliminar correctamente el resgitro
        //         if  (
        //             (!isset($datos['id']))
        //         ){
        //         //en caso de que la validacion no se cumpla se arroja un error
        //             $datosArray =$_respuestas->error_400();
        //             echo(json_encode($datosArray));
        //         }else{
        //             //Asignacion de datos validados su existencia en el If anterior
        //             $this->id = $datos['id'];
        //             //Asignacion del resto de los campos sin validacion
        //             if (isset($datos['empleados_nroPersonal'])){$this->empleados_nroPersonal = $datos['empleados_nroPersonal'];}
        //             if (isset($datos['empleados_cedula'])){$this->empleados_cedula = $datos['empleados_cedula'];}
        //             if (isset($datos['cargoSap'])){$this->cargoSap = $datos['cargoSap'];}
        //             if (isset($datos['password'])){$this->password = $datos['password'];}
        //             if (isset($datos['nombre'])){$this->nombre = $datos['nombre'];}
        //             if (isset($datos['userSap'])){$this->userSap = $datos['userSap'];}
        //             if (isset($datos['cargoActual'])){$this->cargoActual = $datos['cargoActual'];}
        //             if (isset($datos['creador'])){$this->creador = $datos['creador'];}
        //             if (isset($datos['fechaCreacion'])){$this->fechaCreacion = $datos['fechaCreacion'];}
        //             if (isset($datos['activo'])){$this->activo = $datos['activo'];}

        //             //llama a la funcion de insertar
        //             $resp = $this->UpdateInspecciones();

        //             //valida que paso d/rante el inser
        //             if($resp){
        //                 $respuesta =$_respuestas->response;
        //                 $respuesta["result"] =array(
        //                     "Id"=> $this->id
        //                 );
        //                 return $respuesta;
        //             }else{
        //             return $_respuestas->error_500(); 
        //             }

        //         }




        //     }else{
        //         return $_respuestas->error_401("El Token que envio es invalido o ha caducado");
        //     }
        // }
    }

    private function UpdateInspecciones(){
        // $query ="update ". $this->tabla. " set empleados_cedula = $this->empleados_cedula , 
        // empleados_nroPersonal =$this->empleados_nroPersonal, 
        // password ='$this->password', 
        // nombre ='$this->nombre', 
        // userSap = '$this->userSap', 
        // cargoSap = '$this->cargoSap', 
        // cargoActual = '$this->cargoActual', 
        // creador = '$this->creador', 
        // fechaCreacion = '$this->fechaCreacion', 
        // activo = '$this->activo'
        // WHERE id = $this->id";
        
        //  //print_r ($query);die;

        // $update = parent::nonQuery($query);

       
        // if($update>=1){
        //     return($update);
        // }else{
        //     return 0;
        // }
    }

    public function delete($json){
        // $_respuestas = new respuestas;
        // $datos = json_decode($json,true);

        // if(!isset($datos['token'])){
        //     return $_respuestas->error_401();
        // }else{
        //     $this->token = $datos['token'];
        //     $arrayToken = $this->buscarToken();

        //     if($arrayToken){
        //                 //solo validamos que tenga la clave primaria para poder eliminar correctamente el resgitro
        //         if  (
        //             (!isset($datos['id']))
        //         ){
        //         //en caso de que la validacion no se cumpla se arroja un error
        //             $datosArray =$_respuestas->error_400();
        //             echo(json_encode($datosArray));
        //         }else{
        //             //Asignacion de datos validados su existencia en el If anterior
        //             $this->id = $datos['id'];

        //             //llama a la funcion de insertar
        //             $resp = $this->EliminarInspecciones();

        //             //valida que paso d/rante el inser
        //             if($resp){
        //                 $respuesta =$_respuestas->response;
        //                 $respuesta["result"] =array(
        //                     "Msg"=> "eliminado el registro $this->id"
        //                 );
        //                 return $respuesta;
        //             }else{
        //             return $_respuestas->error_500(); 
        //             }

        //         }
        //     }else{
        //         return $_respuestas->error_401("El Token que envio es invalido o ha caducado");
        //     }
        // }
    }

    private function EliminarInspecciones(){
        // $query ="delete from $this->tabla 
        // WHERE id = $this->id";
        
        // $update = parent::nonQuery($query);

        // if($update>=1){
        //     return($update);
        // }else{
        //     return 0;
        // }
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