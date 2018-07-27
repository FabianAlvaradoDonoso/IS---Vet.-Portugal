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
    
    $sql="UPDATE `categoria` SET `NOMBRE_CATEGORIA` = '".$nombre"' WHERE `categoria`.`ID_CATEGORIA` = '".$ID"'";
    
    $res=mysqli_query($conexion,$sql);

    
?>