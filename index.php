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
                                <a href="logout.php" class="nav-link logout"> <span class="d-none d-sm-inline">Salir</span><i class="fa fa-sign-out"></i></a>
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
                    <li class="active">
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
                    <li>
                        <a href="Paquetes.php"> <i class="oi oi-heart"></i>Paquetes </a>
                    </li>
                    <!-- <li>
                        <a href="tables.html"> <i class="oi oi-grid-three-up"></i>Tablas </a>
                    </li>
                    <li>
                        <a href="charts.html"> <i class="oi oi-bar-chart"></i>Gráficos </a>
                    </li>
                    <li>
                        <a href="forms.html"> <i class="oi oi-spreadsheet"></i>Formularios </a>
                    </li>
                    
                    <li>
                        <a href="login.php"> <i class="oi oi-person"></i>Pagina Inicio Sesion </a>
                    </li> -->
                    <li>
                        <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class"oi oi-home"></i>Agregar</a>
                        <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                            <li><a href="Agregar_Producto.php">Articulo</a></li>
                            <li><a href="#">Procedimiento</a></li>
                            <li><a href="#">Bla bla</a></li>
                        </ul>
                    </li>
                <!-- </ul><span class="heading">Extras</span>
                <ul class="list-unstyled">
                    <li>
                        <a href="#"> <i class="icon-flask"></i>Demo 1</a>
                    </li>
                    <li>
                        <a href="#"> <i class="icon-screen"></i>Demo 2</a>
                    </li>
                </ul> -->
            </nav>

            <div class="content-inner">
                <!-- Page Header-->
                <header class="page-header">
                    <div class="container-fluid">
                        <h2 class="no-margin-bottom">Inicio</h2>
                    </div>
                </header>
                <!-- Dashboard Counts Section-->
                <section class="dashboard-counts no-padding-bottom">
                    <div class="container-fluid">
                        <div class="row bg-white has-shadow">
                            <!-- Item -->
                            <!-- <div class="col-xl-3 col-sm-6">
                                <div class="item d-flex align-items-center">
                                    <div class="icon bg-violet"><i class="icon-user"></i></div>
                                    <div class="title"><span>Nuevos<br>Productos</span>
                                        <div class="progress">
                                            <div role="progressbar" style="width: 10%; height: 4px;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                                        </div>
                                    </div>
                                    <div class="number"><strong>10</strong></div>
                                </div>
                            </div> -->
                            <!-- Item -->
                            <div class="col-xl-4 col-sm-6">
                                <div class="item d-flex align-items-center">
                                    <div class="icon bg-green"><i class="icon-padnote"></i></div>
                                    <div class="title"><span>Productos<br>Totales</span>
                                        <div class="progress">
                                            <?php
                                                $conexion = mysqli_connect("Localhost", "root", "", "vetportugal");
                                                if(mysqli_connect_errno()){
                                                    echo "Error al conectar a la BBDD";
                                                    exit();
                                                }
                                            
                                                mysqli_set_charset($conexion, "utf8");
                                            
                                                $tmp="";
                                                $total; 
                                                $consulta;
                                                $vencidos;
                                                $Vencidos2;
                                                $sql="SELECT COUNT(*) as CANTIDADT FROM `productos`";
                                                $res=mysqli_query($conexion,$sql);
                                                while ($row=mysqli_fetch_array($res, MYSQL_ASSOC)){                                     
                                                    $total=$row["CANTIDADT"];
                                                }
                                                $sql="SELECT COUNT(*) as CANTIDAD FROM `productos` WHERE FECHA_VENC BETWEEN curdate() and (curdate() + 7)";
                                                $res=mysqli_query($conexion,$sql);
                                                while ($row=mysqli_fetch_array($res, MYSQL_ASSOC)){                                     
                                                    $consulta=$row["CANTIDAD"];
                                                }
                                                $sql="SELECT COUNT(*) as CANTIDADV from productos where FECHA_VENC < curdate()";
                                                $res=mysqli_query($conexion,$sql);
                                                while ($row=mysqli_fetch_array($res, MYSQL_ASSOC)){                                     
                                                    $Vencidos2=$row["CANTIDADV"];
                                                }

                                                $resta = (($consulta * 100)/($total));
                                                $resta2 = (($Vencidos2 * 100)/($total));
                                                
                                                echo "<div role='progressbar' style='width: ".$total."%; height: 4px;' aria-valuenow='15' aria-valuemin='0' aria-valuemax='100' class='progress-bar bg-green'></div>"
                                            
                                            ?>    
                                        </div>
                                    </div>
                                    <?php           
                                        echo "<div class='number'><strong>". $total ."</strong></div>";
                                    ?>
                                </div>
                            </div>
                            <!-- Item -->
                            <div class="col-xl-4 col-sm-6">
                                <div class="item d-flex align-items-center">
                                    <div class="icon bg-orange"><i class="icon-bill"></i></div>
                                    <div class="title"><span>Productos<br>Por vencer</span>
                                        <div class="progress">
                                            <?php
                                                echo "<div role='progressbar' style='width: ".$resta."%; height: 4px;' aria-valuenow='15' aria-valuemin='0' aria-valuemax='100' class='progress-bar bg-orange'></div>"
                                            ?>
                                            
                                        </div>
                                    </div>
                                    <?php           
                                        echo "<div class='number'><strong>". $consulta ."</strong></div>";
                                    ?>
                                    
                                </div>
                            </div>
                            <!-- Item -->
                            <div class="col-xl-4 col-sm-6">
                                <div class="item d-flex align-items-center">
                                    <div class="icon bg-red"><i class="icon-check"></i></div>
                                    <div class="title"><span>Productos<br>Vencidos</span>
                                        <div class="progress">
                                            <?php
                                                echo "<div role='progressbar' style='width: ".$resta2."%; height: 4px;' aria-valuenow='15' aria-valuemin='0' aria-valuemax='100' class='progress-bar bg-red'></div>"
                                            ?>
                                        </div>
                                    </div>
                                    <?php           
                                        echo "<div class='number'><strong>". $Vencidos2 ."</strong></div>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Header Section    -->
                <section class="dashboard-header">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Statistics -->
                            <div class="statistics col-lg-3 col-12">
                                <div class="statistic d-flex align-items-center bg-white has-shadow">
                                    <div class="icon bg-red"><i class="fa fa-tasks"></i></div>
                                    <div class="text"><strong>234</strong><br><small>Clinico</small></div>
                                </div>
                                <div class="statistic d-flex align-items-center bg-white has-shadow">
                                    <div class="icon bg-green"><i class="fa fa-calendar-o"></i></div>
                                    <div class="text"><strong>152</strong><br><small>Bodega</small></div>
                                </div>
                                <div class="statistic d-flex align-items-center bg-white has-shadow">
                                    <div class="icon bg-orange"><i class="fa fa-paper-plane-o"></i></div>
                                    <div class="text"><strong>147</strong><br><small>Quirurgico</small></div>
                                </div>
                            </div>
                            <!-- Line Chart            -->
                            <div class="chart col-lg-6 col-12">
                                <div class="line-chart bg-white d-flex align-items-center justify-content-center has-shadow">
                                    <canvas id="lineCahrt"></canvas>
                                </div>
                            </div>
                            <div class="chart col-lg-3 col-12">
                                <!-- Bar Chart   -->
                                <div class="bar-chart has-shadow bg-white">
                                    <div class="title"><strong class="text-violet">95%</strong><br><small>Eficiencia</small></div>
                                    <canvas id="barChartHome"></canvas>
                                </div>
                                <!-- Numbers-->
                                <div class="statistic d-flex align-items-center bg-white has-shadow">
                                    <div class="icon bg-green"><i class="fa fa-line-chart"></i></div>
                                    <div class="text"><strong>99.9%</strong><br><small>Servidor Estable</small></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Projects Section-->
                <section class="projects no-padding-top">
                    <div class="container-fluid">
                        <!-- Project-->
                        <div class="project">
                            <div class="row bg-white has-shadow">
                                <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                                    <div class="project-title d-flex align-items-center">
                                        <div class="image has-shadow"><img src="img/project-1.jpg" alt="..." class="img-fluid"></div>
                                        <div class="text">
                                            <h3 class="h4">Project Title</h3><small>Lorem Ipsum Dolor</small>
                                        </div>
                                    </div>
                                    <div class="project-date"><span class="hidden-sm-down">Today at 4:24 AM</span></div>
                                </div>
                                <div class="right-col col-lg-6 d-flex align-items-center">
                                    <div class="time"><i class="fa fa-clock-o"></i>12:00 PM </div>
                                    <div class="comments"><i class="fa fa-comment-o"></i>20</div>
                                    <div class="project-progress">
                                        <div class="progress">
                                            <div role="progressbar" style="width: 45%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Project-->
                        <div class="project">
                            <div class="row bg-white has-shadow">
                                <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                                    <div class="project-title d-flex align-items-center">
                                        <div class="image has-shadow"><img src="img/project-2.jpg" alt="..." class="img-fluid"></div>
                                        <div class="text">
                                            <h3 class="h4">Project Title</h3><small>Lorem Ipsum Dolor</small>
                                        </div>
                                    </div>
                                    <div class="project-date"><span class="hidden-sm-down">Today at 4:24 AM</span></div>
                                </div>
                                <div class="right-col col-lg-6 d-flex align-items-center">
                                    <div class="time"><i class="fa fa-clock-o"></i>12:00 PM </div>
                                    <div class="comments"><i class="fa fa-comment-o"></i>20</div>
                                    <div class="project-progress">
                                        <div class="progress">
                                            <div role="progressbar" style="width: 60%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Project-->
                        <div class="project">
                            <div class="row bg-white has-shadow">
                                <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                                    <div class="project-title d-flex align-items-center">
                                        <div class="image has-shadow"><img src="img/project-3.jpg" alt="..." class="img-fluid"></div>
                                        <div class="text">
                                            <h3 class="h4">Project Title</h3><small>Lorem Ipsum Dolor</small>
                                        </div>
                                    </div>
                                    <div class="project-date"><span class="hidden-sm-down">Today at 4:24 AM</span></div>
                                </div>
                                <div class="right-col col-lg-6 d-flex align-items-center">
                                    <div class="time"><i class="fa fa-clock-o"></i>12:00 PM </div>
                                    <div class="comments"><i class="fa fa-comment-o"></i>20</div>
                                    <div class="project-progress">
                                        <div class="progress">
                                            <div role="progressbar" style="width: 50%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Project-->
                        <div class="project">
                            <div class="row bg-white has-shadow">
                                <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                                    <div class="project-title d-flex align-items-center">
                                        <div class="image has-shadow"><img src="img/project-4.jpg" alt="..." class="img-fluid"></div>
                                        <div class="text">
                                            <h3 class="h4">Project Title</h3><small>Lorem Ipsum Dolor</small>
                                        </div>
                                    </div>
                                    <div class="project-date"><span class="hidden-sm-down">Today at 4:24 AM</span></div>
                                </div>
                                <div class="right-col col-lg-6 d-flex align-items-center">
                                    <div class="time"><i class="fa fa-clock-o"></i>12:00 PM </div>
                                    <div class="comments"><i class="fa fa-comment-o"></i>20</div>
                                    <div class="project-progress">
                                        <div class="progress">
                                            <div role="progressbar" style="width: 50%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Client Section-->
                <section class="client no-padding-top">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Work Amount  -->
                            <div class="col-lg-4">
                                <div class="work-amount card">
                                    <div class="card-close">
                                        <div class="dropdown">
                                            <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                            <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow">
                                                <a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a>
                                                <a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h3>Work Hours</h3><small>Lorem ipsum dolor sit amet.</small>
                                        <div class="chart text-center">
                                            <div class="text"><strong>90</strong><br><span>Hours</span></div>
                                            <canvas id="pieChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Client Profile -->
                            <div class="col-lg-4">
                                <div class="client card">
                                    <div class="card-close">
                                        <div class="dropdown">
                                            <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                            <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow">
                                                <a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a>
                                                <a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="client-avatar"><img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle">
                                            <div class="status bg-green"></div>
                                        </div>
                                        <div class="client-title">
                                            <h3>Jason Doe</h3><span>Web Developer</span><a href="#">Follow</a>
                                        </div>
                                        <div class="client-info">
                                            <div class="row">
                                                <div class="col-4"><strong>20</strong><br><small>Photos</small></div>
                                                <div class="col-4"><strong>54</strong><br><small>Videos</small></div>
                                                <div class="col-4"><strong>235</strong><br><small>Tasks</small></div>
                                            </div>
                                        </div>
                                        <div class="client-social d-flex justify-content-between"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a><a href="#" target="_blank"><i class="fa fa-twitter"></i></a><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a>
                                            <a href="#" target="_blank"><i class="fa fa-instagram"></i></a><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Total Overdue             -->
                            <div class="col-lg-4">
                                <div class="overdue card">
                                    <div class="card-close">
                                        <div class="dropdown">
                                            <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                            <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow">
                                                <a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a>
                                                <a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h3>Total Overdue</h3><small>Lorem ipsum dolor sit amet.</small>
                                        <div class="number text-center">$20,000</div>
                                        <div class="chart">
                                            <canvas id="lineChart1">                               </canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Feeds Section-->
                <section class="feeds no-padding-top">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Trending Articles-->
                            <div class="col-lg-6">
                                <div class="articles card">
                                    <div class="card-close">
                                        <div class="dropdown">
                                            <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                            <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow">
                                                <a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a>
                                                <a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header d-flex align-items-center">
                                        <h2 class="h3">Trending Articles </h2>
                                        <div class="badge badge-rounded bg-green">4 New </div>
                                    </div>
                                    <div class="card-body no-padding">
                                        <div class="item d-flex align-items-center">
                                            <div class="image"><img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                            <div class="text">
                                                <a href="#">
                                                    <h3 class="h5">Lorem Ipsum Dolor</h3>
                                                </a><small>Posted on 5th June 2017 by Aria Smith.   </small></div>
                                        </div>
                                        <div class="item d-flex align-items-center">
                                            <div class="image"><img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                            <div class="text">
                                                <a href="#">
                                                    <h3 class="h5">Lorem Ipsum Dolor</h3>
                                                </a><small>Posted on 5th June 2017 by Frank Williams.   </small></div>
                                        </div>
                                        <div class="item d-flex align-items-center">
                                            <div class="image"><img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                            <div class="text">
                                                <a href="#">
                                                    <h3 class="h5">Lorem Ipsum Dolor</h3>
                                                </a><small>Posted on 5th June 2017 by Ashley Wood.   </small></div>
                                        </div>
                                        <div class="item d-flex align-items-center">
                                            <div class="image"><img src="img/avatar-4.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                            <div class="text">
                                                <a href="#">
                                                    <h3 class="h5">Lorem Ipsum Dolor</h3>
                                                </a><small>Posted on 5th June 2017 by Jason Doe.   </small></div>
                                        </div>
                                        <div class="item d-flex align-items-center">
                                            <div class="image"><img src="img/avatar-5.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                            <div class="text">
                                                <a href="#">
                                                    <h3 class="h5">Lorem Ipsum Dolor</h3>
                                                </a><small>Posted on 5th June 2017 by Sam Martinez.   </small></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Check List -->
                            <div class="col-lg-6">
                                <div class="checklist card">
                                    <div class="card-close">
                                        <div class="dropdown">
                                            <button type="button" id="closeCard5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                            <div aria-labelledby="closeCard5" class="dropdown-menu dropdown-menu-right has-shadow">
                                                <a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a>
                                                <a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header d-flex align-items-center">
                                        <h2 class="h3">To Do List </h2>
                                    </div>
                                    <div class="card-body no-padding">
                                        <div class="item d-flex">
                                            <input type="checkbox" id="input-1" name="input-1" class="checkbox-template">
                                            <label for="input-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                                        </div>
                                        <div class="item d-flex">
                                            <input type="checkbox" id="input-2" name="input-2" class="checkbox-template">
                                            <label for="input-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                                        </div>
                                        <div class="item d-flex">
                                            <input type="checkbox" id="input-3" name="input-3" class="checkbox-template">
                                            <label for="input-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                                        </div>
                                        <div class="item d-flex">
                                            <input type="checkbox" id="input-4" name="input-4" class="checkbox-template">
                                            <label for="input-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                                        </div>
                                        <div class="item d-flex">
                                            <input type="checkbox" id="input-5" name="input-5" class="checkbox-template">
                                            <label for="input-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                                        </div>
                                        <div class="item d-flex">
                                            <input type="checkbox" id="input-6" name="input-6" class="checkbox-template">
                                            <label for="input-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Updates Section                                                -->
                <section class="updates no-padding-top">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Recent Updates-->
                            <div class="col-lg-4">
                                <div class="recent-updates card">
                                    <div class="card-close">
                                        <div class="dropdown">
                                            <button type="button" id="closeCard6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                            <div aria-labelledby="closeCard6" class="dropdown-menu dropdown-menu-right has-shadow">
                                                <a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a>
                                                <a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <h3 class="h4">Recent Updates</h3>
                                    </div>
                                    <div class="card-body no-padding">
                                        <!-- Item-->
                                        <div class="item d-flex justify-content-between">
                                            <div class="info d-flex">
                                                <div class="icon"><i class="icon-rss-feed"></i></div>
                                                <div class="title">
                                                    <h5>Lorem ipsum dolor sit amet.</h5>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                                                </div>
                                            </div>
                                            <div class="date text-right"><strong>24</strong><span>May</span></div>
                                        </div>
                                        <!-- Item-->
                                        <div class="item d-flex justify-content-between">
                                            <div class="info d-flex">
                                                <div class="icon"><i class="icon-rss-feed"></i></div>
                                                <div class="title">
                                                    <h5>Lorem ipsum dolor sit amet.</h5>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                                                </div>
                                            </div>
                                            <div class="date text-right"><strong>24</strong><span>May</span></div>
                                        </div>
                                        <!-- Item        -->
                                        <div class="item d-flex justify-content-between">
                                            <div class="info d-flex">
                                                <div class="icon"><i class="icon-rss-feed"></i></div>
                                                <div class="title">
                                                    <h5>Lorem ipsum dolor sit amet.</h5>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                                                </div>
                                            </div>
                                            <div class="date text-right"><strong>24</strong><span>May</span></div>
                                        </div>
                                        <!-- Item-->
                                        <div class="item d-flex justify-content-between">
                                            <div class="info d-flex">
                                                <div class="icon"><i class="icon-rss-feed"></i></div>
                                                <div class="title">
                                                    <h5>Lorem ipsum dolor sit amet.</h5>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                                                </div>
                                            </div>
                                            <div class="date text-right"><strong>24</strong><span>May</span></div>
                                        </div>
                                        <!-- Item-->
                                        <div class="item d-flex justify-content-between">
                                            <div class="info d-flex">
                                                <div class="icon"><i class="icon-rss-feed"></i></div>
                                                <div class="title">
                                                    <h5>Lorem ipsum dolor sit amet.</h5>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                                                </div>
                                            </div>
                                            <div class="date text-right"><strong>24</strong><span>May</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Daily Feeds -->
                            <div class="col-lg-4">
                                <div class="daily-feeds card">
                                    <div class="card-close">
                                        <div class="dropdown">
                                            <button type="button" id="closeCard7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                            <div aria-labelledby="closeCard7" class="dropdown-menu dropdown-menu-right has-shadow">
                                                <a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a>
                                                <a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <h3 class="h4">Daily Feeds</h3>
                                    </div>
                                    <div class="card-body no-padding">
                                        <!-- Item-->
                                        <div class="item">
                                            <div class="feed d-flex justify-content-between">
                                                <div class="feed-body d-flex justify-content-between">
                                                    <a href="#" class="feed-profile"><img src="img/avatar-5.jpg" alt="person" class="img-fluid rounded-circle"></a>
                                                    <div class="content">
                                                        <h5>Aria Smith</h5><span>Posted a new blog </span>
                                                        <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>
                                                    </div>
                                                </div>
                                                <div class="date text-right"><small>5min ago</small></div>
                                            </div>
                                        </div>
                                        <!-- Item-->
                                        <div class="item">
                                            <div class="feed d-flex justify-content-between">
                                                <div class="feed-body d-flex justify-content-between">
                                                    <a href="#" class="feed-profile"><img src="img/avatar-2.jpg" alt="person" class="img-fluid rounded-circle"></a>
                                                    <div class="content">
                                                        <h5>Frank Williams</h5><span>Posted a new blog </span>
                                                        <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>
                                                        <div class="CTAs"><a href="#" class="btn btn-xs btn-secondary"><i class="fa fa-thumbs-up"> </i>Like</a><a href="#" class="btn btn-xs btn-secondary"><i class="fa fa-heart"> </i>Love    </a></div>
                                                    </div>
                                                </div>
                                                <div class="date text-right"><small>5min ago</small></div>
                                            </div>
                                        </div>
                                        <!-- Item-->
                                        <div class="item clearfix">
                                            <div class="feed d-flex justify-content-between">
                                                <div class="feed-body d-flex justify-content-between">
                                                    <a href="#" class="feed-profile"><img src="img/avatar-3.jpg" alt="person" class="img-fluid rounded-circle"></a>
                                                    <div class="content">
                                                        <h5>Ashley Wood</h5><span>Posted a new blog </span>
                                                        <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>
                                                    </div>
                                                </div>
                                                <div class="date text-right"><small>5min ago</small></div>
                                            </div>
                                            <div class="quote has-shadow"> <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Over the years.</small></div>
                                            <div class="CTAs pull-right"><a href="#" class="btn btn-xs btn-secondary"><i class="fa fa-thumbs-up"> </i>Like</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Recent Activities -->
                            <div class="col-lg-4">
                                <div class="recent-activities card">
                                    <div class="card-close">
                                        <div class="dropdown">
                                            <button type="button" id="closeCard8" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                            <div aria-labelledby="closeCard8" class="dropdown-menu dropdown-menu-right has-shadow">
                                                <a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a>
                                                <a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <h3 class="h4">Recent Activities</h3>
                                    </div>
                                    <div class="card-body no-padding">
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-4 date-holder text-right">
                                                    <div class="icon"><i class="icon-clock"></i></div>
                                                    <div class="date"> <span>6:00 am</span><br><span class="text-info">6 hours ago</span></div>
                                                </div>
                                                <div class="col-8 content">
                                                    <h5>Meeting</h5>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-4 date-holder text-right">
                                                    <div class="icon"><i class="icon-clock"></i></div>
                                                    <div class="date"> <span>6:00 am</span><br><span class="text-info">6 hours ago</span></div>
                                                </div>
                                                <div class="col-8 content">
                                                    <h5>Meeting</h5>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-4 date-holder text-right">
                                                    <div class="icon"><i class="icon-clock"></i></div>
                                                    <div class="date"> <span>6:00 am</span><br><span class="text-info">6 hours ago</span></div>
                                                </div>
                                                <div class="col-8 content">
                                                    <h5>Meeting</h5>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                                                </div>
                                            </div>
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
    <script src="js/charts-home.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
</body>

</html>