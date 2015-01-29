<?php
	include("connection.php");
	
	if(isset($_POST['create'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
			
		$sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
		mysqli_query($connection, $sql);
			
		header('Location: admin_user.php');
	}
?>