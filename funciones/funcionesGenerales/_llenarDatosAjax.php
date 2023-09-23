<?php
if ( !isset( $_SESSION ) ) {
  session_start();
}
$conexion=dbcon();

include_once( 'conecciones/MariaDB/connsisgm.php' );
$bandera = $_REQUEST[ 'accion1' ];
echo $bandera;
if ( $bandera == 'contar_hallazgo' ) {
  $id_hallazgo = $_REQUEST[ 'id_hallazgo' ];


  $nro_hallazgo = count( $id_hallazgo );  
  echo $nro_hallazgo;
}



?>