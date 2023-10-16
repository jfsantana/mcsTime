<?php
if (!isset($_SESSION)) {
  session_start();
}
if (!isset($_SESSION['id_user'])) {
  header("Location:  http://" . $_SERVER['HTTP_HOST']);
  exit();
}
require_once '../funciones/wsdl/clases/consumoApi.class.php';

//Listado Clientes
$id_usu = @$_POST["id_usu"];
$token = $_SESSION['token'];
$URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/empleados?id_usu=$id_usu";
$rs         = API::GET($URL, $token);
$arrayConsultores  = API::JSON_TO_ARRAY($rs);


//print("<pre>".print_r(($URL) ,true)."</pre>"); //die;

?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Consultores</h1>
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
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?php echo count($arrayConsultores); ?></h3>

            <p>Num Consultores</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" onclick="enviarParametrosGetsionCreate('admin/usuarioCreate.php','1')" class="small-box-footer">Crear Consultores <i class="fas fa-arrow-circle-right"></i></a>
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
            <h3 class="card-title">Listado de Usuarios Consultores</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Rol</th>
                  <th>Nombre Y apellido</th>
                  <th>User</th>
                  <th>Activo</th>
                  <th>Telefono</th>
                  <th>Cedula</th>
                  <th>Email</th>
                  <th>Cargo</th>

                  <th>Foraneo</th>
                  <th>Consultora</th>

                  <th>Ubicacion Residencia</th>
                  <th>Ident.</th>
                  <th>Frente Asignado</th>
                  <th>Carnetizacion</th>

                  <th>PC-Modelo</th>
                  <th>PC-Serial</th>
                  <th>PC-Mac-LAN</th>
                  <th>PC-MAC-WAM</th>

                  <th>Car-Tipo</th>
                  <th>Car-Modelo</th>
                  <th>Car-Marca</th>
                  <th>Car-Color</th>
                  <th>Car-Placa</th>
                  <th>Car-Año</th>
                  <th>Car-Aseguradora</th>
                  <th>Car-Ase. Contrat.</th>

                </tr>
              </thead>
              <tbody>
                <?php foreach ($arrayConsultores as $consultores) {?>
                  <tr>
                    <td><a href="#" onclick="enviarParametrosGetsionUpdate('admin/usuarioCreate.php',2,'<?php echo $consultores['id_usu']; ?>')" class="nav-link "><?php echo $consultores['id_usu'];?></a></td>
                    <td><?php echo $consultores['des_rol'];?></td>
                    <td><?php echo $consultores['ape_usu'].', '.$consultores['nom_usu'];?></td>
                    <td><?php echo $consultores['log_usu'];?></td>
                    <td><?php echo $consultores['act_usu'];?></td>
                    <td><?php echo $consultores['tel_usu'];?></td>
                    <td><?php echo $consultores['ced_usu'];?></td>
                    <td><?php echo $consultores['cor_usu'];?></td>
                    <td><?php echo $consultores['car_usu'];?></td>

                    <td><?php echo $consultores['foraneo'];?></td>
                    <td><?php echo $consultores['nombreEmpresaConsultora'];?></td>

                    <td><?php echo $consultores['ubicacionResidencia'];?></td>
                    <td><?php echo $consultores['ident'];?></td>
                    <td><?php echo $consultores['frenteAsignado'];?></td>
                    <td><?php echo $consultores['carnetizacion'];?></td>
                    <td><?php echo $consultores['pcModelo'];?></td>
                    <td><?php echo $consultores['pcSerial'];?></td>
                    <td><?php echo $consultores['pcMacLan'];?></td>
                    <td><?php echo $consultores['pcMacWam'];?></td>

                    <td><?php echo $consultores['vehiculoTipo'];?></td>
                    <td><?php echo $consultores['vehiculoModelo'];?></td>
                    <td><?php echo $consultores['vehiculoMarca'];?></td>
                    <td><?php echo $consultores['vehiculoColor'];?></td>
                    <td><?php echo $consultores['vehiculoPlaca'];?></td>
                    <td><?php echo $consultores['vehiculoAnio'];?></td>
                    <td><?php echo $consultores['vehiculoAseguradora'];?></td>
                    <td><?php echo $consultores['vehiculoContrato'];?></td>

                  </tr>
                <?php } ?>

              </tbody>
              <tfoot>
                <tr>
                <th>Id</th>
                  <th>Rol</th>
                  <th>Nombre Y apellido</th>
                  <th>User</th>
                  <th>Activo</th>
                  <th>Telefono</th>
                  <th>Cedula</th>
                  <th>Email</th>
                  <th>Cargo</th>

                  <th>Foraneo</th>
                  <th>Consultora</th>

                  <th>Ubicacion Residencia</th>
                  <th>Ident.</th>
                  <th>Frente Asignado</th>
                  <th>Carnetizacion</th>

                  <th>PC-Modelo</th>
                  <th>PC-Serial</th>
                  <th>PC-Mac-LAN</th>
                  <th>PC-MAC-WAM</th>

                  <th>Car-Tipo</th>
                  <th>Car-Modelo</th>
                  <th>Car-Marca</th>
                  <th>Car-Color</th>
                  <th>Car-Placa</th>
                  <th>Car-Año</th>
                  <th>Car-Aseguradora</th>
                  <th>Car-Ase. Contrat.</th>
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
