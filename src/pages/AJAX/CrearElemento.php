<?php
    include '../../cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

    mysqli_set_charset($conexion, "utf8");
    $nombre = $_POST[("txtNombreElemento")];
    $tabla= $_POST[("tabla")];
    $campo= $_POST[("campo")];    

    $sql="INSERT INTO ".$tabla."(".$campo.") 
          VALUES ('".$nombre."')";
    
    $res=mysqli_query($conexion,$sql);    
?>