<?php
$serverName = "FPUERTA\fperta"; //serverName\instanceName
$connectionInfo = array( "Database"=>"web_empresa", "UID"=>"sqladmin", "PWD"=>"Adm1nPassw0rd");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>