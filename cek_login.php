<?php
include "config/conection.php";

$password   = $_POST["password"];
$login      = $connection->query("SELECT * FROM tb_wisuda WHERE nim='$_POST[username]' AND password='$password'") or die (mysql_error());
$ketemu     = mysqli_num_rows($login);
$r          = mysqli_fetch_array($login);

// die();
// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();

  $_SESSION["nim"]=$r["nim"];
  $_SESSION["password"]=$r["password"];
  $_SESSION["id_prodi"]=$r["prodi"];
  $_SESSION["nama"]=$r["nama"];

  header('location:f_daftar.php');
}
else{
  echo "<script>alert('Username atau PasswordMu salah. Ulang lagi!'); 
  window.location.assign('http://36.66.216.186/wisuda/daftar.php');
  </script>";
}
?>