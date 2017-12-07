<?php
include "config/conection.php";

header('Content-Type: application/vnd.ms-word');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Content-disposition: attachment; filename=buku_wisuda.doc');
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Data Alumni UNISBA</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body style="text-align: center;">
<!-- <h2 class=judul>Data Alumni UNISBA Blitar</h2> -->

<table width=100% border=2px style="float: left; font-family: arial; font-size: 13px;">
<?php  
    $q2 = $connection->query("select a.*, b.NAMA fakultas, c.NAMA prodi, c.ID id_prodi 
                from tb_wisuda a
                LEFT JOIN tb_prodi c ON c.ID = a.prodi
                LEFT JOIN tb_fakultas b ON b.ID = c.id_fakultas 
                order by c.ID DESC");
    while($r2=mysqli_fetch_array($q2)){
      echo "
        <tr>
        <td rowspan=8 style='height:120px'>";

        $actual_link = "http://$_SERVER[HTTP_HOST]";

        if(file_exists("upload_foto/$r2[nim].jpg")){
            echo "<img src='$actual_link/wisuda/upload_foto/$r2[nim].jpg' style='height:120px'>";
        }
        else{
            echo "<img src='$actual_link/wisuda/images/avatar.jpg' style='height:120px' width='120px'>";
        }
        echo "
        </td> 
        <td style='width:100px;'>NAMA</td><td>: $r2[nama]</td>   
        </tr>
        <tr>
        <td>NIM</td><td>: $r2[nim]</td>   
        </tr>
        <tr>
        <td>Jenis Kelamin</td><td>: $r2[jenis_kelamin]</td>   
        </tr>
         <tr>
        <td>Tempat, Tgl Lahir</td><td>: $r2[tmpt_lahir], $r2[tgl_lahir]</td>   
        </tr>
        <tr>
        <td>Program Studi</td><td>: $r2[prodi]</td>   
        </tr>           
        <tr>
        <td>No Telepon</td><td>: $r2[telp_hp]</td>   
        </tr>
        <tr>
        <td>Alamat</td><td>: $r2[alamat]</td>   
        </tr> 
        <tr>
        <td style='vertical-align: top;'>Judul Skripsi</td><td>: $r2[judul_skripsi]</td>   
        </tr> 
        <tr style='height:25px;'><td></td></tr>      
        ";
    }
?>

</table>

</body>
</html>

<style type="text/css">

 @page {
  size: A4;
  margin: 80px, 80px, 80px, 80px;
 }

@media print {
  html, body {
    width: 210mm;
    height: 297mm;
  }
  /* ... the rest of the rules ... */
}
</style>