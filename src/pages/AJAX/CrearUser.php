<?php
    include '../../cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

    mysqli_set_charset($conexion, "utf8");
    $nombre = $_POST[("txtUserNombre")];
    $user = $_POST[("txtUserUser")];
    $pass = $_POST[("txtUserPass")];
    $cargo = $_POST[("txtUserCargo")];  

    
    $sql="INSERT INTO usuarios(nombre, user, pass, cargo) 
          VALUES ('".$nombre."','".$user."','".$pass."','".$cargo."')";
    
    $res=mysqli_query($conexion,$sql);

    
?>