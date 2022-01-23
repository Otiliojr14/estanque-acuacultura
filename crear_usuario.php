<?php
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';
  include_once 'templates/header.php';
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
        Crear usuario
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
                      <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-usuario.php">
                        <div class="box-body">
                          <div class="form-group">
                            <label for="usuario">Usuario: </label>
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario para iniciar sesión" autocomplete="off" required>
                          </div>
                          <div class="form-group">
                            <label for="nombre">Nombre: </label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu Nombre" autocomplete="off" required>
                          </div>
                          <div class="form-group">
                            <label for="apellido">Apellido: </label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Tu Apellido" autocomplete="off"required>
                          </div>
                          <div class="form-group">
                            <label for="password">Password: </label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password para iniciar sesión" autocomplete="off" required>
                          </div>
                          <div class="form-group">
                            <label for="password">Repertir password: </label>
                            <input type="password" class="form-control" id="repetir_password" name="repetir_password" placeholder="Repetir password para continuar" required>
                            <span id="resultado_password" autocomplete="off" class="help-block"></span>
                          </div>
                          <div class="form-group">
                            <label for="privilegio_usuario">Privilegio: </label>
                            <select name="privilegio_usuario" class="form-control">
                              <option value="0">Administrativo</option>
                              <option value="1" selected="">Estándar</option>
                            </select>
                          </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                          <input type="hidden" name="registro" value="nuevo">
                          <button type="submit" class="btn btn-primary">Agregar</button>
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

