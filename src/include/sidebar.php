  <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="../../public/img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
            <?php echo "<h1>" . $_SESSION["user"] . "</h1>";?>
            <?php
            $cargo; 
            if($_SESSION["cargo"]=="1")
            {
              $cargo = "Administrador";
            }
            else{
              $cargo = "Standar";
            }
            echo "<p>" .$cargo. "</p>";?>
            </div>
            </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Menu</span>
          <ul class="list-unstyled">
                    <li class="active"><a href="../../index.php"> <i class="icon-home"></i>HOME </a></li>
                    <li><a href="#"> <i class="icon-grid"></i> Productos </a></li>
                    <li><a href="#"> <i class="fa fa-bar-chart"></i>Proveedores</a></li>
                    <li><a href="#"> <i class="icon-padnote"></i>Categorias </a></li>
                    <li><a href="#"> <i class="icon-padnote"></i>Ventas </a></li>
                    <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Paquetes </a>
                      <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="#">Artículos</a></li>
                        <li><a href="#">Cirugias</a></li>
                      </ul>
                    </li>
                    <li><a href="../../src/login/logout.php"> <i class="icon-interface-windows"></i>SALIR</a></li>
          </ul>
          
  </nav>