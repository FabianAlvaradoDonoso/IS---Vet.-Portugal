<?php
    include '../Conexion/cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

	mysqli_set_charset($conexion, "utf8");

    $tmp="";

    $sql="UPDATE productos SET STOCK_ACT='".$_POST["cantidad"]."' WHERE CODIGO = '".$_POST["codigo"]."'";
    
    
    $res=mysqli_query($conexion,$sql);

    
?>