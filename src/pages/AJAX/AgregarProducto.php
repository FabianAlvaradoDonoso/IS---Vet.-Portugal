<?php
    include '../../cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

    mysqli_set_charset($conexion, "utf8");
    $texto1 = $_POST[("txtCodigoModalAgregar")];
    $texto2 = $_POST[("cbCategoriaModalAgregar")];
    $texto3 = $_POST[("cbProveedorModalAgregar")];
    $texto4 = $_POST[("txtNombreModalAgregar")];
    $texto5 = $_POST[("nudPrecioVentaModalAgregar")];
    $texto6 = $_POST[("nudPrecioNetoModalAgregar")];
    $texto7 = $_POST[("dtpFechaVencModalAgregar")];
    $texto8 = $_POST[("dtpFechaAdqModalAgregar")];
    $texto9 = $_POST[("nudStockMinModalAgregar")];
    $texto10 = $_POST[("nudStockActModalAgregar")];
    $texto11 = $_POST[("cbBodegaModalAgregar")];

    $tmp="";
    //$sql="SELECT * FROM productos2";
    $sql="INSERT INTO productos(CODIGO, ID_CATEGORIA, ID_PROVEEDOR, NOMBRE, PRECIO_VENTA, PRECIO_NETO, FECHA_VENC, FECHA_ADQ, STOCK_MIN, STOCK_ACT, ID_BODEGA) 
          VALUES ('".$texto1."','".$texto2."','".$texto3."','".$texto4."','".$texto5."','".$texto6."','".$texto7."','".$texto8."','".$texto9."','".$texto10."','".$texto11."')";
    
    $res=mysqli_query($conexion,$sql);

    
?>