<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inicio - VetPortugal</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/solid.css" integrity="sha384-S2gVFTIn1tJ/Plf+40+RRAxBCiBU5oAMFUJxTXT3vOlxtXm7MGjVj62mDpbujs4C" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/regular.css" integrity="sha384-QNorH84/Id/CMkUkiFb5yTU3E/qqapnCVt6k5xh1PFIJ9hJ8VfovwwH/eMLQTjGS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/brands.css" integrity="sha384-SYNjKRRe+vDW0KSn/LrkhG++hqCLJg9ev1jIh8CHKuEA132pgAz+WofmKAhPpTR7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/fontawesome.css" integrity="sha384-0b7ERybvrT5RZyD80ojw6KNKz6nIAlgOKXIcJ0CV7A6Iia8yt2y1bBfLBOwoc9fQ" crossorigin="anonymous">
    <!-- <script type="text/javascript" src="JavaScript/Funcion1.js"></script> -->
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
    <script type="text/javascript"  src="JavaScript/Funcion1.js"></script>
    <script type="text/javascript"  src="JavaScript/Funcion2.js"></script>
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
                    <li>
                        <a href="Productos.php"> <i class="oi oi-list"></i>Productos </a>
                    </li>
                    <li>
                        <a href="Consultas.php"> <i class="oi oi-calculator"></i>Consultas </a>
                    </li>
                    <li>
                        <a href="Ventas.php"> <i class="oi oi-dollar"></i>Ventas </a>
                    </li>
                    <li class="active">
                        <a href="Paquetes.php"> <i class="oi oi-heart"></i>Paquetes </a>
                    </li>
                   
                </ul>
            </nav>
            <div class="content-inner">
                <!-- Page Header-->
                <header class="page-header">
                    <div class="container-fluid">
                        <h2 class="no-margin-bottom">Paquetes</h2> 
                    </div>
                </header>
                <!-- Forms Section-->
                <section class="forms">
                    <div id="tabla" class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Búsqueda</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="myTabContent">

                                            <div class="container">

                                                <div class="text-center">
                                                    <div class="row">
                                                
                                                        <div class="col-3">
                                                            <div class="list-group" id="list-tab" role="tablist">
                                                                <a class="list-group-item list-group-item-action " id="list-articulos-list" data-toggle="list" href="#list-articulos" role="tab" aria-controls="articulos" onclick="mostrarPacks('Articulo')">Artículos</a>
                                                                <a class="list-group-item list-group-item-action" id="list-operaciones-list" data-toggle="list" href="#list-operaciones" role="tab" aria-controls="operaciones" onclick="mostrarPacks('cirugia')">Cirugía</a>
                                                            </div>
                                                        </div>
                                                        <div class="tab-content col-6 d-flex justify-content-center" id="nav-tabContent">
                                                            <div class="tab-pane fade show " id="list-articulos" role="tabpanel" aria-labelledby="list-articulos-list">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="container d-inline">
                                                                            <div class='form-inline' id='' >
                                                                                <label class="mb-1" for="">Ingrese Nombre del paquete de artículos</label>
                                                                            </div>                                                           
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class='col-md-12'>
                                                                            <input type='text' class="form-control mb-1 form-control-" id="nombreArticulo" placeholder="Nombre paquete artículos" onkeyup="">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="row">
                                                                        <div class="container">
                                                                            <div class='form-inline' id='' >
                                                                                <button type="buttom" class="btn btn-success mr-5 ml-1" onclick="">Buscar</button>
                                                                                <button type="buttom" class="btn btn-danger ml-5 mr-1" onclick="">Limpiar busqueda</button>
                                                                            </div>                                                           
                                                                        </div>
                                                                    </div>
                                                                </div>  
                                                            </div>      
                                                            <div class="tab-pane fade show" id="list-operaciones" role="tabpanel" aria-labelledby="list-operaciones-list">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="container d-inline">
                                                                            <div class='form-inline' id='' >
                                                                                <label class="mb-1" for="">Ingrese Nombre del paquete de cirugía</label>
                                                                            </div>                                                           
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class='col-md-12'>
                                                                            <input type='text' class="form-control mb-1 form-control-" id="nombreOperacion" placeholder="Nombre paquete cirugía" onkeyup="">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="row">
                                                                        <div class="container">
                                                                            <div class='form-inline' id='datetimepicker6' >
                                                                                <button type="buttom" class="btn btn-success ml-1 mr-5" onclick="">Buscar</button>
                                                                                <button type="buttom" class="btn btn-danger ml-5 mr-1" onclick="">Limpiar busqueda</button>
                                                                            </div>                                                           
                                                                        </div>
                                                                    </div>
                                                                </div>  
                                                            </div>      
                                                        </div>
                                                        <div class='col-3 '>
                                                            <button type="buttom" class="btn btn-primary mt-4" onclick="nuevoPaquete()"><span class="oi oi-plus"></span> Nuevo Paquete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <h5><i class="fas fa-star"></i> Favoritos</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="myTabContent">

                                            <div class="container">
                                                <div class="row" id="favoritos"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <h5><i class="far fa-star"></i> No Favoritos</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="myTabContent">

                                            <div class="container">

                                                <div class="text-center">
                                                    <div class="row">
                                                        <div class="table-responsive">
                                        
                                                            <table class='table table-striped table-hover table-sm'>
                                                                <thead>
                                                                    <tr class="thead-light">
                                                                        <th class="text-center">Seleccionar</th>
                                                                        <th class="text-center">Nombre</th>
                                                                        <th class="text-center">Precio</th>
                                                                        <th class="text-center">N° Productos</th>
                                                                        <th class="text-center">Opciones</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="BLista">
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>                           
                            </div>
                        </div>   
                    </div>  
                
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalAgregarPaquete">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Paquete Nuevo</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button> 
                                </div>
                                <div class="modal-body">
                                    <div id="tabla" class="container-fluid">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Buscar</h5>    
                                                    </div>
                                                    <div class="card-body">
                                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="codigo-tab" data-toggle="tab" href="#codigo" role="tab" aria-controls="codigo" aria-selected="true">Codigo</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="nombre-tab" data-toggle="tab" href="#nombre" role="tab" aria-controls="nombre" aria-selected="false">Nombre</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content" id="myTabContent">
                                                            <div class="tab-pane fade show active" id="codigo" role="tabpanel" aria-labelledby="codigo-tab">
                                                                <form id="formCod">
                                                                    <div class="form-group"><br>
                                                                        <label for="txtCodigo">Ingrese Código</label>
                                                                        <input type="text" class="form-control" id="txtCodigo" aria-describedby="codigo" placeholder="Código"  onkeypress="pulsar(event)">
                                                                    </div>
                                                                    <div class = "row justify-content-around">
                                                                        <button type="button" class="btn btn-primary mb-1" id="btnBusqueda" onclick="buscar()">Buscar</button>
                                                                        <button type="button" class="btn btn-danger" onclick="limpiarBusquedas()">Limpiar busqueda</button>
                                                                    </div>
                                                                    
                                                                </form>   
                                                            </div>
                                                            <div class="tab-pane fade" id="nombre" role="tabpanel" aria-labelledby="nombre-tab">
                                                                <form id="formNom">
                                                                    <div class="form-group"><br>
                                                                        <label for="txtNombre">Ingrese Nombre</label>
                                                                        <input type="text" class="form-control" id="txtNombre" aria-describedby="nombre" placeholder="Nombre"  onkeypress="pulsarNombre(event)">
                                                                    </div>
                                                                    <div class = "row justify-content-around">
                                                                        <button type="button" class="btn btn-primary mb-1" id="btnBusqueda" onclick="buscarNombre()">Buscar</button>
                                                                        <button type="button" class="btn btn-danger" onclick="limpiarBusquedas()">Limpiar busqueda</button>
                                                                    </div>
                                                                    
                                                                </form>   
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="card">
                                                        <div class="card-body" id="divTab">
                                                            <form id="formCb">
                                                                <div class="form-group">
                                                                    <label for="">¿Paquete de Artículos o Cirugía?</label>
                                                                    <select class="form-control" name="" id="cbPaquete">
                                                                        <option value="" selected>Elija Opción</option>
                                                                        <option value="Articulos" >Artículos</option>
                                                                        <option value="Cirugia" >Cirugía</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="favorito">
                                                                    <label class="form-check-label" for="defaultCheck1">Favorito</label>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-8">
                                                <div class=''>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class=" container ">
                                                                <div class="row justify-content-between">
                                                                    <h5>Paquete</h5>
                                                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminarTrs()">Borrar Todo</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body" id="divTab">
                                                            <table id="tablaVentas" class='table table-striped table-hover table-sm'>
                                                                <thead>
                                                                    <th class="text-center">Codigo</th>
                                                                    <th class="text-center">Nombre</th>
                                                                    <th>Precio</th>
                                                                    <th class="text-center" width="75px">Cantidad</th>
                                                                    <th class="text-center" width="50px">Opcion</th>
                                                                </thead>
                                                                <tbody id="tBody"></tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="row justify-content-end">
                                                                <p><h5 class=" mt-2">Total: $</h5></p>
                                                                <h5 class="mr-3 mt-2"><div id="precioTotal">0</div></h5>
                                                                <div id="prueba"></div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-body" id="divTab">
                                                            <form id="formPaqN">
                                                                <div class="form-group">
                                                                    <label for="txtCodigo">Nombre del Paquete</label>
                                                                    <input type="text" class="form-control" id="txtNombrePaquete" aria-describedby="nombre" placeholder="Nombre Paquete"  onkeypress="">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-body" id="divTab">
                                                            <form id="formPaqP">
                                                                <div class="form-group">
                                                                    <label for="txtCodigo">Precio del Paquete <small>(en caso de no querer el de los productos por separado)</small></label>
                                                                    <input type="number" class="form-control" id="txtPrecioPaquete" aria-describedby="precio" placeholder="Precio Paquete"  onkeypress="">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="cerrarBienE" class="btn btn-danger" data-dismiss="modal" onclick="limpiaTodo()">Cerrar</button>
                                    <button type="button" class="btn btn-success mr-3" onclick="crearPaquete()">Guardar Paquete</button>
                                </div>
                            </div>
                        
                        </div>
                    </div>


                    <div class='modal fade' id='modalAgregadoExito' role='dialog'>
                        <div class='modal-dialog'>
                
                            <!-- Modal content-->
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h4 class='modal-title'>Exito</h4>
                                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                </div>
                                <div class='modal-body'>
                                    <p>El paquete fue creado correctamente!.</p>
                                </div>
                                <div class='modal-footer'>      
                                    <button type='button' id='cerrarExito' class='btn btn-danger' data-dismiss='modal' onclick=eliminarTrs()>Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class='modal fade' id='modalPaqueteExiste' role='dialog'>
                        <div class='modal-dialog'>
                
                            <!-- Modal content-->
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h4 class='modal-title'>Error</h4>
                                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                </div>
                                <div class='modal-body'>
                                    <p>Ya existe un paquete con ese nombre, intente con otro.</p>
                                </div>
                                <div class='modal-footer'>      
                                    <button type='button' id='cerrarExito' class='btn btn-danger' data-dismiss='modal' onclick=reabrirModal()>Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class='modal fade' id='modalPaqueteError' role='dialog'>
                        <div class='modal-dialog'>
                
                            <!-- Modal content-->
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h4 class='modal-title'>Error</h4>
                                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                </div>
                                <div class='modal-body'>
                                    <p>Surgio un error!, revise que se rellenaron los campos de PRODUCTOS, la OPCION de artículo o cirugia y el NOMBRE del producto.</p>
                                </div>
                                <div class='modal-footer'>      
                                    <button type='button' id='cerrarExito' class='btn btn-danger' data-dismiss='modal' onclick=reabrirModal()>Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalModificarPaquete">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Modificar Paquete</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button> 
                                </div>
                                <div class="modal-body">
                                    <div id="tabla" class="container-fluid">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Buscar</h5>    
                                                    </div>
                                                    <div class="card-body">
                                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="codigoModificar-tab" data-toggle="tab" href="#codigoModificar" role="tab" aria-controls="codigoModificar" aria-selected="true">Codigo</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="nombreModificar-tab" data-toggle="tab" href="#nombreModificar" role="tab" aria-controls="nombreModificar" aria-selected="false">Nombre</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content" id="myTabContent">
                                                            <div class="tab-pane fade show active" id="codigoModificar" role="tabpanel" aria-labelledby="codigoModificar-tab">
                                                                <form id="formCod">
                                                                    <div class="form-group"><br>
                                                                        <label for="txtCodigo">Ingrese Código</label>
                                                                        <input type="text" class="form-control" id="txtCodigoModificar" aria-describedby="codigoModificar" placeholder="Código"  onkeypress="pulsarNombre2(event)">
                                                                    </div>
                                                                    <div class = "row justify-content-around">
                                                                        <button type="button" class="btn btn-primary mb-1" id="btnBusqueda" onclick="buscar2()">Buscar</button>
                                                                        <button type="button" class="btn btn-danger" onclick="limpiarBusquedas()">Limpiar busqueda</button>
                                                                    </div>
                                                                    
                                                                </form>   
                                                            </div>
                                                            <div class="tab-pane fade" id="nombreModificar" role="tabpanel" aria-labelledby="nombreModificar-tab">
                                                                <form id="formNom">
                                                                    <div class="form-group"><br>
                                                                        <label for="txtNombre">Ingrese Nombre</label>
                                                                        <input type="text" class="form-control" id="txtNombreModificar" aria-describedby="nombreModificar" placeholder="Nombre"  onkeypress="pulsarNombre2(event)">
                                                                    </div>
                                                                    <div class = "row justify-content-around">
                                                                        <button type="button" class="btn btn-primary mb-1" id="btnBusqueda" onclick="buscarNombre2()">Buscar</button>
                                                                        <button type="button" class="btn btn-danger" onclick="limpiarBusquedas()">Limpiar busqueda</button>
                                                                    </div>
                                                                    
                                                                </form>   
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="card">
                                                        <div class="card-body" id="divTab">
                                                            <form id="formCb">
                                                                <div class="form-group">
                                                                    <label for="">¿Paquete de Artículos o Cirugía?</label>
                                                                    <select class="form-control" name="" id="cbPaqueteModificar">
                                                                        <option value="" selected>Elija Opción</option>
                                                                        <option value="Articulos" >Articulos</option>
                                                                        <option value="Cirugia" >Cirugía</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="favoritoModificar">
                                                                    <label class="form-check-label" for="defaultCheck1">Favorito</label>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-8">
                                                <div class=''>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class=" container ">
                                                                <div class="row justify-content-between">
                                                                    <h5>Paquete</h5>
                                                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminarTrs()">Borrar Todo</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body" id="divTab">
                                                            <table id="tablaVentasModificar" class='table table-striped table-hover table-sm'>
                                                                <thead>
                                                                    <th class="text-center">Codigo</th>
                                                                    <th class="text-center">Nombre</th>
                                                                    <th>Precio</th>
                                                                    <th class="text-center" width="75px">Cantidad</th>
                                                                    <th class="text-center" width="50px">Opcion</th>
                                                                </thead>
                                                                <tbody id="tBodyModificar"></tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="row justify-content-end">
                                                                <p><h5 class=" mt-2">Total: $</h5></p>
                                                                <h5 class="mr-3 mt-2"><div id="precioTotalModificar">0</div></h5>
                                                                <div id="prueba"></div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-body" id="divTab">
                                                            <form id="formPaqN">
                                                                <div class="form-group">
                                                                    <label for="txtCodigo">Nombre del Paquete</label>
                                                                    <input type="text" class="form-control" id="txtNombrePaqueteModificar" aria-describedby="nombre" placeholder="Nombre Paquete"  onkeypress="">
                                                                    <input type="hidden" class="form-control" id="txtCodigoPaqueteModificar" aria-describedby="codigo" placeholder="Codigo Paquete"  onkeypress="">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-body" id="divTab">
                                                            <form id="formPaqP">
                                                                <div class="form-group">
                                                                    <label for="txtCodigo">Precio del Paquete <small>(en caso de no querer el de los productos por separado)</small></label>
                                                                    <input type="number" class="form-control" id="txtPrecioPaqueteModificar" aria-describedby="precio" placeholder="Precio Paquete"  onkeypress="">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <div class="container">
                                        <div class="row justify-content-between">
                                            <button type="button" class="btn btn-outline-danger" onclick="preparacionEliminar()">Eliminar Paquete</button>
                                            <button type="button" class="btn btn-success " onclick="modificarPaqueteFinal()">Modificar Paquete</button>
                                            <button type="button" class="btn btn-primary" onclick="arrayM()">Vender Paquete</button>
                                            <button type="button" id="cerrarBienE" class="btn btn-danger" data-dismiss="modal" onclick="limpiaTodo()">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <div class='modal fade' id='modalPaqueteModificacion' role='dialog'>
                        <div class='modal-dialog'>
                
                            <!-- Modal content-->
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h4 class='modal-title'>Modificación</h4>
                                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                </div>
                                <div class='modal-body'>
                                    <p>Se modificaron correctamente los datos.</p>
                                </div>
                                <div class='modal-footer'>      
                                    <button type='button' id='cerrarExito' class='btn btn-danger' data-dismiss='modal' onclick=''>Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='modal fade' id='modalPaquetePreparacionEliminacion' role='dialog'>
                        <div class='modal-dialog'>
                
                            <!-- Modal content-->
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h4 class='modal-title'>Eliminación de Paquete</h4>
                                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                </div>
                                <div class='modal-body'>
                                    <p>¿Está seguro de eliminar el paquete?.</p>
                                </div>
                                <div class='modal-footer'>    
                                    <div class="container">
                                        <div class="row justify-content-between">  
                                            <button type='button' id='cerrarExito' class='btn btn-secondary' data-dismiss='modal' onclick=''>Cerrar</button>
                                            <button type='button' id='cerrarExito' class='btn btn-outline-danger' onclick='eliminacionPaquete()'>Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='modal fade' id='modalPaqueteEliminado' role='dialog'>
                        <div class='modal-dialog'>
                
                            <!-- Modal content-->
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h4 class='modal-title'>Eliminación de Paquete</h4>
                                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                </div>
                                <div class='modal-body'>
                                    <p>Se ha eliminado el paquete.</p>
                                </div>
                                <div class='modal-footer'>    
                                    <div class="container">
                                        <div class="row justify-content-end">  
                                            <button type='button' id='cerrarExito' class='btn btn-secondary' data-dismiss='modal' onclick='esconderModal()'>Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='modal fade' id='modalErrorP' role='dialog'>
                        <div class='modal-dialog'>
                            <!-- Modal content-->
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h4 class='modal-title'>Error</h4>
                                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                </div>
                                <div class='modal-body'>
                                    <p>No se puede continuar porque hay algunos productos que no tienen la cantidad suficiente de stock.</p>
                                    <p>Los siguientes productos estan en conflicto:</p>
                                    <div>
                                        <table id="tablaErrorP" class='table table-striped table-hover table-sm'>
                                            <thead>
                                                <th>Codigo</th>
                                                <th>Nombre</th>
                                                <th>Stock bodega</th>
                                                <th>Cantidad Solicitada</th>
                                            </thead>
                                            <tbody id="tBodyErrorP"></tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class='modal-footer'>      
                                    <button type='button' id='cerrarError' class='btn btn-danger' data-dismiss='modal'>Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='modal fade' id='modalExito2' role='dialog'>
                        <div class='modal-dialog'>
                
                            <!-- Modal content-->
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h4 class='modal-title'>Exito</h4>
                                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                </div>
                                <div class='modal-body'>
                                    <p>Los productos fueron descontados correctamente del inventario.</p>
                                </div>
                                <div class='modal-footer'>      
                                    <button type='button' id='cerrarExito' class='btn btn-danger' data-dismiss='modal' onclick=eliminarTrs()>Close</button>
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
  
</body>

</html>