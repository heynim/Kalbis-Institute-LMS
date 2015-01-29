<?php 
	session_start();
	include("connection.php");
	
	$sql = "DELETE FROM user WHERE username";
	$result = mysqli_query ($connection, $sql);
	
	if($result && mysqli_affected_rows($connection)==1){
		$_SESSION["message"] ="User deleted.";
		redirect_to("admin_user.php");
	}else{
		$_SESSION["message"] ="User deletion failed.";
		header('Location: admin_user.php');
	}
?>