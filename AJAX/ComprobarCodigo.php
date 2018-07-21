<?php
    include '../src/cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

    mysqli_set_charset($conexion, "utf8");
    $codigo = $_POST[("txtCodigoComprobar")];
    $tmp="";
    
    $sql="SELECT COUNT(NOMBRE) as Cantidad FROM productos WHERE CODIGO = '".$codigo."'";
    $res=mysqli_query($conexion,$sql);
    while ($row=mysqli_fetch_array($res)){
        $tmp = $row["Cantidad"];
    }
    echo $tmp;
    
?>