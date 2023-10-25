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
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/aprobacionHoras?corte=" . @$corteSeleccionado . "&cargaXcorteXconsultor=&carga=1";
$rs         = API::GET($URL, $token);
$arrayResumenConsultoresHoras  = API::JSON_TO_ARRAY($rs);
//var_dump($URL);
//Listado Consultora
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/aprobacionHoras?corte=" . @$corteSeleccionado . "&cargaXcorteXconsultor=&carga=0";
$rs         = API::GET($URL, $token);
$arrayResumenConsultoresHorasCero  = API::JSON_TO_ARRAY($rs);
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
        <h1 class="m-0">Carga por Consultores enun Corte</h1>
        <h5>Seleccione el Corte que desea consultar <select class="form-control" name="corte" id="miSelect" onchange="enviarParametrosGetsionUpdate('report/cargaXcorteXconsultor.php','<?php echo $_SESSION['id_user']; ?>',this.value)">
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
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-6 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Consultor con Horas totales reportadas</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="cargas11" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Consultor</th>
                  <th>Horas Reportadas</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $totalTotal = 0;
                foreach ($arrayResumenConsultoresHoras as $ResumenConsultore) { //
                ?>

                    <tr>
                      <td><?php echo $ResumenConsultore['consultor'] ?></a></td>
                      <td><?php echo $ResumenConsultore['horas'];  $totalTotal = $totalTotal + $ResumenConsultore['horas']; ?></td>
                    </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Consultor</th>
                  <th>Horas Reportadas - <?php echo $totalTotal; ?> (hr)</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->


        <!-- /.card -->
      </section>

      <section class="col-lg-6 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Consultor Sin Reporte de Horas</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="cargas22" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Consultor</th>
                  <th>Horas Reportadas</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $totalTotal = 0;
                foreach ($arrayResumenConsultoresHorasCero as $ResumenConsultore) { //
                ?>

                    <tr>
                      <td><?php echo $ResumenConsultore['consultor'] ?></a></td>
                      <td><?php echo $ResumenConsultore['horas'];  $totalTotal = $totalTotal + $ResumenConsultore['horas']; ?></td>
                    </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Consultor</th>
                  <th>Horas Reportadas - <?php echo $totalTotal; ?> (hr)</th>
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
