<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once '../funciones/wsdl/clases/consumoApi.class.php';



// print("<pre>".print_r(($arrayClientes) ,true)."</pre>"); //die;


if ($_POST['mod'] == 1) {
  $accion = "Crear";
} else {
  $accion = "Editar";
  //Listado Consultora
  $id = @$_POST["id"];
  $token = $_SESSION['token'];
  $URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/consultora?idEmpresaConsultora=$id";
  $rs         = API::GET($URL, $token);
  $arrayCconsultora  = API::JSON_TO_ARRAY($rs);
  //var_dump($arrayCconsultora);

  $Nombre = $arrayCconsultora[0]['nombreEmpresaConsultora'];
  if ($arrayCconsultora[0]['estado'] == 'Activo')
    $estado = 1;
  else
    $estado = 0;
  // var_dump($arrayClientes[0]['estado'] );
}
//var_dump($accion);
?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Consultora</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<form action="../funciones/funcionesGenerales/XM_consultora.model.php" method="post" name="consultora" id="consultora">
  <input type="hidden" name="mod" value="<?php echo @$_POST['mod'] ?>">
  <input type="hidden" name="idEmpresaConsultora" value="<?php echo @$_POST['id'] ?>">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-12 col-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><?php echo $accion; ?> Consultora</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form>
            <div class="card-body">
              <div class="form-group">
                <label for="nombreCliente">Nombre</label>
                <input type="text" class="form-control" name="nombreEmpresaConsultora" id="nombreEmpresaConsultora" placeholder="Nombre de la Consultora" value="<?php echo @$Nombre; ?>">
              </div>
              <!-- select -->
              <div class="form-group">
                <label>Estado</label>
                <select class="form-control" name="activo" id="activo">
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
