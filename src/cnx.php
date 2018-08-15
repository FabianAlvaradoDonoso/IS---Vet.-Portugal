<?php

$conexion = mysqli_connect("localhost", 'vetportu_inventa', 'vetportugal2018', 'vetportu_vetportugalInv');

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
?>