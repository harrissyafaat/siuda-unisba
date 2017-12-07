<?php
include '../../config/conection.php';
include "../config/class_paging.php";

//Bagian Home
if ($_GET['module']=='home'){
	echo "<h2 class=judul>Selamat Datang   $_SESSION[nama] </h2>
		  <p>Assalamu'alaikum <b>$_SESSION[nama]</b>, Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola sistem, sesuai dengan Hak Akses anda</p>";
	
}

//Bagian Berita
elseif ($_GET['module']=='berita'){
	include "modul/m_berita/berita.php";
}

//Bagian Jadwal
elseif ($_GET['module']=='jadwal'){
	include "modul/m_jadwal/jadwal.php";
}

//Bagian Alur
elseif ($_GET['module']=='alur'){
	include "modul/m_alur/alur.php";
}

//Bagian Download
elseif ($_GET['module']=='download'){
	include "modul/m_download/download.php";
}

//Bagian Data SMA
elseif ($_GET['module']=='sma'){
	include "modul/m_sma/sma.php";
}

//Bagian Data SMK
elseif ($_GET['module']=='smk'){
	include "modul/m_smk/smk.php";
}

//Bagian PMB
elseif ($_GET['module']=='pendaftar'){
if($_SESSION['level']==1 OR $_SESSION['level']==3){
	include "modul/m_psb_sma/pendaftar.php";
}
if($_SESSION['level']==2){
	include "modul/m_psb_sma/pendaftar_prodi.php";
}
}

//Bagian PMB
elseif ($_GET['module']=='input_pendaftar'){
if($_SESSION['level']==2){
	include "modul/m_input_pendaftar/input_pendaftar.php";
}
}

//Bagian PSB SMK
elseif ($_GET['module']=='psb_smk'){
	include "modul/m_psb_smk/psb_smk.php";
}

//Bagian Admin
elseif ($_GET['module']=='admin'){
	include "modul/m_admin/admin.php";
}

else {
	echo "<script>alert('MAAF, Halaman tidak ditemukan'); window.location = 'media_admin.php?module=home'</script>";
}
?>
