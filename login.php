<?php
  session_start();
  $cerrar_sesion = $_GET['cerrar_sesion'];
  if ($cerrar_sesion) {
    session_destroy();
  }
  include_once 'funciones/funciones.php';
  include_once 'templates/header.php';
?>


<body class="login">


<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box">
    <div class="division_icon">
      <img src="img/damr_icon.png" width="100">
    </div>


  <div class="login-logo">
    <a href="#">Control de registros</a>
  </div>
  
  <div class="login-box-body">



    <div class="form-title">
          <h3>Iniciar Sesión</h3>
    </div>

    <form name="login-usuario-form" id="login-usuario" method="post" action="login-admin.php">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="user" placeholder="Usuario">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Contraseña">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12 text-center">
          <input type="hidden" name="login-user" value="1">
          <button id="boton_sesion" type="submit" class="btn btn-primary btn-block btn-flat">Iniciar sesión</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>


<?php include_once 'templates/footer.php'; ?>
