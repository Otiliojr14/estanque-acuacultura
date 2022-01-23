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
        Listado de usuarios
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
              <h3 class="box-title">Maneja los usuarios en esta sección</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Usuario</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                      try {
                        $sql = "SELECT id_usuario, usuario, nombre, apellido, privilegio FROM usuarios";
                        $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                      }
                      while ($usuario = $resultado->fetch_assoc() ) { ?>
                        <tr>
                          <td><?php echo $usuario['usuario']; 
                            $privilegio = $usuario['privilegio'];
                            if ($privilegio == 0) {
                              echo '<br><span class="badge bg-green">Administrador</span>';
                            } else {
                              echo '<br><span class="badge bg-orange">Estandar</span>';
                            }
                            
                          ?></td>
                          <td><?php echo $usuario['nombre']; ?></td>
                          <td><?php echo $usuario['apellido']; ?></td>
                          <td>
                            <a href="editar-usuario.php?id=<?php echo $usuario['id_usuario'] ?>" class="btn bg-orange btn-flat margin"><i class="fas fa-pencil-alt"></i></a>
                            <a href="#" data-id="<?php echo $usuario['id_usuario'] ?>" data-tipo="usuario" class="btn bg-maroon btn-flat margin borrar_registro"><i class="fas fa-trash-alt"></i></a>
                          </td>
                        </tr>
                      <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Usuario</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
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




