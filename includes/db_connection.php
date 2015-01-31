<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db_name = "infinity_learning";

	$connection = mysqli_connect($host, $user, $pass, $db_name);
	if(mysqli_connect_errno()){
		die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
	}
?>