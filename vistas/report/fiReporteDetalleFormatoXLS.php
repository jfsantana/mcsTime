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

if (!isset($_POST['mes'])) {
  $corteSeleccionado = $_SESSION['corte'];
  $_POST['mes'] = $_SESSION['corte'];
} else {
  $corteSeleccionado = $_POST['mes'];
}
if (isset($_POST['proyecto'])) {
  $_POST['consultor'] = $_POST['proyecto'];
}


//var_dump($_POST);
//var_dump($_SESSION['nombreEmpresaConsultora']);


//Listado lista de Consultoras
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/consultora?idEmpresaConsultora=";
$rs         = API::GET($URL, $token);
$arrayListaConsultora  = API::JSON_TO_ARRAY($rs);
//var_dump($URL);

//Listado lista de consultores por Consultora/Proyecto
$string = $_POST['mes'];
$ultimos4 = substr($string, -4);
$mesAux = substr($string, 0, -4);
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/empleados?idEmpresaConsultora=" . @$_POST['consultora'] . "&mes=" . $_POST['mes'];
$rs         = API::GET($URL, $token);
$arrayResumenConsultores  = API::JSON_TO_ARRAY($rs);
//var_dump($URL);

// DESTALLE DE CONSULTOR MENSUAL
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/time?idEmpleadoDetalle=" . @$_POST['consultor'] . "&idEmpresaConsultoraDetalle=" . @$_POST['consultora'] . "&mes=" . $_POST['mes'];
$rs         = API::GET($URL, $token);
$arrayResumenConsultoresDetalleDiario  = API::JSON_TO_ARRAY($rs);


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
    <h1 class="m-0">Detalle Mensual Consultor - Proyecto</h1>
    <div class="row mb-2">

      <div class="col-sm-4">
        <div class="small-box bg-info">
          <div class="inner">
            <h5>Mes a Consultar
              <select class="form-control select2" name="fecha" id="fecha" onchange="enviarParametrosReportFi3('report/fiReporteDetalleFormatoXLS.php',this.value,'','')">
                <?php for ($i = 1; $i <= 12; $i++) {
                  $corteAux2 = $cortes[$i] . @date('Y');
                ?>
                  <option <?php if (@$corteAux2 ==  $corteSeleccionado) {
                            echo 'selected';
                          } ?> value=<?php echo $corteAux2; ?>><?php echo $corteAux2; ?></option>
                <?php } ?>
              </select>
            </h5>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      <div class="col-sm-4">
        <div class="small-box bg-info">
          <div class="inner">
            <h5>Consultoras
              <select class="form-control select2" name="fecha" id="fecha" onchange="enviarParametrosReportFi3('report/fiReporteDetalleFormatoXLS.php','<?php echo @$_POST['mes']; ?>',this.value,'')">
                <option value="">Todas</option>
                <?php
                foreach ($arrayListaConsultora as $listaConsultora) { ?>
                  <option <?php if (@$_POST['consultora'] ==  $listaConsultora['idEmpresaConsultora']) {
                            echo 'selected';
                          } ?> value=<?php echo $listaConsultora['idEmpresaConsultora']; ?>><?php echo $listaConsultora['nombreEmpresaConsultora']; ?></option>
                <?php } ?>
              </select>
            </h5>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      <div class="col-sm-4">
        <div class="small-box bg-info">
          <div class="inner">
            <h5>Consultores
              <select class="form-control select2" style="width: 100%;" name="proyecto" id="proyecto" onchange="enviarParametrosReportFi3('report/fiReporteDetalleFormatoXLS.php','<?php echo @$_POST['mes']; ?>','<?php echo @$_POST['consultora']; ?>',this.value)">
                <option value="">Todos</option>
                <?php
                foreach ($arrayResumenConsultores as $ResumenConsultore) { ?>
                  <option <?php if (@$_POST['proyecto'] ==  $ResumenConsultore['id_usu']) {
                            echo 'selected';
                            @$Consultor = @$ResumenConsultore['Consultor']." - ".$corteSeleccionado;
                          } ?> value=<?php echo $ResumenConsultore['id_usu']; ?>><?php echo $ResumenConsultore['Consultor']; ?></option>
                <?php } ?>
              </select>
            </h5>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Consultores asociados al Mes/Consultora/Proyecto</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tablaModalBase" class="table table-bordered table-striped">
                  <?php
                  $string1 = $_POST['mes'];
                  $year1 = substr($string1, -4); // Obtén los últimos 4 dígitos que corresponden al año
                  $month1 = substr($string1, 0, -4); // Obtén los caracteres restantes que corresponden al mes

                  $date11 = date('01/m/Y', strtotime($string)); // Crea un objeto DateTime con el formato "my" (mes y año)

                  $Presencial = 0;
                  $Remota = 0;
                  foreach ($arrayResumenConsultoresDetalleDiario as $ResumenConsultore) { //
                    $Presencial= $Presencial+$ResumenConsultore['horasPresenciales'];
                    $Remota = $Remota + $ResumenConsultore['horasRemotas'];
                  }


                  ?>
                  <input type="hidden" id="fechaActividad" value="<?php echo @$date11; ?>">
                  <input type="hidden" id="Consultor" value="<?php echo @$Consultor; ?>">
                  <thead>
                    <tr>
                      <th>Cliente</th>
                      <th>Ticket</th>
                      <th>Fecha</th>
                      <th>Consultor</th>
                      <th>Modulo</th>
                      <th>Descripcion</th>
                      <th>Presencial (<?php echo $Presencial; ?>)</th>
                      <th>Remota (<?php echo $Remota; ?>)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    foreach ($arrayResumenConsultoresDetalleDiario as $ResumenConsultore) { //
                    ?>
                      <tr>
                        <td><?php echo $ResumenConsultore['NombreCliente']; ?> </td>
                        <td><?php echo $ResumenConsultore['ticketNum']; ?> </td>
                        <td><?php echo $ResumenConsultore['fechaActividad']; ?></td>
                        <td><?php echo $ResumenConsultore['consultor']; ?></td>
                        <td><?php echo $ResumenConsultore['descripcionModulo']; ?></td>
                        <td><?php echo $ResumenConsultore['descripcion']; ?></td>
                        <td><?php echo $ResumenConsultore['horasPresenciales'];?></td>
                        <td><?php echo $ResumenConsultore['horasRemotas']; ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Cliente</th>
                      <th>Ticket</th>
                      <th>Fecha</th>
                      <th>Consultor</th>
                      <th>Modulo</th>
                      <th>Descripcion</th>
                      <th>Presencial (<?php echo $Presencial; ?>)</th>
                      <th>Remota (<?php echo $Remota; ?>)</th>
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


