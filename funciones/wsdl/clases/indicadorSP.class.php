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
class indicadorSP extends conexion {

    private $tabla = "dg_indicadores_sp";

    private $idIndicadores = 0;
    private $complejo_id = 0;
    private $Siglas_Complejo = 0;
    private $Fecha_Carga ='1900-01-01';
    private $HHT = 0;
    private $FHP = 0;
    private $FHC = 0;
    private $ESP = 0;
    private $ESPN1 = 0;
    private $ESPN2 = 0;
    private $ESPN3 = 0;
    private $IESP = 0;
    private $IEPN1 = 0;
    private $ISPN2 = 0;
    private $ISPN3 = 0;
    private $fechaCreacion='1900-01-01';
    private $creadoPor='';


    //Activacion de token
    private $token = '';//b43bbfc8bcf8625eed413d91186e8534

    public function listaIndicadorSP($idComplejo, $fecha){
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
                //valida los campos obligatorios
                if  (
                    (!isset($datos['body']['registro_fecha']))||
                    (!isset($datos['header']['id_rol']))
                ){
                //en caso de que la validacion no se cumpla se arroja un error
                    $datosArray =$_respuestas->error_400();
                    echo(json_encode($datosArray));
                }else{
                //Asignacion de datos validados su existencia en el If anterior
                
                //$this->idIndicadores = 0; //autonumerico cuando es nuevo pero sirve para el update cuando lo regustra un admin
                $this->complejo_id = @$datos['header']['id_complejo'];
                $this->Siglas_Complejo = @$datos['header']['siglas_complejo'];
                $this->Fecha_Carga =@$datos['body']['registro_fecha'];
                $this->HHT = @$datos['body']['HHT'];
                $this->FHP = @$datos['body']['FHP'];
                $this->FHC = @$datos['body']['FHC'];
                $this->ESP = @$datos['body']['ESP'];
                $this->ESPN1 = @$datos['body']['ESPN1'];
                $this->ESPN2 = @$datos['body']['ESPN2'];
                $this->ESPN3 = @$datos['body']['ESPN3'];
                $this->IESP = @$datos['body']['IESP'];
                $this->IEPN1 = @$datos['body']['IESP1'];
                $this->ISPN2 = @$datos['body']['IESP2'];
                $this->ISPN3 = @$datos['body']['IESP3'];
                $this->fechaCreacion=@$datos['header']['registro_fecha'];
                $this->creadoPor=@$datos['header']['usuario'];
                // $datos['header']['id_rol']
                // $datos['body']['Constante']

                $existeData = $this->existeRegistro();
                      
                if($existeData==0){
                    
                    $resp = $this->insertarindicadorSP();  //acomodar
                  //  return $existeData; die;
                }else{
                    if($datos['header']['id_rol']==1){  //SOLOPUEDE ACTUALIZAR LOS REGIRTSROS EL ADMINSITRADOR
                        $resp = $this->updateIndicadorSP(); 
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
        $query ="select * from dg_indicadores_sp where  (complejo_id=$complejoId) && ((month(Fecha_Carga) = month(STR_TO_DATE('$fecha', '%Y-%m-%d')) and year(Fecha_Carga) = year(STR_TO_DATE('$fecha', '%Y-%m-%d')) ))";
      // echo $query; die;
        $validador = parent::nonQuery($query);
       // echo $validador; die;
        return($validador);
    }

    private function updateIndicadorSP(){
        //ubicar el id del registro existente
        $fecha=$this->Fecha_Carga;
        $complejoId=$this->complejo_id;
        $query ="select * from dg_indicadores_sp where  (complejo_id=$complejoId) && ((month(Fecha_Carga) = month(STR_TO_DATE('$fecha', '%Y-%m-%d')) and year(Fecha_Carga) = year(STR_TO_DATE('$fecha', '%Y-%m-%d')) ))";
        $validador = parent::ObtenerDatos($query);
        $id=$validador[0]['idIndicadores'];
        //print_r($id); die;
        //hacer el update
        $query ="update ". $this->tabla. "
        set 
            complejo_id='".$this->complejo_id."',
            Siglas_Complejo='".$this->Siglas_Complejo."',
            Fecha_Carga='".$this->Fecha_Carga."',
            HHT='".$this->HHT."',
            FHP='".$this->FHP."',
            FHC='".$this->FHC."',
            ESP='".$this->ESP."', 
            ESPN1='".$this->ESPN1."', 
            ESPN2='".$this->ESPN2."', 
            ESPN3='".$this->ESPN3."',
            IESP ='".$this->IESP."',
            IEPN1='".$this->IEPN1."',
            ISPN2='".$this->ISPN2."',
            ISPN3='".$this->ISPN3."', 
            fechaCreacion='".$this->Fecha_Carga."',
            creadoPor='".$this->creadoPor."'

        where idIndicadores=$id";

        $update = parent::nonQuery($query);
        //echo $update; die;
        //retornar true en caso de actualziacion efectiva
        return($validador);
    }

    private function insertarindicadorSP(){
        $query ="insert Into ". $this->tabla. "
        (complejo_id, Siglas_Complejo, Fecha_Carga, HHT, FHP, FHC, ESP, ESPN1, ESPN2, ESPN3, IESP, IEPN1, ISPN2, ISPN3, fechaCreacion, creadoPor)
        value
        ('".$this->complejo_id."',
        '".$this->Siglas_Complejo."',
        '".$this->Fecha_Carga."',
        '".$this->HHT."',
        '".$this->FHP."',
        '".$this->FHC."',
        '".$this->ESP."',
        '".$this->ESPN1."',
        '".$this->ESPN2."',
        '".$this->ESPN3."',
        '".$this->IESP."',
        '".$this->IEPN1."',
        '".$this->ISPN2."',
        '".$this->ISPN3."',
        '".$this->fechaCreacion."',
        '".$this->creadoPor."')";

       // echo $query; die;
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