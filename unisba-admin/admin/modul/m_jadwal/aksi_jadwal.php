<?php
include "../../../../config/conection.php";

$module=$_GET["module"];
$act=$_GET["act"];

// Hapus
if ($module=='jadwal' AND $act=='hapus'){
  $jadwal=mysqli_fetch_assoc($connection->query("DELETE FROM tb_jadwal WHERE id_jadwal=$_GET[id_jadwal]"));
  header('location:../../media_admin.php?module='.$module);
  
}

// Input
elseif ($module=='jadwal' AND $act=='input'){
  $connection->query("INSERT INTO tb_jadwal(id_jadwal, kegiatan, tanggal, waktu, lokasi) 
                            VALUES(NULL, '$_POST[kegiatan]', '$_POST[tanggal]', '$_POST[waktu]', '$_POST[lokasi]')") or die;
  header('location:../../media_admin.php?module='.$module);}

// Update
elseif ($module=='jadwal' AND $act=='update'){
  $connection->query("UPDATE tb_jadwal SET kegiatan  = '$_POST[kegiatan]',
									  tanggal = '$_POST[tanggal]',
									  waktu = '$_POST[waktu]',
									  lokasi = '$_POST[lokasi]'
                             WHERE id_jadwal = $_POST[id_jadwal]");
  header('location:../../media_admin.php?module='.$module);
}
?>
