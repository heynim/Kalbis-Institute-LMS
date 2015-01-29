<?php
$pass = "12345";
	$format = "$2a$10$";
	$hash   = "HaloHaloHaloHaloHalo22";
	$salt   = $format . $hash;
	
	$new_pass = crypt($pass, $salt);
	
	echo $new_pass;
?>