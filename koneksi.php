<?php
  $host = "localhost"; 
  $user = "root";
  $pass = "";
  $nama_db = "karyawan";
  $koneksi = mysqli_connect($host, $user, $pass, $nama_db);

if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}

try {
  
  $koneksiPdo = new PDO(
"mysql:host=$host;dbname=$nama_db", $user, $pass);
}
catch (PDOException $e) {
  echo "Error : " . $e->getMessage() . "<br/>";
  die();
}
function anti_injection($data)
{
  global $koneksi;
  $filter = mysqli_real_escape_string($koneksi, stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES))));
  return $filter;
}
?>


