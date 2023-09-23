<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</head>
<?php

if ($bandera == 1) { ?>


  <div class="container-fluig">
    <div class="row m-2 mt-2 border border-success">
      <div class="row m-2 mt-0  ">
        <div id="hallazgo" name="incidencia_hallazgoID" class="col-lg-12 col-md-12 col-sm-12 ">
          <label class="form-label mt-2">
            <h4>Nuevo Hallazgo</h4>
          </label>
          <select class="form-select" aria-label="Default select example">
            <option selected>Seleccione un Hallazgo</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
      </div>
      <div class="row m-2 mt-0 ">
        <div class=" col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <label class="form-label mt-0">
            <h4>Descripcion</h4>
          </label>
          <input type="text" id="incidencia_hallazgo_descripcion" name="incidencia_hallazgo_descripcion" class="form-control" aria-describedby="passwordHelpBlock">
        </div>
      </div>
      <div>
        <button type="button" class="btn btn-danger  rounded-pill" onclick="eliminarFila('tabla')">-</button>
        <button type="button" class="btn btn-primary  rounded-pill" onclick="agregarFila('tabla')"> +</button>
      </div>
      <div class="row m-2 mt-0 ">
        <table id="tabla" class="table">
          <tbody id="Recomendacion " class="border-bottom border-success">
            <tr class="bg-success bg-gradient" style="color:white;width: 100%">
              <td colspan="2">
                <h5>Recomendacion</h5>
              </td>
              <td colspan="2">
                <h5>Responsable</h5>
              </td>
            </tr>
            <tr>
              <td colspan="2"><input type="text" style="width:98%;margin-top:1%; border-radius: 4px;border: 1px solid #ccc;" placeholder="Escriba la Recomendacion" id="incidencia_hallazgo['hallazgo']" name="incidencia_hallazgo['hallazgo']"></td>
              <td colspan="2"><input type="text" style="width:98%;margin-top:1%; border-radius: 4px;border: 1px solid #ccc;" placeholder="Escriba El Responsable" id="incidencia_hallazgo['hallazgo']" name="incidencia_hallazgo['hallazgo']"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <button type="button" class="btn btn-danger  rounded-pill" onclick="eliminartabla('tabla')"> -</button>
    <button type="button" class="btn btn-primary  rounded-pill" onclick="agregartabla('tabla')"> +</button>
  </div>
<br>
<br>

<div class="row m-2 mt-0 ">
    <div >
      <div class="card-header bg bg-success" style="color: #fff;font-size: 0.8em;background-color: #76975e8c;padding: 0"><b>&nbsp;ADJUNTAR SOPORTES</b></div>
      
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-0" class="text-center" style="padding-top:0.5%; padding-bottom: 1%">
          <!--/******************************
                  * MODIFICADO POR JESUS SANTANA 24/08/2022
                  * VALIDACION PARA QUE EL INPUT SEA UN ARREGLO QUE RECIBA MULTIPLES ARCHIVOS ADJUNTOS 
                  * VALIDADO QUE SOLO SEAN DE ESTE TIPO .jpg, .jpeg, .png, .pdf
                  * ****************************/-->
          <input name="archivo[]" id="archivo" type="file" class="form-control" style="font-size:0.8em; margin-top:1%; margin-bottom: 1.5%" accept=".jpg, .jpeg, .png, .pdf" multiple />
        </div>
      
    </div>
  </div>

<?php } // carga para el inser
else { // carga del consulta
    ?>
  <!-- /.row -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Hallazgos Registrados</h3>
        </div>
        <!-- ./card-header -->
        <div class="card-body p-0">
          <table class="table table-hover">
            <tbody>
              <?php
                  foreach ($arrayInspeccion['inspeccion']['hallazgos'] as $hallazgos) { ?>
                <tr data-widget="expandable-table" aria-expanded="false">
                  <td>
                    <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                    <textarea type="text" style="width: 100%;" id="cantidad_recomendacion" name="cantidad_recomendacion[]" class="cantidad_recomendacion" readonly> <?php echo $hallazgos['descripcion']; ?> </textarea>
                  </td>
                </tr>
                <tr class="expandable-body">
                  <td>
                    <div class="p-0">
                      <table class="table table-hover">
                        <tbody>
                          <tr data-widget="expandable-table" aria-expanded="false">
                            <td>
                              <div style="background: #549127; color:#fff"> RECOMENDACION</div>
                            </td>
                            <td>
                              <div style="background: #549127; color:#fff"> RESPONSABLE</div>
                            </td>
                          </tr>
                          <?php
                              foreach ($hallazgos['recomendaciones'] as $recomendaciones) { ?>
                            <tr data-widget="expandable-table" aria-expanded="false">
                              <td>
                                <textarea type="text" style="width: 100%;" id="incidencia_recomendacion" name="incidencia_recomendacion[]" readonly> <?php echo $recomendaciones['descripcion']; ?> </textarea>
                              </td>
                              <td>
                                <textarea type="text" style="width: 100%;" id="incidencia_responsable" name="incidencia_responsable[]" readonly>  <?php echo $recomendaciones['responsable']; ?> </textarea>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </td>
                </tr>
              <?php } ?>






            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

<?php } ?>

<!-- jQuery -->
<script src="./funciones/funcionesGenerales/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./funciones/funcionesGenerales/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./funciones/funcionesGenerales/dist/js/adminlte.min.js"></script>