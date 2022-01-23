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
        Añadir pez
        <small>Agregue nuevas especies peces que va a tener el estanque</small>
      </h1>
    </section>

      <div class="row">
        <div class="col-md-6">
            <section class="content">
                <!-- Default box -->
                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Añadir pez</h3>
                  </div>
                  <div class="box-body">
                      <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-pez.php">
                        <div class="box-body">
                          <div class="form-group">
                            <label for="nombre_pez">Nombre del pez: </label>
                            <input type="text" class="form-control" id="nombre_pez" name="nombre_pez" placeholder="Nombre del pez" autocomplete="off" required>
                          </div>
                          <div class="form-group">
                            <label for="descripcion">Descripción: </label>
                            <textarea class="form-control" rows="8" id="descripcion" name="descripcion" placeholder="Descripción" required=""></textarea>
                          </div>
                          <div class="form-group">
                            <label for="t_max">Temperatura máxima: </label>
                            <input type="number" class="form-control" id="t_max" name="t_max" step="any" min="1" max="50" autocomplete="off" required>
                          </div>
                          <div class="form-group">
                            <label for="t_min">Temperatura mínima: </label>
                            <input type="number" class="form-control" id="t_min" name="t_min" step="any" min="1" max="50" required>
                          </div>
                          <div class="form-group">
                            <label for="o_max">Oxigeno disuelto máximo: </label>
                            <input type="number" class="form-control" id="o_max" name="o_max" step="any" min="1" max="50" autocomplete="off" required>
                          </div>
                          <div class="form-group">
                            <label for="o_min">Oxigeno disuelto mínimo: </label>
                            <input type="number" class="form-control" id="o_min" name="o_min" step="any" min="1" max="50" autocomplete="off" required>
                          </div>
                          <div class="form-group">
                            <label for="ph_max">pH máximo: </label>
                            <input type="number" class="form-control" id="ph_max" name="ph_max" step="any" min="1" max="50" autocomplete="off" required>
                          </div>
                          <div class="form-group">
                            <label for="ph_min">pH mínimo: </label>
                            <input type="number" class="form-control" id="ph_min" name="ph_min" step="any" min="1" max="50" autocomplete="off" required>
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