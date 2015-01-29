<?php
	function pass_crypt($pass) {
	//$pass = "admin";
	$format = "$2a$10$";
	$hash   = "HaloHaloHaloHaloHalo22";
	$salt   = $format . $hash;
	
	$new_pass = crypt($pass, $salt);
	return $new_pass;
	}
	
	function redirect_to($new_location){
		header("Location: " . $new_location);
		exit;
	}

	function mysql_prep($string){
		global $connection;
		
		$escaped_string = mysqli_real_escape_string($connection, $string);
		return $escaped_string;
	}
	
	function confirm_query($result_set){
		if(!$result_set){
			die("Database query failed");
		}
	}
	
	function form_errors($errors=array()){
		$output = "";
		if(!empty($errors)){
			$output .= "<div class=\"error\">";
			$output .= "Please fix the following errors:";
			$output .= "<ul>";
			foreach ($errors as $key => $error){
				$output .= "<li>";
				$output .= htmlentities($error);
				$output .= "</li>";
			}
			$output .= "</ul>";
			$output .= "</div>";
		}
		return $output;
	}
	
	function find_all_users(){
		global $connection;
		$query = "SELECT * ";
		$query .= "FROM msuser ";
		$query .= "ORDER BY id ASC";
		$user_set = mysqli_query($connection, $query);
		confirm_query($user_set);
		return $user_set;
	}
	
	function find_user_by_id($user_id){
		global $connection;
		
		$safe_user_id = mysqli_real_escape_string($connection, $user_id);
		
		$query = "SELECT * ";
		$query .= "FROM msuser ";
		$query .= "WHERE id = {$safe_user_id} ";
		$query .= "LIMIT 1";
		$user_set = mysqli_query($connection, $query);
		confirm_query($user_set);
		if ($user = mysqli_fetch_assoc($user_set)){
			return $user;
		}else {
			return null;
		}
	}
	
	function find_user_by_username($username){
		global $connection;
		
		$safe_username = mysqli_real_escape_string($connection, $username);
		
		$query = "SELECT * ";
		$query .= "FROM msuser ";
		$query .= "WHERE username = '{$safe_username}' ";
		$query .= "LIMIT 1";
		$user_set = mysqli_query($connection, $query);
		confirm_query($user_set);
		if ($user = mysqli_fetch_assoc($user_set)){
			return $user;
		}else {
			return null;
		}
	}
	
	function password_encrypt($password){
		$hash_format = "$2y$10$"; // tells PHP to use BLowfish with a "cost" of 10
		$salt_length = 22; //Blowfish salts should be
		$salt = generate_salt($salt_length);
		$format_and_salt = $hash_format . $salt;
		$hash = crypt ($password, $format_and_salt);
		return $hash;
	}
	
	function generate_salt($length){
		// Not 100% unique, not 100% random, but good enough for a salt
		// MD5 returns 32 characters
		$unique_random_string = md5(uniqid(mt_rand(),true));
		
		// valid characters for a salt are [a-zA-Z0-9./]
		$base64_string = base64_encode ($unique_random_string);
		
		// BUt not "+" which is valid in base64 encodng
		$modified_base64_string = str_replace('+','.',$base64_string);
		
		// Truncate string to the correct length
		$salt = substr ($modified_base64_string, 0 , $length);
		
		return $salt;
	}
	
	function password_check($password, $existing_hash){
		// existing has contains format and salt at start
		$hash = crypt ($password, $existing_hash);
		if($hash == $existing_hash){
			return true;
		} else{
			return false;
		}
	}

	function attempt_login($id, $password){
		$user = find_user_by_id($id);
		if ($user){
			//found admin, now check password
			if(password_check($password, $user["password"])){
				//password matches
				return $user;
			}else{
				//pasword does not match
				return false;
			}
		} else{
			//admin not found
			return false;
		}
	}
	
	function logged_in(){
		return isset($_SESSION['admin_id']);
	}
	
	function confirm_logged_in(){
		if(!logged_in()){
			redirect_to("login.php");
		}
	
	}
	
	function waktu(){
		$array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
			$hr = $array_hr[date('N')];
			$tgl= date('j');
			$array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
			$bln = $array_bln[date('n')];
			$thn = date('Y');
			echo $hr . ", " . $tgl . " " . $bln . " " . $thn . " ";
	}
?>