<?php 
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 0); 
include 'includes/strings.php';
include 'includes/functions.php';
include 'includes/getdata.php';
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>
		<?php echo $sn; ?> - <?php echo $ss; ?>
	</title>
<link rel="icon" type="image/png" href="images/logo/<?php echo $sicon ; ?>"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/mdb.css">
<link rel="stylesheet" type="text/css" href="css/mdb.min.css">


  <!-- Font Awesome --><link rel="stylesheet" type="text/css" href="css/style.css">


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">

<style type="text/css">
@media (max-width:801px) {
.navbar  {
  min-height: 12% !important;
}

}
a {

	color: white !important;
}
.sn {

	font-size:23px !important;
	/*font-weight:bold;*/
}
.<?php echo $dc; ?>{
	background-color: <?php echo $dchex; ?> !important; 
}
.ig{
    border-color:<?php echo $dchex; ?> !important;
    border-width: 3px !important;
    /*border-style:dotted !important;*/
}
</style>
</head>
<?php 
  $page = $_GET['page'];
?>


<body class="fixed-sn " style="background-color:  <?php echo $mainbg; ?> !important;">

  <!--Double navigation-->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark <?php echo $dc; ?>" style="">
  <a class="navbar-brand" href="?"><?php echo $sn; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php if($page == ''|| $page == 'index'){ ?> active <?php } ?>">
        <a class="nav-link" href="?">Home
          
         
        </a>
      </li>
      <?php if($_SESSION['loggedin']){ ?> 

      <li class="nav-item ">
        <a class="nav-link" href="?page=logout">Log Out</a>
      </li>
       <?php }else{?>
      <li class="nav-item <?php if($page == 'register'){ ?> active <?php } ?>">
        <a class="nav-link" href="?page=register">Register</a>
      </li>
      <li class="nav-item <?php if($page == 'login'){ ?> active <?php } ?>">
        <a class="nav-link" href="?page=login">Login</a>
      </li>
    <?php } ?>

    </ul>
    <span class="navbar-text white-text">
      <?php echo $ss; ?>
    </span>
  </div>
</nav>
  </header>
  <!--/.Double navigation-->

  <!--Main Layout-->
  <main class="mx-0 px-0 py-0" style="min-height: 84vh;">
  <?php 




  if(isset($_SESSION['ut'])){
    $t = $_SESSION['ut'];
    if($t == 'a'){

      include 'includes/logout.php';

    }else{




      $loginid = @SESSION['loginid'];
  if(isset($page)){

    if($page == 'home' || $page == '' || !file_exists('includes/'.$page.'.php')){

      if(isset($loginid)){  
      include 'includes/home.php';
      }else{  
      include 'includes/landing.php';
      }

    }else{

      include 'includes/'.$page.'.php';

    }



  }else{
    if($_SESSION['loggedin']){
      include 'includes/home.php';
    }else{
      include 'includes/landing.php';
    }

    }





    }}else{

  $loginid = @SESSION['loginid'];
  if(isset($page)){

    if($page == 'home' || $page == '' || !file_exists('includes/'.$page.'.php')){

      if(isset($loginid)){  
      include 'includes/home.php';
      }else{  
      include 'includes/landing.php';
      }

    }else{

      include 'includes/'.$page.'.php';

    }



  }else{
    if($_SESSION['loggedin']){
      include 'includes/home.php';
    }else{
      include 'includes/landing.php';
    }

    }
  }
  

  ?>
  </main>
  <!--Main Layout-->

  <!-- Footer -->
<footer class="page-footer font-small <?php echo $dc; ?>">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© <?php echo date("Y"); ?> Copyright:
    <a href="#"> TUK clearance</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

</body>





<!-- end of project -->


<!-- JS IMPORTS -->

  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>

  <!-- END OF JS IMPORTS -->

  <!-- JS RAW START -->
<script type="text/javascript">
// SideNav Button Initialization
$(".button-collapse").sideNav();
// SideNav Scrollbar Initialization
var sideNavScrollbar = document.querySelector('.custom-scrollbar');
Ps.initialize(sideNavScrollbar);

</script>



<!-- JS RAW END -->

</body>



</html>