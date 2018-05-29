<?php
    $mysqli = new mysqli("localhost", "root", "", "pruebavet");
    $salida="aaa";
    $query="SELECT * FROM productos";

    // if(isset($_POST['consulta'])){
    //     $q = $mysqli->real_escape_string($_POST['consulta']);
    //     $query = "SELECT CODIGO, CATEGORIA, PROVEEDOR, NOMBRE, PRECIO_VENTA, PRECIO_NETO FROM prodcutos
    //     WHERE CODIGO LIKE '%".$q."%' OR CATEGORIA LIKE '%".$q."%' OR PROVEEDOR LIKE '%".$q."%' OR 
    //     NOMBRE LIKE '%".$q."%' OR PRECIO_VENTA LIKE '%".$q."%' OR PRECIO_NETO LIKE '%".$q."%'";
    // }
    $resultado=$mysql->query($query);

    // if($resultado->num_rows > 0){
    //     $salida.="<table class='table table-striped table-hover table-sm table-bordered'><thead><tr><th>CODIGO</th><th>CATEGORIA</th><th>PROVEEDOR</th><th>NOMBRE</th><th>PRECIO VENTA</th><th>PRECIO NETO</th><th align='center'>ACCIONES</th></tr></thead><tbody>";
    //     while($fila=$resultado->fetch_assoc()){
    //         $salida.="<tr>
    //                   <td>" . $fila["CODIGO"] . "</td>
    //                   <td>" . $fila["CATEGORIA"] . "</td>
    //                   <td>" . $fila["PROVEEDOR"] . "</td>
    //                   <td>" . $fila["NOMBRE"] . "</td>
    //                   <td align='right'>$ " . $fila["PRECIO_VENTA"] . "</td>
    //                   <td align='right'>$ " . $fila["PRECIO_NETO"] . "</td>
    //                   <td align='center'><a href='Modificar_Producto.php?codigo=".$fila["CODIGO"]."' id=" . $fila["ID"] ." type='' value='' class='btn btn-outline-success btn-sm'><span class='oi oi-pencil'></span></a>
    //                         <a href='Eliminar_Producto.php?codigo=".$fila["CODIGO"]."' id=" . $fila["ID"] ." type='' value='' class='btn btn-outline-danger btn-sm'><span class='oi oi-trash'></span></a></td>
    //                   </tr>";
    //     }
    //     $salida.="</tbody></table>";
    // }
    // else{
    //     $salida.="No hay datos :(";
    // }
    echo $salida;
    $mysqli->close();

?>