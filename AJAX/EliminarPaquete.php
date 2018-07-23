<?php
    include '../Conexion/cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

	mysqli_set_charset($conexion, "utf8");

    $tmp="";
    //$sql="SELECT * FROM productos2";
    $sql="DELETE FROM paquetito WHERE ID_PAQUETITO = '".$_POST["id"]."'";
    
    
    $res=mysqli_query($conexion,$sql);

    
?>