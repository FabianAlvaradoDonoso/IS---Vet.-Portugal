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
              <h2 class="no-margin-bottom">Elementos</h2>
            </div>
          </header>
          <div id="recargar">
          
          <section class="tables">

                <div id="tablaElementos" class="container-fluid">
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="card">
                                <div class="card-header" style="border">
                                    <div class=" container ">
                                    <div class="row justify-content-between">
                                        <div class="col-7"><h4><strong>Elementos</strong></h4></div>                            
                                        <div class=" col-3 "><button type="button" class="btn btn-primary btn-sm mr-3" 
                                        onclick="mostrarModalAgregarElemento()">Nuevo</button></div>
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

                                                    $tabla="proveedor";
                                                    $campoID="ID_PROVEEDOR";
                                                    $campo="NOMBRE_PROVEEDOR";                                                    
                                                    $sql="SELECT * FROM proveedor";
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

                                                $nombre = $row["NOMBRE_PROVEEDOR"];
                                                $id  = $row["ID_PROVEEDOR"];
                                                echo  "<tr>
                                                        <td class='text-center'>" . $nombre. "</td>";
                                                    echo "<td align='center'><button type='button' class='btn btn-outline-success btn-sm' onclick='mostrarModalModificarElemento(\"$id\",\"$nombre\",\"$campo\",\"$campoID\",\"$tabla\")'><span class='oi oi-pencil'></span></button>
                                                    <button type='button' class='btn btn-outline-danger btn-sm' onclick='previoEliminacionElemento(\"$id\",\"$tabla\",\"$campoID\")'><span class='oi oi-trash'></span></button></td>";
                            
                                                echo "</tr>";
                                                }
                                                echo "</tbody>";

                                            ?>
                   
                                        </table>                                      
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>

                <div class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalAgregarElemento">
                  <div class="modal-dialog ">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title">Nuevo Elemento</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button> 
                          </div>
                            <div class="modal-body">
                                <form id="formPaqN">
                                    <div class="form-group">
                                        
                                        <input type="hidden" id="campo"></input>
                                        <input type="hidden" id="tabla"></input>
                                        <label for="txtCodigo">Nombre </label>
                                        <input type="text" class="form-control" id="txtNombreElemento" aria-describedby="nombre" placeholder="Nombre"  onkeypress="">
                                    </div>                                         
                                                                                                        
                                </form>                                    
                            </div>
                          <div class="modal-footer">    
                              <button type="button" id="cerrarBienE" class="btn btn-danger" data-dismiss="modal" onclick="limpiaTodo()">Cancelar</button>
                              <?php echo"<button type='button' class='btn btn-success mr-3' onclick='nuevoElemento(\"$tabla\",\"$campo\")'>Agregar</button>";?>
                          </div>
                      </div>                        
                  </div>
                </div>
                <div class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalModificarElemento">
                  <div class="modal-dialog ">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title">Modificación</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button> 
                          </div>
                          <div class="modal-body">
                          <form id="formPaqN">
                              <div class="form-group">
                              <input type="hidden" id="id"></input>
                              <input type="hidden" id="campo"></input>
                              <input type="hidden" id="tabla"></input>
                              <input type="hidden" id="campoID"></input>
                              <div class="form-group">
                              <label for="txtCodigo">Nuevo nombre</label>
                            <input type="text" class="form-control" id="txtNombreElemento" placeholder="Nombre" value="" required>                                          
                              </div>                                         
                                                                                                
                          </form>                                    
                          </div>
                          <div class="modal-footer">
                              <button type="button" id="cerrarBienE" class="btn btn-danger" data-dismiss="modal" onclick="limpiaTodo()">Cancelar</button>
                              <button type="button" class="btn btn-success mr-3" onclick="modificarElemento()">Modificar</button>
                          </div>
                      </div>                        
                  </div>
              </div>

                <div class='modal fade' id='modalPreparacionEliminacion' role='dialog'>
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
                                  <input type="hidden" id="tabla"></input>
                                  <input type="hidden" id="campoID"></input>

                                  <!--input type="hidden" id="tabla"></input-->
                                  <!--input type="hidden" id="campo"></input-->
                                  <!--input type="hidden" id="ruta"></input-->

                                      <button type='button' id='cerrarExito' class='btn btn-secondary' data-dismiss='modal' onclick=''>Cancelar</button>
                                      <button type='button' id='cerrarExito' class='btn btn-outline-danger' onclick='borrarElemento()'>Eliminar</button>
                                  </div>
                              </div>
                          </div>
                        </div>
                      </div>
                  </div>
               </div>

               <div class='modal fade' id='modalExito' role='dialog'>
                  <div class='modal-dialog'>
          
                      <!-- Modal content-->
                      <div class='modal-content'>
                          <div class='modal-header'>
                              <h4 class='modal-title'>Listo</h4>
                              <button type='button' class='close' data-dismiss='modal'>&times;</button>
                          </div>
                          <div class='modal-body'>
                              <p>Accion realizada con éxito.</p>
                          </div>
                          <div class='modal-footer'>    
                              <div class="container">
                                  <div class="row justify-content-end">  
                                      <button type='button' id='cerrarExito' class='btn btn-success' data-dismiss='modal' onclick='updateDiv()'>Cerrar</button>
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
