<?php
    include '../../cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

    mysqli_set_charset($conexion, "utf8");
    
    $codigo = $_POST["codigo"];
    $stockMin = $_POST["stockMin"];
    $stockAct = $_POST["stockAct"];
    
    $sql="UPDATE
                productos
            SET
                STOCK_MIN = '".$stockMin."',
                STOCK_ACT = '".$stockAct."'
            WHERE
                CODIGO = '".$codigo."' ";
    
    $res=mysqli_query($conexion,$sql);

    
?>