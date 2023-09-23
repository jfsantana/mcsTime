<?php
// WS datos empleado
$token = '4c699809ad1f36ad58a3ab06163ffad1';
$URL = 'http://'.$_SERVER['HTTP_HOST']."/funciones/wsdl/empleados?token=$token";
// echo $URL;die;
$rs = API::GET($URL, $token);
$arrayPersonal = API::JSON_TO_ARRAY($rs);
$user = $arrayPersonal;
$Complejo_id = @$user[0]['com_usu'];

?>

<input type="hidden" id="header[tipo]" name="header[tipo]" aria-describedby="passwordHelpBlock" value="<?php echo $_GET['tipo_incidencia']; ?>" >

<?php if ($subsector == 3) {
    $color = 'bg-success';
} elseif ($subsector == 4) {
    $color = 'bg-primary';
} elseif ($subsector == 5) {
    $color = 'bg-danger';
}
?>
<div class="card-header <?php echo $color; ?> bg-gradient">
    <div class="row p-2 pb-0 pt-0" style="color: #ffff">
        <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-9 p-0" style="text-transform:uppercase;font-weight: bold;">
            <h3 class="card-title"><?php echo $titulo; ?></h3>
        </div>
    </div>
</div>

<div class="row m-2 mt-0" style="color: #632a00">
    <?php if (($tipo_incidencia == 1) or ($tipo_incidencia == 2)) {  ?>

        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 m-0">
            <label class="form-label mt-2">Fecha <?php echo $fecha_incidencia; ?></label>
            <?php if ($bandera == 1) {  ?>
                <input type="date" class="form-control"  name="header[fecha]" aria-describedby="passwordHelpBlock">
            <?php }
            if ($bandera == 2) {
                // echo '<pre>'.print_r($arrayInspeccion['inspeccion']['fechaEjecucionInicio'], true).'</pre>';
                // echo '<pre>'.print_r($arrayInspeccion['fechaEjecucionInicio'], true).'</pre>';die;
                ?>
                <input type="text" class="form-control"  name="header[fecha]" aria-describedby="passwordHelpBlock" value="<?php echo @$arrayInspeccion['inspeccion']['fechaEjecucionInicio']; ?>" readonly>
            <?php } ?>
        </div>

        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-3 col-xs-3 m-0">
            <input type="hidden"  name="[incidencia_tipo]" value="<?php echo $tipo_incidencia; ?>">
            <label class="form-label mt-2">Sector</label>

            <?php if ($bandera == 1) {  ?>
                <select  name="header[sector]" class="chosen-select" onchange="actualizar_sector()">
                    <option value="0">Seleccione Sector</option>
                    <option value="1">Industrial</option>
                    <option value="2">Administrativo</option>
                </select>
            <?php }
            if ($bandera == 2) {
                ?>
                <input type="text" class="form-control"  name="header[hora]" aria-describedby="passwordHelpBlock" value="<?php echo $arrayInspeccion['inspeccion']['nomSector']; ?>" readonly>

            <?php }   ?>
        </div>
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 m-0">
            <label class="form-label mt-2">Complejo</label>
            <?php if ($bandera == 1) {  ?>
                <select id="incidencia_complejo" name="header[complejo]" class="chosen-select">
                    <?php
                        foreach ($complejos as $comp) {
                            $select = '';
                            $disable = '';
                            if ($Complejo_id == $comp['id_complejo']) {
                                $select = 'selected';
                            }
                            echo '<option  value='.$comp['id_complejo']." $select > ".$comp['nombre_complejo'].'</option>';
                        }

                ?>

                </select>
            <?php }
            if ($bandera == 2) {  ?>

                <input type="text" class="form-control"  name="header['hora']" aria-describedby="passwordHelpBlock" value="<?php echo $arrayInspeccion['inspeccion']['nombre_complejo']; ?>" readonly>

            <?php }   ?>

        </div>
    <?php }
    if ($tipo_incidencia == 3) {  ?>
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3 m-0">
            <label class="form-label mt-2">Fecha <?php echo $fecha_incidencia; ?></label>
            <?php if ($bandera == 1) {  ?>
                <input type="date" class="form-control" name="header[fecha]"  aria-describedby="passwordHelpBlock">
            <?php }
            if ($bandera == 2) {  ?>
                <input type="text" class="form-control" name="header[fecha]"  aria-describedby="passwordHelpBlock" value="<?php

                $fechaIncidencia = array_reverse(explode(' ', $inspecciones[0]['fechaEjecucionInicio']));
                $fechaIncidencia2 = implode('/', array_reverse(explode('-', $fechaIncidencia[1])));

                echo $fechaIncidencia2; ?>" readonly>
            <?php } ?>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3 m-0">
            <label class="form-label mt-2">Hora Evento</label>
            <?php if ($bandera == 1) {  ?>
                <input type="time" class="form-control"  name="header[hora]" aria-describedby="passwordHelpBlock">
            <?php }
            if ($bandera == 2) {  ?>
                <input type="time" class="form-control"  name="header[hora]" aria-describedby="passwordHelpBlock" readonly>
            <?php }   ?>
        </div>

        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3 m-0">
            <input type="hidden"  name="header[tipo]" value="<?php echo $tipo_incidencia; ?>">
            <label class="form-label mt-2">Sector</label>

            <?php if ($bandera == 1) {  ?>
                <select  name="header[sector]" class="chosen-select" onchange="actualizar_sector()">
                    <option value="0">Seleccione Sector</option>
                    <option value="1">Industrial</option>
                    <option value="2">Administrativo</option>
                </select>
            <?php }
            if ($bandera == 2) {
                ?>
                <input type="text" class="form-control" " name="header['hora']" aria-describedby="passwordHelpBlock" value="<?php echo $arrayInspeccion['inspeccion']['nomSector']; ?>" readonly>

            <?php }   ?>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3 m-0">
            <label class="form-label mt-2">Complejo</label>
            <?php if ($bandera == 1) {  ?>
                <select id="incidencia_complejo" name="header[complejo]" class="chosen-select">
                    <?php
                        foreach ($complejos as $comp) {
                            $select = '';
                            $disable = '';
                            if ($Complejo_id == $comp['id_complejo']) {
                                $select = 'selected';
                            }
                            echo '<option  value='.$comp['id_complejo']." $select > ".$comp['nombre_complejo'].'</option>';
                        }

                ?>

                </select>
            <?php }
            if ($bandera == 2) {  ?>

                <input type="text" class="form-control" name="header[hora]" aria-describedby="passwordHelpBlock" value="<?php echo $arrayInspeccion['inspeccion']['nombre_complejo']; ?>" readonly>

            <?php }   ?>

        </div>
    <?php }   ?>
    <input type="hidden" id="incidencia_subsector" name="header[subsector]" value="<?php echo $subsector; ?>">
</div>
<div class="row m-2 mt-0" style="color: #632a00; ">
    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <label class="form-label mt-2">Gerencia</label>
        <?php if ($bandera == 1) {  ?>
            <select id="incidencia_gerencia" name="header[gerencia]" class="chosen-select">
                <?php
                foreach ($gerencias as $gerencia) {
                    echo '<option  value='.$gerencia['gerencia_id']." $select > ".$gerencia['nombre'].'</option>';
                }
            ?>

            </select>
        <?php }
        if ($bandera == 2) {  ?>
            <input type="text" class="form-control"  name="header['hora']" aria-describedby="passwordHelpBlock" value="<?php echo $arrayInspeccion['inspeccion']['nomGerencia']; ?>" readonly>

        <?php }   ?>

    </div>
    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <label class="form-label mt-2">Area</label>
        <?php if ($bandera == 1) {  ?>
            <select  name="header[area]" class="chosen-select" style="text-decoration:none; text-align: center; width: 100%;">
                <option value="0">Area 0</option>
                <option value="111">Area 1</option>
            </select>

        <?php }
        if ($bandera == 2) {  ?>'
            <input type="text" class="form-control"  name="header[hora]" aria-describedby="passwordHelpBlock" value="<?php echo $arrayInspeccion['inspeccion']['des_area']; ?>" readonly>
        <?php }   ?>

    </div>
    <div class="scol-xxl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <label class="form-label mt-2">Custodio</label>
        <?php if ($bandera == 1) {  ?>
            <select name="header[custodio]" class="chosen-select" style="text-decoration:none; text-align: center; width: 100%;">
                <option value="0">Custodio 0</option>
                <option value="99">Custodio 1</option>
            </select>
        <?php }
        if ($bandera == 2) {  ?>
            <input type="text" class="form-control" name="header['hora']" aria-describedby="passwordHelpBlock" value="<?php echo $arrayInspeccion['inspeccion']['custorioID']; ?>" readonly>
        <?php }   ?>
    </div>

</div>
<?php if ($subsector == 4) { ?>
    <div class="row m-2 mt-0" style="color: #632a00; ">
       
        <div class="scol-xxl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <label class="form-label mt-2">Equipo</label>
            <?php if ($bandera == 1) {  ?>
                <select  name="header[custodio]" class="chosen-select" style="text-decoration:none; text-align: center; width: 100%;">
                    <option value="0">Equipo 0</option>
                    <option value="99">Equipo 1</option>
                </select>
            <?php }
            if ($bandera == 2) {  ?>
                <input type="text" class="form-control"  name="header[hora]" aria-describedby="passwordHelpBlock" value="<?php echo $arrayInspeccion['inspeccion']['custorioID']; ?>" readonly>
            <?php }   ?>
        </div>

    </div>
<?php } ?>
<div class="row m-2 mt-0" style="color: #632a00">
    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <label class="form-label mt-2">Ubicación Física</label>

        <?php if ($bandera == 1) {  ?>
            <input type="text" name="header[ubicacion]" class="form-control" aria-describedby="passwordHelpBlock">
        <?php }
        if ($bandera == 2) {  ?>
            <input type="text" class="form-control"  name="header[hora]" aria-describedby="passwordHelpBlock" value="<?php echo $arrayInspeccion['inspeccion']['ubicacion']; ?>" readonly>
        <?php }   ?>


    </div>
</div>
</div>