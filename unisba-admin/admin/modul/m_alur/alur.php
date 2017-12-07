<?php
include '../../config/conection.php';
$aksi="modul/m_alur/aksi_alur.php";

if(!isset($_GET['act'])){
$_GET['act']="";
}

switch($_GET["act"]){
  // Tampil Alur
  default:
    echo "<h2 class=judul>Alur</h2>
          <input type=button class=button value='Tambah Alur' onclick=location.href='?module=alur&act=tambahalur'>
          <table>
          <tr><th>No</th><th>Alur</th><th>Opsi</th></tr>";
	
	$p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);	  
	
    $tampil=$connection->query("SELECT * FROM tb_alur ORDER BY id_alur LIMIT $posisi,$batas");
    $no=1;
	while ($r=mysqli_fetch_array($tampil)){
      echo "<tr><td align=left>$no</td>
                <td>$r[alur]</td>
                <td align=left><a href=?module=alur&act=editalur&id_alur=$r[id_alur]><b>Edit</b></a> | 
	                  <a href=$aksi?module=alur&act=hapus&id_alur=$r[id_alur] onclick=\"return confirm ('Apakah Anda yakin ingin menghapus data ini?')\"><b>Hapus</b></a>
		        </tr>";
    $no++;
    }
    echo "</table>";
	
	  $jmldata = mysqli_num_rows($connection->query("SELECT * FROM tb_alur"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET["halaman"], $jmlhalaman);
	
    echo "<div id=paging>Hal: $linkHalaman</div><br>";
	echo "<div>Total data : $jmldata</div>";
	
    break;

  
  case "tambahalur":
    echo "<h2 class=judul>TAMBAH ALUR</h2>
          <form method=POST action='$aksi?module=alur&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td>Alur</td><td>  : <input type=text name='alur' size=30 required='required'></td></tr>
          <tr><td colspan=2><input type=submit class=tombol value=Simpan>
                            <input type=button class=tombol value=Batal onclick=self.history.back()></td></tr>
          </table></form><br><br><br>";
     break;
    
  case "editalur":
    $edit = $connection->query("SELECT * FROM tb_alur WHERE id_alur='$_GET[id_alur]'");
    $r    = mysqli_fetch_array($edit);

    echo "<h2 class=judul>EDIT ALUR</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=alur&act=update>
          <input type=hidden name=id_alur value=$r[id_alur]>
          <table>
          <tr><td>Alur</td><td>     : <input type=text name='alur' size=30 value='$r[alur]'></td></tr>
          <tr><td colspan=2><input type=submit class=tombol value=Ubah>
                            <input type=button class=tombol value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>