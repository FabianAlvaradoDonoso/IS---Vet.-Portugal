<?php

    include '../Conexion/cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

	mysqli_set_charset($conexion, "utf8");

    $tmp="";
    //$sql="SELECT * FROM `productos2`";
    
    $sql="SELECT CODIGO,NOMBRE, PRECIO_VENTA FROM productos WHERE CODIGO = '".$_POST["txtCodigo"]."'";
            
    $res=mysqli_query($conexion,$sql);
    while ($row=mysqli_fetch_array($res)){
        $tmp.= "<tr>
                    <td>" . $row["CODIGO"] . "</td>
                    <td>" . $row["NOMBRE"] . "</td>
                    <td>$" . $row["PRECIO_VENTA"] . "</td>
                    <td><input type='number' class='form-control form-control-sm'></td>
                    <td><button type='button' class='btn btn-outline-danger btn-sm borrar'><span class='oi oi-trash'></span></button></td>
                </tr>";
    }

    echo $tmp;

?>   
    