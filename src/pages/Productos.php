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
              <h2 class="no-margin-bottom">Productos</h2>
            </div>
          </header>
          <div id="recargar">
            <section class="tables">
                    <div   name"contenido" class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header" style="border">
                                    <div class=" container ">
                                        <div class="row justify-content-between">
                                        <div class="col-3"><h4><strong>Productos</strong></h4></div>
                                            
                                        <div class=" col-2 "><button type="button" class="btn btn-primary btn-sm" onclick="modalNuevo()">Nuevo</button></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card-body" id="card1">
                                    <div class="table-responsive">
                                            
                                        <table class='table table-striped table-hover table-sm'>
                                            <?php
                                                try{
                                                    $base = new PDO("mysql:host=localhost; dbname=vetportu_vetportugalInv", "vetportu_inventa", "vetportugal2018");
                                                    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                    $base->exec("SET CHARACTER SET utf8");
                                                    $tamanoPaginas=40;
                                                    $pagina = isset($_GET['pagina'])?$_GET['pagina']:1;;
                                                    
                                                    $empezarDesde = ($pagina - 1) * $tamanoPaginas;
                                                    $sql_total="SELECT
                                                                p.CODIGO,
                                                                c.NOMBRE_CATEGORIA AS CATEGORIA,
                                                                r.NOMBRE_PROVEEDOR AS PROVEEDOR,
                                                                p.NOMBRE,
                                                                p.PRECIO_VENTA,
                                                                p.PRECIO_NETO,
                                                                p.FECHA_VENC,
                                                                p.FECHA_ADQ,
                                                                p.STOCK_MIN,
                                                                p.STOCK_ACT,
                                                                b.NOMBRE_BODEGA AS BODEGA,
                                                                IF((p.FECHA_VENC BETWEEN CURDATE() AND ADDDATE(CURDATE(), INTERVAL 13 DAY)),'table-warning','') AS POR_VENCER,
                                                                IF(p.FECHA_VENC < CURDATE(), 'table-danger', '') AS VENCIDO,
                                                                IF(p.FECHA_VENC < CURDATE(), 'danger', 'danger') AS VENCIDO2 
                                                            FROM
                                                                productos p
                                                            INNER JOIN bodega b ON
                                                                (p.ID_BODEGA = b.ID_BODEGA)
                                                            INNER JOIN categoria c ON
                                                                (
                                                                    p.ID_CATEGORIA = c.ID_CATEGORIA
                                                                )
                                                            INNER JOIN proveedor r ON
                                                                (
                                                                    p.ID_PROVEEDOR = r.ID_PROVEEDOR
                                                                ) ";
                                                                      
                                                    $resultado = $base->prepare($sql_total);
                                                    $resultado->execute(array());
                                                    $numFilas=$resultado->rowCount();
                                                    $totalPaginas = ceil($numFilas/$tamanoPaginas);
                                                
                                                    $resultado->closeCursor();
                                                    $sqlLimit="SELECT
                                                                    p.CODIGO,
                                                                    c.NOMBRE_CATEGORIA AS CATEGORIA,
                                                                    r.NOMBRE_PROVEEDOR AS PROVEEDOR,
                                                                    p.NOMBRE,
                                                                    p.PRECIO_VENTA,
                                                                    p.PRECIO_NETO,
                                                                    p.FECHA_VENC,
                                                                    p.FECHA_ADQ,
                                                                    p.STOCK_MIN,
                                                                    p.STOCK_ACT,
                                                                    b.NOMBRE_BODEGA AS BODEGA,
                                                                    IF((p.FECHA_VENC BETWEEN CURDATE() AND ADDDATE(CURDATE(), INTERVAL 13 DAY)),'table-warning','') AS POR_VENCER,
                                                                    IF(p.FECHA_VENC < CURDATE(), 'table-danger', '') AS VENCIDO,
                                                                    IF(p.FECHA_VENC < CURDATE(), 'danger', 'danger') AS VENCIDO2 
                                                                FROM
                                                                    productos p
                                                                INNER JOIN bodega b ON
                                                                    (p.ID_BODEGA = b.ID_BODEGA)
                                                                INNER JOIN categoria c ON
                                                                    (
                                                                        p.ID_CATEGORIA = c.ID_CATEGORIA
                                                                    )
                                                                INNER JOIN proveedor r ON
                                                                    (
                                                                        p.ID_PROVEEDOR = r.ID_PROVEEDOR
                                                                    )
                                                                LIMIT $empezarDesde, $tamanoPaginas ";

                                                    $resultado = $base->prepare($sqlLimit);
                                                    $resultado->execute(array());
                                                    // <th>CODIGO</th>
                                                    echo "<thead>
                                                            <tr class='thead-light'>
                                                                <th>CODIGO</th>
                                                                <th>CATEGORIA</th>
                                                                <th>PROVEEDOR</th>
                                                                <th>NOMBRE</th>
                                                                <th>PRECIO VENTA</th>
                                                                <th>PRECIO NETO</th>
                                                                <th>FECHA VENC</th>
                                                                <th>FECHA ADQ</th>
                                                                <th>STOCK MIN</th>
                                                                <th>STOCK ACT</th>
                                                                <th>Bodega</th>
                                                                <th align='center'>ACCIONES</th>
                                                            <tr>
                                                        </thead>
                                                        <tbody>";
                                                
                                            
                                                    while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                                                        $codigo = $fila["CODIGO"];
                                                        $categoria = $fila["CATEGORIA"];
                                                        $proveedor = $fila["PROVEEDOR"];
                                                        $nombre = $fila["NOMBRE"];
                                                        $precioVenta = $fila["PRECIO_VENTA"];
                                                        $precioNeto = $fila["PRECIO_NETO"];
                                                        $fechaVenc3;
                                                        if($fila["FECHA_VENC"]== null){
                                                            $fechaVenc = '-';
                                                            $fechaVenc2 = '-';
                                                            $fechaVenc3 = '1';
                                                        }else{
                                                            $fechaVenc = date_format(date_create($fila["FECHA_VENC"]), 'Y/m/d');
                                                            $fechaVenc2 = date_format(date_create($fila["FECHA_VENC"]), 'Y / m / d');
                                                            $fechaVenc3 = '0';
                                                        } 
                                                        $fechaAdq = date_format(date_create($fila["FECHA_ADQ"]), 'Y/m/d');
                                                        $stockMin = $fila["STOCK_MIN"];
                                                        $stockAct = $fila["STOCK_ACT"];
                                                        $bodega = $fila["BODEGA"];
                                                        $class = $fila["POR_VENCER"];
                                                        if($class == ''){$class = $fila["VENCIDO"];}     
                                                        $class2 = $fila["VENCIDO2"];
                                                        setlocale(LC_MONETARY, 'en_US');

                                                        echo "<tr class='".$class."'>";
                                                        echo "<td>" . $codigo . "</td>";
                                                        echo "<td>" . $categoria . "</td>";
                                                        echo "<td>" . $proveedor . "</td>";
                                                        echo "<td>" . $nombre . "</td>";
                                                        echo "<td align='right'>$ " . number_format($fila["PRECIO_VENTA"], 0, ',', '.') . "</td>";
                                                        echo "<td align='right'>$ " . number_format($fila["PRECIO_VENTA"], 0, ',', '.') . "</td>";
                                                        echo "<td>" . $fechaVenc2 . "</td>";
                                                        echo "<td>" . date_format(date_create($fechaAdq), 'Y / m / d') . "</td>";
                                                        echo "<td>" . $stockMin . "</td>";
                                                        echo "<td>" . $stockAct . "</td>";
                                                        echo "<td>" . $bodega . "</td>";
                                                        echo "<td align='center'><button type='button' class='btn btn-outline-success btn-sm' onclick='mostrarModalModificar2(\"$codigo\",\"$categoria\",\"$proveedor\",\"$nombre\",\"$precioVenta\",\"$precioNeto\",\"$fechaVenc\",\"$fechaAdq\",\"$stockMin\",\"$stockAct\",\"$bodega\", \"$fechaVenc3\")'><span class='oi oi-pencil'></span></button>
                                                                                 <button type='button' class='btn btn-outline-".$class2." btn-sm' onclick='mostrarModal(\"$codigo\",\"$categoria\",\"$proveedor\",\"$nombre\",\"$bodega\")'><span class='oi oi-trash'></span></button></td>";
                                                        
                                                        echo "</tr>";

                                                        //mostrarModalModificar(\"$codigo\",\"$categoria\",\"$proveedor\",\"$nombre\",\"$precioVenta\",\"$precioNeto\",\"$fechaVenc\",\"$fechaAdq\",\"$stockMin\",\"$stockAct\",\"$bodega\")
                                                        //mostrarModal(\"$codigo\",\"$categoria\",\"$proveedor\",\"$nombre\",\"$bodega\")
                                                    }
                                                    echo "</tbody>";
                                                    $resultado->closeCursor();
                                                }
                                                catch(Exception $e){
                                                }
                                            
                                            ?>
                                            
                                        </table>
                                        <?php 
                                            $anterior=($pagina-1);
                                            $siguiente=($pagina+1);
                                            
                                            if(isset($_GET['Busqueda'])){
                                                $pagAnterior= "?pagina=$anterior&Busqueda={$_GET['Busqueda']}";
                                                $pagSiguiente= "?pagina=$siguiente&Busqueda={$_GET['Busqueda']}";
                                            }
                                            else{
                                                $pagAnterior= "?pagina=$anterior";
                                                $pagSiguiente= "?pagina=$siguiente";
                                            }
                                            ?>
                                            
                                            <nav class="nav justify-content-center" aria-label="Page navigation example">
                                            <ul class="pagination">
                                            <?php if(($pagina==1)){ ?>
                                                <li class="page-item disabled">
                                                <a class="page-link" href='<?php echo "$pagAnterior"?>#tabla' aria-label="Anterior">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Anterior</span>
                                                </a>
                                                </li>
                                            <?php }else{?>
                                                <li class="page-item">
                                                <a class="page-link" href='<?php echo "$pagAnterior"?>#tabla' aria-label="Anterior">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Anterior</span>
                                                </a>
                                                </li>
                                            <?php }?>

                                                
                                                <?php
                                                if(isset($_GET['Busqueda'])){
                                                    if($totalPaginas>=1){
                                                        for($x=1;$x<=$totalPaginas;$x++){
                                                            echo($x==$pagina)?"<li class='page-item active'><a class='page-link' href='?pagina=$x&Busqueda={$_GET['Busqueda']}#tabla'>$x</a></li>":
                                                            "<li class='page-item'><a class='page-link' href='?pagina=$x&Busqueda={$_GET['Busqueda']}#tabla'>$x</a></li>";
                                                        }
                                                    }	
                                                }
                                                else{
                                                    if($totalPaginas>=1){
                                                    for($x=1;$x<=$totalPaginas;$x++){
                                                        echo($x==$pagina)?"<li class='page-item active'><a class='page-link' href='?pagina=$x#tabla'>$x</a></li>":
                                                        "<li class='page-item'><a class='page-link' href='?pagina=$x#tabla'>$x</a></li>";
                                                    }
                                                }	
                                                }	  
                                                
                                                
                                                ?>
                                                <?php if(($pagina>=$totalPaginas)){?>
                                                <li class="page-item disabled">
                                                <a class="page-link" href='<?php echo "$pagSiguiente"?>#tabla' aria-label="Siguiente">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Siguiente</span>
                                                </a>
                                                </li>
                                                <?php }else{?>
                                                    <li class="page-item">
                                                <a class="page-link" href='<?php echo "$pagSiguiente"?>#tabla' aria-label="Siguiente">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Siguiente</span>
                                                </a>
                                                </li>
                                                <?php }?>
                                            </ul>
                                            </nav>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade bd-example-modal-lg" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ingresar nuevo producto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="" method="">
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">Codigo</label>
                                                <input type="text" class="form-control" id="txtCodigoModalAgregar" name="Codigo" placeholder="Codigo" value="" required>
                                                <div class="valid-feedback"></div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Categoria</label>
                                                    
                                                <select id="cbCategoriaModalAgregar" class="form-control mb-2 mr-sm-2" onchange="">
                                                
                                                <?php
                                                    $base = new PDO("mysql:host=localhost; dbname=vetportu_vetportugalInv", "vetportu_inventa", "vetportugal2018");
                                                    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                    $base->exec("SET CHARACTER SET utf8");
                                                    
                                                    $sql_total="SELECT * FROM categoria";
                                                    $resultado = $base->prepare($sql_total);
                                                    $resultado->execute(array());
                                                    
                                                    while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                                                        echo "<option value=".$fila["ID_CATEGORIA"].">".$fila["NOMBRE_CATEGORIA"]."</option>";
                                                    }
                                                ?>
                                                </select>
                                                            
                                                <div class="valid-feedback"></div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Proveedor</label>
                                                
                                                <select id="cbProveedorModalAgregar" class="form-control mb-2 mr-sm-2" onchange="">
                                                    
                                                <?php
                                                    $base = new PDO("mysql:host=localhost; dbname=vetportu_vetportugalInv", "vetportu_inventa", "vetportugal2018");
                                                    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                    $base->exec("SET CHARACTER SET utf8");
                                                    
                                                    $sql_total="SELECT * FROM proveedor";
                                                    $resultado = $base->prepare($sql_total);
                                                    $resultado->execute(array());
                                                    
                                                    while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                                                        echo "<option value=".$fila["ID_PROVEEDOR"].">".$fila["NOMBRE_PROVEEDOR"]."</option>";
                                                    }
                                                ?>
                                                </select>
                                                
                                                <div class="valid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom03">Nombre</label>
                                                <input type="text" class="form-control" id="txtNombreModalAgregar" name="Nombre" placeholder="Nombre" value="" required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="" for="inlineFormInputGroup">Precio Venta</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">$</div>
                                                    </div>
                                                    <input type="number" class="form-control" align="right" style="text-align:right;" id="nudPrecioVentaModalAgregar" placeholder="Venta" value="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="" for="inlineFormInputGroup">Precio Neto</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">$</div>
                                                    </div>
                                                    <input type="number" class="form-control" align="right" style="text-align:right;" id="nudPrecioNetoModalAgregar" placeholder="Neto" value="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label class="mr-2 " for="">Fecha Vencimiento </label>
                                                <div class='input-group date fad-Date2' id='' >
                                                    <input  readonly type='text' class="form-control" id="dtpFechaVencModalAgregar" placeholder="Fecha"  value='' required>
                                                    <span class="input-group-addon">
                                                        <span class="oi oi-calendar"></span>
                                                    </span>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value='' id="modFechaAgregar" onchange="" checked>
                                                    <label class="form-check-label" for="defaultCheck1">Sin fecha Venc.</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="mr-2 " for="">Fecha Adquisición </label>
                                                <div class='input-group date fad-Date2' id='' >
                                                    <input type='text' class="form-control" id="dtpFechaAdqModalAgregar" placeholder="Fecha" readonly value="" required>
                                                    <span class="input-group-addon">
                                                        <span class="oi oi-calendar"></span>
                                                    </span>
                                                </div>  
                                            <script>
                                                $('.fad-Date2').datepicker({
                                                    format: "yyyy/mm/dd",
                                                    weekStart: 1,
                                                    todayBtn: "linked",
                                                    language: "es",
                                                    todayHighlight: true
                                                });
                                            </script> 
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="validationCustom05">Stock Mínimo</label>
                                                <input type="number" class="form-control" id="nudStockMinModalAgregar" name="nudStockMin" placeholder="Stock Minimo" value="" required>
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="validationCustom05">Stock Actual</label>
                                                <input type="number" class="form-control" id="nudStockActModalAgregar" name="nudStockAct" placeholder="Stock Actual" value="" required>
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                            
                                            
                                            
                                        </div>
                                        <div class="form-row justify-content-center">
                                            <div class="col-md-5 mb-3">
                                                <label for="validationCustom04">Bodega</label>
                                                <select id="cbBodegaModalAgregar" class="form-control mb-2 mr-sm-2 custom-select" onchange="enviarOtro()" required>
                                                    
                                                <?php
                                                    $base = new PDO("mysql:host=localhost; dbname=vetportu_vetportugalInv", "vetportu_inventa", "vetportugal2018");
                                                    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                    $base->exec("SET CHARACTER SET utf8");
                                                    
                                                    $sql_total="SELECT * FROM bodega";
                                                    $resultado = $base->prepare($sql_total);
                                                    $resultado->execute(array());
                                                    
                                                    while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                                                        echo "<option value=".$fila["ID_BODEGA"].">".$fila["NOMBRE_BODEGA"]."</option>";
                                                    }
                                                ?>
                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        
                                            
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-success" onclick="agregar()">Agregar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade bd-example-modal-lg" id="modalModificar2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modificación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="" method="">
                                        <div class="form-row">
                                            <div class="col-md-4 mb-1">
                                                <label for="validationCustom01">Codigo</label>
                                                <input  readonly type="text" class="form-control" id="txtCodigoModal2" name="Codigo" placeholder="Codigo" value="" required>
                                                <div class="valid-feedback"></div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Categoria</label>
                                                    
                                                <select id="cbCategoriaModal2" class="form-control mb-2 mr-sm-2" onchange="">
                                                
                                                <?php
                                                    $base = new PDO("mysql:host=localhost; dbname=vetportu_vetportugalInv", "vetportu_inventa", "vetportugal2018");
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
                                                            
                                                <div class="valid-feedback"></div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Proveedor</label>
                                                
                                                <select id="cbProveedorModal2" class="form-control mb-2 mr-sm-2" onchange="">
                                                    
                                                <?php
                                                    $base = new PDO("mysql:host=localhost; dbname=vetportu_vetportugalInv", "vetportu_inventa", "vetportugal2018");
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
                                                
                                                <div class="valid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom03">Nombre</label>
                                                <input type="text" class="form-control" id="txtNombreModal2" name="Nombre" placeholder="Nombre" value="" required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="" for="inlineFormInputGroup">Precio Venta</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">$</div>
                                                    </div>
                                                    <input type="number" class="form-control" align="right" style="text-align:right;" id="nudPrecioVentaModal2" placeholder="Venta" value="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="" for="inlineFormInputGroup">Precio Neto</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">$</div>
                                                    </div>
                                                    <input type="number" class="form-control" align="right" style="text-align:right;" id="nudPrecioNetoModal2" placeholder="Neto" value="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label class="mr-2 " for="">Fecha Vencimiento </label>
                                                <div class='input-group date fad-Date2' id='' >
                                                    <input readonly type='text' class="form-control" id="dtpFechaVencModal2" placeholder="Fecha"  value="" required>
                                                    <span class="input-group-addon">
                                                        <span class="oi oi-calendar"></span>
                                                    </span>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value='' id="modFecha" onchange="" checked>
                                                    <label class="form-check-label" for="defaultCheck1">Sin fecha Venc.</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="mr-2 " for="">Fecha Adquisición </label>
                                                <div class='input-group date fad-Date2' id='' >
                                                    <input type='text' class="form-control" id="dtpFechaAdqModal2" placeholder="Fecha" readonly value="" required>
                                                    <span class="input-group-addon">
                                                        <span class="oi oi-calendar"></span>
                                                    </span>
                                                </div>  
                                            <script>
                                                $('.fad-Date2').datepicker({
                                                    format: "yyyy/mm/dd",
                                                    weekStart: 1,
                                                    todayBtn: "linked",
                                                    language: "es",
                                                    todayHighlight: true
                                                });
                                            </script> 
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="validationCustom05">Stock Mínimo</label>
                                                <input type="number" class="form-control" id="nudStockMinModal2" name="nudStockMin" placeholder="Stock Minimo" value="" required>
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="validationCustom05">Stock Actual</label>
                                                <input type="number" class="form-control" id="nudStockActModal2" name="nudStockAct" placeholder="Stock Actual" value="" required>
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                            
                                            
                                            
                                        </div>
                                        <div class="form-row justify-content-center">
                                            <div class="col-md-5 mb-3">
                                                <label for="validationCustom04">Bodega</label>
                                                <select id="cbBodegaModal2" class="form-control mb-2 mr-sm-2 custom-select" onchange="enviarOtro()" required>
                                                    
                                                <?php
                                                    $base = new PDO("mysql:host=localhost; dbname=vetportu_vetportugalInv", "vetportu_inventa", "vetportugal2018");
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
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        
                                            
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-success" onclick="modificar2()">Modificar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade bd-example-modal-lg" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="" method="">
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">Codigo</label>
                                                <input readonly type="text" class="form-control" id="txtCodigoModalE" name="Codigo" placeholder="Codigo" value="" required>
                                                <div class="valid-feedback"></div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Categoria</label>
                                                    
                                                <select id="cbCategoriaModalE" class="form-control mb-2 mr-sm-2" onchange="" disabled>
                                                
                                                <?php
                                                    $base = new PDO("mysql:host=localhost; dbname=vetportu_vetportugalInv", "vetportu_inventa", "vetportugal2018");
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
                                                            
                                                <div class="valid-feedback"></div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Proveedor</label>
                                                
                                                <select id="cbProveedorModalE" class="form-control mb-2 mr-sm-2" onchange="" disabled>
                                                    
                                                <?php
                                                    $base = new PDO("mysql:host=localhost; dbname=vetportu_vetportugalInv", "vetportu_inventa", "vetportugal2018");
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
                                                
                                                <div class="valid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom03">Nombre</label>
                                                <input type="text" class="form-control" id="txtNombreModalE" name="Nombre" placeholder="Nombre" value="" readonly required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        
                                            <div class="col-md-5 mb-3">
                                                <label for="validationCustom04">Bodega</label>
                                                <select id="cbBodegaModalE" class="form-control mb-2 mr-sm-2 custom-select" onchange="" disabled required>
                                                    
                                                <?php
                                                    $base = new PDO("mysql:host=localhost; dbname=vetportu_vetportugalInv", "vetportu_inventa", "vetportugal2018");
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
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        
                                            
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modalEliminarBien" role="dialog">
                        <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Eliminación Completa</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    
                                </div>
                                <div class="modal-body">
                                    <p align="center">Los datos fueron eliminados satifactoriamente.</p>
                                    <p align="center"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="cerrarBienE" class="btn btn-success" data-dismiss="modal" onclick="updateDiv()">Cerrar</button>
                                </div>
                            </div>
                        
                        </div>
                    </div>

                    <div class="modal fade" id="modalBien" role="dialog">
                        <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Modificación Completa</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    
                                </div>
                                <div class="modal-body">
                                    <p align="center">Los datos fueron modificados satifactoriamente.</p>
                                    <p align="center"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="cerrarBien" class="btn btn-success" data-dismiss="modal" onclick="updateDiv()">Cerrar</button>
                                </div>
                            </div>
                        
                        </div>
                    </div>

                    <div class="modal fade" id="modalError" role="dialog">
                        <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Error</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    
                                </div>
                                <div class="modal-body">
                                    <p align="center">Algun valor modificado esta incorrecto.</p>
                                    <p align="center">Intentelo nuevamente.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="cerrarError" class="btn btn-danger" data-dismiss="modal" onclick="">Close</button>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <div class="modal fade" id="modalBienAgregar" role="dialog">
                        <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Ingreso Completo</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    
                                </div>
                                <div class="modal-body">
                                    <p align="center">Los datos fueron agregados satifactoriamente.</p>
                                    <p align="center"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="cerrarBien" class="btn btn-success" data-dismiss="modal" onclick="limpiaTodo()">Cerrar</button>
                                </div>
                            </div>
                        
                        </div>
                    </div>

                    <div class="modal fade" id="modalErrorAgregar" role="dialog">
                        <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Error</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    
                                </div>
                                <div class="modal-body">
                                    <p align="center">Algun valor agregado esta incorrecto.</p>
                                    <p align="center">Intentelo nuevamente.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="cerrarError" class="btn btn-danger" data-dismiss="modal" onclick="">Close</button>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <div class="modal fade" id="modalErrorAgregarCodigo" role="dialog">
                        <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Error</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    
                                </div>
                                <div class="modal-body">
                                    <p align="center">Ya existe un articulo con el mismo codigo ingresado.</p>
                                    <p align="center">Intentelo nuevamente.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="cerrarError" class="btn btn-danger" data-dismiss="modal" onclick="">Close</button>
                                </div>
                            </div>
                        
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
