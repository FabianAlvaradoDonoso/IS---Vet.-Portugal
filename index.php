<!DOCTYPE html>
<html>
  
  <head>
  <?php require_once 'src/include/head.php';
    session_start();
    if(!isset($_SESSION["user"])){
      header("location:src/login/login.php");
    }
  ?>
  </head> 
  <body>
    <!--PAGINA-->
    <div class="page">
     <!--NAVBAR--> 
    <div class="header">
    <?php  include 'src/include/navbar.php';  ?>
    </div><!--navbar-->
    
      <div class="page-content d-flex align-items-stretch">
      
      <!--SIDEBAR-->    
      <?php  include 'src/include/sidebar.php'; ?>

      <!--CONTENIDO-->
      <div class="content-inner">
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">Principal</h2>
            </div>
        </header>      
        <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
                <div class="row bg-white has-shadow">
                    <!-- Item -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="item d-flex align-items-center">
                            <div class="icon bg-green"><i class="icon-padnote"></i></div>
                            <div class="title"><span>Productos<br>Totales</span>
                                <div class="progress">
                                        
                                </div>
                            </div>
                            <?php            
                                echo "<div class='number'><strong>". $total ."</strong></div>";
                            ?>
                        </div>
                        <button class="btn btn-sm btn-outline-success ml-5" onclick= "irProductos()">&nbsp;Ir a Productos&nbsp;</button>
                    </div>
                    <!-- Item -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="item d-flex align-items-center">
                            <div class="icon bg-orange"><i class="icon-bill"></i></div>
                            <div class="title"><span>Productos<br>Por vencer</span>
                                <div class="progress">
                                    <?php
                                        echo "<div role='progressbar' style='width: ".$resta."%; height: 4px;' aria-valuenow='15' aria-valuemin='0' aria-valuemax='100' class='progress-bar bg-orange'></div>"
                                    ?>
                                    
                                </div>
                            </div>
                            <?php           
                                echo "<div class='number'><strong>". $consulta ."</strong></div>";
                            ?>
                        </div>
                        <button class="btn btn-sm btn-outline-warning ml-5" onclick= "irXVenc()">&nbsp;Ir a Por Vencer&nbsp;</button>
                    </div>
                    <!-- Item -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="item d-flex align-items-center">
                            <div class="icon bg-red"><i class="icon-check"></i></div>
                            <div class="title"><span>Productos<br>Vencidos</span>
                                <div class="progress">
                                    <?php
                                        echo "<div role='progressbar' style='width: ".$resta2."%; height: 4px;' aria-valuenow='15' aria-valuemin='0' aria-valuemax='100' class='progress-bar bg-red'></div>"
                                    ?>
                                </div>
                            </div>
                            <?php           
                                echo "<div class='number'><strong>". $Vencidos2 ."</strong></div>";
                            ?>
                        </div>
                        <button class="btn btn-sm btn-outline-danger ml-5" onclick= "irVenc()">&nbsp;Ir a Vencidos&nbsp;</button>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="item d-flex align-items-center">
                            <div class="icon bg-blue"><i class="fas fa-archive"></i></div>
                            <div class="title"><span>Productos<br>Bajo Stock</span>
                                <div class="progress">
                                    <?php
                                        echo "<div role='progressbar' style='width: ".$resta3."%; height: 4px;' aria-valuenow='15' aria-valuemin='0' aria-valuemax='100' class='progress-bar bg-blue'></div>"
                                    ?>
                                </div>
                            </div>
                            <?php           
                                echo "<div class='number'><strong>". $Stock ."</strong></div>";
                            ?>
                        </div>
                            <button class="btn btn-sm btn-outline-primary ml-5" onclick= "irBajoStock()">&nbsp;Ir a Bajo Stock&nbsp;</button>
                    </div>
                </div>
            </div>
        </section>



      <!--FOOTER-->      
      <?php  include 'src/include/footer.php'; ?>
      </div><!--class Content inner...-->
        
      </div><!--class Page content...-->
     
    </div><!-- class PAGE--> 
    
  </body>
</html>
