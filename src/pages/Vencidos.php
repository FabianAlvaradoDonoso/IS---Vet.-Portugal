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
                <h2>Productos Vencidos</h2>
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
                                                <div class="col-6"><h5>Lista de productos Vencidos</h5></div>
                                                
                                                <div class=" col-1 "><button type="button" class="btn btn-outline-primary btn-sm" onclick="recargar()">Recargar</button></div>
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
                                                        <th class="text-center" width='70px'>Stock</th>
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
                                                        $sql="SELECT CODIGO, NOMBRE, FECHA_VENC, FECHA_ADQ,STOCK_ACT FROM productos WHERE FECHA_VENC < curdate()  and STOCK_ACT > 0";
                                                        $res=mysqli_query($conexion,$sql);
                                                        while ($row=mysqli_fetch_array($res, MYSQL_ASSOC)){     
                                                            $codigo = $row['CODIGO'];
                                                            $nombre = $row['NOMBRE'];
                                                            $fecha = date_format(date_create($row["FECHA_VENC"]), 'Y/m/d');
                                                            $fecha2 = date_format(date_create($row["FECHA_ADQ"]), 'Y/m/d');
                                                            $stock = $row['STOCK_ACT'];                                
                                                            echo "  <tr>
                                                                        <td>".$row['CODIGO']."</td>
                                                                        <td>".$row['NOMBRE']."</td>
                                                                        <td>".date_format(date_create($row["FECHA_VENC"]), 'Y / m / d')."</td>
                                                                        <td>".$row['STOCK_ACT']."</td>
                                                                        <td><button class='btn btn-success btn-sm' onclick='mostrarModalModificarV(\"$codigo\",\"$nombre\",\"$fecha\",\"$fecha2\",\"$stock\")'><span class='fas fa-edit'</span></button></td>
                                                                    </tr>";
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>    

                                <div class="alert alert-warning alert-dismissible fade" role="alert">
                                    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
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
                                            <input readonly type="text" class="form-control" id="txtCodigoModificarV" name="Codigo" placeholder="Codigo" value="" required>
                                            <div class="valid-feedback"></div>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="validationCustom03">Nombre</label>
                                            <input readonly type="text" class="form-control" id="txtNombreModificarV" name="Nombre" placeholder="Nombre" value="" required>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label class="mr-2 " for="">Fecha Vencimiento </label>
                                            <div class='input-group date fad-Date2' id='' >
                                                <input readonly type='text' class="form-control" id="dtpFechaVencModificarV" placeholder="Fecha"  value="" required>
                                                <span class="input-group-addon">
                                                    <span class="oi oi-calendar"></span>
                                                </span>
                                            </div>  
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="mr-2 " for="">Fecha Adquisición </label>
                                            <div class='input-group date fad-Date2' id='' >
                                                <input readonly type='text' class="form-control" id="dtpFechaAdqModificarV" placeholder="Fecha"  value="" required>
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
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom05">Stock Actual</label>
                                            <input type="number" class="form-control" id="nudStockActModificarV" name="nudStockAct" placeholder="Stock Actual" value="" required>
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                    </div> 
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-success" onclick="modificarXVenc()">Modificar</button>
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
                                <button type="button" id="cerrarBien" class="btn btn-danger recargar" data-dismiss="modal" onclick="">Cerrar</button>
                            </div>
                        </div>
                    
                    </div>
                </div>
<!-- //////////////////////////////////////F I N    M O D A L S///////////////////////////////////// -->


            </section>
       
      <!--FOOTER-->      
      <?php  include '../../src/include/footer.php'; ?>
      </div><!--class Content inner...-->
        
      </div><!--class Page content...-->
     
    </div><!-- class PAGE--> 
  </body>
</html>
