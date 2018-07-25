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
    <!--PAGINA-->
    <div class="page">
     <!--NAVBAR--> 
    <div class="header">
    <?php  include 'src/include/navbar.php';  ?>
    </div><!--navbar-->
    
      <div class="page-content d-flex align-items-stretch">
      
      <!--SIDEBAR-->    
      <?php  include 'src/include/sidebar.php'; ?>

      <!--CONTENIDO-->
      <div class="content-inner">
      <?php include 'src/pages/Principal.php'?>

      <!--FOOTER-->      
      <?php  include 'src/include/footer.php'; ?>
      </div><!--class Content inner...-->
        
      </div><!--class Page content...-->
     
    </div><!-- class PAGE--> 
    
  </body>
</html>
