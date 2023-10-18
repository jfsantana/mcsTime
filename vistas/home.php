<?php
if (!isset($_SESSION)) {
      session_start();
  }
  if (!isset($_SESSION['id_user'])) {
    header("Location:../funciones/funcionesGenerales/XM_cerrarsesion.model.php");
    exit();
}



  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once('../add/head.php'); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <?php include_once('../add/topMenuCentral.php'); ?>

    <!-- Mensajeria de la plantilla -->
    <?php include_once('../add/topMesage.php'); ?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php include_once('../add/logo.php'); ?>

    <!-- MENU -->
    <div class="sidebar">


      <!-- Sidebar user panel (optional) -->
      <?php include_once('../add/user.php'); ?>

      <!-- Sidebar Menu -->
      <?php include_once('../add/menu.php'); ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.MENU -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php

    if(!isset($_POST['page'])){
      $url="time/cargaTimeResumenList.php"; //"demo.php";
    }else{
      $url=$_POST['page'];
    }

    ?>
    <?php
    //var_dump($url);
    include_once($url); ?>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
      <?php include_once('../add/footer.php'); ?>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include_once('../add/script.php'); ?>
</body>
</html>
