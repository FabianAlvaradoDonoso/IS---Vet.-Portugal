<?php
    include '../Conexion/cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

    // mysqli_set_charset($conexion, "utf8");
    $codigo = $_POST[("codigo")];
    $idPaquete = $_POST[("idPaquete")];
    $cantidad = $_POST[("cantidad")];

    $tmp="";
    // $sql="INSERT INTO contiene (ID_PRODUCTO,ID_PAQUETITO,CANTIDAD) VALUES ('".$codigo."','".$idPaquete."','".$cantidad."')";
    
    // $res=mysqli_query($conexion,$sql);

    $sql="INSERT INTO contiene (ID_PRODUCTO, ID_PAQUETITO, CANTIDAD) 
          VALUES ('".$codigo."','".$idPaquete."', '".$cantidad."')";
    
    $res=mysqli_query($conexion,$sql);
    
?>
