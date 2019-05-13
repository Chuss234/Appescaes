<?php
$mvcDatos=new GetDatos();
switch ($_POST["op"]) {
	case '1':
		$resultado=$mvcDatos->consultaGen("Select * from proveedor;");
		$info=array('success'=>true,'data'=>$resultado);
		break;
	case '2':
		
		$status=false;
		$msg='';
			# code...
		if ($_POST["id_prov"]=="0") {
			$resultado=$mvcDatos->consultaGen("Select * from proveedor where cua='{$_POST['cua']}'");
			if (count($resultado)>0) {
				$status=false;
				$msg="El producto ya existe";
			} else {
				$cod=$mvcDatos->insertar("insert into proveedor set 
					cua='{$_POST['cua']}', 
					proveedor='{$_POST["proveedor"]}', 
					telefono='{$_POST['telefono']}', 
					direccion='{$_POST['direccion']}',  
					email='{$_POST['email']}'");
					$status=true;
			}
		}else{
			$resultado=$mvcDatos->consultaGen("Select * from proveedor where cua='".$_POST["cua"]."' and  id_prov<>'".$_POST["id_prov"]."'");
			if (count($resultado)>0) {
				$status=false;
				$msg="El usuario ya existe";
			} else {
				$cod=$mvcDatos->actualizar("update proveedor set
				  	cua='".$_POST["cua"]."',
					proveedor='".$_POST["proveedor"]."', 
					telefono='".$_POST["telefono"]."', 
					direccion='".$_POST["direccion"]."',
					email='".$_POST["email"]."'
					where id_prov='".$_POST["id_prov"]."'");
				$status=true;
			}
			}
		$msg=($msg!="" ? $msg : "Registro guardado con exito");
		$info=array("success"=>$status,"msg"=>$msg);
		break;
		case '3':
			$resultado=$mvcDatos->borrar("DELETE FROM proveedor WHERE id_prov='".$_POST["id"]."'");
			break;
		case '4':
			$resultado=$mvcDatos->consultaGen("Select * from proveedor where id_prov='".$_POST["id"]."'");
			$info = array('status' => true,'data'=>$resultado);
			break;
}
echo json_encode($info);
?>