<?php
include "../../../../config/conection.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus
if ($module=='berita' AND $act=='hapus'){
  $berita=mysqli_fetch_assoc($connection->query("DELETE FROM tb_berita WHERE id_berita=$_GET[id_berita]"));
  header('location:../../media_admin.php?module='.$module);
}

// Input
elseif ($module=='berita' AND $act=='input'){
$tgl=date("d-m-Y");
 $connection->query("INSERT INTO tb_berita 
			  VALUES (NULL , '$_POST[judul]', '$_POST[deskripsi]', '$tgl')");
 $id_pemesanan =mysqli_insert_id();
  header('location:../../media_admin.php?module='.$module);
}

// Update
elseif ($module=='berita' AND $act=='update'){
  $connection->query("UPDATE tb_berita SET judul = '$_POST[judul]',
							        deskripsi     = '$_POST[deskripsi]'
                             WHERE id_berita = $_POST[id_berita]")or die (mysql_error());
  header('location:../../media_admin.php?module='.$module);
}
?>