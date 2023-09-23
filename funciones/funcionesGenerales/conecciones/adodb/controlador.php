<?php 
//llamo al archivo de coneccion mysql para obtener los parametros de conexion sql 
function controlador($id){
	include("adodb.inc.php");
	$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
//	$conn = &ADONewConnection('mssqlnative');
	$conn = &ADONewConnection('mssql');
    
    if ($id==1){$base_d="PQVMORAP19";}
    if ($id==2){$base_d="PQVTBZAP03";}
    if ($id==3){$base_d="PQVJOSAP04";}
	
	//$conn->debug = true;
   
	$conn->Connect($base_d,"LENEL","MULTIMEDIA","ACCESSCONTROL");
	//$conn->Connect("localhost","usuario","usuario","base_datos");

	if(!$conn){echo "error al conectar con el servidor";exit;}
	ini_set('mssql.charset', 'UTF-8');
	$conn->EXECUTE("set names 'utf8'");

	return $conn;
}     

?>
