<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inicio - VetPortugal</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js">
    </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js">
    </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script>
        $('.fad-Date').datepicker({
            format: "dd/mm/yyyy",
            weekStart: 1,
            todayBtn: "linked",
            language: "es",
            todayHighlight: true
            autoclose: true
            clearBtn: true
        });
    </script>
    
    <!-- Main File-->
    <script src="js/front.js"></script>
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

    <script src="bootstrap-datepicker/js/bootstrap-datepicker.min" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap-datepicker/css/bootstrap-datepicker.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="js/daterangepicker.min.js"></script>
    <script type="text/javascript" src="js/moment.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/daterangepicker.css" />
    <script type="text/javascript" src="JavaScript/Funcion2.js"></script>
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
                <!-- Sidebar Navidation Menus-->
                <span class="heading">Menú</span>
                <ul class="list-unstyled">
                    <li>
                        <a href="index.html"> <i class="oi oi-home"></i>Inicio </a>
                    </li>
                    <li>
                        <a href="Productos.php"> <i class="oi oi-list"></i>Productos </a>
                    </li>
                    <li class="active">
                        <a href="Consultas.php"> <i class="oi oi-calculator"></i>Consultas </a>
                    </li>
                    <li>
                        <a href="Ventas.php"> <i class="oi oi-dollar"></i>Ventas </a>
                    </li>
                    <li>
                        <a href="Operacion.php"> <i class="oi oi-heart"></i>Operación </a>
                    </li>
                        </ul>
            </nav>
            <div class="content-inner">
                <!-- Page Header-->
                <header class="page-header">
                    <div class="container-fluid">
                        <h2 class="no-margin-bottom">Consultas</h2>
                    </div>
                </header>
                <!-- Breadcrumb-->
                <!-- <div class="breadcrumb-holder container-fluid">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                        <li class="breadcrumb-item active">Consultas </li>
                    </ul>
                </div> -->
                <!-- Forms Section-->

                
                <section class="tables">

                

                    <div id="tabla" class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                            <div id="accordion">

                                <div class="card text-center">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" onclick="limpiarTodo()" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Código</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="nombre-tab" onclick="limpiarTodo()" data-toggle="tab" href="#nombre" role="tab" aria-controls="nombre" aria-selected="false">Nombre</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Fecha</a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" id="fechaVenc-tab" onclick="limpiarTodo()" data-toggle="tab" href="#fechavenc" role="tab" aria-controls="fecha" aria-selected="false">Vencimiento</a>
                                                    <a class="dropdown-item" id="fechaAdq-tab" onclick="limpiarTodo()" data-toggle="tab" href="#fechaadq" role="tab" aria-controls="fecha" aria-selected="false ">Adquisición</a>
                                                </div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="otro-tab" onclick="limpiarTodo()" data-toggle="tab" href="#otro" role="tab" aria-controls="otro" aria-selected="false">Otro</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">         
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="container d-inline">
                                                            <div class='form-inline' id='datetimepicker6' >
                                                                <label class="mr-2" for="">Ingrese código </label>
                                                                <input type='text' class="form-control mb-1 mr-sm-2" id="codigo" placeholder="Código" onkeyup="busqueda()">
                                                                <button type="buttom" class="btn btn-danger mb-2 ml-3" onclick="limpiarFormulario()">Limpiar busqueda</button>
                                                            </div>                                                           
                                                        </div>
                                                    </div>

                                                    <div id="datos"></div>
                                                </div>  
                                            </div>


                                            <div class="tab-pane fade " id="nombre" role="tabpanel" aria-labelledby="nombre-tab">         
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="container d-inline">
                                                            <div class='form-inline' id='datetimepicker6' >
                                                                <label class="mr-2" for="">Ingrese nombre </label>
                                                                <input type='text' class="form-control mb-1 mr-sm-2" id="nombre1" placeholder="Nombre" onkeyup="busquedaNombre()">
                                                                <button type="buttom" class="btn btn-danger mb-2 ml-3" onclick="limpiarFormularioNombre()">Limpiar busqueda</button>
                                                            </div>                                                           
                                                        </div>
                                                    </div>

                                                    <div id="datosNombre"></div>
                                                </div>  
                                            </div>
                                                


                                            <div class="tab-pane fade" id="fechavenc" role="tabpanel" aria-labelledby="fechaVenc-tab">
                                            <div class="container">
                                            
                                                <div>
                                                    <label for=""><h5>Vencimiento</h5></label></div>
                                                    <div class="row">
                                                    
                                                        <div class="col-4">
                                                            <div class="list-group" id="list-tab" role="tablist">
                                                                <a class="list-group-item list-group-item-action active" id="list-especificoV-list" data-toggle="list" href="#list-especificoV" role="tab" aria-controls="especificoV" onclick="limpiarFormularioFecha2()">Fecha Específica</a>
                                                                <a class="list-group-item list-group-item-action" id="list-rangoV-list" data-toggle="list" href="#list-rangoV" role="tab" aria-controls="rangoV" onclick="limpiarFormularioFecha2()">Por rango</a>
                                                            </div>
                                                        </div>
                                                        <div class="tab-content" id="nav-tabContent">
                                                            <div class="tab-pane fade show active" id="list-especificoV" role="tabpanel" aria-labelledby="list-especificoV-list">
                                                                <div class="container d-inline">
                                                                    <div class="form-group form-inline">
                                                                        <div class='input-group date fad-Date2' id='datetimepicker6' >
                                                                            <label class="mr-2" for="">Ingrese Fecha </label>
                                                                            <input type='text' class="form-control" id="fechaVEsp" placeholder="Fecha" readonly>
                                                                            <span class="input-group-addon">
                                                                                <span class="oi oi-calendar"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row justify-content-center">
                                                                        <button type="buttom" class="btn btn-primary mb-2 mr-3" onclick="enviarFechaVEsp()">Buscar elementos</button>
                                                                        <button type="buttom" class="btn btn-danger mb-2 ml-3" onclick="limpiarFormularioFecha2()">Limpiar busqueda</button>
                                                                    </div>
                                                                        
                                                                </div>

                                                                

                                                                
                                                            </div>

                                                            <div class="tab-pane fade" id="list-rangoV" role="tabpanel" aria-labelledby="list-rangoV-list">                                                            
                                                            
                                                                <div class="container d-inline">
                                                                    <div class="form-group form-inline">
                                                                        <div class='input-group date fad-Date2' id='datetimepicker6'>
                                                                            <label class="mr-2" for="">Desde </label>
                                                                            <input type='text' class="form-control" id="fechaVRDesde" placeholder="Desde" readonly>
                                                                            <span class="input-group-addon">
                                                                                <span class="oi oi-chevron-left"></span>
                                                                            </span>
                                                                        </div>
                                                                        <div class='input-group date fad-Date2' id='datetimepicker7'>
                                                                            <label class="ml-2 mr-2" for="">Hasta </label>
                                                                            <input type='text' class="form-control" id="fechaVRHasta" placeholder="Hasta" readonly>
                                                                            <span class="input-group-addon">
                                                                                <span class="oi oi-chevron-right"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row justify-content-center">
                                                                        <button type="buttom" class="btn btn-primary mb-2 mr-3" onclick="enviarFechaVRango()">Buscar por rango</button>
                                                                        <button type="buttom" class="btn btn-danger mb-2 ml-3" onclick="limpiarFormularioFecha2()">Limpiar busqueda</button>
                                                                    </div>
                                                                        
                                                                </div>

                                                            </div>

                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="datos2"></div>
                                                <div class="modal fade" id="myModal" role="dialog">
                                                    <div class="modal-dialog">
                                                        
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h4 class="modal-title">Error</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            
                                                            </div>
                                                            <div class="modal-body">
                                                            <p>La primera fecha no pueda ser mayor que la segunda fecha.</p>
                                                            <p>Intentelo nuevamente.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiarFormularioFecha2()">Close</button>
                                                            </div>
                                                        </div>  
                                                    
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="tab-pane fade " id="fechaadq" role="tabpanel" aria-labelledby="fechaAdq-tab">
                                                <div class="container">
                                                <div><label for=""><h5>Adquisición</h5></label></div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="list-group" id="list-tab" role="tablist">
                                                                <a class="list-group-item list-group-item-action active" id="list-especifico-list" data-toggle="list" href="#list-especifico" role="tab" aria-controls="especifico" onclick="limpiarFormularioFecha1()">Fecha Específica</a>
                                                                <a class="list-group-item list-group-item-action" id="list-rango-list" data-toggle="list" href="#list-rango" role="tab" aria-controls="rango" onclick="limpiarFormularioFecha1()">Por rango</a>
                                                            </div>
                                                        </div>
                                                        <div class="tab-content" id="nav-tabContent">

                                                            <div class="tab-pane fade show active" id="list-especifico" role="tabpanel" aria-labelledby="list-especifico-list">
                                                                <div class="container d-inline">
                                                                    <div class="form-group form-inline">
                                                                        <div class='input-group date fad-Date2' id='datetimepicker6' >
                                                                            <label class="mr-2" for="">Ingrese Fecha </label>
                                                                            <input type='text' class="form-control" id="fechaEsp" placeholder="Fecha" readonly>
                                                                            <span class="input-group-addon">
                                                                                <span class="oi oi-calendar"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row justify-content-center">
                                                                        <button type="buttom" class="btn btn-primary mb-2 mr-3" onclick="enviarFechaEsp()">Buscar elementos</button>
                                                                        <button type="buttom" class="btn btn-danger mb-2 ml-3" onclick="limpiarFormularioFecha1()">Limpiar busqueda</button>
                                                                    </div>
                                                                        
                                                                </div>

                                                                

                                                                
                                                            </div>

                                                            <div class="tab-pane fade" id="list-rango" role="tabpanel" aria-labelledby="list-rango-list">                                                            
                                                            
                                                                <div class="container d-inline">
                                                                    <div class="form-group form-inline">
                                                                        <div class='input-group date fad-Date2' id='datetimepicker6'>
                                                                            <label class="mr-2" for="">Desde </label>
                                                                            <input type='text' class="form-control" id="fechaRDesde" placeholder="Desde" readonly>
                                                                            <span class="input-group-addon">
                                                                                <span class="oi oi-chevron-left"></span>
                                                                            </span>
                                                                        </div>
                                                                        <div class='input-group date fad-Date2' id='datetimepicker7'>
                                                                            <label class="ml-2 mr-2" for="">Hasta </label>
                                                                            <input type='text' class="form-control" id="fechaRHasta" placeholder="Hasta" readonly>
                                                                            <span class="input-group-addon">
                                                                                <span class="oi oi-chevron-right"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row justify-content-center">
                                                                        <button type="buttom" class="btn btn-primary mb-2 mr-3" onclick="enviarFechaRango()">Buscar por rango</button>
                                                                        <button type="buttom" class="btn btn-danger mb-2 ml-3" onclick="limpiarFormularioFecha1()">Limpiar busqueda</button>
                                                                    </div>
                                                                        
                                                                </div>
                                                                <script>
                                                                    $('.fad-Date').datepicker({
                                                                        format: "dd/mm/yyyy",
                                                                        weekStart: 1,
                                                                        todayBtn: "linked",
                                                                        language: "es",
                                                                        todayHighlight: true    
                                                                        clearBtn: true
                                                                    });
                                                                </script>   
                                                                <script>
                                                                    $('.fad-Date2').datepicker({
                                                                        format: "yyyy/mm/dd",
                                                                        weekStart: 1,
                                                                        todayBtn: "linked",
                                                                        language: "es",
                                                                        todayHighlight: true
                                                                        clearBtn: true
                                                                    });
                                                                </script> 

                                                            </div>

                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="datos1"></div>
                                                <div class="modal fade" id="myModal2" role="dialog">
                                                    <div class="modal-dialog">
                                                    
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h4 class="modal-title">Error</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        
                                                        </div>
                                                        <div class="modal-body">
                                                        <p>La primera fecha no pueda ser mayor que la segunda fecha.</p>
                                                        <p>Intentelo nuevamente.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiarFormularioFecha1()">Close</button>
                                                        </div>
                                                    </div>
                                                    
                                                    </div>
                                                </div>
                                               
                                            </div>
                                           
                                            <div class="tab-pane fade" id="otro" role="tabpanel" aria-labelledby="otro-tab">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <label class="mr-3 mb-2" for="codigo">Seleccione Grupo </label>
                                                            <select id="otroSelect" class="form-control mb-2 mr-sm-2" onchange="enviarOtro()">
                                                                <option selected>Opción...</option>
                                                                <option value="CATEGORIA">Categoría</option>
                                                                <option value="PROVEEDOR">Proveedor</option>
                                                                <option value="BODEGA">Almacenamiento</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm">
                                                            <label class="mr-3 mb-2" for="codigo">Seleccione Opción </label>
                                                            <select id='otro2Select' class='form-control mb-2 mr-sm-2' onchange='enviarOtro2()'></select>
                                                        </div>
                                                        <div class="col-sm">
                                                            <button type="buttom" id="borrarOtro" class="btn btn-danger mb-2 mt-4" onclick="limpiarFormulario2();">Limpiar busqueda</button>
                                                                
                                                                
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="datosOtro"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                            
                        </div>
                    </div>

                    <div class="modal fade bd-example-modal-lg" id="modalModificar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                                <input readonly type="text" class="form-control" id="txtCodigoModal" name="Codigo" placeholder="Codigo" value="" required>
                                                <div class="valid-feedback"></div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Categoria</label>
                                                    
                                                <select id="cbCategoriaModal" class="form-control mb-2 mr-sm-2" onchange="">
                                                
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
                                                
                                                <select id="cbProveedorModal" class="form-control mb-2 mr-sm-2" onchange="">
                                                    
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
                                                <input type="text" class="form-control" id="txtNombreModal" name="Nombre" placeholder="Nombre" value="" required>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="" for="inlineFormInputGroup">Precio Venta</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">$</div>
                                                    </div>
                                                    <input type="number" class="form-control" align="right" style="text-align:right;" id="nudPrecioVentaModal" placeholder="Venta" value="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="" for="inlineFormInputGroup">Precio Neto</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">$</div>
                                                    </div>
                                                    <input type="number" class="form-control" align="right" style="text-align:right;" id="nudPrecioNetoModal" placeholder="Neto" value="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label class="mr-2 " for="">Fecha Vencimiento </label>
                                                <div class='input-group date fad-Date2' id='' >
                                                    <input type='text' class="form-control" id="dtpFechaVencModal" placeholder="Fecha" readonly value="" required>
                                                    <span class="input-group-addon">
                                                        <span class="oi oi-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="mr-2 " for="">Fecha Adquisición </label>
                                                <div class='input-group date fad-Date2' id='' >
                                                    <input type='text' class="form-control" id="dtpFechaAdqModal" placeholder="Fecha" readonly value="" required>
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
                                                <input type="number" class="form-control" id="nudStockMinModal" name="nudStockMin" placeholder="Stock Minimo" value="" required>
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="validationCustom05">Stock Actual</label>
                                                <input type="number" class="form-control" id="nudStockActModal" name="nudStockAct" placeholder="Stock Actual" value="" required>
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                            
                                            
                                            
                                        </div>
                                        <div class="form-row justify-content-center">
                                            <div class="col-md-5 mb-3">
                                                <label for="validationCustom04">Bodega</label>
                                                <select id="cbBodegaModal" class="form-control mb-2 mr-sm-2 custom-select" onchange="enviarOtro()" required>
                                                    
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
                    
                </section>
                <!-- Page Footer-->
                <footer class="main-footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <p>VetPortugal &copy; 2014-2018</p>
                            </div>
                            <div class="col-sm-6 text-right">
                                <p>Diseñado por <a href="https://bootstrapious.com/admin-templates" class="external">G&B</a></p>
                                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    
</body>

</html>