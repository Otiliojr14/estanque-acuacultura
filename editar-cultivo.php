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
        Editar cultivos
        <small></small>
      </h1>
    </section>

      <div class="row">
        <div class="col-md-6">
            <section class="content">
                <!-- Default box -->
                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Editar cultivo</h3>
                  </div>
                  <div class="box-body">
                    <?php 
                      $sql = "SELECT * FROM `cultivo` WHERE `id_cultivo` = $id ";
                      $resultado = $conn->query($sql);
                      $cultivo = $resultado->fetch_assoc();
                     ?>
                      <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-cultivo.php">
                        <div class="box-body">
                          <div class="form-group">
                            <label for="nombre_cultivo">Nombre del cultivo: </label>
                            <input type="text" class="form-control" id="nombre_cultivo" name="nombre_cultivo" placeholder="Nombre del cultivo" value="<?php echo $cultivo['nombre']; ?>" required>
                          </div>
                          <div class="form-group">
                            <label for="descripcion">Descripción del cultivo: </label>
                            <textarea class="form-control" rows="8" id="descripcion" name="descripcion" placeholder="Descripción" required=""><?php echo $cultivo['des_cultivo']; ?></textarea>
                          </div>
                          <div class="form-group">
                            <?php 
                              $fecha_inicio = $cultivo['f_inicio'];
                              $f_inicio = date('m/d/Y', strtotime($fecha_inicio));
                             ?>
                            <label>Fecha Inicio:</label>
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                <input type="text" class="form-control pull-right" id="fecha_inicio" name="fecha_inicio" value="<?php echo $f_inicio; ?>" required>
                              </div>
                            <!-- /.input group -->
                          </div>
                          <div class="form-group">
                            <?php 
                              $fecha_fin = $cultivo['f_fin'];
                              $f_fin = date('m/d/Y', strtotime($fecha_fin));
                             ?>
                            <label>Fecha Fin:</label>
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                <input type="text" class="form-control pull-right" id="fecha_fin" name="fecha_fin" value="<?php echo $f_fin; ?>" required>
                              </div>
                            <!-- /.input group -->
                          </div>
                          <div class="form-group">
                            <label for="estanque" id="label_ch">Estanque a utilizar: </label>
                            <select name="estanque" id="estanque" class="form-control">
                              <?php 
                                try {
                                  $estanque_actual = $cultivo['id_estanque'];
                                  $sql = "SELECT * FROM estanque ";
                                  $resultado = $conn->query($sql);
                                  while ($estanque = $resultado->fetch_assoc()) {
                                    if ($estanque['id_estanque'] == $estanque_actual) { ?>
                                      <option value="<?php echo $estanque['id_estanque']; ?>" selected>
                                        <?php echo $estanque['nombre']; ?>
                                      </option>
                                    <?php } else { ?>
                                      <option value="<?php echo $estanque['id_estanque']; ?>">
                                        <?php echo $estanque['nombre']; ?>
                                      </option>
                                    <?php } 
                                 }
                                } catch (Exception $e) {
                                  echo "Error: " . $e->getMessage();
                                }
                               ?>
                            </select>
                          </div>
                          <div class="form-group" id="div_lmen">
                            <label for="pez">Pez a cultivar: </label>
                            <select name="pez" id="pez" class="form-control">
                              <?php 
                                try {
                                  $pez_actual = $cultivo['id_pez'];
                                  $sql = "SELECT * FROM pez ";
                                  $resultado = $conn->query($sql);
                                  while ($pez = $resultado->fetch_assoc()) {
                                    if ($pez['id_pez'] == $pez_actual) { ?>
                                      <option value="<?php echo $pez['id_pez']; ?>" selected>
                                        <?php echo $pez['nombre']; ?>
                                      </option>
                                    <?php } else { ?>
                                      <option value="<?php echo $pez['id_pez']; ?>">
                                        <?php echo $pez['nombre']; ?>
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
                            <label for="p_lectura">Periodo de lectura (s): </label>
                            <input type="number" class="form-control" id="p_lectura" name="p_lectura" step="any" min="1" max="9999" value="<?php echo $cultivo['p_lectura']; ?>" required>
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