<?php
            $cargo; 
            if($_SESSION["cargo"]=="1"){ $cargo = "Administrador";     }
            else{        $cargo = "Estandar";          }
  ?>
  <link rel="stylesheet" href="../../public/css/fontastic.css">
  <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <?php
            if($cargo=="Administrador"){
              echo '<div class="avatar"><img src="../../public/img/Avatar-1(Administrador).jpg" 
              alt="..." class="img-fluid rounded-circle"></div>';}
              else{
                echo '<div class="avatar"><img src="../../public/img/Avatar-2(Usuario).jpg" 
              alt="..." class="img-fluid rounded-circle"></div>';               
              }?>
            
              <div class="title">
              <h1><?php echo $_SESSION["nombre"] ;?></h1>
               <p><?php echo $cargo;?></p>
            </div>
            </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Menu</span>
          <ul class="list-unstyled">
                    <li class="active"><a href="../../index.php"> <i class="icon-home"></i>Principal </a></li>
                    <li><a href="../../src/pages/Productos.php"> <i class="icon-grid"></i> Productos </a></li>
                    <li><a href="../../src/pages/Consultas.php"> <i class="fa fa-bar-chart"></i>Consultas</a></li>
                    <li><a href="../../src/pages/Ventas.php"> <i class="icon-padnote"></i>Ventas </a></li>
                    <li><a href="../../src/pages/Paquetes.php"> <i class="icon-dropbox"></i>Paquetes </a></li>
                    <?php if($cargo== "Administrador"){
                      echo'   <li><a href="../../src/pages/Configuraciones.php"> <i class="icon-padnote"></i>Configuraciones </a></li>';
                    }
                    ?>
                    <li><a href="../../src/login/logout.php"> <i class="icon-interface-windows"></i>SALIR</a></li>
          </ul>
          
  </nav>