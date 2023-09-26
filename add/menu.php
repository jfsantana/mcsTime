
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <?php if ($_SESSION['id_rol'] < 30) { ?>
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
        </ul>
      </li>
    <?php } ?>
    <li class="nav-item">
      <a href="#" onclick="enviarParametros('time/cargaTimeResumenList.php')" class="nav-link">
        <i class="nav-icon far fa-calendar-alt  text-success"></i>
        <p>
          Registro de Tiempo
        </p>
      </a>
    </li>
    <?php if ($_SESSION['id_rol'] < 30) { // solo lo ve el rol  aprobacion y administardor?>
    <li class="nav-item">
      <a href="#" onclick="enviarParametros('time/cargaTimeResumenAprobList.php')" class="nav-link">
        <i class="nav-icon fas fa-edit text-warning"></i>
        <p>
          Aprobacion
        </p>
      </a>
    </li>
    <?php } ?>

    <?php if ($_SESSION['id_rol'] < 40) { //elñ consultoro no ve nada ?>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy  text-info"></i>
        <p>
          Consultas
          <i class="fas fa-angle-left right"></i>
          <span class="badge badge-info right">6</span>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="#" onclick="enviarParametros('eeport/report1.php')" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>TRepo1</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Top Navigation + Sidebar</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/layout/boxed.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Boxed</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/layout/fixed-sidebar.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Fixed Sidebar</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Fixed Sidebar <small>+ Custom Area</small></p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/layout/fixed-topnav.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Fixed Navbar</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/layout/fixed-footer.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Fixed Footer</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Collapsed Sidebar</p>
          </a>
        </li>
      </ul>
    </li>
    <?php } ?>
  </ul>
</nav>
