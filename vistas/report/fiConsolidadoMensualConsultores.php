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

//var_dump($_POST);
//var_dump($_SESSION['nombreEmpresaConsultora']);


//Listado lista de Consultoras
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/consultora?idEmpresaConsultora=";
$rs         = API::GET($URL, $token);
$arrayListaConsultora  = API::JSON_TO_ARRAY($rs);
//var_dump($URL);

//Listado lista de Proyectos x Consultora
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/proyecto?idConsultora=" . @$_POST['consultora'] . "&mes=" . @$_POST['mes'];
$rs         = API::GET($URL, $token);
$arrayListaProyecto  = API::JSON_TO_ARRAY($rs);
//var_dump($arrayListaProyecto);

//Listado lista de consultores por Consultora/Proyecto
$string = $_POST['mes'];
$ultimos4 = substr($string, -4);
$mesAux = substr($string, 0, -4);
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/empleados?idProyecto=" . @$_POST['proyecto'] . "&idConsultora=" . @$_POST['consultora'] . "&mes=" . $_POST['mes'];
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
    <h1 class="m-0">Detalle Mensual Consultor - Proyecto</h1>
    <div class="row mb-2">

      <div class="col-sm-4">
        <div class="small-box bg-info">
          <div class="inner">
            <h5>Mes a Consultar
              <select class="form-control" name="fecha" id="fecha" onchange="enviarParametrosReportFi3('report/fiConsolidadoMensualConsultores.php',this.value,'','')">
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
              <select class="form-control" name="fecha" id="fecha" onchange="enviarParametrosReportFi3('report/fiConsolidadoMensualConsultores.php','<?php echo @$_POST['mes']; ?>',this.value,'')">
                <option value="">Todas</option>
                <?php
                foreach ($arrayListaConsultora as $listaConsultora) { ?>
                  <option <?php if (@$_POST['consultora'] ==  $listaConsultora['idEmpresaConsultora']) {
                            echo 'selected';
                            @$consultoraAUx=@$listaConsultora['nombreEmpresaConsultora'];
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
            <h5>Proyectos
              <select class="form-control" name="proyecto" id="proyecto" onchange="enviarParametrosReportFi3('report/fiConsolidadoMensualConsultores.php','<?php echo @$_POST['mes']; ?>','<?php echo @$_POST['consultora']; ?>',this.value)">
                <option value="">Todos</option>
                <?php
                foreach ($arrayListaProyecto as $listaProyecto) { ?>
                  <option <?php if (@$_POST['proyecto'] ==  $listaProyecto['idProyecto']) {
                            echo 'selected';
                            @$nameProyecto= @$consultoraAUx. " " .$listaProyecto['nameProyecto']." - ".$corteSeleccionado;
                          } ?> value=<?php echo $listaProyecto['idProyecto']; ?>><?php echo $listaProyecto['nameProyecto']; ?></option>
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
                <h3 class="card-title">Consultores asociados al Mes/Consultora/Proyecto</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <input type="hidden" id="nameProyecto" value="<?php echo @$nameProyecto; ?>">
                <table id="tablaExcel" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Trabajador</th>
                      <th>Cedula</th>
                      <th>Consultora</th>
                      <th>Cliente</th>
                      <th>nameProyecto</th>
                      <th>Aprobador</th>
                      <th>totalHoras</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $totalTotal = 0;

                    foreach ($arrayResumenConsultores as $ResumenConsultore) { //
                    ?>

                      <tr>

                        <td><button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl<?php echo $ResumenConsultore['id_usu'] . $ResumenConsultore['idEmpresaConsultora']; ?>"><?php echo $ResumenConsultore['Consultor']; ?> </button></a></td>
                        <td><?php echo $ResumenConsultore['Cedula']; ?></td>
                        <td><?php echo $ResumenConsultore['Consultora']; ?></td>
                        <td><?php echo $ResumenConsultore['Cliente']; ?></td>
                        <td><?php echo $ResumenConsultore['nameProyecto']; ?></td>
                        <td><?php echo $ResumenConsultore['Aprobador']; ?></td>
                        <td><?php echo $ResumenConsultore['totalHoras'];
                            $totalTotal = $totalTotal + $ResumenConsultore['totalHoras']; ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Trabajador</th>
                      <th>Cedula</th>
                      <th>Consultora</th>
                      <th>Cliente</th>
                      <th>nameProyecto</th>
                      <th>Aprobador</th>
                      <th>Horas Totales (<?php echo $totalTotal; ?>)</th>
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

    <?php
    $totalTotal = 0;
    foreach ($arrayResumenConsultores as $index => $ResumenConsultore) {
      //var_dump($ResumenConsultore['id_usu']. $ResumenConsultore['idEmpresaConsultora']);
    ?>

      <div class="modal fade" id="modal-xl<?php echo $ResumenConsultore['id_usu'] . $ResumenConsultore['idEmpresaConsultora']; ?>">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Extra Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- incicio body

              AQUI TENGO QUE LLAMAR AL SERVICIO CON LOS DATOS -->
              <?php
              $URLaux        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/empleados?id_empleado=" . @$ResumenConsultore['id_usu'] . "&idEmpresaConsultora=" . @$ResumenConsultore['idEmpresaConsultora'] . "&idProyecto=" . @$_POST['proyecto'] . "&mes=" . @$_POST['mes'];
              $rs         = API::GET($URLaux, $token);
              $arrayResumenConsultoresDetalle  = API::JSON_TO_ARRAY($rs);
              //var_dump($URLaux);
              ?>

              <table id="tablaModal<?php echo $index; ?>" name="<?php echo $index; ?>" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Consultor</th>
                    <th>Cedula</th>
                    <th>Consultora</th>
                    <th>Cliente</th>
                    <th>Proyecto</th>
                    <th>Tipo de Atencion</th>
                    <th>Num Ticket</th>

                    <th>Descripcion Activiad</th>
                    <th>Fecha Actividad</th>
                    <th>Horas</th>


                  </tr>
                </thead>
                <tbody>
                  <?php
                  $totalTotal = 0;
                  foreach ($arrayResumenConsultoresDetalle as $ResumenConsultoreDetalle) { //
                  ?>

                    <tr>

                      <td><?php echo $ResumenConsultoreDetalle['ape_usu'] . ', ' . $ResumenConsultoreDetalle['nom_usu']; ?></td>
                      <td><?php echo $ResumenConsultoreDetalle['ced_usu']; ?></td>
                      <td><?php echo $ResumenConsultoreDetalle['nombreEmpresaConsultora']; ?></td>
                      <td><?php echo $ResumenConsultoreDetalle['NombreCliente']; ?></td>
                      <td><?php echo $ResumenConsultoreDetalle['nameProyecto']; ?></td>
                      <td><?php echo $ResumenConsultoreDetalle['tipoAtencion']; ?></td>
                      <td><?php echo $ResumenConsultoreDetalle['ticketNum']; ?></td>
                      <td><?php echo $ResumenConsultoreDetalle['descripcion']; ?></td>
                      <td><?php echo $ResumenConsultoreDetalle['fechaActividad']; ?></td>
                      <td><?php echo $ResumenConsultoreDetalle['hora']; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Consultor</th>
                    <th>Cedula</th>
                    <th>Consultora</th>
                    <th>Cliente</th>
                    <th>Proyecto</th>
                    <th>Tipo de Atencion</th>
                    <th>Num Ticket</th>

                    <th>Descripcion Activiad</th>
                    <th>Fecha Actividad</th>
                    <th>Horas</th>
                  </tr>
                </tfoot>
              </table>

              <!-- Fin Body -->
              </body>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

    <?php } ?>
