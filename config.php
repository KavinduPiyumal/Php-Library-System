<?php

	ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);
	error_reporting(E_ALL);
	date_default_timezone_set("Europe/London");

	define('SITE_NAME', 'Online Library Management System');
	define('SITE_TAG', '');
	define('PRODUCT_NAME', 'Library');


	define("TO_EMAIL1", "");
	define("PHONE", "+");
	define("FAX", "");
	define("ADDRESS", "");

	define("BASE_URL", "");
	define("TODAY", date("Y-m-d h:i:s"));

	define("CURRENCY", "$ ");

	define("DB_SERVER", "localhost");
	define("DB_USERNAME", "root");
	define("DB_PASSWORD", "");
	define("DB_NAME", "db_ols");		


	include 'functions/main.php';
	session_start();
	
	$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	if (mysqli_connect_errno()){

  		echo "Failed to connect to MySQL: " . mysqli_connect_error();

  	}


?>