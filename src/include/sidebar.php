<!--div class="row clearfix"-->
  <div class="col-md-12 column">
  <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="../img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
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
                    <li class="active"><a href="index.php"> <i class="icon-home"></i>Principal </a></li>
                    <li><a href="pages/Agregar_Producto.php"> <i class="icon-grid"></i>Agregar </a></li>
                    <li><a href="pages/php/ProductosBusqueda.php"> <i class="fa fa-bar-chart"></i>ProductosBusqueda </a></li>
                    <li><a href="forms.html"> <i class="icon-padnote"></i>Forms </a></li>
                    <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Example dropdown </a>
                      <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="#">Page</a></li>
                        <li><a href="#">Page</a></li>
                        <li><a href="#">Page</a></li>
                      </ul>
                    </li>
                    <li><a href="login.php"> <i class="icon-interface-windows"></i>Login page </a></li>
          </ul>
          
  </nav>
  </div>
<!--/div-->