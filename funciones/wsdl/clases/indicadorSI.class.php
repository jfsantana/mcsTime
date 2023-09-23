<?php
/************************************************************
 * Diseñado por Jesus Santana
 * CLASE EMPLEADOS 
 * Metodo servidor: $_GET, $_POST, $_PUT, $_DELETE
 * 
 * 'clases/empleados.class.php';
 **************************************************************/

require_once 'conexion/conexion.php';
require_once 'respuestas.class.php';

//hereda de la clase conexion
class indicadorSI extends conexion {

    private $tabla = "dg_indicadores_si";

    private $id='';
    private $complejo_id='';
    private $Siglas_Complejo='';
    private $Fecha_Carga ='1900-01-01';
    private $IFB='';
    private $HHE_FB = 0;
    private $TAO='';
    private $ISEV='';
    private $HHE_SEV = 0;
    private $TDP='';
    private $TDC='';
    private $IFN='';
    private $HHE_FN = 0;
    private $TACTP='';
    private $fechaCreacion='1900-01-01';
    private $creadoPor='';


    //Activaciond e token
    private $token = '';//b43bbfc8bcf8625eed413d91186e8534

    public function listaIndicadorSI($idComplejo, $fecha){
      //  echo 'ssss'; die;
        $condicion='';
        $flag=false;
        if ($idComplejo!='todos'){
            $condicion=" Where complejo_id = $idComplejo and   (month(Fecha_Carga) = month(STR_TO_DATE('$fecha', '%Y-%m-%d')) and year(Fecha_Carga) = year(STR_TO_DATE('$fecha', '%Y-%m-%d')) )";
            $flag=true;
        }else{
            $condicion=" Where  (month(Fecha_Carga) = month(STR_TO_DATE('$fecha', '%Y-%m-%d')) and year(Fecha_Carga) = year(STR_TO_DATE('$fecha', '%Y-%m-%d')) )";
        }
        $query = "select * from $this->tabla $condicion order by complejo_id";
        $datos = parent::ObtenerDatos($query);
        

        //



        return ($datos);
    }


    public function post($json){
        
        $_respuestas = new respuestas;
        $datos = json_decode($json,true);
        $token=$datos['header']['token'];

        if(!isset($token)){
            return $_respuestas->error_401();
        }else{
            $this->token = $token;
            $arrayToken = $this->buscarToken();
          
            if($arrayToken){
                if  (
                    (!isset($datos['body']['registro_fecha']))||
                    (!isset($datos['header']['id_rol']))
                ){
                    $datosArray =$_respuestas->error_400();
                    echo(json_encode($datosArray));
                }else{



                //$this->id='';
                $this->complejo_id = @$datos['header']['id_complejo'];
                $this->Siglas_Complejo = @$datos['header']['siglas_complejo'];
                $this->Fecha_Carga =@$datos['body']['registro_fecha'];
                $this->IFB=@$datos['body']['IFB'];
                $this->HHE_FB = @$datos['body']['HHE_IFB'];
                $this->TAO=@$datos['body']['TAO'];
                $this->ISEV=@$datos['body']['ISEV'];
                $this->HHE_SEV = @$datos['body']['HHE_SEV'];
                $this->TDP=@$datos['body']['TDP'];
                $this->TDC=@$datos['body']['TDC'];
                $this->IFN=@$datos['body']['IFN'];
                $this->HHE_FN = @$datos['body']['HHE_IFN'];
                $this->TACTP=@$datos['body']['TACPE'];
                $this->fechaCreacion=@$datos['body']['registro_fecha'];
                $this->creadoPor=@$datos['header']['usuario'];

                $existeData = $this->existeRegistro();
              

                if($existeData==0){
                    
                    $resp = $this->insertarindicadorSI();  //acomodar
                }else{
                    
                    if($datos['header']['id_rol']==1){  //SOLOPUEDE ACTUALIZAR LOS REGIRTSROS EL ADMINSITRADOR
                        $resp = $this->updateIndicadorSI(); 
                    }else{
                        return $_respuestas->error_401("Ya existe un valor para este mes. Comuniquese con el Gerente para realzar la actualizacion deseada");
                    }
                }

                //valida que paso d/rante el inser
                    if($resp){
                        $respuesta =$_respuestas->response;

                        $respuesta['result'] = [
                            'error_id' => '200',
                            'error_msg' => 'Valor registrado correctamente con exito',
                        ];
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

    private function existeRegistro(){
        $fecha=$this->Fecha_Carga;
        $complejoId=$this->complejo_id;
        $query ="select * from ". $this->tabla. " where  (complejo_id=$complejoId) && ((month(Fecha_Carga) = month(STR_TO_DATE('$fecha', '%Y-%m-%d')) and year(Fecha_Carga) = year(STR_TO_DATE('$fecha', '%Y-%m-%d')) ))";
      // echo $query; die;
        $validador = parent::nonQuery($query);
       // echo $validador; die;
        return($validador);
    }

    private function updateIndicadorSI(){
        //ubicar el id del registro existente
        $fecha=$this->Fecha_Carga;
        $complejoId=$this->complejo_id;
        $query ="select * from ". $this->tabla. " where  (complejo_id=$complejoId) && ((month(Fecha_Carga) = month(STR_TO_DATE('$fecha', '%Y-%m-%d')) and year(Fecha_Carga) = year(STR_TO_DATE('$fecha', '%Y-%m-%d')) ))";
        $validador = parent::ObtenerDatos($query);
        $id=$validador[0]['id'];
   
        //hacer el update
        
        $query ="update ". $this->tabla. "
        set 
            complejo_id='".$this->complejo_id."',
            Siglas_Complejo='".$this->Siglas_Complejo."',
            Fecha_Carga='".$this->Fecha_Carga."',

            IFB='".$this->IFB."',
            HHE_FB='".$this->HHE_FB."',
            TAO='".$this->TAO."',
            ISEV='".$this->ISEV."', 
            HHE_SEV='".$this->HHE_SEV."', 
            TDP='".$this->TDP."', 
            TDC='".$this->TDC."',
            IFN ='".$this->IFN."',
            HHE_FN='".$this->HHE_FN."',
            TACTP='".$this->TACTP."'

            
        where id=$id";

        $update = parent::nonQuery($query);
        //echo $update; die;
        //retornar true en caso de actualziacion efectiva
        return($validador);
    }

    private function insertarindicadorSI(){
        $query ="insert Into ". $this->tabla. "
        (Complejo_id,Siglas_Complejo,Fecha_Carga,IFB,HHE_FB,TAO,ISEV,HHE_SEV,TDP,TDC,IFN,HHE_FN,TACTP)
        value
        (
            '".$this->complejo_id."',
            '".$this->Siglas_Complejo."',
            '".$this->Fecha_Carga."',
            '".$this->IFB."',
            '".$this->HHE_FB."',
            '".$this->TAO."',
            '".$this->ISEV."',
            '".$this->HHE_SEV."',
            '".$this->TDP."',
            '".$this->TDC."',
            '".$this->IFN."',
            '".$this->HHE_FN."',
            '".$this->TACTP."'
            
        )";


        $Insertar = parent::nonQueryId($query);

       // print_r ($Insertar);die;
        if($Insertar){
            return($Insertar);
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
                   // $this->id = $datos['id'];

                    //llama a la funcion de insertar
                   // $resp = $this->EliminarEmpleados();

                    //valida que paso d/rante el inser
                    if('$resp'){
                        $respuesta =$_respuestas->response;
                        $respuesta["result"] =array(
                            //"Msg"=> "eliminado el registro $this->id"
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