<aside class="main-sidebar bg-dark sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="app/vista/libs/images/log.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           > 
      <span class="brand-text font-weight-light">SCAES DE R.L</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
    
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item bg-primary">
            <a href="<?php echo controlador::$rutaAPP; ?>index.php?action=main" class="nav-link">
              <i class="fas fa-home"></i>
              <p>
                INICIO
              </p>
            </a>
          </li>
          <li class="nav nav-light" >
            <a href="<?php echo controlador::$rutaAPP; ?>index.php?action=productos" class="nav-link">
              <i class="fas fa-plus-square"></i>
              <p>
                Productos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo controlador::$rutaAPP; ?>index.php?action=inventario" class="nav-link">
              <i class="fas fa-box"></i>
              <p>
                Inventario
              </p>
            </a>
          </li>
          <li class="nav nav-light" >
            <a href="<?php echo controlador::$rutaAPP; ?>index.php?action=proveedor" class="nav-link">
              <i class="fas fa-truck"></i>
              <p>
                Proveedores
              </p>
            </a>
          </li>
            <li class="nav-item has-treeview ">
                <a href="#" class="nav-link active bg-dark">
                    <i class="nav-icon fa fa-money"></i>
                    <p>
                        <b>Ventas</b>
                        <i class="right fa fa-angle-left"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview ">
                    <li class="nav nav-light" >
                        <a href="<?php echo controlador::$rutaAPP; ?>index.php?action=ventas" class="nav-link">
                            <p>
                                <i class="nav-icon fa fa-circle-notch"></i>

                                Realizar una venta
                            </p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview ">
                    <li class="nav nav-light" >
                        <a href="<?php echo controlador::$rutaAPP; ?>index.php?action=realizadas" class="nav-link">
                            <p>
                                <i class="nav-icon fa fa-circle-notch"></i>

                                Ventas Realizadas
                            </p>
                        </a>
                    </li>
                </ul>

            </li>
          <li class="nav-item ">
            <a href="<?php echo controlador::$rutaAPP; ?>index.php?action=empresa" class="nav-link">
              <i class="fas fa-user"></i>
              <p>
                Empresas clientes
              </p>
            </a>
          </li>
          <li class="nav nav-light" >
            <a href="<?php echo controlador::$rutaAPP; ?>index.php?action=getclie" class="nav-link">
              <i class="fas fa-user"></i>
              <p>
                clientes
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="<?php echo controlador::$rutaAPP; ?>index.php?action=usuarios" class="nav-link">
              <i class="fas fa-user"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>

        
          
          
     

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>