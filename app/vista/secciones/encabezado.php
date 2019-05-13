<nav class="main-header navbar navbar-expand bg-dark navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i>&nbsp;&nbsp; <?php echo "@".$_SESSION["nuser"]; ?></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto ">
      <!-- Messages Dropdown Menu -->
      <a href="<?php echo controlador::$rutaAPP; ?>index.php?action=cerrar"> <i class="fas fa-sign-out-alt"> Salir</i></a>

    </ul>
  </nav>