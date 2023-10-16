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
// print("<pre>".print_r(($arrayClientes) ,true)."</pre>"); //die;
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/empleados?rol";
$rs         = API::GET($URL, $token);
$arrayRoles  = API::JSON_TO_ARRAY($rs);
//var_dump($arrayRoles[0]['id_rol']);
// print("<pre>".print_r(($arrayClientes) ,true)."</pre>"); //die;
$token = $_SESSION['token'];
$URL1        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/consultora?idEmpresaConsultora=";
$rs         = API::GET($URL1, $token);
$arrayCconsultora  = API::JSON_TO_ARRAY($rs);
//var_dump($_POST);

if ($_POST['mod'] == 1) {
  $accion = "Crear";
} else {
  $accion = "Editar";
  //Listado Clientes
  $id = @$_POST["id"];
  $token = $_SESSION['token'];
  $URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/empleados?id_usu=$id";
  $rs         = API::GET($URL, $token);
  $arrayUsuario  = API::JSON_TO_ARRAY($rs);
  //var_dump($arrayUsuario);



  $nom_usu = $arrayUsuario[0]['nom_usu'];
  $ape_usu = $arrayUsuario[0]['ape_usu'];
  $log_usu = $arrayUsuario[0]['log_usu'];
  $pass_usu = $arrayUsuario[0]['pass_usu'];
  $act_usu = $arrayUsuario[0]['act_usu'];
  $tel_usu = $arrayUsuario[0]['tel_usu'];
  $ced_usu = $arrayUsuario[0]['ced_usu'];
  $car_usu = $arrayUsuario[0]['car_usu'];
  $cor_usu = $arrayUsuario[0]['cor_usu'];
  $rol_usu = $arrayUsuario[0]['rol_usu'];
  $des_rol = $arrayUsuario[0]['des_rol'];


  $ubicacionResidencia = $arrayUsuario[0]['ubicacionResidencia'];
  $ident = $arrayUsuario[0]['ident'];
  $frenteAsignado = $arrayUsuario[0]['frenteAsignado'];
  $carnetizacion = $arrayUsuario[0]['carnetizacion'];
  $pcMacLan = $arrayUsuario[0]['pcMacLan'];
  $pcMacWam = $arrayUsuario[0]['pcMacWam'];
  $pcModelo = $arrayUsuario[0]['pcModelo'];
  $pcSerial = $arrayUsuario[0]['pcSerial'];

  $equipoAsignado = $arrayUsuario[0]['equipoAsignado'];

  $vehiculoTipo = $arrayUsuario[0]['vehiculoTipo'];
  $vehiculoModelo = $arrayUsuario[0]['vehiculoModelo'];
  $vehiculoMarca = $arrayUsuario[0]['vehiculoMarca'];
  $vehiculoColor = $arrayUsuario[0]['vehiculoColor'];
  $vehiculoPlaca = $arrayUsuario[0]['vehiculoPlaca'];
  $vehiculoAnio = $arrayUsuario[0]['vehiculoAnio'];
  $vehiculoAseguradora = $arrayUsuario[0]['vehiculoAseguradora'];
  $vehiculoContrato = $arrayUsuario[0]['vehiculoContrato'];

  $foraneo = $arrayUsuario[0]['foraneo'];
  $idConsultoraContratante = $arrayUsuario[0]['idConsultoraContratante'];



  //var_dump($act_usu);


  if ($arrayUsuario[0]['act_usu'] == 1)
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
        <h1 class="m-0">Consultores</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container -fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<form action="../funciones/funcionesGenerales/XM_usuario.model.php" method="post" name="Reporte24H" id="Reporte24H">
  <input type="hidden" name="mod" value="<?php echo @$_POST['mod'] ?>">
  <input type="hidden" name="idEmpleado" value="<?php echo @$_POST['id'] ?>">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-12 col-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><?php echo $accion; ?> Consultor</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-4">
                  <label for="nombreCliente">Nombre</label>
                  <input type="text" class="form-control" name="nom_usu" id="nom_usu" placeholder="Nombre(s)" value="<?php echo @$nom_usu; ?>">
                </div>
                <div class="col-sm-4">
                  <label for="nombreCliente">Apellido</label>
                  <input type="text" class="form-control" name="ape_usu" id="nom_usu" placeholder="Apellido(s)" value="<?php echo @$ape_usu; ?>">
                </div>

                <div class="col-sm-4">
                  <label for="nombreCliente">Cedula</label>
                  <input type="text" class="form-control" name="ced_usu" id="ced_usu" placeholder="Cedula del Personal" value="<?php echo @$ced_usu; ?>">
                </div>

                <div class="col-sm-4">
                  <label for="nombreCliente">Telefono</label>
                  <input type="text" class="form-control" name="tel_usu" id="tel_usu" placeholder="Telefono del Personal" value="<?php echo @$tel_usu; ?>">
                </div>

                <div class="col-sm-4">
                  <label for="nombreCliente">Email</label>
                  <input type="mail" class="form-control" name="cor_usu" id="cor_usu" placeholder="Cargo del Personal" value="<?php echo @$cor_usu; ?>">
                </div>

                <div class="col-sm-4">
                  <label for="nombreCliente">foraneo</label>
                  <input type="mail" class="form-control" name="foraneo" id="foraneo" placeholder="Cargo del Personal" value="<?php echo @$foraneo; ?>">
                </div>

                <div class="col-sm-6">
                  <label for="nombreCliente">Equipo Asignado</label>
                  <input type="mail" class="form-control" name="equipoAsignado" id="equipoAsignado" placeholder="Cargo del Personal" value="<?php echo @$equipoAsignado; ?>">
                </div>

                <div class="col-sm-6">
                  <label>Consultora</label>
                  <select class="form-control select2" name="idConsultoraContratante" style="width: 100%;">
                    <option>Seleccione</option>
                    <?php
                    foreach ($arrayCconsultora  as $consultora) {
                    ?>
                      <option value='<?php echo $consultora['idEmpresaConsultora']; ?>' <?php if (@$idConsultoraContratante == @$consultora['idEmpresaConsultora']) {
                                                                                          echo 'selected';
                                                                                        } ?>>
                        <?php echo $consultora['nombreEmpresaConsultora']; ?>
                      </option>
                    <?php } ?>
                    <!-- <option selected="selected">Alabama</option>  -->

                  </select>
                </div>



                <div class="col-sm-3">
                  <label for="nombreCliente">Ubicacion Residencia</label>
                  <input type="text" class="form-control" name="ubicacionResidencia" id="ubicacionResidencia" placeholder="Direccion de Residencia" value="<?php echo @$ubicacionResidencia; ?>">
                </div>
                <div class="col-sm-3">
                  <label for="nombreCliente">Ident.</label>
                  <input type="text" class="form-control" name="ident" id="ident" placeholder="Identificador" value="<?php echo @$ident; ?>">
                </div>
                <div class="col-sm-3">
                  <label for="nombreCliente">Frente Asignado</label>
                  <input type="text" class="form-control" name="frenteAsignado" id="frenteAsignado" placeholder="Frente Asignado" value="<?php echo @$frenteAsignado; ?>">
                </div>
                <div class="col-sm-3">
                  <label for="nombreCliente">Carnetizacion</label>
                  <input type="text" class="form-control" name="carnetizacion" id="carnetizacion" placeholder="Carnetizacion" value="<?php echo @$carnetizacion; ?>">
                </div>

                <div class="col-sm-4">
                  <label for="nombreCliente">Usuario para la aplicacion</label>
                  <input type="text" class="form-control" name="log_usu" id="log_usu" placeholder="Usuario APP" value="<?php echo @$log_usu; ?>">
                </div>
                <div class="col-sm-4">
                  <label for="nombreCliente">Contraseña</label>
                  <input type="text" class="form-control" name="pass_usu" id="pass_usu" placeholder="Clave inicial para  APP" value="<?php echo @$pass_usu; ?>">
                </div>

                <div class="col-sm-5">
                  <label>Rol</label>
                  <select class="form-control " name="rol_usu" style="width: 100%;">
                    <option>Seleccione</option>
                    <?php

                    foreach ($arrayRoles as $rol) {

                    ?>
                      <option value='<?php echo $rol['id_rol']; ?>' <?php if (@$rol_usu == $rol['id_rol']) {
                                                                      echo 'selected';
                                                                    } ?>>
                        <?php echo $rol['des_rol']; ?> <?php $rol['id_rol']; ?>
                      </option>
                    <?php } ?>
                    <!-- <option selected="selected">Alabama</option> -->

                  </select>
                </div>

                <div class="col-sm-5">
                  <label for="nombreCliente">Cargo</label>
                  <input type="text" class="form-control" name="car_usu" id="car_usu" placeholder="Cargo del Personal" value="<?php echo @$car_usu; ?>">
                </div>

                <div class="col-sm-2">
                  <label>Estado del Consultor </label>
                  <select class="form-control" name="act_usu" id="act_usu">
                    <option <?php if (@$estado == 1) {
                              echo 'selected';
                            } ?> value=1>Activo</option>
                    <option <?php if (@$estado == 0) {
                              echo 'selected';
                            } ?> value=0>Desactivado</option>
                  </select>
                </div>

                <div class="col-sm-12">
                  <label></br>*********Datos del Equipo**********</label>
                </div>

                <div class="col-sm-3">
                  <label for="nombreCliente">Modelo</label>
                  <input type="text" class="form-control" name="pcModelo" id="pcModelo" placeholder="Modelo del Equipo" value="<?php echo @$pcModelo; ?>">
                </div>

                <div class="col-sm-3">
                  <label for="nombreCliente">Serial</label>
                  <input type="text" class="form-control" name="pcSerial" id="pcSerial" placeholder="Serial" value="<?php echo @$pcSerial; ?>">
                </div>

                <div class="col-sm-3">
                  <label for="nombreCliente">MAC-LAN</label>
                  <input type="text" class="form-control" name="pcMacLan" id="pcMacLan" placeholder="Mac para LAN" value="<?php echo @$pcMacLan; ?>">
                </div>

                <div class="col-sm-3">
                  <label for="nombreCliente">MAC-WAN</label>
                  <input type="text" class="form-control" name="pcMacWam" id="pcMacWam" placeholder="Mac para WAN" value="<?php echo @$pcMacWam; ?>">
                </div>

                <div class="col-sm-12">
                  <label></br>*********Datos del Vehiculo**********</label>
                </div>

                <div class="col-sm-3">
                  <label for="nombreCliente">Modelo</label>
                  <select class="form-control select2" name="vehiculoTipo" style="width: 100%;">
                    <option>Seleccione</option>
                    <option value="Camioneta" <?php if (@$vehiculoTipo == 'Camioneta') {
                                                echo 'selected';
                                              } ?>>Camioneta</option>
                    <option value="Rustico" <?php if (@$vehiculoTipo == 'Rustico') {
                                              echo 'selected';
                                            } ?>>Rustico</option>
                    <option value="Sedan" <?php if (@$vehiculoTipo == 'Sedan') {
                                            echo 'selected';
                                          } ?>>Sedan</option>
                  </select>
                </div>

                <div class="col-sm-3">
                  <label for="nombreCliente">Modelo</label>
                  <input type="text" class="form-control" name="vehiculoModelo" id="vehiculoModelo" placeholder="Modelo" value="<?php echo @$vehiculoModelo; ?>">
                </div>

                <div class="col-sm-3">
                  <label for="nombreCliente">Marca</label>
                  <input type="text" class="form-control" name="vehiculoMarca" id="vehiculoMarca" placeholder="Marca" value="<?php echo @$vehiculoMarca; ?>">
                </div>

                <div class="col-sm-3">
                  <label for="nombreCliente">Color</label>
                  <input type="text" class="form-control" name="vehiculoColor" id="vehiculoColor" placeholder="Color del Vehiculo" value="<?php echo @$vehiculoColor; ?>">
                </div>

                <div class="col-sm-3">
                  <label for="nombreCliente">Placa</label>
                  <input type="text" class="form-control" name="vehiculoPlaca" id="vehiculoPlaca" placeholder="Placa" value="<?php echo @$vehiculoPlaca; ?>">
                </div>

                <div class="col-sm-3">
                  <label for="nombreCliente">Año</label>
                  <input type="text" class="form-control" name="vehiculoAnio" id="vehiculoAnio" placeholder="Año del Vehiculo" value="<?php echo @$vehiculoAnio; ?>">
                </div>

                <div class="col-sm-3">
                  <label for="nombreCliente">Aseguradora</label>
                  <input type="text" class="form-control" name="vehiculoAseguradora" id="vehiculoAseguradora" placeholder="Aseguradora del Vehiculo" value="<?php echo @$vehiculoAseguradora; ?>">
                </div>

                <div class="col-sm-3">
                  <label for="nombreCliente">Contrato No</label>
                  <input type="text" class="form-control" name="vehiculoContrato" id="vehiculoContrato" placeholder="Numero de contrato" value="<?php echo @$vehiculoContrato; ?>">
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
