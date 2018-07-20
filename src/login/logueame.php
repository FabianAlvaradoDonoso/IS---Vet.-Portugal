<?php

  session_start();
  $conexion = mysqli_connect("localhost", "root", "", "1329999");

  if(isset($_POST["user"]) && isset($_POST["pass"])){
      $user = mysqli_real_escape_string($conexion, $_POST["user"]);
      $pass = mysqli_real_escape_string($conexion, $_POST["pass"]);
      $sql="SELECT user, cargo FROM usuarios 
      WHERE user='$user' AND pass='$pass'";
      $result = mysqli_query($conexion,$sql);
      $num_row = mysqli_num_rows($result);
      if($num_row =="1") {

        $data = mysqli_fetch_array($result);
        $_SESSION["user"] = $data["user"];
        $_SESSION["cargo"] = $data["cargo"];
      }
      else {
          echo "error";
      }
  }

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  header("location: login.php");
  }
else
{
  echo '<script language="javascript">alert("Bienvenido!!"); window.location="index.php";</script>'; 
}


  //function LoginSession($user, $pass)
  //{
    //  $base = new PDO("mysql:host=localhost; dbname=1329999", "root", "");
      //$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //$base->exec("SET CHARACTER SET utf8");    
      //$sql_total="SELECT * FROM usuarios WHERE user = '". $user ."' AND pass = '" . $pass ."' ";
      //$resultado = $base->prepare($sql_total);
      //$resultado->execute(array());
      //$numResultados=$resultado->rowCount();
     // if($numResultados == 1){
      //  echo '<script language="javascript">alert("Bienvenido!!"); window.location="index.php";</script>'; 
     // }
      //else{
       // echo '<script language="javascript">alert("No se encontro usuario o la contraseña es incorrecta, intente nuevamente!!"); window.location="login.php";</script>';
     // }

  //}


  //$consulta=LoginSession($_POST["user"], $_POST["pass"]);


  //if(isset($_POST["user"]) && isset($_POST["pass"])){}
    

  ?>


</html>