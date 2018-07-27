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
            IS_FAV = TRUE AND IS_OPERACION = ".$_POST["tipo"]."";


    setlocale(LC_MONETARY, 'en_US');
    $res=mysqli_query($conexion,$sql);
    while ($row=mysqli_fetch_array($res)){
        $nombre = $row["NOMBRE_PAQUETITO"];
        $cantidad = $row["CANTIDAD"];
        if(strlen($nombre) > 15){$nombre = substr($nombre, 0, 15) . '...';}
        if($cantidad == null){$cantidad = '0';}
        $image = $row["COLOR"];
        if($image == 'blue'){
            $tmp.= "<div class='statistics col-lg-4 col-12 mt-3 mostrar' id='".$row["ID_PAQUETITO"]."'>
                    <div class='statistic d-flex align-items-center bg-white has-shadow'>
                        <div class='icon bg-".$row["COLOR"]."'><i class='fas fa-syringe'></i></div>
                        <div class='text'><strong>".$nombre."</strong><br><small><h6>$".number_format($row["PRECIO_PAQUETITO"], 0, ',', '.')." -- Items: ".$cantidad."</h6></small></div>
                    </div> 
                </div>";
        }else{
            $tmp.= "<div class='statistics col-lg-4 col-12 mt-3 mostrar' id='".$row["ID_PAQUETITO"]."'>
                    <div class='statistic d-flex align-items-center bg-white has-shadow'>
                        <div class='icon bg-".$row["COLOR"]."'><i class='fas fa-cubes'></i></div>
                        <div class='text'><strong>".$nombre."</strong><br><small><h6>$".number_format($row["PRECIO_PAQUETITO"], 0, ',', '.')." -- Items: ".$cantidad."</h6></small></div>
                    </div> 
                </div>";
        }
    }

    echo $tmp;

?>   
    