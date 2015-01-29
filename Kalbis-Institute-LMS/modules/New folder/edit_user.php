<?php include ("connection.php"); ?>
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
			<h2 class="title">Edit User</h2>
			<form id="edit-site" action="admin_user.html" method="POST">
				<div id="details">
					<div class="field">
						<label>Username</label>
						<input type="text" name="title" value="Kalbis Gallery" />
					</div>
					<div class="field">
						<label>Password</label>
						<input type="text" name="title" value="Lorem ipsum dolor sit amet" />
					</div>
					<div class="field">
						<label>Repeat Password</label>
						<input type="text" name="title" value="Lorem ipsum dolor sit amet" />
					</div>
				</div>
				<input type="submit" name="update" value="Update" />
			</form>
		</div><!-- /#right -->
	</div><!-- /#utama -->
	<div id="copy">
		<span>&copy; 2014 Kalbis Institute</span>
	</div>
</div><!-- /#bungkus -->
</body>
</html>