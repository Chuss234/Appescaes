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

    <title>Ventas Realizadas</title>
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

                        <section id="contenido">
                            <div class="content-panel">

                            </div>

                        </section>

                        <div class="container">

                        <!--COntenedor de la tabla facturas-->
                            <div id="contentTable" >


                            </div>

                        </div>

                    </div>
                    <!-- /.row -->

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
    </section>




    <!-- jQuery Y--> <!-- Bootstrap 4 -->
    <?php include_once __dir__ . "/recursos/script.php";?>

    <script type="text/javascript">
        $(document).ready(function(){
            recuperarDatos();

        });
        function imprimir(id) {


            window.open("http://localhost/Appescaes/index.php?action=factura&cod="+id+"",'mywindow', 'width=600,height=450');



        }


        function recuperarDatos(){
            //blockDiv("body",1);
            $.ajax({
                dataType:"json",
                url:"<?php echo controlador::$rutaAPP;?>index.php?action=getdatosventa",
                data:{op:6},
                type:"POST",
                success: function(data) {
                    //blockDiv("body",2);
                    if (data.success==true) {
                        var html="<table style='text-align: center'  id='tableContentData' class='table table-hover table-info table-bordered'><thead><tr>";
                        html+="<th>Codigo</th>";
                        html+="<th>Cliente</th>";
                        html+="<th>Total de la venta</th>";
                        html+="<th>Tipo de venta</th>";
                        html+="<th>Vendedor</th>";
                        html+="<th>Fecha</th>";
                        html+="<th>Imprimir</th>";
                        html+="</tr></thead><tbody>";
                        data.data.forEach(function(item,index){
                            html+="<tr>";
                            html+="<td style='text-align:center;'>"+item.id_vent+"</td>";
                            html+="<td>"+item.cliente+"</td>";
                            html+="<td>$"+item.total+"</td>";

                            if (item.id_inex == 1){
                                html+="<td>Importacion</td>";

                            }else {
                                html+="<td>Exportacion</td>";

                            }

                            html+="<td>"+item.usuario+"</td>";
                            html+="<td>"+item.fecha+"</td>";
                            html+="<td><button class='btn btn-sm btn-outline-secondary' onclick='imprimir("+item.id_vent+")'><i class='fas fa-print'></i></button></td>";
                            html+="</tr>";
                        });
                        html+="</tbody></table>";
                        $("#contentTable").html(html);
                        $("#tableContentData").DataTable(
                            {

                                responsive:true,
                                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
                                "language": {
                                    "lengthMenu": "_MENU_ registros",
                                    "zeroRecords": "No hay datos",
                                    "info": "P&aacute;gina _PAGE_ de _PAGES_",
                                    "infoEmpty": "No hay informaci&oacute;n",
                                    "infoFiltered": "(registros filtrados _MAX_ )",
                                    "search":"Buscar",
                                    "paginate": {
                                        "first":      "Primero",
                                        "last":       "Ultimo",
                                        "next":       " &nbsp;&nbsp;Siguiente",
                                        "previous":   "Anterior &nbsp;&nbsp; "
                                    }
                                },
                                "order": [[ 0, "asc" ]]
                            });
                        $('#tableContentData tbody').on('click','.custom-confirmation', function () {
                            $(this).confirmation({
                                rootSelector: this,
                                container: 'body',
                                title: "¿Estás seguro de eliminar esté registro?",
                                onConfirm: function() {
                                    Borrar($(this).attr("data-id"));
                                    recuperarDatos();
                                },
                                buttons: [
                                    {
                                        class: 'btn btn-danger',
                                        label:"Si",
                                        value: 'Si'
                                    },
                                    {
                                        class: 'btn btn-primary',
                                        label:"No",
                                        value: 'No',
                                        cancel: true
                                    }
                                ]
                            });
                            $(this).confirmation('show');
                        });
                    }
                },
                error:function(response){

                }
            });
        }

    </script>
</body>
</html>
