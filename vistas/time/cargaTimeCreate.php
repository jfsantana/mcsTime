<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once '../funciones/wsdl/clases/consumoApi.class.php';

$token = $_SESSION['token'];
$_SESSION['id_user'];

//Listado Consultora
$idEmpresaConsultora = @$_POST["idEmpresaConsultora"];
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/consultora?idEmpresaConsultora=$idEmpresaConsultora";
$rs         = API::GET($URL, $token);
$arrayCconsultora  = API::JSON_TO_ARRAY($rs);

//Listado Clientes
$idCliente = @$_POST["idCliente"];
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/clientes?id=$idCliente";
$rs         = API::GET($URL, $token);
$arrayClientes  = API::JSON_TO_ARRAY($rs);

//Listado Proyecto
$idProyecto = @$_POST["idProyecto"];
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/proyecto?idProyecto=$idProyecto";
$rs         = API::GET($URL, $token);
$arrayProyecto  = API::JSON_TO_ARRAY($rs);

//Listado Tipo de Actividad
$idTipoActividad = @$_POST["idTipoActividad"];
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/factura?idTipoActividad=";
$rs         = API::GET($URL, $token);
$arrayTipoActividad  = API::JSON_TO_ARRAY($rs);

//var_dump($arrayTipoActividad);

if ($_POST['mod'] == 1) {
  $accion = "Registro";
} else {
  $accion = "Editar";
  //Listado Clientes
  $id = @$_POST["id"];
  $token = $_SESSION['token'];
  $URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/clientes?id=$id";
  $rs         = API::GET($URL, $token);
  $arrayClientes  = API::JSON_TO_ARRAY($rs);

  $NombreCliente = $arrayClientes[0]['NombreCliente'];
  if ($arrayClientes[0]['estado'] == 'Activo')
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
  <input type="hidden" name="corte" value="<?php echo @$_SESSION['corte'] ?>">
  <input type="hidden" name="idRegistro" value="<?php echo @$_POST['idRegistro'] ?>">


  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-12 col-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><?php echo $accion; ?> de Horas</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form>
            <div class="card-body">
              <div class="row">

                <div class="col-sm-3">
                  <label for="nombreCliente">Consultor</label>
                  <input type="text" class="form-control" name="no_aply" id="no_aply" disabled placeholder="Nombre del Cliente" value="<?php echo @$_SESSION['nombre']; ?>">
                </div>
                <div class="col-sm-3">
                  <label>Fecha Actividad</label>
                  <div class="input-group date" id="reservationdateFin" data-target-input="nearest">
                    <input type="text" name="fechaActividad" class="form-control datetimepicker-input" data-target="#reservationdateFin" value="<?php echo @$fechaFin; ?>" />
                    <div class="input-group-append" data-target="#reservationdateFin" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-3">
                  <label for="nombreCliente">Hora</label>
                  <input type="number" min=0 max=20 class="form-control" name="hora" id="hora" placeholder="Nombre del Cliente" value="<?php echo @$_SESSION['nombre']; ?>">
                </div>

                <div class="col-sm-3">
                  <label for="nombreCliente">Corte</label>
                  <input type="text" class="form-control" name="no_apply2" disabled placeholder="Nombre del Cliente" value="<?php echo @$_SESSION['corte'] ?>">
                </div>

                <!-- select -->
                <div class="col-sm-4">
                  <label>Consultora</label>
                  <select class="form-control" name="idEmpresaConsultora" id="idEmpresaConsultora">
                    <option>Seleccione</option>
                    <?php foreach ($arrayCconsultora as $consultora) { ?>
                      <option <?php if (@$estado == 1) {
                                echo 'selected';
                              } ?> value=<?php echo $consultora['idEmpresaConsultora']; ?>><?php echo $consultora['nombreEmpresaConsultora']; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <!-- select -->
                <div class="col-sm-4">
                  <label>Cliente</label>
                  <select class="form-control" name="idCliente" id="idCliente">
                    <option>Seleccione</option>
                    <?php foreach ($arrayClientes as $cliente) { ?>
                      <option <?php if (@$estado == 1) {
                                echo 'selected';
                              } ?> value=<?php echo $cliente['idCliente']; ?>><?php echo $cliente['NombreCliente']; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <!-- select -->
                <div class="col-sm-4">
                  <label>Proyecto</label>
                  <select class="form-control" name="idProyecto" id="idProyecto">
                    <option>Seleccione</option>
                    <?php foreach ($arrayProyecto as $proyecto) { ?>
                      <option <?php if (@$estado == 1) {
                                echo 'selected';
                              } ?> value=<?php echo $proyecto['idProyecto']; ?>><?php echo $proyecto['nameProyecto']; ?></option>
                    <?php } ?>
                  </select>
                </div>

                                <!-- select -->
                <div class="col-sm-8">
                  <label>Tipo de Actividad</label>
                  <select class="form-control" name="idTipoActividad" id="idTipoActividad">
                    <option>Seleccione</option>
                    <?php foreach ($arrayTipoActividad as $tipoActividad) { ?>
                      <option <?php if (@$estado == 1) {
                                echo 'selected';
                              } ?> value=<?php echo $tipoActividad['irTipoActividad']; ?>><?php echo $tipoActividad['irTipoActividad'] . "-" . $tipoActividad['descripcionTipoActividad']; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <!-- select -->
                <div class="col-sm-4">
                  <label>Tipo de Atencion</label>
                  <select class="form-control" name="tipoAtencion" id="tipoAtencion">
                    <option>Seleccione</option>

                    <option <?php if (@$estado == 1) {
                              echo 'selected';
                            } ?> value="Remota">Remota</option>
                    <option <?php if (@$estado == 1) {
                              echo 'selected';
                            } ?> value="Presencial">Presencial</option>

                  </select>
                </div>

                <div class="col-sm-12">
                  <label for="nombreCliente">Descripcion Actividad</label>
                  <input type="text" class="form-control" name="descripcion"  placeholder="Descripcion de la Actividad (256 Caracteres)" value="<?php echo @$descripcion?>">
                </div>



              </div>









            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary"><?php echo $accion; ?></button>
            </div>
          </form>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
  </section>
</form>
