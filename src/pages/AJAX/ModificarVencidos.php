<?php
    include '../../cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

    mysqli_set_charset($conexion, "utf8");
    
    $codigo = $_POST["codigo"];
    $fechaV = $_POST["fechaV"];
    $fechaA = $_POST["fechaA"];
    $stock = $_POST["stock"];
    
    $sql="UPDATE
                productos
            SET
                FECHA_VENC = '".$fechaV."',
                FECHA_ADQ = '".$fechaA."',
                STOCK_ACT = '".$stock."'
            WHERE
                CODIGO = '".$codigo."' ";
    
    $res=mysqli_query($conexion,$sql);

    
?>