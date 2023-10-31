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
require_once '../funciones/wsdl/clases/conexion/conexion.php';

$conn = new conexion;

if (!isset($_POST['id'])) {
  $corteSeleccionado = $_SESSION['corte'];
} else {
  $corteSeleccionado = $_POST['id'];
}

//var_dump($corteSeleccionado);



function diasHabilesDesde27($fechaIni, $fecha27, $fechaFin)
{
  $fechaInicio = date('Y-m-d', strtotime($fecha27));
  $diasHabiles = 0;
  $fechaAux = $fecha27;
  while ($fechaAux <= $fechaFin) {
    $diaSemana = date('N', strtotime($fechaAux));
    if ($diaSemana != 7) { // Días de la semana (lunes a viernes)
      $diasHabiles++;
    }
    $fechaAux = date('Y-m-d', strtotime($fechaAux . ' + 1 day'));
  }

  return $diasHabiles;
}

// Ejemplo de uso
$mesSolicitado = '112023'; //$corteSeleccionado; // Cambia esto por el mes que desees en formato MMYYYY
/***/


$fechaString =  @$corteSeleccionado;
$fecha = date_create_from_format("mY", $fechaString);
date_sub($fecha, date_interval_create_from_date_string('1 month'));
$primerDia = date_format($fecha, "Y-m-01");

// $fechaString = substr($mesSolicitado, 0, 2) . '01' . substr($mesSolicitado, 2, 4);
// $fecha = date_create_from_format("dmY", $fechaString);
// date_sub($fecha, date_interval_create_from_date_string('1 month'));
// $primerDia = date_format($fecha, "Y-m-01");


$ultimoDia = date('Y-m-t', strtotime($primerDia));
$mesAux = date('m', strtotime($primerDia));

//var_dump($primerDia);

$fecha27 = '28' . $fechaString;
$fecha = date_create_from_format("dmY", $fecha27);
$fecha27 = date_format($fecha, "Y-m-d");
$diasHabiles = diasHabilesDesde27($primerDia, $fecha27, $ultimoDia);
$horasHabiles = $diasHabiles * 8;

/***/

$query = "SELECT
          	CONCAT( dg_empleados.ape_usu, ', ', dg_empleados.nom_usu ) AS nombre,
            dg_empresa_consultora.nombreEmpresaConsultora AS nombreEmpresaConsultora,
            dg_cliente.NombreCliente AS NombreCliente,
            dg_proyecto.nameProyecto AS nameProyecto,
            dg_reporte_factura.urlFactura,
            sum( dg_reporte_tiempo.hora ) AS hora,
            sum( dg_reporte_tiempo.hora )+ 24 AS horaProyectada
          FROM
          dg_reporte_tiempo
          INNER JOIN dg_empleados ON dg_reporte_tiempo.idEmpleado = dg_empleados.id_usu
          INNER JOIN dg_empresa_consultora ON dg_reporte_tiempo.idEmpresaConsultora = dg_empresa_consultora.idEmpresaConsultora
          INNER JOIN dg_cliente ON dg_reporte_tiempo.idCliente = dg_cliente.idCliente
          INNER JOIN dg_proyecto ON dg_reporte_tiempo.idProyecto = dg_proyecto.idProyecto
          LEFT JOIN dg_reporte_factura ON dg_reporte_factura.idEmpleado = dg_reporte_tiempo.idEmpleado and  dg_reporte_tiempo.corte = dg_reporte_factura.corte
          WHERE


          dg_reporte_tiempo.fechaActividad BETWEEN '$primerDia' and '$ultimoDia' and
          dg_reporte_tiempo.corte = '$corteSeleccionado'
          AND dg_reporte_tiempo.estadoAP1 = 3
          GROUP BY
          dg_reporte_tiempo.idEmpleado,
		      dg_reporte_factura.urlFactura";
//print_r($query);
$arrayResumenConsultores = $conn->ObtenerDatos($query);
//print_r($arrayResumenConsultores);
//Listado Consultora
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/aprobacionHoras?corte=" . @$corteSeleccionado . "&idAprobador=";
// $rs         = API::GET($URL, $token);
//var_dump($URL);
//$arrayResumenConsultores  = API::JSON_TO_ARRAY($rs);


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

$mesTitle = array(
  '01' => 'Enero',
  '02' => 'Febrero',
  '03' => 'Marzo',
  '04' => 'Abril',
  '05' => 'Mayo',
  '06' => 'Junio',
  '07' => 'Julio',
  '08' => 'Agosto',
  '09' => 'Septiembre',
  '10' => 'Octubre',
  '11' => 'Noviembre',
  '12' => 'Diciembre'
);

//var_dump( $mesAux);


?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1 class="m-0">Horas proyectadas consolidado por <b>Consultor</b>, mes <b><?php echo $mesTitle[$mesAux] . ' /' . $diasHabiles . 'dias (' . $horasHabiles . 'hr)'; ?></b></h1>
        <h5>Seleccione el Corte que desea consultar <select class="form-control" name="corte" id="miSelect" onchange="enviarParametrosGetsionUpdate('report/fiProyectoadoMensual27.php','<?php echo $_SESSION['id_user']; ?>',this.value)">
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
                  <th></th>
                  <th>Trabajador</th>
                  <th>Hora Registrada</th>
                  <th>Horas Proyectadas al cierre de mes <?php echo $diasHabiles . 'dias (' . $horasHabiles . 'hr)'; ?></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $totalTotal = 0;
                foreach ($arrayResumenConsultores as $ResumenConsultore) { //
                ?>

                  <tr>
                    <td> <?php if ($ResumenConsultore['urlFactura']) { ?> <a href="<?php echo $ResumenConsultore['urlFactura'] ?>" target="_blank"><i class="fas fa-eye"></i> Recibo </a> <?php } ?> </td>
                    <td><?php echo $ResumenConsultore['nombre'] ?></a></td>
                    <td><?php echo $ResumenConsultore['hora']; ?></td>
                    <td><?php echo $ResumenConsultore['horaProyectada'];
                        $totalTotal = $totalTotal + $ResumenConsultore['horaProyectada']; ?></td>
                  </tr>
                <?php
                } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th></th>
                  <th>Trabajador</th>
                  <th>Consultora</th>
                  <th>Total - <?php echo $totalTotal; ?></th>
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
