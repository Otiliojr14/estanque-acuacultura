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
        Dashboard
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <?php 
            $sql = "SELECT COUNT(id_bomba) AS b_registros from bomba_eventos ";
            $resultado = $conn->query($sql);
            $b_registrados = $resultado->fetch_assoc();
           ?>
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php echo $b_registrados['b_registros']; ?></h3>

              <p>Bombas</p>
            </div>
            <div class="icon">
              <i class="fas fa-blog"></i>
            </div>
            <a href="lista-bombas.php" class="small-box-footer">
              Ver bombas <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <?php 
            $sql = "SELECT COUNT(id_pez) AS p_registros from pez ";
            $resultado = $conn->query($sql);
            $p_registrados = $resultado->fetch_assoc();
           ?>
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?php echo $p_registrados['p_registros']; ?></h3>

              <p>Peces</p>
            </div>
            <div class="icon">
              <i class="fas fa-fish"></i>
            </div>
            <a href="lista-peces.php" class="small-box-footer">
              Ver peces <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>  
        <div class="col-lg-3 col-xs-6">
          <?php 
            $sql = "SELECT COUNT(id_estanque) AS e_registros from estanque ";
            $resultado = $conn->query($sql);
            $e_registrados = $resultado->fetch_assoc();
           ?>
          <!-- small box -->
          <div class="small-box bg-olive">
            <div class="inner">
              <h3><?php echo $e_registrados['e_registros']; ?></h3>

              <p>Estanques</p>
            </div>
            <div class="icon">
              <i class="fas fa-fill"></i>
            </div>
            <a href="lista-estanques.php" class="small-box-footer">
              Ver estanques <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div> 
        <div class="col-lg-3 col-xs-6">
          <?php 
            $sql = "SELECT COUNT(id_cultivo) AS c_registros from cultivo ";
            $resultado = $conn->query($sql);
            $c_registrados = $resultado->fetch_assoc();
           ?>
          <!-- small box -->
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3><?php echo $c_registrados['c_registros']; ?></h3>

              <p>Cultivos</p>
            </div>
            <div class="icon">
              <i class="fas fa-clipboard"></i>
            </div>
            <a href="lista-cultivos.php" class="small-box-footer">
              Ver cultivos <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>      
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include_once 'templates/footer.php'; ?>




