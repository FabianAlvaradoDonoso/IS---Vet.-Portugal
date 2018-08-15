<!DOCTYPE html>
<html>
<?php

require_once '../include/head.php';

session_start();
if(isset($_SESSION["user"])){
header("location:../../index.php");
}

?>
<!--Estilo-->
<link rel="stylesheet" href="../../public/css/style.sea.css" id="theme-stylesheet">

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
                                    <h1>Vet<strong>Portugal</strong></h1>
                                </div>
                                <p>Control de Inventario.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Form Panel    -->
                    <div class="col-lg-6 bg-white">
                        <div class="form d-flex align-items-center">
                            <div class="content">
                                <form method="post" action="logueame.php" class="form-validate">
                                    <div class="form-group">
                                        <input id="user" type="text" name="user" placeholder="Usuario" required data-msg="Por favor, ingrese su Nombre de Usuario" class="input-material">
                                        <!--label for="user" class="label-material">Nombre Usuario</label-->
                                    </div>
                                    <div class="form-group">
                                        <input id="pass" type="password" name="pass" placeholder="Contraseña" required data-msg="Por favor, ingrese su contraseña" class="input-material">
                                        <!--label for="pass" class="label-material">Contraseña</label-->
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
            <p>Diseñado por <a href="register.html" class="external">B&G</a> y <a href="https://bootstrapious.com" class="external">Bootstrap      </a>Beta v1.3.0       
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            </p>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="../../vendor/jquery/jquery.js"></script>
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/popper.js/umd/popper.min.js">
    </script>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendor/jquery.cookie/jquery.cookie.js">
    </script>
    <script src="../../vendor/chart.js/Chart.min.js"></script>
    <script src="../../vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="../../public/js/front.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/solid.css" integrity="sha384-S2gVFTIn1tJ/Plf+40+RRAxBCiBU5oAMFUJxTXT3vOlxtXm7MGjVj62mDpbujs4C" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/regular.css" integrity="sha384-QNorH84/Id/CMkUkiFb5yTU3E/qqapnCVt6k5xh1PFIJ9hJ8VfovwwH/eMLQTjGS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/brands.css" integrity="sha384-SYNjKRRe+vDW0KSn/LrkhG++hqCLJg9ev1jIh8CHKuEA132pgAz+WofmKAhPpTR7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/fontawesome.css" integrity="sha384-0b7ERybvrT5RZyD80ojw6KNKz6nIAlgOKXIcJ0CV7A6Iia8yt2y1bBfLBOwoc9fQ" crossorigin="anonymous">
</body>

</html>

<script>
    $(document).ready(function() {
        $('login').click(function( {
            var user = ('#user').val();
            var pass = ('#pass').val();
            if($.trim(user).length > 0 && $.trim(pass).lenght > 0){
                $.ajax({
                    url:"logueame.php",
                    method:"POST",
                    data:{user:user,pass:pass},
                    cache: "false",
                    beforeSend:function() {
                        $('#login').val("Conectando");
                    },
                    succes:function(data) {
                        $('#login').val("Login");
                        if (data=="1") {
                            $(location).attr('href,'index.php');

                        }
                        else {
                            $("#result").html("<div class='alert alert-dismissible alert-danger'>
                            <button type='button' class='close' data-dismiss='alert'>
                            &times;</button><strong>ERROR</strong>
                            credenciales incorrectas.</div>");                          
                        }
                    }
                });
            }

        }));
    });
</script>