<?php
    include '../src/cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

	mysqli_set_charset($conexion, "utf8");

    $tmp="";
    //$sql="SELECT * FROM productos2";
    $sql="UPDATE productos SET ID_CATEGORIA= '".$_POST["cbCategoriaModal"]."', ID_PROVEEDOR='".$_POST["cbProveedorModal"]."', NOMBRE='".$_POST["txtNombreModal"]."', PRECIO_VENTA='".$_POST["nudPrecioVentaModal"]."', PRECIO_NETO='".$_POST["nudPrecioNetoModal"]."', FECHA_VENC='".$_POST["dtpFechaVencModal"]."', FECHA_ADQ='".$_POST["dtpFechaAdqModal"]."', STOCK_MIN='".$_POST["nudStockMinModal"]."', STOCK_ACT='".$_POST["nudStockActModal"]."', ID_BODEGA='".$_POST["cbBodegaModal"]."' WHERE CODIGO = '".$_POST["txtCodigoModal"]."'";
    
    
    $res=mysqli_query($conexion,$sql);

    
?>