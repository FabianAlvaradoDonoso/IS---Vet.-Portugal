<?php

session_start();
$conexion = mysqli_connect("localhost", "root", "", "vetportugal");


  if(isset($_POST["user"]) && isset($_POST["pass"])){
      $user = mysqli_real_escape_string($conexion, $_POST["user"]);
      $pass = mysqli_real_escape_string($conexion, $_POST["pass"]);
      $sql="SELECT user, cargo, nombre FROM usuarios 
      WHERE user='$user' AND pass='$pass'";
      $result = mysqli_query($conexion,$sql);
      $num_row = mysqli_num_rows($result);
      if($num_row =="1") {

        $data = mysqli_fetch_array($result);
        $_SESSION["user"] = $data["user"];
        $_SESSION["cargo"] = $data["cargo"];
        $_SESSION["nombre"] = $data["nombre"];
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
  header("location: ../../index.php"); 
}
  ?>


</html>