<?php
require_once 'conexion/conexion.php';
require_once 'respuestas.class.php';

class auth extends conexion{

    public function login($json){

        $_respuestas = new respuestas;
        $datos = json_decode($json,true);
        if(!isset($datos['usuario']) || !isset($datos['password'])){
            // error con los campos
            return $_respuestas->error_400();
        } else{

            $usuario = $datos['usuario']; //empleados_nroPersonal
            $password = $datos['password'];
            $datos = $this->obtenerDatosUsuarios($usuario,$password);

            if($datos){
                //Despues de obtener los datos del usuarios se genera el TOKEN
                $verificar = $this->insertarToken($datos[0]["log_usu"]);

                if($verificar){
                    // Si se genero el Token
                    $result = $_respuestas->response;
                    $result["result"]=array(
                        "token"=> $verificar
                    );
                    return $result;
                }else{
                    //error al guardar
                    return $_respuestas->error_500();
                }
            }else{
                return $_respuestas->error_200("Usuario no existe");
            }

        }
    }

    private function obtenerDatosUsuarios($usuario,$password){
        $query="select * from dg_empleados where log_usu='".$usuario."' and pass_usu = '".$password."' and act_usu = 1";
        //echo $query; die;
        $datos1 = parent::ObtenerDatos($query);

        if(isset($datos1[0]["log_usu"])){
            return($datos1);
        }else{
            return 0;
        }
    }

    private function insertarToken($usuario){
        $val=true;
        $token = bin2hex(openssl_random_pseudo_bytes(16,$val));
        $datetoken = date("Y-m-d H:i");
        $estadoToken=1;

        $query = "insert into dg_empleado_token (log_usu, token, estado, fecha) value('$usuario','$token','$estadoToken','$datetoken')";
        $verificar = parent::nonQuery($query);
        if($verificar){
            // si incerto
            return $token;
        }else{
            //error generando token
            echo'no'; die;
            return false; //$_respuestas->error_200("Error generando el token");
        }
    }

    private function updateToken(){
      $query="DELETE FROM dg_empleado_token
                WHERE TIMESTAMPDIFF(DAY, fecha, NOW()) > 1;
                ";
      echo $query; die;
      $datos1 = parent::ObtenerDatos($query);

      if(isset($datos1[0]["log_usu"])){
          return 1;
           }else{
          return 0;
      }
  }

}




?>
