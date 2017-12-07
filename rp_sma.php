<?php
include "config/conection.php";
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PENERIMAAN MAHASISWA BARU ONLINE</title>
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
        <div class="logo">
            <img border="0" src="images/logo.png" width="100" alt="" style='margin-left:100px; margin-top:-65px;'/>
          <h1><a href="index.html">P<span>M</span>B<span>Online</span><span><small>UNIVERSITAS ISLAM BALITAR</small><small>Penerimaan Mahasiswa Baru</small></span></a></h1>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="content_bg">
        <div class="mainbar">
          <div class="article">
		  <div>
		  <?php
    echo "<h2 class=judul>Penerimaan Mahasiswa Baru</h2>
          <table width=100% border=1px style='font-size:11px;'>
          <tr><th style='text-align:center;'>No</th><th style='text-align:center;'>NISN</th><th style='text-align:center;'>Nama Lengkap</th><th style='text-align:center;'>Jenis Kelamin</th><th style='text-align:center;'>Tempat, Tgl Lahir</th><th style='text-align:center;'>Nilai UN</th><th style='text-align:center;'>Asal Sekolah</th></tr>";
	    
    $q2 = $connection->query("select * from tb_pmb");
    $no = 1;
    while($r2=mysqli_fetch_array($q2)){
      echo "<tr>
        <td align='center'>$no</td>
        <td>$r2[nisn]</td>      
        <td>$r2[nama]</td>
        <td>$r2[jenis_kelamin]</td>
        <td>$r2[tempat_lahir], $r2[tanggal_lahir]</td>
        <td>$r2[nilai_un]</td>        
        <td>$r2[sekolah_asal]</td>
            </tr>";
      $no++;
    }

    echo "</table>";
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
            <?php include "pengertian.php" ?>
          </div>
          <div class="gadget">
            <h2><span>Pengunjung</span></h2>
            <br>
            <div class="clr"></div>
            <center>

            <!-- hitwebcounter Code START -->
            <img src="http://hitwebcounter.com/counter/counter.php?page=6304054&style=0025&nbdigits=9&type=ip&initCount=0" title="" Alt="Unique visitor" border="0" >
            <br>
            <img alt="Page View" border="0" src="http://24counter.com/online/ccc.php?id=1455074154" style="width:  175px;">
            <br>
            </center>
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