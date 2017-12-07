<?php
include "../../../../config/conection.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus
if ($module=='smk' AND $act=='hapus'){
  $connection->query("DELETE FROM tb_smk WHERE id_smk=$_GET[id_smk]");
  header('location:../../media_admin.php?module='.$module);
}

// Input
elseif ($module=='smk' AND $act=='input'){
  $connection->query("INSERT INTO tb_smk (nama_smk)
			  VALUES ('$_POST[nama_smk]')");
  
  header('location:../../media_admin.php?module='.$module);
}

// Update banner
elseif ($module=='smk' AND $act=='update'){
  $connection->query("UPDATE tb_smk SET nama_smk = '$_POST[nama_smk]'
                             WHERE id_smk = '$_POST[id_smk]'");
  header('location:../../media_admin.php?module='.$module);
}
?>
