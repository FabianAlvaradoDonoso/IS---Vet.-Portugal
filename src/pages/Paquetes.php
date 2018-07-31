<!DOCTYPE html>
<html>
  
  <head>
  <?php require_once '../include/head.php';
    session_start();
    if(!isset($_SESSION["user"])){
      header("location:../login/login.php");
    }
  ?>
  </head> 
  <body>
    <!--PAGINA-->
    <div class="page">
     <!--NAVBAR--> 
    <div class="header">
    <?php  include '../include/navbar.php';  ?>
    </div><!--navbar-->
    
      <div class="page-content d-flex align-items-stretch">
      
      <!--SIDEBAR-->    
      <?php  include '../include/sidebar.php'; ?>

      <!--CONTENIDO-->
      <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Paquetes</h2>
            </div>
          </header>
          <section class="forms">
                    <div id="tabla" class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Búsqueda</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="myTabContent">

                                            <div class="container">

                                                <div class="text-center">
                                                    <div class="row">
                                                
                                                        <div class="col-3">
                                                            <div class="list-group" id="list-tab" role="tablist">
                                                                <a class="list-group-item list-group-item-action " id="list-articulos-list" data-toggle="list" href="#list-articulos" role="tab" aria-controls="articulos" onclick="mostrarPacks('Articulo')">Tienda</a>
                                                                <a class="list-group-item list-group-item-action" id="list-operaciones-list" data-toggle="list" href="#list-operaciones" role="tab" aria-controls="operaciones" onclick="mostrarPacks('cirugia')">Clínico Quirurgico</a>
                                                            </div>
                                                        </div>
                                                        <div class="tab-content col-6 d-flex justify-content-center" id="nav-tabContent">
                                                            <div class="tab-pane fade show " id="list-articulos" role="tabpanel" aria-labelledby="list-articulos-list">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="container d-inline">
                                                                            <div class='form-inline' id='' >
                                                                                <label class="mb-1" for="">Ingrese Nombre del paquete de artículos</label>
                                                                            </div>                                                           
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class='col-md-12'>
                                                                            <input type='text' class="form-control mb-1 form-control-" id="nombreArticulo" placeholder="Nombre paquete artículos" onkeyup="buscarFavNoFav('Articulo', 'nombreArticulo')">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="row">
                                                                        <div class="container">
                                                                            <div class='form-inline' id='' >
                                                                                <button type="buttom" class="btn btn-success mr-5 ml-1" id="btnBuscarArticulo" onclick="buscarFavNoFav('Articulo', 'nombreArticulo')">Buscar</button>
                                                                                <button type="buttom" class="btn btn-danger ml-5 mr-1" onclick="limpiarPaquete('nombreArticulo', 'Articulo')">Limpiar busqueda</button>
                                                                            </div>                                                           
                                                                        </div>
                                                                    </div>
                                                                </div>  
                                                            </div>      
                                                            <div class="tab-pane fade show" id="list-operaciones" role="tabpanel" aria-labelledby="list-operaciones-list">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="container d-inline">
                                                                            <div class='form-inline' id='' >
                                                                                <label class="mb-1" for="">Ingrese Nombre del paquete de cirugía</label>
                                                                            </div>                                                           
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class='col-md-12'>
                                                                            <input type='text' class="form-control mb-1 form-control-" id="nombreOperacion" placeholder="Nombre paquete cirugía" onkeyup="buscarFavNoFav('Cirugia', 'nombreOperacion')">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="row">
                                                                        <div class="container">
                                                                            <div class='form-inline' id='datetimepicker6' >
                                                                                <button type="buttom" class="btn btn-success ml-1 mr-5" id="btnBuscarCirugia" onclick="buscarFavNoFav('Cirugia', 'nombreOperacion')">Buscar</button>
                                                                                <button type="buttom" class="btn btn-danger ml-5 mr-1" onclick="limpiarPaquete('nombreOperacion', 'Cirugia')">Limpiar busqueda</button>
                                                                            </div>                                                           
                                                                        </div>
                                                                    </div>
                                                                </div>  
                                                            </div>      
                                                        </div>
                                                        <div class='col-3 '>
                                                            <button type="buttom" class="btn btn-primary mt-4" onclick="nuevoPaquete()"><span class="oi oi-plus"></span> Nuevo Paquete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <h5><i class="fas fa-star"></i> Favoritos</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="myTabContent">

                                            <div class="container">
                                                <div class="row" id="favoritos"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <h5><i class="far fa-star"></i> No Favoritos</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="myTabContent">

                                            <div class="container">

                                                <div class="text-center">
                                                    <div class="row">
                                                        <div class="table-responsive">
                                        
                                                            <table class='table table-striped table-hover table-sm'>
                                                                <thead>
                                                                    <tr class="thead-light">
                                                                        <th class="text-center">Nombre</th>
                                                                        <th class="text-center">Precio</th>
                                                                        <th class="text-center">N° Productos</th>
                                                                        <th class="text-center">Opciones</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="BLista">
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>                           
                            </div>
                        </div>   
                    </div>  
                
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalAgregarPaquete">
                        <div class="modal-dialog modal-lg modal-dialog1">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Paquete Nuevo</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button> 
                                </div>
                                <div class="modal-body modal-body1">
                                    <div id="tabla" class="container-fluid">
                                        <div class="row">
                                            <div class="col-4">
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
                                                                <form id="formCod">
                                                                    <div class="form-group"><br>
                                                                        <label for="txtCodigo">Ingrese Código</label>
                                                                        <input type="text" class="form-control" id="txtCodigo" aria-describedby="codigo" placeholder="Código"  onkeypress="pulsar(event)">
                                                                    </div>
                                                                    <div class = "row justify-content-around">
                                                                        <button type="button" class="btn btn-primary mb-1" id="btnBusqueda" onclick="buscar()">Buscar</button>
                                                                        <button type="button" class="btn btn-danger" onclick="limpiarBusquedas()">Limpiar busqueda</button>
                                                                    </div>
                                                                    
                                                                </form>   
                                                            </div>
                                                            <div class="tab-pane fade" id="nombre" role="tabpanel" aria-labelledby="nombre-tab">
                                                                <form id="formNom">
                                                                    <div class="form-group"><br>
                                                                        <label for="txtNombre">Ingrese Nombre</label>
                                                                        <input type="text" class="form-control" id="txtNombre" aria-describedby="nombre" placeholder="Nombre"  onkeypress="pulsarNombre(event)">
                                                                    </div>
                                                                    <div class = "row justify-content-around">
                                                                        <button type="button" class="btn btn-primary mb-1" id="btnBusqueda" onclick="buscarNombre()">Buscar</button>
                                                                        <button type="button" class="btn btn-danger" onclick="limpiarBusquedas()">Limpiar busqueda</button>
                                                                    </div>
                                                                    
                                                                </form>   
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="card">
                                                        <div class="card-body" id="divTab">
                                                            <form id="formCb">
                                                                <div class="form-group">
                                                                    <label for="">¿Paquete de Artículos o Cirugía?</label>
                                                                    <select class="form-control" name="" id="cbPaquete">
                                                                        <option value="" selected>Elija Opción</option>
                                                                        <option value="Articulos" >Artículos</option>
                                                                        <option value="Cirugia" >Cirugía</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="favorito">
                                                                    <label class="form-check-label" for="defaultCheck1">Favorito</label>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-8">
                                                <div class=''>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class=" container ">
                                                                <div class="row justify-content-between">
                                                                    <h5>Paquete</h5>
                                                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminarTrs()">Borrar Todo</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body" id="divTab">
                                                            <table id="tablaVentas" class='table table-striped table-hover table-sm'>
                                                                <thead>
                                                                    <th class="text-center">Codigo</th>
                                                                    <th class="text-center">Nombre</th>
                                                                    <th>Precio</th>
                                                                    <th class="text-center" width="75px">Cantidad</th>
                                                                    <th class="text-center" width="50px">Opcion</th>
                                                                </thead>
                                                                <tbody id="tBody"></tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="row justify-content-end">
                                                                <p><h5 class=" mt-2">Total: $</h5></p>
                                                                <h5 class="mr-3 mt-2"><div id="precioTotal">0</div></h5>
                                                                <div id="prueba"></div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-body" id="divTab">
                                                            <form id="formPaqN">
                                                                <div class="form-group">
                                                                    <label for="txtCodigo">Nombre del Paquete</label>
                                                                    <input type="text" class="form-control" id="txtNombrePaquete" aria-describedby="nombre" placeholder="Nombre Paquete"  onkeypress="">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-body" id="divTab">
                                                            <form id="formPaqP">
                                                                <div class="form-group">
                                                                    <label for="txtCodigo">Precio del Paquete <small>(en caso de no querer el de los productos por separado)</small></label>
                                                                    <input type="number" class="form-control" id="txtPrecioPaquete" aria-describedby="precio" placeholder="Precio Paquete"  onkeypress="">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="cerrarBienE" class="btn btn-danger" data-dismiss="modal" onclick="limpiaTodo()">Cerrar</button>
                                    <button type="button" class="btn btn-success mr-3" onclick="crearPaquete()">Guardar Paquete</button>
                                </div>
                            </div>
                        
                        </div>
                    </div>

                    <div class='modal fade' id='modalAgregadoExito' role='dialog'>
                        <div class='modal-dialog'>
                
                            <!-- Modal content-->
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h4 class='modal-title'>Exito</h4>
                                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                </div>
                                <div class='modal-body'>
                                    <p>El paquete fue creado correctamente!.</p>
                                </div>
                                <div class='modal-footer'>      
                                    <button type='button' id='cerrarExito' class='btn btn-danger' data-dismiss='modal' onclick=eliminarTrs()>Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade bd-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalModificarPaquete">
                        <div class="modal-dialog modal-lg modal-dialog1">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Modificar Paquete</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button> 
                                </div>
                                <div class="modal-body modal-body1">
                                    <div id="tabla" class="container-fluid">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Buscar</h5>    
                                                    </div>
                                                    <div class="card-body">
                                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="codigoModificar-tab" data-toggle="tab" href="#codigoModificar" role="tab" aria-controls="codigoModificar" aria-selected="true">Codigo</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="nombreModificar-tab" data-toggle="tab" href="#nombreModificar" role="tab" aria-controls="nombreModificar" aria-selected="false">Nombre</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content" id="myTabContent">
                                                            <div class="tab-pane fade show active" id="codigoModificar" role="tabpanel" aria-labelledby="codigoModificar-tab">
                                                                <form id="formCod">
                                                                    <div class="form-group"><br>
                                                                        <label for="txtCodigo">Ingrese Código</label>
                                                                        <input type="text" class="form-control" id="txtCodigoModificar" aria-describedby="codigoModificar" placeholder="Código"  onkeypress="pulsarNombre2(event)">
                                                                    </div>
                                                                    <div class = "row justify-content-around">
                                                                        <button type="button" class="btn btn-primary mb-1" id="btnBusqueda" onclick="buscar2()">Buscar</button>
                                                                        <button type="button" class="btn btn-danger" onclick="limpiarBusquedas()">Limpiar busqueda</button>
                                                                    </div>
                                                                    
                                                                </form>   
                                                            </div>
                                                            <div class="tab-pane fade" id="nombreModificar" role="tabpanel" aria-labelledby="nombreModificar-tab">
                                                                <form id="formNom">
                                                                    <div class="form-group"><br>
                                                                        <label for="txtNombre">Ingrese Nombre</label>
                                                                        <input type="text" class="form-control" id="txtNombreModificar" aria-describedby="nombreModificar" placeholder="Nombre"  onkeypress="pulsarNombre2(event)">
                                                                    </div>
                                                                    <div class = "row justify-content-around">
                                                                        <button type="button" class="btn btn-primary mb-1" id="btnBusqueda" onclick="buscarNombre2()">Buscar</button>
                                                                        <button type="button" class="btn btn-danger" onclick="limpiarBusquedas()">Limpiar busqueda</button>
                                                                    </div>
                                                                    
                                                                </form>   
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="card">
                                                        <div class="card-body" id="divTab">
                                                            <form id="formCb">
                                                                <div class="form-group">
                                                                    <label for="">¿Paquete de Artículos o Cirugía?</label>
                                                                    <select class="form-control" name="" id="cbPaqueteModificar">
                                                                        <option value="" selected>Elija Opción</option>
                                                                        <option value="Articulos" >Articulos</option>
                                                                        <option value="Cirugia" >Cirugía</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="favoritoModificar">
                                                                    <label class="form-check-label" for="defaultCheck1">Favorito</label>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-8">
                                                <div class=''>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class=" container ">
                                                                <div class="row justify-content-between">
                                                                    <h5>Paquete</h5>
                                                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminarTrs()">Borrar Todo</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body" id="divTab">
                                                            <table id="tablaVentasModificar" class='table table-striped table-hover table-sm'>
                                                                <thead>
                                                                    <th class="text-center">Codigo</th>
                                                                    <th class="text-center">Nombre</th>
                                                                    <th>Precio</th>
                                                                    <th class="text-center" width="75px">Cantidad</th>
                                                                    <th class="text-center" width="50px">Opcion</th>
                                                                </thead>
                                                                <tbody id="tBodyModificar"></tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="row justify-content-end">
                                                                <p><h5 class=" mt-2">Total: $</h5></p>
                                                                <h5 class="mr-3 mt-2"><div id="precioTotalModificar">0</div></h5>
                                                                <div id="prueba"></div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-body" id="divTab">
                                                            <form id="formPaqN">
                                                                <div class="form-group">
                                                                    <label for="txtCodigo">Nombre del Paquete</label>
                                                                    <input type="text" class="form-control" id="txtNombrePaqueteModificar" aria-describedby="nombre" placeholder="Nombre Paquete"  onkeypress="">
                                                                    <input type="hidden" class="form-control" id="txtCodigoPaqueteModificar" aria-describedby="codigo" placeholder="Codigo Paquete"  onkeypress="">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-body" id="divTab">
                                                            <form id="formPaqP">
                                                                <div class="form-group">
                                                                    <label for="txtCodigo">Precio del Paquete <small>(en caso de no querer el de los productos por separado)</small></label>
                                                                    <input type="number" class="form-control" id="txtPrecioPaqueteModificar" aria-describedby="precio" placeholder="Precio Paquete"  onkeypress="">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <div class="container">
                                        <div class="row justify-content-between">
                                            <button type="button" class="btn btn-outline-danger" onclick="preparacionEliminar()">Eliminar Paquete</button>
                                            <button type="button" class="btn btn-success " onclick="modificarPaqueteFinal()">Modificar Paquete</button>
                                            <button type="button" class="btn btn-primary" onclick="arrayM()">Vender Paquete</button>
                                            <button type="button" id="cerrarBienE" class="btn btn-danger" data-dismiss="modal" onclick="limpiaTodo()">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>

                    <div class='modal fade' id='modalPaqueteError' role='dialog'>
                        <div class='modal-dialog'>
                
                            <!-- Modal content-->
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h4 class='modal-title'>Error</h4>
                                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                </div>
                                <div class='modal-body'>
                                    <p>Surgio un error!, revise que se rellenaron los campos de PRODUCTOS, la OPCION de artículo o cirugia y el NOMBRE del producto.</p>
                                </div>
                                <div class='modal-footer'>      
                                    <button type='button' id='cerrarExito' class='btn btn-danger' data-dismiss='modal' onclick=''>Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='modal fade' id='modalPaqueteModificacion' role='dialog'>
                        <div class='modal-dialog'>
                
                            <!-- Modal content-->
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h4 class='modal-title'>Modificación</h4>
                                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                </div>
                                <div class='modal-body'>
                                    <p>Se modificaron correctamente los datos.</p>
                                </div>
                                <div class='modal-footer'>      
                                    <button type='button' id='cerrarExito' class='btn btn-danger' data-dismiss='modal' onclick=''>Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='modal fade' id='modalPaquetePreparacionEliminacion' role='dialog'>
                        <div class='modal-dialog'>
                
                            <!-- Modal content-->
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h4 class='modal-title'>Eliminación de Paquete</h4>
                                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                </div>
                                <div class='modal-body'>
                                    <p>¿Está seguro de eliminar el paquete?.</p>
                                </div>
                                <div class='modal-footer'>    
                                    <div class="container">
                                        <div class="row justify-content-between">  
                                            <button type='button' id='cerrarExito' class='btn btn-secondary' data-dismiss='modal' onclick=''>Cerrar</button>
                                            <button type='button' id='cerrarExito' class='btn btn-outline-danger' onclick='eliminacionPaquete()'>Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='modal fade' id='modalPaqueteEliminado' role='dialog'>
                        <div class='modal-dialog'>
                
                            <!-- Modal content-->
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h4 class='modal-title'>Eliminación de Paquete</h4>
                                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                </div>
                                <div class='modal-body'>
                                    <p>Se ha eliminado el paquete.</p>
                                </div>
                                <div class='modal-footer'>    
                                    <div class="container">
                                        <div class="row justify-content-end">  
                                            <button type='button' id='cerrarExito' class='btn btn-secondary' data-dismiss='modal' onclick='esconderModal()'>Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='modal fade' id='modalErrorP' role='dialog'>
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
                                        <table id="tablaErrorP" class='table table-striped table-hover table-sm'>
                                            <thead>
                                                <th>Codigo</th>
                                                <th>Nombre</th>
                                                <th>Stock bodega</th>
                                                <th>Cantidad Solicitada</th>
                                            </thead>
                                            <tbody id="tBodyErrorP"></tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class='modal-footer'>      
                                    <button type='button' id='cerrarError' class='btn btn-danger' data-dismiss='modal'>Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='modal fade' id='modalExito2' role='dialog'>
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

                    <div class='modal fade' id='modalPaqueteExiste' role='dialog'>
                        <div class='modal-dialog'>
                
                            <!-- Modal content-->
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h4 class='modal-title'>Error</h4>
                                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                </div>
                                <div class='modal-body'>
                                    <p>Ya existe un paquete con ese nombre, intente con otro.</p>
                                </div>
                                <div class='modal-footer'>      
                                    <button type='button' id='cerrarExito' class='btn btn-danger' data-dismiss='modal'>Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </section>   

      <!--FOOTER-->      
      <?php  include '../include/footer.php'; ?>
      </div><!--class Content inner...-->
        
      </div><!--class Page content...-->
     
    </div><!-- class PAGE--> 
  </body>
</html>
