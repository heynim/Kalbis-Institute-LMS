<?php include ("../includes/db_connection.php"); ?>
<?php include ("../includes/functions.php"); ?>
<?php include ("../includes/session.php"); ?>
<?php 
	if(isset($_SESSION['login']) ) {
		$user = $_SESSION['login'];
?>
<?php
	$user_set = find_all_users();
?>
<?php $layout_context = "admin";?>
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
                <div id="select-head"><span>Manage User</span></div>
                <div id="select-body">
						<table>
				<tr>
					<th style="text-align: left; width: 200px;">ID</th>
					<th style="text-align: left; width: 200px;">Name</th>
					<th style="text-align: left; width: 200px;">Status</th>
					<th colspan= "2" style="text-align: left">Actions</th>
				</tr>
				<?php while($user = mysqli_fetch_assoc($user_set))
				{ ?>
					<tr>
						<td>
						<?php echo htmlentities($user["id"]);?>
						</td>
						<br />
						<td>
						<?php echo htmlentities($user["name"]);?>
						</td>
						<br />
						<td>
						<?php echo htmlentities($user["status"]);?>
						</td>
						<br />
						<td><a href="simpenan.php?id=<?php echo urlencode($user['id']);?>">Edit</a></td>
						<td><a href="delete_user.php?id=<?php echo urlencode($user['id']);?>" onclick="return confirm('Are you sure?');">Delete</a></td>
					</tr>
				<?php } 
				?>
			</table>
			<br />
			<a href="create_user.php">Add new user</a>
            <?php echo message();?>
			<?php echo form_errors($errors);?>
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