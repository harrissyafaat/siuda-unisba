<?php
include "../../../../config/conection.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus
if ($module=='sma' AND $act=='hapus'){
  $connection->query("DELETE FROM tb_sma WHERE id_sma='$_GET[id_sma]'");
  header('location:../../media_admin.php?module='.$module);
}

// Input
elseif ($module=='sma' AND $act=='input'){
  $connection->query("INSERT INTO tb_sma (id_sma, nama_sma , kuota )
			  VALUES (NULL , '$_POST[nama_sma]', '$_POST[kuota]')");
  
  header('location:../../media_admin.php?module='.$module);
}

// Update banner
elseif ($module=='sma' AND $act=='update'){
  $connection->query("UPDATE tb_sma SET nama_sma = '$_POST[nama_sma]',
							  kuota = '$_POST[kuota]'
                             WHERE id_sma = '$_POST[id_sma]'");
  header('location:../../media_admin.php?module='.$module);
}
?>
