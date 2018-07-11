<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Productos - VetPortugal</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha256-m/h/cUDAhf6/iBRixTbuc8+Rg2cIETQtPcH9D3p2Kg0=" crossorigin="anonymous" />
    <!-- open-iconic-bootstrap (icon set for bootstrap) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" integrity="sha256-BJ/G+e+y7bQdrYkS2RBTyNfBHpA9IuGaPmf9htub5MQ=" crossorigin="anonymous" />
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<style>
    nav.side-navbar {
        background: #fff;
        min-width: 250px;
        max-width: 250px;
        color: #686a76;
        -webkit-box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.1);
        box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.1);
        z-index: 9;
        /*==== Sidebar Header ====*/
        /*==== Sidebar Menu ====*/
        /*==== Shrinked Sidebar ====*/
    }
    
    nav.side-navbar a {
        color: inherit;
        position: relative;
        font-size: 0.9em;
    }
    
    nav.side-navbar a[data-toggle="collapse"]::before {
        content: '\f104';
        display: inline-block;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        font-family: 'FontAwesome';
        position: absolute;
        top: 50%;
        right: 20px;
    }
    
    nav.side-navbar a[aria-expanded="true"] {
        background: #EEF5F9;
    }
    
    nav.side-navbar a[aria-expanded="true"]::before {
        content: '\f107';
    }
    
    nav.side-navbar a i {
        font-size: 1.2em;
        margin-right: 10px;
        -webkit-transition: none;
        transition: none;
    }
    
    nav.side-navbar .sidebar-header {
        padding: 30px 15px;
    }
    
    nav.side-navbar .avatar {
        width: 55px;
        height: 55px;
    }
    
    nav.side-navbar .title {
        margin-left: 10px;
    }
    
    nav.side-navbar .title h1 {
        color: #333;
    }
    
    nav.side-navbar .title p {
        font-size: 0.9em;
        font-weight: 200;
        margin-bottom: 0;
        color: #aaa;
    }
    
    nav.side-navbar span.heading {
        text-transform: uppercase;
        font-weight: 400;
        margin-left: 20px;
        color: #ccc;
        font-size: 0.8em;
    }
    
    nav.side-navbar ul {
        padding: 15px 0;
    }
    
    nav.side-navbar ul li a {
        padding: 10px 15px;
        text-decoration: none;
        display: block;
        font-weight: 300;
        border-left: 4px solid transparent;
    }
    
    nav.side-navbar ul li a:hover {
        background: rgb(9, 181, 255);
        border-left: 4px solid rgb(0, 90, 250);
        color: #fff;
    }
    
    nav.side-navbar ul li li a {
        padding-left: 50px;
        background: #EEF5F9;
    }
    
    nav.side-navbar ul li.active>a {
        background: rgb(9, 181, 255);
        color: #fff;
        border-left: 4px solid rgb(0, 90, 250);
    }
    
    nav.side-navbar ul li.active>a:hover {
        background: rgb(9, 181, 255);
    }
    
    nav.side-navbar ul li li.active>a {
        background: rgb(9, 181, 255);
    }
    
    nav.side-navbar ul li ul {
        padding: 0;
    }
    
    nav.side-navbar.shrinked {
        min-width: 90px;
        max-width: 90px;
        text-align: center;
    }
    
    nav.side-navbar.shrinked span.heading {
        margin: 0;
    }
    
    nav.side-navbar.shrinked ul li a {
        padding: 15px 2px;
        border: none;
        font-size: 0.8em;
        color: #aaa;
        -webkit-transition: color 0.3s, background 0.3s;
        transition: color 0.3s, background 0.3s;
    }
    
    nav.side-navbar.shrinked ul li a[data-toggle="collapse"]::before {
        content: '\f107';
        -webkit-transform: translateX(50%);
        transform: translateX(50%);
        position: absolute;
        top: auto;
        right: 50%;
        bottom: 0;
        left: auto;
    }
    
    nav.side-navbar.shrinked ul li a[data-toggle="collapse"][aria-expanded="true"]::before {
        content: '\f106';
    }
    
    nav.side-navbar.shrinked ul li a:hover {
        color: #fff;
        border: none;
    }
    
    nav.side-navbar.shrinked ul li a:hover i {
        color: #fff;
    }
    
    nav.side-navbar.shrinked ul li a i {
        margin-right: 0;
        margin-bottom: 2px;
        display: block;
        font-size: 1rem;
        color: #333;
        -webkit-transition: color 0.3s;
        transition: color 0.3s;
    }
    
    nav.side-navbar.shrinked ul li.active>a {
        color: #fff;
    }
    
    nav.side-navbar.shrinked ul li.active>a i {
        color: #fff;
    }
    
    nav.side-navbar.shrinked .sidebar-header .title {
        display: none;
    }
    .invalid-feedback {
    display: none;
    width: 100%;
    margin-top: 1.25rem;
    font-size: 0%;
    color: #dc3545;
    }

}
</style>
<body>
    <div class="page">
        <!-- Main Navbar-->
        <header class="header">
            <nav class="navbar">
                <!-- Search Box-->
                <div class="search-box">
                    <button class="dismiss"><i class="icon-close"></i></button>
                    <form id="searchForm" action="#" role="search">
                        <input type="search" placeholder="Qué estás buscando..." class="form-control">
                    </form>
                </div>
                <div class="container-fluid">
                    <div class="navbar-holder d-flex align-items-center justify-content-between">
                        <!-- Navbar Header-->
                        <div class="navbar-header">
                            <!-- Navbar Brand -->
                            <a href="index.html" class="navbar-brand d-none d-sm-inline-block">
                                <div class="brand-text d-none d-lg-inline-block"><span>Vet</span><strong>Portugal</strong></div>
                                <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>BD</strong></div>
                            </a>
                            <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
                        </div>
                        <!-- Navbar Menu -->
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                            <!-- Search-->
                            <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>
                            <!-- Notifications-->
                            <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red badge-corner">0</span></a>
                                <ul aria-labelledby="notifications" class="dropdown-menu">
                                    <li>
                                        <a rel="nofollow" href="#" class="dropdown-item">
                                            <div class="notification">
                                                <div class="notification-content"><i class="fa fa-envelope bg-green"></i>Sin notificaciones</div>
                                                <div class="notification-time"><small>--</small></div>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>Ver todas las notificaciones                                            </strong></a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Messages                        -->
                            <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope-o"></i><span class="badge bg-orange badge-corner">1</span></a>
                                <ul aria-labelledby="notifications" class="dropdown-menu">
                                    <li>
                                        <a rel="nofollow" href="#" class="dropdown-item d-flex">
                                            <div class="msg-profile"> <img src="img/avatar1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                            <div class="msg-body">
                                                <h3 class="h5">Ivan Galdames</h3><span>Te envió un mensaje</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>Leer todos los mensajes   </strong></a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Languages dropdown    -->
                            <li class="nav-item dropdown">
                                <a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="img/flags/16/CL.png" alt="Español"><span class="d-none d-sm-inline-block">Español</span></a>
                                <ul aria-labelledby="languages" class="dropdown-menu">
                                    <li>
                                        <a rel="nofollow" href="#" class="dropdown-item"> <img src="img/flags/16/US.png" alt="English" class="mr-2">English</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Logout    -->
                            <li class="nav-item">
                                <a href="login.php" class="nav-link logout"> <span class="d-none d-sm-inline">Salir</span><i class="fa fa-sign-out"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="page-content d-flex align-items-stretch">
            <!-- Side Navbar -->
            <nav class="side-navbar">
                <!-- Sidebar Header-->
                <div class="sidebar-header d-flex align-items-center">
                    <div class="avatar"><img src="img/avatar-4.jpg" alt="..." class="img-fluid rounded-circle"></div>
                    <div class="title">
                        <h1 class="h4">Fabian Alvarado</h1>
                        <p>Web Designer</p>
                    </div>
                </div>
                <!-- Sidebar Navidation Menus--><span class="heading">Menú</span>
                <ul class="list-unstyled">
                    <li>
                        <a href="index.html"> <i class="oi oi-home"></i>Inicio </a>
                    </li>
                    <li class="active">
                        <a href="Productos.php"> <i class="oi oi-list"></i>Productos </a>
                    </li>
                    <li>
                        <a href="Consultas.php"> <i class="oi oi-calculator"></i>Consultas </a>
                    </li>
                    <li>
                        <a href="Ventas.php"> <i class="oi oi-dollar"></i>Ventas </a>
                    </li>
                    <li>
                        <a href="Operacion.php"> <i class="oi oi-heart"></i>Operación </a>
                    </li>
                    <!-- <li>
                        <a href="tables.html"> <i class="icon-grid"></i>Tablas </a>
                    </li>
                    <li>
                        <a href="charts.html"> <i class="fa fa-bar-chart"></i>Gráficos </a>
                    </li>
                    <li>
                        <a href="forms.html"> <i class="icon-padnote"></i>Formularios </a>
                    </li>
                    <li>
                        <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Ejemplo de Dropdown </a>
                        <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                            <li><a href="#">Pagina 1</a></li>
                            <li><a href="#">Pagina 2</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="login.php"> <i class="icon-interface-windows"></i>Pagina Inicio Sesion </a>
                    </li>
                </ul><span class="heading">Extras</span>
                <ul class="list-unstyled">
                    <li>
                        <a href="#"> <i class="icon-flask"></i>Demo 1</a>
                    </li>
                    <li>
                        <a href="#"> <i class="icon-screen"></i>Demo 2</a>
                    </li> -->
                </ul>
            </nav>
            <div class="content-inner">
                <!-- Page Header-->
                <header class="page-header">
                    <div class="container-fluid">
                        <h2 class="no-margin-bottom">Productos</h2>
                    </div>
                </header>
                <!-- Breadcrumb-->
                <div class="breadcrumb-holder container-fluid">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                        <li class="breadcrumb-item active">Productos </li>
                    </ul>
                </div>
                <section class="tables">
                    <div id="tabla" class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header" style="border">
                                    <div class=" container ">
                                        <div class="row justify-content-between">
                                        <div class="col-3"><h4><strong>Productos</strong></h4></div>
                                            <form class="form-inline  was-validated col-auto" action="ProductosBusqueda.php" method="get">
                                                <label class="sr-only" for="txtBusqueda">Busqueda</label>
                                                <input type="text"  class="form-control mr-1 " id="txtBusqueda" name="txtBusqueda" placeholder="Busqueda" required>

                                                <label class="sr-only" for="opciones">Opcion</label>
                                                <select class="custom-select mr-1" name="cbOpciones" id="opciones" required>
                                                    <option value="">Opción...</option>
                                                    <option value="CODIGO">Codigo</option>
                                                    <option value="CATEGORIA">Categoria</option>
                                                    <option value="PROVEEDOR">Proveedor</option>
                                                    <option value="NOMBRE">Nombre</option>
                                                    <option value="PRECIO_VENTA">Precio Venta</option>
                                                    <option value="PRECIO_NETO">Precio Neto</option>
                                                </select>
                                                <button type="submit" class="btn btn-btn-outline-success ">Buscar</button>

                                            </form>
                                        <div class=" col-1 "><a href='Agregar_Producto.php' id=''type='' value='' class='btn btn-primary '>Nuevo</a></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card-body">
                                    <div class="table-responsive">
                                            
                                        <table class="table table-striped table-hover table-sm table-bordered">
                                            <?php
                                                try{
                                                    $base = new PDO("mysql:host=localhost; dbname=vetportugal", "root", "");
                                                    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                    $base->exec("SET CHARACTER SET utf8");
                                                    $tamanoPaginas=40;
                                                    $pagina = isset($_GET['pagina'])?$_GET['pagina']:1;;
                                                    
                                                    $empezarDesde = ($pagina - 1) * $tamanoPaginas;
                                                    $sql_total="SELECT p.CODIGO, c.NOMBRE_CATEGORIA AS CATEGORIA, r.NOMBRE_PROVEEDOR AS PROVEEDOR, p.NOMBRE, p.PRECIO_VENTA, p.PRECIO_NETO, p.FECHA_VENC, p.FECHA_ADQ, p.STOCK_MIN, p.STOCK_ACT, b.NOMBRE_BODEGA AS BODEGA FROM productos p INNER JOIN bodega b ON (p.ID_BODEGA = b.ID_BODEGA) INNER JOIN categoria c ON ( p.ID_CATEGORIA = c.ID_CATEGORIA ) INNER JOIN proveedor r ON ( p.ID_PROVEEDOR = r.ID_PROVEEDOR )";
                                                    $resultado = $base->prepare($sql_total);
                                                    $resultado->execute(array());
                                                    $numFilas=$resultado->rowCount();
                                                    $totalPaginas = ceil($numFilas/$tamanoPaginas);
                                                
                                                    $resultado->closeCursor();
                                                    $sqlLimit="SELECT p.CODIGO, c.NOMBRE_CATEGORIA AS CATEGORIA, r.NOMBRE_PROVEEDOR AS PROVEEDOR, p.NOMBRE, p.PRECIO_VENTA, p.PRECIO_NETO, p.FECHA_VENC, p.FECHA_ADQ, p.STOCK_MIN, p.STOCK_ACT, b.NOMBRE_BODEGA AS BODEGA FROM productos p INNER JOIN bodega b ON (p.ID_BODEGA = b.ID_BODEGA) INNER JOIN categoria c ON ( p.ID_CATEGORIA = c.ID_CATEGORIA ) INNER JOIN proveedor r ON ( p.ID_PROVEEDOR = r.ID_PROVEEDOR ) LIMIT $empezarDesde,$tamanoPaginas";
                                                    
                                                    $resultado = $base->prepare($sqlLimit);
                                                    $resultado->execute(array());
                                                    echo "<thead>
                                                            <tr>
                                                                <th>CODIGO</th>
                                                                <th>CATEGORIA</th>
                                                                <th>PROVEEDOR</th>
                                                                <th>NOMBRE</th>
                                                                <th>PRECIO VENTA</th>
                                                                <th>PRECIO NETO</th>
                                                                <th>FECHA VENC</th>
                                                                <th>FECHA ADQ</th>
                                                                <th>STOCK MIN</th>
                                                                <th>STOCK ACT</th>
                                                                <th>Bodega</th>
                                                                <th align='center'>ACCIONES</th>
                                                            <tr>
                                                        </thead>
                                                        <tbody>";
                                                
                                            
                                                    while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                                                        echo "<tr>";
                                                        echo "<td>" . $fila["CODIGO"] . "</td>";
                                                        echo "<td>" . $fila["CATEGORIA"] . "</td>";
                                                        echo "<td>" . $fila["PROVEEDOR"] . "</td>";
                                                        echo "<td>" . $fila["NOMBRE"] . "</td>";
                                                        echo "<td align='right'>$ " . $fila["PRECIO_VENTA"] . "</td>";
                                                        echo "<td align='right'>$ " . $fila["PRECIO_NETO"] . "</td>";
                                                        echo "<td>" . date_format(date_create($fila["FECHA_VENC"]), 'd-m-Y') . "</td>";
                                                        echo "<td>" . date_format(date_create($fila["FECHA_ADQ"]), 'd-m-Y') . "</td>";
                                                        echo "<td>" . $fila["STOCK_MIN"] . "</td>";
                                                        echo "<td>" . $fila["STOCK_ACT"] . "</td>";
                                                        echo "<td>" . $fila["BODEGA"] . "</td>";
                                                        echo "<td align='center'><a href='Modificar_Producto.php?codigo=" . $fila["CODIGO"] . "' type='' value='' class='btn btn-outline-success btn-sm'><span class='oi oi-pencil'></span></a><a href='Eliminar_Producto.php?codigo=" . $fila["CODIGO"] . "' type='' value='' class='btn btn-outline-danger btn-sm'><span class='oi oi-trash'></span></a></td>";
                                                        echo "</tr>";
                                                    }
                                                    echo "</tbody>";
                                                    $resultado->closeCursor();
                                                }
                                                catch(Exception $e){
                                                }
                                            
                                            ?>
                                            
                                        </table>
                                        <?php 
                                            $anterior=($pagina-1);
                                            $siguiente=($pagina+1);
                                            
                                            if(isset($_GET['Busqueda'])){
                                                $pagAnterior= "?pagina=$anterior&Busqueda={$_GET['Busqueda']}";
                                                $pagSiguiente= "?pagina=$siguiente&Busqueda={$_GET['Busqueda']}";
                                            }
                                            else{
                                                $pagAnterior= "?pagina=$anterior";
                                                $pagSiguiente= "?pagina=$siguiente";
                                            }
                                            ?>
                                            
                                            <nav class="nav justify-content-center" aria-label="Page navigation example">
                                            <ul class="pagination">
                                            <?php if(($pagina==1)){ ?>
                                                <li class="page-item disabled">
                                                <a class="page-link" href='<?php echo "$pagAnterior"?>#tabla' aria-label="Anterior">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Anterior</span>
                                                </a>
                                                </li>
                                            <?php }else{?>
                                                <li class="page-item">
                                                <a class="page-link" href='<?php echo "$pagAnterior"?>#tabla' aria-label="Anterior">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Anterior</span>
                                                </a>
                                                </li>
                                            <?php }?>

                                                
                                                <?php
                                                if(isset($_GET['Busqueda'])){
                                                    if($totalPaginas>=1){
                                                        for($x=1;$x<=$totalPaginas;$x++){
                                                            echo($x==$pagina)?"<li class='page-item active'><a class='page-link' href='?pagina=$x&Busqueda={$_GET['Busqueda']}#tabla'>$x</a></li>":
                                                            "<li class='page-item'><a class='page-link' href='?pagina=$x&Busqueda={$_GET['Busqueda']}#tabla'>$x</a></li>";
                                                        }
                                                    }	
                                                }
                                                else{
                                                    if($totalPaginas>=1){
                                                    for($x=1;$x<=$totalPaginas;$x++){
                                                        echo($x==$pagina)?"<li class='page-item active'><a class='page-link' href='?pagina=$x#tabla'>$x</a></li>":
                                                        "<li class='page-item'><a class='page-link' href='?pagina=$x#tabla'>$x</a></li>";
                                                    }
                                                }	
                                                }	  
                                                
                                                
                                                ?>
                                                <?php if(($pagina>=$totalPaginas)){?>
                                                <li class="page-item disabled">
                                                <a class="page-link" href='<?php echo "$pagSiguiente"?>#tabla' aria-label="Siguiente">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Siguiente</span>
                                                </a>
                                                </li>
                                                <?php }else{?>
                                                    <li class="page-item">
                                                <a class="page-link" href='<?php echo "$pagSiguiente"?>#tabla' aria-label="Siguiente">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Siguiente</span>
                                                </a>
                                                </li>
                                                <?php }?>
                                            </ul>
                                            </nav>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </section>
                <!-- Page Footer-->
                <footer class="main-footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <p>Your company &copy; 2017-2019</p>
                            </div>
                            <div class="col-sm-6 text-right">
                                <p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a></p>
                                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js">
    </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js">
    </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
</body>

</html>