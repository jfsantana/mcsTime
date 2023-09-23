<?php
/************************************************************
 * Diseñado por Jesus Santana
 * CLASE INSPECCIONES MP
 * Metodo servidor: $_GET, $_POST, $_PUT, $_DELETE
 * 
 * 'clases/materialesPeligrosos.class.php';
 *************************************************************/
if (!isset($_SESSION)) {
    session_start();  }

require_once 'conexion/conexion.php';
require_once 'respuestas.class.php';
  //LIBRERIA DE CONSUMO DE SERVICIOS
require_once ('consumoApi.class.php');

//hereda de la clase conexion
class mp extends conexion {

    //Header
    private $mpHeaderId = 0;
    private $fecha='1900-01-01';
    private $complejoId = 0;
    private $gerenciaId = 0;
    private $areaId = 0;
    private $custorioID = 0;
    private $ubicacion = 0;
    private $creadorId = 0;
    private $estatus = 1;
    private $fechaCreacion='1900-01-01';


    //ITEMS
    private $mpItemsId = 0;
    //private $mpHeaderId = 0;
    private $registro = 0;
    private $nombreMaterial = 0;
    private $IdentificacionCaso = 0;
    private $caracteristciasFisicas = 0;
    private $claseRiesgo = 0;
    private $division = 0;
    private $guiaRespuesta = 0;
    private $volumenAlmacenado = 0;
    private $creadoPor = 0;
    //private $estatus = 0;
    //private $fechaCreacion = 0;
     
    //recomendaciones
    private $recomendacionesId='';


    //Activaciond e token
    private $token = '';


    /************************************************************
     * Diseñado por Jesus Santana
     * Fecha: 06/08/2022
     * este metodo de la funcion R24H  mentrega todos los Tabs y los items para la carga de un reporte fintrado por tipo de inspeccion
     * OK
     *************************************************************/
    public function ListaHeaderMP ($registro_fecha,$complejo_id,$MPreg_gerencia,$MPreg_area,$inspeccionHO_custodio){  
        $_respuestas = new respuestas;

        $bandera=0;
        $condicion='';
       
        if($registro_fecha != ''){
            $condicionregistro_fecha =" and  fecha = $registro_fecha";
            $bandera=1;
        }else{
            $condicionregistro_fecha =" ";
        }
        if($complejo_id != ''){
            $condicioncomplejo_id =" and  complejoId = '$complejo_id'";
            $bandera=1;
        }else{
            $condicioncomplejo_id =" ";
        }
        if($MPreg_gerencia != ''){
            $condicionMPreg_gerencia =" and  gerenciaId = '$MPreg_gerencia'";
            $bandera=1;
        }else{
            $condicionMPreg_gerencia =" ";
        }
        if($MPreg_area != ''){
            $condicionMPreg_area =" and  areaId = '$MPreg_area'";
            $bandera=1;
        }else{
            $condicionMPreg_area =" ";
        }
        if($inspeccionHO_custodio != ''){
            $condicioninspeccionHO_custodio =" and  custorioID = '$inspeccionHO_custodio'";
            $bandera=1;
        }else{
            $condicioninspeccionHO_custodio =" ";
        }

        if($bandera!=0){
            $condicion=" Where  status=1  
                                
                                $condicionregistro_fecha 
                                $condicioncomplejo_id 
                                $condicionMPreg_gerencia 
                                $condicionMPreg_area
                                $condicioninspeccionHO_custodio
                        ";
        }

        $query = "  select * from dg_materiales_peligrosos_header
                     $condicion
                    order by 2";

                    //echo $query; die;
        $idItemsValidate ='';
        $datosTabsHO = parent::ObtenerDatos($query);
        $tabsCount =0;   // controla la posicion del array para el insert en la variable

       if($datosTabsHO){ //recorre cada tabs
            return($datosTabsHO);
        }else{
            return $_respuestas->error_401("El complejo solicitado no tiene datos de Precarga");
        }
    }    
    
    /************************************************************
     * Diseñado por Jesus Santana
     * Fecha: 06/08/2022
     * este metodo de la funcion R24H  mentrega todos los Tabs y los items para la carga de un reporte fintrado por tipo de inspeccion
     * OK
     *************************************************************/
    public function mpDetail ($MPCod,$MPname){  
        $_respuestas = new respuestas;

        $bandera=0;
        $condicion='';
       
        if($MPCod != ''){
            $condicionMPCod =" and  codRegistroMP = $MPCod";
            $bandera=1;
        }else{
            $condicionMPCod =" ";
        }
        if($MPname != ''){
            $condicionMPname =" and  nombMP like '%$MPname%'";
            $bandera=1;
        }else{
            $condicionMPname =" ";
        }
        
        if($bandera!=0){
            $condicion=" Where  estatus=1  
                                $condicionMPCod 
                                $condicionMPname 
                        ";
        }

        $query = "  select * from dg_materiales_peligrosos
                     $condicion";

                    //echo $query; die;
        $idItemsValidate ='';
        $datosTabsHO = parent::ObtenerDatos($query);
        $tabsCount =0;   // controla la posicion del array para el insert en la variable

       if($datosTabsHO){ //recorre cada tabs
            return($datosTabsHO);
        }else{
            return $_respuestas->error_401("El Codigo solicitado no tiene datos de Precarga");
        }
    } 

    /************************************************************
     * Diseñado por Jesus Santana
     * Fecha: 08/09/2022
     * este metodo de la funcion R24H  mentrega todos los tipos de inspeccioens que existen
     * 
     *************************************************************/
    public function tipoInspeccionesHO (){
        $query = "SELECT * FROM dg_inspecciones_ho_tipo ORDER BY 2";
        $datos = parent::ObtenerDatos($query);
        return ($datos);
    }

    /***************************************************
     * Autor: Jesus Santana
     * Metodo publico que entrega todas las incidencias teneradas por tipo
     * aplicando los filtros de la cabecera 
    ***************************************************/
    public function ListaMaterialesHeader($ListaMaterialesHeader){

        $condicion="where dg_materiales_peligrosos_hallazgos.mpHeaderId=$ListaMaterialesHeader ";
        
        $query = "select * from dg_materiales_peligrosos_hallazgos $condicion ";
       // echo $query; die;
         $datos = parent::ObtenerDatos($query);
        return ($datos);
    }


    /***************************************************
     * Autor: Jesus Santana
     * Metodo publico que entrega los KPI de MP
     * aplicando los filtros de la cabecera sss
    ***************************************************/
  
    public function indMPTotales($tot_fecha,$tot_complejo_id,$tot_gerenciaId,$tot_areaId,$tot_custorioID){
    
        $bandera=0;
        $condicion='';
       
        if($tot_fecha != ''){
            $condiciontot_fecha =" and  dg_materiales_peligrosos_header.fecha = '$tot_fecha'    ";
            $bandera=1;
        }else{
            $condiciontot_fecha =" ";
        }
        if($tot_complejo_id != ''){
            $condiciontot_complejo_id =" and  dg_materiales_peligrosos_header.complejoId = $tot_complejo_id ";
            $bandera=1;
        }else{
            $condiciontot_complejo_id =" ";
        }
        if($tot_gerenciaId != ''){
            $condiciontot_gerenciaId =" and  dg_materiales_peligrosos_header.gerenciaId = $tot_gerenciaId ";
            $bandera=1;
        }else{
            $condiciontot_gerenciaId =" ";
        }
        if($tot_areaId != ''){
            $condiciontot_areaId =" and  dg_materiales_peligrosos_header.areaId = $tot_areaId ";
            $bandera=1;
        }else{
            $condiciontot_areaId =" ";
        }
        if($tot_custorioID != ''){
            $condiciontot_custorioID =" and  dg_materiales_peligrosos_header.custorioID = $tot_custorioID ";
            $bandera=1;
        }else{
            $condiciontot_custorioID =" ";
        }

        
        if($bandera!=0){
            $condicion=" Where  dg_materiales_peligrosos_hallazgos.estatus=1  
                                $condiciontot_fecha 
                                $condiciontot_complejo_id 
                                $condiciontot_gerenciaId 
                                $condiciontot_areaId 
                                $condiciontot_custorioID 
                        ";
        }

        $query = "  (  SELECT
                        'EstadoFisico' as tipo,
                        dg_materiales_peligrosos_hallazgos.caracteristciasFisicas,
                        sum( dg_materiales_peligrosos_hallazgos.volumenAlmacenado )  as valor
                    FROM
                        dg_materiales_peligrosos_hallazgos
                        INNER JOIN dg_materiales_peligrosos_header ON dg_materiales_peligrosos_hallazgos.mpHeaderId = dg_materiales_peligrosos_header.mpHeaderId 
                                    $condicion
                    GROUP BY
                        dg_materiales_peligrosos_hallazgos.caracteristciasFisicas
                    ORDER BY
                        1,2
                    )
                    UNION
                    (
                        SELECT
                            'TipoRiesgo' as tipo,
                            dg_materiales_peligrosos_hallazgos.claseRiesgo,
                            sum( dg_materiales_peligrosos_hallazgos.volumenAlmacenado ) 
                        FROM
                            dg_materiales_peligrosos_hallazgos
                            INNER JOIN dg_materiales_peligrosos_header ON dg_materiales_peligrosos_hallazgos.mpHeaderId = dg_materiales_peligrosos_header.mpHeaderId 
                                $condicion
                        GROUP BY
                        dg_materiales_peligrosos_hallazgos.claseRiesgo 
                    ORDER BY
                        1,2
                        )";
    
        $datos = parent::ObtenerDatos($query);
        $respionse=array();
        if($datos){
            foreach($datos as $value){
             $respionse[$value['tipo']][$value['caracteristciasFisicas']]=$value['valor'];
            }

            $queryMP = "SELECT
                        dg_materiales_peligrosos_hallazgos.registro, 
                        dg_materiales_peligrosos_hallazgos.nombreMaterial, 
                        dg_materiales_peligrosos_hallazgos.IdentificacionCaso, 
                        dg_materiales_peligrosos_hallazgos.caracteristciasFisicas, 
                        dg_materiales_peligrosos_hallazgos.claseRiesgo, 
                        dg_materiales_peligrosos_hallazgos.division, 
                        dg_materiales_peligrosos_hallazgos.guiaRespuesta, 
                        dg_materiales_peligrosos_hallazgos.volumenAlmacenado
                    FROM
                        dg_materiales_peligrosos_hallazgos
                        INNER JOIN
                        dg_materiales_peligrosos_header
                        ON 
                            dg_materiales_peligrosos_hallazgos.mpHeaderId = dg_materiales_peligrosos_header.mpHeaderId
                            $condicion
                    ";
            $datosMP = parent::ObtenerDatos($queryMP);
            
            $respionse['MP']=$datosMP;


        }
        return ($respionse);
    }    
    /***************************************************
     * Autor: Jesus Santana
     * Metodo publico CREATE cualqueir tipo de incicencia metoco POST
     * recibe por POST las variables de los formularios de cualquier incidencia 
     * 
    ***************************************************/
    public function postHeader($json){

        $_respuestas = new respuestas;
        $datos = json_decode($json,true);
         //print_r($datos);die;
        if(!isset($datos['token'])){ 
            return $_respuestas->error_401();
        }else{    
            $this->token = $datos['token'];
            $arrayToken = $this->buscarToken();  
            //print_r($datos);die;                        
            if($arrayToken){
               //valida los campos obligatorios
                if  (
                    (!isset($datos['registro_fecha']))||
                    (!isset($datos['complejo_id']))||
                    (!isset($datos['MPreg_gerencia']))||
                    (!isset($datos['MPreg_area']))||
                    (!isset($datos['inspeccionHO_custodio']))||
                    (!isset($datos['MPreg_ubicacion']))
                ){
                //en caso de que la validacion no se cumpla se arroja un error
                    $datosArray =$_respuestas->error_400();
                    echo(json_encode($datosArray));
                }else{
                 
                //Asignacion de datos validados su existencia 
                    $this->fecha = $datos['registro_fecha'];
                    $this->complejoId = $datos['complejo_id'];
                    $this->gerenciaId = $datos['MPreg_gerencia'];
                    $this->areaId = $datos['MPreg_area'];
                    $this->custorioID = $datos['inspeccionHO_custodio']; 
                    $this->ubicacion = $datos['MPreg_ubicacion'];
                    $this->fechaCreacion =  date('Y-m-d');
                    $this->estatus = 1;
                    $this->creadorId =  $datos['creadoPor']; 

                   

                    $mpHeader = $this->InsertarInspeccionesHeader();
                      
                    //valida la insercion de la cabecera
                    if($mpHeader){
                        
                        $insertArray="";
                       
                        foreach ($datos['Material'] as $Items  ){

                            $resp='';
                            $this->registro        = @$Items['codMaterial'];
                            $this->nombreMaterial      = @$Items['nombre'];
                            $this->IdentificacionCaso      = @$Items['NroIdentificación']; 
                            $this->caracteristciasFisicas  = @$Items['CaracterísticasFisicas'];
                            $this->claseRiesgo  = @$Items['ClaseRiesgos'];
                            $this->division= @$Items['Division'];
                            $this->guiaRespuesta= @$Items['Nrorespuesta'];
                            $this->volumenAlmacenado= @$Items['VolumenAlmacenado'];

                             $inspeccionItems = $this->InsertarInspeccionesItems($mpHeader);
                                                        
                        }  
                        
                        if ($mpHeader || $inspeccionItems ){
                               
                            $respuesta =$_respuestas->response;
                            $respuesta["status"] ='OK';
                            $respuesta["result"] =array(
                                "error_id"   =>  '200',
                                "error_msg"  => 'Se creó un Regitro de Materiales Peligrosos'
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
     *  OK
    ***************************************************/
    private function InsertarInspeccionesHeader(){
        $query ="insert Into dg_materiales_peligrosos_header ( 
                fecha,
                complejoId,
                gerenciaId,
                areaId,
                custorioID,
                ubicacion,
                creadorId,
                estatus,
                fechaCreacion
                )            
                value
                (   '$this->fecha',
                    '$this->complejoId',
                    '$this->gerenciaId',
                    '$this->areaId',
                    '$this->custorioID',
                    '$this->ubicacion',
                    '$this->fechaCreacion',
                    '$this->estatus',
                    '$this->creadorId')";   
                    
           //print_r($query);die; 
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
     *  OK
    ***************************************************/
    private function InsertarInspeccionesItems($mpHeaderId){

        $query ="insert Into dg_materiales_peligrosos_hallazgos (  
            mpHeaderId,
            registro,
            nombreMaterial,
            IdentificacionCaso,
            caracteristciasFisicas,
            claseRiesgo,
            division,
            guiaRespuesta,
            volumenAlmacenado,
            creadoPor,
            estatus,
            fechaCreacion
            )
                value
                (   $mpHeaderId,
                    '$this->registro',
                    '$this->nombreMaterial',
                    '$this->IdentificacionCaso',
                    '$this->caracteristciasFisicas',
                    '$this->claseRiesgo',
                    '$this->division',
                    '$this->guiaRespuesta',
                    '$this->volumenAlmacenado',
                    '$this->creadorId',
                    '$this->estatus',
                    '$this->fechaCreacion')";     

                $Insertar = parent::nonQueryId($query);

        if($Insertar){
            return($Insertar);
        }else{
            return 0;
        }
    }

    public function put($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json,true);

        if(!isset($datos['token'])){
            return $_respuestas->error_401();
        }else{
            $this->token = $datos['token'];
            $arrayToken = $this->buscarToken();

            if($arrayToken){
             //solo validamos que tenga la clave primaria para poder eliminar correctamente el resgitro
                if  (
                    (!isset($datos['id']))
                ){
                //en caso de que la validacion no se cumpla se arroja un error
                    $datosArray =$_respuestas->error_400();
                    echo(json_encode($datosArray));
                }else{
                    //Asignacion de datos validados su existencia en el If anterior
                    $this->id = $datos['id'];
                    //Asignacion del resto de los campos sin validacion
                    if (isset($datos['empleados_nroPersonal'])){$this->empleados_nroPersonal = $datos['empleados_nroPersonal'];}
                    if (isset($datos['empleados_cedula'])){$this->empleados_cedula = $datos['empleados_cedula'];}
                    if (isset($datos['cargoSap'])){$this->cargoSap = $datos['cargoSap'];}
                    if (isset($datos['password'])){$this->password = $datos['password'];}
                    if (isset($datos['nombre'])){$this->nombre = $datos['nombre'];}
                    if (isset($datos['userSap'])){$this->userSap = $datos['userSap'];}
                    if (isset($datos['cargoActual'])){$this->cargoActual = $datos['cargoActual'];}
                    if (isset($datos['creador'])){$this->creador = $datos['creador'];}
                    if (isset($datos['fechaCreacion'])){$this->fechaCreacion = $datos['fechaCreacion'];}
                    if (isset($datos['activo'])){$this->activo = $datos['activo'];}

                    //llama a la funcion de insertar
                    $resp = $this->UpdateInspecciones();

                    //valida que paso d/rante el inser
                    if($resp){
                        $respuesta =$_respuestas->response;
                        $respuesta["result"] =array(
                            "Id"=> $this->id
                        );
                        return $respuesta;
                    }else{
                    return $_respuestas->error_500(); 
                    }

                }




            }else{
                return $_respuestas->error_401("El Token que envio es invalido o ha caducado");
            }
        }
    }

    private function UpdateInspecciones(){
        $query ="update ". $this->tabla. " set empleados_cedula = $this->empleados_cedula , 
        empleados_nroPersonal =$this->empleados_nroPersonal, 
        password ='$this->password', 
        nombre ='$this->nombre', 
        userSap = '$this->userSap', 
        cargoSap = '$this->cargoSap', 
        cargoActual = '$this->cargoActual', 
        creador = '$this->creador', 
        fechaCreacion = '$this->fechaCreacion', 
        activo = '$this->activo'
        WHERE id = $this->id";
        
         //print_r ($query);die;

        $update = parent::nonQuery($query);

       
        if($update>=1){
            return($update);
        }else{
            return 0;
        }
    }

    public function delete($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json,true);

        if(!isset($datos['token'])){
            return $_respuestas->error_401();
        }else{
            $this->token = $datos['token'];
            $arrayToken = $this->buscarToken();

            if($arrayToken){
                        //solo validamos que tenga la clave primaria para poder eliminar correctamente el resgitro
                if  (
                    (!isset($datos['id']))
                ){
                //en caso de que la validacion no se cumpla se arroja un error
                    $datosArray =$_respuestas->error_400();
                    echo(json_encode($datosArray));
                }else{
                    //Asignacion de datos validados su existencia en el If anterior
                    $this->id = $datos['id'];

                    //llama a la funcion de insertar
                    $resp = $this->EliminarInspecciones();

                    //valida que paso d/rante el inser
                    if($resp){
                        $respuesta =$_respuestas->response;
                        $respuesta["result"] =array(
                            "Msg"=> "eliminado el registro $this->id"
                        );
                        return $respuesta;
                    }else{
                    return $_respuestas->error_500(); 
                    }

                }
            }else{
                return $_respuestas->error_401("El Token que envio es invalido o ha caducado");
            }
        }
    }

    private function EliminarInspecciones(){
        $query ="delete from $this->tabla 
        WHERE id = $this->id";
        
        $update = parent::nonQuery($query);

        if($update>=1){
            return($update);
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