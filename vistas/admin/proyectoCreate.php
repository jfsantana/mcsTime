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


// print("<pre>".print_r(($arrayClientes) ,true)."</pre>"); //die;
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/clientes?id=&status=1";
$rs         = API::GET($URL, $token);
$arrayClientes  = API::JSON_TO_ARRAY($rs);

if ($_POST['mod'] == 1) {
  $accion = "Crear";
} else {

  $accion = "Editar";
  //Listado Clientes
  $id = @$_POST["id"];
  $URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/proyecto?idProyecto=$id";
  $rs         = API::GET($URL, $token);
  $arrayProyecto  = API::JSON_TO_ARRAY($rs);
  $Nombre = $arrayProyecto[0]['nameProyecto'];
  $fechaInicio = $arrayProyecto[0]['fechaInicio'];
  $fechaFin = $arrayProyecto[0]['fechaFin'];
  $NombreCliente = $arrayProyecto[0]['NombreCliente'];
  $gerenteProyecto = $arrayProyecto[0]['gerenteProyecto'];
  $pais = @$arrayProyecto[0]['pais'];
  $country = @$arrayProyecto[0]['country'];

  if ($arrayProyecto[0]['activo'] == 1)
    $estado = 1;
  else
    $estado = 0;
}
?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Proyecto</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<form action="../funciones/funcionesGenerales/XM_proyectos.model.php" method="post" name="Reporte24H" id="Reporte24H">
  <input type="hidden" name="mod" value="<?php echo @$_POST['mod'] ?>">
  <input type="hidden" name="idProyecto" value="<?php echo @$_POST['id'] ?>">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-12 col-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><?php echo $accion; ?> Proyecto</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form>
            <div class="card-body">
              <div class="form-group">
                <label for="nombreCliente">Nombre</label>
                <input type="text" class="form-control" name="nameProyecto" id="nameProyecto" placeholder="Nombre del Proyecto" value="<?php echo @$Nombre; ?>">
              </div>

              <div class="form-group">
                <label>Date Inicio:</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                  <input type="text" name="fechaInicio"  class="form-control datetimepicker-input" data-target="#reservationdate" value="<?php echo @$fechaInicio; ?>"/>
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Date Inicio:</label>
                <div class="input-group date" id="reservationdateFin" data-target-input="nearest">
                  <input type="text" name="fechaFin" class="form-control datetimepicker-input" data-target="#reservationdateFin" value="<?php echo @$fechaFin; ?>"/>
                  <div class="input-group-append" data-target="#reservationdateFin" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Cliente</label>
                <select class="form-control select2" name="Cliente" style="width: 100%;">
                  <option>Seleccione</option>
                  <?php
                  foreach ($arrayClientes as $cliente) {?>
                    <option value='<?php echo $cliente['idCliente'];?>'
                           <?php if (@$NombreCliente == @$cliente['NombreCliente']) {
                                  echo 'selected';
                          } ?>>
                          <?php echo $cliente['NombreCliente'];?>
                    </option>
                  <?php } ?>
                  <!-- <option selected="selected">Alabama</option> -->

                </select>
              </div>

              <div class="form-group">
                <label for="nombreCliente">Nombre</label>
                <input type="text" class="form-control" name="gerenteProyecto" id="gerenteProyecto" placeholder="Gerente de Proyecto" value="<?php echo @$gerenteProyecto; ?>">
              </div>
              <!-- select -->
              <div class="form-group">
                <label>Estado</label>
                <select class="form-control" name="activoCliente" id="activoCliente">
                  <option <?php if (@$estado == 1) {
                            echo 'selected';
                          } ?> value=1>Activo</option>
                  <option <?php if (@$estado == 0) {
                            echo 'selected';
                          } ?> value=0>Desactivado</option>
                </select>
              </div>

              <div class="form-group">
                <label for="pais">Pais</label>
                <input type="text" class="form-control" name="pais" id="pais" placeholder="Pais" value="<?php echo @$pais; ?>">
              </div>
              <div class="form-group">
                <label for="ciudad">Estado</label>
                <input type="text" class="form-control" name="country" id="country" placeholder="Estado" value="<?php echo @$country; ?>">
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
