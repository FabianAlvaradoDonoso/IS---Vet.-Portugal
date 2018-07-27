<?php
    include '../../cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

    mysqli_set_charset($conexion, "utf8");
    $nombre = $_POST[("txtElementoNombre")];
    $sql="INSERT INTO categoria(NOMBRE_CATEGORIA) 
          VALUES ('".$nombre"')";
    
    $res=mysqli_query($conexion,$sql);

    
?>