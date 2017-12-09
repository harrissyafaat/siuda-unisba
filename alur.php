<?php
include "config/conection.php";
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Pendaftaran Wisuda Online</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<!-- <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script> -->
</head>
<body>
<!-- START PAGE SOURCE -->
<table>
  <tr>
    <td>Pengumuman Ulang</td>
  </tr>
</table>
<div class="main">
  <div class="main_resize">
    <div class="header">
      <div style="background:#628706;"> <img src="images/header_images.jpg" width="641" height="289" alt="" />
        <div class="logo">
            <img border="0" src="images/logo.png" width="100" alt="" style='margin-left:100px; margin-top:-65px;'/>
          <h1><a href="index.html"><span>WISUDA</span><span><small>UNIVERSITAS ISLAM BALITAR</small><small>Pendaftaran Wisuda Online</small></span></a></h1>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="content_bg">
            <marquee bgcolor="yellow" style="font-size:16px; color:red; margin-top:-18px; margin-bottom:-15px;">Selamat Datang di Sistem Pendaftaran Wisuda Online Universitas Islam Balitar (UNISBA) Blitar</marquee>
        <div class="mainbar">
          <div class="article">
		  <div>
		  <?php
    echo "<h2 style='text-align:left;color:#1976E6;'>Alur Pendaftaran Wisuda</h2><br>
          <table width=100% border=0px style='color:#595959'>";
	$posisi=0;
    $tampil=$connection->query("SELECT * FROM tb_alur ORDER BY id_alur");
    $no=$posisi+1;
	while ($r=$tampil->fetch_array(MYSQLI_BOTH)){
      echo "<tr><td style='vertical-align:top; font-family: arial; font-size: 15px;'>$no. </td>
                <td style='vertical-align:top; font-family: arial; font-size: 15px;'>$r[alur]</td>
		        </tr>";
    $no++;
	}
    echo "</table>";
					?>
      <br>
      <img src="images/AlurPendaftaranWisuda.jpg" alt="Alur Pendaftaran Wisuda" width="600">
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

        </div>
        <div class="clr"></div>
      </div>
    </div>
    <div class="fbg" style="color:white; text-align:center;">
    Copyright @ UNISBA Blitar 2017
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