<?php
include "config/conection.php";
session_start();
date_default_timezone_set("asia/jakarta");
 if(!isset($_SESSION['nisn'])){
	 header('location:index.php');
} 
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PSB Online</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
</head>
<body>
<!-- START PAGE SOURCE -->
<div class="main">
  <div class="main_resize">
    <div class="header">
      <div style="background:#FF0000;"> <img src="images/header_images.jpg" width="641" height="289" alt="" />
	  <img border="0" src="images/logo.png" width="100" alt="" style='position:absolute; left:300px; top:100px;'/>
        <div class="logo">
          <h1><br><a href="index.html">P<span>M</span>B<span>Online</span><span><small>UNIVERSITAS ISLAM BALITAR</small><small>Penerimaan Mahasiswa Baru</small></span></a></h1>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="content_bg">
        <div class="mainbar">
          <div class="article">
		  <div>
		  <?php
		  $edit = mysql_query("SELECT * FROM tb_psb_smk WHERE nisn='$_GET[nisn]'");
		  $r    = mysql_fetch_array($edit);
		  $smk = mysql_query('SELECT * FROM tb_smk order by id_smk');
		  $jurusan = mysql_query('SELECT * FROM tb_jurusan order by id_jurusan');
		  $option = '';
		  $option2 = '';
		  while($k=mysql_fetch_array($smk)){
		  if($k['id_smk']==$r['id_smk']){
			$p="selected";
		  }
		  else{
			$p="";
		  }
		  $option .= "<option $p value='".$k["id_smk"]."'>".$k['nama_smk']."</option>";
		  }
		  while($j=mysql_fetch_array($jurusan)){
		  if($j['id_jurusan']==$r['id_jurusan']){
			$f="selected";
		  }
		  else{
			$f="";
		  }
		  $option2 .= "<option $f value='".$j["id_jurusan"]."'>".$j['nama_jurusan']."</option>";
		  }
		  echo "<h2>Edit Siswa SMK</h2>
		  <form method='post' action='aksi_update_smk.php'>
          <table>
		  <tr><td>Nama</td><td>  : <input type=text name='nama' size=50 value='$r[nama]'></td></tr>
		  <tr><td>NISN</td><td>  : <input type=text name='nisn' size=50 value='$r[nisn]'></td></tr>
		  <tr><td>Jenis Kelamin</td><td>  : <input type=radio name='jenis_kelamin' value='Laki-Laki' checked>Laki-Laki<input type=radio name='jenis_kelamin' value='Perempuan'>Perempuan</td></tr></div>
		  <tr><td>Tempat Lahir</td><td>  : <input type=text name='tempat_lahir' size=50 value='$r[tempat_lahir]'></td></tr>
		  <tr><td>Tanggal Lahir</td><td>  : <input type=text name='tanggal_lahir' placeholder='DD-MM-YYYY' size=50 value='$r[tanggal_lahir]'></td></tr>
		  <tr><td>Alamat</td><td> : <textarea name='alamat' style='max-width:322px; min-width:322px; height: 100px;' >$r[alamat]</textarea></td></tr>
		  <tr><td>Kabupaten/Kota</td><td>  : <input type=text name='kabupaten_kota' size=50 value='$r[kabupaten_kota]'></td></tr>
		  <tr><td>Kode Pos</td><td>  : <input type=text name='kode_pos' size=50 value='$r[kode_pos]'></td></tr>
		  <tr><td>Sekolah Asal</td><td>  : <input type=text name='sekolah_asal' size=50 value='$r[sekolah_asal]'></td></tr>
		  <tr><td>Tahun Masuk SMP/MTs</td><td>  : <input type=text name='tahun_masuk' size=50 value='$r[tahun_masuk]'></td></tr>
		  <tr><td>Tahun Keluar SMP/MTs</td><td>  : <input type=text name='tahun_keluar' size=50 value='$r[tahun_keluar]'></td></tr>
		  <tr><td>No.Ijasah</td><td>  : <input type=text name='no_ijasah' size=50 value='$r[no_ijasah]'></td></tr>
		  <tr><td>Nilai UN</td><td>  : <input type=text name='danem' size=50 value='$r[danem]'></td></tr>
		  <tr><td>Alamat Sekolah Asal</td><td>  : <input type=text name='alamat_sekolah' size=50 value='$r[alamat_sekolah]'></td></tr>
		  <tr><td>No. Telp Sekolah Asal</td><td>  : <input type=text name='telp_sekolah' size=50 value='$r[telp_sekolah]'></td></tr>
		  <tr><td>SMK </td><td> : <select name='id_smk'>$option</select><input type=hidden name=id_smk_lama value='$r[id_smk]'>
		  <tr><td>Jurusan </td><td> : <select name='id_jurusan'>$option2</select><input type=hidden name=id_jurusan_lama value='$r[id_jurusan]'>
		  <tr><td>Password</td><td>  : <input type=text name='password' size=50 value='$r[password]'></td></tr>
          <tr><td colspan=2><input type=submit value=Save>
                            <a href='aksi_logout.php'><input type=button value='Logout'/></a></td></tr>
		  <tr><td></td><td style=font-size:9px;>*) Jika anda selesai mengedit klik botton save lanjut di logout.</td></tr>
          </table></form><br><br><br>";
					
					?>
		  </div>
          </div>
        </div>
        <div class="sidebar">
          <div class="gadget">
            <h2>Menu</h2>
            <div class="clr"></div>
            <ul id="navmenu">
			<?php include "menu_sidebar.php"; ?>
            </ul>
          </div>
          <div class="gadget">
            <h2 class="grey"><span>Informasi</span></h2>
            <div class="clr"></div>
            <?php include "pengertian.php"?>
          </div>
        </div>
        <div class="clr"></div>
      </div>
    </div>
    <div class="fbg">
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <div class="clr"></div>
    </div>
  </div>
</div>
</body>
</html>