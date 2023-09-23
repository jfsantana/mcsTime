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
class consulta extends conexion {

    //Activaciond e token
    private $token = '';//b43bbfc8bcf8625eed413d91186e8534


    public function consultaSimple($tabla,$where){
         

        if(strlen($where)<3){
            $where="";
        }else{
            $where=" where ".substr($where, 1, -1);  
        }

        $query = "select * from $tabla $where";


        $datos = parent::ObtenerDatos($query);
        return ($datos);
    }


    public function UpdateSimple($tabla,$campo,$valor,$where){
         


        if(strlen($where)<3){
            return (0);
        }else{
            $where=" WHERE ".$where;  
        }

        $query = "UPDATE  $tabla  SET $campo = '$valor'  $where";

        $update =  parent::nonQuery($query);

        if ($update >= 1) {
            return $update;
        } else {
            return 0;
        }
    }
}

?>