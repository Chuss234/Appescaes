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

  <title>Empresas</title>
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
					<h1 class="box-title"><button class="btn btn-success" onclick="agregarCliente();" id="btnagregar"><i class="fa fa-plus-circle"></i> Agregar Cliente</button></h1>
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
						<h5 class="modal-title">Agregar Cliente</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form class="form-horizontal" role="form" id="miform" enctype="multipart/form-data">
						<div class="modal-body">
							
							<div class="form-group row">
								<label for="contacto" class="col-sm-4 col-form-label">Contacto:</label>
								<div class="col-sm-8">
									<input type="text" name="contacto" id="contacto" class="form-control campo" placeholder="Nombre de la empresa" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="correo" class="col-sm-4 col-form-label">Correo:</label>
								<div class="col-sm-8">
									<input type="text" name="correo" id="correo" class="form-control campo" placeholder="Ejm: empresa@gmail.com">
								</div>
							</div>
							<div class="form-group row">
								<label for="telefono" class="col-sm-4 col-form-label">Telefono:</label>
								<div class="col-sm-8">
									<input type="text" name="telefono" id="telefono" class="form-control campo" placeholder="Telefono" >
								</div>
							</div>
							<div class="form-group row">
								<label for="direccion" class="col-sm-4 col-form-label">Direccion:</label>
								<div class="col-sm-8">
									<input type="text" name="direccion" id="direccion" class="form-control campo" placeholder="Direccion">
								</div>
							</div>
							<div class="form-group row">
								<label for="documento" class="col-sm-4 col-form-label">Nit:</label>
								<div class="col-sm-8">
									<input type="text" name="nit" id="nit" class="form-control campo" placeholder="Nit" >
								</div>
							</div>

							<div class="form-group row">
								<label for="tipo" class="col-sm-4 col-form-label">Tipo de Cliente:</label>
								<div class="col-sm-8">
									<select class="form-control campo" id="tipo_cliente" name="tipo_cliente">
										<option value="1" >Empresa</option>
									</select>
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
			<div id="contentTable">
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
      url:"<?php echo controlador::$rutaAPP?>index.php?action=getempresa",
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
          //blockDiv("body",2);
         
      }
    }); 
  }
	function Borrar(id) {
        $.ajax({
          dataType: "json",
          url:"<?php echo controlador::$rutaAPP?>index.php?action=getempresa",
          data:{op:3,id:id},
          type:'POST',
          success: function(data,x) {          
            if (data.status==true) {
              recuperarDatos();
            }
          },
          error: function(s,x,y) {
          	  recuperarDatos();
              //blockDiv("body",2);
             
          }
        }); 
      }

	function recuperarDatos(){
		//blockDiv("body",1);
		$.ajax({
			dataType:"json",
			url:"<?php echo controlador::$rutaAPP;?>index.php?action=getempresa",	
			data:{op:1},
			type:"POST",
			success: function(data) {
				//blockDiv("body",2);
				if (data.success==true) {
					var html="<table  id='tableContentData' class='table table-striped table-bordered'><thead><tr>";
					html+="<th>Cor</th>";
					html+="<th>Contacto</th>";
					html+="<th>Correo</th>";
					html+="<th>Telefono</th>";
					html+="<th>Direccion</th>";
					html+="<th>Nit</th>";
					html+="<th>Editar</th>";
					html+="<th>Borrar</th>";
					html+="</tr></thead><tbody>"
					data.data.forEach(function(item,index){
						html+="<tr>";
						let id = JSON.stringify(item.id_cliente)
						html+="<td style='text-align:center;'>"+(index+1)+"</td>";
						html+="<td>"+item.contacto+"</td>";
						html+="<td>"+item.correo+"</td>";
						html+="<td>"+item.telefono+"</td>";
						html+="<td>"+item.direccion+"</td>"
						html+="<td>"+item.nit+"</td>"
						html+="<td><button class='btn btn-primary btn-circle' onclick='editar("+id+")'><i class='fas fa-user-edit'></i></button></td>";
						html+="<td><button class='btn btn-danger btn-circle custom-confirmation' data-id='"+item.id_cliente+"'><i class='fas fa-user-times'></i></button></td>";
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
                        "next":       "&nbsp;&nbsp;Siguiente",
                        "previous":   "Anterior&nbsp;&nbsp;"
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
	function agregarCliente() {
		$("#myModal").modal("show");
		$(".campo").val("");
		$("#id_cliente").val("");
		$(".fileinput").fileinput("clear");
	}
    function guardar() {
		var formData=new FormData($("#miform")[0]);
		formData.append("op",2);
		$.ajax({
			dataType:"json",
			url:"<?php echo controlador::$rutaAPP;?>index.php?action=getempresa",
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
