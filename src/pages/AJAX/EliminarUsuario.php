<?php
    include '../../cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

	mysqli_set_charset($conexion, "utf8");

    $tmp="";
    
    $sql="DELETE FROM usuarios WHERE id = '".$_POST["id"]."'";
    
    
    $res=mysqli_query($conexion,$sql);

    
?>