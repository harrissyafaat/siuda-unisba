<?php
include "../../../../config/conection.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus
if ($module=='alur' AND $act=='hapus'){
  $connection->query("DELETE FROM tb_alur WHERE id_alur='$_GET[id_alur]'");
  header('location:../../media_admin.php?module='.$module);
}

// Input
elseif ($module=='alur' AND $act=='input'){
  $connection->query("INSERT INTO tb_alur(alur) 
                            VALUES('$_POST[alur]')")or die (mysql_error());
  
  header('location:../../media_admin.php?module='.$module);
}

// Update
elseif ($module=='alur' AND $act=='update'){
  $connection->query("UPDATE tb_alur SET alur = '$_POST[alur]'
                             WHERE id_alur = '$_POST[id_alur]'");
  header('location:../../media_admin.php?module='.$module);
}
?>
