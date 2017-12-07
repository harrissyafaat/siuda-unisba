<?php
include "../config/conection.php";

$password   = md5($_POST["password"]);
$login      = $connection->query("SELECT * FROM tb_admin WHERE username='$_POST[username]' AND password='$password'") or die (mysql_error());
$ketemu     = mysqli_num_rows($login);
$r          = mysqli_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  $actual_link = "http://$_SERVER[HTTP_HOST]";

  $_SESSION["id_admin"]=$r["id_admin"];
  $_SESSION["username"]=$r["username"];
  $_SESSION["password"]=$r["password"];
  $_SESSION["level"]=$r["level"];
  $_SESSION["nama"]=$r["nama"];
  $_SESSION["id_prodi"]=$r["id_prodi"];

  header('location:admin/media_admin.php?module=home');
}
else{

  echo "<script>alert('Username atau Password salah. Ulang lagi!'); 
  window.location.assign('$actual_link/wisuda/unisba-admin');
  </script>";
}
?>