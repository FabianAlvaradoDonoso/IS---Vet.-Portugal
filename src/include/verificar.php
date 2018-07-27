<?php 
session_start();
$password;
if($_POST['password']){
    if($_SESSION['pass'] == $password){
        header("location: ../../src/pages/Configuraciones.php");
    }else{
        header("location: ../../index.php");
    }
}


?>

<form style="margin:12px;" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input id="password" type="password" name="password">
<input type="submit" name="Submit" value="Login!"></form>
