<?php
if ( !isset( $_SESSION ) ) {
    session_start();
}


session_destroy();
unset($_SESSION['usuario']);
unset($_SESSION['id_user']);
unset($_SESSION['id_rol']);
unset($_SESSION['perfil']);
unset($_SESSION['token']);
unset($_SESSION['nombre']);
unset($_SESSION['cargo']);
unset($_SESSION['activo']);
unset($_SESSION['HOY']);
unset($_SESSION['corte']);
$_SESSION['usuario'] = NULL;
$_SESSION["id_user"] = NULL;
$_SESSION["id_rol"]= NULL;
$_SESSION["ced_usu"] = NULL;
$_SESSION["id_complejo"] = NULL;
$_SESSION["siglas_complejo"]= NULL;
$_SESSION["sal_usu"]= NULL;
$host= $_SERVER["HTTP_HOST"];
$url= $_SERVER["REQUEST_URI"];

//var_dump($_SESSION); die;
header('Location: http://'.$_SERVER['HTTP_HOST']);
exit;
?>




