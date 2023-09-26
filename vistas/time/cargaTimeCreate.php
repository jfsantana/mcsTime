<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once '../funciones/wsdl/clases/consumoApi.class.php';

$token = $_SESSION['token'];
$_SESSION['id_user'];

//Listado Consultora
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/consultora?idEmpresaConsultora=";
$rs         = API::GET($URL, $token);
$arrayCconsultora  = API::JSON_TO_ARRAY($rs);

//Listado Clientes
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/clientes?id=";
$rs         = API::GET($URL, $token);
$arrayClientes  = API::JSON_TO_ARRAY($rs);

//Listado Proyecto
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/proyecto?idProyecto=";
$rs         = API::GET($URL, $token);
$arrayProyecto  = API::JSON_TO_ARRAY($rs);

//Listado Tipo de Actividad
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/factura?idTipoActividad=";
$rs         = API::GET($URL, $token);
$arrayTipoActividad  = API::JSON_TO_ARRAY($rs);

//var_dump($_POST);

if ($_POST['mod'] == 1) {
  $accion = "Registro";
  $corte = @$_SESSION['corte'];
  $nombre = @$_SESSION['nombre'];
} else {
  $accion = "Editar";
  //Listado Registro Horas
  $id = @$_POST["id"];
  $token = $_SESSION['token'];
  $URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/time?idRegister=$id";
  var_dump($URL);
  $rs         = API::GET($URL, $token);
  $arrayRegistroTimne  = API::JSON_TO_ARRAY($rs);

  //var_dump($arrayRegistroTimne[0]['estadoAP1']);

  $disabled = "";
  if (@$arrayRegistroTimne[0]['estadoAP1'] > 2) { //1,2 NEVO, RECHAZADO
    //no se puede modificar
    $disabled = "readonly disabled";
  }

  switch (@$arrayRegistroTimne[0]['estadoAP1']) {
    case 1:
      @$estadoAP1 = "Nuevo";
      break;
    case 2:
      @$estadoAP1 = "Rechazado";
      break;
    case 3:
      @$estadoAP1 = "Aprobado";
      break;
    default:
      @$estadoAP1 = "Nuevo";
      break;
  }

  switch (@$arrayRegistroTimne[0]['estadoAP2']) {
    case 1:
      @$estadoAP2 = "Nuevo";
      break;
    case 2:
      @$estadoAP2 = "Rechazado";
      break;
    case 3:
      @$estadoAP2 = "Pagado";
      break;
    default:
      @$estadoAP2 = "Nuevo";
      break;
  }


  $estadtusRegistro = "Aprobado";
  $idRegistro = @$arrayRegistroTimne[0]['idRegistro'];
  $idEmpleado = @$arrayRegistroTimne[0]['idEmpleado'];
  $nombre = @$arrayRegistroTimne[0]['nombre'];
  $idEmpresaConsultora = @$arrayRegistroTimne[0]['idEmpresaConsultora'];
  $idCliente = @$arrayRegistroTimne[0]['idCliente'];
  $idProyecto = @$arrayRegistroTimne[0]['idProyecto'];
  $idTipoActividad = @$arrayRegistroTimne[0]['idTipoActividad'];
  $tipoAtencion = @$arrayRegistroTimne[0]['tipoAtencion'];
  $descripcion = @$arrayRegistroTimne[0]['descripcion'];
  $fechaActividad = @$arrayRegistroTimne[0]['fechaActividad'];
  $hora = @$arrayRegistroTimne[0]['hora'];
  $corte = @$arrayRegistroTimne[0]['corte'];
  $estadoAP1 = @$arrayRegistroTimne[0]['estadoAP1'];



  if (@$arrayClientes[0]['estado'] == 'Activo')
    $estado = 1;
  else
    $estado = 0;


  // var_dump($arrayClientes[0]['estado'] );

}
?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Registro de Horas</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<form action="../funciones/funcionesGenerales/XM_time.model.php" method="post" name="Reporte24H" id="Reporte24H">
  <input type="hidden" name="mod" value="<?php echo @$_POST['mod'] ?>">
  <input type="hidden" name="idEmpleado" value="<?php echo @$_SESSION['id_user'] ?>">
  <input type="hidden" name="corte" value="<?php echo @$corte ?>">
  <input type="hidden" name="idRegistro" value="<?php echo @$idRegistro ?>">


  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-12 col-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><?php echo $accion; ?> de Horas (<?php echo  @$estadoAP1; ?>)</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form>
            <div class="card-body">
              <div class="row">

                <div class="col-sm-3">
                  <label for="nombreCliente">Consultor</label>
                  <input type="text" class="form-control" name="no_aply" id="no_aply" disabled placeholder="Nombre del Cliente" value="<?php echo @$nombre; ?>">
                </div>
                <div class="col-sm-3">
                  <label>Fecha Actividad</label>
                  <div class="input-group date" id="reservationdateFin" data-target-input="nearest">
                    <input type="text" name="fechaActividad" <?php echo   @$disabled; ?> class="form-control datetimepicker-input" data-target="#reservationdateFin" value="<?php echo @$fechaActividad; ?>" />
                    <div class="input-group-append" data-target="#reservationdateFin" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-3">
                  <label for="nombreCliente">Hora(s)</label>
                  <input type="number" min=0 max=20 class="form-control" <?php echo   @$disabled; ?> name="hora" id="hora" placeholder="Nombre del Cliente" value="<?php echo @$hora; ?>">
                </div>

                <div class="col-sm-3">
                  <label for="nombreCliente">Corte</label>
                  <input type="text" class="form-control" name="no_apply2" disabled placeholder="Nombre del Cliente" value="<?php echo @$corte ?>">
                </div>

                <!-- select -->
                <div class="col-sm-4">
                  <label>Consultora</label>
                  <select class="form-control" name="idEmpresaConsultora" <?php echo   @$disabled; ?> id="idEmpresaConsultora">
                    <option>Seleccione</option>
                    <?php foreach ($arrayCconsultora as $consultora) { ?>
                      <option <?php if (@$idEmpresaConsultora == $consultora['idEmpresaConsultora']) {
                                echo 'selected';
                              } ?> value=<?php echo $consultora['idEmpresaConsultora']; ?>><?php echo $consultora['nombreEmpresaConsultora']; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <!-- select -->
                <div class="col-sm-4">
                  <label>Cliente</label>
                  <select class="form-control" name="idCliente" id="idCliente" <?php echo   @$disabled; ?>>
                    <option>Seleccione</option>
                    <?php foreach ($arrayClientes as $cliente) { ?>
                      <option <?php if (@$idCliente == $cliente['idCliente']) {
                                echo 'selected';
                              } ?> value=<?php echo $cliente['idCliente']; ?>><?php echo $cliente['NombreCliente']; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <!-- select -->
                <div class="col-sm-4">
                  <label>Proyecto</label>
                  <select class="form-control" name="idProyecto" id="idProyecto" <?php echo   @$disabled; ?>>
                    <option>Seleccione</option>
                    <?php foreach ($arrayProyecto as $proyecto) { ?>
                      <option <?php if (@$idProyecto == $proyecto['idProyecto']) {
                                echo 'selected';
                              } ?> value=<?php echo $proyecto['idProyecto']; ?>><?php echo $proyecto['nameProyecto']; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <!-- select -->
                <div class="col-sm-4">
                  <label>Tipo de Actividad</label>
                  <select class="form-control" name="idTipoActividad" id="idTipoActividad" <?php echo   @$disabled; ?>>
                    <option>Seleccione</option>
                    <?php foreach ($arrayTipoActividad as $tipoActividad) { ?>
                      <option <?php if (@$idTipoActividad == $tipoActividad['irTipoActividad']) {
                                echo 'selected';
                              } ?> value=<?php echo $tipoActividad['irTipoActividad']; ?>><?php echo $tipoActividad['irTipoActividad'] . "-" . $tipoActividad['descripcionTipoActividad']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <!-- select -->
                <div class="col-sm-4">
                  <label>Tipo de Atencion</label>
                  <select class="form-control" name="tipoAtencion" id="tipoAtencion" <?php echo   @$disabled; ?>>
                    <option>Seleccione</option>

                    <option <?php if (@$tipoAtencion == "Remota") {
                              echo 'selected';
                            } ?> value="Remota">Remota</option>
                    <option <?php if (@$tipoAtencion == "Presencial") {
                              echo 'selected';
                            } ?> value="Presencial">Presencial</option>
                  </select>
                </div>
                <!-- select -->
                <div class="col-sm-4">


                  <?php if ($_SESSION['id_rol'] > 30) { ?>


                  <?php } else { ?>
                    <label>Estado de la Actividad</label>
                    <select class="form-control" name="estadoAP1" id="estadoAP1" <?php echo   @$disabled; ?>>
                      <option>Seleccione</option>
                      <option <?php if (@$estadoAP1 == "1") {
                                echo 'selected';
                              } ?> value="1">Nuevo</option>
                      <!-- $_SESSION['id_rol']  30-->
                      <option <?php if (@$estadoAP1 == "2") {
                                echo 'selected';
                              } ?> value="2">Rechazado</option>
                      <option <?php if (@$estadoAP1 == "3") {
                                echo 'selected';
                              } ?> value="3">Aprobado</option>
                    </select>

                  <?php } ?>

                </div>
                <div class="col-sm-12">
                  <label for="nombreCliente">Descripcion Actividad</label>
                  <input type="text" class="form-control" name="descripcion" <?php echo   @$disabled; ?> placeholder="Descripcion de la Actividad (256 Caracteres)" value="<?php echo @$descripcion ?>">
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <?php if (@$arrayRegistroTimne[0]['estadoAP1'] <> 3) { ?>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary" <?php echo   @$disabled; ?> disable><?php echo $accion; ?></button>
              </div>
            <?php } ?>
          </form>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
  </section>
</form>
