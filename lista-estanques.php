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
                  <th>Nombre del estanque</th>
                  <th>Bomba</th>
                  <th>Tipo de estanque</th>
                  <th>Profundidad</th>
                  <th>Longitud mayor o Radio (cm)</th>
                  <th>Longitud menor (cm)</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                      try {
                        $sql = "SELECT id_estanque, estanque.nombre as e_nombre, bomba_eventos.nombre as b_nombre, tipo_estanque, profundidad, l_mayor_r, l_menor FROM estanque ";
                        $sql .= " INNER JOIN bomba_eventos ";
                        $sql .= " ON estanque.id_bomba=bomba_eventos.id_bomba ";
                        $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                      }

                      while ($estanque = $resultado->fetch_assoc() ) { ?>
                         <tr>
                          <td><?php echo $estanque['e_nombre']; ?></td>
                          <td><?php echo $estanque['b_nombre']; ?></td>
                          <td><?php if ($estanque['tipo_estanque']  == 'rectangular') {
                              echo '<span class="badge bg-maroon">Rectangular</span>';
                            } else {
                              echo '<span class="badge bg-purple">Circular</span>';
                            }?></td>
                          <td><?php echo $estanque['profundidad']; ?></td>
                          <td><?php echo $estanque['l_mayor_r']; ?></td>
                          <td><?php if ($estanque['tipo_estanque']  == 'rectangular') {
                              echo $estanque['l_menor'];
                            } else {
                              echo '<span class="badge">Ninguno</span>';
                            }?></td></td>
                          <td>
                            <a href="editar-estanque.php?id=<?php echo $estanque['id_estanque']; ?>" class="btn bg-orange btn-flat margin"><i class="fas fa-pencil-alt"></i></a>
                            <a href="#" data-id="<?php echo $estanque['id_estanque']; ?>" data-tipo="estanque" class="btn bg-maroon btn-flat margin borrar_registro"><i class="fas fa-trash-alt"></i></a>
                          </td>
                        </tr>
                      <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre del estanque</th>
                  <th>Bomba</th>
                  <th>Tipo de estanque</th>
                  <th>Profundidad</th>
                  <th>Longitud mayor o Radio (cm)</th>
                  <th>Longitud menor (cm)</th>
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