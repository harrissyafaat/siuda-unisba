<?php
include '../../config/conection.php';
$aksi="modul/m_download/aksi_download.php";
if(!isset($_GET['act'])){
$_GET['act']="";
}
switch($_GET['act']){
  // Tampil Download
  default:
    echo "<h2 class=judul>Download</h2>
          <input type=button class=button value='Tambah Download' onclick=location.href='?module=download&act=tambahdownload'>
          <table>
          <tr><th>no</th><th>judul</th><th>nama file</th><th>tgl. posting</th><th>aksi</th></tr>";

    $p      = new Paging;
    $batas  = 20;
    $posisi = $p->cariPosisi($batas);

    $tampil=$connection->query("SELECT * FROM tb_download ORDER BY id_download DESC LIMIT $posisi,$batas");

    $no = $posisi+1;
    while ($r=mysqli_fetch_array($tampil)){
      echo "<tr><td>$no</td>
                <td>$r[judul]</td>
                <td>$r[nama_file]</td>
                <td>$r[tgl_posting]</td>
                <td align=left><a href=?module=download&act=editdownload&id_download=$r[id_download]><b>Edit</b></a> | 
	                  <a href=$aksi?module=download&act=hapus&id_download=$r[id_download] onclick=\"return confirm ('Apakah Anda yakin ingin menghapus data ini?')\"><b>Hapus</b></a></td>
		        </tr>";
    $no++;
    }
    echo "</table>";
    $jmldata=mysqli_num_rows($connection->query("SELECT * FROM tb_download"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

    echo "<div id=paging>$linkHalaman</div><br>";
    echo "<div>Total data : $jmldata</div>";    
    break;
  
  case "tambahdownload":
    echo "<h2 class=judul>Tambah Download</h2>
          <form method=POST action='$aksi?module=download&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td>Judul</td><td>  : <input type=text name='judul' size=30></td></tr>
          <tr><td>File</td><td> : <input type=file name='fupload' size=40></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form><br><br><br>";
     break;
    
  case "editdownload":
    $edit = $connection->query("SELECT * FROM tb_download WHERE id_download='$_GET[id_download]'");
    $r    = mysqli_fetch_array($edit);

    echo "<h2 class=judul>Edit Download</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=download&act=update>
          <input type=hidden name=id value=$r[id_download]>
          <table>
          <tr><td>Judul</td><td>     : <input type=text name='judul' size=30 value='$r[judul]'></td></tr>
          <tr><td>File</td><td>    : $r[nama_file]</td></tr>
          <tr><td>Ganti File</td><td> : <input type=file name='fupload' size=30> *)</td></tr>
          <tr><td colspan=2>*) Apabila file tidak diubah, dikosongkan saja.</td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>
