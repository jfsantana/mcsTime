<?php
if (!isset($_SESSION)) {
  session_start();
}
if (!isset($_SESSION['id_user'])) {
  header("Location:  http://" . $_SERVER['HTTP_HOST']);
  exit();
}
require_once '../funciones/wsdl/clases/consumoApi.class.php';

//Listado Clientes
// demo
$id = @$_POST["id"];
$token = $_SESSION['token'];
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/clientes?id=$id";

$rs         = API::GET($URL, $token);
$arrayClientes  = API::JSON_TO_ARRAY($rs);

//print("<pre>".print_r(($arrayClientes) ,true)."</pre>"); //die;

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
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo count($arrayClientes); ?></h3>
            <p>Num Clientes</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>


          <a href="#" onclick="enviarParametrosGetsionCreate('admin/clienteCreate.php','1')" class="small-box-footer">Crear Cliente <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>


      <!-- ./col -->
    </div>
    <!-- /.row -->



    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-12 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Listado de Clientes</h3>
          </div>
          <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>

                <th>Nombre Cliente</th>
                <th>Activo</th>

              </tr>
            </thead>
            <tbody>
              <?php foreach ($arrayClientes as $Clinete) { ?>
                <tr>
                  <td><a href="#" onclick="enviarParametrosGetsionUpdate('admin/clienteCreate.php',2,'<?php echo $Clinete['idCliente']; ?>')" class="nav-link "><?php echo $Clinete['NombreCliente']; ?></a></td>
                  <td><?php echo $Clinete['estado']; ?></td>
                </tr>
              <?php } ?>

            </tbody>
            <tfoot>
              <tr>

                <th>Nombre Cliente</th>
                <th>Activo</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->


    <!-- /.card -->
</section>
<!-- /.Left col -->
<!-- right col (We are only adding the ID to make the widgets sortable)-->

<!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
