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
class sector extends conexion {

    //Tabla Principal de Empleados
    private $tabla = "dm_sector";

    //Activaciond e token
   // private $token = '';//b43bbfc8bcf8625eed413d91186e8534


    public function listaSector(){

        $query = "select * from $this->tabla";
        $datos = parent::ObtenerDatos($query);
        return ($datos);
    }


    public function listaSubSector($sector){

        $query = "SELECT
        rel_inspeccion_sector_subsector.sectorId,
        dm_subsector.subsectorId,
        dm_subsector.nombre,
        dm_subsector.descripcion
        FROM
        dm_subsector
        INNER JOIN rel_inspeccion_sector_subsector ON dm_subsector.subsectorId = rel_inspeccion_sector_subsector.subSectorId
        where rel_inspeccion_sector_subsector.sectorId=$sector order by 2";
        $datos = parent::ObtenerDatos($query);
        return ($datos);
    }

    public function post($json){
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
                    (!isset($datos['empleados_cedula']))||
                    (!isset($datos['empleados_nroPersonal']))||
                    (!isset($datos['cargoSap']))
                ){
                //en caso de que la validacion no se cumpla se arroja un error
                    $datosArray =$_respuestas->error_400();
                    echo(json_encode($datosArray));
                }else{
                //Asignacion de datos validados su existencia en el If anterior
                    $this->empleados_cedula = $datos['empleados_cedula'];
                    $this->empleados_nroPersonal = $datos['empleados_nroPersonal'];
                    $this->cargoSap = $datos['cargoSap'];
                //Asignacion del resto de los campos sin validacion
                    if (isset($datos['password'])){$this->password = $datos['password'];}
                    if (isset($datos['nombre'])){$this->nombre = $datos['nombre'];}
                    if (isset($datos['userSap'])){$this->userSap = $datos['userSap'];}
                    if (isset($datos['cargoActual'])){$this->cargoActual = $datos['cargoActual'];}
                    if (isset($datos['creador'])){$this->creador = $datos['creador'];}
                    if (isset($datos['fechaCreacion'])){$this->fechaCreacion = $datos['fechaCreacion'];}
                    if (isset($datos['activo'])){$this->activo = $datos['activo'];}

                //llama a la funcion de insertar
                    $resp = $this->InsertarEmpleados();

                //valida que paso d/rante el inser
                    if($resp){
                        $respuesta =$_respuestas->response;
                        $respuesta["result"] =array(
                            "Id"=> $resp
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

    private function InsertarEmpleados(){
        $query ="insert Into ". $this->tabla. "(empleados_cedula, empleados_nroPersonal, password, nombre, userSap, cargoSap, cargoActual, creador, fechaCreacion, activo)
        value
        ('$this->empleados_cedula',' $this->empleados_nroPersonal','$this->password','$this->nombre','$this->userSap ','$this->cargoSap','$this->cargoActual', '$this->creador','$this->fechaCreacion','$this->activo')";
        //echo $query; die;
        $Insertar = parent::nonQueryId($query);

       // print_r ($Insertar);die;
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
                    $resp = $this->UpdateEmpleados();

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

    private function UpdateEmpleados(){
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
                    $resp = $this->EliminarEmpleados();

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

    private function EliminarEmpleados(){
        $query ="delete from $this->tabla 
        WHERE id = $this->id";
        
        $update = parent::nonQuery($query);

        if($update>=1){
            return($update);
        }else{
            return 0;
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