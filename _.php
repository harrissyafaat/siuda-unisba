<?php
include "config/conection.php";
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Pendaftaran Wisuda Online Suka</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />


</head>
<body>
<!-- START PAGE SOURCE -->
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
		  $q= $connection->query("select * from tb_berita order by id_berita desc limit 1");
					while($r=mysqli_fetch_array($q)){
						if(strlen($r['deskripsi'])>1000){
							$deskripsi=substr($r['deskripsi'],0,1000)."<b style='font-weight:bold;' ><a href='detail_berita.php?id_berita=$r[id_berita]'><br>Read More</a></b>";
						}
						else{
							$deskripsi=$r['deskripsi'];
						}
						echo "
            <br>
							<table style='margin-left:20px; color:#595959'>
								<tr>
									<td style='text-align:left;font-size:19px;color:#1976E6;'>$r[judul]</td>
								</tr>
								<tr>
									<td style='text-align:left;font-size:12px;color:#666666;'></td>
								</tr>
								<tr>
									<td style='font-family: arial; font-size: 15px;'>$r[deskripsi]</td>
								</tr>
							</table><br>
						";
					}
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