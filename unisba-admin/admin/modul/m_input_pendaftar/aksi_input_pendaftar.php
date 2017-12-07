<?php
include "../../../../config/conection.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET['module'];
$act=$_GET['act'];


if ($module=='input_pendaftar' AND $act=='input'){

    $connection->query("INSERT INTO tb_wisuda(nim, password, prodi,
                         log_time_insert) 
                            VALUES('$_POST[nim]', '$_POST[password]', 
                            '$_POST[id_prodi]', now())");

  header('location:../../media_admin.php?module='.$module);
  
}
?>
