<?php
$mvcDatos=new GetDatos();
switch ($_POST["op"]) {
	case '1':
		$resultado=$mvcDatos->consultaGen("Select *,if(id_priv=1,'Administrador','Usuario') as tipo2 from usuarios");
		$info=array('success'=>true,'data'=>$resultado);
		break;
	case '2':
		$status=false;
		$msg='';
		if ($_POST["id_usr"]=="0") {
			$resultado=$mvcDatos->consultaGen("Select * from usuarios where usuario='{$_POST['usuario']}'");
			if (count($resultado)>0) {
				$status=false;
				$msg="El Usuario ya existe";
			} else {
				$cod=$mvcDatos->insertar("insert into usuarios set 
					usuario='{$_POST['usuario']}', 
					password=md5('{$_POST["password"]}'), 
					nombres='{$_POST['nombres']}', 
					apellidos='{$_POST['apellidos']}', 
					dui='{$_POST['dui']}', 
					nit='{$_POST['nit']}', 
					id_priv='{$_POST['id_priv']}'");
					$status=true;
			}
		}else {
			$resultado=$mvcDatos->consultaGen("Select * from usuarios where usuario='".$_POST["usuario"]."' and id_usr<>'".$_POST["id_usr"]."'");
			if (count($resultado)>0) {
				$status=false;
				$msg="El usuario ya existe";
			} else {
				$cod=$mvcDatos->actualizar("update usuarios set 
					usuario='".$_POST["usuario"]."', 
					password=if(password='".$_POST["password"]."', password,md5('".$_POST["password"]."')),
					nombres='".$_POST["nombres"]."', 
					apellidos='".$_POST["apellidos"]."', 
					dui='".$_POST["dui"]."',
					nit='".$_POST["nit"]."',
					id_priv='".$_POST["id_priv"]."'
					where id_usr='".$_POST["id_usr"]."'");
				$status=true;
			}
		}
		$msg=($msg!="" ? $msg : "Registro guardado con exito");
		$info=array("success"=>$status,"msg"=>$msg);
		break;
		case '3':
			$resultado=$mvcDatos->borrar("DELETE FROM usuarios WHERE id_usr='".$_POST["id"]."'");
			break;
		case '4':
			$resultado=$mvcDatos->consultaGen("Select * from usuarios where id_usr='".$_POST["id"]."'");
			$info = array('status' => true,'data'=>$resultado);
			break;
}
echo json_encode($info);
?>