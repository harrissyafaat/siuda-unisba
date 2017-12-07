<?php
include "../../../../config/conection.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus
if ($module=='psbsmk' AND $act=='hapus'){
  mysql_query("DELETE FROM tb_psb_smk WHERE id_psb_smk=$_GET[id_psb_smk]")or die (mysql_error());
  header("location:$_SERVER[HTTP_REFERER]");
}

// Input
elseif ($module=='smk' AND $act=='input'){
  mysql_query("INSERT INTO tb_smk (nama_smk)
			  VALUES ('$_POST[nama_smk]')");
  
  header('location:../../media_admin.php?module='.$module);
}

// Update banner
elseif ($module=='smk' AND $act=='update'){
  mysql_query("UPDATE tb_smk SET nama_smk = '$_POST[nama_smk]',
                             WHERE id_smk = '$_POST[id_smk]'");
  header('location:../../media_admin.php?module='.$module);
}
?>
