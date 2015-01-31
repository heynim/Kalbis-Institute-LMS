<?php require_once("../includes/db_connection.php"); ?>
<?php 
$namafolder= "../images/"; //tempat menyimpan file 
if (!empty($_FILES["nama_file"]["tmp_name"])) {     
$jenis_gambar=$_FILES['nama_file']['type'];     
$judul_gambar=$_POST['judul_gambar'];     
if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")     {                    
$gambar = $namafolder . basename($_FILES['nama_file']['name']);                
if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {             
echo "Gambar berhasil dikirim ".$gambar;             
$sql="insert into mspictureprofile (judul_gambar,nama_file) values ('{$judul_gambar}','{$gambar}')";             
$result = mysqli_query ($connection, $sql);        
} else {            
echo "Gambar gagal dikirim";         
}    
} else {         
echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";    
} 
} else {     
echo "Anda belum memilih gambar"; 
}
 
?>