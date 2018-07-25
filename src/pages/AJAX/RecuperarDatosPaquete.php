<?php

    include '../../cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

	mysqli_set_charset($conexion, "utf8");

    $tmp="";
    //$sql="SELECT * FROM `productos2`";
    
    $sql="SELECT
            NOMBRE_PAQUETITO,
            PRECIO_PAQUETITO,
            IS_FAV,
            IS_OPERACION
        FROM
            paquetito
        WHERE
            ID_PAQUETITO = '".$_POST["id"]."'";


    setlocale(LC_MONETARY, 'en_US');
    $res=mysqli_query($conexion,$sql);
    while ($row=mysqli_fetch_array($res)){
        $tmp.= "".$row["NOMBRE_PAQUETITO"]."@?".$row["PRECIO_PAQUETITO"]."@?".$row["IS_FAV"]."@?".$row["IS_OPERACION"]."";
    }

    echo $tmp;

?>   
    