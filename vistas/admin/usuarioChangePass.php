<?php
if (!isset($_SESSION)) {
  session_start();
}
if (!isset($_SESSION['id_user'])) {
  header("Location:  http://" . $_SERVER['HTTP_HOST']);
  exit();
}
require_once '../funciones/wsdl/clases/consumoApi.class.php';
$token = $_SESSION['token'];
// print("<pre>".print_r(($_SESSION) ,true)."</pre>"); //die;
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/empleados?rol";
$rs         = API::GET($URL, $token);
$arrayRoles  = API::JSON_TO_ARRAY($rs);
//var_dump($arrayRoles[0]['id_rol']);
// print("<pre>".print_r(($arrayClientes) ,true)."</pre>"); //die;


if ($_POST['mod'] == 1) {
  $accion = "Crear";
} else {
  $accion = "Editar";
  //Listado Clientes
  $id = @$_SESSION['id_user'];
  $token = $_SESSION['token'];
  $URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/empleados?id_usu=$id";
  $rs         = API::GET($URL, $token);
  $arrayUsuario  = API::JSON_TO_ARRAY($rs);


  $nom_usu = $arrayUsuario[0]['nom_usu'];
  $ape_usu = $arrayUsuario[0]['ape_usu'];
  $log_usu = $arrayUsuario[0]['log_usu'];
  $pass_usu = $arrayUsuario[0]['pass_usu'];
  $act_usu = $arrayUsuario[0]['act_usu'];
  $tel_usu = $arrayUsuario[0]['tel_usu'];
  $ced_usu = $arrayUsuario[0]['ced_usu'];
  $car_usu = $arrayUsuario[0]['car_usu'];
  $cor_usu = $arrayUsuario[0]['cor_usu'];
  $rol_usu = $arrayUsuario[0]['rol_usu'];
  $des_rol = $arrayUsuario[0]['des_rol'];


  $ubicacionResidencia = $arrayUsuario[0]['ubicacionResidencia'];
  $ident = $arrayUsuario[0]['ident'];
  $frenteAsignado = $arrayUsuario[0]['frenteAsignado'];
  $carnetizacion = $arrayUsuario[0]['carnetizacion'];
  $pcMacLan = $arrayUsuario[0]['pcMacLan'];
  $pcMacWam = $arrayUsuario[0]['pcMacWam'];
  $pcModelo = $arrayUsuario[0]['pcModelo'];
  $pcSerial = $arrayUsuario[0]['pcSerial'];



  //var_dump($act_usu);


  if ($arrayUsuario[0]['act_usu'] == 1)
    $estado = 1;
  else
    $estado = 0;


  // var_dump($arrayClientes[0]['estado'] );

}
?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Consultores</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<form action="../funciones/funcionesGenerales/XM_usuarioPass.model.php" method="post" name="Reporte24H" id="Reporte24H">
  <input type="hidden" name="mod" value="<?php echo @$_POST['mod'] ?>">
  <input type="hidden" name="idEmpleado" value="<?php echo @$_SESSION['id_user'];?>">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-12 col-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><?php echo $accion; ?> Consultor</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <label for="nombreCliente">Nombre</label>
                  <input type="text" class="form-control" name="readonly" id="readonly" readonly placeholder="Nombre(s)" value="<?php echo @$nom_usu; ?>">
                </div>
                <div class="col-sm-6">
                  <label for="nombreCliente">Apellido</label>
                  <input type="text" class="form-control" name="readonly" id="readonly" readonly placeholder="Apellido(s)" value="<?php echo @$ape_usu; ?>">
                </div>

                <div class="col-sm-4">
                  <label for="nombreCliente">Cedula</label>
                  <input type="text" class="form-control" name="readonly" id="readonly" readonly placeholder="Cedula del Personal" value="<?php echo @$ced_usu; ?>">
                </div>

                <div class="col-sm-4">
                  <label for="nombreCliente">Telefono</label>
                  <input type="text" class="form-control" name="tel_usu" id="tel_usu"  placeholder="Telefono del Personal" value="<?php echo @$tel_usu; ?>">
                </div>

                <div class="col-sm-4">
                  <label for="nombreCliente">Email</label>
                  <input type="mail" class="form-control" name="readonly" id="readonly" readonly placeholder="Cargo del Personal" value="<?php echo @$cor_usu; ?>">
                </div>

                <div class="col-sm-4">
                  <label for="nombreCliente">Usuario para la aplicacion</label>
                  <input type="text" class="form-control" name="readonly" id="readonly" readonly placeholder="Usuario APP" value="<?php echo @$log_usu; ?>">
                </div>
                <div class="col-sm-4">
                  <label for="nombreCliente">Contraseña</label>
                  <input type="text" class="form-control" name="pass_usu" id="pass_usu" placeholder="Clave inicial para  APP" value="<?php echo @$pass_usu; ?>">
                </div>


                <div class="col-sm-12">
                  <label></br>*********Datos del Equipo**********</label>
                </div>

                <div class="col-sm-3">
                  <label for="nombreCliente">Modelo</label>
                  <input type="text" class="form-control" name="readonly" id="readonly" readonly placeholder="Modelo del Equipo" value="<?php echo @$pcModelo; ?>">
                </div>

                <div class="col-sm-3">
                  <label for="nombreCliente">Serial</label>
                  <input type="text" class="form-control" name="readonly" id="readonly" readonly placeholder="Serial" value="<?php echo @$pcSerial; ?>">
                </div>

                <div class="col-sm-3">
                  <label for="nombreCliente">MAC-LAN</label>
                  <input type="text" class="form-control" name="readonly" id="readonly" readonly placeholder="Mac para LAN" value="<?php echo @$pcMacLan; ?>">
                </div>

                <div class="col-sm-3">
                  <label for="nombreCliente">MAC-WAN</label>
                  <input type="text" class="form-control" name="readonly" id="readonly" readonly placeholder="Mac para WAN" value="<?php echo @$pcMacWam; ?>">
                </div>
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary"><?php echo $accion; ?></button>
            </div>
          </form>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
  </section>
</form>
