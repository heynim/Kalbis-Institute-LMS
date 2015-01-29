<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php
	if(isset($_POST['submit'])){
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
		}
?>
<?php
	require_once("../includes/db_connection.php");
	
	if(isset($_FILES['file'])){
		$file = $_FILES['file'];
		
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_size = $file['size'];
		$file_error = $file['error'];
		
		$ext = explode('.', $file['name']);
		$ext = strtolower(end($ext));
		
		echo $ext;
		
		$sumber = $file['tmp_name'];
		$tujuan = "images/pic_profile/" . $file_name;
		
		if($ext == "jpg"){
			move_uploaded_file($sumber, $tujuan);
			
			$judul = $_POST['judul'];
			$keterangan = $_POST['keterangan'];
			
			$sql = "INSERT INTO gallery (title, description, image) VALUES ('$judul', '$keterangan', '$tujuan')";
			mysqli_query($connection, $sql);
			
			header('Location: admin_photo.php');
		}
	}
?>
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
                    <li><a href="edit_profile.php">Edit Profile</a></li>
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
							<td>ID:</td>
							<td><input type="text" name="id" value="" placeholder="ID"/></td>
						</tr>
						<tr>
							<td>Name:</td>
							<td><input type="text" name="name" value="" placeholder="Name"/></td>
						</tr>
						<tr>
							<td>Status:</td>
							<td><input type="text" name="status" value="" placeholder="Status"/></td>
						</tr>
						<tr>
							<td>Contact:</td>
							<td><input type="text" name="contact" value="" placeholder="Contact"/></td>
						</tr>
						<tr>
							<td>Email:</td>
							<td><input type="text" name="email" value="" placeholder="Email"/></td>
						</tr>
						<tr>
							<td>Password:</td>
							<td><input type="password" name="password" value="" placeholder="Password"/></td>
						</tr>
						<tr>
							<td>Upload Photo:</td>
							<td><input type="file" name="file" /></td>
							<td></td>
						</tr>
						<tr>
							<td><input type="submit" name="submit" value="Create User" /></td>
							<td><a href="manage_user.php">Cancel</a></td>
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
	echo "Anda Harus Login Dulu.";
}
?>
<?php include("../includes/layouts/footer.php"); ?>