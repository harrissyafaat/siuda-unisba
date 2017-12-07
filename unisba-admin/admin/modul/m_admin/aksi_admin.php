<?php
include "../../../../config/conection.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$r=mysqli_fetch_array($connection->query("SELECT * FROM tb_admin where id_prodi = '$_POST[id_prod]'"));

$pass_lama=md5($_POST["pass_lama"]);
$pass_baru=md5($_POST["pass_baru"]);

if (empty($_POST["pass_baru"]) OR empty($_POST["pass_lama"]) OR empty($_POST["pass_ulangi"])){
  echo "<p align=center>Anda harus mengisikan semua data pada form Ganti Password.<br />"; 
  echo "<a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a></p>";
}
else{ 
// Apabila password lama cocok dengan password admin di database
if ($pass_lama==$r["password"]){
  // Pastikan bahwa password baru yang dimasukkan sebanyak dua kali sudah cocok
  if ($_POST["pass_baru"]==$_POST["pass_ulangi"]){
    $connection->query("UPDATE tb_admin SET password = '$pass_baru'");
	echo "<script>alert('Password sudah diganti'); window.location='../../media_admin.php?module=home'</script>";
  }
  else{
    echo "<script>alert('Password baru yang Anda masukkan sebanyak dua kali belum cocok'); window.location='../../media_admin.php?module=admin'</script>";  
  }
}
else{
  echo "<script>alert('Anda salah memasukkan Password Lama Anda.; window.location='../../media_admin.php?module=admin'</script>"; 
}
}
?>
