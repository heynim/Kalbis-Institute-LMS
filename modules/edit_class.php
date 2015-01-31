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
		
		$ID_HeaderMataKuliah = $_GET["id"];
		$ID_Pertemuan = $_POST["ID_Pertemuan"];
		$Detail = $_POST["Detail"];
		$Tugas = $_POST["Tugas"];
		
		$query = "UPDATE mspertemuan SET Detail = '$Detail', Tugas = '$Tugas' WHERE ID_Pertemuan='$ID_Pertemuan'";
		$result = mysqli_query ($connection, $query);
		
			if($result && mysqli_affected_rows($connection)== 1){
				$_SESSION["message"] ="User Update.";
				redirect_to("manage_class.php");
			} else{
				$_SESSION["message"]="User Update Failed.";
				}
		}
		}else{
		}
?>
<?php
	$htm = $_GET['id'];
	$result = mysqli_query($connection,"SELECT * FROM mspertemuan WHERE ID_Pertemuan='$htm'");
	while($row = mysqli_fetch_array($result)) // fetch untuk ngambil araay result
	{
		$ID_HeaderMataKuliah = $row[0];
		$NamaMataKuliah = $row[1];
		$Topic = $row[3];
		$ID_Pertemuan = $row[2];
		$Detail = $row[4];
		$Tugas = $row[5];
	}
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
		<?php	
							
							$sql = "SELECT * FROM msuser WHERE id = '$user'";
							$result = mysqli_query($connection, $sql);
							while($row = mysqli_fetch_assoc($result)) { 
						?>
        <div id="home-link"><a href="manage_class.php">Infinity e-Learning</a></div>
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
                </div>
			</div>
			<?php  }?>
            <div id="nav">
                <ul>
                    <li><a href="edit_profile.php">Edit Profile</a></li>
                    <li><a href="logout.php">Sign Out</a></li>
                </ul>
            </div>
        </div>
        <div id="right">
            <div id="select">
                <div id="select-head"><span>Edit Class</span></div>
                <div id="select-body">
					<form action="edit_class.php?id=<?php echo $htm;?>" method="POST">
						<table>
							<tr>
								<td>
									<input type="text" name="ID_HeaderMataKuliah" value="<?php echo $ID_HeaderMataKuliah; ?>" placeholder="ID Header Mata Kuliah" disabled />
								</td>
							</tr>
							<tr>
								<td><input type="text" name="ID_Pertemuan" value="<?php echo $ID_Pertemuan; ?>" placeholder="ID Session"/></td>
							</tr>
							<tr>
								<td><input type="text" name="Detail" value="<?php echo $Detail;?>" placeholder="Detail"/></td>
							</tr>
							<tr>
								<td><input type="text" name="Tugas" value="<?php echo $Tugas;?>" placeholder="Tugas"/></td>
							</tr>
								
							<tr>
							<td><input type="submit" name="submit" value="Edit Class" /></td>
							<td><a href="manage_class.php?id=<?php echo urlencode($htm);?>">Cancel</a></td>
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