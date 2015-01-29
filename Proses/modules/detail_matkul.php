<?php include ("../includes/db_connection.php"); ?>
<?php include ("../includes/functions.php"); ?>
<?php include ("../includes/session.php"); ?>
<?php 
	if(isset($_SESSION['login']) ) {
		$user = $_SESSION['login'];
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
			$array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
			$hr = $array_hr[date('N')];
			$tgl= date('j');
			$array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
			$bln = $array_bln[date('n')];
			$thn = date('Y');
			echo $hr . ", " . $tgl . " " . $bln . " " . $thn . " ";
		?>
		</a>
		</div>
	</div>
    <div id="main">
        <div id="left">
            <div id="profile">
				<?php $sql = "SELECT * FROM msuser WHERE id = '$user'";
					$result = mysqli_query($connection, $sql);
					if($row = mysqli_fetch_array($result)) { 
				?>
                <div id="profile-img"><img src="#"/></div>
                <div id="profile-name"></div>
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
                    <li><a href="edit_user.php">Edit Profile</a></li>
                    <li><a href="logout.php">Sign Out</a></li>
                </ul>
            </div>
        </div>
        <div id="right">
            <div id="select">
                <div id="select-head"><span>My Classes</span></div>
                <div id="select-body">
                    <div class="select-page">
					<?php
						$sql = "SELECT * FROM msheadermatakuliah WHERE id = '$user'";
						$result = mysqli_query($connection, $sql);
						if($row = mysqli_fetch_array($result)) { 
					?>
					<span>
						<?php echo $row['NamaMataKuliah'];?>
					</span>
					<?php
					}
				?>
					<a href=""></a>
					</div>
                    <div class="select-page">
					<span>	05PATI - Advance Web Progaming (Theory)</br>
							Time: 13:30 - 15:20</br>
							Lecturer: John Smith
					<span/><a href="#"></a></div>
                    <div class="select-page">
					<span>	05PATI - Advance Web Progaming (Theory)</br>
							Time: 13:30 - 15:20</br>
							Lecturer: John Smith
					<span/><a href="#"></a></div>
                    <div class="select-page">
					<span>	05PATI - Advance Web Progaming (Theory)</br>
							Time: 13:30 - 15:20</br>
							Lecturer: John Smith
					<span/><a href="#"></a></div>
                    <div class="select-page">
					<span>	05PATI - Advance Web Progaming (Theory)</br>
							Time: 13:30 - 15:20</br>
							Lecturer: John Smith
					<span/><a href="#"></a></div>
                    <div class="select-page">
					<span>	05PATI - Advance Web Progaming (Theory)</br>
							Time: 13:30 - 15:20</br>
							Lecturer: John Smith
					<span/><a href="#"></a></div>
                    <div class="select-page">
					<span>	05PATI - Advance Web Progaming (Theory)</br>
							Time: 13:30 - 15:20</br>
							Lecturer: John Smith
					<span/><a href="#"></a></div>
                    <div class="select-page">
					<span>	05PATI - Advance Web Progaming (Theory)</br>
							Time: 13:30 - 15:20</br>
							Lecturer: John Smith
					<span/><a href="#"></a></div>
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