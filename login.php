<?php
    session_start();
if(isset($_SESSION["user"])){
    header("Location:index.php");
}

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
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<style type="text/css">
    .login-page {
        position: relative;
    }
    
    .login-page::before {
        content: '';
        width: 100%;
        height: 100%;
        display: block;
        z-index: -1;
        background: url(img/imagen.jpg);
        background-size: cover;
        -webkit-filter: blur(10px);
        filter: blur(10px);
        z-index: 1;
        position: absolute;
        top: 0;
        right: 0;
    }
    
    .login-page .container {
        min-height: 100vh;
        z-index: 999;
        padding: 20px;
        position: relative;
    }
    
    .login-page .form-holder {
        width: 100%;
        border-radius: 5px;
        overflow: hidden;
        margin-bottom: 50px;
    }
    
    .login-page .form-holder .info,
    .login-page .form-holder .form {
        min-height: 70vh;
        padding: 40px;
        height: 100%;
    }
    
    .login-page .form-holder div[class*='col-'] {
        padding: 0;
    }
    
    .login-page .form-holder .info {
        background: rgb(9, 181, 255);
        color: #fff;
    }
    
    .login-page .form-holder .info h1 {
        font-size: 2.5em;
        font-weight: 600;
    }
    
    .login-page .form-holder .info p {
        font-weight: 300;
    }
    
    .login-page .form-holder .form .form-group {
        position: relative;
        margin-bottom: 30px;
    }
    
    .login-page .form-holder .form .content {
        width: 100%;
    }
    
    .login-page .form-holder .form form {
        width: 100%;
        max-width: 400px;
    }
    
    .login-page .form-holder .form #login,
    .login-page .form-holder .form #register {
        margin-bottom: 20px;
        cursor: pointer;
    }
    
    .login-page .form-holder .form a.forgot-pass,
    .login-page .form-holder .form a.signup {
        font-size: 0.9em;
        color: rgb(9, 181, 255);
    }
    
    .login-page .form-holder .form small {
        color: #aaa;
    }
    
    .login-page .form-holder .form .terms-conditions label {
        cursor: pointer;
        color: #aaa;
        font-size: 0.9em;
    }
    
    .login-page .copyrights {
        width: 100%;
        z-index: 9999;
        position: absolute;
        bottom: 0;
        left: 0;
        color: #fff;
    }
    
    @media (max-width: 991px) {
        .login-page .info,
        .login-page .form {
            min-height: auto !important;
        }
        .login-page .info {
            padding-top: 100px !important;
            padding-bottom: 100px !important;
        }
    }

    input.input-material~label.active {
    font-size: 0.8rem;
    top: -10px;
    color: #007bff;
    }
    input.input-material:focus {
    border-color: #007bff;
    }
}
</style>

<body>
    <div class="page login-page">
        <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow">
                <div class="row">
                    <!-- Logo & Information Panel-->
                    <div class="col-lg-6">
                        <div class="info d-flex align-items-center">
                            <div class="content">
                                <div class="logo">
                                    <h1>VetPortugal</h1>
                                </div>
                                <p>Centro veterinario integral.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Form Panel    -->
                    <div class="col-lg-6 bg-white">
                        <div class="form d-flex align-items-center">
                            <div class="content">
                                <form method="post" action="logueame.php" class="form-validate">
                                    <div class="form-group">
                                        <input id="user" type="text" name="user" required data-msg="Por favor, ingrese su Nombre de Usuario" class="input-material">
                                        <label for="user" class="label-material">Nombre Usuario</label>
                                    </div>
                                    <div class="form-group">
                                        <input id="pass" type="password" name="pass" required data-msg="Por favor, ingrese su contraseña" class="input-material">
                                        <label for="pass" class="label-material">Contraseña</label>
                                    </div><input type="submit" name="login" id="login" value="Login" class="btn btn-success" onclick="Saltar(this.form.pass.value)">
                                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyrights text-center">
            <p>Diseñado por <a href="register.html" class="external">B&D</a> y <a href="https://bootstrapious.com" class="external">Bootstrap</a>
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            </p>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.js"></script>
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