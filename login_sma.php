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
		  echo "<h2>Login Siswa SMA</h2>
		  <form method='post' action='aksi_login_sma.php'>
          <table>
		  <tr><td>NISN</td><td>  : <input type=text name='nisn' size=50 required='required'></td></tr>
		  <tr><td>Password</td><td>  : <input type=password name='password' size=50 required='required'></td></tr>
          <tr><td colspan=2><input type=submit value=Login></tr>
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