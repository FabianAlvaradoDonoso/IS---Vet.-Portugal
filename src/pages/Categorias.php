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
            <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home">Home</a></li>
    <li><a data-toggle="pill" href="#menu1">Menu 1</a></li>
    <li><a data-toggle="pill" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="pill" href="#menu3">Menu 3</a></li>
  </ul>
            </div>
            
          </header>
          <div id="recargar">
          <section class="tables">
                <div id="tablaCategorias" class="container-fluid">
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="card">
                                <div class="card-header" style="border">
                                    <div class=" container ">
                                    <div class="row justify-content-between">
                                        <div class="col-7"><h4><strong>Categorias</strong></h4></div>                            
                                        <div class=" col-3 "><button type="button" class="btn btn-primary btn-sm mr-3" onclick="mostrarModalAgregarCategoria()">Nuevo</button></div>
                                    </div>
                                    </div>
                                </div>
                              <div class="card-body">
                                  <div class="table-resposive">
                                  <table class="table table-striped table-hover table-sm">
                                                <?php
                                                        
                                                include '../cnx.php';
                                                if(mysqli_connect_errno()){
                                                    echo "Error al conectar a la BBDD";
                                                exit();
                                                    }

                                                    mysqli_set_charset($conexion, "utf8");

                                                    //$ruta="AJAX/EliminarCategoria.php";
                                                    //$campo="NOMBRE_CATEGORIA";
                                                    $sql="SELECT * FROM categoria";
                                                    $res=mysqli_query($conexion,$sql);
                                                    echo    
                                                    '<thead>
                                                <tr class="thead-light">
                                                    <th class="text-center"></th>                     
                                                    <th class="text-center">Acciones</th>

                                                </tr>
                                                </thead>
                                                <tbody>';
                                        
                                        while ($row=mysqli_fetch_array($res)){

                                        $nombre = $row["NOMBRE_CATEGORIA"];
                                        $id  = $row["ID_CATEGORIA"];
                                        echo  "<tr>
                                                <td class='text-center'>'  \"$nombre\" '</td>
                                                <td align='center'><button type='button' class='btn btn-outline-success btn-sm' onclick='mostrarModificarCategoria(\"$id\",\"$nombre\")'><span class='oi oi-pencil'></span></button>
                                                <button type='button' class='btn btn-outline-danger btn-sm' onclick='previoEliminacionCat(\"$id\")'><span class='oi oi-trash'></span></button></td>
                                                </tr>";

                                        }
                                        echo '</tbody>';

                                    ?>
                   
                                </table>                                      
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>

                <div class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalAgregarCategoria">
                  <div class="modal-dialog ">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title">Nueva categoria</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button> 
                          </div>
                          <div class="modal-body">
                          <form id="formPaqN">
                              <div class="form-group">
                                  <label for="txtCodigo">Nombre </label>
                                  <input type="text" class="form-control" id="txtCatNombre" aria-describedby="nombre" placeholder="Nombre"  onkeypress="">
                              </div>                                         
                                                                                                
                          </form>                                    
                          </div>
                          <div class="modal-footer">
                              <button type="button" id="cerrarBienE" class="btn btn-danger" data-dismiss="modal" onclick="limpiaTodo()">Cancelar</button>
                              <button type="button" class="btn btn-success mr-3" onclick="nuevaCategoria()">Agregar</button>
                          </div>
                      </div>                        
                  </div>
              </div>
              <div class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalModificarCategoria">
                  <div class="modal-dialog ">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title">Modificación categoria</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button> 
                          </div>
                          <div class="modal-body">
                          <form id="formPaqN">
                              <div class="form-group">
                              <input type="hidden" id="id">
                              <label for="validationCustom03">Nombre</label>
                                    <input type="text" class="form-control" id="txtNombreCat" name="Nombre" placeholder="Nombre" value="" required>
                                    <div class="invalid-feedback"></div>
                              </div>                                         
                                                                                                
                          </form>                                    
                          </div>
                          <div class="modal-footer">
                              <button type="button" id="cerrarBienE" class="btn btn-danger" data-dismiss="modal" onclick="limpiaTodo()">Cancelar</button>
                              <button type="button" class="btn btn-success mr-3" onclick="modificarCategoria()">Modificar</button>
                          </div>
                      </div>                        
                  </div>
              </div>

               <div class='modal fade' id='modalPreparacionEliminacionCat' role='dialog'>
                  <div class='modal-dialog'>
          
                      <!-- Modal content-->
                      <div class='modal-content'>
                          <div class='modal-header'>
                              <h4 class='modal-title'>Confirmación</h4>
                              <button type='button' class='close' data-dismiss='modal'>&times;</button>
                          </div>
                          <div class='modal-body'>
                              <p>¿Está seguro de eliminar este elemento?.</p>
                          </div>
                          <div class='modal-footer'>    
                              <div class="container">
                                  <div class="row justify-content-between">  
                                  <input type="hidden" id="id"></input>
                                  <!--input type="hidden" id="tabla"></input-->
                                  <!--input type="hidden" id="campo"></input-->
                                  <!--input type="hidden" id="ruta"></input-->

                                      <button type='button' id='cerrarExito' class='btn btn-secondary' data-dismiss='modal' onclick=''>Cancelar</button>
                                      <button type='button' id='cerrarExito' class='btn btn-outline-danger' onclick='borrarCat()'>Eliminar</button>
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
