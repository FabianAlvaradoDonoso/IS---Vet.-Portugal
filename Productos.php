<!DOCTYPE html>
<html>

<head>
    <?php include_once 'php/head.php';?>
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
                            <a href="index.php" class="navbar-brand d-none d-sm-inline-block">
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
                        <a href="index.php"> <i class="oi oi-home"></i>Inicio </a>
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
                        <a href="Paquetes.php"> <i class="oi oi-heart"></i>Paquetes </a> 
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
                        <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
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
                                            
                                        <div class=" col-1 "><button type="button" class="btn btn-primary btn-sm" onclick="modalNuevo()">Nuevo</button></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card-body">
                                    <div class="table-responsive">
                                            
                                        <table class='table table-striped table-hover table-sm'>
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
                                                            <tr class='thead-light'>
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
                                                        $codigo = $fila["CODIGO"];
                                                        $categoria = $fila["CATEGORIA"];
                                                        $proveedor = $fila["PROVEEDOR"];
                                                        $nombre = $fila["NOMBRE"];
                                                        $precioVenta = $fila["PRECIO_VENTA"];
                                                        $precioNeto = $fila["PRECIO_NETO"];
                                                        $fechaVenc = date_format(date_create($fila["FECHA_VENC"]), 'Y/m/d');
                                                        $fechaAdq = date_format(date_create($fila["FECHA_ADQ"]), 'Y/m/d');
                                                        $stockMin = $fila["STOCK_MIN"];
                                                        $stockAct = $fila["STOCK_ACT"];
                                                        $bodega = $fila["BODEGA"];

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
                                                        echo "<td align='center'><button type='button' class='btn btn-outline-success btn-sm' onclick='mostrarModalModificar2(\"$codigo\",\"$categoria\",\"$proveedor\",\"$nombre\",\"$precioVenta\",\"$precioNeto\",\"$fechaVenc\",\"$fechaAdq\",\"$stockMin\",\"$stockAct\",\"$bodega\")'><span class='oi oi-pencil'></span></button>
                                                                                 <button type='button' class='btn btn-outline-danger btn-sm' onclick='mostrarModal(\"$codigo\",\"$categoria\",\"$proveedor\",\"$nombre\",\"$bodega\")'><span class='oi oi-trash'></span></button></td>";
                                                        
                                                        echo "</tr>";

                                                        //mostrarModalModificar(\"$codigo\",\"$categoria\",\"$proveedor\",\"$nombre\",\"$precioVenta\",\"$precioNeto\",\"$fechaVenc\",\"$fechaAdq\",\"$stockMin\",\"$stockAct\",\"$bodega\")
                                                        //mostrarModal(\"$codigo\",\"$categoria\",\"$proveedor\",\"$nombre\",\"$bodega\")
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

                    <div class="modal fade bd-example-modal-lg" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ingresar nuevo producto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="" method="">
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">Codigo</label>
                                                <input type="text" class="form-control" id="txtCodigoModalAgregar" name="Codigo" placeholder="Codigo" value="" required>
                                                <div class="valid-feedback"></div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Categoria</label>
                                                    
                                                <select id="cbCategoriaModalAgregar" class="form-control mb-2 mr-sm-2" onchange="">
                                                
                                                <?php
                                                    $base = new PDO("mysql:host=localhost; dbname=vetportugal", "root", "");
                                                    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                    $base->exec("SET CHARACTER SET utf8");
                                                    
                                                    $sql_total="SELECT * FROM categoria";
                                                    $resultado = $base->prepare($sql_total);
                                                    $resultado->execute(array());
                                                    
                                                    while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                                                        echo "<option value=".$fila["ID_CATEGORIA"].">".$fila["NOMBRE_CATEGORIA"]."</option>";
                                                    }
                                                ?>
                                                </select>
                                                            
                                                <div class="valid-feedback"></div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Proveedor</label>
                                                
                                                <select id="cbProveedorModalAgregar" class="form-control mb-2 mr-sm-2" onchange="">
                                                    
                                                <?php
                                                    $base = new PDO("mysql:host=localhost; dbname=vetportugal", "root", "");
                                                    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                    $base->exec("SET CHARACTER SET utf8");
                                                    
                                                    $sql_total="SELECT * FROM proveedor";
                                                    $resultado = $base->prepare($sql_total);
                                                    $resultado->execute(array());
                                                    
                                                    while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                                                        echo "<option value=".$fila["ID_PROVEEDOR"].">".$fila["NOMBRE_PROVEEDOR"]."</option>";
                                                    }
                                                ?>
                                                </select>
                                                
                                                <div class="valid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom03">Nombre</label>
                                                <input type="text" class="form-control" id="txtNombreModalAgregar" name="Nombre" placeholder="Nombre" value="" required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="" for="inlineFormInputGroup">Precio Venta</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">$</div>
                                                    </div>
                                                    <input type="number" class="form-control" align="right" style="text-align:right;" id="nudPrecioVentaModalAgregar" placeholder="Venta" value="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="" for="inlineFormInputGroup">Precio Neto</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">$</div>
                                                    </div>
                                                    <input type="number" class="form-control" align="right" style="text-align:right;" id="nudPrecioNetoModalAgregar" placeholder="Neto" value="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label class="mr-2 " for="">Fecha Vencimiento </label>
                                                <div class='input-group date fad-Date2' id='' >
                                                    <input type='text' class="form-control" id="dtpFechaVencModalAgregar" placeholder="Fecha" readonly value="" required>
                                                    <span class="input-group-addon">
                                                        <span class="oi oi-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="mr-2 " for="">Fecha Adquisición </label>
                                                <div class='input-group date fad-Date2' id='' >
                                                    <input type='text' class="form-control" id="dtpFechaAdqModalAgregar" placeholder="Fecha" readonly value="" required>
                                                    <span class="input-group-addon">
                                                        <span class="oi oi-calendar"></span>
                                                    </span>
                                                </div>  
                                            <script>
                                                $('.fad-Date2').datepicker({
                                                    format: "yyyy/mm/dd",
                                                    weekStart: 1,
                                                    todayBtn: "linked",
                                                    language: "es",
                                                    todayHighlight: true
                                                });
                                            </script> 
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="validationCustom05">Stock Mínimo</label>
                                                <input type="number" class="form-control" id="nudStockMinModalAgregar" name="nudStockMin" placeholder="Stock Minimo" value="" required>
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="validationCustom05">Stock Actual</label>
                                                <input type="number" class="form-control" id="nudStockActModalAgregar" name="nudStockAct" placeholder="Stock Actual" value="" required>
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                            
                                            
                                            
                                        </div>
                                        <div class="form-row justify-content-center">
                                            <div class="col-md-5 mb-3">
                                                <label for="validationCustom04">Bodega</label>
                                                <select id="cbBodegaModalAgregar" class="form-control mb-2 mr-sm-2 custom-select" onchange="enviarOtro()" required>
                                                    
                                                <?php
                                                    $base = new PDO("mysql:host=localhost; dbname=vetportugal", "root", "");
                                                    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                    $base->exec("SET CHARACTER SET utf8");
                                                    
                                                    $sql_total="SELECT * FROM bodega";
                                                    $resultado = $base->prepare($sql_total);
                                                    $resultado->execute(array());
                                                    
                                                    while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                                                        echo "<option value=".$fila["ID_BODEGA"].">".$fila["NOMBRE_BODEGA"]."</option>";
                                                    }
                                                ?>
                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        
                                            
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-success" onclick="agregar()">Agregar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade bd-example-modal-lg" id="modalModificar2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modificación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="" method="">
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">Codigo</label>
                                                <input readonly type="text" class="form-control" id="txtCodigoModal2" name="Codigo" placeholder="Codigo" value="" required>
                                                <div class="valid-feedback"></div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Categoria</label>
                                                    
                                                <select id="cbCategoriaModal2" class="form-control mb-2 mr-sm-2" onchange="">
                                                
                                                <?php
                                                    $base = new PDO("mysql:host=localhost; dbname=vetportugal", "root", "");
                                                    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                    $base->exec("SET CHARACTER SET utf8");
                                                    
                                                    $sql_total="SELECT * FROM categoria";
                                                    $resultado = $base->prepare($sql_total);
                                                    $resultado->execute(array());
                                                    
                                                    while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                                                        if($fila["NOMBRE_CATEGORIA"] == $consulta[1]){
                                                            echo "<option value=".$fila["ID_CATEGORIA"]." selected>".$fila["NOMBRE_CATEGORIA"]."</option>";
                                                        }else{
                                                            echo "<option value=".$fila["ID_CATEGORIA"].">".$fila["NOMBRE_CATEGORIA"]."</option>";
                                                        }
                                                    }
                                                ?>
                                                </select>
                                                            
                                                <div class="valid-feedback"></div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Proveedor</label>
                                                
                                                <select id="cbProveedorModal2" class="form-control mb-2 mr-sm-2" onchange="">
                                                    
                                                <?php
                                                    $base = new PDO("mysql:host=localhost; dbname=vetportugal", "root", "");
                                                    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                    $base->exec("SET CHARACTER SET utf8");
                                                    
                                                    $sql_total="SELECT * FROM proveedor";
                                                    $resultado = $base->prepare($sql_total);
                                                    $resultado->execute(array());
                                                    
                                                    while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                                                        if($fila["NOMBRE_PROVEEDOR"] == $consulta[2]){
                                                            echo "<option value=".$fila["ID_PROVEEDOR"]." selected>".$fila["NOMBRE_PROVEEDOR"]."</option>";
                                                        }else{
                                                            echo "<option value=".$fila["ID_PROVEEDOR"].">".$fila["NOMBRE_PROVEEDOR"]."</option>";
                                                        }
                                                    }
                                                ?>
                                                </select>
                                                
                                                <div class="valid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom03">Nombre</label>
                                                <input type="text" class="form-control" id="txtNombreModal2" name="Nombre" placeholder="Nombre" value="" required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="" for="inlineFormInputGroup">Precio Venta</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">$</div>
                                                    </div>
                                                    <input type="number" class="form-control" align="right" style="text-align:right;" id="nudPrecioVentaModal2" placeholder="Venta" value="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="" for="inlineFormInputGroup">Precio Neto</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">$</div>
                                                    </div>
                                                    <input type="number" class="form-control" align="right" style="text-align:right;" id="nudPrecioNetoModal2" placeholder="Neto" value="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label class="mr-2 " for="">Fecha Vencimiento </label>
                                                <div class='input-group date fad-Date2' id='' >
                                                    <input type='text' class="form-control" id="dtpFechaVencModal2" placeholder="Fecha" readonly value="" required>
                                                    <span class="input-group-addon">
                                                        <span class="oi oi-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="mr-2 " for="">Fecha Adquisición </label>
                                                <div class='input-group date fad-Date2' id='' >
                                                    <input type='text' class="form-control" id="dtpFechaAdqModal2" placeholder="Fecha" readonly value="" required>
                                                    <span class="input-group-addon">
                                                        <span class="oi oi-calendar"></span>
                                                    </span>
                                                </div>  
                                            <script>
                                                $('.fad-Date2').datepicker({
                                                    format: "yyyy/mm/dd",
                                                    weekStart: 1,
                                                    todayBtn: "linked",
                                                    language: "es",
                                                    todayHighlight: true
                                                });
                                            </script> 
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="validationCustom05">Stock Mínimo</label>
                                                <input type="number" class="form-control" id="nudStockMinModal2" name="nudStockMin" placeholder="Stock Minimo" value="" required>
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="validationCustom05">Stock Actual</label>
                                                <input type="number" class="form-control" id="nudStockActModal2" name="nudStockAct" placeholder="Stock Actual" value="" required>
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                            
                                            
                                            
                                        </div>
                                        <div class="form-row justify-content-center">
                                            <div class="col-md-5 mb-3">
                                                <label for="validationCustom04">Bodega</label>
                                                <select id="cbBodegaModal2" class="form-control mb-2 mr-sm-2 custom-select" onchange="enviarOtro()" required>
                                                    
                                                <?php
                                                    $base = new PDO("mysql:host=localhost; dbname=vetportugal", "root", "");
                                                    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                    $base->exec("SET CHARACTER SET utf8");
                                                    
                                                    $sql_total="SELECT * FROM bodega";
                                                    $resultado = $base->prepare($sql_total);
                                                    $resultado->execute(array());
                                                    
                                                    while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                                                        if($fila["NOMBRE_BODEGA"] == $consulta[10]){
                                                            echo "<option value=".$fila["ID_BODEGA"]." selected>".$fila["NOMBRE_BODEGA"]."</option>";
                                                        }else{
                                                            echo "<option value=".$fila["ID_BODEGA"].">".$fila["NOMBRE_BODEGA"]."</option>";
                                                        }
                                                    }
                                                ?>
                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        
                                            
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-success" onclick="modificar()">Modificar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade bd-example-modal-lg" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="" method="">
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">Codigo</label>
                                                <input readonly type="text" class="form-control" id="txtCodigoModalE" name="Codigo" placeholder="Codigo" value="" required>
                                                <div class="valid-feedback"></div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Categoria</label>
                                                    
                                                <select id="cbCategoriaModalE" class="form-control mb-2 mr-sm-2" onchange="" disabled>
                                                
                                                <?php
                                                    $base = new PDO("mysql:host=localhost; dbname=vetportugal", "root", "");
                                                    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                    $base->exec("SET CHARACTER SET utf8");
                                                    
                                                    $sql_total="SELECT * FROM categoria";
                                                    $resultado = $base->prepare($sql_total);
                                                    $resultado->execute(array());
                                                    
                                                    while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                                                        if($fila["NOMBRE_CATEGORIA"] == $consulta[1]){
                                                            echo "<option value=".$fila["ID_CATEGORIA"]." selected>".$fila["NOMBRE_CATEGORIA"]."</option>";
                                                        }else{
                                                            echo "<option value=".$fila["ID_CATEGORIA"].">".$fila["NOMBRE_CATEGORIA"]."</option>";
                                                        }
                                                    }
                                                ?>
                                                </select>
                                                            
                                                <div class="valid-feedback"></div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Proveedor</label>
                                                
                                                <select id="cbProveedorModalE" class="form-control mb-2 mr-sm-2" onchange="" disabled>
                                                    
                                                <?php
                                                    $base = new PDO("mysql:host=localhost; dbname=vetportugal", "root", "");
                                                    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                    $base->exec("SET CHARACTER SET utf8");
                                                    
                                                    $sql_total="SELECT * FROM proveedor";
                                                    $resultado = $base->prepare($sql_total);
                                                    $resultado->execute(array());
                                                    
                                                    while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                                                        if($fila["NOMBRE_PROVEEDOR"] == $consulta[2]){
                                                            echo "<option value=".$fila["ID_PROVEEDOR"]." selected>".$fila["NOMBRE_PROVEEDOR"]."</option>";
                                                        }else{
                                                            echo "<option value=".$fila["ID_PROVEEDOR"].">".$fila["NOMBRE_PROVEEDOR"]."</option>";
                                                        }
                                                    }
                                                ?>
                                                </select>
                                                
                                                <div class="valid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom03">Nombre</label>
                                                <input type="text" class="form-control" id="txtNombreModalE" name="Nombre" placeholder="Nombre" value="" readonly required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        
                                            <div class="col-md-5 mb-3">
                                                <label for="validationCustom04">Bodega</label>
                                                <select id="cbBodegaModalE" class="form-control mb-2 mr-sm-2 custom-select" onchange="" disabled required>
                                                    
                                                <?php
                                                    $base = new PDO("mysql:host=localhost; dbname=vetportugal", "root", "");
                                                    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                    $base->exec("SET CHARACTER SET utf8");
                                                    
                                                    $sql_total="SELECT * FROM bodega";
                                                    $resultado = $base->prepare($sql_total);
                                                    $resultado->execute(array());
                                                    
                                                    while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                                                        if($fila["NOMBRE_BODEGA"] == $consulta[10]){
                                                            echo "<option value=".$fila["ID_BODEGA"]." selected>".$fila["NOMBRE_BODEGA"]."</option>";
                                                        }else{
                                                            echo "<option value=".$fila["ID_BODEGA"].">".$fila["NOMBRE_BODEGA"]."</option>";
                                                        }
                                                    }
                                                ?>
                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        
                                            
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modalEliminarBien" role="dialog">
                        <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Eliminación Completa</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    
                                </div>
                                <div class="modal-body">
                                    <p align="center">Los datos fueron eliminados satifactoriamente.</p>
                                    <p align="center"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="cerrarBienE" class="btn btn-danger" data-dismiss="modal" onclick="limpiaTodo()">Cerrar</button>
                                </div>
                            </div>
                        
                        </div>
                    </div>

                    <div class="modal fade" id="modalBien" role="dialog">
                        <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Modificación Completa</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    
                                </div>
                                <div class="modal-body">
                                    <p align="center">Los datos fueron modificados satifactoriamente.</p>
                                    <p align="center"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="cerrarBien" class="btn btn-danger" data-dismiss="modal" onclick="limpiaTodo()">Cerrar</button>
                                </div>
                            </div>
                        
                        </div>
                    </div>

                    <div class="modal fade" id="modalError" role="dialog">
                        <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Error</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    
                                </div>
                                <div class="modal-body">
                                    <p align="center">Algun valor modificado esta incorrecto.</p>
                                    <p align="center">Intentelo nuevamente.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="cerrarError" class="btn btn-danger" data-dismiss="modal" onclick="">Close</button>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <div class="modal fade" id="modalBienAgregar" role="dialog">
                        <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Ingreso Completo</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    
                                </div>
                                <div class="modal-body">
                                    <p align="center">Los datos fueron agregados satifactoriamente.</p>
                                    <p align="center"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="cerrarBien" class="btn btn-danger" data-dismiss="modal" onclick="limpiaTodo()">Cerrar</button>
                                </div>
                            </div>
                        
                        </div>
                    </div>

                    <div class="modal fade" id="modalErrorAgregar" role="dialog">
                        <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Error</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    
                                </div>
                                <div class="modal-body">
                                    <p align="center">Algun valor agregado esta incorrecto.</p>
                                    <p align="center">Intentelo nuevamente.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="cerrarError" class="btn btn-danger" data-dismiss="modal" onclick="">Close</button>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <div class="modal fade" id="modalErrorAgregarCodigo" role="dialog">
                        <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Error</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    
                                </div>
                                <div class="modal-body">
                                    <p align="center">Ya existe un articulo con el mismo codigo ingresado.</p>
                                    <p align="center">Intentelo nuevamente.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="cerrarError" class="btn btn-danger" data-dismiss="modal" onclick="">Close</button>
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