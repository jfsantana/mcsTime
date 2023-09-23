<?php
/************************************************************
 * Diseñado por Jesus Santana
 * CLASE CONEXION
 * Metodo servidor: $_GET, $_POST, $_PUT, $_DELETE
 *
 * 'conexion/conexion.php';
 *************************************************************/
class conexion
{
    // Atributos para la conexion
    private $server;
    private $user;
    private $password;
    private $database;
    private $port;
    private $conexion;

    /************************************************************
     * Diseñado por Jesus Santana
     * Establece la conexion a la BD
     *************************************************************/
    public function __construct()
    {
        $listadatos = $this->datosConexion();
        foreach ($listadatos as $key => $value) {
            $this->server = $value['server'];
            $this->user = $value['user'];
            $this->password = $value['password'];
            $this->database = $value['database'];
            $this->port = $value['port'];
        }
        $this->conexion = new mysqli($this->server, $this->user, $this->password, $this->database, $this->port);
        if ($this->conexion->connect_errno) {
            echo 'no se conecto';
            exit;
        }
    }

    /************************************************************
     * Diseñado por Jesus Santana
     * Busca los datos en el archivo config para la conn a la bd
     *************************************************************/
    private function datosConexion()
    {
        $direccion = dirname(__FILE__);  // path real del archivo actual
        // extraer los datos del archivo config (Datos json de la conexion)
        $jsondata = file_get_contents($direccion.'/config');

        return json_decode($jsondata, true);
    }

    /************************************************************
     * Diseñado por Jesus Santana
     * Elimina el error de los acentos y debe ser llamado al momento de extraer los datos
     *************************************************************/
    private function convertirUTF8($array)
    {
        array_walk_recursive($array, function (&$item, $key) {
            if (!mb_detect_encoding($item, 'utf-8', true)) {
                $item = utf8_encode($item);
            }
        });

        return $array;
    }

    /************************************************************
     * Diseñado por Jesus Santana
     * Recibe una consulta y regresa los valores ya copn la correcion de los acentos
     * Regresa: Json de todos los datos de la consulta
     *************************************************************/
    public function ObtenerDatos($consulta)
    {
        $result = $this->conexion->query($consulta);
        // Array de resultados
        $resultArray = [];
        if ($result) {
            foreach ($result as $key) {
                $resultArray[] = $key;
            }
        }

        return $this->convertirUTF8($resultArray);
    }

     /************************************************************
     * Diseñado por Jesus Santana
     * Recibe una consulta con el update
     * Regresa: Json de todos los datos de la consulta
     *************************************************************/
    public function nonQuery($consulta)
    {
        $result = $this->conexion->query($consulta); 
        return $this->conexion->affected_rows;
    }

     /************************************************************
     * Diseñado por Jesus Santana
     * Recibe una consulta con el insertar
     * Regresa: regresa el ID del registro insertado
     *************************************************************/
    public function nonQueryId($consulta)
    {
        $result = $this->conexion->query($consulta);
        $filas = $this->conexion->affected_rows;
        if ($filas >= 1) {
            return $this->conexion->insert_id;
        } else {
            return 0;
        }
    }

    protected function encriptar($string)
    {
        return md5($string);
    }
}
