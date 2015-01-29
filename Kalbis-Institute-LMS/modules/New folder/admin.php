<?php include ("connection.php"); ?>
<?php
session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] == 1) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Kalbis Photo Gallery</title>
	<link rel="stylesheet" href="style.css" />
</head>
<body class="admin">
<div id="bungkus">
	<div id="top">
		<h1 id="page-title">My Gallery</h1>
		<h2 id="sub-title">Lorem ipsum dolor sit amet</h2>
		<div id="links">
			<span id="username">admin</span> | 
			<a href="logout.php">Logout</a>
		</div>
	</div><!-- /#top -->
	<div id="utama">
		<div id="left">
			<h2 class="title">Administration</h2>
			<ul id="menu">
				<li><a href="admin_photo.php">Photo</a></li>
				<li><a href="admin_site.php">Site Information</a></li>
				<li><a href="admin_user.php">User</a></li>
			</ul>
		</div><!-- /#left -->
		<div id="right">
			<h2 class="title">Dashboard</h2>
			<div class="info">
				<span>Number of Photo(s): 12</span>
				<span>Number of User(s): 2</span>
			</div>
		</div><!-- /#right -->
	</div><!-- /#utama -->
	<div id="copy">
		<span>&copy; 2014 Kalbis Institute</span>
	</div>
</div><!-- /#bungkus -->
</body>
</html>
<?php
}else {
	echo "Anda Harus Login Dulu.";
}
?>