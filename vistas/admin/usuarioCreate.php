<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once '../funciones/wsdl/clases/consumoApi.class.php';
$token = $_SESSION['token'];
// print("<pre>".print_r(($arrayClientes) ,true)."</pre>"); //die;
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/empleados?rol";
$rs         = API::GET($URL, $token);
$arrayRoles  = API::JSON_TO_ARRAY($rs);

// print("<pre>".print_r(($arrayClientes) ,true)."</pre>"); //die;


if ($_POST['mod'] == 1) {
  $accion = "Crear";
} else {
  $accion = "Editar";
  //Listado Clientes
  $id = @$_POST["id"];
  $token = $_SESSION['token'];
  $URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/empleados?id_usu=$id";
  $rs         = API::GET($URL, $token);
  $arrayUsuario  = API::JSON_TO_ARRAY($rs);
  //var_dump($arrayUsuario);

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
<form action="../funciones/funcionesGenerales/XM_usuario.model.php" method="post" name="Reporte24H" id="Reporte24H">
  <input type="hidden" name="mod" value="<?php echo @$_POST['mod'] ?>">
  <input type="hidden" name="idEmpleado" value="<?php echo @$_POST['id'] ?>">
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
              <div class="form-group">
                <label for="nombreCliente">Nombre</label>
                <input type="text" class="form-control" name="nom_usu" id="nom_usu" placeholder="Nombre(s)" value="<?php echo @$nom_usu; ?>">
              </div>
              <div class="form-group">
                <label for="nombreCliente">Apellido</label>
                <input type="text" class="form-control" name="ape_usu" id="nom_usu" placeholder="Apellido(s)" value="<?php echo @$ape_usu; ?>">
              </div>
              <div class="form-group">
                <label for="nombreCliente">Usuario para la aplicacion</label>
                <input type="text" class="form-control" name="log_usu" id="log_usu" placeholder="Usuario APP" value="<?php echo @$log_usu; ?>">
              </div>
              <div class="form-group">
                <label for="nombreCliente">Contraseña</label>
                <input type="text" class="form-control" name="pass_usu" id="pass_usu" placeholder="Clave inicial para  APP" value="<?php echo @$pass_usu; ?>">
              </div>
              <div class="form-group">
                <label for="nombreCliente">Telefono</label>
                <input type="text" class="form-control" name="tel_usu" id="tel_usu" placeholder="Telefono del Personal" value="<?php echo @$tel_usu; ?>">
              </div>
              <div class="form-group">
                <label for="nombreCliente">Cedula</label>
                <input type="text" class="form-control" name="ced_usu" id="ced_usu" placeholder="Cedula del Personal" value="<?php echo @$ced_usu; ?>">
              </div>
              <div class="form-group">
                <label for="nombreCliente">Cargo</label>
                <input type="text" class="form-control" name="car_usu" id="car_usu" placeholder="Cargo del Personal" value="<?php echo @$car_usu; ?>">
              </div>
              <div class="form-group">
                <label for="nombreCliente">Email</label>
                <input type="mail" class="form-control" name="cor_usu" id="cor_usu" placeholder="Cargo del Personal" value="<?php echo @$cor_usu; ?>">
              </div>
              <div class="form-group">
                <label>Rol</label>
                <select class="form-control " name="rol_usu" style="width: 100%;">
                  <option>Seleccione</option>
                  <?php
                  foreach ($arrayRoles as $rol) {?>
                    <option value='<?php echo $rol['id_rol'];?>'
                           <?php if (@$rol_usu == $rol['des_rol']) {
                                  echo 'selected';
                          } ?>>
                          <?php echo $rol['des_rol'];?>
                    </option>
                  <?php } ?>
                  <!-- <option selected="selected">Alabama</option> -->

                </select>
              </div>
              <!-- select -->
              <div class="form-group">
                <label>Estado</label>
                <select class="form-control" name="act_usu" id="act_usu">
                  <option <?php if (@$estado == 1) {
                            echo 'selected';
                          } ?> value=1>Activo</option>
                  <option <?php if (@$estado == 0) {
                            echo 'selected';
                          } ?> value=0>Desactivado</option>
                </select>
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
