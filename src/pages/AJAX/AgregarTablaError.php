<?php

    include '../../cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

	mysqli_set_charset($conexion, "utf8");

    $tmp="";
    //$sql="SELECT * FROM `productos2`";
    
    $sql="SELECT NOMBRE, STOCK_ACT FROM productos WHERE CODIGO = '".$_POST["codigo"]."'";
    $res=mysqli_query($conexion,$sql);
    while ($row=mysqli_fetch_array($res)){
        $tmp.= "<tr>
                    <td>" . $_POST["codigo"]. "</td> 
                    <td>" . $row["NOMBRE"] . "</td>
                    <td>" . $row["STOCK_ACT"] . "</td>
                    <td>" . $_POST["cantidad"]. "</td>
                </tr>";
    }

    echo $tmp;

?>   
    