<?php
include "config/conection.php";

if($connection->query("INSERT INTO tb_psb_smk 
	(nama, nisn, tanggal_lahir, alamat, kabupaten_kota, kode_pos, sekolah_asal, tahun_masuk, tahun_keluar, no_ijasah, danem, alamat_sekolah, telp_sekolah, id_smk, id_jurusan, password) 
	VALUES ('$_POST[nama]', '$_POST[nisn]', '$_POST[tanggal_lahir]', '$_POST[alamat]', '$_POST[kabupaten_kota]', '$_POST[kode_pos]', '$_POST[sekolah_asal]', '$_POST[tahun_masuk]', '$_POST[tahun_keluar]', '$_POST[no_ijasah]', '$_POST[danem]', '$_POST[alamat_sekolah]', '$_POST[telp_sekolah]', '$_POST[id_smk]', '$_POST[id_jurusan]', '$_POST[password]')")or die (mysql_error())){

	   move_uploaded_file($_FILES['foto']['tmp_name'],"upload_foto/$_POST[nisn].jpg");
	   move_uploaded_file($_FILES['bukti_pembayaran']['tmp_name'],"upload_bukti_pembayaran/$_POST[nisn].jpg");

	   header('location:index.php');

}


?>