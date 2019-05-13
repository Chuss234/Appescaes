<?php
$mvcDatos=new GetDatos();
switch ($_POST["op"]) {
    //id_prod,CONCAT(producto,'-',presentacion)as nombre
    case '1':
        $resultado=$mvcDatos->consultaGen("Select id_prod,id_inv,CONCAT(producto,'-',presentacion)as nombre FROM producto INNER JOIN inventario USING (id_prod)");
        $info=array('success'=>true,'data'=>$resultado);
        break;
    case '2':
        $tipo = $_POST["tipo"];
    $resultado=$mvcDatos->consultaGen("Select id_cliente, contacto,nit, CONCAT(nombres,'-',apellidos) as nombre,tipo_cliente FROM clientes WHERE tipo_cliente = $tipo");
    $info=array('success'=>true,'data'=>$resultado);
    break;
    case '3':
        /****Ultima venta*****/
        $resultado=$mvcDatos->consultaGen("SELECT AUTO_INCREMENT AS id_venta FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA ='escaesdb' AND TABLE_NAME = 'ventas'");
        $info=array('success'=>true,'data'=>$resultado);
        break;
    case '4':
        $resultado=$mvcDatos->consultaGen("Select id_prod,n_serie,det_prod,id_inv,CONCAT(producto,'-',presentacion)as nombre,precio_venta FROM producto INNER JOIN inventario USING (id_prod) WHERE id_inv = '{$_POST['id']}'");
        $info=array('success'=>true,'data'=>$resultado);
        break;
    case '5':
        $productos  = json_decode($_POST["data"],true);

        $mvcDatos->insertar("INSERT INTO ventas SET id_cliente = '{$productos['id_cliente']}',id_inex= '{$productos["inex"]}',nit = '{$productos['nit']}',cliente = '{$productos['cliente']}',fecha = sysdate(),usuario='{$productos['empleado']}'");
        for ($i=0;$i<count($productos["data"]);$i++){

            $mvcDatos->insertar("INSERT INTO det_venta SET id_vent = '{$productos['nventa']}',n_serie = '{$productos['data'][$i]['serie']}',id_inv = '{$productos['data'][$i]['inv']}',producto='{$productos['data'][$i]['nombre']}',precio='{$productos['data'][$i]['precio']}',unidades='{$productos['data'][$i]['cantidad']}'");

        }
        $info=array('success'=>true,'data'=>'ok');
    break;
    case '6':
        $resultado=$mvcDatos->consultaGen("SELECT ventas.*,SUM(precio*unidades) as total FROM ventas INNER JOIN det_venta USING (id_vent) GROUP BY id_vent");
        $info=array('success'=>true,'data'=>$resultado);
        break;

    default:
        # code...
        break;

}
echo json_encode($info);
?>