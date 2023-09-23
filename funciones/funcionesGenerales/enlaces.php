<?php

switch ($pagina_usu) {
    case 'inicio':
        $color='color: #002c00';
        $enlace2='<li class="breadcrumb-item"><a href="dashboard.php?activo=inicio">inicio</a></li>';
        $enlace2=$enlace2.'<li class="breadcrumb-item">';
        if ( $bandera == 1 ) {
            $enlace2=$enlace2."Crear ".$titulo;
        } else {
            $enlace2=$enlace2."Ver ".$titulo;
        }
        
        $enlace2= $enlace2.'</li>';
        break;

    case 'admonAspirante':
        $enlace2=' <li class="breadcrumb-item"><a href="dashboard.php?activo=inicio">inicio</a></li>
        <li class="breadcrumb-item"><a href="dashboard.php?activo=admonAspirante">Administración Aspirantes</a></li>
        <li class="breadcrumb-item">Ver Registro </li>';        
        $image="public/img/sistema/aspiranteazuloscuro.png";

        break;
    case 'postuladosxlabor':
        $nom=1;
        $enlace='<li class="breadcrumb-item"><a href="dashboard.php?activo=inicio" style="color: #8c4412">inicio</a></li>
        <li class="breadcrumb-item" ><a href="dashboard.php?activo=admonObra" style="color: #8c4412">Administración Labor</a></li>
        <li class="breadcrumb-item active" ><a href="dashboard.php?activo=preseleccionados&bandera=2&labor=6&labor_codigo=';
        $enlace2=$enlace.$nom.'" style="color: #8c4412">Preseleccionados</a></li>
        <li class="breadcrumb-item" style="color: #da9434">Ver Registro </li>';
        $color='color: #8c4412';
        $image="public/img/sistema/aspiranteMarron.png";
        break;

    case 'preseleccionados':
        $enlace='<li class="breadcrumb-item"><a href="dashboard.php?activo=inicio" style="color: #8c4412">inicio</a></li>
        <li class="breadcrumb-item" ><a href="dashboard.php?activo=admonObra" style="color: #8c4412">Administración Labor</a></li>
        <li class="breadcrumb-item active" >
        <a href="dashboard.php?activo=preseleccionados&labor='.$labor.'&bandera=2&labor_codigo=';
        $enlace2=$enlace.$labor_codigo_m.'" style="color: #8c4412">Preseleccionados</a> </li>
        <li class="breadcrumb-item" style="color: #da9434">Ver Registro </li>';
       $color='color: #8c4412';
       $image="public/img/sistema/aspiranteMarron.png";

       break;

    case 'participoenObras':
        $enlace2=' <li class="breadcrumb-item"><a href="dashboard.php?activo=inicio">inicio</a></li>
        <li class="breadcrumb-item"><a href="dashboard.php?activo=admonAspirante">Administración Aspirantes</a></li>
        <li class="breadcrumb-item">Ver Registro </li>';        
        $image="public/img/sistema/aspiranteazuloscuro.png";

        break;
        
    }
?>