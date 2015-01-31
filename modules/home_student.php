<?php include ("../includes/db_connection.php"); ?>
<?php include ("../includes/functions.php"); ?>
<?php include ("../includes/session.php"); ?>
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
        <div id="home-link"><a href="home_student.php">Infinity e-Learning</a></div>
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
				<div id="select-body">
					<div id="select-head"><span>My Classes</span></div>
						<div class="select-page">
							<?php
								$sql = "SELECT * FROM msheadermatakuliah";
								$result = mysqli_query($connection, $sql);
								while($row = mysqli_fetch_assoc($result)) { 
							?>
							<div class="select-page">
								<a href="session_student.php?ID_HeaderMataKuliah=<?php echo $row['ID_HeaderMataKuliah'] ?>">
								<span class="class-title"><?php echo $row['NamaMataKuliah']; ?></span>
								<label>Lecturer:</label><span class="class-lecturer"><?php echo $row['nama_dosen']; ?></span>
								</a>
							</div>
							<?php } ?>	
				</div> 
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