<head>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
<link href="../js/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
<script>
	$(document).ready(function() {
		$( ".datepicker" ).datepicker({
			dateFormat: "yy-mm-dd",
			changeMonth: true,
			changeYear: true
	    });
	});
</script>
</head>

<?php
include '../../config/conection.php';
$aksi="modul/m_berita/aksi_berita.php";
if(!isset($_GET['act'])){
$_GET['act']="";
}
switch($_GET["act"]){
//Tampil Berita
default:
    echo "<h2 class=judul>PENGUMUMAN</h2>
          <table width=750px border=1px>
          <tr><th>No</th><th>Judul</th><th>Deskripsi</th><th>Tanggal</th><th>Opsi</th></tr>";
		  
	$p      = new Paging;
    $batas  = 5;
    $posisi = $p->cariPosisi($batas);

    $tampil=$connection->query("SELECT * FROM tb_berita ORDER BY tanggal LIMIT $posisi,$batas");
    $no=$posisi+1;
    while ($r=mysqli_fetch_array($tampil)){
      echo "<tr><td align=left>$no</td>
                <td>$r[judul]</td>
				<td>$r[deskripsi]</td>
				<td>$r[tanggal]</td>
                <td align=left><a href=?module=berita&act=editberita&id_berita=$r[id_berita]><b>Edit</b></a>
                    </td>
		        </tr>";
    $no++;
    }
    echo "</table>";
	$jmldata = mysqli_num_rows($connection->query("SELECT * FROM tb_berita"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET["halaman"], $jmlhalaman);
	
    echo "<div id=paging>Hal: $linkHalaman</div><br>";
	echo "<div>Total data : $jmldata</div>";
	
	
    break;


	case "tambahberita":
    echo "<h2 class=judul>TAMBAH BERITA</h2>
		  <form method=POST action='$aksi?module=berita&act=input' enctype='multipart/form-data' autocomplete='off'>
          <table class=demo>
		  <tr><td>Judul</td><td>  : <input type=text name='judul' size=30 required='required' style='width:850px'></td></tr>
		  <tr><td>Deskripsi</td><td> : <textarea name='deskripsi' style='width: 850px; height: 150px;' required='required'></textarea></td></tr>
          <tr><td colspan=2><input type=submit class=tombol value=Simpan>
                            <input type=button class=tombol value=Batal onclick=self.history.back()></td></tr>
          </table></form><br><br><br>";
	break;

		  
	case "editberita":
    $edit = $connection->query("SELECT * FROM tb_berita WHERE id_berita='$_GET[id_berita]'");
    $r    = mysqli_fetch_array($edit);

    echo "<h2 class=judul>EDIT BERITA</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=berita&act=update  autocomplete='off'>
          <input type=hidden name=id_berita value=$r[id_berita]>
          <table class=demo>
		  <tr><td>Judul</td><td>     : <input type=text name='judul' size=30 value='$r[judul]' style='width:850px'></td></tr>
		  <tr><td>Deskripsi</td>  <td> : <textarea name='deskripsi' style='width: 850px; height: 150px;'>$r[deskripsi]</textarea></td></tr>

		  <tr><td colspan=2><input type=submit class=tombol value=Ubah>
                            <input type=button class=tombol value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  		  
}
?>
