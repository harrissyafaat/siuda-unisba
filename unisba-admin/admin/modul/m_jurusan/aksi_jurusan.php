<?php
include "../../../../config/conection.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus
if ($module=='jurusan' AND $act=='hapus'){
  mysql_query("DELETE FROM tb_jurusan WHERE id_jurusan='$_GET[id_jurusan]'");
  header('location:../../media_admin.php?module='.$module);
}

// Input
elseif ($module=='jurusan' AND $act=='input'){
  mysql_query("INSERT INTO tb_jurusan (id_jurusan, nama_jurusan , kuota )
			  VALUES (NULL , '$_POST[nama_jurusan]', '$_POST[kuota]')");
  
  header('location:../../media_admin.php?module='.$module);
}

// Update banner
elseif ($module=='jurusan' AND $act=='update'){
  mysql_query("UPDATE tb_jurusan SET nama_jurusan = '$_POST[nama_jurusan]',
							  kuota = '$_POST[kuota]'
                             WHERE id_jurusan = '$_POST[id_jurusan]'")or die(mysql_error);
  header('location:../../media_admin.php?module='.$module);
}
?>
