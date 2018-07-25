<?php
    include '../../cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

    mysqli_set_charset($conexion, "utf8");
    $nombre = $_POST[("nombre")];
    $tmp="";
    
    $sql="SELECT ID_PAQUETITO as Resultado FROM paquetito WHERE NOMBRE_PAQUETITO = '".$nombre."'";
    $res=mysqli_query($conexion,$sql);
    while ($row=mysqli_fetch_array($res)){
        $tmp = $row["Resultado"];
    }
    echo $tmp;
    
?>