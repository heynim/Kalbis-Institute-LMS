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
			<h2 class="title">Add New</h2>
			<form action="new_admin.php" method="POST">
				<p>
					Username :
					<input type="text" name="username" />
				</p>
				<p>
					Password :
					<input type="password" name="password" />
				</p>
				<p>
					<input type="submit" name="create" value="Create" />
				</p>
			</form>
		</div><!-- /#right -->
	</div><!-- /#utama -->
	<div id="copy">
		<span>&copy; 2014 Kalbis Institute</span>
	</div>
</div><!-- /#bungkus -->
</body>
</html>