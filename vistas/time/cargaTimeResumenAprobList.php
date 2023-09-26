<?php

use function Composer\Autoload\includeFile;

if (!isset($_SESSION)) {
  session_start();
}

require_once '../funciones/wsdl/clases/consumoApi.class.php';
$token = $_SESSION['token'];
$mes_actual = date('m');



if (!isset($_POST['id'])) {
  $corteSeleccionado = $_SESSION['corte'];
} else {
  $corteSeleccionado = $_POST['id'];
}

//var_dump($corteSeleccionado);

//Listado Consultora
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/aprobacionHoras?corte=" . @$corteSeleccionado;
$rs         = API::GET($URL, $token);
$arrayResumenConsultores  = API::JSON_TO_ARRAY($rs);


$cortes = array(
  1 => '01',
  2 => '02',
  3 => '03',
  4 => '04',
  5 => '05',
  6 => '06',
  7 => '07',
  8 => '08',
  9 => '09',
  10 => '10',
  11 => '11',
  12 => '12'
);

?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Aprobacion de Tiempos</h1>
        <h5>Seleccione el Corte que desea consultar <select class="form-control" name="corte" id="miSelect" onchange="enviarParametrosGetsionUpdate('time/cargaTimeResumenAprobList.php',2,this.value)">
            <?php for ($i = 1; $i <= $mes_actual; $i++) {
              $corteAux2 = $cortes[$i] . @date('Y');
            ?>
              <option <?php if (@$corteAux2 ==  $corteSeleccionado) {
                        echo 'selected';
                      } ?> value=<?php echo $corteAux2; ?>><?php echo $corteAux2; ?></option>

            <?php } ?>


          </select></h5>
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
            <h3>Aprobaciones</h3>

            <p>Num Registro de Tiempos</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">Registro de Tiempos <i class="fas fa-arrow-circle-right"></i></a>
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
            <table id="Aprobacion" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>Trabajador</th>
                  <th>Consultora</th>
                  <th>Cliente</th>
                  <th>Proyecto</th>
                  <th>Horas Nuevas</th>
                  <th>Horas Rechazadas</th>
                  <th>Horas Aprobadas</th>
                  <th>Horas Totales Registradas</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $totalNuevas = 0;
                $totalRechazadas = 0;
                $totalAprobadas = 0;
                $totalTotal = 0;
                foreach ($arrayResumenConsultores as $ResumenConsultore) { //f
                ?>

                  <tr>

                    <td style="widtd: 2%;">
                      <a href="#" onclick="enviarParametrosGetsionUpdate('time/cargaTimeCreate.php',2,'<?php echo $ResumenConsultore['idRegistro']; ?>')" class="nav-link "><i class="fas fa-eye"></i> </a>
                    </td>
                    <td>
                      <a href="#" onclick="enviarParametrosGetsionUpdate('time/cargaTimeResumenList.php',2,'<?php echo $ResumenConsultore['id_usu']; ?>')" class="nav-link ">
                        <?php echo $ResumenConsultore['nombre'] ?>
                      </a>

                    </td>
                    <!-- modal -->

                    <!-- fin modal -->

                    <td><?php echo $ResumenConsultore['nombreEmpresaConsultora']; ?></td>
                    <td><?php echo $ResumenConsultore['NombreCliente']; ?></td>
                    <td><?php echo $ResumenConsultore['nameProyecto']; ?></td>
                    <td><?php echo $ResumenConsultore['Nuevas'];
                        $totalNuevas = $totalNuevas + $ResumenConsultore['Nuevas']; ?></td>
                    <td><?php echo $ResumenConsultore['Rechazadas'];
                        $totalRechazadas = $totalRechazadas + $ResumenConsultore['Rechazadas']; ?></td>
                    <td><?php echo $ResumenConsultore['Aprobadas'];
                        $totalAprobadas = $totalAprobadas + $ResumenConsultore['Aprobadas']; ?></td>
                    <td><?php echo $ResumenConsultore['Nuevas'] + $ResumenConsultore['Rechazadas'] + $ResumenConsultore['Aprobadas'];
                        $totalTotal = $totalTotal + $ResumenConsultore['Nuevas'] + $ResumenConsultore['Rechazadas'] + $ResumenConsultore['Aprobadas']; ?></td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th></th>
                  <th>Trabajador</th>
                  <th>Consultora</th>
                  <th>Cliente</th>
                  <th>Proyecto</th>
                  <th><?php echo $totalNuevas; ?></th>
                  <th><?php echo $totalRechazadas; ?></th>
                  <th><?php echo $totalAprobadas; ?></th>
                  <th><?php echo $totalTotal; ?></th>
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
