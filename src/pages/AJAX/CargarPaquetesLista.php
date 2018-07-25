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
            ID_PAQUETITO,
            NOMBRE_PAQUETITO,
            PRECIO_PAQUETITO,
            (
                SELECT
                    SUM(contiene.CANTIDAD)
                FROM
                    contiene
                WHERE
                    paquetito.ID_PAQUETITO = contiene.ID_PAQUETITO
            ) AS CANTIDAD,
            COLOR
        FROM
            paquetito
        WHERE
            IS_FAV = FALSE AND IS_OPERACION = ".$_POST["tipo"]."";


    setlocale(LC_MONETARY, 'en_US');
    $res=mysqli_query($conexion,$sql);
    while ($row=mysqli_fetch_array($res)){
        $tmp.= "<tr>
                    <td width='100px'><button type='button' class='btn btn-primary btn-sm' >Clickeame >//////<</button></td>
                    <td>".$row["NOMBRE_PAQUETITO"]."</td>
                    <td width='150px'>$".number_format($row["PRECIO_PAQUETITO"], 0, ',', '.')."</td>
                    <td width='100px'>".$row["CANTIDAD"]."</td>
                    <td width='150px'><button type='button' class='btn btn-success btn-sm mostrar' id='".$row["ID_PAQUETITO"]."'><span class='oi oi-pencil'></span></button></td>
                </tr>";
       
        
    }

    echo $tmp;

?>   
    