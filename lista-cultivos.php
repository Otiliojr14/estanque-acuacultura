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
        Listado de cultivos
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
              <h3 class="box-title">Gestiona los cultivos en esta sección</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre del cultivo</th>
                  <th>Descripción</th>
                  <th>Fecha inicio</th>
                  <th>Fecha fin</th>
                  <th>Estanque</th>
                  <th>Pez</th>
                  <th>Periodo de lectura</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                      try {
                        $sql = "SELECT id_cultivo, cultivo.nombre as c_nombre, des_cultivo, f_inicio, f_fin, estanque.nombre as e_nombre, pez.nombre as p_nombre, p_lectura FROM cultivo ";
                        $sql .= " INNER JOIN estanque ";
                        $sql .= " ON cultivo.id_estanque = estanque.id_estanque ";
                        $sql .= " INNER JOIN pez";
                        $sql .= " ON cultivo.id_pez = pez.id_pez ";
                        $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                      }

                      while ($cultivo = $resultado->fetch_assoc() ) { ?>
                         <tr>
                          <td><?php echo $cultivo['c_nombre']; ?></td>
                          <td><?php echo $cultivo['des_cultivo']; ?></td>
                          <td><?php echo $cultivo['f_inicio']?></td>
                          <td><?php echo $cultivo['f_fin']; ?></td>
                          <td><?php echo $cultivo['e_nombre']; ?></td>
                          <td><?php echo $cultivo['p_nombre']; ?></td>
                          <td><?php echo $cultivo['p_lectura'] . ' segundos.'; ?></td>
                          <td>
                            <a href="editar-cultivo.php?id=<?php echo $cultivo['id_cultivo']; ?>" class="btn bg-orange btn-flat margin"><i class="fas fa-pencil-alt"></i></a>
                            <a href="#" data-id="<?php echo $cultivo['id_cultivo']; ?>" data-tipo="cultivo" class="btn bg-maroon btn-flat margin borrar_registro"><i class="fas fa-trash-alt"></i></a>
                          </td>
                        </tr>
                      <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre del cultivo</th>
                  <th>Descripción</th>
                  <th>Fecha inicio</th>
                  <th>Fecha fin</th>
                  <th>Estanque</th>
                  <th>Pez</th>
                  <th>Periodo de lectura</th>
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