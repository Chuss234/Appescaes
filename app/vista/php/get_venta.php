<?php
$mvcDatos=new GetDatos();
switch ($_POST["op"]) {
	case '1':
		$resultado=$mvcDatos->consultaGen("SELECT v.id_vent, c.nombre, u.usuario, p.producto, i.tipo_venta, v.precio, v.unidades, v.total, v.fecha FROM (((( venta v 
			INNER JOIN usuarios u USING(id_usr))
			INNER JOIN clientes c USING(id_clie))
			INNER JOIN producto p USING(id_prod))
			INNER JOIN tipo_venta i USING(id_inex))
			;");
		$info=array('success'=>true,'data'=>$resultado);
		break;
	case '2':
		
		$status=false;
		$msg='';
			# code...
		
			$resultado=$mvcDatos->consultaGen("Select * from venta where id_vent='{$_POST['id_vent']}'");
			if (count($resultado)>0) {
				$status=false;
				$msg="La venta ya existe";
			}else {
				$cod=$mvcDatos->insertar("Insert into venta set 
					id_prod='{$_POST['id_prod']}', 
					id_clie='{$_POST['id_clie']}', 
					id_usr='{$_POST['id_usr']}', 
					id_inex='{$_POST['id_inex']}', 
					precio='{$_POST['precio']}', 
					unidades='{$_POST['unidades']}',
					total='{$_POST['total']}' ");
				$status=true;
			}
				$resultado=$mvcDatos->consultaGen("Select * from venta  id_vent<>'".$_POST["id_vent"]."'");
							if (count($resultado)>0) {
								$status=false;
								$msg="El producto ya existe";
							} else {
								$cod=$mvcDatos->actualizar("update venta set  
									id_prod='".$_POST["id_prod"]."', 
									id_clie='".$_POST["id_clie"]."', 
									id_usr='".$_POST["id_usr"]."', 
									id_inex='".$_POST["id_inex"]."', 
									precio='".$_POST["precio"]."',
									total='".$_POST["total"]."',
									unidades='".$_POST["unidades"]."'
									where id_id_vent='".$_POST["id_vent"]."'");
								$status=true;
							}
							
						$msg=($msg!="" ? $msg : "Registro guardado con exito");
						$info=array("success"=>$status,"msg"=>$msg);
						break;	
	case '3':
			$resultado=$mvcDatos->consultaGen("Select * from venta where id_vent='".$_POST["id"]."'");
			$info = array('status' => true,'data'=>$resultado);
			break;
	default:
		# code...
		break;

}
echo json_encode($info);
?>