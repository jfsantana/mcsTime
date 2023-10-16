<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <?php if ($_SESSION['id_rol'] < 20) { ?>
      <li class="nav-item menu-close">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Setting
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" onclick="enviarParametros('admin/clienteList.php')" class="nav-link ">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p>Cliente</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" onclick="enviarParametros('admin/empresaConsultoraList.php')" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p>Empresa Consultora</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" onclick="enviarParametros('admin/proyectoList.php')" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p>Proyecto</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" onclick="enviarParametros('admin/usuarioList.php')" class="nav-link ">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p>Consultores</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../manual/Documentacion del Sisterma de Tiempo de MCS.docx"  class="nav-link ">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p>Manual de Usuario</p>
            </a>
          </li>
        </ul>
      </li>
    <?php } ?>
    <?php if ($_SESSION['id_rol'] != 30) { // solo lo ve el rol  aprobacion  y administardor
    ?>
      <li class="nav-item">
        <a href="#" onclick="enviarParametros('time/cargaTimeResumenList.php')" class="nav-link">
          <i class="nav-icon far fa-calendar-alt  text-success"></i>
          <p>
            Registro de Tiempo
          </p>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a href="#" onclick="enviarParametrosGetsionUpdate('admin/usuarioChangePass.php',2,< ?php $_SESSION['id_user'];?>) " class="nav-link">
          <i class="nav-icon far fa-edit  text-danger  "></i>
          <p>
          usuarioChangePass
          </p>
        </a>
      </li> -->

    <?php } ?>
    <?php if ($_SESSION['id_rol'] < 30) { // solo lo ve el rol  aprobacion  y administardor
    ?>
      <li class="nav-item">
        <a href="#" onclick="enviarParametros('time/cargaTimeResumenAprobList.php')" class="nav-link">
          <i class="nav-icon fas fa-edit text-warning"></i>
          <p>
            Aprobacion
          </p>
        </a>
      </li>
    <?php } ?>

    <?php if ($_SESSION['id_rol'] < 40) { //elñ consultoro no ve nada
    ?>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy  text-info"></i>
          <p>
            Consultas
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right">4</span>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" onclick="enviarParametros('report/porConsultor.php')" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Por Consultor</p>
            </a>
          </li>
          <li class="nav-item">
          <a href="#" onclick="enviarParametros('report/fiProyectoadoMensual27.php')" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>FI - Proyectado Mensual</p>
            </a>
          </li>
          <li class="nav-item">
          <a href="#" onclick="enviarParametros('report/fiRealMensual.php')" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>FI - Real Mensual</p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="pages/layout/fixed-sidebar.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Por Corte</p>
            </a>
          </li> -->
        </ul>
      </li>
    <?php } ?>
    <li class="nav-item">
      <a href="../funciones/funcionesGenerales/XM_cerrarsesion.php" class="nav-link">
        <i class="nav-icon far fa-close"></i>
        <p>
          Salir
        </p>
      </a>
    </li>
  </ul>
</nav>
