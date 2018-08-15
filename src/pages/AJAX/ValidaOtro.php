<?php
    $conexion = mysqli_connect("localhost", 'vetportu_inventa', 'vetportugal2018', 'vetportu_vetportugalInv');

    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    

	mysqli_set_charset($conexion, "utf8");
    $buscar = strtolower($_POST["otroSelect"]);

    $tmp="<option>Opcion...</option>";
    $sql="SELECT * FROM ".$buscar."";
    
    $res=mysqli_query($conexion,$sql);
    while ($row=mysqli_fetch_array($res)){

        $tmp.= "<option value='".$row[0]."'>".$row[1]."</option>";
    }
    
    echo $tmp;

    
?>
