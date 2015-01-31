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
					$ID_Pertemuan = $_GET["ID_HeaderMataKuliah"];
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
	</div>
    <div id="main">
        <div id="left">
            <div id="profile">
			<?php 
					$hmt = $_GET['ID_HeaderMataKuliah'];
					$sql = "SELECT * FROM msuser WHERE id = '$user'";
					$result = mysqli_query($connection, $sql);
					if($row = mysqli_fetch_array($result)) { 
				?>
				<div id="profile-img"><img src="#"/></div>
                <div id="profile-name"><?php echo $row['name']; ?></div>
                <div id="profile-desc">
					<div>Status: <?php echo $row['status']; ?> </div>
					<div>Contact No: <?php echo $row['contact']; ?> </div>
					<div>Email: <?php echo $row['email']; ?></div>
					<?php } ?><?php } ?>
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
				<div id="select-head"><span>Detail Class</span><a href="manage_class.php?id=<?php echo urldecode($hmt);?>" class="add"></a></div>
				<div id="select-body">
					<div class="select-page">
					<?php	
							
							$sql = "SELECT * FROM mspertemuan WHERE ID_HeaderMataKuliah = '$hmt'";
							$result = mysqli_query($connection, $sql);
							while($row = mysqli_fetch_assoc($result)) { 
						?>
						<a href="view_matakuliah.php?ID_Pertemuan=<?php echo $row['ID_Pertemuan']; ?>&idh=<?php echo $_GET['ID_HeaderMataKuliah'];?> "/>
							<span class="class-title">
							Session 
							<?php echo $row['ID_Pertemuan']; ?>
							</span>
							<label>Topic : </label>
							<span class="class-lecturer">
							<?php echo $row['Topic']; ?>
							</span>
						</a>	
					</div>
					<?php  }?>	
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