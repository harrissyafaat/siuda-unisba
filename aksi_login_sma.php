<?php
include "config/conection.php";

$password   = $_POST["password"];
$login      = mysql_query("SELECT * FROM tb_psb_sma WHERE nisn='$_POST[nisn]' AND password='$password'") or die (mysql_error());
$ketemu     = mysql_num_rows($login);
$r          = mysql_fetch_array($login);

// Apabila nisn dan password ditemukan
if ($ketemu > 0){
  session_start();

  $_SESSION["nisn"]=$_POST['nisn'];
  $_SESSION["password"]=$r["password"];
  echo $_SESSION["nisn"];
header('location:edit_sma.php?nisn='.$_SESSION["nisn"]);
}
else{
  echo "<script>alert('NISN atau Password salah. Ulang lagi!'); window.location = 'index.php'</script>";
}
?>