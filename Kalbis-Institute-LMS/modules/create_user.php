<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php
	if(isset($_POST['submit'])){
	
		//validations
		$required_fields = array("id","password");
		validate_presences($required_fields);
		
		$fields_with_max_lengths = array ("id" => 30);
		validate_max_lengths($fields_with_max_lengths);
		
		if(empty($errors)){
		
		//perform create
		
		$id = $_POST["id"];
		$password= password_encrypt($_POST["password"]);
		$name= $_POST["name"];
		$status= $_POST["status"];
		$email= $_POST["email"];
		$contact= $_POST["contact"];
		
		$query = "INSERT INTO msuser (";
		$query .= "id, password, name, contact, email, status";
		$query .= ") VALUES (";
		$query .= " '{$id}','{$password}','{$name}','{$contact}','{$email}','{$status}'";
		$query .= ")";
		$result = mysqli_query ($connection, $query);
		
		if($result){
			$_SESSION["message"] ="User Created.";
			redirect_to("manage_user.php");
		} else{
			$_SESSION["message"]="User Creation Failed.";
		}
	}
		}else{
		} //end: if(isset($_POST['submit']))
?>

<?php $layout_context="admin"; ?>
<?php include("../includes/layouts/header.php");?>
<?php 
	if(isset($_SESSION['login']) ) {
		$user = $_SESSION['login'];
?>
<?php 
					$sql = "SELECT * FROM msuser WHERE id = '$user'";
					$result = mysqli_query($connection, $sql);
					if($row = mysqli_fetch_array($result)) { 
				?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Infinity e-Learning</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div id="top">
        <div id="home-link"><a href="home.php">Infinity e-Learning</a>
		<a href="">
		<?php 
			echo waktu();
			echo ': ';
			echo $row['status'];
			echo ', ';
			echo $row['name'];
		?>
		</a>
		</div>
	</div>
		<div id="main">
        <div id="left">
            <div id="profile">
                <div id="profile-img"><img src="#"/></div>
                <div id="profile-name"><?php echo $row['name']; ?></div>
                <div id="profile-desc">
					<div>Status: <?php echo $row['status']; ?> </div>
					<div>Contact No: <?php echo $row['contact']; ?> </div>
					<div>Email: <?php echo $row['email']; ?></div>
				<?php
					}
				?>
                </div>
            </div>
            <div id="nav">
                <ul>
                    <li><a href="edit_profil.php">Edit Profile</a></li>
                    <li><a href="logout.php">Sign Out</a></li>
                </ul>
            </div>
        </div>
        <div id="right">
            <div id="select">
                <div id="select-head"><span>Create User</span></div>
                <div id="select-body">
					<form action="create_user.php" method="POST">
						<table>
						<tr>
							<td><input type="text" name="id" value="" placeholder="ID"/></td>
						</tr>
						<br />
						<tr>
							<td><input type="text" name="name" value="" placeholder="Full Name"/><td>
						</tr>
						<tr>
							<td><input type="text" name="status" value="" placeholder="Status"/></td>
						</tr>
						<tr>
							<td><input type="text" name="contact" value="" placeholder="Contact"/></td>
						</tr>
							<td><input type="text" name="email" value="" placeholder="Email"/></td>
						</tr>
							<td><input type="password" name="password" value="" placeholder="Password"/></td>
						</tr>
						<tr>
							<td><input type="submit" name="submit" value="Create User" /></td>
							<td><a href="manage_user.php">Cancel</a></td>
						</tr>
						</table>
					</form>
					<br />
					
				</div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
}else {
	echo "Anda Harus Login Dulu.";
}
?>
<?php include("../includes/layouts/footer.php"); ?>