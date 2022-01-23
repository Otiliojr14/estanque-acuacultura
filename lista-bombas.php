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
        Listado de bombas
      </h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Maneja las bombas en esta sección</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                      try {
                        $sql = "SELECT id_bomba, nombre, estado FROM bomba_eventos";
                        $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                      }
                      while ($bomba = $resultado->fetch_assoc() ) { ?>
                        <tr>
                          <td><?php echo $bomba['nombre']; ?></td>
                          <td><?php $estado_bomba = $bomba['estado'];
                            if ($estado_bomba == 1) {
                              echo '<span class="badge bg-green">Activo</span>';
                            } else {
                              echo '<span class="badge bg-red">Inactivo</span>';
                            }?></td>
                          <td>
                            <a href="editar-bomba.php?id=<?php echo $bomba['id_bomba'] ?>" class="btn bg-orange btn-flat margin"><i class="fas fa-pencil-alt"></i></a>
                            <a href="#" data-id="<?php echo $bomba['id_bomba'] ?>" data-tipo="bomba" class="btn bg-maroon btn-flat margin borrar_registro"><i class="fas fa-trash-alt"></i></a>
                          </td>
                        </tr>
                      <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  </div>
  <!-- /.content-wrapper -->

<?php include_once 'templates/footer.php'; ?>