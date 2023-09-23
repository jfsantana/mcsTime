<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once '../funciones/wsdl/clases/consumoApi.class.php';

$_SESSION['id_user'];
$_SESSION['corte'];

// print("<pre>".print_r(($arrayClientes) ,true)."</pre>"); //die;
//$_POST['corte']='082023';
//var_dump($_POST);

if (!isset($_POST['id']))
  $corteAux = $_SESSION['corte'];
else
  $corteAux = $_POST['id'];





  $accion = "Editar";
  //Listado Clientes
  $id = @$_POST["id"];
  $token = $_SESSION['token'];
  $URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/time?idUser=".$_SESSION['id_user']."&corteFactura=$corteAux";
  $rs         = API::GET($URL, $token);
  $arrayFactura  = API::JSON_TO_ARRAY($rs);
  //var_dump($arrayFactura);
  //var_dump($URL);

  $idFactura = @$arrayFactura[0]['idFactura'];
  $idEmpleado = @$arrayFactura[0]['idEmpleado'];
  $corte = @$arrayFactura[0]['corte'];
  $urlFactura = @$arrayFactura[0]['urlFactura'];
  $MontoFactura = @$arrayFactura[0]['MontoFactura'];


$meses = array(
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
$mes_actual = date('m');
?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Cargar Factura</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<form action="../funciones/funcionesGenerales/XM_clientes.model.php" method="post" name="Reporte24H" id="Reporte24H">
  <input type="hidden" name="mod" value="<?php echo @$_POST['mod'] ?>">
  <input type="hidden" name="idFactura" value="<?php echo @$_POST['id'] ?>">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-12 col-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><?php echo $accion; ?> Factura</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form>
            <div class="card-body">
              <!-- select -->
              <div class="form-group">
                <label>Corte</label>
                <select class="form-control" name="Corte" id="miSelect" onchange="enviarParametrosGetsionUpdate('time/facturaCreate.php',2,this.value)">
                  <?php for ($i = 1; $i <= $mes_actual; $i++) {
                    $corteAux2 = $meses[$i] . @date('Y');
                  ?>
                    <option <?php if (@$corteAux2 ==  $corteAux) {
                              echo 'selected';
                            } ?> value=<?php echo $corteAux2; ?>><?php echo $corteAux2; ?></option>

                  <?php } ?>


                </select>
              </div>
              <div class="form-group">
                <label for="nombreCliente">Monto</label>
                <input type="text" class="form-control" name="MontoFactura" id="MontoFactura" placeholder="MontoFactura" value="<?php echo @$MontoFactura; ?>">
              </div>
              <div class="form-group">
                <label for="nombreCliente">Link </label>
                <input type="text" class="form-control" name="urlFactura" id="urlFactura" placeholder="Link del archivo compartido en el Drive" value="<?php echo @$urlFactura; ?>">
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

<script>

  function deshabilitarBotones() {

    var select = document.getElementById("miSelect");
    var botones = document.getElementsByClassName("btn btn-primary");

    if (select.value != "<?php echo $_SESSION['corte']; ?>") {
      for (var i = 0; i < botones.length; i++) {

        botones[i].disabled = true;
      }
    } else {
      for (var i = 0; i < botones.length; i++) {
        botones[i].disabled = false;
      }
    }
  }
  deshabilitarBotones();
</script>
