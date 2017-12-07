<?php
include "config/conection.php";

$nama             = addslashes(strtoupper($_POST['nama']));
$tmpt_lahir       = addslashes(strtoupper($_POST['tempat_lahir']));
$tgl_lahir        = addslashes(strtoupper($_POST['tgl_lahir']));
$nim              = addslashes($_POST['nim']);
$alamat           = addslashes(strtoupper($_POST['alamat']));
$telp_hp          = addslashes($_POST['telp_hp']);
$tgl_ujian        = addslashes($_POST['tgl_ujian']);
$asal_smu         = addslashes(strtoupper($_POST['asal_smu']));
$judul_skripsi    = addslashes(strtoupper($_POST['judul_skripsi']));
$ipk              = addslashes($_POST['ipk']);


if (!empty($_POST['nim'])) {
// $cek_dp = mysqli_fetch_array($connection->query("select count(nim) as jml_nim, * from tb_wisuda where nim = '$_POST[nim]'"));

// if ($cek_dp['jml_nim']<1) {

// if ($connection->query("INSERT INTO tb_wisuda 
//   (nama, 
//     ttl, 
//     jenis_kelamin,    
//     nim, 
//     fakultas,
//     prodi,
//     alamat, 
//     telp_hp, 
//     tgl_ujian, 
//     asal_smu, 
//     judul_skripsi, 
//     ipk, log_time_insert) 
//   VALUES ('$nama', 
//     '$ttl', 
//     '$_POST[jenis_kelamin]', 
//     '$nim', 
//     '$_POST[fakultas]', 
//     '$_POST[prodi]', 
//     '$alamat', 
//     '$telp_hp', 
//     '$tgl_ujian', 
//     '$asal_smu', 
//     '$judul_skripsi', 
//     '$ipk', now()
//     )")
//   or die (mysql_error())){
//          move_uploaded_file($_FILES['foto']['tmp_name'],"upload_foto/$nim.jpg");
// }
// } 

// else if ($cek_dp['jml_nim']>0){
  $connection->query("UPDATE tb_wisuda SET nama='$nama',tmpt_lahir='$tmpt_lahir', tgl_lahir='$tgl_lahir', jenis_kelamin='$_POST[jenis_kelamin]',alamat='$alamat',telp_hp='$telp_hp',tgl_ujian='$tgl_ujian',asal_smu='$asal_smu',judul_skripsi='$judul_skripsi',ipk='$ipk', log_time_update = now() WHERE nim = '$_POST[nim]'");

  // if(isset($_FILES['foto'])){

  // $upload_image = $_FILES['foto']['name'];
  // // tentukan ukuran width yang diharapkan
  // $width_size = 120;

  // $folder = "upload_foto/";

  // $filesave = $folder . $upload_image;

  // move_uploaded_file($_FILES['foto']['tmp_name'],"upload_foto/$nim.jpg");

  // // menentukan nama image setelah dibuat
  // $resize_image = $folder . "r_$nim.jpg";
   
  // // mendapatkan ukuran width dan height dari image
  // list( $width, $height ) = getimagesize($filesave);
   
  // // mendapatkan nilai pembagi supaya ukuran skala image yang dihasilkan sesuai dengan aslinya
  // $k = $width / $width_size;
   
  // // menentukan width yang baru
  // $newwidth = $width / $k;
   
  // // menentukan height yang baru
  // $newheight = $height / $k;
   
  // // fungsi untuk membuat image yang baru
  // $thumb = imagecreatetruecolor($newwidth, $newheight);
  // $source = imagecreatefromjpeg($filesave);
   
  // // men-resize image yang baru
  // imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
   
  // // menyimpan image yang baru
  // imagejpeg($thumb, $resize_image);
   
  // imagedestroy($thumb);
  // imagedestroy($source);

  // }
// }

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
     $file = 'upload_foto/'.$nim.$ext;
       
     if (file_put_contents($file, $data)) {
        echo "<p>Image $i was saved as $file.</p>";
     } else {
        echo '<p>Image $i could not be saved.</p>';
     }  
       
  }
   
}

$q_fj =$connection->query("select a.*, b.NAMA fakultas, c.NAMA prodi, c.ID id_prodi 
                from tb_wisuda a
                LEFT JOIN tb_prodi c ON c.ID = a.prodi
                LEFT JOIN tb_fakultas b ON b.ID = c.id_fakultas 
                WHERE a.prodi = '$_POST[id_prodi]'");

$d_fj = mysqli_fetch_array($q_fj);

?>
<script
  src="http://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<script>
function cetak_form(){
  $('.hal').hide();

  alertify.confirm("Terimakasih sudah Mengisikan data dengan Sebenarnya ! System SIUDA akan segera Menyimpan dan Mencetak Data Pendaftaran anda..", function (e) {
    if (e) {
        $('.hal').show();

    window.print();   
       
    document.location.href = "_.php";     
  } else {
    document.location.href = "_.php"; 
    }
});
}
</script>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Pendaftaran_Wisuda_Online</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<center>
<body onload="cetak_form()">
<div align="center">
<table border="0" >
  <tr>
    <td rowspan="5"><img border="0" src="images/logo.png" width="100" alt="" style=''/></td>
    <td align="center" style="font-size:19px; font-weight:bold; font-family: "Arial Rounded MT Bold","Helvetica Rounded",Arial,sans-serif">YAYASAN BINA CITRA ANAK BANGSA</td>
  </tr>
  <tr>
    <td align="center"  style="font-size:24px; font-weight:bold; font-family: "Arial Rounded MT Bold","Helvetica Rounded",Arial,sans-serif">UNIVERSITAS ISLAM BALITAR</td>
  </tr>
  <tr>
    <td align="center">Akreditasi BAN PT No. 012/BAN-PT/AK-IX/SI/VI/2008 IJIN DIKTI No 147/D/0/2003</td>
  </tr>
  <tr>
    <td align="center">Jl. Majapahit No. 2-4 Blitar - Jawa Timur 66183 Telp/ Fax. (0342) 813145</td>
  </tr>
  <tr>
    <td align="center">Website : www.unisbablitar.ac.id E-mail : unisba@unisbablitar.ac.id</td>
  </tr>
</table>
<hr size="3px;" color="#ff0000" width="70%" align="center">
<!-- START PAGE SOURCE -->
      <center><h3>FORMULIR PENDAFTARAN WISUDA</h3></center>
      <form method='post' action='' enctype='multipart/form-data'>
      <br>
      <br>
      <table style="font-size:16px;">
      <tr><td colspan="2"><b>DATA CALON WISUDAWAN</b></td></tr>
      <tr><td>Nama Lengkap</td><td>  : <?php echo $nama; ?></td></tr>
      <tr><td>Tempat Tanggal Lahir</td><td>  :  <?php echo $tmpt_lahir.", ".$tgl_lahir; ?></td></tr>      
      <tr><td>Jenis Kelamin</td><td>  : <?php echo $_POST['jenis_kelamin']; ?></td> </tr>
      <tr>
      <td>NIM</td><td>  : <?php echo $nim; ?></td>
      </tr>
      <tr><td>Fakultas</td><td>  : <?php echo $d_fj['fakultas']; ?></td></tr>    
      <tr><td>Program Studi</td><td> : <?php echo $d_fj['prodi']; ?></td></tr>
      <tr><td>Alamat Rumah</td><td>  : <?php echo $alamat; ?></td></tr>
      <tr><td>Telp Rumah/HP</td><td>  : <?php echo $telp_hp; ?></td></tr>     
      <tr><td>Tanggal Ujian Skripsi</td><td>  : <?php echo $tgl_ujian; ?></td></tr>
      <tr><td>Asal SMU/SMK/Sederajat</td><td>  : <?php echo $asal_smu; ?></td></tr>
      <tr><td>Judul Skripsi</td><td>  : <?php echo $judul_skripsi; ?></td></tr>
      <tr><td>Indek Prestasi Kumulatif (IPK)</td><td>  : <?php echo $ipk; ?></td></tr>

      <tr>
      <td style="font-size:12px; padding-top: 40px;"  colspan="2">
        <b>Syarat yang wajib dilampirkan :</b><br>
        1. Kartu Tanda Mahasiswa (KTM) Asli<br>
        2. Bukti pembayaran Wisuda dari Bank<br>
        3. Ijasah SMA 2 lembar<br>
        4. Phasfoto 4x6 hitam putih (6 lembar) dan 3x4 berwarna (4 lembar)<br> 
        5. Transkrip Nilai yang di TT Kaprodi<br>
        6. Lembar Pengesahan Skripsi<br>
        7. Bukti Penyerahan Skripsi (Surat Keterangan dari Perpustakaan)<br>
        8. Semua Berkas dimasukkan dalam map snelhecter dengan warna sesuai dengan Fakultas :
        <div style="padding-left:15px; ">
          - Pertanian - Hijau<br>
          - Ekonomi - Kuning<br>
          - Hukum - Merah<br>
          - FKIP - Biru Muda / Biru Langit<br>
          - Teknik - Biru Tua<br>
          - FTI - Ungu<br>
          - Sospol - Silver<br>
          - Peternakan - Orange<br>
        </div>
      </td>
      </tr>
      </table>
      </div>
          <br>  <br>
          </body>
</center>
</html>

<script src="js/alertify.min.js"></script>

<!-- include the core styles -->
<link rel="stylesheet" href="css/alertify.css" />
<!-- include a theme, can be included into the core instead of 2 separate files -->
<link rel="stylesheet" href="css/alertify.default.css" />

<?php } 
else{
  echo "Maaf... Anda mengakses Halaman yang Salah!";
}?>