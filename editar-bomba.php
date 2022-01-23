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
        Editar bomba
        <small></small>
      </h1>
    </section>

      <div class="row">
        <div class="col-md-6">
            <section class="content">
                <!-- Default box -->
                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Editar bomba</h3>
                  </div>
                  <div class="box-body">
                    <?php 
                      $sql = "SELECT * FROM `bomba_eventos` WHERE `id_bomba` = $id ";
                      $resultado = $conn->query($sql);
                      $bomba = $resultado->fetch_assoc();
                     ?>
                      <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-bomba.php">
                        <div class="box-body">
                          <div class="form-group">
                            <label for="nombre_bomba">Nombre de la bomba: </label>
                            <input type="text" class="form-control" id="nombre_bomba" name="nombre_bomba" placeholder="Nombre de la bomba" value="<?php echo $bomba['nombre']; ?>" required>
                          </div>
                          <div class="form-group">
                            <label for="estado_bomba">Estado: </label>
                            <select name="estado_bomba" class="form-control">
                            <?php if ($bomba['estado'] == 1) { ?>
                                <option value="0">Inactivo</option>
                                <option value="<?php echo $bomba['estado']; ?>" selected>Activo</option>
                            <?php } else {?>
                                <option value="<?php echo $bomba['estado']; ?>" selected>Inactivo</option>
                                <option value="1">Activo</option>
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
