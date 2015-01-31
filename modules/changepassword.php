<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php 
	if(isset($_SESSION['login']) ) {
		$user = $_SESSION['login'];
?>
<?php
	if(!isset($_POST['submit']))
	{
		//header('Location:../index.php');
	}
	else
	{
		$id = $_SESSION['login'];
	}
	
	$id = "";
	$old = $_POST['oldpass'];
	$new = $_POST['newpass'];
	$confirm = $_POST['confirmpass'];
	
	if($old == "" || $new == "" || $confirm == "")
	{
		header('Location: changepassword.php');
		//echo "TIDAK BISA";
	}
	else if($new == $confirm)
	{
		$ceknama = "SELECT `ID_User` FROM `msuser` WHERE `NamaUser` = '$nama'";
		$namanya = $koneksi->query($ceknama);
		$idnya = $namanya->fetch_assoc();
		$id = $idnya["ID_User"];
		$query = "UPDATE `msuser` SET `Password`= '$new' WHERE `ID_User` = '$id' AND `Password` = '$old'";
		$result = $koneksi->query($query);
		header('Location: changepassword.php');
		//echo $ceknama;
	}
	else
	{
		header('Location: modules/changepassword.php');
		//echo "TIDAK BISA";
	}
?>
<?php
	
	$result = mysqli_query($connection,"SELECT * FROM msuser where id = '".$_GET["id"]."'");
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
        <div id="home-link"><a href="manage_user.php">Infinity e-Learning</a></div>
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
					<?php } ?>
                </div>
			</div>
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
					<form action="changepassword.php" method="POST" autocomplete="off">
				<table style="margin-left:20px;" class="sinput" border="0">
				 <tbody>
				  <tr>
				   <td width="150px">Old Password</td>
				   <td width="15px">:</td>
				   <td width="250px">
					<input class="inputT" type="password" name="oldpass" autofocus />
				   </td>
				   <td width="200px" align="center">
				   </td>
				  </tr>
				  <tr>
				   <td width="150px">New Password</td>
				   <td width="15px">:</td>
				   <td width="250px">
					<input class="inputT" type="password" name="newpass" />
				   </td>
				   <td width="200px" align="center">
				   </td>
				  </tr>
				  <tr>
				   <td width="150px">Confirm Password</td>
				   <td width="15px">:</td>
				   <td width="250px">
					<input class="inputT" type="password" name="confirmpass" />
				   </td>
				   <td width="200px" align="center">
					<input type="submit" name="submit" value="Save">
				   </td>
				  </tr>
				 </tbody>
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