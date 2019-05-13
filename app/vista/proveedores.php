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

 <!--  contenido -->
<section class="contenido">
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
					<h1 class="box-title"><button class="btn btn-success" onclick="agregarProv();" id="btnagregar"><i class="fa fa-plus-circle"></i> Agrega Proveedor</button></h1>
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
		<div class="modal" tabindex="-1" role="dialog" id="myModal">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Agregar Proveedor</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form class="form-horizontal" role="form" id="miform" enctype="multipart/form-data">
						<input type="hidden" name="id_prov" id="id_prov" value="0" class="campo">
						<div class="modal-body">
							<div class="form-group row">
								<label for="cua" class="col-sm-4 col-form-label">CUA:</label>
								<div class="col-sm-8">
									<input type="text" name="cua" id="cua" class="form-control campo" placeholder="Codigo Unico Apicultor" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="proveedor" class="col-sm-4 col-form-label">Proveedor:</label>
								<div class="col-sm-8">
									<input type="text" name="proveedor" id="proveedor" class="form-control campo" placeholder="Proveedor" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="telefono" class="col-sm-4 col-form-label">Telefono:</label>
								<div class="col-sm-8">
									<input type="text" name="telefono" id="telefono" class="form-control campo" placeholder="Telefono" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="direccion" class="col-sm-4 col-form-label">Direccion:</label>
								<div class="col-sm-8">
									<input type="text" name="direccion" id="direccion" class="form-control campo" placeholder="Direccion" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="email" class="col-sm-4 col-form-label">Correo:</label>
								<div class="col-sm-8">
									<input type="text" name="email" id="email" class="form-control campo" placeholder="Correo">
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

	<div class="container">
	
		<div id="contentTable" >
			
			
				</div>
	
	</div>
	

  		<div class="container">
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
		$("#miform").submit(function(event){
			event.preventDefault();
			guardar();
			recuperarDatos();
			$("#myModal").modal("hide")
		});
	});
	function editar(id) {
    $.ajax({
      dataType: "json",
      url:"<?php echo controlador::$rutaAPP?>index.php?action=getprov",
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
         // blockDiv("body",2);
         
      }
    }); 
  }
	function Borrar(id) {
        $.ajax({
          dataType: "json",
          url:"<?php echo controlador::$rutaAPP?>index.php?action=getprov",
          data:{op:3,id:id},
          type:'POST',
          success: function(data,x) {          
            if (data.status==true) {
              recuperarDatos();
            }
          },
          error: function(s,x,y) {
          	  recuperarDatos();
             // blockDiv("body",2);
             
          }
        }); 
      }
	function recuperarDatos(){
		//blockDiv("body",1);
		$.ajax({
			dataType:"json",
			url:"<?php echo controlador::$rutaAPP;?>index.php?action=getprov",	
			data:{op:1},
			type:"POST",
			success: function(data) {
				//blockDiv("body",2);
				if (data.success==true) {
					var html="<table  id='tableContentData' class='table table-striped table-bordered'><thead><tr>";
					html+="<th>Corr</th>";
					html+="<th>CUA</th>";
					html+="<th>Proveedor</th>";
					html+="<th>Telefono</th>";
					html+="<th>Direccion</th>";
					html+="<th>Correo</th>";
					html+="<th>Editar</th>";
					html+="<th>Borrar</th>";
					html+="</tr></thead><tbody>";
					data.data.forEach(function(item,index){
						html+="<tr>";
						html+="<td style='text-align:center;'>"+(index+1)+"</td>";
						html+="<td>"+item.cua+"</td>";
						html+="<td>"+item.proveedor+"</td>";
						html+="<td>"+item.telefono+"</td>";
						html+="<td>"+item.direccion+"</td>";
						html+="<td>"+item.email+"</td>";
						html+="<td><button class='btn btn-primary btn-circle' onclick='editar("+item.id_prov+")'><i class='fas fa-user-edit'></i></button></td>";
						html+="<td><button class='btn btn-danger btn-circle custom-confirmation' data-id='"+item.id_prov+"'><i class='fas fa-user-times'></i></button></td>";
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
	function agregarProv() {
		$("#myModal").modal("show");
		$(".campo").val("");
		$("#id_prov").val("0");
		$(".fileinput").fileinput("clear");
	}
    function guardar() {
		var formData=new FormData($("#miform")[0]);
		formData.append("op",2);
		$.ajax({
			dataType:"json",
			url:"<?php echo controlador::$rutaAPP;?>index.php?action=getprov",
			type:"POST",
			async:false,
			cache:false,
			processData:false,
			contentType:false,
			data: formData,
			success: function(data) {
				if (data.success==false) {
					
				} else {
					$("#myModal").modal("hide");
					recuperarDatos();
				}
			},
			error: function(response) {
				
			}
		});
	}

</script>
</body>
</html>
