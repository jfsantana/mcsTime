<?php
if (!isset($_SESSION)) {
  session_start();
}

//var_dump($_POST);

require_once '../funciones/wsdl/clases/consumoApi.class.php';
$token = $_SESSION['token'];
// print("<pre>".print_r(($arrayClientes) ,true)."</pre>"); //die;



if ($_SESSION['id_rol'] < 30) {
  $idAux='';
  if(!isset($_POST['id'])){
    $idAux='';
  }else{
  $idAux=@$_POST['id'];
}
  //'id' => string '122'
}else{
  $idAux=$_SESSION['id_user'];
}

$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/time?id=" . $idAux . "&corte=" . $_SESSION['corte'];
$rs         = API::GET($URL, $token);
$arrayTiempo  = API::JSON_TO_ARRAY($rs);
//var_dump($URL);
?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Registro de Tiempos (Corte - <?php echo $_SESSION['corte']; ?>)</h1>
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
      <div class="col-lg-6 col-12">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>Cargar Factura</h3>

            <p>Se almacenara la URL compartida desde el Drive de cada consutor<br></p>
          </div>
          <div class="icon">
            <i class="ion ion-archive"></i>
          </div>
          <a href="#" onclick="enviarParametrosGetsionUpdate('time/facturaCreate.php',2,'<?php echo $_SESSION['corte']; ?>')" class="small-box-footer">Carga de Factura <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-6 col-12">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>Reportar Hora </h3>

            <p>Registro de Tiempos para el Corte - <?php echo $_SESSION['corte']; ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-edit "></i>
          </div>
          <a href="#" onclick="enviarParametrosGetsionCreate('time/cargaTimeCreate.php','1')" class="small-box-footer">Registro de Tiempos <i class="fas fa-arrow-circle-right"></i></a>
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
            <h3 class="card-title">Listado de Horas Cargadas</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="Aprobacion" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 2%;"></th>
                  <th>Consultor</th>
                  <th>Consultora</th>
                  <th>Cliente</th>
                  <th>Proyecto</th>
                  <th>Actividad</th>
                  <!-- <th>Atencion</th> -->
                  <th>Descripcion</th>
                  <th style="width: 9%;">Fecha</th>
                  <th style="width: 2%;">Hora</th>
                  <th style="width: 2%;">Estado</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $total = 0;
                foreach ($arrayTiempo as $TiempoCarga) { //f
                  switch ($TiempoCarga['estadoAP1']) {
                    case 1:
                      $estado="Nuevas";
                      $background='';
                      break;
                    case 2:
                      $estado="Rechazadas";
                      $background='style="background-color: red;"';
                      break;
                    case 3:
                      $estado="Aprobadas";
                      $background='style="background-color: green;"';
                      break;
                    default:
                      $estado="Nuevas";
                      $background='';
                      break;
                    }
                ?>

                  <tr>

                    <th style="width: 2%;">
                      <?php if ($TiempoCarga['estadoAP1'] == 3) { ?>
                        <a href="#" onclick="enviarParametrosGetsionUpdate('time/cargaTimeCreate.php',2,'<?php echo $TiempoCarga['idRegistro']; ?>')" class="nav-link "><i class="fas fa-eye"></i> </a>
                      <?php } else { ?>
                        <a href="#" onclick="enviarParametrosGetsionUpdate('time/cargaTimeCreate.php',2,'<?php echo $TiempoCarga['idRegistro']; ?>')" class="nav-link "><i class="fas fa-edit"></i> </a>
                      <?php } ?>


                    </th>

                    <td><?php echo $TiempoCarga['ape_usu'] . ", " . $TiempoCarga['nom_usu']; ?></td>
                    <td><?php echo $TiempoCarga['nombreEmpresaConsultora']; ?></td>
                    <td><?php echo $TiempoCarga['NombreCliente']; ?></td>
                    <td><?php echo $TiempoCarga['nameProyecto']; ?></td>
                    <td><?php echo $TiempoCarga['descripcionTipoActividad']; ?></td>
                    <td><?php echo $TiempoCarga['descripcion']; ?></td>
                    <td><?php echo $TiempoCarga['fechaActividad']; ?></td>
                    <td ><?php echo $TiempoCarga['hora'];
                        $total = $total + $TiempoCarga['hora']; ?></td>
                    <td <?php  echo  $background; ?>><?php  echo  $estado; ?></td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th style="width: 2%;"></th>
                  <th>Consultor</th>
                  <th>Consultora</th>
                  <th>Cliente</th>
                  <th>Proyecto</th>
                  <th>Actividad</th>

                  <!-- <th>Atencion</th> -->
                  <th>Descripcion</th>
                  <th>Fecha</th>
                  <th style="width: 2%;"><?php echo $total; ?></th>
                  <th style="width: 2%;">Estado</th>
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
