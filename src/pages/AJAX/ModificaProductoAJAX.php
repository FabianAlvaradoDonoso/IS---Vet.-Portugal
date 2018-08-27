<?php
    include '../../cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

    mysqli_set_charset($conexion, "utf8");
    
    $texto1 = $_POST[("txtCodigoModal")];
    $codOri = $_POST[("txtCodigoOriginalModal")];
    $texto2 = $_POST[("cbCategoriaModal")];
    $texto3 = $_POST[("cbProveedorModal")];
    $texto4 = $_POST[("txtNombreModal")];
    $texto5 = $_POST[("nudPrecioVentaModal")];
    $texto6 = $_POST[("nudPrecioNetoModal")];
    $texto7 = $_POST[("dtpFechaVencModal")];
    $texto8 = $_POST[("dtpFechaAdqModal")];
    $texto9 = $_POST[("nudStockMinModal")];
    $texto10 = $_POST[("nudStockActModal")];
    $texto11 = $_POST[("cbBodegaModal")];
    
    $sql="UPDATE
                productos
            SET
                CODIGO = '".$texto1."',
                ID_CATEGORIA = '".$texto2."',
                ID_PROVEEDOR = '".$texto3."',
                NOMBRE = '".$texto4."',
                PRECIO_VENTA = '".$texto5."',
                PRECIO_NETO = '".$texto6."',
                FECHA_VENC = '".$texto7."',
                FECHA_ADQ = '".$texto8."',
                STOCK_MIN = '".$texto9."',
                STOCK_ACT = '".$texto10."',
                ID_BODEGA = '".$texto11."'
            WHERE
                CODIGO = '".$codOri."' ";
    
    if($texto7 == 'null'){
        $sql="UPDATE
                    productos
                SET
                    CODIGO = '".$texto1."',
                    ID_CATEGORIA = '".$texto2."',
                    ID_PROVEEDOR = '".$texto3."',
                    NOMBRE = '".$texto4."',
                    PRECIO_VENTA = '".$texto5."',
                    PRECIO_NETO = '".$texto6."',
                    FECHA_VENC = null,
                    FECHA_ADQ = '".$texto8."',
                    STOCK_MIN = '".$texto9."',
                    STOCK_ACT = '".$texto10."',
                    ID_BODEGA = '".$texto11."'
                WHERE
                    CODIGO = '".$codOri."' ";
    }
    
    $res=mysqli_query($conexion,$sql);

    
?>