<?php
    include '../../cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

	mysqli_set_charset($conexion, "utf8");

    //$sql="SELECT * FROM `productos2`";
    $tmp="<option>Opcion...</option>";
    if($_POST["otroSelect"] != ""){
        $sql="SELECT * FROM ".$_POST["otroSelect"]."";
        
        $res=mysqli_query($conexion,$sql);
        while ($row=mysqli_fetch_array($res)){

            $tmp.= "<option value='".$row[0]."'>".$row[1]."</option>";
        }
    }
    echo $tmp;

    
?>
