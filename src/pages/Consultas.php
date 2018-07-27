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
      <section class="tables">

                

                    <div id="tabla" class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                            <div id="accordion">

                                <div class="card text-center">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" onclick="limpiarTodo()" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Código</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="nombre-tab" onclick="limpiarTodo()" data-toggle="tab" href="#nombre" role="tab" aria-controls="nombre" aria-selected="false">Nombre</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Fecha</a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" id="fechaVenc-tab" onclick="limpiarTodo()" data-toggle="tab" href="#fechavenc" role="tab" aria-controls="fecha" aria-selected="false">Vencimiento</a>
                                                    <a class="dropdown-item" id="fechaAdq-tab" onclick="limpiarTodo()" data-toggle="tab" href="#fechaadq" role="tab" aria-controls="fecha" aria-selected="false ">Adquisición</a>
                                                </div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="otro-tab" onclick="limpiarTodo()" data-toggle="tab" href="#otro" role="tab" aria-controls="otro" aria-selected="false">Otro</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">         
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="container d-inline">
                                                            <div class='form-inline' id='datetimepicker6' >
                                                                <label class="mr-2" for="">Ingrese código </label>
                                                                <input type='text' class="form-control mb-1 mr-sm-2 click" id="codigo" placeholder="Código" onkeyup="busqueda()">
                                                                <button type="buttom" class="btn btn-danger mb-2 ml-3" onclick="limpiarFormulario()">Limpiar busqueda</button>
                                                            </div>                                                           
                                                        </div>
                                                    </div>

                                                    <div id="datosConsulta"></div>
                                                </div>  
                                            </div>


                                            <div class="tab-pane fade " id="nombre" role="tabpanel" aria-labelledby="nombre-tab">         
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="container d-inline">
                                                            <div class='form-inline' id='datetimepicker6' >
                                                                <label class="mr-2" for="">Ingrese nombre </label>
                                                                <input type='text' class="form-control mb-1 mr-sm-2" id="nombre1" placeholder="Nombre" onkeyup="busquedaNombre()">
                                                                <button type="buttom" class="btn btn-danger mb-2 ml-3" onclick="limpiarFormularioNombre()">Limpiar busqueda</button>
                                                            </div>                                                           
                                                        </div>
                                                    </div>

                                                    <div id="datosConsulta"></div>
                                                </div>  
                                            </div>
                                                


                                            <div class="tab-pane fade" id="fechavenc" role="tabpanel" aria-labelledby="fechaVenc-tab">
                                            <div class="container">
                                            
                                                <div>
                                                    <label for=""><h5>Vencimiento</h5></label></div>
                                                    <div class="row">
                                                    
                                                        <div class="col-4">
                                                            <div class="list-group" id="list-tab" role="tablist">
                                                                <a class="list-group-item list-group-item-action active" id="list-especificoV-list" data-toggle="list" href="#list-especificoV" role="tab" aria-controls="especificoV" onclick="limpiarFormularioFecha2()">Fecha Específica</a>
                                                                <a class="list-group-item list-group-item-action" id="list-rangoV-list" data-toggle="list" href="#list-rangoV" role="tab" aria-controls="rangoV" onclick="limpiarFormularioFecha2()">Por rango</a>
                                                            </div>
                                                        </div>
                                                        <div class="tab-content" id="nav-tabContent">
                                                            <div class="tab-pane fade show active" id="list-especificoV" role="tabpanel" aria-labelledby="list-especificoV-list">
                                                                <div class="container d-inline">
                                                                    <div class="form-group form-inline">
                                                                        <div class='input-group date fad-Date2' id='datetimepicker6' >
                                                                            <label class="mr-2" for="">Ingrese Fecha </label>
                                                                            <input type='text' class="form-control" id="fechaVEsp" placeholder="Fecha" readonly>
                                                                            <span class="input-group-addon">
                                                                                <span class="oi oi-calendar"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row justify-content-center">
                                                                        <button type="buttom" class="btn btn-primary mb-2 mr-3" onclick="enviarFechaVEsp()">Buscar elementos</button>
                                                                        <button type="buttom" class="btn btn-danger mb-2 ml-3" onclick="limpiarFormularioFecha2()">Limpiar busqueda</button>
                                                                    </div>
                                                                        
                                                                </div>

                                                                

                                                                
                                                            </div>

                                                            <div class="tab-pane fade" id="list-rangoV" role="tabpanel" aria-labelledby="list-rangoV-list">                                                            
                                                            
                                                                <div class="container d-inline">
                                                                    <div class="form-group form-inline">
                                                                        <div class='input-group date fad-Date2' id='datetimepicker6'>
                                                                            <label class="mr-2" for="">Desde </label>
                                                                            <input type='text' class="form-control" id="fechaVRDesde" placeholder="Desde" readonly>
                                                                            <span class="input-group-addon">
                                                                                <span class="oi oi-chevron-left"></span>
                                                                            </span>
                                                                        </div>
                                                                        <div class='input-group date fad-Date2' id='datetimepicker7'>
                                                                            <label class="ml-2 mr-2" for="">Hasta </label>
                                                                            <input type='text' class="form-control" id="fechaVRHasta" placeholder="Hasta" readonly>
                                                                            <span class="input-group-addon">
                                                                                <span class="oi oi-chevron-right"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row justify-content-center">
                                                                        <button type="buttom" class="btn btn-primary mb-2 mr-3" onclick="enviarFechaVRango()">Buscar por rango</button>
                                                                        <button type="buttom" class="btn btn-danger mb-2 ml-3" onclick="limpiarFormularioFecha2()">Limpiar busqueda</button>
                                                                    </div>
                                                                        
                                                                </div>

                                                            </div>

                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="datosConsulta"></div>
                                                <div class="modal fade" id="myModal" role="dialog">
                                                    <div class="modal-dialog">
                                                        
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h4 class="modal-title">Error</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            
                                                            </div>
                                                            <div class="modal-body">
                                                            <p>La primera fecha no pueda ser mayor que la segunda fecha.</p>
                                                            <p>Intentelo nuevamente.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiarFormularioFecha2()">Close</button>
                                                            </div>
                                                        </div>  
                                                    
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="tab-pane fade " id="fechaadq" role="tabpanel" aria-labelledby="fechaAdq-tab">
                                                <div class="container">
                                                <div><label for=""><h5>Adquisición</h5></label></div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="list-group" id="list-tab" role="tablist">
                                                                <a class="list-group-item list-group-item-action active" id="list-especifico-list" data-toggle="list" href="#list-especifico" role="tab" aria-controls="especifico" onclick="limpiarFormularioFecha1()">Fecha Específica</a>
                                                                <a class="list-group-item list-group-item-action" id="list-rango-list" data-toggle="list" href="#list-rango" role="tab" aria-controls="rango" onclick="limpiarFormularioFecha1()">Por rango</a>
                                                            </div>
                                                        </div>
                                                        <div class="tab-content" id="nav-tabContent">

                                                            <div class="tab-pane fade show active" id="list-especifico" role="tabpanel" aria-labelledby="list-especifico-list">
                                                                <div class="container d-inline">
                                                                    <div class="form-group form-inline">
                                                                        <div class='input-group date fad-Date2' id='datetimepicker6' >
                                                                            <label class="mr-2" for="">Ingrese Fecha </label>
                                                                            <input type='text' class="form-control" id="fechaEsp" placeholder="Fecha" readonly>
                                                                            <span class="input-group-addon">
                                                                                <span class="oi oi-calendar"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row justify-content-center">
                                                                        <button type="buttom" class="btn btn-primary mb-2 mr-3" onclick="enviarFechaEsp()">Buscar elementos</button>
                                                                        <button type="buttom" class="btn btn-danger mb-2 ml-3" onclick="limpiarFormularioFecha1()">Limpiar busqueda</button>
                                                                    </div>
                                                                        
                                                                </div>

                                                                

                                                                
                                                            </div>

                                                            <div class="tab-pane fade" id="list-rango" role="tabpanel" aria-labelledby="list-rango-list">                                                            
                                                            
                                                                <div class="container d-inline">
                                                                    <div class="form-group form-inline">
                                                                        <div class='input-group date fad-Date2' id='datetimepicker6'>
                                                                            <label class="mr-2" for="">Desde </label>
                                                                            <input type='text' class="form-control" id="fechaRDesde" placeholder="Desde" readonly>
                                                                            <span class="input-group-addon">
                                                                                <span class="oi oi-chevron-left"></span>
                                                                            </span>
                                                                        </div>
                                                                        <div class='input-group date fad-Date2' id='datetimepicker7'>
                                                                            <label class="ml-2 mr-2" for="">Hasta </label>
                                                                            <input type='text' class="form-control" id="fechaRHasta" placeholder="Hasta" readonly>
                                                                            <span class="input-group-addon">
                                                                                <span class="oi oi-chevron-right"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row justify-content-center">
                                                                        <button type="buttom" class="btn btn-primary mb-2 mr-3" onclick="enviarFechaRango()">Buscar por rango</button>
                                                                        <button type="buttom" class="btn btn-danger mb-2 ml-3" onclick="limpiarFormularioFecha1()">Limpiar busqueda</button>
                                                                    </div>  
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="datosConsulta"></div>
                                                <div class="modal fade" id="myModal2" role="dialog">
                                                    <div class="modal-dialog">
                                                    
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h4 class="modal-title">Error</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        
                                                        </div>
                                                        <div class="modal-body">
                                                        <p>La primera fecha no pueda ser mayor que la segunda fecha.</p>
                                                        <p>Intentelo nuevamente.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiarFormularioFecha1()">Close</button>
                                                        </div>
                                                    </div>
                                                    
                                                    </div>
                                                </div>
                                               
                                            </div>
                                           
                                            <div class="tab-pane fade" id="otro" role="tabpanel" aria-labelledby="otro-tab">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <label class="mr-3 mb-2" for="codigo">Seleccione Grupo </label>
                                                            <select id="otroSelect" class="form-control mb-2 mr-sm-2" onchange="enviarOtro()">
                                                                <option selected>Opción...</option>
                                                                <option value="CATEGORIA">Categoría</option>
                                                                <option value="PROVEEDOR">Proveedor</option>
                                                                <option value="BODEGA">Almacenamiento</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm">
                                                            <label class="mr-3 mb-2" for="codigo">Seleccione Opción </label>
                                                            <select id='otro2Select' class='form-control mb-2 mr-sm-2' onchange='enviarOtro2()'></select>
                                                        </div>
                                                        <div class="col-sm">
                                                            <button type="buttom" id="borrarOtro" class="btn btn-danger mb-2 mt-4" onclick="limpiarFormulario2();">Limpiar busqueda</button>
                                                                
                                                                
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="datosConsulta"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                            
                        </div>
                    </div>

                    <div class="modal fade bd-example-modal-lg" id="modalModificar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">Codigo</label>
                                                <input readonly type="text" class="form-control" id="txtCodigoModal" name="Codigo" placeholder="Codigo" value="" required>
                                                <div class="valid-feedback"></div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Categoria</label>
                                                    
                                                <select id="cbCategoriaModal" class="form-control mb-2 mr-sm-2" onchange="">
                                                
                                                <?php
                                                    $base = new PDO("mysql:host=localhost; dbname=vetportugal", "root", "");
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
                                                
                                                <select id="cbProveedorModal" class="form-control mb-2 mr-sm-2" onchange="">
                                                    
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
                                                
                                                <div class="valid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom03">Nombre</label>
                                                <input type="text" class="form-control" id="txtNombreModal" name="Nombre" placeholder="Nombre" value="" required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="" for="inlineFormInputGroup">Precio Venta</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">$</div>
                                                    </div>
                                                    <input type="number" class="form-control" align="right" style="text-align:right;" id="nudPrecioVentaModal" placeholder="Venta" value="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="" for="inlineFormInputGroup">Precio Neto</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">$</div>
                                                    </div>
                                                    <input type="number" class="form-control" align="right" style="text-align:right;" id="nudPrecioNetoModal" placeholder="Neto" value="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label class="mr-2 " for="">Fecha Vencimiento </label>
                                                <div class='input-group date fad-Date2' id='' >
                                                    <input type='text' class="form-control" id="dtpFechaVencModal" placeholder="Fecha" readonly value="" required>
                                                    <span class="input-group-addon">
                                                        <span class="oi oi-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="mr-2 " for="">Fecha Adquisición </label>
                                                <div class='input-group date fad-Date2' id='' >
                                                    <input type='text' class="form-control" id="dtpFechaAdqModal" placeholder="Fecha" readonly value="" required>
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
                                                <input type="number" class="form-control" id="nudStockMinModal" name="nudStockMin" placeholder="Stock Minimo" value="" required>
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="validationCustom05">Stock Actual</label>
                                                <input type="number" class="form-control" id="nudStockActModal" name="nudStockAct" placeholder="Stock Actual" value="" required>
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                            
                                            
                                            
                                        </div>
                                        <div class="form-row justify-content-center">
                                            <div class="col-md-5 mb-3">
                                                <label for="validationCustom04">Bodega</label>
                                                <select id="cbBodegaModal" class="form-control mb-2 mr-sm-2 custom-select" onchange="enviarOtro()" required>
                                                    
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
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        
                                            
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-success" onclick="modificar()">Modificar</button>
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
                                    <p align="center">Los datosConsulta fueron modificados satifactoriamente.</p>
                                    <p align="center"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="cerrarBien" class="btn btn-success" data-dismiss="modal" onclick="limpiaTodo()">Cerrar</button>
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
                                                    $base = new PDO("mysql:host=localhost; dbname=vetportugal", "root", "");
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
                                    <p align="center">Los datosConsulta fueron eliminados satifactoriamente.</p>
                                    <p align="center"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="cerrarBienE" class="btn btn-success
                                    " data-dismiss="modal" onclick="limpiaTodo()">Cerrar</button>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    
                </section>

      <!--FOOTER-->      
      <?php  include '../../src/include/footer.php'; ?>
      </div><!--class Content inner...-->
        
      </div><!--class Page content...-->
     
    </div><!-- class PAGE--> 
  </body>
</html>
