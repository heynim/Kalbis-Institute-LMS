<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
	$user_set = find_all_users($_GET["id"]);
	if(!$user_set){
		redirect_to("manage_user.php");
	}
	
	$id = $_GET["id"];
	$query = "DELETE FROM msuser WHERE id = {$id} LIMIT 1";
	$result = mysqli_query ($connection, $query);
	
	if($result && mysqli_affected_rows($connection)==1){
		$_SESSION["message"] ="User deleted.";
		redirect_to("manage_user.php");
	}else{
	//failure
		$_SESSION["message"] ="User deletion failed.";
		redirect_to("manage_user.php");
	}
?>