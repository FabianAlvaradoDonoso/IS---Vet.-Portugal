<?php

    include '../Conexion/cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

    mysqli_set_charset($conexion, "utf8");
    
    $tmp="<div class='modal fade' id='modalError' role='dialog'>
            <div class='modal-dialog'>
    
                <!-- Modal content-->
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h4 class='modal-title'>";
    $tmp2 = "<div class='table-responsive'>
                <table class='table table-striped table-hover table-sm'>
                    <thead>
                        <th>Codigo</th>
                        <th>Cantidad Solicitada</th>
                        <th>Stock Actual</th>
                    </thead>
                    <tbody>";

    $array = $_POST["array"];
    $stock;
    $error = false;

    for($i=0; count($array); $i++){
        $codigo = $array[i][0];
        $cantidad = $array[i][1];
        $sql="SELECT STOCK_ACT FROM productos WHERE CODIGO = '".$codigo."'";

        $res=mysqli_query($conexion,$sql);
        while ($row=mysqli_fetch_array($res)){
            $stock = $row["STOCK_ACT"];
        }

        if($stock >= $cantidad){
            $final = $stock - $cantidad;
            $error = false;
            $sql = "UPDATE productos SET STOCK_ACT = '".$final."' WHERE CODIGO = '".$codigo."'";
            $res = mysqli_query($conexion, $sql);
            
            
        }
        else{
            $sql = "SELECT * FROM";
            $error = true;
            $res = mysqli_query($conexion, $sql);
            $tmp2 += "<tr>
                        <td>".$codigo."</td>
                        <td>".$cantidad."</td>
                        <td>".$stock."</td>
                    </tr>";
            
        }
    }
    if($error){
        $tmp+="          Error</h4>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                
            </div>
            <div class='modal-body'>
                <p>No se puede continuar porque hay algunos productos que no tienen la cantidad suficiente de stock.</p>
                <p>Son los siguientes productos en conflicto.</p>";
        $tmp+= $tmp2;
    }
    else{
        $tmp+="          Exito</h4>
            <button type='button' class='close' data-dismiss='modal'>&times;</button>
            
            </div>
            <div class='modal-body'>
            <p>Los productos fueron descontados exitosamente del stock.</p>";

    }

    $tmp +="        </div>
                    <div class='modal-footer'>
                        <button type='button' id='cerrarError' class='btn btn-danger' data-dismiss='modal'>Close</button>
                    </div>
                </div>
            </div>
        </div>";
    
        echo $tmp;
    

?>   
    