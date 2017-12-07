<?php
include "config/conection.php";

session_start();
 if(isset($_SESSION['nim'])){
   header('location:f_daftar.php');
} 
?>
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Pendaftaran Wisuda Online</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="unisba-admin/style/style_login.css" rel="stylesheet" type="text/css" />

 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "dd/mm/yy",
      yearRange: '1950:+0'
    });
  } );
  </script>
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
	// if($_SESSION['nim']==''){
?>

	<div id="box"  style="margin-top: 55px;">
<div class="elements">
<div class="avatar"></div>
<div style="margin-bottom: 10px; text-align: center;font-size: 14px; color:#595959"><center>Login Mahasiswa</center></div> 
<form method="post" action="cek_login.php">
<input type="text" name="username" class="username" value="Username" onfocus="this.value=''" />
<input type="password" name="password" class="password" value="Password" onfocus="this.value=''" />
<input type="submit" name="submit" class="submit" value="Sign In" />
</form>
</div>
</div>
<?php
// }
?>
         <!-- END Form Pendaftaran -->
          
          <!--      
          <h2>Pendaftaran Wisuda Online 2016/2017 Ditutup</h2>
          <p style="font-size: 16px;">
             Untuk Informasi dan Pengumuman Daftar Calon Wisuda, Bisa di Download di Menu Download Web ini.
          </p> 
          -->
          
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
            <?php include "pengertian.php"; ?>
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

<script>
    function pilih_prodi(value)
    {
      $.ajax({
        type:'post',
        url: 'pilih_prodi.php',
        data: {
          get_option :value
        },
        success: function(response){
          document.getElementById("prodi").innerHTML=response;
        }
      });

    }

  function maxLengthCheck(object) {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }
</script>
