<?php
    include '../Conexion/cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}
    
	mysqli_set_charset($conexion, "utf8");

    $tmp="";
    //$sql="SELECT * FROM `productos2`";
    
    if($_POST["fechaRDesde"] != "" and $_POST["fechaRHasta"] != ""){
        $sql="SELECT p.CODIGO, c.NOMBRE_CATEGORIA AS CATEGORIA, r.NOMBRE_PROVEEDOR AS PROVEEDOR, p.NOMBRE, p.PRECIO_VENTA, p.PRECIO_NETO, p.FECHA_VENC, p.FECHA_ADQ, p.STOCK_MIN, p.STOCK_ACT, b.NOMBRE_BODEGA AS BODEGA FROM productos p INNER JOIN bodega b ON (p.ID_BODEGA = b.ID_BODEGA) INNER JOIN categoria c ON ( p.ID_CATEGORIA = c.ID_CATEGORIA ) INNER JOIN proveedor r ON ( p.ID_PROVEEDOR = r.ID_PROVEEDOR ) WHERE p.FECHA_ADQ BETWEEN '".$_POST["fechaRDesde"]."' and '".$_POST["fechaRHasta"]."'";
        $tmp="<br><div class='table-responsive'><table class='table table-striped table-hover table-sm table-bordered'>
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

        $codigo = $row["CODIGO"];
        $categoria = $row["CATEGORIA"];
        $proveedor = $row["PROVEEDOR"];
        $nombre = $row["NOMBRE"];
        $precioVenta = $row["PRECIO_VENTA"];
        $precioNeto = $row["PRECIO_NETO"];
        $fechaVenc = date_format(date_create($row["FECHA_VENC"]), 'Y/m/d');
        $fechaAdq = date_format(date_create($row["FECHA_ADQ"]), 'Y/m/d');
        $stockMin = $row["STOCK_MIN"];
        $stockAct = $row["STOCK_ACT"];
        $bodega = $row["BODEGA"];


        $tmp.= "<tr>
                    <td>" . $row["CODIGO"] . "</td>
                    <td>" . $row["CATEGORIA"] . "</td>
                    <td>" . $row["PROVEEDOR"] . "</td>
                    <td>" . $row["NOMBRE"] . "</td>
                    <td align='right'>$ " . $row["PRECIO_VENTA"] . "</td>
                    <td align='right'>$ " . $row["PRECIO_NETO"] . "</td>
                    <td>" . date_format(date_create($row["FECHA_VENC"]), 'Y / m / d') . "</td>
                    <td>" . date_format(date_create($row["FECHA_ADQ"]), 'Y / m / d') . "</td>
                    <td>" . $row["STOCK_MIN"] . "</td>
                    <td>" . $row["STOCK_ACT"] . "</td>
                    <td>" . $row["BODEGA"] . "</td>
                    <td align='center'><button type='button' class='btn btn-outline-success btn-sm' onclick='mostrarModalModificar(\"$codigo\",\"$categoria\",\"$proveedor\",\"$nombre\",\"$precioVenta\",\"$precioNeto\",\"$fechaVenc\",\"$fechaAdq\",\"$stockMin\",\"$stockAct\",\"$bodega\",)'><span class='oi oi-pencil'></span></button>
                    <button type='button' class='btn btn-outline-danger btn-sm' onclick='mostrarModal(\"$codigo\",\"$categoria\",\"$proveedor\",\"$nombre\",\"$bodega\")'><span class='oi oi-trash'></span></button></td>
                </tr>";
    }
    echo "</tbody></table></div>";
    echo $tmp;
    }

    
?>