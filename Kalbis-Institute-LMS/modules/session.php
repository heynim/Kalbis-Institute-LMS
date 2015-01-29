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
				?>
			
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div id="top">
        <div id="home-link"><a href="home.php">Infinity e-Learning</a>
		<div id="header">
		<?php 
			$array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
			$hr = $array_hr[date('N')];
			$tgl= date('j');
			$array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
			$bln = $array_bln[date('n')];
			$thn = date('Y');
			echo $hr . ", " . $tgl . " " . $bln . " " . $thn . " ";
		?>
		</div>
	</div>
    <div id="main">
        <div id="left">
            <div id="profile">
			<?php 
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
                    <li><a href="edit_user.php">Edit Profile</a></li>
                    <li><a href="logout.php">Sign Out</a></li>
                </ul>
            </div>
        </div>
        <div id="right">
            <div id="select">
			<div id="select-body">
                <div id="select-head"><span>My Classes</span></div>
				
                <div class="select-page">
                        <a href="#">
							<?php
								$sql = "SELECT * FROM mspertemuan";
								$result = mysqli_query($connection, $sql);
								while($row = mysqli_fetch_assoc($result)) { 
							?>
							<span class="class-title">
								<?php echo $row['Detail_Pertemuan']; ?>
								<a href="view_matakuliah.php?ID_Pertemuan=<?php echo $row['ID_Pertemuan']; ?>&idh=<?php echo $_GET['ID_HeaderMataKuliah'];?> "/>View<br />
								<br /><a/>
							</span>
							<?php }?>	
                    </div>
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