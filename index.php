<!DOCTYPE html>
<html>
  
  <head>
  <?php require_once 'src/include/head.php';
    session_start();
    if(!isset($_SESSION["user"])){
      header("location:src/login/login.php");
    }
  ?>
  </head> 
  <body>
    <div class="page">

      <div id="nav">
      <?php  include 'src/include/navbar.php';  ?>
      </div>

      <div class="page-content d-flex align-items-stretch">
        <div id="main">
          <?php  include 'src/include/sidebar.php'; ?>
        </div>
      
        <div id="content">
          <h1 >  AQUÍ SE CARGARÁ PRINCIPAL.PHP</h1>
          <h2>    Con cosas bonitas y mágicas</h2>
        </div>

      </div>
      <footer>
        <?php  include 'src/include/footer.php'; ?>
      </footer>

    </div>
   
    
  </body>
</html>
