<!DOCTYPE html>
<?php include 'config.php';?>
<?php 
if(!isset($_SESSION['admin_id'])){
	header('location:index.php');
}

?>
<html lang="eng">

<head>
  <title>Library System</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" href="images/logo.ico" type="images/logo.ico">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
</head>

<body style="background-color:#d3d3d3;">
  <section class="navheader">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-xs-2">
          <img src="images/logo.png" width="60px" height="60px" />
        </div>
        <div class="col-lg-9 col-xs-10">
          <div class="h1wrap">
            <h1 class="text-center">Omar's Library System</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="dashboard-wrap">
    <div class="container-fluid">
      <div class="row">
        <?php include("includes/inc.admin-sidebar.php"); ?>
        <?php 
					if(isset($_GET['menu'])){
								$menu=$_GET['menu'];
								include("includes/inc.".$menu.".php");
							}else{
								include("includes/inc.admin-dashboard.php");
							}

						?>

      </div>
    </div>
  </section>
  <nav class="navbar text-center navbar-default">
    <label class="copyright">Omar's Library &copy; All rights reserved 2021</label>
  </nav>
</body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/login.js"></script>
<script src="js/sidebar.js"></script>

</html>