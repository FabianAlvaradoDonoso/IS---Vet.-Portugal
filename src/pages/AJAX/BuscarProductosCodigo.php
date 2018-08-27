<?php

    include '../../cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

	mysqli_set_charset($conexion, "utf8");

    $tmp="";
    //$sql="SELECT * FROM `productos2`";
    
    $sql="SELECT CODIGO,NOMBRE, PRECIO_VENTA FROM productos WHERE CODIGO = '".$_POST["txtCodigo"]."'";
    setlocale(LC_MONETARY, 'en_US');
    $res=mysqli_query($conexion,$sql);
    while ($row=mysqli_fetch_array($res)){
        $tmp.= "<tr>
                    <td>" . $row["CODIGO"] . "</td>
                    <td>" . $row["NOMBRE"] . "</td>
                    <td>$" . number_format($row["PRECIO_VENTA"], 0, ',', '.') . "</td>
                    <td><input type='number' class='form-control form-control-sm' value='1' id=".$row["CODIGO"]." onchange='calcular()'></td>
                    <td class='text-center'><button type='button' class='btn btn-outline-danger btn-sm borrar' onclick=''><span class='fas fa-trash-alt'</span></button></td>
                </tr>";
    }

    echo $tmp;

?>   
    