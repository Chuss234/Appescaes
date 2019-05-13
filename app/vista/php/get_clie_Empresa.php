<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$mvcDatos=new GetDatos();
switch ($_POST["op"]) {
	case '1':
		$resultado=$mvcDatos->consultaGen("Select * from clientes where tipo_cliente = 1;");
		$info=array('success'=>true,'data'=>$resultado);
		break;
	case '2':
		
		$status=false;
		$msg='';
			# code...
		
			$resultado=$mvcDatos->consultaGen("Select * from clientes where id_cliente='{$_POST['id']}'");
			if (count($resultado)>0) {
				$status=false;
				$msg="El contacto ya existe";
			}else {
				$cod=$mvcDatos->insertar("Insert into clientes set 
					contacto='{$_POST['contacto']}', 
					correo='{$_POST['correo']}',
					telefono='{$_POST['telefono']}', 
					direccion='{$_POST['direccion']}',
					tipo_cliente='{$_POST['tipo_cliente']}', 
					nit='{$_POST['nit']}' ");
				$status=true;
			}
			$resultado=$mvcDatos->consultaGen("Select * from clientes  id_cliente<>'".$_POST["id"]."'");
			if (count($resultado)>0) {
				$status=false;
				$msg="El contacto ya existe";
			} else {
				$cod=$mvcDatos->actualizar("update clientes set  
					contacto='".$_POST["contacto"]."',  
					correo='".$_POST["correo"]."',
					telefono='".$_POST["telefono"]."',
					direccion='".$_POST["direccion"]."',
					tipo_cliente='".$_POST["tipo_cliente"]."'
					where id_prod='".$_POST["id_prod"]."'");
				$status=true;
			}
			
		$msg=($msg!="" ? $msg : "Registro guardado con exito");
		$info=array("success"=>$status,"msg"=>$msg);
		break;
		case '3':
			$resultado=$mvcDatos->borrar("DELETE FROM clientes WHERE id_cliente='{$_POST['id']}'");
			break;
		case '4':
			$resultado=$mvcDatos->consultaGen("Select * from clientes where id_cliente='".$_POST["id"]."'");
			$info = array('status' => true,'data'=>$resultado);
			break;
}
echo json_encode($info);
?>