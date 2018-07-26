<!DOCTYPE html>
<html>
  
  <head>
  <?php require_once '../include/head.php';
    session_start();
    if(!isset($_SESSION["user"])){
      header("location:../login/login.php");
    }

    if($_SESSION["cargo"]!='1'){
      header("location:../../index.php");
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
      <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Configuraciones</h2>
            </div>
          </header>
        <section class="tables">      
        <div id="tablauser"class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                <div class="card-header" style="border">
                    <div class=" container ">
                      <div class="row justify-content-between">
                        <div class="col-3"><h4><strong>Usuarios</strong></h4></div>                            
                        <div class=" col-1 "><button type="button" class="btn btn-primary btn-sm" onclick="modalNuevo()">Nuevo</button></div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm">
                     <thead>
                      <tr class="thead-light">
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Usuario</th>
                        <th class="text-center">Contraseña</th>
                        <th class="text-center">Cargo</th>
                      </tr>
                     </thead>
                     <tbody id="ULista">
                     </tbody>
                   </table>
                  </div>
                </div>
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
