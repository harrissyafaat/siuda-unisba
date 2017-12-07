<?php
include '../../config/conection.php';
$aksi="modul/m_psb_smk/aksi_psb_smk.php";

if(!isset($_GET['act'])){
$_GET['act']="";
}

switch($_GET["act"]){
  // Tampil SMK
  default:
    echo "<h2 class=judul>PMB SMK</h2>
          <table width=500px border=1px>
          <tr><th>Nama</th><th>NISN</th><th>No.Ijasah</th><th>Nilai UN</th><th>Asal Sekolah</th><th>Sekolah SMK</th><th>Jurusan</th></tr>"; 	  
	
    $tampil=$connection->query("SELECT * from tb_jurusan");
    while ($r=mysqli_fetch_array($tampil)){
		$q2 = $connection->query("select * from tb_psb_smk where id_jurusan =$r[id_jurusan] order by danem desc limit $r[kuota]");
		while($r2=mysqli_fetch_array($q2)){
			$q3=$connection->query("select * from tb_jurusan where id_jurusan=$r2[id_jurusan]");
			$r3=mysqli_fetch_array($q3);
			$q4=$connection->query("select * from tb_smk where id_smk=$r2[id_smk]");
			$r4=mysqli_fetch_array($q4);
			echo "
				<tr>
                <td>$r2[nama]</td><td>$r2[nisn]</td><td>$r2[no_ijasah]</td><td>$r2[danem]</td><td>$r2[sekolah_asal]</td><td>$r4[nama_smk]</td><td>$r3[nama_jurusan]</td>
				</tr>
				";
		}
    }
    echo "</table>";

	
    break;
}
?>