
<?php 


if (($usr =="superuser")&&($_POST["password"]=="superuser")){   
	//echo "entre";exit;
		$_SESSION["usuario"] = "Belkis Merchán";
		$_SESSION["id_user"] = 40;
		$_SESSION["id_rol"] = 1;
		$_SESSION["perfil"] =  "Administrador SuperUsuario";
		$_SESSION["ced_usu"] ="12110115";
		$_SESSION["id_complejo"] =4;
		$_SESSION["siglas_complejo"] ="CPJAA";
		$_SESSION["nombre_complejo"] ="Complejo José Antonio Anzoátegui";
		$_SESSION["sal_usu"] =1;		

		$activo ="A";
		$id_user =$_SESSION["id_user"];
		$nombre =  "Belkis Merchán";
		$id_rol =$_SESSION["id_rol"] ;
		$ced_usu="12110115";
		$com_usu=$_SESSION["id_complejo"];
		$siglas_complejo=$_SESSION["siglas_complejo"];
		$sal_usu=$_SESSION["sal_usu"];

		header("Location:../../dashboard.php");
		exit;	
}



if (($usr =="pcp")&&($_POST["password"]=="pcp")){   
	//echo "entre";exit;
		$_SESSION["usuario"] = "Analista PCP";
		$_SESSION["id_user"] = 12;
		$_SESSION["id_rol"] = 3;
		$_SESSION["perfil"] =  "Validador PCP";
		$_SESSION["ced_usu"] ="12110115";
		$_SESSION["id_complejo"] =4;
		$_SESSION["siglas_complejo"] ="CPJAA";
		$_SESSION["nombre_complejo"] ="Complejo José Antonio Anzoátegui";

		$activo ="A";
		$id_user =$_SESSION["id_user"];
		$nombre =  "Ana Aguiar";
		$id_rol =$_SESSION["id_rol"] ;
		$ced_usu="12110115";
		$com_usu=$_SESSION["id_complejo"];
		$siglas_complejo=$_SESSION["siglas_complejo"];

		echo "paso por aqui";
		//header("Location:../../dashboard.php");
		//exit;	
}


if (($usr =="salud")&&($_POST["password"]=="salud")){   
	//echo "entre";exit;
		$_SESSION["usuario"] = "Medico Validador";
		$_SESSION["id_user"] = 12;
		$_SESSION["id_rol"] = 4;
		$_SESSION["perfil"] =  "Validador Salud";
		$_SESSION["ced_usu"] ="12110115";
		$_SESSION["id_complejo"] =4;
		$_SESSION["siglas_complejo"] ="CPJAA";
		$_SESSION["nombre_complejo"] ="Complejo José Antonio Anzoátegui";

		$activo ="A";
		$id_user =$_SESSION["id_user"];
		$nombre = "Pablo Gil";
		$id_rol =$_SESSION["id_rol"] ;
		$ced_usu="12110115";
		$com_usu=$_SESSION["id_complejo"];
		$siglas_complejo=$_SESSION["siglas_complejo"];

		header("Location:../dashboard.php");
		exit;	
}


if (($usr =="analista")&&($_POST["password"]=="analista")){   
	//echo "entre";exit;
		$_SESSION["usuario"] = "Juan Arteaga";
		$_SESSION["id_user"] = 12;
		$_SESSION["id_rol"] =5;
		$_SESSION["perfil"] =  "Analista";
		$_SESSION["ced_usu"] ="";
		$_SESSION["id_complejo"] =4;
		$_SESSION["siglas_complejo"] ="CPJAA";
		$_SESSION["nombre_complejo"] ="Complejo José Antonio Anzoátegui";

		$activo ="A";
		$id_user =$_SESSION["id_user"];
		$nombre = "Juan Arteaga";
		$id_rol =$_SESSION["id_rol"] ;
		$ced_usu="";
		$com_usu=$_SESSION["id_complejo"];
		$siglas_complejo=$_SESSION["siglas_complejo"];

		header("Location:../dashboard.php");
		exit;	
}

if (($usr =="aspirante")&&($_POST["password"]=="aspirante")){   
	//echo "entre";exit;
		$_SESSION["usuario"] = "Usuario Aspirante ";
		$_SESSION["id_user"] = 44;
		$_SESSION["id_rol"] = 2;
		$_SESSION["perfil"] =   "Usuario Aspirante ";
		$_SESSION["ced_usu"] ="12110115";
		$_SESSION["id_complejo"] =3;
		$_SESSION["siglas_complejo"] ="CORPORATIVO";
		$_SESSION["nombre_complejo"] ="Sede Corporativa";
		$_SESSION["sal_usu"] =3;		

		$activo ="A";
		$id_user =$_SESSION["id_user"];
		$nombre =   "UsuarioAspirante ";
		$id_rol =$_SESSION["id_rol"] ;
		$ced_usu="12110115";
		$com_usu=$_SESSION["id_complejo"];
		$siglas_complejo=$_SESSION["siglas_complejo"];
		$sal_usu=$_SESSION["sal_usu"];

		header("Location:../dashboard.php");
		exit;
}


?>