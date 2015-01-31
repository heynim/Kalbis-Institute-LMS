<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php 
	if(isset($_SESSION['login']) ) {
		$user = $_SESSION['login'];
?>
<?php
	if(isset($_POST['submit'])){
		if(empty($errors)){ 
		
		$id = $_GET["id"];
		$name= $_POST["name"];
		$status= $_POST["status"];
		$email= $_POST["email"];
		$contact= $_POST["contact"];
		
		$query = "UPDATE msuser SET name = '$name', status = '$status',contact = '$contact',email = '$email' WHERE id='$id'";
		$result = mysqli_query ($connection, $query);
		
		if($result && mysqli_affected_rows($connection)== 1){
			$_SESSION["message"] ="User Update.";
			redirect_to("manage_user.php");
		} else{
			$_SESSION["message"]="User Update Failed.";
		}
	}
		}else{
		}
?>
<?php
	$result = mysqli_query($connection,"SELECT * FROM msuser where id = '$user'");
	while($row = mysqli_fetch_array($result)) // fetch untuk ngambil araay result
	{
		$id = $row[0];
		$password = $row[1]; 
		$name = $row[2];
		$contact = $row[3];
		$email = $row[4];
		$status = $row[5];
	}
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
	<script src="../js/jquery-1.11.2.js"></script>
</head>
<body>
    <div id="top">
        <div id="home-link"><a href="#">Infinity e-Learning</a></div>
		<div id="header">
			<?php echo waktu() . ': ' . $row['status'] . ', ' . $row['name']; ?>
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
                </div>
            </div>
			<?php
					}
				?>
            <div id="nav">
                <ul>
                    <li><a href="edit_profile.php">Edit Profile</a></li>
                    <li><a href="logout.php">Sign Out</a></li>
                </ul>
            </div>
        </div>
        <div id="right">
            <div id="select">
                <div id="select-head"><span>Edit User</span></div>
                <div id="select-body">
					<form action="edit_user.php" method="POST">
					<table>
					<tr>
						<td><div id="profile-img"><img src="#"/></div></td>
					</tr>
					<tr>
						<td>ID:</td>
						<td><input type="text" name="id" value="<?php echo $id; ?>" disabled /></td>
					</tr>
					<tr>
						<td>Name:</td>
						<td><input type="text" name="name" value="<?php echo $name; ?>"/></td>
					</tr>
					<tr>
						<td>Status:</td>
						<td><select id="statusnya" name="status">
						<option value="0" disabled>Please Select</option>
						<option value="Admin">Admin</option>
						<option value="Lecture">Lecture</option>
						<option value="Student">Student</option>
						</select></td>
						<script>
							$(document).ready(function(){
								$('#statusnya').val('<?php echo $status; ?>'); 
							}); 
						</script>
					</tr>
					<tr>
						<td>Contact:</td>
						<td><input type="text" name="contact" value="<?php echo $contact; ?>"/></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><input type="text" name="email" value="<?php echo $email; ?>"/></td>
					</tr>
					<tr>
						<td><input type="submit" name="submit" value="Edit User" /></td>
					</tr>
					</table>
				</form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
}else {
	header('Location: ../index.php');
}
?>