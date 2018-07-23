<?php
    include '../Conexion/cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

	mysqli_set_charset($conexion, "utf8");

    $tmp="";
    //$sql="SELECT * FROM productos2";
    $sql="UPDATE
                paquetito
            SET
                NOMBRE_PAQUETITO = '".$_POST["nombre"]."',
                PRECIO_PAQUETITO = '".$_POST["precio"]."',
                IS_OPERACION = '".$_POST["tipoPaquete"]."',
                IS_FAV = '".$_POST["favorito"]."',
                COLOR = '".$_POST["color"]."'
            WHERE
                ID_PAQUETITO = '".$_POST["id"]."'";
    
    $res=mysqli_query($conexion,$sql);

    
?>