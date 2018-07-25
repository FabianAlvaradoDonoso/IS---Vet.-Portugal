<?php
    include '../../cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

    mysqli_set_charset($conexion, "utf8");
    $nombre = $_POST[("nombre")];
    $precio = $_POST[("precio")];
    $tipoPaquete = $_POST[("tipoPaquete")];
    $favorito = $_POST[("favorito")];
    $color = $_POST[("color")];

    $tmp="";
    $sql="INSERT INTO paquetito(NOMBRE_PAQUETITO,PRECIO_PAQUETITO,IS_OPERACION,IS_FAV, COLOR) 
          VALUES ('".$nombre."','".$precio."',".$tipoPaquete.",".$favorito.", '".$color."')";
    
    $res=mysqli_query($conexion,$sql);


    
?>