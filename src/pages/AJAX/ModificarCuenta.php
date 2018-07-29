<?php
    include '../../cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

    mysqli_set_charset($conexion, "utf8");
    $nombre = $_POST[("nombre")];
    $ID = $_POST[("id")];
    $pass = $_POST[("pass")];
    $user = $_POST[("user")];
    $cargo = $_POST[("cargo")];

    $sql="UPDATE usuarios SET 
    nombre = '".$nombre."',
    user = '".$user."',
    pass = '".$pass."',
    cargo= '".$cargo."' WHERE id = '".$ID."'";
    
    $res=mysqli_query($conexion,$sql);

    
?>