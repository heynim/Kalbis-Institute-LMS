<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
	$idlecture_set = find_all_idlecture($_GET["id"]);
	if(!$idlecture_set){
		redirect_to("manage_lecture.php");
	}
	
	$id = $_GET["id"];
	$query = "DELETE FROM msheadermatakuliah WHERE ID_HeaderMataKuliah = $id";
	$result = mysqli_query ($connection, $query);
	//echo $query;
	if($result && mysqli_affected_rows($connection)==1){
		$_SESSION["message"] ="User deleted.";
		redirect_to("manage_lecture.php");
	}else{
	//failure
		$_SESSION["message"] ="User deletion failed.";
		redirect_to("manage_lecture.php");
	}
?>