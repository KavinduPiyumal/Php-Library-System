<!DOCTYPE html>
<?php include 'config.php';?>
<?php 
	session_start();
	if(ISSET($_SESSION['admin_id'])){
		header('location:home.php');
	}
	if(isset($_POST['register'])){
		$status = userRegistration($conn);
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

<body>
  <div class="container" style="margin-top:70px;">
    <div class="row">
      <div class="col col-lg-4">
      </div>
      <div class="col col-lg-4 well regform">
        <br />
        <div class="logowrap">
          <img src="images/logo.png" alt="" width="100" height="auto">
        </div>
        <br />
        <h4 class="text-center">User Registration</h4>
        <hr style="border:1px solid #d3d3d3; width:100%;" />
        <form method="POST" action="" enctype="multipart/form-data">
          <div id="" class="form-group">
            <label class="control-label">First Name:</label>
            <input type="text" class="form-control" id="username" name="firstname" placeholder="First Name" required />
          </div>
          <div id="" class="form-group">
            <label class="control-label">Last Name:</label>
            <input type="text" class="form-control" id="username" name="lastname" placeholder="Last Name" required />
          </div>
          <div id="" class="form-group">
            <label class="control-label">Email:</label>
            <input type="text" class="form-control" id="username" name="email" placeholder="Email" required />
          </div>
          <div id="" class="form-group">
            <label class="control-label">Password:</label>
            <input type="password" class="form-control" id="" name="password" placeholder="Password" required />
          </div>
          <div id="" class="form-group">
            <label class="control-label">Confirm Password:</label>
            <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" required />
          </div>
          <br />
          <div class="form-group">
            <label class="control-label" style="color: red;"><?php if(!empty($status)){ echo $status; } ?></label>
          </div>
          <div class="form-group">
            <button type="submit" name="register" id="" class="btn btn-primary btn-block">Register Now</button>
          </div>
          <div class="">
            <a href="index.php">Login</a>
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