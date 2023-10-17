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
$mes_actual = date('m');



if (!isset($_POST['id'])) {
  $corteSeleccionado = $_SESSION['corte'];
} else {
  $corteSeleccionado = $_POST['id'];
}

//var_dump($_SESSION['nombreEmpresaConsultora']);

//Listado Consultora
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/aprobacionHoras?corte=" . @$corteSeleccionado . "&Consultora=" . $_SESSION['nombreEmpresaConsultora'];
$rs         = API::GET($URL, $token);
$arrayResumenConsultores  = API::JSON_TO_ARRAY($rs);
//var_dump($URL);
//var_dump($URL);
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
        <h1 class="m-0">Por Consultor</h1>
        <h5>Seleccione el Corte que desea consultar <select class="form-control" name="corte" id="miSelect" onchange="enviarParametrosGetsionUpdate('report/porConsultor.php','<?php echo $_SESSION['id_user']; ?>',this.value)">
            <?php for ($i = 1; $i <= 12; $i++) {
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
    <!-- <div class="row">
      <div class="col-lg-3 col-6">
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
    </div> -->
    <!-- /.row -->



    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-12 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Reporte Base Por Consultor (Consultor/Cliente/Proyecto/Total horas APROBADAS)</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="Aprobacion" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Trabajador</th>
                  <th>Consultora</th>
                  <th>Cliente</th>
                  <th>Proyecto</th>
                  <th>Horas Totales Aprobadas</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $totalTotal = 0;
                foreach ($arrayResumenConsultores as $ResumenConsultore) { //
                  if ($ResumenConsultore['Aprobadas'] != '0.00') {
                ?>

                    <tr>
                      <td><?php echo $ResumenConsultore['nombre'] ?></a></td>
                      <td><?php echo $ResumenConsultore['nombreEmpresaConsultora']; ?></td>
                      <td><?php echo $ResumenConsultore['NombreCliente']; ?></td>
                      <td><?php echo $ResumenConsultore['nameProyecto']; ?></td>
                      <td><?php echo $ResumenConsultore['Aprobadas'];
                          $totalTotal = $totalTotal + $ResumenConsultore['Aprobadas']; ?></td>
                    </tr>
                <?php }
                } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Trabajador</th>
                  <th>Consultora</th>
                  <th>Cliente</th>
                  <th>Proyecto</th>
                  <th>Total - <?php echo $totalTotal; ?> (hr)</th>
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
