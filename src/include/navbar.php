
<?php
                $conexion = mysqli_connect("localhost", 'vetportu_inventa', 'vetportugal2018', 'vetportu_vetportugalInv');

                if(mysqli_connect_errno()){
                    echo "Error al conectar a la BBDD";
                    exit();
                }
            
                mysqli_set_charset($conexion, "utf8");
            
                $tmp="";
                $total; 
                $consulta; $resta=0 ; $resta2=0;
                $vencidos;
                $Vencidos2;
                $Stock;
                $sql="SELECT COUNT(*) as CANTIDADT FROM `productos`";
                $res=mysqli_query($conexion,$sql);
                while ($row=mysqli_fetch_array($res, MYSQL_ASSOC)){                                     
                    $total=$row["CANTIDADT"];
                }
                $sql="SELECT COUNT(*) as CANTIDAD FROM `productos` WHERE FECHA_VENC BETWEEN curdate() and ADDDATE(CURDATE(), INTERVAL 2 MONTH) and STOCK_ACT > 0";
                $res=mysqli_query($conexion,$sql);
                while ($row=mysqli_fetch_array($res, MYSQL_ASSOC)){                                     
                    $consulta=$row["CANTIDAD"];
                }
                $sql="SELECT COUNT(*) as CANTIDADV from productos where FECHA_VENC < curdate()  and STOCK_ACT > 0";
                $res=mysqli_query($conexion,$sql);
                while ($row=mysqli_fetch_array($res, MYSQL_ASSOC)){                                     
                    $Vencidos2=$row["CANTIDADV"];
                }
                $sql="SELECT COUNT(*) as STOCK from productos where STOCK_ACT <= STOCK_MIN";
                $res=mysqli_query($conexion,$sql);
                while ($row=mysqli_fetch_array($res, MYSQL_ASSOC)){                                     
                    $Stock=$row["STOCK"];
                }
                if($total != 0 && $consulta != 0){
                    $resta = (($consulta * 100)/($total));
                }
                if($total != 0 && $Vencidos2 != 0){
                    $resta2 = (($Vencidos2 * 100)/($total));
                }
                if($total != 0 && $Stock != 0){
                    $resta3 = (($Stock * 100)/($total));
                }
                
                $badge ='';
                if($consulta != 0 || $Vencidos2 != 0){
                    $cantidadAlerts = '';
                    if($consulta != 0){$cantidadAlerts += 1;}
                    if($Vencidos2 != 0){$cantidadAlerts += 1;}
                    if($Stock != 0){$cantidadAlerts += 1;}
                    $badge = '<span class="badge bg-red badge-corner">'.$cantidadAlerts.'</span>';
                }
            ?>
<link rel="stylesheet" href="../../public/css/style.sea.css" id="theme-stylesheet">
<link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha256-m/h/cUDAhf6/iBRixTbuc8+Rg2cIETQtPcH9D3p2Kg0=" crossorigin="anonymous" />
<link rel="stylesheet" href="../../vendor/font-awesome/css/font-awesome.min.css">
<script src="../../public/js/front.js"></script>


              <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" id='navbar'>
            <!-- Search Box-->
         
            <div class="container-fluid">
              <div class="navbar-holder d-flex align-items-center justify-content-between">
                <!-- Navbar Header-->
                <div class="navbar-header">
                  <!-- Navbar Brand --><a href="../../index.php" class="navbar-brand d-none d-sm-inline-block">
                    <div class="brand-text d-none d-lg-inline-block"><span>Veterinaria </span><strong> Portugal</strong></div>
                    <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>VP</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
                </div>
                <!-- Navbar Menu -->
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                 <!-- Notifications-->
                 <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fas fa-bell"></i><?php echo $badge; ?></a>
                        <ul aria-labelledby="notifications" class="dropdown-menu">
                            <?php
                                if($consulta != 0){
                                    echo '<li><a rel="nofollow" href="../../src/pages/PorVencer.php" class="dropdown-item"> 
                                        <div class="notification">
                                        <div class="notification-content"><i class="fas fa-exclamation-triangle bg-orange"></i>Hay '.$consulta.' productos por vencer</div>
                                        <div class="notification-time"><small>Haga click para mas info.</small></div>
                                        </div></a></li>';
                                }
                                if($Vencidos2 != 0){
                                    echo '<li><a rel="nofollow" href="../../src/pages/Vencidos.php" class="dropdown-item"> 
                                        <div class="notification">
                                        <div class="notification-content"><i class="fas fa-exclamation-circle bg-red"></i>Hay '.$Vencidos2.' productos vencidos</div>
                                        <div class="notification-time"><small>Haga click para mas info.</small></div>
                                        </div></a></li>';
                                }
                                if($Stock != 0){
                                    echo '<li><a rel="nofollow" href="../../src/pages/StockBajo.php" class="dropdown-item"> 
                                        <div class="notification">
                                        <div class="notification-content"><i class="fas fa-archive bg-blue"></i>Hay '.$Stock.' productos con bajo stock</div>
                                        <div class="notification-time"><small>Haga click para mas info.</small></div>
                                        </div></a></li>';
                                }
                                if($Vencidos2 == 0 && $consulta == 0 && $Stock == 0){
                                    echo '<li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>Sin notificaciones</strong></a></li>';
                                }
                            ?>
                        </ul>
                    </li>
                  <!-- Logout    -->
                  <li class="nav-item"><a href="../../src/login/logout.php" class="nav-link logout"> <span class="d-none d-sm-inline">SALIR</span><i class="fa fa-sign-out"></i></a></li>
                </ul>
              </div>
            </div>
          </nav>
         