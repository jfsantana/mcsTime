<?php
if (!isset($_SESSION)) {
      session_start();
  }

  require_once '../funciones/wsdl/clases/consumoApi.class.php';

//Listado Clientes
 $idEmpresaConsultora = @$_POST["idEmpresaConsultora"];
 $token= $_SESSION['token'];
 $URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/consultora?idEmpresaConsultora=$idEmpresaConsultora";
 $rs         = API::GET($URL, $token);
 $arrayCconsultora  = API::JSON_TO_ARRAY($rs);

//print("<pre>".print_r(($arrayClientes) ,true)."</pre>"); //die;
  ?>

<!-- Content Header (Page header)  -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Consultoras (CC)</h1>
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
                <h3><?php echo count($arrayCconsultora);?></h3>

                <p>Consultorass</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Crear Consultoras <i class="fas fa-arrow-circle-right"></i></a>
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
                    <th>id</th>
                    <th>Nombre Consultora</th>
                    <th>Estado</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach( $arrayCconsultora as $consultora){
                    echo "<tr>
                            <td>".$consultora['idEmpresaConsultora']."</td>
                            <td>".$consultora['nombreEmpresaConsultora']."</td>
                            <td>".$consultora['estado']."</td>
                          </tr>";
                }?>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Nombre Consultora</th>
                    <th>Estado</th>
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

