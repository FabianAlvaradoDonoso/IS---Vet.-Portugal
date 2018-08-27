<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once '../../src/include/head.php';
    session_start();
    if(!isset($_SESSION["user"])){
      header("location:../../src/login/login.php");
    }
  ?>
  </head> 
  <link rel="stylesheet" href="../../public/css/style.sea.css" id="theme-stylesheet">
 
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
                <h2>Productos con Bajo Stock</h2>
            </div>
            
          </header>
          <div id="recargar">
          <section class="tables">
                    <div id="tabla" class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="accordion">

                                    <div class="card ">
                                        <div class="card-header">
                                            <div class=" container ">
                                                <div class="row justify-content-between">
                                                    <div class=""><h5>Lista de productos con Bajo Stock</h5></div>
                                                    
                                                    <div class=""><button type="button" class="btn btn-outline-primary btn-sm" onclick="recargar()">Recargar</button></div>
                                                    <div class=""><a href="/src/pages/Excel/BSExc.php" class="btn btn-outline-success btn-sm ">Descargar como Excel</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="table-responsive">
                                                
                                                <table class='table table-striped table-hover table-sm'>
                                                    <thead>
                                                        <tr class="thead-light">
                                                            <th class="text-center">Codigo</th>
                                                            <th class="text-center">Nombre</th>
                                                            <th class="text-center" width='150px'>Fecha Venc.</th>
                                                            <th class="text-center" width='70px'>Stock Mínimo</th>
                                                            <th class="text-center" width='70px'>Stock Actual</th>
                                                            <th class="text-center" width='70px'>Opciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="BLista">
                                                        <?php
                                                            $conexion = mysqli_connect("localhost", 'vetportu_inventa', 'vetportugal2018', 'vetportu_vetportugalInv');

                                                            if(mysqli_connect_errno()){
                                                                echo "Error al conectar a la BBDD";
                                                                exit();
                                                            }
                                                        
                                                            mysqli_set_charset($conexion, "utf8");
                                                        
                                                            $tmp="";
                                                            $total; 
                                                            $consulta;
                                                            $vencidos;
                                                            $Vencidos2;
                                                            $sql="SELECT CODIGO, NOMBRE, FECHA_VENC, STOCK_MIN,STOCK_ACT FROM productos WHERE STOCK_ACT <= STOCK_MIN";
                                                            $res=mysqli_query($conexion,$sql);
                                                            while ($row=mysqli_fetch_array($res, MYSQL_ASSOC)){     
                                                                $codigo = $row['CODIGO'];
                                                                $nombre = $row['NOMBRE'];
                                                                $fecha = date_format(date_create($row["FECHA_VENC"]), 'Y/m/d');
                                                                $stockMin = $row["STOCK_MIN"];
                                                                $stockAct = $row['STOCK_ACT'];                                
                                                                echo "  <tr>
                                                                            <td>".$row['CODIGO']."</td>
                                                                            <td>".$row['NOMBRE']."</td>
                                                                            <td>".date_format(date_create($row["FECHA_VENC"]), 'Y / m / d')."</td>
                                                                            <td>".$row['STOCK_MIN']."</td> 
                                                                            <td>".$row['STOCK_ACT']."</td> 
                                                                            <td><button class='btn btn-success btn-sm' onclick='mostrarModalModificarS(\"$codigo\",\"$nombre\",\"$fecha\",\"$stockMin\",\"$stockAct\")'><span class='fas fa-edit'</span></button></td>
                                                                        </tr>";
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>                   
                                </div>
                            </div>
                        </div>
                    </div>



<!-- //////////////////////////////////////////M O D A L S////////////////////////////////////////////////////// -->
                    <div class="modal fade bd-example-modal" id="modalModificarV" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
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
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">Codigo</label>
                                                <input readonly type="text" class="form-control" id="txtCodigoModificarS" name="Codigo" placeholder="Codigo" value="" required>
                                                <div class="valid-feedback"></div>
                                            </div>
                                            <div class="col-md-8 mb-3">
                                                <label for="validationCustom03">Nombre</label>
                                                <input readonly type="text" class="form-control" id="txtNombreModificarS" name="Nombre" placeholder="Nombre" value="" required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label class="mr-2 " for="">Fecha Vencimiento </label>
                                                <div class='input-group date fad-Date2' id='' >
                                                    <input readonly type='text' class="form-control" id="dtpFechaVencModificarS" placeholder="Fecha"  value="" required>
                                                    <span class="input-group-addon">
                                                        <span class="fas fa-calendar-alt"></span>
                                                    </span>
                                                </div>  
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="validationCustom05">Stock Mínimo</label>
                                                <input type="number" class="form-control" id="nudStockMinModificarS" name="nudStockAct" placeholder="Stock Actual" value="" required>
                                                <div class="invalid-feedback"></div>
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
                                                <label for="validationCustom05">Stock Actual</label>
                                                <input type="number" class="form-control" id="nudStockActModificarS" name="nudStockAct" placeholder="Stock Actual" value="" required>
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                        </div> 
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-success" onclick="modificarBajoStock()">Modificar</button>
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
                                    <button type="button" id="cerrarBien" class="btn btn-danger"  data-dismiss="modal" onclick="">Cerrar</button>
                                </div>
                            </div>
                        
                        </div>
                    </div>
<!-- //////////////////////////////////////F I N    M O D A L S///////////////////////////////////// -->


                </section>
                </div>
                <!-- Page Footer-->
                <?php  include '../../src/include/footer.php'; ?>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    
</body>

</html>