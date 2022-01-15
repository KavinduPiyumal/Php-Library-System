<!DOCTYPE html>
<?php include 'config.php';?>
<?php 
	session_start();
	if(ISSET($_SESSION['admin_id'])){
		header('location:admin-dashboard.php?menu=dashboard');
	}
	if(isset($_SESSION['user_id'])){
		header('location:dashboard.php');
	}
	if(isset($_POST['login'])){
		$status = login($conn);
	}

?>
<html lang="eng">

<head>
  <title>Library System</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" href="images/logo.ico" type="images/logo.ico">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body style="background-color:#d3d3d3;">

  <div class="container logcon" style="margin-top:70px;">
    <div class="row">
      <div class="col col-lg-4">
      </div>
      <div class="col col-lg-4 well loginform">
        <br />
        <div class="logowrap">
          <img src="images/logo.png" alt="" width="100" height="auto">
        </div>
        <br />
        <h4 class="text-center">Welocome to Omar's Library</h4>
        <hr style="border:1px solid #d3d3d3; width:100%;" />
        <form method="post" action="" enctype="multipart/form-data">
          <div id="" class="form-group">
            <label class="control-label">Username:</label>
            <input name="username" type="text" class="form-control" id="" required />
          </div>
          <div id="" class="form-group">
            <label class="control-label">Password:</label>
            <input type="password" name="password" class="form-control" id="" required />
          </div>
          <div class="form-group">
            <label class="control-label" style="color: red;"><?php if(!empty($status)){ echo $status; } ?></label>
          </div>
          <div class="form-group">
            <button type="submit" id="" name="login" class="btn btn-primary btn-block"> Login</button>
          </div>
          <div class="">
            <a href="register.php">Create New Account</a>
          </div>
        </form>
        <div id="result"></div>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
      </div>
    </div>
    <div class="col col-lg-4">
    </div>
  </div>

</body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/login.js"></script>

</html>