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
  <style>
    .switch {
  font-size: 1rem;
  position: relative;
}
.switch input {
  position: absolute;
  height: 1px;
  width: 1px;
  background: none;
  border: 0;
  clip: rect(0 0 0 0);
  clip-path: inset(50%);
  overflow: hidden;
  padding: 0;
}
.switch input + label {
  position: relative;
  min-width: calc(calc(2.375rem * .8) * 2);
  border-radius: calc(2.375rem * .8);
  height: calc(2.375rem * .8);
  line-height: calc(2.375rem * .8);
  display: inline-block;
  cursor: pointer;
  outline: none;
  user-select: none;
  vertical-align: middle;
  text-indent: calc(calc(calc(2.375rem * .8) * 2) + .5rem);
}
.switch input + label::before,
.switch input + label::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: calc(calc(2.375rem * .8) * 2);
  bottom: 0;
  display: block;
}
.switch input + label::before {
  right: 0;
  background-color: #dee2e6;
  border-radius: calc(2.375rem * .8);
  transition: 0.2s all;
}
.switch input + label::after {
  top: 2px;
  left: 2px;
  width: calc(calc(2.375rem * .8) - calc(2px * 2));
  height: calc(calc(2.375rem * .8) - calc(2px * 2));
  border-radius: 50%;
  background-color: white;
  transition: 0.2s all;
}
.switch input:checked + label::before {
  background-color: #08d;
}
.switch input:checked + label::after {
  margin-left: calc(2.375rem * .8);
}
.switch input:focus + label::before {
  outline: none;
  box-shadow: 0 0 0 0.2rem rgba(0, 136, 221, 0.25);
}
.switch input:disabled + label {
  color: #868e96;
  cursor: not-allowed;
}
.switch input:disabled + label::before {
  background-color: #e9ecef;
}
.switch.switch-sm {
  font-size: 0.875rem;
}
.switch.switch-sm input + label {
  min-width: calc(calc(1.9375rem * .8) * 2);
  height: calc(1.9375rem * .8);
  line-height: calc(1.9375rem * .8);
  text-indent: calc(calc(calc(1.9375rem * .8) * 2) + .5rem);
}
.switch.switch-sm input + label::before {
  width: calc(calc(1.9375rem * .8) * 2);
}
.switch.switch-sm input + label::after {
  width: calc(calc(1.9375rem * .8) - calc(2px * 2));
  height: calc(calc(1.9375rem * .8) - calc(2px * 2));
}
.switch.switch-sm input:checked + label::after {
  margin-left: calc(1.9375rem * .8);
}
.switch.switch-lg {
  font-size: 1.25rem;
}
.switch.switch-lg input + label {
  min-width: calc(calc(3rem * .8) * 2);
  height: calc(3rem * .8);
  line-height: calc(3rem * .8);
  text-indent: calc(calc(calc(3rem * .8) * 2) + .5rem);
}
.switch.switch-lg input + label::before {
  width: calc(calc(3rem * .8) * 2);
}
.switch.switch-lg input + label::after {
  width: calc(calc(3rem * .8) - calc(2px * 2));
  height: calc(calc(3rem * .8) - calc(2px * 2));
}
.switch.switch-lg input:checked + label::after {
  margin-left: calc(3rem * .8);
}
.switch + .switch {
  margin-left: 1rem;
}



.dropdown-menu {
  margin-top: .75rem;
}
    </style> 
  <body>
    <!--PAGINA-->
    <div class="page">
     <!--NAVBAR--> 
    <div class="header">
    <?php  include '../../src/include/navbar.php';  ?>
    </div><!--navbar-->
    
      <div class="page-content d-flex align-items-stretch">
      
      <!--SIDEBAR-->    
      <?php  include '../../src/include/sidebar.php'; 
         $nombre=""; $tabla=""; $campo=""; $campoID=""; $id="";
        ?>

      <!--CONTENIDO-->
      <div class="content-inner">
            <header class="page-header">
              <div class="container-fluid">
                 <h2 class="no-margin-bottom">Configuraciones</h2>
                
            </div>
           </header>
          <div id="recargar">
          <section class="tables"> 
              <!-- TABLA USUARIOS-->     
              <div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="card">
                      <div class="card-header" style="border">
                          <div class=" container ">
                            <div class="row justify-content-between">
                              <div class="col-7"><h4><strong>Usuarios</strong></h4></div>                            
                              <div class=" col-3 "><button type="button" class="btn btn-primary btn-sm mr-3" onclick="mostrarModalAgregarUsuario()">Nuevo</button></div>
                            </div>
                          </div>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-striped table-hover table-sm">
                          <?php
                                  
                            include '../cnx.php';
                            if(mysqli_connect_errno()){
                              echo "Error al conectar a la BBDD";
                            exit();
                              }

                              mysqli_set_charset($conexion, "utf8");

                            
                              $sql="SELECT * FROM usuarios";
                              $res=mysqli_query($conexion,$sql);
                              $tabla="usuarios";
                              $campoID="id";

                              echo    
                              '<thead>
                            <tr class="thead-light">
                              <th class="text-center">Tipo Cuenta</th>
                              <th class="text-center">Nombre</th>
                              <th class="text-center">Usuario</th>
                              <th class="text-center">Contraseña</th>                      
                              <th class="text-center">Acciones</th>

                            </tr>
                          </thead>
                          <tbody>';
                  
                              while ($row=mysqli_fetch_array($res)){

                                $nombre = $row["nombre"];
                                $id=$row["id"];
                                $user = $row["user"];
                                $pass = $row["pass"];
                                $tipocuenta = $row["cargo"];
                                if($tipocuenta=='1'){
                                  $cargo = 'Administrador';
                                }
                                else{
                                  $cargo = 'estandar';
                                }
                                echo '<tr>';
                                if($user != 'admin')
                                {
                                  echo  '
                                      <td class="text-center">' . $cargo . '</td>
                                      <td class="text-center">' . $nombre . '</td>
                                      <td class="text-center">' . $user . '</td>
                                      <td class="text-center">' . $pass . '</td>';
                                
                                                             
                               
                                echo "<td align='center'><button type='button' class='btn btn-outline-success btn-sm' onclick='mostrarModalModificarUsuario(\"$id\",\"$nombre\",\"$pass\",\"$user\")'><span class='oi oi-pencil'></span></button>";
                                echo "<button type=button' class='btn btn-outline-danger btn-sm' onclick='previoEliminacionElemento(\"$id\",\"$tabla\",\"$campoID\")'><span class='oi oi-trash'></span></button></td>";
                                }
                                echo "  </tr>";

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
                
                            <!--MODAL AGREGAR USUARIO-->
                <div class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalAgregarUsuario">
                              <div class="modal-dialog ">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h4 class="modal-title">Nueva cuenta</h4>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button> 
                                      </div>
                                      <div class="modal-body">
                                      <form >
                                          <div class="form-group">
                                              <label for="txtCodigo">Nombre del usuario</label>
                                              <input type="text" class="form-control" id="txtUserNombre" aria-describedby="nombre" placeholder="Nombre"  onkeypress="">
                                          </div>
                                          <div class="form-group">
                                              <label for="txtCodigo">Usuario para ingresar</label>
                                              <input type="text" class="form-control" id="txtUserUser" aria-describedby="nombre" placeholder="Por ejemplo User1"  onkeypress="">
                                          </div>
                                          <div class="form-group">
                                              <label for="txtCodigo"class="label-material">Contraseña</label>
                                              <input type="password" class="form-control" id="txtUserPass" aria-describedby="nombre" placeholder=""  onkeypress="">
                                          </div>
                                          <div class="form-group">  
                                          <span class="switch switch-sm">
                                              <input type="checkbox" class="switch" id="switch-sm">
                                              <label for="switch-sm">Administrador</label>
                                          </span>
                                          </div>
                                                                    
                                      </form>                                    
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" id="cerrarBienE" class="btn btn-danger" data-dismiss="modal" onclick="limpiaTodo()">Cancelar</button>
                                          <button type="button" class="btn btn-success mr-3" onclick="nuevoUsuario()">Agregar cuenta</button>
                                      </div>
                                  </div>                        
                  </div>
              </div>

                        <!--MODAL AGREGAR USUARIO-->
                        <div class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalModificarUsuario">
                              <div class="modal-dialog ">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h4 class="modal-title">Modificación</h4>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button> 
                                      </div>
                                      <div class="modal-body">
                                      <form >
                                          <input type="hidden" id="idUserM"></input>
                                      <div class="form-group">
                                        <label for="validationCustom01">Nombre </label>
                                                <input type="text" class="form-control" id="txtNombreUserM" name="Nombre" placeholder="Nombre" value="" required>
                                                <div class="valid-feedback"></div>                                          
                                        </div> 
                                        <div class="form-group">
                                            <label for="validationCustom01">Usuario</label>
                                                    <input type="text" class="form-control" id="txtUsuarioUserM" name="Nombre" placeholder="user1" value="" required>
                                                    <div class="valid-feedback"></div>                                          
                                            </div> 
                                          <div class="form-group">
                                              <label for="txtCodigo"class="label-material">Contraseña</label>
                                              <input type="password" class="form-control" id="txtUserPassM" aria-describedby="nombre" placeholder=""  onkeypress="">
                                          </div>
                                          <div class="form-group">  
                                          <span class="switch switch-sm">
                                              <input type="checkbox" class="switch" id="switch-smM">
                                              <label for="switch-sm">Administrador</label>
                                          </span>
                                          </div>
                                                                    
                                      </form>                                    
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" id="cerrarBienE" class="btn btn-danger" data-dismiss="modal" onclick="limpiaTodo()">Cancelar</button>
                                          <button type="button" class="btn btn-success mr-3" onclick="modificarCuenta()">Modificar cuenta</button>
                                      </div>
                                  </div>                        
                  </div>
              </div>
                            <!--TABLA PROVEEDORES-->     

              <div class="container-fluid">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="card">
                                <div class="card-header" style="border">
                                    <div class=" container ">
                                    <div class="row justify-content-between">
                                        <div class="col-7"><h4><strong>Proveedores</strong></h4></div>                            
                                        <?php  $tabla="proveedor";
                                                $campo="NOMBRE_PROVEEDOR";                                         
                                        echo"<div class=' col-3 '><button type='button' class='btn btn-primary btn-sm mr-3' 
                                        onclick='mostrarModalAgregarElemento(\"$tabla\",\"$campo\")'>Nuevo</button></div>";
                                        ?>
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

                                                    
                                                    $campoID="ID_PROVEEDOR";                                                   
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
                      <!--TABLA CATEGORIAS-->

  <div class="container-fluid">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="card">
                                <div class="card-header" style="border">
                                    <div class=" container ">
                                    <div class="row justify-content-between">
                                        <div class="col-9"><h4><strong>Categorias</strong></h4></div>                            
                                        <?php  $tabla="categoria";
                                                $campo="NOMBRE_CATEGORIA";
                                                echo"<div class=' col-3 '><button type='button' class='btn btn-primary btn-sm mr-3' 
                                        onclick='mostrarModalAgregarElemento(\"$tabla\",\"$campo\")'>Nuevo</button></div>";
                                        ?>
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

                                                    
                                                    $campoID="ID_CATEGORIA";                                                    
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

                <!--TABLA BODEGA-->
           
                   <div class="container-fluid">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="card">
                                <div class="card-header" style="border">
                                    <div class=" container ">
                                    <div class="row justify-content-between">
                                        <div class="col-7"><h4><strong>Bodegas</strong></h4></div>                            
                                        <?php  $tabla="bodega";
                                                $campo="NOMBRE_BODEGA";
                                                echo"<div class=' col-3 '><button type='button' class='btn btn-primary btn-sm mr-3' 
                                        onclick='mostrarModalAgregarElemento(\"$tabla\",\"$campo\")'>Nuevo</button></div>";
                                        ?>
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

                                                    $campoID="ID_BODEGA";                                                  
                                                    $sql="SELECT * FROM bodega";
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

                                                $nombre = $row["NOMBRE_BODEGA"];
                                                $id  = $row["ID_BODEGA"];
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
                                                
                            <!--MODAL CONFIRMAR ELIMINACION-->
          
              
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
                                      <input type="hidden" id="idE"></input>
                                      <input type="hidden" id="tablaE"></input>
                                      <input type="hidden" id="campoIDE"></input>
                                      <button type='button' id='cerrarExito' class='btn btn-secondary' data-dismiss='modal' onclick=''>Cancelar</button>
                                      <button type='button' id='cerrarExito' class='btn btn-outline-danger' onclick='borrarElemento()'>Eliminar</button>
                                  </div>
                              </div>
                          </div>
                        </div>
                      </div>
                  </div>
               </div>
              
                            <!--MODAL EXITO-->
              
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
                                      <!--?php $nombre=""; $tabla=""; $campo=""; $campoID=""; $id="";?-->
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
                                <form >
                                    <div class="form-group">
                                        
                                        <input type="hidden" id="campoA"></input>
                                        <input type="hidden" id="tablaA"></input>
                                        <label for="txtCodigo">Nombre </label>
                                        <input type="text" class="form-control" id="txtNombreElementoA" aria-describedby="nombre" placeholder="Nombre"  onkeypress="">
                                    </div>                                         
                                                                                                        
                                </form>                                    
                            </div>
                          <div class="modal-footer">    
                              <button type="button" id="cerrarBienE" class="btn btn-danger" data-dismiss="modal" onclick="limpiaTodo()">Cancelar</button>
                              <button type="button" class="btn btn-success mr-3" onclick="nuevoElemento()">Agregar</button>
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
                          <form >
                              <div class="form-group">
                              <input type="hidden" id="idM"></input>
                              <input type="hidden" id="campoM"></input>
                              <input type="hidden" id="tablaM"></input>
                              <input type="hidden" id="campoIDM"></input>
                              <div class="form-group">
                              <label for="validationCustom01">Nuevo nombre</label>
                                    <input type="text" class="form-control" id="txtNombreElementoM" name="Nombre" placeholder="Nombre" value="" required>
                                    <div class="valid-feedback"></div>                                          
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
       
          </section>
          </div>
      <!--FOOTER-->      
      <?php  include '../../src/include/footer.php'; ?>
      </div><!--class Content inner...-->
    
      </div><!--class Page content...-->
     
    </div><!-- class PAGE--> 
  </body>
</html>
