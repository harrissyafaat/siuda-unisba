<?php
include "../../../../config/conection.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus
if ($module=='pendaftar' AND $act=='hapus'){
  $connection->query("DELETE FROM tb_wisuda WHERE id_wisuda='$_GET[id_wisuda]'");
  header("location:$_SERVER[HTTP_REFERER]");
}

// Check Keuangan
if ($module=='pendaftar' AND $act=='check'){
  $connection->query("UPDATE tb_wisuda SET checklist = '1'
                             WHERE id_wisuda = '$_GET[id_wisuda]'");
  header("location:$_SERVER[HTTP_REFERER]");
}

// unCheck Keuangan
if ($module=='pendaftar' AND $act=='uncheck'){
  $connection->query("UPDATE tb_wisuda SET checklist = '0', check_akad = '0'
                             WHERE id_wisuda = '$_GET[id_wisuda]'");
  
  header("location:$_SERVER[HTTP_REFERER]");
}

// Check Akademik
if ($module=='pendaftar' AND $act=='check_akad'){
  $connection->query("UPDATE tb_wisuda SET check_akad = '1'
                             WHERE id_wisuda = '$_GET[id_wisuda]'");

  header("location:$_SERVER[HTTP_REFERER]");
}

// unCheck Akademik
if ($module=='pendaftar' AND $act=='uncheck_akad'){
  $connection->query("UPDATE tb_wisuda SET check_akad = '0'
                             WHERE id_wisuda = '$_GET[id_wisuda]'");
  header("location:$_SERVER[HTTP_REFERER]");
}

?>
