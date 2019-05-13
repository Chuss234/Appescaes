<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Inicio</title>
<!-- Bootstrap 4 -->
  <?php include_once __dir__ . "/recursos/css.php";?>
  <!-- Google Font: Source Sans Pro
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
-->
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">




 <!-- encabezado -->
  <section class="encabezado">
  <?php include_once __dir__ . "/secciones/encabezado.php";?>
</section> <!-- Fin de encabezado -->

<section class="menu">  <!-- Menu latera -->
<?php include_once __dir__ . "/secciones/menu.php";?>
  <!-- fin-lateral -->
</section>

 <!--  contenido -->
<section class="contenido">
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">              </h1>
          </div><!-- /.col -->
                  <!--CONTENIDO HEADER -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
      <!-- Pagina principal-->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        <div class="row">
          <!--  EL CONTENIDO-->

        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
</section>




<!-- jQuery Y--> <!-- Bootstrap 4 -->
  <?php include_once __dir__ . "/recursos/script.php";?>

</body>
</html>
