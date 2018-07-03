<?php
    include '../Conexion/cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

	mysqli_set_charset($conexion, "utf8");

    $tmp="";
    //$sql="SELECT * FROM `productos2`";
    
    if($_POST["texto"] != ""){
        $sql="SELECT * FROM `productos2` WHERE DATE_FORMAT(`FECHA_ADQ`, '%Y/%m/%d') = '".$_POST["texto"]."'";
        $tmp="<div class='table-responsive'><table class='table table-striped table-hover table-sm table-bordered'>
            <thead><tr>
                <th>CODIGO</th>
                <th>CATEGORIA</th>
                <th>PROVEEDOR</th>
                <th>NOMBRE</th>
                <th>PRECIO VENTA</th>
                <th>PRECIO NETO</th>
                <th>FECHA VENC</th>
                <th>FECHA ADQ</th>
                <th>STOCK MIN</th>
                <th>STOCK ACT</th>
                <th>Bodega</th>
                <th align='center'>ACCIONES</th>
            <tr></thead><tbody>";
    
    $res=mysqli_query($conexion,$sql);
    while ($row=mysqli_fetch_array($res, MYSQL_ASSOC)){

        $tmp.= "<tr>
                    <td>" . $row["CODIGO"] . "</td>
                    <td>" . $row["CATEGORIA"] . "</td>
                    <td>" . $row["PROVEEDOR"] . "</td>
                    <td>" . $row["NOMBRE"] . "</td>
                    <td align='right'>$ " . $row["PRECIO_VENTA"] . "</td>
                    <td align='right'>$ " . $row["PRECIO_NETO"] . "</td>
                    <td>" . date_format(date_create($row["FECHA_VENC"]), 'd-m-Y') . "</td>
                    <td>" . date_format(date_create($row["FECHA_ADQ"]), 'd-m-Y') . "</td>
                    <td>" . $row["STOCK_MIN"] . "</td>
                    <td>" . $row["STOCK_ACT"] . "</td>
                    <td>" . $row["BODEGA"] . "</td>
                    <td align='center'><a href='Modificar_Producto.php?codigo=" . $row["CODIGO"] . "' type='' value='' class='btn btn-outline-success btn-sm'><span class='oi oi-pencil'></span></a><a href='Eliminar_Producto.php?codigo=" . $row["CODIGO"] . "' type='' value='' class='btn btn-outline-danger btn-sm'><span class='oi oi-trash'></span></a></td>
                </tr>";
    }
    echo "</tbody></table></div>";
    echo $tmp;
    }

    
?>