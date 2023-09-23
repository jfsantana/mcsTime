
<!DOCTYPE html>
<html lang="en">
<head>

  <?php include_once ('add/head_Aux_.php');?>

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo  -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../index.html" class="h1"><?php echo $nombreSoftware; ?></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Inicie sesión</p>


      <form name="login" id="login" action="funciones/funcionesGenerales/XM_validarusu.php" method="POST">
        <div class="input-group mb-3">
          <input name="user" type="text" class="form-control" placeholder="Email@gaga.com" value="jsantana">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Password" value="123456">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->


      <p class="mb-0">

      <div class="form-group text-center" style="font-size:100%; margin-bottom: 5px; height: 10px;">
                                <b> <?php echo @$_GET['mensaje']; ?></b>
<br>

        <a href="register.html" class="text-center">Register a new membership</a>
        </div>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->


<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
