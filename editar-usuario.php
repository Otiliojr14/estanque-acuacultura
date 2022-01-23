<?php
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';
  include_once 'templates/header.php';
  $id = $_GET['id'];

  if (!filter_var($id, FILTER_VALIDATE_INT)) {
    die("¡Error!");
  }
  include_once 'templates/barra.php';
  include_once 'templates/navegacion.php';
?>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar usuario
        <small>Añada nuevos usuarios para administrar los registros</small>
      </h1>
    </section>

      <div class="row">
        <div class="col-md-6">
            <section class="content">
                <!-- Default box -->
                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Crear usuario</h3>
                  </div>
                  <div class="box-body">
                    <?php 
                      $sql = "SELECT * FROM `usuarios` WHERE `id_usuario` = $id ";
                      $resultado = $conn->query($sql);
                      $usuario = $resultado->fetch_assoc();
                     ?>
                      <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-usuario.php">
                        <div class="box-body">
                          <div class="form-group">
                            <label for="usuario">Usuario: </label>
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario para iniciar sesión" value="<?php echo $usuario['usuario']; ?>" required>
                          </div>
                          <div class="form-group">
                            <label for="nombre">Nombre: </label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu Nombre" value="<?php echo $usuario['nombre']; ?>"required>
                          </div>
                          <div class="form-group">
                            <label for="apellido">Apellido: </label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Tu Apellido" value="<?php echo $usuario['apellido']; ?>" required>
                          </div>
                          <div class="form-group">
                            <label for="password">Password: </label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password para iniciar sesión" required>
                          </div>
                          <div class="form-group">
                            <label for="password">Repertir password: </label>
                            <input type="password" class="form-control" id="repetir_password" name="repetir_password" placeholder="Repetir password para continuar" required>
                            <span id="resultado_password" class="help-block"></span>
                          </div>
                          <div class="form-group">
                            <label for="privilegio_usuario">Privilegio: </label>
                            <select name="privilegio_usuario" class="form-control">
                              <?php if ($usuario['privilegio'] == 0) { ?>
                                <option value="<?php $usuario['privilegio'];?>" selected>Administrativo</option>
                                <option value="1">Estandar</option>
                              <?php } else {?>
                                <option value="<?php $usuario['privilegio'];?>" selected>Estandar</option>
                                <option value="0">Administrativo</option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                          <input type="hidden" name="registro" value="actualizar">
                          <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                          <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                      </form>
                  </div>
                  <!-- /.box-body -->
                </div>
              <!-- /.box -->
            </section>

        </div>

      </div>

    <!-- Main content -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include_once 'templates/footer.php'; ?>

