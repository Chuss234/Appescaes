<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "../../modelo/getDatos.php";
$mvcDatos=new GetDatos();
$resultado=$mvcDatos->consultaGen("SELECT * FROM ventas INNER JOIN det_venta USING (id_vent) WHERE id_vent = '{$_GET["cod"]}'");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="http://localhost/Appescaes/app/vista/libs/bootstrap.min.css" rel="stylesheet">

    <style>
        @page {
            margin-left: 1em;
            margin-right: 1em;

        }

        .page td {
            padding:5; margin:0;
        }

        #page {
            border-collapse: collapse;
        }
        .polig{
            width:20px;
            height:8px;
            background:#F0F0F0;
            font-family:arial;
            border: 1 ridge #000000;
        }

        *{
            font-size: 9px;
            font-family: Verdana;
        }
        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 50px;

        }


    </style>
</head>
<body>

    <table class="page" border="0">
        <tr>
            <th style="text-align: center;">
                <img width="50px"  src="app/vista/libs/images/log.png" alt="">

            </th>
            <th style="text-align: center">
                <p>
                    SOCIEDAD COOPERATIVA DE APICULTORES DE EL SALVADOR DE RL -
                    OFICINA CENTRAL
                </p>
            </th>
            <th  >
                <div style="padding: 0px;border-radius 24px;border: 4px double #000;text-align: center">
                    <p style="margin-top: -1px">Numero de la factura</p> <br>
                    <p style="color: red;margin: 0;margin-top: -15;font-size: 10px">N 0000<?php echo $resultado['0']['id_vent'];?></p>
                    No registro:051515454
                    NIT:3554545051515454
                </div>

            </th>
        </tr>
        <tr>
            <td colspan="2">
                Cliente: <u><b><?php echo $resultado['0']['cliente'];?></b></u>
            </td>
            <td colspan="" style="text-align: center">
                Fecha: <u><b><?php echo $resultado['0']['fecha'];?></b></u>
            </td>

        </tr>
        <tr>
            <td colspan="2" >
                <div style="float: left" class="polig">

                </div
                <div style="float: left;">
                    &nbsp;Contado &nbsp;&nbsp;
                </div>
                <div style="float: left" class="polig">

                </div
                <div style="float: left;">
                    &nbsp;Credito por______dias
                </div>
                <div style="float: right">
                    NIT: <br>
                    Vendedor:
                </div>
                <br>
                    <b>Notas de remision_____________________</b>
            </td>

            <td colspan="1" >

                <p>
                    <b><?php echo $resultado['0']['nit'];?></b>

                    <br>

                    <b><?php echo $resultado['0']['usuario'];?></b>
                </p>
            </td>
        </tr>
    </table>
<table   style="text-align: center;"  width="100%">
    <tr >
        <th width="10px">Codigo</th>
        <th>Cantidad</th>
        <th >Descripcion</th>
        <th>Precio</th>
        <th>Sujetas</th>
        <th>excentas</th>
        <th>Afectas</th>
    </tr>
    <?php
    $suma = 0;
    $subtotal = 0;
    $iva = 1.13;
    $total= 0;
    for ($i = 0; $i < count($resultado); $i++) {
        ?>

        <tr>
            <td><?php echo $resultado["$i"]['n_serie']; ?></td>
            <td><?php echo $resultado["$i"]['unidades']; ?></td>
            <td><?php echo $resultado["$i"]['producto']; ?></td>
            <td><?php echo "$".$resultado["$i"]['precio']; ?></td>
            <td><?php echo ""?></td>
            <td><?php echo ""?></td>
            <td><?php echo "$". $suma = $resultado["$i"]['precio'] * $resultado["$i"]['unidades']; ?></td>
        </tr>


        <?php
        $total+=$suma;
    }
    ?>

</table>

    <footer>
        <table width="100%" STYLE="text-align: center;">\
            <tr>
                <td style="text-align: left" colspan="5">
                    <b>SON :</b>
                </td>
                <td style="text-align: left">
                    SubTotal
                </td>
                <td >
                    <?php $subtotal = $total / $iva; echo "$".round($subtotal,2);?>
                </td>
            </tr>
            <tr>
                <td style="text-align: left" colspan="2">
                    <b>Nombres:</b>
                </td>

                <td style="text-align: left" colspan="3">
                    <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombres:</b>
                </td>

                <td style="text-align: left" colspan="1">
                    Ventas excentas
                </td>

                <td colspan="1" >

                </td>
            </tr>
            <tr>
                <td style="text-align: left" colspan="2">
                    <b>DUI:</b>
                </td>

                <td style="text-align: left" colspan="3">
                    <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DUI:</b>
                </td>

                <td style="text-align: left" colspan="1">
                    Ventas no sujetas
                </td>

                <td colspan="1" >

                </td>
            </tr>
            <tr>
                <td style="text-align: left" colspan="2">
                    <b>Firma de entrega:</b>
                </td>

                <td style="text-align: left" colspan="3">
                    <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Firma de recibido:</b>
                </td>

                <td style="text-align: left" colspan="1">
                    <b>IVA 13%</b>
                    <br>
                    <b>Total de ventas</b>
                </td>
                <td >
                    <?php $totaliva= $subtotal*0.13 ;echo "$".round($totaliva,2);?>
                    <br>
                    <?php echo "$".$total = $subtotal+$totaliva;?>
                </td>
            </tr>
        </table>
    </footer>

</body>
</html>