<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php
	$user_set = find_all_users($_GET["id"]);
	if(!$user_set){
		redirect_to("manage_user.php");
	}
?>

<?php
	if(isset($_POST['submit'])){
	
		//validations
		$required_fields = array("id","password");
		validate_presences($required_fields);
		
		$fields_with_max_lengths = array ("id" => 30);
		validate_max_lengths($fields_with_max_lengths);
		
		if(empty($errors)){ 
		
			//perform create
		
		$id = $_GET["id"];
		$password= password_encrypt($_POST["password"]);
		$name= $_POST["name"];
		$status= $_POST["status"];
		$email= $_POST["email"];
		$contact= $_POST["contact"];
		
		$query = "UPDATE msuser SET";
		$query .= "id = '{$id}',";
		$query .= "name = '{$name}',";
		$query .= "status = '{$status}',";
		$query .= "contact = '{$contact}',";
		$query .= "email = '{$email}',";
		$query .= "password = {$password},";
		$query .= "WHERE id={$id} ";
		$query .= "LIMIT 1";
		$result = mysqli_query ($connection, $query);
		
		if($result && mysqli_affected_rows($connection)== 1){
			$_SESSION["message"] ="User Created.";
			redirect_to("manage_admins.php");
		} else{
			$_SESSION["message"]="User update Failed.";
		}
	}
		}else{
		} //end: if(isset($_POST['submit']))
?>

<?php $layout_context = "admin";?>
<?php include("../includes/layouts/header.php"); ?>
<div id="main">
	<div id="navigation">
	&nbsp;
	</div>
	<div id="page">
		<?php
			
			
			$result = mysqli_query($connection,"SELECT * FROM msuser where id = '".$_GET['id']."'");
			while($row = mysqli_fetch_array($result)) // fetch untuk ngambil araay result
			{
				$id = $row[0];
				$name = $row[2];
				$contact = $row[3];
				$email = $row[4];
				$status = $row[5];
				$password = $row[1]; 
			}
			
		?>
		
	</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>


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
		<div id="home-header">
		<?php 
			echo waktu();
			echo ': ';
			echo $row['status'];
			echo ', ';
			echo $row['name'];
		?>
		</a>
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
                <div id="select-head"><span>Edit User</span></div>
                <div id="select-body">
					<form action="edit_user.php" method="POST">
					<table>
					<tr>
						<td>ID:</td>
						<td><input type="text" name="id" value="<?php echo $id; ?>"/></td>
					</tr>
					<tr>
						<td>Name:</td>
						<td><input type="text" name="name" value="<?php echo $name; ?>"/></td>
					</tr>
					<tr>
					<td>Status:</td>
					<td><input type="text" name="status" value="<?php echo $status; ?>"/></td>
					</tr>
					<tr>
					<td>Contact:</td>
					<td><input type="text" name="contact" value="<?php echo $contact; ?>"/></td>
					</tr>
					<tr>
					<td>Email:</td>
					<td><input type="text" name="email" value="<?php echo $email; ?>"/></td>
					</tr>
					<tr>
					<td>Password:</td>
					<td><input type="password" name="password" value=""></td>
					</tr>
					<tr>
					<td><input type="submit" name="submit" value="Edit User" /></td>
					<td><a href="manage_user.php">Cancel</a></td>
					</tr>
					</table>
				</form>
					
                </div>
            </div>
        </div>
    </div>
</body>
</html>
