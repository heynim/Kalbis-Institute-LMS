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
$namafolder= "../images/profile"; //tempat menyimpan file 
if (!empty($_FILES["nama_file"]["tmp_name"])) {     
$jenis_gambar=$_FILES['nama_file']['type'];     
$judul_gambar=$_POST['judul_gambar'];     
if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")     {                    
$gambar = $namafolder . basename($_FILES['nama_file']['name']);                
if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {             
echo "Gambar berhasil dikirim ".$gambar;             
$sql="INSERT INTO mspictureprofile (judul_gambar,nama_file) values ('{$judul_gambar}','{$gambar}')";             
$result = mysqli_query ($connection, $sql);        
} else {            
echo "Gambar gagal dikirim";         
}    
} else {         
echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";    
} 
} else {     
//echo "Anda belum memilih gambar"; 
}
 
?>
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
        <div id="home-link"><a href="manage_user.php">Infinity e-Learning</a></div>
		<div id="header">
			<?php echo waktu() . ': ' . $row['status'] . ', ' . $row['name']; ?>
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
					<form action="create_user.php" method="POST" enctype="multipart/form-data" name="FUpload" id="FUpload">
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
							<td><select name="status">
							<option value="0" disabled ">Please Select</option>
							<option value="Admin">Admin</option>
							<option value="Lecture">Lecture</option>
							<option value="Student">Student</option>
							</select></td>
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
							<td>Judul Gambar:</td>
							<td><input type="judul_gambar" name="judul_gambar" id="judul_gambar"/></td>
						</tr>
						<tr>
							<td>File Gambar:</td>
							<td><input type="file" name="nama_file" id="nama_file"/></td>
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
	header('Location: ../index.php');
}
?>