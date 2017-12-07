<?php
include "config/conection.php";

mysql_query("UPDATE tb_psb_sma SET  nama 			= '$_POST[nama]',
									nisn 			= '$_POST[nisn]',
									jenis_kelamin	= '$_POST[jenis_kelamin]',
							        tempat_lahir 	= '$_POST[tempat_lahir]',
									tanggal_lahir	= '$_POST[tanggal_lahir]',
									alamat 			= '$_POST[alamat]',
									kabupaten_kota  = '$_POST[kabupaten_kota]',
									kode_pos        = '$_POST[kode_pos]',
									sekolah_asal    = '$_POST[sekolah_asal]',
									tahun_masuk     = '$_POST[tahun_masuk]',
									tahun_keluar    = '$_POST[tahun_keluar]',
									no_ijasah       = '$_POST[no_ijasah]',
									danem       	= '$_POST[danem]',
									alamat_sekolah  = '$_POST[alamat_sekolah]',
									telp_sekolah    = '$_POST[telp_sekolah]',
									id_sma          = '$_POST[id_sma]',
									password       	= '$_POST[password]'
                             WHERE nisn = $_POST[nisn]")or die(mysql_error());
header('location:edit_sma.php?nisn='.$_SESSION["nisn"]);
?>