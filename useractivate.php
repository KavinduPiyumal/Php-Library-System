<?php
if(isset($_POST['id']) && isset($_POST['status'])){
	include("config.php");
	$id = $_POST['id'];
	$status = $_POST['status'];		
	
	if($status==1){
		mysqli_query($conn, "UPDATE user set is_valid='1' where user_id='$id'");
	}else{
		mysqli_query($conn, "UPDATE user set is_valid='0' where user_id='$id'");
	}
	
}

?>