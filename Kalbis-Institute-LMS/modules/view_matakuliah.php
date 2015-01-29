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
					$ID_Pertemuan = $_GET["ID_Pertemuan"];
					//$ID_HeaderMataKuliah = $_GET["ID_HeaderMataKuliah"];
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
		<div id="header">
		<?php 
			echo waktu();
			echo ': ';
			echo $row['status'];
			echo ', ';
			echo $row['name'];
		?>
		</div>
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
                    <li><a href=>Edit Profile</a></li>
                    <li><a href="logout.php">Sign Out</a></li>
                </ul>
            </div>
        </div>
        <div id="right">
            <div id="select">
                <div id="select-head"><span>Detail Mata Kuliah</span></div>
                <div id="select-body">
				<center>
				<table border="1">
					<tr>
						<td>
							Pertemuan
						</td>
						<td>
							Detail
						</td>
						<td>
							Tugas
						</td>
					</tr>
					<?php 
						$idid = $_GET['idh'];
						
						$sql = "SELECT * FROM trdetailmatakuliah WHERE ID_Pertemuan = '$ID_Pertemuan' and ID_HeaderMataKuliah = '$idid'";
						$result = mysqli_query($connection, $sql);
						while($row = mysqli_fetch_array($result)) { 
					?>
						<tr>
							<td>
								<?php echo $row['ID_Pertemuan']; ?>
							</td>
							<td>
								<?php echo $row['Detail']; ?> 
							</td>
							<td>
								<?php echo $row['Tugas']; ?> 
							</td>
						</tr>
					<?php
						}
					?>
					</table>
					</center>
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