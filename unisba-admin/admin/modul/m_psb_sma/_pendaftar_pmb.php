<?php
include '../../config/conection.php';
$aksi="modul/m_psb_sma/aksi_psb_sma.php";

if(!isset($_GET['act'])){
$_GET['act']="";
}

switch($_GET["act"]){
  // Tampil SMA
  default:
    echo "<h2 class=judul>Data Pendaftar PMB Online</h2>
          <table width=100% border=1px>
          <tr><th style='text-align:center;'>NISN</th><th style='text-align:center;'>Nama Lengkap</th><th style='text-align:center;'>Jenis Kelamin</th><th style='text-align:center;'>Tempat, Tgl Lahir</th><th style='text-align:center;'>Nilai UN</th><th style='text-align:center;'>Asal Sekolah</th></tr>";
	
    
		$q2 = $connection->query("select * from tb_pmb");
		while($r2=mysqli_fetch_array($q2)){
			echo "<tr>
				<td>$r2[nisn]</td>			
                <td>$r2[nama]</td>
				<td>$r2[jenis_kelamin]</td>
				<td>$r2[tempat_lahir], $r2[tanggal_lahir]</td>
				<td>$r2[nilai_un]</td>				
				<td>$r2[sekolah_asal]</td>
		        </tr>";
		}
      
    echo "</table>";

    break;
}
?>