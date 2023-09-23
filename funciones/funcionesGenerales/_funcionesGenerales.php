<?php
if (!isset($_SESSION)) {
    session_start();
}
/*///////////////////////////////////////////////////////////////////////////////////////////////////////
cambia_empresa.php, se recibe el campo del id de la empresa de la tabla tbl_parametro_empresa para cambiar la variable de session

Desarrolado: Ing. Francisco Puerta
Area:        AIT ING. DE SOFTWARE
Empresa:     hpr
creado:  17-02-2020
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
if (isset($_REQUEST['accion'])) {
    if ($_REQUEST['accion'] == 'cambia_empresa') {
        $empresa = $_REQUEST['empresa'];
        $_SESSION['empresa'] = $empresa;

        echo $_SESSION['empresa'];
    }
}// function complejos($where)
/*///////////////////////////////////////////////////////////////////////////////////////////////////////
consulta_tabla.php, se envia parametrotabla y where y se consulta una tabla en la bd

Desarrolado: Ing. Francisco Puerta
Area:        AIT ING. DE SOFTWARE
Empresa:     hpr
creado:  23-02-2019
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
function consulta_tabla($tabla, $where)
{
    // llamo al archivo de coneccion

    if (file_exists('funciones/funcionesGenerales/conecciones/MariaDB/connsisgm.php')) {
        require_once 'funciones/funcionesGenerales/conecciones/MariaDB/connsisgm.php';
    } else {
        require_once '../funcionesGenerales/conecciones/MariaDB/connsisgm.php';
    }
    // llamo a la funcion de coneccion
    $conexion = dbcon();
    $sql = "select * from $tabla $where "; // echo $sql."<br/>";
    $result = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));

    return $result;
}// function complejos($where)

/*///////////////////////////////////////////////////////////////////////////////////////////////////////
construye_combo_value, genera un combo dinamico consultado por una tabla

parametros:
$nombre_combo=name y id del combo
$valor_seleccion='si el valor es = al id consultado se coloca la propiedad selectec'
$id_campo=el value del combo usando el id de la tabla
$des_campo=descripcion del combo usando el des de la tabla
$clase=la clase que se desea aplicar al combo
$tabla= tabla en la bd a consultar
$where= where sql a consultar en la bd

Desarrolado: Ing. Francisco Puerta
Area:        AIT ING. DE SOFTWARE
Empresa:     hpr
creado:  23-02-2019
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

// llamo al archivo de coneccion

function construye_combo_value($nombre_combo, $valor_seleccion, $id_campo, $des_campo, $clase, $tabla, $where, $otro)
{
    $resultado_complejo = consulta_tabla($tabla, $where);
    $parte1 = "<select class='$clase' name='$nombre_combo' id ='$nombre_combo' $otro>
            ";
    $parte2 = '';
    if (($valor_seleccion == '') || ($valor_seleccion == 'Seleccione')) {
        $parte2 = "<option selected='selected' >Select</option>";
    }
    while ($rowc = mysqli_fetch_array($resultado_complejo)) {
        $id = $rowc[$id_campo];
        $descripcion = $rowc[$des_campo];

        if ($id == $valor_seleccion) {
            $seleccion = " selected='selected' ";
        } else {
            $seleccion = ' ';
        }
        $parte3 = "<option value='$id' $seleccion>$id || $descripcion</option>";
        $parte2 = $parte2.$parte3;
    }// while($rowc = mysqli_fetch_array($resultado_complejo))

    $parte4 = '</select>';

    $combo = $parte1.$parte2.$parte4;

    return $combo;
}// construye_combo_value

/*construye_combo_simple, genera un combo dinamico consultado por una tabla

parametros:
$nombre_combo=name y id del combo
$valor_seleccion='si el valor es = al id consultado se coloca la propiedad selectec'
$id_campo=el value del combo usando el id de la tabla
$des_campo=descripcion del combo usando el des de la tabla
$clase=la clase que se desea aplicar al combo
$tabla= tabla en la bd a consultar
$where= where sql a consultar en la bd

Desarrolado: Ing. Francisco Puerta
Area:        AIT ING. DE SOFTWARE
Empresa:     hpr
creado:  23-02-2019
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

// llamo al archivo de coneccion

function construye_combo_simple($nombre_combo, $valor_seleccion, $id_campo, $des_campo, $clase, $tabla, $where, $otro)
{
    $resultado_complejo = consulta_tabla($tabla, $where);

    $parte1 = "<select class='$clase' name='$nombre_combo' id ='$nombre_combo' $otro>
            ";
    $parte2 = '';
    if (($valor_seleccion == '') || ($valor_seleccion == 'Seleccione')) {
        $parte2 = "<option selected='selected' >Select</option>";
    }
    while ($rowc = mysqli_fetch_array($resultado_complejo)) {
        $id = $rowc[$id_campo];
        $descripcion = $rowc[$des_campo];

        if ($id == $valor_seleccion) {
            $seleccion = " selected='selected' ";
        } else {
            $seleccion = ' ';
        }
        $parte3 = "<option value='$id' $seleccion>$descripcion</option>";
        $parte2 = $parte2.$parte3;
    }// while($rowc = mysqli_fetch_array($resultado_complejo))

    $parte4 = '</select>';

    $combo = $parte1.$parte2.$parte4;

    return $combo;
}// construye_combo_value

/*///////////////////////////////////////////////////////////////////////////////////////////////////////
    calculaedad() funcion que calcula la edad partiendo de una fecha pasada como parametro
    y devuelve la edad correspondiente a la fecha actual

parametros:
$fechanacimiento fecha en formato YYYY-mm-dd

Desarrolado: Ing. Freddy Chirinos
Area:        AIT ING. DE SOFTWARE
Empresa:     hpr
creado:  23-02-2019
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

function calculaedad($fechanacimiento)// yyyy-mm-dd
{
    list($ano, $mes, $dia) = explode('-', $fechanacimiento);
    $ano_diferencia = date('Y') - $ano;
    $mes_diferencia = date('m') - $mes;
    $dia_diferencia = date('d') - $dia;
    if ($dia_diferencia < 0 || $mes_diferencia < 0) {
        --$ano_diferencia;
    }

    return $ano_diferencia;
}

/*///////////////////////////////////////////////////////////////////////////////////////////////////////
update_simple(), se envia parametro tabla los set de los campos el where y el escalon se update la bd

Desarrolado: Ing. Francisco Puerta
Area:        AIT ING. DE SOFTWARE
Empresa:     hpr
creado:  23-04-2019
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
function update_simple($tabla, $datos, $where)
{
    if (file_exists('funciones/funcionesGenerales/conecciones/MariaDB/connsisgm.php')) {
        require_once 'funciones/funcionesGenerales/conecciones/MariaDB/connsisgm.php';
    } else {
        require_once '../funcionesGenerales/conecciones/MariaDB/connsisgm.php';
    }
    // llamo a la funcion de coneccion
    $conexion = dbcon();
    $sql = "UPDATE $tabla  SET $datos $where "; // echo $sql;
    $result = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));

    return $result;
}// function complejos($where)

/*///////////////////////////////////////////////////////////////////////////////////////////////////////
delete_simple(), se envia parametro tabla el where y el escalon se elimina campo en la bd
Desarrolado: Ing. Francisco Puerta
Area:        AIT ING. DE SOFTWARE
Empresa:     hpr
creado:  25-04-2019
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
function delete_simple($tabla, $where)
{
    if (file_exists('funciones/funcionesGenerales/conecciones/MariaDB/connsisgm.php')) {
        require_once 'funciones/funcionesGenerales/conecciones/MariaDB/connsisgm.php';
    } else {
        require_once '../funcionesGenerales/conecciones/MariaDB/connsisgm.php';
    }
    // llamo a la funcion de coneccion
    $conexion = dbcon();
    $sql = "DELETE FROM  $tabla   WHERE $where "; // echo $sql;
    $result = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));

    return $result;
}// function complejos($where)

/*///////////////////////////////////////////////////////////////////////////////////////////////////////
insert_simple(), se envia parametro tabla los campos los valores el where y el escalon se  inserta campo en la bd bd
Desarrolado: Ing. Francisco Puerta
Area:        AIT ING. DE SOFTWARE
Empresa:     hpr
creado:  25-04-2019
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
function insert_simple($tabla, $campos, $valores)
{
    // llamo a la funcion de coneccion
    $conexion = dbcon();
    $sql = "INSERT INTO $tabla  ($campos) VALUES ($valores)";
    echo $sql;
    $result = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));

    return $result;
}// function complejos($where)

?>
 

