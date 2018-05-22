<?php

    


    function AgregarProducto($Codigo, $Categoria, $Proveedor, $Nombre, $Precio_Venta, $Precio_Neto)
    {
        $base = new PDO("mysql:host=localhost; dbname=pruebavet", "root", "");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");    
        $sql_total="INSERT INTO productos (CODIGO, CATEGORIA, PROVEEDOR, NOMBRE, PRECIO_VENTA, PRECIO_NETO) VALUES ('".$Codigo."', '".$Categoria."', '".$Proveedor."', '".$Nombre."', '".$Precio_Venta."', '".$Precio_Neto."')";
        $resultado = $base->prepare($sql_total);
        $resultado->execute(array());
        

    }


    $consulta=AgregarProducto($_POST["Codigo"], $_POST["Categoria"], $_POST["Proveedor"], $_POST["Nombre"], $_POST["Precio_Venta"], $_POST["Precio_Neto"]);

    

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inicio - VetPortugal</title>
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
                                <a href="login.html" class="nav-link logout"> <span class="d-none d-sm-inline">Salir</span><i class="fa fa-sign-out"></i></a>
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
                        <a href="index.html"> <i class="icon-home"></i>Inicio </a>
                    </li>
                    <li>
                        <a href="Productos.php"> <i class="icon-home"></i>Productos </a>
                    </li>
                    <li>
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
                        <a href="login.html"> <i class="icon-interface-windows"></i>Pagina Inicio Sesion </a>
                    </li>
                </ul><span class="heading">Extras</span>
                <ul class="list-unstyled">
                    <li>
                        <a href="#"> <i class="icon-flask"></i>Demo 1</a>
                    </li>
                    <li>
                        <a href="#"> <i class="icon-screen"></i>Demo 2</a>
                    </li>
                </ul>
            </nav>
            <div class="content-inner">
                <!-- Page Header-->
                <header class="page-header">
                    <div class="container-fluid">
                        <h2 class="no-margin-bottom">Forms</h2>
                    </div>
                </header>
                <!-- Breadcrumb-->
                <div class="breadcrumb-holder container-fluid">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active"><a href="Productos.php">Productos</a> </li>
                        <li class="breadcrumb-item active">Agregar </li>
                    </ul>
                </div>
                <!-- Forms Section-->
                <section class="forms">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Basic Form-->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-close">
                                        <div class="dropdown">
                                            <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                            <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">
                                                <a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a>
                                                <a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header d-flex align-items-center">
                                        <h3 class="h4">Modificar Producto</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>Al terminar sus cambios haga click en GUARDAR</p>
                                        <form>
                                            <div class="form-group">
                                                <label class="form-control-label">Codigo</label>
                                                <input type="text" disabled="" placeholder="Codigo" class="form-control" value="">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label">Categoria</label>
                                                <input type="text" placeholder="Categoria" class="form-control" value="">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label">Proveedor</label>
                                                <input type="text" placeholder="Proveedor" class="form-control" value="">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label">Nombre</label>
                                                <input type="text" placeholder="Nombre" class="form-control" value="">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label">Precio Venta</label>
                                                <input type="text" placeholder="Precio Venta" class="form-control" value="">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label">Precio Neto</label>
                                                <input type="text" placeholder="Precio Neto" class="form-control" value="">
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="submit" id="btnModificar" value="Agregar" class="btn btn-success">
                                                
                                            </div>
                                        </form>
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

<script type="text/javascript">
    alert("Producto AGREGADO Exitosamente!");
    window.location = 'Productos.php';

</script>