  <!-- /.modal -->
  <div class="modal fade" id="modal-default<?php echo $ResumenConsultore['idRegistro']; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Default Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <?php
          $URL        = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/time?id=" . $ResumenConsultore['id_usu'] . "&corte=" . $_SESSION['corte'];
          $rs         = API::GET($URL, $token);
          $arrayTiempo  = API::JSON_TO_ARRAY($rs);
          ?>
          <?php
                $total = 0;
                foreach ($arrayTiempo as $TiempoCarga) { //f
                  switch ($TiempoCarga['estadoAP1']) {
                    case 1:
                      $estado="Nuevas";
                      $background='';
                      break;
                    case 2:
                      $estado="Rechazadas";
                      $background='style="background-color: red;"';
                      break;
                    case 3:
                      $estado="Aprobadas";
                      $background='style="background-color: green;"';
                      break;
                    default:
                      $estado="Nuevas";
                      $background='';
                      break;
                    }
                ?>
                    <p><?php echo $TiempoCarga['ape_usu'] . ", " . $TiempoCarga['nom_usu']; ?></p>
                    <p><?php echo $TiempoCarga['nombreEmpresaConsultora']; ?></p>
                    <p><?php echo $TiempoCarga['NombreCliente']; ?></p>
                    <p><?php echo $TiempoCarga['nameProyecto']; ?></p>
                    <p><?php echo $TiempoCarga['descripcionTipoActividad']; ?></p>
                    <p><?php echo $TiempoCarga['descripcion']; ?></p>
                    <p><?php echo $TiempoCarga['fechaActividad']; ?></p>
                    <p ><?php echo $TiempoCarga['hora'];
                        $total = $total + $TiempoCarga['hora']; ?></p>
                    <p <?php  echo  $background; ?>><?php  echo  $estado; ?></p>

                <?php } ?>



        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
