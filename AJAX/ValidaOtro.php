<?php
    include '../Conexion/cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

	mysqli_set_charset($conexion, "utf8");

    //$sql="SELECT * FROM `productos2`";
    $tmp="<option>Opcion...</option>";
    if($_POST["otroSelect"] != ""){
        $sql="SELECT `".$_POST["otroSelect"]."` FROM `productos2` GROUP BY `".$_POST["otroSelect"]."`";
        
        $res=mysqli_query($conexion,$sql);
        while ($row=mysqli_fetch_array($res)){

            $tmp.= "<option value='".$row[0]."'>".$row[0]."</option>";
        }
    }
    echo $tmp;

    
?>