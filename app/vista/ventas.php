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

  <title>Usuarios</title>
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

        <!--Agregar titulo-->

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

            <div class="col-md-3 " >
                <div class="input-group-prepend">
                    <button class="btn btn-primary"><i class="fas fa-user"></i></button>
                    <select onchange="listarSelectCliente()" name="tipo" id="tipo" class="form-control">
                        <option value="0">Tipo de cliente</option>
                        <option value="1">Cliente empresa</option>
                        <option value="2">Cliente natural</option>
                    </select>
                </div>
            </div>
                <div class=" col-md-3 " >
                    <div class="input-group-prepend">
                        <button  class="btn btn-primary"><i class="fas fa-user"></i></button>
                        <select onchange="cliente();" name="cliente" id="cliente" class="form-control">
                            <option value="">Escoja un tipo de cliente</option>
                        </select>
                    </div>
                </div>
            <div class="col-md-3" >
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-truck" ></i></span>
                    <select  onchange="getinex();" name="inex" id="inex" class="form-control">
                        <option value="0">Tipo de venta</option>
                        <option value="1">Importacion</option>
                        <option value="2">Exportacion</option>
                    </select>
                </div>
            </div>

            <div class="col-md-3" >
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-box" ></i></span>
                    <select onchange="addProd();" name="producto" id="producto" class="form-control">
                            <option value="0">Seleccione un producto</option>
                        </select>
                </div>
            </div>


            <div class="container-fluid" style="margin-top: 3%">
                <div class="row">
                    <div class="col-md-7">
                        <div id="contentTable">

                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card border-info ">
                            <div class="card-header form-group"><i class="form-group fa fa-user" ></i> Cliente: <span class="limpiar" id="clientes"></span><br>
                                <input onchange="getfactura();"  type="text" id="nfactura" class="form-control" name="nfactura" placeholder="Numero de la factura">
                            </div>
                            <div class="card-body text-secondary">
                                <p class="card-title"><i class="fa fa-hashtag"></i> Numero de venta: <span class="limpiar" id="nventa"></span></p>
                                <br>
                                <p class="card-text"><i class="fa fa-calendar"></i> Fecha de venta: <span  class="limpiar" id="diaventa"></span></p>
                                <p class="card-text"><i class="fa fa-user"></i> Empleado: <span class="limpiar" id = "empleado"> </span></p>
                                <p class="card-text"><h5><i class="fa fa-box"></i>  Cantidad Total: <span style="font-size: 18px" class="limpiar" id="ctotal"></span></h5> </p>

                            </div>
                            <div class="card-footer bg-transparent border-success"><h5 class="text-success float-left">Total: <span style="font-size: 18px" class="limpiar" id="ptotal"></span></h5>
                                <button onclick="guardar()" id="btn" class="btn btn-success float-right "><i class="fa fa-check">Finalizar</i></button>
                                <button style="margin-right: 10px" onclick="cancelarVenta()" id="btn-cancelar" class="btn btn-danger float-right "><i class="fa fa-times">Cancelar</i></button>
                            </div>

                        </div>
                        </div>
                    </div>

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
    <script >
        $(document).ready(function () {
            listarSelectProducto();
        });
        function listarSelectProducto() {
            $.post("<?php echo controlador::$rutaAPP?>index.php?action=getdatosventa",{op:1}, function( data ) {
                JSON.parse(data).data.forEach(function(item,index){
                    $("#producto").append("<option value="+item.id_inv+">" + item.nombre + "</option>");
                });
            });
        }

        /******Funcion para cancelar la venta*******/
        function cancelarVenta() {
            var r = confirm("¿Decea cancelar la venta?");

            if (r == true) {
                listaProd.splice(0,listaProd.length);
                $(".limpiar").text("");
                $('select').removeAttr('disabled');
                detalleTable();
            }

        }
        /*******

         FUNCION PARA BORRAR PROCDUCTOS DE LA TABLA DE DETALLE

         *******/
        function borrar(index) {
            listaProd.splice(index, 1);
            sumarCantida();

            detalleTable()

        }
        function listarSelectCliente() {
            $("#cliente").html("<option value='0'>Seleccione un cliente</option>");
            let tipo = $("#tipo").val();
            $.post("<?php echo controlador::$rutaAPP?>index.php?action=getdatosventa",{op:2,tipo:tipo}, function( data ) {
                JSON.parse(data).data.forEach(function(item,index){
                    objprod.nit = item.nit;

                    if(item.tipo_cliente == 1){

                            $("#cliente").append("<option value="+item.id_cliente+">" + item.contacto + "</option>");
                    }else {
                            $("#cliente").append("<option value="+item.id_cliente+">" + item.nombre + "</option>");

                    }

                });
            });
        }
        function getinex() {
            $("#inex").attr('disabled','disabled');

            objprod.inex = $("#inex").val();
            console.log(objprod);
        }
        function cliente() {
            $("#tipo").attr('disabled','disabled');
            $("#cliente").attr('disabled','disabled');

            /**nombre del clinete**/
            objprod.cliente  = $("#cliente option:selected").text();
            objprod.id_cliente  = $("#cliente").val();
        /**tipo del clinete**/
            objprod.tipoclie =  $("#cliente").val();
        /**************se manda a la tarjeta**********/
            $("#clientes").text((objprod.cliente).toUpperCase())
        /******Obtenemos el numero de la venta*******/
            $.post("<?php echo controlador::$rutaAPP?>index.php?action=getdatosventa",{op:3}, function( data ) {
                objprod.nventa = JSON.parse(data).data[0].id_venta
                $("#nventa").text(objprod.nventa);
            });
         /*********************Fecha con js*****************/
            var hoy = new Date();
            var dd = hoy.getDate();
            var mm = hoy.getMonth()+1;
            var yyyy = hoy.getFullYear();
            objprod.diaventa=dd+"/"+mm+"/"+yyyy;
            objprod.empleado= "<?php echo $_SESSION["nuser"]?>";
            $("#diaventa").text(objprod.diaventa);
            $("#empleado").text((objprod.empleado).toUpperCase());

        }
        /**********objeto y array para captura los datos de la venta**************/
        var listaProd = [];

        var objprod = {
            'data': listaProd
        };
        function addProd(){
          let id = $("#producto").val();
            $.post("<?php echo controlador::$rutaAPP?>index.php?action=getdatosventa",{op:4,id:id}, function( data ) {
                let prod = JSON.parse(data);
                let idprod = prod.data[0].id_prod;
                let id_inv = prod.data[0].id_inv;
                let serie = prod.data[0].n_serie;
                let nombre = prod.data[0].nombre;
                let precio = prod.data[0].precio_venta;
                let detalle = prod.data[0].det_prod;

                let productos = {
                    'inv': id_inv,
                    'idprod': idprod,
                    'serie': serie,
                    'nombre': nombre,
                    'precio': precio,
                    'detalle': detalle,
                    'cantidad': 0

                };
                listaProd.push(productos);
                detalleTable();
                console.log(objprod);
            });

        }
        function detalleTable() {
            /***************************Tabla que recorre el objeto objproducto para el DETALLE DE VENTA***************************/

            var html = "<table style='text-align: center'  id='tableVenta' class='table table-hover table-success '><thead class='bg-green'><tr>";
            html += "<th >Corre</th>";
            html += "<th>Serie</th>";
            html += "<th>Producto</th>";
            html += "<th>Precio</th>";
            html += "<th>Cantidad</th>";
            html += "<th>Borrar</th>";
            html += "</tr></thead><tbody>";
            html += "<tr>";
            var corr= 0;
            objprod.data.forEach(function(item, index) {
                corr ++ ;
                html += "<td ><center>"+ corr +"</center></td>";
                html += "<td >" + item.serie + "</td>";
                html += "<td >" + item.nombre + "</td>";
                html += "<td>$" + item.precio + "</td>";
                html += "<td><center><input id='cantidad' name='cantidad' onchange='cantidad("+index+")' value='"+item.cantidad+"' class='cantidad' style='width: 45px' type='text'></center></td>";
                html += "<td><button onclick='borrar("+index+")' class = 'btn btn-sm btn-danger'><span class='fa fa-times'></span></button></td>";
                html += "</tr>";
            });

            html += "</tbody></table>";
            $("#contentTable").html(html);
            $('#tableVenta').dataTable();


        }
        function cantidad(index) {

            let cantidad = $(".cantidad").serializeArray();

            if($.isNumeric(cantidad[index].value)) {
                if (parseInt(cantidad[index].value) > 0) {
                    objprod.data[index].cantidad = cantidad[index].value;
                    sumarCantida()
                } else {
                    alert("Ingrese una cantidad mayor")
                }

            }else {
                alert("Campo solo para numeros")

            }
            console.log(objprod);

        }
        function sumarCantida() {
            var ctotal = 0; // Variable para tener la cantidad total de productos
            var total = 0; // variable para tener la suma de productos
            objprod.data.forEach(function(item, index) {
                let cantidad = parseInt(objprod.data[index].cantidad);
                let ptotal = parseFloat(objprod.data[index].precio)*parseInt(objprod.data[index].cantidad);

                total += ptotal;

                ctotal+=cantidad ;
            });
            objprod.cantidaTotal =  ctotal; // se almacena en el objeto objprod
            objprod.precioTotal = total.toFixed(2); // se almacena en el objeto objprod

            $("#ctotal").text(objprod.cantidaTotal); // muestra el cantidad Total en la tarjeta

            $("#ptotal").text("$"+objprod.precioTotal); // muestra el pago total en la tarjeta


        }
        function guardar() {
            console.log(objprod)
            var r = confirm("¿Decea registrar la venta?");

            if (r == true) {
                let data = JSON.stringify(objprod);
                $.post("<?php echo controlador::$rutaAPP?>index.php?action=getdatosventa",{op:5,data:data}, function( data ) {
                    alert(data);
                });
                listaProd.splice(0,listaProd.length);
                $(".limpiar").text("");
                $('select').removeAttr('disabled');
                detalleTable();
            }

        }
    </script>

</body>
</html>
