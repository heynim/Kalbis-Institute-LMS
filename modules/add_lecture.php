<?php include ("../includes/db_connection.php"); ?>
<?php include ("../includes/functions.php"); ?>
<?php include ("../includes/session.php"); ?>
<?php include("../includes/layouts/header.php");?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php 
	if(isset($_SESSION['login']) ) {
		$user = $_SESSION['login'];
?>
<?php 
	if(isset($_POST['submit'])) {
		
		$ID_HeaderMataKuliah = $_POST["ID_HeaderMataKuliah"];
		$ID_Pertemuan = $_POST["ID_Pertemuan"];
		$Detail = $_POST["Detail"];
		$Tugas = $_POST["Tugas"];
		
		$query = "INSERT INTO trdetailmatakuliah (";
		$query .= "ID_HeaderMataKuliah, ID_Pertemuan, Detail, Tugas";
		$query .= ") VALUES (";
		$query .= " '{$ID_HeaderMataKuliah}', '{$ID_Pertemuan}', '{$Detail}', '{$Tugas}'";
		$query .= ")";
		$result = mysqli_query ($connection, $query);
		
		if($result) {
		$_SESSION["message"] = "Class Created.";
			redirect_to("manage_class.php");
		} else {
			$_SESSION["message"] = "Class Creation Failed.";
		}
	}
	}else {
	}
?>
<?php
	if(isset($_SESSION['login']) ){
		$user= $_SESSION['login'];
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
        <div id="home-link"><a href="home_lecturer.php">Infinity e-Learning</a>
		</div>
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
                    <li><a href="edit_profil.php">Edit Profile</a></li>
                    <li><a href="logout.php">Sign Out</a></li>
                </ul>
            </div>
        </div>
        <div id="right">
            <div id="select">
                <div id="select-head"><span>Add Class</span></div>
                <div id="select-body">
					<form action="add_class.php" method="POST" enctype="multipart/form-data">
						<table>
						<tr>
							<td><input type="text" name="ID_HeaderMataKuliah" value="" placeholder="ID Header Mata Kuliah"/></td>
						</tr>
						<tr>
							<td><input type="text" name="ID_Pertemuan" value="" placeholder="ID Session"/><td>
						</tr>
						<tr>
							<td><input type="text" name="Detail" value="" placeholder="Detail"/></td>
						</tr>
						<tr>
							<td><input type="text" name="Tugas" value="" placeholder="Tugas"/></td>
						</tr>
							
						<tr>
							<td><input type="submit" name="submit" value="Add Class" /></td>
							<td><a href="home_lecturer.php">Cancel</a></td>
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