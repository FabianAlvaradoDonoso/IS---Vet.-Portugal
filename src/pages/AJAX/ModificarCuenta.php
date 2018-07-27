<?php
    include '../../cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

    mysqli_set_charset($conexion, "utf8");
    $nombre = $_POST[("txtModificarNombre")];
    $ID = $_POST[("ID")];
    $tmp="";
    
    $sql="UPDATE `usuarios` SET `nombre` = '".$nombre"', WHERE `usuarios`.`id` = '".$ID"'";
    
    $res=mysqli_query($conexion,$sql);

    
?>