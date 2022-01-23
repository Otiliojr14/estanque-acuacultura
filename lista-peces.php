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
        Listado de peces
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
              <h3 class="box-title">Gestiona los registros de peces en esta sección</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Temperatura</th>
                  <th>Oxigeno</th>
                  <th>pH</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                      try {
                        $sql = "SELECT * FROM pez";
                        $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                      }
                      while ($pez = $resultado->fetch_assoc() ) { ?>
                        <tr>
                          <td><?php echo $pez['nombre']; ?></td>
                          <td><?php echo $pez['descripcion']; ?></td>
                          <td><?php
                            echo 'Max: ' . $pez['t_max'];
                            echo '<br>Min: ' . $pez['t_min'];  
                          ?></td>
                          <td><?php
                            echo 'Max: ' . $pez['o_max'];
                            echo '<br>Min: ' . $pez['o_min'];  
                          ?></td>
                          <td><?php
                            echo 'Max: ' . $pez['ph_max'];
                            echo '<br>Min: ' . $pez['ph_min'];  
                          ?></td>
                          <td>
                            <a href="editar-pez.php?id=<?php echo $pez['id_pez'] ?>" class="btn bg-orange btn-flat margin"><i class="fas fa-pencil-alt"></i></a>
                            <a href="#" data-id="<?php echo $pez['id_pez'] ?>" data-tipo="pez" class="btn bg-maroon btn-flat margin borrar_registro"><i class="fas fa-trash-alt"></i></a>
                          </td>
                        </tr>
                      <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Temperatura</th>
                  <th>Oxigeno</th>
                  <th>pH</th>
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