<?php
$mvcDatos=new GetDatos();
switch ($_POST["op"]) {
	case '1':
		$resultado=$mvcDatos->consultaGen("SELECT i.id_inv, p.producto,m.estado, i.humedad, i.color, i.peso_neto, i.apiario, i.existencia, i.lote, i.fecha_extraccion, i.fecha_entrada, i.fecha_vencimiento FROM 
((inventario i INNER JOIN producto p USING(id_prod)) INNER JOIN muestras m USING(id_prod)); ");
		$info=array('success'=>true,'data'=>$resultado);
		break;
	case '2':
		
		$status=false;
		$msg='';
			# code...
		
			$resultado=$mvcDatos->consultaGen("SELECT * from inventario where id_inv='{$_POST['id_inv']}'");
			if (count($resultado)>0) {
				$status=false;
				$msg="El producto ya existe";
			}else {
				$cod=$mvcDatos->insertar("INSERT into inventario set 
					id_prod='{$_POST['id_prod']}',
					id_prov='{$_POST['id_prov']}',
					id_usr='{$_POST['id_usr']}', 
					humedad='{$_POST['humedad']}', 
					color='{$_POST['color_miel']}',
					peso_neto='{$_POST['peso_neto']}', 
					apiario='{$_POST['apiario']}',
					existencia='{$_POST['existencia']}',
					fecha_extraccion='{$_POST['fecha_extraccion']}',
					fecha_entrada='{$_POST['fecha_entrada']}'");
				$status=true;
			}
			$resultado=$mvcDatos->consultaGen("SELECT * from inventario  id_inv<>'".$_POST["id_inv"]."'");
			if (count($resultado)>0) {
				$status=false;
				$msg="El producto ya existe";
			} else {
				$cod=$mvcDatos->actualizar("UPDATE inventario set  
					humedad='".$_POST["humedad"]."', 
					color='".$_POST["color_miel"]."', 
					peso_neto='".$_POST["peso_neto"]."',
					apiario='".$_POST["apiario"]."',
					existencia='".$_POST["existencia"]."',
					fecha_extraccion='".$_POST["fecha_extraccion"]."',
					fecha_entrada='".$_POST["fecha_entrada"]."'
					where id_inv='".$_POST["id_inv"]."'");
				$status=true;
			}
			
		$msg=($msg!="" ? $msg : "Registro guardado con exito");
		$info=array("success"=>$status,"msg"=>$msg);
		break;
		case '4':
			$resultado=$mvcDatos->consultaGen("SELECT * from inventario where id_inv='".$_POST["id"]."'");
			$info = array('status' => true,'data'=>$resultado);
			break;
}
echo json_encode($info);
?>