  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left info">
          <p>Otilio</p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Administrar y ver registros</li>
        <li class="treeview">
          <a href="#">
            <i class="fas fa-fill iconawesome"></i>
            <span>Estanques y bombas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="lista-estanques.php"><i class="fa fa-list-ul"></i> Ver estanques</a></li>
            <li><a href="crear_estanque.php"><i class="fa fa-plus-circle"></i> Agregar estanques</a></li>
            <li><a href="lista-bombas.php"><i class="fa fa-list-ul"></i> Ver bombas</a></li>
            <li><a href="crear_bomba.php"><i class="fa fa-plus-circle"></i> Agregar bombas</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fas fa-fish iconawesome"></i>
            <span>Peces</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="lista-peces.php"><i class="fa fa-list-ul"></i> Ver todos</a></li>
            <li><a href="crear_pez.php"><i class="fa fa-plus-circle"></i> Agregar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fas fa-clipboard iconawesome"></i>
            <span>Cultivos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="lista-cultivos.php"><i class="fa fa-list-ul"></i> Ver todos</a></li>
            <li><a href="crear_cultivo.php"><i class="fa fa-plus-circle"></i> Agregar</a></li>
          </ul>
        </li>
       <?php if ($_SESSION['privilegio'] == 0) { ?>   
        <li class="treeview">
          <a href="#">
            <i class="fas fa-user iconawesome"></i>
            <span>Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="lista-usuarios.php"><i class="fa fa-list-ul"></i> Ver todos</a></li>
            <li><a href="crear_usuario.php"><i class="fa fa-plus-circle"></i> Agregar</a></li>
          </ul>
        </li>
      <?php }?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->