<?php //filename: encrypt_test.php

$password  = "admin";
$format    = "$2a$10$"; // blowfish
$hash      = "HaloHaloHaloHaloHalo22";
$salt      = $format . $hash;

$new_pass  = crypt($password, $salt);
echo $new_pass;
?>