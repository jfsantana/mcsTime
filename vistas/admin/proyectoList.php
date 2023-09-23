<?php
if (!isset($_SESSION)) {
      session_start();
  }

  require_once '../funciones/wsdl/clases/consumoApi.class.php';

//Listado Clientes
 $idProyecto = @$_POST["idProyecto"];
 $token= $_SESSION['token'];
 $URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/proyecto?idProyecto=$idProyecto";
 $rs         = API::GET($URL, $token);
 $arrayProyecto  = API::JSON_TO_ARRAY($rs);

//print("<pre>".print_r(($arrayClientes) ,true)."</pre>"); //die;

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
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo count($arrayProyecto);?></h3>

                <p>Num Proyectos</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Crear Proyecto <i class="fas fa-arrow-circle-right"></i></a>
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
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Proyecto</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Activo</th>
                    <th>Gerente Consultora</th>
                    <th>Cliente</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach( $arrayProyecto as $Proyecto){
                    echo "<tr>
                            <td>".$Proyecto['idProyecto']."</td>
                            <td>".$Proyecto['nameProyecto']."</td>
                            <td>".$Proyecto['fechaInicio']."</td>
                            <td>".$Proyecto['fechaFin']."</td>
                            <td>".$Proyecto['activo']."</td>
                            <td>".$Proyecto['gerenteProyecto']."</td>
                            <td>".$Proyecto['NombreCliente']."</td>
                          </tr>";
                       }?>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Proyecto</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Activo</th>
                    <th>Gerente Consultora</th>
                    <th>Cliente</th>
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

