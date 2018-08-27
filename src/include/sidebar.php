<?php
            $cargo;
            $verificado; 
            if($_SESSION["cargo"]=="1"){ $cargo = "Administrador";     }
            else{        $cargo = "Estandar";          }
  ?>
  <link rel="stylesheet" href="../../public/css/fontastic.css">
  <script type="text/javascript" src="../../JavaScript/Funcion1.js"></script>
  <link rel="stylesheet" href="../../public/css/style.sea.css" id="theme-stylesheet">

  <nav class="side-navbar">
          <!-- Sidebar Header-->
          
            <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="../../public/img/user.png" 
              alt="..." class="img-fluid rounded-circle"></div>  
              <div class="title">
              <h1><?php echo $_SESSION["nombre"] ;?></h1>
               <p><?php echo $cargo;?></p>
            </div>
            </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Menu</span>
          <ul class="list-unstyled">
                    <li><a href="../../index.php"> <i class="fas fa-paw"></i>Principal </a></li>
                    <!-- <li><a href="../../src/pages/Productos.php"> <i class="fas fa-barcode"></i>Productos </a></li>
                    <li><a href="../../src/pages/Consultas.php"> <i class="fas fa-search"></i>Consultas</a></li> -->
                    <li><a href="../../src/pages/Consultas2.php"> <i class="fab fa-searchengin"></i>Consultas y Productos</a></li>
                    <li><a href="../../src/pages/Ventas.php"> <i class="fas fa-angle-double-down"></i> Descontar</a></li>
                    <li><a href="../../src/pages/Paquetes.php"> <i class="fas fa-box"></i>Paquetes</a></li>
                    <?php if($cargo== "Administrador"){
                      echo'   <li><a href="../../src/pages/Configuraciones.php""> <i class="fas fa-cog"></i>Configuraciones </a></li>';
                    
                    }
                    ?>
                  
                    <li><a href="../../src/login/logout.php"> <i class="fas fa-sign-out-alt"></i>SALIR</a></li>
                    
          </ul>
          
  </nav>

