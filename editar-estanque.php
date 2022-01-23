<?php
  $id = $_GET['id'];

  if (!filter_var($id, FILTER_VALIDATE_INT)) {
    die("¡Error!");
  }
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
        Editar estanques
        <small></small>
      </h1>
    </section>

      <div class="row">
        <div class="col-md-6">
            <section class="content">
                <!-- Default box -->
                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Editar estanque</h3>
                  </div>
                  <div class="box-body">
                    <?php 
                      $sql = "SELECT * FROM `estanque` WHERE `id_estanque` = $id ";
                      $resultado = $conn->query($sql);
                      $estanque = $resultado->fetch_assoc();
                     ?>
                      <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-estanque.php">
                        <div class="box-body">
                          <div class="form-group">
                            <label for="nombre_estanque">Nombre del estanque: </label>
                            <input type="text" class="form-control" id="nombre_estanque" name="nombre_estanque" placeholder="Nombre del estanque" value="<?php echo $estanque['nombre']; ?>" required>
                          </div>
                          <div class="form-group">
                            <label for="bomba">Bomba: </label>
                            <select name="bomba" id="bomba" class="form-control">
                              <?php 
                                try {
                                  $bomba_actual = $estanque['id_bomba'];
                                  $sql = "SELECT * FROM bomba_eventos ";
                                  $resultado = $conn->query($sql);
                                  while ($bomba = $resultado->fetch_assoc()) {
                                    if ($bomba['id_bomba'] == $bomba_actual) { ?>
                                      <option value="<?php echo $bomba['id_bomba']; ?>" selected>
                                        <?php echo $bomba['nombre']; ?>
                                      </option>
                                    <?php } else { ?>
                                      <option value="<?php echo $bomba['id_bomba']; ?>">
                                        <?php echo $bomba['nombre']; ?>
                                      </option>
                                    <?php } 
                                 }
                                } catch (Exception $e) {
                                  echo "Error: " . $e->getMessage();
                                }
                               ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="tipo_estanque">Tipo de estanque: </label>
                            <select name="tipo_estanque" id="tipo_estanque" class="form-control">
                              <?php if ($estanque['tipo_estanque'] == 'rectangular') { ?>
                                <option value="circular">Circular</option>
                                <option value="rectangular" selected>Rectangular</option>
                              <?php } else {?>
                                <option value="circular" selected>Circular</option>
                                <option value="rectangular">Rectangular</option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="profundidad">Profundidad (cm): </label>
                            <input type="number" class="form-control" id="profundidad" name="profundidad" step="any" min="1" max="10000" value="<?php echo $estanque['profundidad']; ?>" required>
                          </div>
                          <div class="form-group">
                            <label for="l_may_r" id="label_ch">Longitud mayor (cm): </label>
                            <input type="number" class="form-control" id="l_may_r" name="l_may_r" step="any" min="1" max="10000" value="<?php echo $estanque['l_mayor_r']; ?>" required>
                            <span id="resultado_volumen_cir" class="help-block"></span>
                          </div>
                          <div class="form-group" id="div_lmen">
                            <label for="l_men">Longitud menor (cm): </label>
                            <input type="number" class="form-control" id="l_men" name="l_men" step="any" min="1" max="10000" value="<?php echo $estanque['l_menor']; ?>" required>
                            <span id="resultado_volumen" class="help-block"></span>
                          </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                          <input type="hidden" name="registro" value="actualizar">
                          <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
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