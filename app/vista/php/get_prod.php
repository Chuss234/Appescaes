<?php
$mvcDatos=new GetDatos();
switch ($_POST["op"]) {
	case '1':
		$resultado=$mvcDatos->consultaGen("Select * from producto");
		$info=array('success'=>true,'data'=>$resultado);
		break;
	case '2':
		$status=false;
		$msg='';
		if ($_POST["id_prod"]=="0") {
			$resultado=$mvcDatos->consultaGen("Select * from producto where n_serie='{$_POST['n_serie']}'");
			if (count($resultado)>0) {
				$status=false;
				$msg="El producto ya existe";
			} else {
				$cod=$mvcDatos->insertar("insert into producto set 
					n_serie='{$_POST['n_serie']}', 
					producto='{$_POST["producto"]}', 
					presentacion='{$_POST['presentacion']}', 
					precio_venta='{$_POST['precio_venta']}',  
					det_prod='{$_POST['det_prod']}'");
					$status=true;
			}
		}else {
			$resultado=$mvcDatos->consultaGen("Select * from producto where producto='".$_POST["producto"]."' and id_prod<>'".$_POST["id_prod"]."'");
			if (count($resultado)>0) {
				$status=false;
				$msg="El producto ya existe";
			} else {
				$cod=$mvcDatos->actualizar("update producto set 
					n_serie='".$_POST["n_serie"]."', 
					producto='".$_POST["producto"]."', 
					presentacion='".$_POST["presentacion"]."', 
					precio_venta='".$_POST["precio_venta"]."',
					det_prod='".$_POST["det_prod"]."'
					where id_prod='".$_POST["id_prod"]."'");
				$status=true;
			}
		}
		$msg=($msg!="" ? $msg : "Registro guardado con exito");
		$info=array("success"=>$status,"msg"=>$msg);
		break;
		case '3':
			$resultado=$mvcDatos->borrar("DELETE FROM producto WHERE id_prod='".$_POST["id"]."'");
			break;
		case '4':
			$resultado=$mvcDatos->consultaGen("Select * from producto where id_prod='".$_POST["id"]."'");
			$info = array('status' => true,'data'=>$resultado);
			break;
}
echo json_encode($info);
?>