<?php
include "config/conection.php";
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
		  $tampil = $connection->query('SELECT * FROM tb_smk order by nama_smk');
		  $tampil2 =  $connection->query('SELECT * FROM tb_jurusan order by id_jurusan');
		  $option = '';
		  $option2 = '';
		  while($r=$tampil->fetch_array(MYSQLI_BOTH)){
		  $option .= "<option value='".$r["id_smk"]."'>".$r['nama_smk']."</option>";
		  }
		  while($r2=$tampil2->fetch_array(MYSQLI_BOTH)){
		  $option2 .= "<option value='".$r2["id_jurusan"]."'>".$r2['nama_jurusan']."</option>";
		  }
		  echo "<h2>Register Siswa SMK</h2>
		  <form method='post' action='aksi_daftar_smk.php' enctype='multipart/form-data'>
          <table>
		  <tr><td>Nama</td><td>  : <input type=text name='nama' size=50 required='required'></td></tr>
		  <tr><td>NISN</td><td>  : <input type=text name='nisn' size=50 required='required'></td></tr>
		  <tr><td>Jenis Kelamin</td><td>  : <input type=radio name='jenis_kelamin' value='Laki-Laki' checked>Laki-Laki<input type=radio name='jenis_kelamin' value='Perempuan'>Perempuan</td></tr></div>
		  <tr><td>Tempat Lahir</td><td>  : <input type=text name='tempat_lahir' size=50 required='required'></td></tr>
		  <tr><td>Tanggal Lahir</td><td>  : <input type=text name='tanggal_lahir' placeholder='DD-MM-YYYY' size=50 required='required'></td></tr>
		  <tr><td>Alamat</td><td> : <textarea name='alamat' style='max-width:322px; min-width:322px; height: 100px;' required='required'></textarea></td></tr>
		  <tr><td>Kabupaten/Kota</td><td>  : <input type=text name='kabupaten_kota' size=50 required='required'></td></tr>
		  <tr><td>Kode Pos</td><td>  : <input type=number name='kode_pos' size=50 required='required'></td></tr>
		  <tr><td>Sekolah Asal</td><td>  : <input type=text name='sekolah_asal' size=50 required='required'></td></tr>
		  <tr><td>Tahun Masuk SMA/MA</td><td>  : <input type=number name='tahun_masuk' size=50 required='required'></td></tr>
		  <tr><td>Tahun Keluar SMA/MA</td><td>  : <input type=number name='tahun_keluar' size=50 required='required'></td></tr>
		  <tr><td>No.Ijasah</td><td>  : <input type=text name='no_ijasah' size=50 required='required'></td></tr>
		  <tr><td>Nilai UN</td><td>  : <input type=number name='danem' size=50 required='required'></td></tr>
		  <tr><td>Alamat Sekolah Asal</td><td>  : <input type=text name='alamat_sekolah' size=50 required='required'></td></tr>
		  <tr><td>No. Telp Sekolah Asal</td><td>  : <input type=number name='telp_sekolah' size=50 required='required'></td></tr>
		  <tr><td>SMK</td><td> : <select name='id_smk'><option value='' selected>- Pilih -</option>
		  $option
		  </select>
		  </td>
		  </tr>
		  <tr><td>Jurusan</td><td> : <select name='id_jurusan'><option value='' selected>- Pilih -</option>
		  $option2
		  </select>
		  </td>
		  </tr>
		  <tr><td>Foto</td><td>  : <input type=file name='foto' size=50 required='required'></td></tr>
		  <tr><td>Bukti Pembayaran</td><td>  : <input type=file name='bukti_pembayaran' size=50 required='required'></td></tr>		  
		  <tr><td>Password</td><td>  : <input type=text name='password' size=50 required='required'></td></tr>
          <tr><td colspan=2><input type=submit value=Registrasi>
                            <a href='login_smk.php'><input type=button value='Login'/></a></td></tr>
		  <td></td><td style=font-size:9px;>*) Anda harus mengisi data dengan benar sesuai dengan kenyataan.</td>
		  <tr><td style=font-size:9px;>*) Format Foto menggunakan .jpg</td><td style=font-size:9px;>*) Kalau ingin mengedit anda harus Login terlebih dahulu</td></tr>
          </table></form><br><br><br>";
					
					?>
		  </div>
          </div>
        </div>
        <div class="sidebar">
          <div class="gadget">
            <h2>Menu</h2>
            <div class="clr"></div>
            <ul id="navmenu">            <?php include "menu_sidebar.php"; ?>
            </ul>
          </div>
          <div class="gadget">
            <h2 class="grey"><span>Informasi</span></h2>
            <div class="clr"></div>
            <?php include "pengertian.php" ?>
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