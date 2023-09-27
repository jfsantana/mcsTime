<?php
if (!isset($_SESSION)) {
  session_start();
}
if (!isset($_SESSION['id_user'])) {
  header("Location:  http://" . $_SERVER['HTTP_HOST']);
  exit();
}
require_once '../funciones/wsdl/clases/consumoApi.class.php';



// print("<pre>".print_r(($arrayClientes) ,true)."</pre>"); //die;


if ($_POST['mod'] == 1) {
  $accion = "Crear";
} else {
  $accion = "Editar";
  //Listado Clientes
  $id = @$_POST["id"];
  $token = $_SESSION['token'];
  $URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/clientes?id=$id";
  $rs         = API::GET($URL, $token);
  $arrayClientes  = API::JSON_TO_ARRAY($rs);

  $NombreCliente = $arrayClientes[0]['NombreCliente'];
  if ($arrayClientes[0]['estado'] == 'Activo')
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
        <h1 class="m-0">Clientes</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<form action="../funciones/funcionesGenerales/XM_clientes.model.php" method="post" name="Reporte24H" id="Reporte24H">
  <input type="hidden" name="mod" value="<?php echo @$_POST['mod'] ?>" >
  <input type="hidden" name="idCliente" value="<?php echo @$_POST['id'] ?>" >
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-12 col-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><?php echo $accion; ?> Cliente</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form>
            <div class="card-body">
              <div class="form-group">
                <label for="nombreCliente">Nombre</label>
                <input type="text" class="form-control" name="nombreCliente" id="nombreCliente" placeholder="Nombre del Cliente" value="<?php echo @$NombreCliente;?>">
              </div>
              <!-- select -->
              <div class="form-group">
                <label>Estado</label>
                <select class="form-control" name="activoCliente" id="activoCliente">
                  <option <?php if(@$estado==1){echo 'selected';} ?> value=1 >Activo</option>
                  <option <?php if(@$estado==0){echo 'selected';} ?> value=0 >Desactivado</option>
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
