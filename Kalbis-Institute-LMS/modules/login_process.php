<?php
	session_start();
	include ("../includes/db_connection.php");
	include ("../includes/functions.php");
	include ("../includes/session.php");
	
	$user = $_POST['id'];
	$pass = $_POST['password'];
	
	$format = "$2a$10$";
	$hash   = "HaloHaloHaloHaloHalo22";
	$salt   = $format . $hash;
	
	$new_pass = crypt($pass, $salt);
	
	$sql = "SELECT * FROM msuser WHERE id = '$user'";
	$result = mysqli_query($connection, $sql);
	
	if(mysqli_num_rows($result)){
		$password = $new_pass; //$pass; //pass_crypt($pass);
		$rows = mysqli_fetch_assoc($result);
		if($password == $rows['password']){
			$_SESSION['login'] = $user;
			setcookie('fail', null, time()-300);
			header('Location: home.php');
				
		}else {
			setcookie("pesan", "ID atau Password Anda salah.", time()+300);
			setcookie('fail', 1, time()+300);
			header('Location: index.php');
		}
	}else {
	setcookie("pesan", "ID atau Password Anda salah.", time()+300);
	setcookie('fail', 1, time()+300);
	header('Location: index.php');
	}
?>