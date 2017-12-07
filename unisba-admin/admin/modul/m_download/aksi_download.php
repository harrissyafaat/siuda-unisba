<?php
include "../../../../config/conection.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus download
if ($module=='download' AND $act=='hapus'){
  $connection->query("DELETE FROM tb_download WHERE id_download='$_GET[id_download]'");
  header('location:../../media_admin.php?module='.$module);
}

// Input download
elseif ($module=='download' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
  
  $file_extension = strtolower(substr(strrchr($nama_file,"."),1));

  switch($file_extension){
    case "pdf": $ctype="application/pdf"; break;
    case "exe": $ctype="application/octet-stream"; break;
    case "zip": $ctype="application/zip"; break;
    case "rar": $ctype="application/rar"; break;
    case "doc": $ctype="application/msword"; break;
    case "xls": $ctype="application/vnd.ms-excel"; break;
    case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
    case "gif": $ctype="image/gif"; break;
    case "png": $ctype="image/png"; break;
    case "jpeg":
    case "jpg": $ctype="image/jpg"; break;
    default: $ctype="application/proses";
  }

  if ($file_extension=='php'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PHP');
        window.location=('../../media_admin.php?module=download')</script>";
  }
  else{
    UploadFile($nama_file);
    $connection->query("INSERT INTO tb_download(judul,
                                    nama_file,
                                    tgl_posting) 
                            VALUES('$_POST[judul]',
                                   '$nama_file',
                                   '$tgl_sekarang')");
  header('location:../../media_admin.php?module='.$module);
  }
  }
  else{
    $connection->query("INSERT INTO tb_download(judul,
                                    tgl_posting) 
                            VALUES('$_POST[judul]',
                                   '$tgl_sekarang')");
  header('location:../../media_admin.php?module='.$module);
  }
}

// Update donwload
elseif ($module=='download' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila file tidak diganti
  if (empty($lokasi_file)){
    $connection->query("UPDATE tb_download SET judul     = '$_POST[judul]'
                             WHERE id_download = '$_POST[id]'");
  header('location:../../media_admin.php?module='.$module);
  }
  else{
  $file_extension = strtolower(substr(strrchr($nama_file,"."),1));

  switch($file_extension){
    case "pdf": $ctype="application/pdf"; break;
    case "exe": $ctype="application/octet-stream"; break;
    case "zip": $ctype="application/zip"; break;
    case "rar": $ctype="application/rar"; break;
    case "doc": $ctype="application/msword"; break;
    case "xls": $ctype="application/vnd.ms-excel"; break;
    case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
    case "gif": $ctype="image/gif"; break;
    case "png": $ctype="image/png"; break;
    case "jpeg":
    case "jpg": $ctype="image/jpg"; break;
    default: $ctype="application/proses";
  }

  if ($file_extension=='php'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PHP');
        window.location=('../../media_admin.php?module=download')</script>";
  }
  else{
    UploadFile($nama_file);
    $connection->query("UPDATE tb_download SET judul     = '$_POST[judul]',
                                   nama_file    = '$nama_file'   
                             WHERE id_download = '$_POST[id_download]'");
  header('location:../../media_admin.php?module='.$module);
  }
  }
}
?>
