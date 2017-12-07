<?php
session_start();
date_default_timezone_set("asia/jakarta");
 if(!isset($_SESSION['username']) && isset($_SESSION['username'])){
	 header('location:../index.php');
} 
?>
<head>
<title>Halaman Admin</title>
<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery.js"></script>
<script src="../js/js.js"></script>
<script>
	$(function(){
		$('.main-wrap').fadeIn(800);
	});
</script>
</head>

<body>	
	<div class="header" style="height:25px">
		<a href="logout.php" class="logout">
			Logout
		</a>
	</div>

	<div class="sidebar">
			<div class="logo"><center><img src="../../images/logo.png" alt="logo" height="120" />
			<br>
			<div style="margin-top: -8px; font-weight: bold; font-family: arial; font-size: 14px; color: ffffff;">SIUDA UNISBA</div>
			</center></div>
				<div class="menu">

					<ul><li><a href="#">MENU UTAMA</a>
						<ul>
							<?php include "menu.php"; ?>
						</ul>
						</li>
					</ul>

					<ul><li><a href="#">DATA PENDAFTAR</a>
						<ul>
							<?php include "menu3.php"; ?>
						</ul>
						</li>
					</ul>
					<ul><li><a href="#">ADMIN</a>
						<ul>
							<?php include "menu4.php"; ?>
						</ul>
						</li>
					</ul>
				</div>
	</div>

	<div class="main">
			<div class="main-wrap"><?php include "content.php"; ?></div>
	</div>
	<p class=footer>Copyright © 2017 UNISBA Blitar  <a href='' target='_blank'></a></p>
	
		
</body>