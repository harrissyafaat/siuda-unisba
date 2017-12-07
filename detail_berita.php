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
      <div style="background:#628706;"> <img src="images/header_images.jpg" width="641" height="289" alt="" />
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
					$q= $connection->query("select * from tb_berita where id_berita='$_GET[id_berita]'");
					$r=$q->fetch_array(MYSQLI_BOTH);
						echo "
							<table>
								<tr>
									<td style='text-align:left;font-size:19px;color:#1976E6;'>$r[judul]</td>
								</tr>
								<tr>
									<td style='text-align:left;font-size:12px;color:#666666;'>$r[tanggal]</td>
								</tr>
								<tr>
									<td style='text-align:left;'>$r[deskripsi]</td>
								</tr>
							</table><br>
						";
					
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