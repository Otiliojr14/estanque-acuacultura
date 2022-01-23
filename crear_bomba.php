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
        Añadir bomba
        <small>Agregue bombas para estabilizar el oxigeno del agua.</small>
      </h1>
    </section>

      <div class="row">
        <div class="col-md-6">
            <section class="content">
                <!-- Default box -->
                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Agregar bomba</h3>
                  </div>
                  <div class="box-body">
                      <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-bomba.php">
                        <div class="box-body">
                          <div class="form-group">
                            <label for="nombre_bomba">Nombre de la bomba: </label>
                            <input type="text" class="form-control" id="nombre_bomba" name="nombre_bomba" placeholder="Nombre de la bomba" autocomplete="off" required>
                          </div>
                          <div class="form-group">
                            <label for="estado_bomba">Estado: </label>
                            <select name="estado_bomba" class="form-control">
                              <option value="0" selected="">Inactivo</option>
                              <option value="1">Activo</option>
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
