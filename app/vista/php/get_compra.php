<?php
$mvcDatos=new GetDatos();
switch ($_POST["op"]) {
	case '1':
		$resultado=$mvcDatos->consultaGen("SELECT d.id_comp, p.producto, u.usuario, pr.proveedor, d.precio, d.unidades, d.total, d.fecha FROM (((compra d 
			INNER JOIN producto p USING(id_prod))
			INNER JOIN usuarios u USING(id_usr))
			INNER JOIN proveedor pr USING(id_prov));");
		$info=array('success'=>true,'data'=>$resultado);
		break;
	case '2':
		
		$status=false;
		$msg='';
			# code...
		
			$resultado=$mvcDatos->consultaGen("Select * from compra where id_comp='{$_POST['id_comp']}'");
			if (count($resultado)>0) {
				$status=false;
				$msg="La venta ya existe";
			}else {
				$cod=$mvcDatos->insertar("Insert into compra set 
					id_prod='{$_POST['id_prod']}', 
					id_usr='{$_POST['id_usr']}', 
					id_prov='{$_POST['id_prov']}', 
					precio='{$_POST['precio']}', 
					unidades='{$_POST['unidades']}',
					total='{$_POST['total']}' ");
				$status=true;
			}
			
			
		$msg=($msg!="" ? $msg : "Registro guardado con exito");
		$info=array("success"=>$status,"msg"=>$msg);
		break;	
	
	default:
		# code...
		break;
}
echo json_encode($info);
?>