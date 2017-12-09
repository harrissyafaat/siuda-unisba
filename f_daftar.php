<?php
include "config/conection.php";

session_start();
date_default_timezone_set("asia/jakarta");
 if(!isset($_SESSION['nim'])){
   header('location:daftar.php');
} 

$q_fj =$connection->query("select a.*, b.ID id_fakultas, b.NAMA fakultas, c.NAMA prodi, c.ID id_prodi 
                from tb_wisuda a
                LEFT JOIN tb_prodi c ON c.ID = a.prodi
                LEFT JOIN tb_fakultas b ON b.ID = c.id_fakultas 
                WHERE a.nim = $_SESSION[nim]");

$d_fj = mysqli_fetch_array($q_fj);

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Pendaftaran Wisuda Online Baru</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />

 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script src="js/alertify.min.js"></script>

<!-- include the core styles -->
<link rel="stylesheet" href="css/alertify.css" />
<!-- include a theme, can be included into the core instead of 2 separate files -->
<link rel="stylesheet" href="css/alertify.default.css" />
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
<body style="color:#595959">

<?php
 
if (count($_POST)) {
     
  $img = explode('|', $_POST['img']);
 
  for ($i = 0; $i < count($img) - 1; $i++) {
       
     if (strpos($img[$i], 'data:image/jpeg;base64,') === 0) {
        $img[$i] = str_replace('data:image/jpeg;base64,', '', $img[$i]);  
        $ext = '.jpg';
     }
     if (strpos($img[$i], 'data:image/png;base64,') === 0) { 
        $img[$i] = str_replace('data:image/png;base64,', '', $img[$i]); 
        $ext = '.png';
     }
       
     $img[$i] = str_replace(' ', '+', $img[$i]);
     $data = base64_decode($img[$i]);
     $file = 'upload_foto/'.$_SESSION['nim'].$ext;
       
     if (file_put_contents($file, $data)) {
        echo "<p>Image $i was saved as $file.</p>";
     } else {
        echo '<p>Image $i could not be saved.</p>';
     }  
       
  }
   
}
                      
?>

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

  <!-- START Form Pendaftaran -->
    <div class="header" style="height:25px">
    <a href="logout.php" style="font-size: 21px;">
      <button style="height: 25px; width: 65px; float: left;"> Logout </button>
    </a>
    <table border="1" cellpadding="5" style="float: right;">

    <?php
      if($d_fj['check_akad']==1){
    ?>
    <tr><td><b style="color: red; font-size: 16px;">LULUS / WISUDA</b></td></tr>
    <?php 
      }
      else{
    ?>
    <tr><td><b style="color: red; font-size: 16px;">BERKAS BELUM LENGKAP</b></td></tr>
    <?php } ?>
    </table>
  </div>
  <h2>FORMULIR PENDAFTARAN</h2>

      <form method='post' action='cetak_wisuda.php' enctype='multipart/form-data'>
          <table>
      <tr><td><b>DATA CALON WISUDAWAN</b></td></tr>
      <tr><td>Nama Lengkap</td><td>  : <input value="<?php echo $d_fj['nama']; ?>" placeholder=' Sesuai ijasah terakhir' style="text-transform:uppercase;" type=text name='nama' size=50 required='required'></td></tr>
      <tr><td>Tempat, Tanggal Lahir</td><td>  :  <input style="text-transform:uppercase;" placeholder=' Tempat Lahir' type=text name='tempat_lahir' value="<?php echo $d_fj['tmpt_lahir']; ?>" size=18 required='required'>, <input style="text-transform:uppercase;" value="<?php echo $d_fj['tgl_lahir']; ?>" placeholder=' Tgl Lahir' class="datepicker" type=text name='tgl_lahir' size=10 required='required' readonly=""></td></tr>      
      <tr><td>Jenis Kelamin</td><td>  : 
      <?php 
      if($d_fj['jenis_kelamin']=='Laki-Laki'){ ?>
        <input type=radio name='jenis_kelamin' value='Laki-Laki' checked>Laki-Laki
        <input type=radio name='jenis_kelamin' value='Perempuan'>Perempuan
      <?php
      } else if($d_fj['jenis_kelamin']=='Perempuan'){
      ?>
      <input type=radio name='jenis_kelamin' value='Laki-Laki'>Laki-Laki
      <input type=radio name='jenis_kelamin' value='Perempuan' checked>Perempuan      
      <?php
      } else{
      ?>
      <input type=radio name='jenis_kelamin' value='Laki-Laki' checked>Laki-Laki
      <input type=radio name='jenis_kelamin' value='Perempuan'>Perempuan
      <?php
        }
      ?>

      </td></tr>
      <tr><td>NIM</td><td>  : <input style="text-transform:uppercase;" type=number name='nim' size=17 required='required' value="<?php echo $_SESSION['nim']; ?>" readonly></td></tr>
      <tr><td>Fakultas</td><td>  : <input type='text' value="<?php echo $d_fj['fakultas']; ?>" name='fakultas' style="width: 225; text-transform:uppercase;" readonly></td></tr>   
      <tr><td>Program Studi</td><td>  : <input type='text' name='prodi' value="<?php echo $d_fj['prodi']; ?>" style="width: 225; text-transform:uppercase;" readonly>
      <input type='hidden' value="<?php echo $d_fj['id_prodi']; ?>" name='id_prodi'>
      </td></tr>
      <tr><td>Alamat Rumah</td><td> : <textarea name='alamat' style='max-width:322px; min-width:365px; height: 60px; text-transform:uppercase;' required='required'><?php echo $d_fj['alamat']; ?></textarea></td></tr>
      <tr><td>Telp Rumah/HP</td><td>  : <input oninput="maxLengthCheck(this)" type='number' name='telp_hp' value="<?php echo $d_fj['telp_hp']; ?>" maxlength="13" style="width: 115;" required='required'></td></tr>
      <tr><td>Tanggal Ujian Skripsi</td><td>  : <input type=text value="<?php echo $d_fj['tgl_ujian']; ?>" class="datepicker" name='tgl_ujian' size=10 placeholder="TGL UJIAN" required='required' readonly=""></td></tr> 
      <tr><td>Asal SMU/SMK/Sederajat</td><td>  : <input style="text-transform:uppercase;" type=text value="<?php echo $d_fj['asal_smu']; ?>" name='asal_smu' size=50 required='required'></td></tr>
      <tr><td>Judul Skripsi</td><td>  : <textarea name='judul_skripsi' style='max-width:322px; min-width:365px; height: 60px; text-transform:uppercase;' required='required'><?php echo $d_fj['judul_skripsi']; ?></textarea></td></tr>
      <tr><td>Indek Prestasi Kumulatif (IPK)</td><td>  : <input type=number oninput="maxLengthCheck(this)" value="<?php echo $d_fj['ipk']; ?>" maxLength="5" step=0.01 name='ipk' style="width:60px;" required='required'></td></tr>
      <tr><td>Foto</td><td>  :   <input id="inp_files" type="file" multiple="multiple">
      <input id="inp_img" name="img" type="hidden" value=""></td></tr>
      <tr><td></td><td style=font-size:11px;>*) Foto Hitam Putih dan menggunakan format file .jpg</td></tr>
      <tr><td></td><td style=font-size:11px;>
        <?php
        $actual_link = "http://$_SERVER[HTTP_HOST]";

        if(file_exists("upload_foto/$_SESSION[nim].jpg")){
            echo "<img border='4' src='$actual_link/wisuda/upload_foto/$_SESSION[nim].jpg' style='width:120px'>";
        }
        else{
            echo "<img border='4' src='$actual_link/wisuda/images/avatar.jpg' style='width:120px'>";
        }
        ?>
      </td></tr>

      </table>
      <table>
              <tr>
      <td style="padding-bottom: 29px;"><input type="checkbox" name="cek" id="cek" style=""> </td>
        <td colspan="2"><p>
          Menyatakan dengan sesungguhnya bahwa seluruh informasi/dokumen yang saya berikan pada saat pendaftaran Wisuda Online ini adalah benar dan dapat dipertanggungjawabkan. 
        </p></td>
      </tr>
      <tr><td colspan=2  style="padding-top:30px; "><input onclick='return konfirmasi()' type=submit value=" Save & Print " style=" float:right; height:30px; width:100px;">
      </td></tr>
      </table>
      </form>
            <br>
          <p>
            <b>Syarat yang wajib dilampirkan :</b><br>
            1. Kartu Tanda Mahasiswa (KTM) Asli<br>
            2. Bukti pembayaran Wisuda dari Bank<br>
            3. Ijasah SMA 2 lembar<br>
            4. Phasfoto 4x6 hitam putih (6 lembar) dan 3x4 berwarna (4 lembar)<br> 
            5. Transkrip Nilai yang di TT Kaprodi<br>
            6. Lembar Pengesahan Skripsi<br>
            7. Bukti Penyerahan Skripsi (Surat Keterangan dari Perpustakaan)<br>
            8. Semua Berkas dimasukkan dalam map snelhecter dengan warna sesuai dengan Fakultas :
            <div style="padding-left:15px; margin-top:-15px;">
              - Pertanian - Hijau<br>
              - Ekonomi - Kuning<br>
              - Hukum - Merah<br>
              - FKIP - Biru Muda / Biru Langit<br>
              - Teknik - Biru Tua<br>
              - FTI - Ungu<br>
              - Sospol - Silver<br>
              - Peternakan - Orange<br>
            </div>

          </p>
          <br>  <br> 

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
    Copyright @ UNISBA Blitar 2016
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
 
  function fileChange(e) { 
     document.getElementById('inp_img').value = '';
 
     for (var i = 0; i < e.target.files.length; i++) { 
     
        var file = e.target.files[i];
 
        if (file.type == "image/jpeg" || file.type == "image/png") {
 
           var reader = new FileReader();  
           reader.onload = function(readerEvent) {
 
              var image = new Image();
              image.onload = function(imageEvent) { 
 
                 var max_size = 200;
                 var w = image.width;
                 var h = image.height;
                   
                 if (w > h) {  if (w > max_size) { h*=max_size/w; w=max_size; }
                 } else     {  if (h > max_size) { w*=max_size/h; h=max_size; } }
               
                 var canvas = document.createElement('canvas');
                 canvas.width = w;
                 canvas.height = h;
                 canvas.getContext('2d').drawImage(image, 0, 0, w, h);
                 if (file.type == "image/jpeg") {
                    var dataURL = canvas.toDataURL("image/jpeg", 1.0);
                 } else {
                    var dataURL = canvas.toDataURL("image/png");    
                 }
                 document.getElementById('inp_img').value += dataURL + '|';
              }
              image.src = readerEvent.target.result;
           }
           reader.readAsDataURL(file);
        } else {
           document.getElementById('inp_files').value = ''; 
           alert('Please only select images in JPG- or PNG-format.');   
           return false;
        }
     }
 
  }
 
  document.getElementById('inp_files').addEventListener('change', fileChange, false);   
         
</script>

<script type="text/javascript" language="JavaScript">
 function konfirmasi()
 {
 var cek = document.getElementById("cek").checked;
 if(cek==false){
  alertify.alert("Maaf ! Silahkan Centang Cehckbox Pernyataan Kebenaran dan Pertanggungjawaban Informasi/ Dokumen.");
 }

if (cek == true) return true;
 else return false;
}


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
