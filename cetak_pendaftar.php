<?php
include "config/conection.php";
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data_Pendaftar_Wisuda_Online.xls");
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Wisuda Online</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<h2 class=judul>Data Pendaftar Wisuda Online</h2>
          <table width=100% border=1px>
          <tr><th style='text-align:center;'>Checklist</th><th style='text-align:center;'>NIM</th><th style='text-align:center;'>Nama Lengkap</th><th style='text-align:center;'>Jenis Kelamin</th><th style='text-align:center;'>Tempat, Tgl Lahir</th><th style='text-align:center;'>No HP/Telp.</th><th style='text-align:center;'>Alamat Rumah</th><th style='text-align:center;'>Asal SMA/MA/SMK</th><th style='text-align:center;'>Fakultas</th><th style='text-align:center;'>Jurusan</th><th>IPK</th><th>Judul Skripsi</th><th style='text-align:center;'>Tgl Ujian Skripsi</th></tr>
  
<?php  
    $q2 = $connection->query("select a.*, b.NAMA fakultas, c.NAMA prodi, c.ID id_prodi from tb_wisuda a
            left join tb_prodi c on c.ID = a.prodi 
            left join tb_fakultas b on b.ID = c.id_fakultas 
            order by c.ID DESC");
    while($r2=mysqli_fetch_array($q2)){
      echo "<tr>
        <td style='text-align:center;'>";
        if($r2[checklist]==1){
            echo "Sudah";
        }
        else if($r2[checklist]==0){
            echo "Belum";
        }
        echo"
        </td>     
        <td>$r2[nim]</td>     
        <td>$r2[nama]</td>
        <td>$r2[jenis_kelamin]</td>
        <td>$r2[tmpt_lahir], $r2[tgl_lahir]</td>
        <td>$r2[telp_hp]</td>
        <td>$r2[alamat]</td>
        <td>$r2[asal_smu]</td>
        <td>$r2[fakultas]</td>        
        <td>$r2[prodi]</td>
        <td>$r2[ipk]</td>
        <td>$r2[judul_skripsi]</td>
        <td>$r2[tgl_ujian]</td>        
            </tr>";
    }
?>

</table>
</body>
</html>