<?php
include '../../config/conection.php';
$aksi="modul/m_sma/aksi_sma.php";

if(!isset($_GET['act'])){
$_GET['act']="";
}

switch($_GET["act"]){
  // Tampil SMA
  default:
    echo "<h2 class=judul>SMA</h2>
          <input type=button class=button value='Tambah SMA' onclick=location.href='?module=sma&act=tambahsma'>
          <table width=400px border=1px>
          <tr><th>No</th><th>Nama SMA</th><th>Kuota</th><th>Opsi</th></tr>";
	
	$p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);	  
	
    $tampil=$connection->query("SELECT * FROM tb_sma ORDER BY id_sma LIMIT $posisi,$batas");
    $no=$posisi+1;
    while ($r=mysqli_fetch_array($tampil)){
      echo "<tr><td align=left>$no</td>
                <td>$r[nama_sma]</td>
				<td>$r[kuota]</td>
                <td align=left><a href=?module=sma&act=editsma&id_sma=$r[id_sma]><b>Edit</b></a> | 
	                  <a href=$aksi?module=sma&act=hapus&id_sma=$r[id_sma] onclick=\"return confirm ('Apakah Anda yakin ingin menghapus data ini?')\"><b>Hapus</b></a>
		        </tr>";
    $no++;
    }
    echo "</table>";
	
	$jmldata = mysqli_num_rows($connection->query("SELECT * FROM tb_sma"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET["halaman"], $jmlhalaman);
	
    echo "<div id=paging>Hal: $linkHalaman</div><br>";
	echo "<div>Total data : $jmldata</div>";

    break;
  
  case "tambahsma":
    echo "<h2 class=judul>TAMBAH SMA</h2>
          <form method=POST action='$aksi?module=sma&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td>Nama SMA</td><td>  : <input type=text name='nama_sma' size=30 required='required'></td></tr>
		  <tr><td>Kuota</td><td>  : <input type=text name='kuota' size=30 required='required'></td></tr>
		  </td>
		</tr>
          <tr><td colspan=2><input type=submit class=tombol value=Simpan>
                            <input type=button class=tombol value=Batal onclick=self.history.back()></td></tr>
          </table></form><br><br><br>";
     break;
    
  case "editsma":
    $edit = $connection->query("SELECT * FROM tb_sma WHERE id_sma='$_GET[id_sma]'");
    $r    = mysqli_fetch_array($edit);

    echo "<h2 class=judul>EDIT SMA</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=sma&act=update>
          <input type=hidden name=id_sma value=$r[id_sma]>
          <table>
          <tr><td>Nama SMA</td><td>     : <input type=text name='nama_sma' size=30 value='$r[nama_sma]'></td></tr>
		  <tr><td>Kuota</td><td>     : <input type=text name='kuota' size=30 value='$r[kuota]'></td></tr>
		  <tr><td colspan=2><input type=submit class=tombol value=Ubah>
                            <input type=button class=tombol value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>