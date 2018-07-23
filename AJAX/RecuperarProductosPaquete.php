<?php

    include '../Conexion/cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

	mysqli_set_charset($conexion, "utf8");

    $tmp="";
    //$sql="SELECT * FROM `productos2`";
    
    $sql="SELECT
            p.CODIGO,
            p.NOMBRE,
            p.PRECIO_VENTA,
            c.CANTIDAD
        FROM
            contiene c
        INNER JOIN paquetito q ON
            (
                c.ID_PAQUETITO = q.ID_PAQUETITO
            )
        INNER JOIN productos p ON
            (
                c.ID_PRODUCTO = p.CODIGO
            )
        WHERE
            q.ID_PAQUETITO = '".$_POST["id"]."'";

    setlocale(LC_MONETARY, 'en_US');
    $res=mysqli_query($conexion,$sql);
    while ($row=mysqli_fetch_array($res)){
        $tmp.= "<tr>
                    <td>" . $row["CODIGO"] . "</td>
                    <td>" . $row["NOMBRE"] . "</td>
                    <td>$" . number_format($row["PRECIO_VENTA"], 0, ',', '.') . "</td>
                    <td><input type='number' class='form-control form-control-sm'  id=".$row["CODIGO"]." value='".$row["CANTIDAD"]."' onchange='calcular()'></td>
                    <td class='text-center'><button type='button' class='btn btn-outline-danger btn-sm borrar' onclick=''><span class='oi oi-trash'></span></button></td>
                </tr>";
    }

    echo $tmp;

?>   
    