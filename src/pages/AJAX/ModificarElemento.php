<?php
    include '../../cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

    mysqli_set_charset($conexion, "utf8");
    $nombre = $_POST[("txtNombreElemento")];
    $ID = $_POST[("id")];
    $campoID = $_POST[("campoID")];
    $tabla=$_POST[("tabla")];
    $campo=$_POST[("campo")];
    
$sql="UPDATE ".$tabla." SET ".$campo." = '".$nombre."' WHERE ".$campoID." = '".$ID."'";
    
    $res=mysqli_query($conexion,$sql);

?>

