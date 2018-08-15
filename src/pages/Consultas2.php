<!DOCTYPE html>
<html>
  
  <head>
  <?php require_once '../../src/include/head.php';
    session_start();
    if(!isset($_SESSION["user"])){
      header("location:../../src/login/login.php");
    }
  ?>
  </head> 
  <body>
    <!--PAGINA-->
    <div class="page">
     <!--NAVBAR--> 
    <div class="header">
    <?php  include '../../src/include/navbar.php';  ?>
    </div><!--navbar-->
    
      <div class="page-content d-flex align-items-stretch">
      
      <!--SIDEBAR-->    
      <?php  include '../../src/include/sidebar.php'; ?>

      <!--CONTENIDO-->
      <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Consultas</h2>
            </div>
          </header>
         <div class="div" id="recargar">
         <section class="tables" id="recargar">
            <div class="row col-lg-12 card-text-center ml-3">
                <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                            <div class='form-inline' id='datetimepicker6' >
                                    <label class="mr-2" for=""><i class="fas fa-barcode"></i></label>
                                    <input type='text' class="form-control mb-1 mr-sm-2 click" id="c2Codigo" placeholder="Código" onkeyup="c2Buscar()">
                                </div>                             
                            </li>
                            <li class="nav-item">
                            <div class='form-inline' id='datetimepicker6' >
                                    <label class="mr-2" for=""><i class="fab fa-product-hunt"></i></label>
                                    <input type='text' class="form-control mb-1 mr-sm-2 click" id="c2Nombre" placeholder="Nombre Producto" onkeyup="c2Buscar()">
                                </div>                            
                            </li>              
                        </ul>
                </div>
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" role="tablist">
                    <li class="nav-item dropdown">
                                
                                <select id="c2Categoria" class="form-control mb-2 mr-sm-2" onchange="">
                                
                                    <?php
                                        $base = new PDO("mysql:host=localhost; dbname=vetportugal", "root", "");
                                        //$base = new PDO("mysql:host=localhost; dbname=vetportu_vetportugalInv", "vetportu_inventa", "vetportugal2018");
                                        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $base->exec("SET CHARACTER SET utf8");
                                        
                                        $sql_total="SELECT * FROM categoria";
                                        $resultado = $base->prepare($sql_total);
                                        $resultado->execute(array());
                                        
                                        while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                                            if($fila["NOMBRE_CATEGORIA"] == $consulta[1]){
                                                echo "<option value=".$fila["ID_CATEGORIA"]." selected>".$fila["NOMBRE_CATEGORIA"]."</option>";
                                            }else{
                                                echo "<option value=".$fila["ID_CATEGORIA"].">".$fila["NOMBRE_CATEGORIA"]."</option>";
                                            }
                                        }
                                    ?>
                                </select>
                                        
                            </li>
                            <li class="nav-item dropdown">
                                
                            <select id="c2Proveedor" class="form-control mb-2 mr-sm-2" onchange="">
                                
                                <?php
                                    $base = new PDO("mysql:host=localhost; dbname=vetportugal", "root", "");
                                    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $base->exec("SET CHARACTER SET utf8");
                                    
                                    $sql_total="SELECT * FROM proveedor";
                                    $resultado = $base->prepare($sql_total);
                                    $resultado->execute(array());
                                    
                                    while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                                        if($fila["NOMBRE_PROVEEDOR"] == $consulta[2]){
                                            echo "<option value=".$fila["ID_PROVEEDOR"]." selected>".$fila["NOMBRE_PROVEEDOR"]."</option>";
                                        }else{
                                            echo "<option value=".$fila["ID_PROVEEDOR"].">".$fila["NOMBRE_PROVEEDOR"]."</option>";
                                        }
                                    }
                                ?>
                                </select>
                            </li>
                            <li class="nav-item dropdown">
                                
                            <select id="c2Bodega" class="form-control mb-2 mr-sm-2 custom-select" onchange="enviarOtro()" required>
                                
                                <?php
                                    $base = new PDO("mysql:host=localhost; dbname=vetportugal", "root", "");
                                    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $base->exec("SET CHARACTER SET utf8");
                                    
                                    $sql_total="SELECT * FROM bodega";
                                    $resultado = $base->prepare($sql_total);
                                    $resultado->execute(array());
                                    
                                    while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                                        if($fila["NOMBRE_BODEGA"] == $consulta[10]){
                                            echo "<option value=".$fila["ID_BODEGA"]." selected>".$fila["NOMBRE_BODEGA"]."</option>";
                                        }else{
                                            echo "<option value=".$fila["ID_BODEGA"].">".$fila["NOMBRE_BODEGA"]."</option>";
                                        }
                                    }
                                ?>
                                </select>
                                        
                            </li>
                            
                    </ul>
                </div>
                <div class="card-body">
                    <div class="row" id="c2Contenido"></div>
                </div>
            </div>
         </section>
         </div>

      <!--FOOTER-->      
      <?php  include '../../src/include/footer.php'; ?>
      </div><!--class Content inner...-->
        
      </div><!--class Page content...-->
     
    </div><!-- class PAGE--> 
  </body>
</html>


