<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php 
	if(isset($_SESSION['login']) ) {
		$user = $_SESSION['login'];
?>
<?php
	$idlecture_set = find_all_idlecture();
?>
<?php 
	$sql = "SELECT * FROM msuser WHERE  id = '$user'";
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
        <div id="home-link"><a href="home_lecturer.php">Infinity e-Learning</a></div>
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
                <div id="select-head"><span>Manage Class</span></div>
                <div id="select-body">
				<table>
				<tr>
					<th style="text-align: left; width: 200px;">ID Mata Kuliah</th>
					<th style="text-align: left; width: 200px;">Nama Mata Kuliah</th>
					<th style="text-align: left; width: 200px;">Nama Dosen</th>
				</tr>
				<?php while($id_lecture = mysqli_fetch_assoc($idlecture_set))
				{ ?>
					<tr>
						<td>
						<?php echo htmlentities($id_lecture["ID_HeaderMataKuliah"]);?>
						</td>
						<td>
						<?php echo htmlentities($id_lecture["NamaMataKuliah"]);?>
						</td>
						<td>
						<?php echo htmlentities($id_lecture["nama_dosen"]);?>
						</td>
						<td><a href="edit_lecture.php?id=<?php echo urlencode($id_lecture['ID_HeaderMataKuliah']);?>">Edit</a></td>
						<td><a href="delete_lecture.php?id=<?php echo urlencode($id_lecture['ID_HeaderMataKuliah']);?>" onclick="return confirm('Are you sure?');">Delete</a></td>
					</tr>
				<?php } 
				?>
			</table>
			<br />
			<a href="add_class.php">Add new class</a>
			<a href="home_lecturer.php">Cancel</a>
            <?php echo message();?>
			<?php echo form_errors($errors);?>
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