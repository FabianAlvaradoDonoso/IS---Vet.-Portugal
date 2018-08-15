<?php
    include '../../cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

	mysqli_set_charset($conexion, "utf8");

    $tmp="";
    $prov = "p.ID_PROVEEDOR LIKE '%".$_POST["proveedor"]."%'";
    if($_POST["proveedor"] != ''){ $prov = "p.ID_PROVEEDOR = '".$_POST["proveedor"]."'";}

    $cate = "p.ID_CATEGORIA LIKE '%".$_POST["categoria"]."%'";
    if($_POST["categoria"] != ''){ $cate = "p.ID_CATEGORIA = '".$_POST["categoria"]."'";}

    $bode = "p.ID_BODEGA LIKE '%".$_POST["bodega"]."%'";
    if($_POST["bodega"] != ''){ $bode = "p.ID_BODEGA = '".$_POST["bodega"]."'";}


    $sql="SELECT
    p.CODIGO,
    c.NOMBRE_CATEGORIA AS CATEGORIA,
    r.NOMBRE_PROVEEDOR AS PROVEEDOR,
    p.NOMBRE,
    p.PRECIO_VENTA,
    p.PRECIO_NETO,
    p.FECHA_VENC,
    p.FECHA_ADQ,
    p.STOCK_MIN,
    p.STOCK_ACT,
    b.NOMBRE_BODEGA AS BODEGA,
    IF((p.FECHA_VENC BETWEEN CURDATE() AND ADDDATE(CURDATE(), INTERVAL 2 MONTH)),'table-warning','') AS POR_VENCER,
    IF(p.FECHA_VENC < CURDATE(), 'table-danger', '') AS VENCIDO,
    IF(p.FECHA_VENC < CURDATE(), 'danger', 'danger') AS VENCIDO2 
    
    FROM
        productos p
    INNER JOIN bodega b ON
        (p.ID_BODEGA = b.ID_BODEGA)
    INNER JOIN categoria c ON
        (
            p.ID_CATEGORIA = c.ID_CATEGORIA
        )
    INNER JOIN proveedor r ON
        (
            p.ID_PROVEEDOR = r.ID_PROVEEDOR
        )
    WHERE
        (p.CODIGO LIKE '%".$_POST["codigo"]."%' OR p.NOMBRE LIKE '%".$_POST["codigo"]."%') AND 
        {$bode} AND {$prov} AND {$cate} AND
        (p.FECHA_VENC LIKE '%".$_POST["fechaVenc"]."%' OR p.FECHA_VENC IS NULL) AND p.FECHA_ADQ LIKE '%".$_POST["fechaAdq"]."%'";
    
    
    
    $tmp="<div class='table-responsive'><table class='table table-striped table-hover table-sm'>
        <thead align='center' class='thead-light'><tr>
            <th align='center'>CODIGO</th>
            <th align='center'>CATEGORIA</th>
            <th align='center'>PROVEEDOR</th>
            <th align='center'>NOMBRE</th>
            <th align='center'>PRECIO VENTA</th>
            <th align='center'>PRECIO NETO</th>
            <th align='center'>FECHA VENC</th>
            <th align='center'>FECHA ADQ</th>
            <th align='center'>STOCK MIN</th>
            <th align='center'>STOCK ACT</th>
            <th align='center'>Bodega</th>
            <th align='center'>ACCIONES</th>
        <tr></thead><tbody>";

    $res=mysqli_query($conexion,$sql);
    while ($row=mysqli_fetch_array($res)){
        $codigo = $row["CODIGO"];
        $categoria = $row["CATEGORIA"];
        $proveedor = $row["PROVEEDOR"];
        $nombre = $row["NOMBRE"];
        $precioVenta = $row["PRECIO_VENTA"];
        $precioNeto = $row["PRECIO_NETO"]; 
        $fechaVenc3;
        if($row["FECHA_VENC"]== null){
            $fechaVenc = '-';
            $fechaVenc2 = '-';
            $fechaVenc3 = '1';
        }else{
            $fechaVenc = date_format(date_create($row["FECHA_VENC"]), 'Y/m/d');
            $fechaVenc2 = date_format(date_create($row["FECHA_VENC"]), 'Y / m / d');
            $fechaVenc3 = '0';
        } 
        $fechaAdq = date_format(date_create($row["FECHA_ADQ"]), 'Y/m/d');
        $stockMin = $row["STOCK_MIN"];
        $stockAct = $row["STOCK_ACT"];
        $bodega = $row["BODEGA"];
        $class = $row["POR_VENCER"];
        if($class == ''){$class = $row["VENCIDO"];}
        setlocale(LC_MONETARY, 'en_US');

        $tmp.= "<tr class='".$class."'>
                    <td>" . $row["CODIGO"] . "</td>
                    <td>" . $row["CATEGORIA"] . "</td>
                    <td>" . $row["PROVEEDOR"] . "</td>
                    <td>" . $row["NOMBRE"] . "</td>
                    <td align='right'>$ " . number_format($row["PRECIO_VENTA"], 0, ',', '.') . "</td>
                    <td align='right'>$ " . number_format($row["PRECIO_NETO"], 0, ',', '.') . "</td>
                    <td>" . $fechaVenc2 . "</td>
                    <td>" . date_format(date_create($row["FECHA_ADQ"]), 'Y / m / d') . "</td>
                    <td>" . $row["STOCK_MIN"] . "</td>
                    <td>" . $row["STOCK_ACT"] . "</td>
                    <td>" . $row["BODEGA"] . "</td>
                    <td align='center'><button type='button' class='btn btn-outline-success btn-sm' onclick='mostrarModalModificar(\"$codigo\",\"$categoria\",\"$proveedor\",\"$nombre\",\"$precioVenta\",\"$precioNeto\",\"$fechaVenc\",\"$fechaAdq\",\"$stockMin\",\"$stockAct\",\"$bodega\", \"$fechaVenc3\")'><span class='fas fa-edit'</span></button>
                    <button type='button' class='btn btn-outline-".$row["VENCIDO2"]." btn-sm' onclick='mostrarModal(\"$codigo\",\"$categoria\",\"$proveedor\",\"$nombre\",\"$bodega\")'><span class='fas fa-trash-alt'></span></button></td>
                </tr>";
    }
    $tmp.= "</tbody></table></div>";
    echo $tmp;
    
?>