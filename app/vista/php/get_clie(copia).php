<?php
$mvcDatos=new GetDatos();
switch ($_POST["op"]) {
	case '1':
		$resultado=$mvcDatos->consultaGen("Select * from cliente_persona;");
		$info=array('success'=>true,'data'=>$resultado);
		break;
	case '2':
		
		$status=false;
		$msg='';
			$resultado=$mvcDatos->consultaGen("Select * from cliente_persona where id_cliente='{$_POST['id_cliente']}'");
			if (count($resultado)>0) {
				$status=false;
				$msg="El cliente ya existe";
			} else {
				$cod=$mvcDatos->insertar("Insert into cliente_persona set 
				id_cliente='{$_POST['id_cliente']}',
				 nombres='{$_POST['nombres']}', 
				 apellidos='{$_POST['apellidos']}', 
				 telefono='{$_POST['telefono']}', 
				 dui='{$_POST['dui']}', 
				 nit='{$_POST['nit']}', 
				 correo='{$_POST['correo']}' ");
				$status=true;
			}
			$resultado=$mvcDatos->consultaGen("Select * from cliente_persona  id_cliente<>'".$_POST["id_cliente"]."'");
			if (count($resultado)>0) {
				$status=false;
				$msg="ya existe";
			} else {
				$cod=$mvcDatos->actualizar("update cliente_persona set  
					nombres='{$_POST['nombres']}', 
					apellidos='{$_POST['apellidos']}', 
					telefono='{$_POST['telefono']}', 
				 	dui='{$_POST['dui']}', 
				 	nit='{$_POST['nit']}', 
				 	correo='{$_POST['correo']}' 
					where id_cliente='".$_POST["id_cliente"]."'");
				$status=true;
			}
		
		$msg=($msg!="" ? $msg : "Registro guardado con exito");
		$info=array("success"=>$status,"msg"=>$msg);
		break;
	case '3':
			$resultado=$mvcDatos->borrar("DELETE FROM cliente_persona WHERE id_cliente='".$_POST["id"]."'");
			break;

	case '4':
			$resultado=$mvcDatos->consultaGen("Select * from cliente_persona where id_cliente='".$_POST["id"]."'");
			$info = array('status' => true,'data'=>$resultado);
			break;
}
echo json_encode($info);
?>