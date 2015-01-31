<?php
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
	
	function find_all_idpertemuan(){
		global $connection;
		$query = "SELECT * ";
		$query .= "FROM mspertemuan ";
		$query .= "ORDER BY ID_Pertemuan ASC";
		$idpertemuan_set = mysqli_query($connection, $query);
		confirm_query($idpertemuan_set);
		return $idpertemuan_set;
	}
	
	function find_all_idlecture(){
		global $connection;
		$query = "SELECT * ";
		$query .= "FROM msheadermatakuliah ";
		$query .= "ORDER BY ID_HeaderMataKuliah ASC";
		$idlecture_set = mysqli_query($connection, $query);
		confirm_query($idlecture_set);
		return $idlecture_set;
	}
	
	function password_encrypt($pass){
		$format = "$2a$10$";
		$hash   = "HaloHaloHaloHaloHalo22";
		$salt   = $format . $hash;
	
		$new_pass = crypt($pass, $salt);
		return $new_pass;
	}
	
	function waktu(){
		$array_hari= array(1=>"Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
		$hari = $array_hari[date('N')];
		$tanggal= date('j');
		$array_bulan = array(1=>"January","February","March", "April", "May","June","July","August","September","October", "November","December");
		$bulan = $array_bulan[date('n')];
		$tahun = date('Y');
		echo $hari . ", " . $tanggal . " " . $bulan . " " . $tahun . " ";
	}
?>