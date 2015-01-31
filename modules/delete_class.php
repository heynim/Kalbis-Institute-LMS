<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
	$idpertemuan_set = find_all_idpertemuan($_GET["id"]);
	if(!$idpertemuan_set){
		redirect_to("manage_class.php");
	}
	
	$id = $_GET["id"];
	$query = "DELETE FROM mspertemuan WHERE ID_Pertemuan = $id";
	$result = mysqli_query ($connection, $query);
	//echo $query;
	if($result && mysqli_affected_rows($connection)==1){
		$_SESSION["message"] ="User deleted.";
		redirect_to("manage_class.php");
	}else{
	//failure
		$_SESSION["message"] ="User deletion failed.";
		redirect_to("manage_class.php");
	}
?>