<?php
              include '../../cnx.php';
              if(mysqli_connect_errno()){
              echo "Error al conectar a la BBDD";
              exit();
            }
            
            mysqli_set_charset($conexion, "utf8");

            $tmp="";
            //$sql="SELECT * FROM `usuarios`";
            
            $sql="SELECT * FROM usuarios";
            $res=mysqli_query($conexion,$sql);
            while ($row=mysqli_fetch_array($res)){
              $tmp.= 
                    "<tr>" . $row["nombre"] . "</td>
                    <tr>" . $row["user"] . "</td>
                    <tr>" . $row["pass"] . "</td>
                    <tr>" . $row["cargo"] . "</td>
                    <td align='center'><button type='button' class='btn btn-outline-success btn-sm' onclick=''><span class='oi oi-pencil'></span></button>
                                       <button type='button' class='btn btn-outline-danger btn-sm' onclick=''><span class='oi oi-trash'></span></button></td>
                                       </tr>";

            }
            echo $tmp;

        ?>