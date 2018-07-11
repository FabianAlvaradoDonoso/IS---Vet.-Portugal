<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper.js/umd/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/jquery.cookie/jquery.cookie.js"></script>
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
<?php
    include '../Conexion/cnx.php';
    if(mysqli_connect_errno()){
		echo "Error al conectar a la BBDD";
		exit();
	}

	mysqli_set_charset($conexion, "utf8");

    $tmp="";
    $palabra="hola";
    //$sql="SELECT * FROM `productos2`";
    
    if($_POST["txtCodigo"] != ""){
        $sql="SELECT p.CODIGO, p.NOMBRE, p.PRECIO_VENTA FROM productos p WHERE p.CODIGO = '".$_POST["txtCodigo"]."'";
        $res=mysqli_query($conexion,$sql);
        while ($row=mysqli_fetch_array($res)){
            ?><script>
                var table = document.getElementById("myTable");
                var row = table.insertRow(2);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                cell1.innerHTML = '<?php $row["CODIGO"];?>';
                cell2.innerHTML = '<?php $row["NOMBRE"];?>';
                cell3.innerHTML = '<?php $row["PRECIO_VENTA"];?>';
                cell4.innerHTML = "<input type='number' class='form-control' value='1'/>";
                cell5.innerHTML = "<input type='button' class='borrar' value='Eliminar' />";
            </script><?php
        }
    }
    
    echo $tmp;
?>