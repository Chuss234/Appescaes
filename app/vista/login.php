<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Inicio de sesión</title>
	<?php include_once __dir__ . "/recursos/css.php";?>
</head>
	<div class="container py-5">
		<div class="row">
			<div class="col-md-6 mx-auto">
				<div class="card">
					<div class="card-header" style="text-align: center;">
						<h1>Login</h1>
					</div>
				  <div class="card-body">
				    <form class="form-signin" id="loginForm">
				    	<div class="form-label-group mb-4">
				    		Usuario
				    		<input type="text" id="user" pattern="[A-Za-z0-9]+" class="form-control">
				    	</div>
				    	<div class="form-label-group mb-4">
				    		Contraseña
				    		<input type="password" id="pass" pattern="[A-Za-z0-9]+" class="form-control">
				    	</div>
				    	<div class="alert alert-danger mb4 d-none" role="alert" id="mensaje">
				    		<span>

				    		</span>
				    	</div>
				    	<button class="btn btn-lg btn-secondary btn-block mt-4" type="submit">Login</button>
						<p class="text-muted mt-2 text-center">
    							XCode&copy;2018
    						</p>		    	
				    </form>
				  </div>
				</div>
			</div>
		</div>
	</div>
	
	<section class="pie">
    <?php include_once __dir__ . "/secciones/pie.php";?>
</section>
</div>


<!-- jQuery Y--> <!-- Bootstrap 4 -->
  <?php include_once __dir__ . "/recursos/script.php";?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#loginForm").submit(function(event){
			event.preventDefault();
			$.ajax({
				dataType:"json",
				url:"<?php echo controlador::$rutaAPP?>index.php?action=validar",
				type:"POST",
				data:{usr:$("#user").val(),pass:$("#pass").val()},
				success: function(data) {
					if (data.success==false) {
						$("#mensaje").removeClass("d-none");
						$("#mensaje span").html(data.msg);
					} else {
						window.location=data.link;
					}
				},
				error: function(response) {

				}
			});
		});
	});
</script>
</body>
</html>