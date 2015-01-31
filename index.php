<?php require_once("includes/session.php");?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php
	if(isset($_POST['login'])){
	$user = $_POST['id'];
	$pass = $_POST['password'];
	
	$format = "$2a$10$";
	$hash   = "HaloHaloHaloHaloHalo22";
	$salt   = $format . $hash;
	
	$new_pass = crypt($pass, $salt);
	
	$sql = "SELECT * FROM msuser WHERE id = '$user'";
	$result = mysqli_query($connection, $sql);
	
	if(mysqli_num_rows($result)){
		$password = $new_pass;
		$rows = mysqli_fetch_assoc($result);
		if($password == $rows['password']){
			$_SESSION['login'] = $user;
			setcookie('fail', null, time()-300);
			//header('Location: home.php');
			if($rows['status']=="Admin"){header('Location: modules/manage_user.php');}
			else if($rows['status']=="Lecture"){header('Location: modules/home_lecturer.php');}
			else if($rows['status']=="Student"){header('Location: modules/home_student.php');}	
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
	}
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <title>Infinity e-Learning</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <div id="login">
        <div id="login-header"><span>Infinity e-Learning Management System</span></div>
		<div id="login-form">
			<?php
				if(isset($_COOKIE['fail'])){
				echo $_COOKIE['pesan'];
				}
			?>
			<form action="index.php" method="POST">
				<input type="text" name="id" placeholder="Student ID"/>
                <input type="password" name="password" placeholder="Password" />
                <input type="submit" name="login" value="Login" />
            </form>			
        </div>
    </div>
    <div id="footer">Copyright Infinity 2015. All Rights Reserved.</div>
</body>
</html>
