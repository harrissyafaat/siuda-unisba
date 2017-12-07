<?php
include '../../config/conection.php';
$aksi="modul/m_jurusan/aksi_jurusan.php";

if(!isset($_GET['act'])){
$_GET['act']="";
}

switch($_GET["act"]){
  // Tampil Jurusan SMK
  default:
    echo "<h2 class=judul>Jurusan SMK</h2>
          <input type=button class=button value='Tambah Jurusan SMK' onclick=location.href='?module=jurusan&act=tambahjurusan'>
          <table width=400px border=1px>
          <tr><th>No</th><th>Nama Jurusan</th><th>Kuota</th><th>Opsi</th></tr>";
	
	$p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);	  
	
    $tampil=mysql_query("SELECT * FROM tb_jurusan ORDER BY id_jurusan LIMIT $posisi,$batas");
    $no=$posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td align=left>$no</td>
                <td>$r[nama_jurusan]</td>
				<td>$r[kuota]</td>
                <td align=left><a href=?module=jurusan&act=editjurusan&id_jurusan=$r[id_jurusan]><b>Edit</b></a> | 
	                  <a href=$aksi?module=jurusan&act=hapus&id_jurusan=$r[id_jurusan] onclick=\"return confirm ('Apakah Anda yakin ingin menghapus data ini?')\"><b>Hapus</b></a>
		        </tr>";
    $no++;
    }
    echo "</table>";
	
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM tb_jurusan"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET["halaman"], $jmlhalaman);
	
    echo "<div id=paging>Hal: $linkHalaman</div><br>";
	echo "<div>Total data : $jmldata</div>";

    break;
  
  case "tambahjurusan":
    echo "<h2 class=judul>TAMBAH JURUSAN</h2>
          <form method=POST action='$aksi?module=jurusan&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td>Nama Jurusan</td><td>  : <input type=text name='nama_jurusan' size=30 required='required'></td></tr>
		  <tr><td>Kuota</td><td>  : <input type=text name='kuota' size=30 required='required'></td></tr>
		  </td>
		</tr>
          <tr><td colspan=2><input type=submit class=tombol value=Simpan>
                            <input type=button class=tombol value=Batal onclick=self.history.back()></td></tr>
          </table></form><br><br><br>";
     break;
    
  case "editjurusan":
    $edit = mysql_query("SELECT * FROM tb_jurusan WHERE id_jurusan='$_GET[id_jurusan]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2 class=judul>EDIT JURUSAN</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=jurusan&act=update>
          <input type=hidden name=id_jurusan value=$r[id_jurusan]>
          <table>
          <tr><td>Nama Jurusan</td><td>     : <input type=text name='nama_jurusan' size=30 value='$r[nama_jurusan]'></td></tr>
		  <tr><td>Kuota</td><td>     : <input type=text name='kuota' size=30 value='$r[kuota]'></td></tr>
		  <tr><td colspan=2><input type=submit class=tombol value=Ubah>
                            <input type=button class=tombol value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>