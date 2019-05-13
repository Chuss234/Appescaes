<?php
$mvcDatos = new GetDatos(); //intanciar datos 
$producto  = $mvcDatos->consultaGen("SELECT id_prod, producto from producto  Order By producto ASC");
//Nota: De ser un sistema mas grande y una tabla con mas columnas no se deberia usar * para llamar todo
?>
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

  <title>Inventario</title>
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
					<h1 class="box-title"><button class="btn btn-success" onclick="agregarInv();" id="btnagregar"><i class="fa fa-plus-circle"></i> Agregar a inventario</button></h1>
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
		<div class="modal" tabindex="-1"  role="dialog" id="myModal">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content" >
					<div class="modal-header" style="background-color:#505050; ;">
						<h5 class="modal-title" style="color:white" >Agregar Inventario</h5>
						<button type="button " class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form class="form-horizontal" role="form" id="miform" enctype="multipart/form-data">
						<div class="modal-body">
						<div class="modal-body">
							<table>
								<tr>
								<td>
								
								<div class="form-group row">
									<label for="id_prod" class="col-sm-2 col-form-label">Producto:</label>
									<div class="col-sm-6">
									<select class="form-control custom-select mr-sm-2 campo" id="id_prod" name="id_prod" required>
											<?php foreach ($producto as $key => $value) {echo " <option value=" . $value['id_prod'] . ">" . $value['producto'] . "</option>";}?>
										</select>
									</div>
								</div>

								<div class="form-group row">
									<label for="humedad" class="col-sm-2 col-form-label">Humedad:</label>
									<div class="col-sm-6">
										<input type="text" name="humedad" id="humedad" class="form-control campo" placeholder="Humedad" required>
									</div>
								</div>

								<div class="form-group row">
									<label for="color" class="col-sm-2 col-form-label">Color:</label>
									<div class="col-sm-6">
										<input type="text" name="color" id="color" class="form-control campo" placeholder="Color" required>
									</div>
								</div>

								<div class="form-group row">
									<label for="peso_neto" class="col-sm-2 col-form-label">Peso Neto:</label>
									<div class="col-sm-6">
										<input type="text" name="peso_neto" id="peso_neto" class="form-control campo" placeholder="Peso Neto" required>
									</div>
								</div>

								<div class="form-group row">
									<label for="apiario" class="col-sm-2 col-form-label">Apiario:</label>
									<div class="col-sm-6">
										<input type="text" name="apiario" id="apiario" class="form-control campo" placeholder="Apiario" required>
									</div>
								</div>

								<div class="form-group row">
									<label for="existencia" class="col-sm-2 col-form-label">Existencia:</label>
									<div class="col-sm-6">
										<input type="text" name="existencia" id="existencia" class="form-control campo" placeholder="Existencia" required>
									</div>
								</div>

								</td>
								<td>
								
								<div class="form-group row">
									<label for="fecha_extraccion" class="col-sm-2 col-form-label">estado:</label>
									<div class="col-sm-6">
										<input type="text" name="fecha_extraccion" id="fecha_extraccion" class="form-control campo" placeholder="AAAA-MM-DD" required>
									</div>
								</div>

								<div class="form-group row">
									<label for="fecha_extraccion" class="col-sm-2 col-form-label">Lote:</label>
									<div class="col-sm-6">
										<input type="text" name="fecha_extraccion" id="fecha_extraccion" class="form-control campo" placeholder="AAAA-MM-DD" required>
									</div>
								</div>

								<div class="form-group row">
									<label for="fecha_extraccion" class="col-sm-2 col-form-label">Fecha de Extraccion:</label>
									<div class="col-sm-6">
										<input type="date" name="fecha_extraccion" id="fecha_extraccion" class="form-control campo" placeholder="AAAA-MM-DD" required>
									</div>
								</div>

								<div class="form-group row">
									<label for="fecha_entrada" class="col-sm-2 col-form-label">Fecha de Entrada:</label>
									<div class="col-sm-6">
										<input type="date" name="fecha_entrada" id="fecha_entrada" class="form-control campo" placeholder="AAAA-MM-DD" required>
									</div>
									</div>
								</div>

								<div class="form-group row">
									<label for="fecha_extraccion" class="col-sm-2 col-form-label">Fecha de vencimiento:</label>
										<div class="col-sm-6">
									<input type="date" name="fecha_extraccion" id="fecha_extraccion" class="form-control campo" placeholder="AAAA-MM-DD" required>
								</div>
								</div>

								</td>
								</tr>
							</table>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-primary">Guardar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	

  	<div id="contentTable" >
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
		$("#miform").submit(function(event){
			event.preventDefault();
			guardarInv();
		});
	});
function editar(id) {
    $.ajax({
      dataType: "json",
      url:"<?php echo controlador::$rutaAPP?>index.php?action=getinv",
      data:{op:4,id:id},
      type:'POST',
      success: function(data,x) {          
        if (data.status==true) {
          $("#myModal").modal("show");
          $(".campo").each(function(){
            $(this).val(data.data[0][$(this).attr("name")]);
          });
          
        }
      },
      error: function(s,x,y) {
          
         
      }
    }); 
  }


	function recuperarDatos(){
		
		$.ajax({
			dataType:"json",
			url:"<?php echo controlador::$rutaAPP?>index.php?action=getinv",	
			data:{op:1},
			type:"POST",
			success: function(data) {
				
				if (data.success==true) {
					var html="<table  id='tableContentData' class='table table-responsive table-striped table-bordered'><thead><tr>";
					html+="<th>Corr</th>";
					html+="<th>Producto</th>";
					html+="<th>Humedad</th>";
					html+="<th>Color</th>";
					html+="<th>Peso Neto</th>";
					html+="<th>Existencia</th>";
					html+="<th>Lote</th>";
					html+="<th>Estado</th>";
					html+="<th>Apiario</th>";
					html+="<th>Fecha Extraccion</th>";
					html+="<th>Fecha Entrada</th>";
					html+="<th>Fecha Vencimiente</th>";
					html+="<th>Editar</th>";
					html+="</tr></thead><tbody>";
					data.data.forEach(function(item,index){
						html+="<tr>";
						html+="<td style='text-align:center;'>"+(index+1)+"</td>";
						html+="<td>"+item.producto+"</td>";
						html+="<td>"+item.humedad+"°</td>";
						html+="<td>"+item.color+"</td>";
						html+="<td>"+item.peso_neto+"Kg</td>";
						html+="<td>"+item.existencia+"</td>";
						html+="<td>"+item.lote+"</td>";
						html+="<td>"+item.estado+"</td>";
						html+="<td>"+item.apiario+"</td>";
						html+="<td>"+item.fecha_extraccion+"</td>";
						html+="<td>"+item.fecha_entrada+"</td>";
						html+="<td>"+item.fecha_vencimiento+"</td>";
						html+="<td><button class='btn btn-primary btn-circle' onclick='editar("+item.id_inv+")'><i class='fas fa-edit'></i></button></td>";
						html+="</tr>";
					});
					html+="</tbody></table>";
					$("#contentTable").html(html);
					$("#tableContentData").DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
                "language": {
                    "lengthMenu": "_MENU_ registros",
                    "zeroRecords": "No hay datos",
                    "info": "P&aacute;gina _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay informacion",
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
		}
	});


	}
	function agregarInv() {
		$("#myModal").modal("show");
		$(".campo").val("");
		$("#id_inv").val("0");
		$(".fileinput").fileinput("clear");
	}
    function guardarInv() {
		var formData=new FormData($("#miform")[0]);
		formData.append("op",2);
		$.ajax({
			dataType:"json",
			url:"<?php echo controlador::$rutaAPP?>index.php?action=getinv",
			type:"POST",
			async:false,
			cache:false,
			processData:false,
			contentType:false,
			data: formData,
			success: function(data) {
				if (data.success==false) {
					<?php echo "error"; ?>
				} else {
					$("#myModal").modal("hide");
					recuperarDatos();
				}
			},
			error: function(response) {
					$("#myModal").modal("hide");
					recuperarDatos();
				<?php echo "error"; ?>			}
		});
	}
</script>

</body>
</html>
