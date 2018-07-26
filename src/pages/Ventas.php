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
              <h2 class="no-margin-bottom">Ventas</h2>
            </div>
          </header>
      <section class="forms">
                    <div id="tabla" class="container-fluid">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Buscar</h5>    
                                    </div>
                                    <div class="card-body">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="codigo-tab" data-toggle="tab" href="#codigo" role="tab" aria-controls="codigo" aria-selected="true">Codigo</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="nombre-tab" data-toggle="tab" href="#nombre" role="tab" aria-controls="nombre" aria-selected="false">Nombre</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="codigo" role="tabpanel" aria-labelledby="codigo-tab">
                                                <form>
                                                    <div class="form-group"><br>
                                                        <label for="txtCodigo">Ingrese Código</label>
                                                        <input type="text" class="form-control" id="txtCodigo" aria-describedby="codigo" placeholder="Código"  onkeypress="pulsar(event)">
                                                    </div>
                                                    <div class = "row justify-content-around">
                                                        <button type="button" class="btn btn-primary" id="btnBusqueda" onclick="buscar()">Buscar</button>
                                                        <button type="button" class="btn btn-danger" onclick="limpiarBusquedas()">Limpiar busqueda</button>
                                                    </div>
                                                    
                                                </form>   
                                            </div>
                                            <div class="tab-pane fade" id="nombre" role="tabpanel" aria-labelledby="nombre-tab">
                                                <form>
                                                    <div class="form-group"><br>
                                                        <label for="txtNombre">Ingrese Nombre</label>
                                                        <input type="text" class="form-control" id="txtNombre" aria-describedby="nombre" placeholder="Nombre"  onkeypress="pulsar(event)">
                                                    </div>
                                                    <div class = "row justify-content-around">
                                                        <button type="button" class="btn btn-primary" id="btnBusqueda" onclick="buscarNombre()">Buscar</button>
                                                        <button type="button" class="btn btn-danger" onclick="limpiarBusquedas()">Limpiar busqueda</button>
                                                    </div>
                                                    
                                                </form>   
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card">
                                    <div class="card-header">
                                        <div class=" container ">
                                            <div class="row justify-content-between">
                                                <h5>Venta</h5>
                                                <div class=" col-2 "><button type="button" class="btn btn-outline-danger btn-sm borrarTodo" data-dismiss="modal" onclick="eliminarTrs()">Borrar Todo</button></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body" id="divTab">
                                        <table id="tablaVentas" class='table table-striped table-hover table-sm'>
                                            <thead>
                                                <th align="center">Codigo</th>
                                                <th align="center">Nombre</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
                                                <th>Opcion</th>
                                            </thead>
                                            <tbody id="tBody"></tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row justify-content-end">
                                            <p><h5 class=" mt-2">Total: $</h5></p>
                                            <h5 class="mr-3 mt-2"><div id="precioTotal"></div></h5>
                                            <button type="button" class="btn btn-success mr-3" data-dismiss="modal" onclick="array()">Realizar Compra</button>
                                            <div id="prueba"></div>
                                        </div>
                                        
                                    </div>
                                </div>


                                <div class='modal fade' id='modalError' role='dialog'>
                                    <div class='modal-dialog'>
                                        <!-- Modal content-->
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h4 class='modal-title'>Error</h4>
                                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                            </div>
                                            <div class='modal-body'>
                                                <p>No se puede continuar porque hay algunos productos que no tienen la cantidad suficiente de stock.</p>
                                                <p>Los siguientes productos estan en conflicto:</p>
                                                <div>
                                                    <table id="tablaError" class='table table-striped table-hover table-sm'>
                                                        <thead>
                                                            <th>Codigo</th>
                                                            <th>Nombre</th>
                                                            <th>Stock bodega</th>
                                                            <th>Cantidad Solicitada</th>
                                                        </thead>
                                                        <tbody id="tBodyError"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class='modal-footer'>      
                                                <button type='button' id='cerrarError' class='btn btn-danger' data-dismiss='modal'>Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='modal fade' id='modalExito' role='dialog'>
                                    <div class='modal-dialog'>
                            
                                        <!-- Modal content-->
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h4 class='modal-title'>Exito</h4>
                                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                            </div>
                                            <div class='modal-body'>
                                                <p>Los productos fueron descontados correctamente del inventario.</p>
                                            </div>
                                            <div class='modal-footer'>      
                                                <button type='button' id='cerrarExito' class='btn btn-danger' data-dismiss='modal' onclick=eliminarTrs()>Close</button>
                                            </div>
                                        </div>
                                    </div>
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
