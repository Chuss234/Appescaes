<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
  <title>Proveedores</title>
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
	<section id="contenido">
		<div class="content-panel">
			<h4>
				<button class="btn btn-primary btn-md mb4" style="margin-left: 80%; margin-top: -20px;" onclick="agregarUsuario();"><i class="fas fa-user-plus"></i> Agregar Usuario</button>
			</h4>
			<div id="contentTable" style="width: 70%; margin-left: 150px; margin-top: -40px;">
			</div>
		</div>
		<div class="modal" tabindex="-1" role="dialog" id="myModal">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Agregar Producto</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form class="form-horizontal" role="form" id="miform" enctype="multipart/form-data">
						<input type="hidden" name="id_prod" id="id_prod" value="0" class="campo">
						<div class="modal-body">
							<div class="form-group row">
								<label for="n_serie" class="col-sm-4 col-form-label">Numero de serie:</label>
								<div class="col-sm-8">
									<input type="text" name="n_serie" id="n_serie" class="form-control campo" placeholder="###" required autofocus>
								</div>
							</div>
							<div class="form-group row">
								<label for="producto" class="col-sm-4 col-form-label">Nombre del producto:</label>
								<div class="col-sm-8">
									<input type="producto" name="producto" id="producto" class="form-control campo" placeholder="Nombre del producto" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="presentacion" class="col-sm-4 col-form-label">Presentacion:</label>
								<div class="col-sm-8">
									<input type="text" name="presentacion" id="presentacion" class="form-control campo" placeholder="Presentacion" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="precio_venta" class="col-sm-4 col-form-label">Precio de venta:</label>
								<div class="col-sm-8">
									<input type="text" name="precio_venta" id="precio_venta" class="form-control campo" placeholder="Precio de venta" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="det_prod" class="col-sm-4 col-form-label">Detalle:</label>
								<div class="col-sm-8">
									<input type="text" name="det_prod" id="det_prod" class="form-control campo" placeholder="Detalle" >
								</div>
							</div>
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-primary">Guardar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
<?php include_once(__dir__."/recursos/script.php");?>
<script type="text/javascript">
	$(document).ready(function(){
		recuperarDatos();
		$("#miform").submit(function(event){
			event.preventDefault();
			guardarUsuario();
		});
	});
function editar(id) {
    $.ajax({
      dataType: "json",
      url:"<?php echo controlador::$rutaAPP?>index.php?action=getprod",
      data:{op:4,id:id},
      type:'POST',
      success: function(data,x) {          
        if (data.status==true) {
          $("#myModal").modal("show");
          $(".campo").each(function(){
            $(this).val(data.data[0][$(this).attr("name")]);
          });
          
        }
      }
    }); 
  }
function Borrar(id) {
        $.ajax({
          dataType: "json",
          url:"<?php echo controlador::$rutaAPP?>index.php?action=getprod",
          data:{op:3,id:id},
          type:'POST',
          success: function(data,x) {          
            if (data.status==true) {
              recuperarDatos();
            }
          }
        }); 
      }

	function recuperarDatos(){
		blockDiv("body",1);
		$.ajax({
			dataType:"json",
			url:"<?php echo controlador::$rutaAPP;?>index.php?action=getprod",	
			data:{op:1},
			type:"POST",
			success: function(data) {
				blockDiv("body",2);
				if (data.success==true) {
					var html="<table  id='tableContentData' class='table table-striped table-bordered'><thead><tr>";
					html+="<th>Corr</th>";
					html+="<th># Serie</th>";
					html+="<th>Producto</th>";
					html+="<th>Presentacion</th>";
					html+="<th>Precio_venta</th>";
					html+="<th>Detalle</th>";
					html+="<th>Acci&oacute;n</th>";
					html+="</tr></thead><tbody>";
					data.data.forEach(function(item,index){
						html+="<tr>";
						html+="<td style='text-align:center;'>"+(index+1)+"</td>";
						html+="<td>"+item.n_serie+"</td>";
						html+="<td>"+item.producto+"</td>";
						html+="<td>"+item.presentacion+"</td>";
						html+="<td>"+item.precio_venta+"</td>"
						html+="<td>"+item.det_prod+"</td>"
						html+="<td><button class='btn btn-primary btn-circle' onclick='editar("+item.id_prod+")'><i class='fas fa-user-edit'></i></button>&nbsp;<button class='btn btn-danger btn-circle custom-confirmation' data-id='"+item.id_prod+"' ><i class='fas fa-user-times'></i></button></td>";
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
	function agregarUsuario() {
		$("#myModal").modal("show");
		$(".campo").val("");
		$("#id_prod").val("0");
		$(".fileinput").fileinput("clear");
	}
    function guardarUsuario() {
		var formData=new FormData($("#miform")[0]);
		formData.append("op",2);
		$.ajax({
			dataType:"json",
			url:"<?php echo controlador::$rutaAPP;?>index.php?action=getprod",
			type:"POST",
			async:false,
			cache:false,
			processData:false,
			contentType:false,
			data: formData,
			success: function(data) {
		
					$("#myModal").modal("hide");
					recuperarDatos();
					}
		});
	}

</script>
</body>
</html>















