<?php include ("connection.php"); ?>
<?php
	$sql="SELECT * FROM user";
	$result = mysqli_query($connection, $sql);
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
			<h2 class="title">User Administration</h2>
			<a class="action" href="add_admin.php">Add new</a>
			<table cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th class="no">No.</th>
						<th class="thumb">Username</th>
						<th class="action">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while($baris = mysqli_fetch_assoc($result)) {
					?>
						<tr>
							<td class="no"><?php echo htmlentities ($baris["id"]);?></td>
							<td class="title"><?php echo htmlentities ($baris["username"]);?></td>
							<td class="action"><a href="edit_user.php">Edit</a> | <a href="delete_user.php">Delete</a></td>
						</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div><!-- /#right -->
	</div><!-- /#utama -->
	<div id="copy">
		<span>&copy; 2014 Kalbis Institute</span>
	</div>
</div><!-- /#bungkus -->
</body>
</html>