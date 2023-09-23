<?php

if ( !isset( $_SESSION ) ) {
    session_start();   
} 

$_SESSION= array();
session_destroy();

unset($_SESSION['usuario']);
unset($_SESSION["id_user"]);
unset($_SESSION['id_rol']);
unset($_SESSION['ced_usu']);
unset($_SESSION['id_complejo']);
unset($_SESSION['siglas_complejo']);
unset($_SESSION['sal_usu']);


	//echo "entre";exit;
    unset($_SESSION["usuario"]);
    unset($_SESSION["id_user"]);
    unset($_SESSION["id_rol"]);
    unset($_SESSION["perfil"] );
    unset($_SESSION["npe_usu"]);
    unset($_SESSION["id_complejo"]); 
    unset($_SESSION["siglas_complejo"] );  
    unset($_SESSION["nombre_complejo"]);
    unset($_SESSION["token"]);
    unset($_SESSION["nombre"]);

$_SESSION['usuario'] = NULL;
$_SESSION["id_user"] = NULL;
$_SESSION["id_rol"]= NULL;
$_SESSION["ced_usu"] = NULL;
$_SESSION["id_complejo"] = NULL;
$_SESSION["siglas_complejo"]= NULL;
$_SESSION["sal_usu"]= NULL;


$host= $_SERVER["HTTP_HOST"];
$url= $_SERVER["REQUEST_URI"];


//echo $host;
// EN EL SERVIDOR: 
header('Location: http://'.$_SERVER['HTTP_HOST']);

/*EN EL LOCAL:
echo "<script> eval('document.location=\"../index.php\"');</script>";
*/
exit;


?>






