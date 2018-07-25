<?php

    include '../../cnx.php';
    if(mysqli_connect_errno()){
        echo "Error al conectar a la BBDD";
        exit();
    }

    mysqli_set_charset($conexion, "utf8");

    $tmp="";
    $codigo = $_POST["codigo"];

    $sql="SELECT STOCK_ACT FROM productos WHERE CODIGO = '".$codigo."'";
    $res=mysqli_query($conexion,$sql);
    while ($row=mysqli_fetch_array($res)){
        $tmp = $row["STOCK_ACT"];
    }

    echo $tmp;
?>   
    