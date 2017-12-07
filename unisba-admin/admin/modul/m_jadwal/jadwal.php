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
$aksi="modul/m_jadwal/aksi_jadwal.php";

if(!isset($_GET['act'])){
$_GET['act']="";
}

switch($_GET["act"]){
//Tampil jadwal
default:
    echo "<h2 class=judul>JADWAL</h2>
          <input type=button class=button value='Tambah Jadwal' onclick=location.href='?module=jadwal&act=tambahjadwal'>
          <table width=500px border=1px>
         <tr><th>No</th><th>Kegiatan</th><th>Tanggal</th><th>Waktu</th><th>Lokasi</th><th>Opsi</th></tr>";
		  
	$p      = new Paging;
    $batas  = 20;
    $posisi = $p->cariPosisi($batas);
	
    $tampil=$connection->query("SELECT * FROM tb_jadwal ORDER BY id_jadwal LIMIT $posisi,$batas");
    $no=$posisi+1;
	while ($r=mysqli_fetch_array($tampil)){
      echo "<tr><td align=left>$no</td>
                <td>$r[kegiatan]</td>
				<td>$r[tanggal]</td>
				<td>$r[waktu]</td>
				<td>$r[lokasi]</td>
				<td align=left><a href=?module=jadwal&act=editjadwal&id_jadwal=$r[id_jadwal]><b>Edit</b></a> | 
	                  <a href=$aksi?module=jadwal&act=hapus&id_jadwal=$r[id_jadwal] onclick=\"return confirm ('Apakah Anda yakin ingin menghapus data ini?')\"><b>Hapus</b></a>
		        </tr>";
    $no++;
	}
    echo "</table>";
	$jmldata = mysqli_num_rows($connection->query("SELECT * FROM tb_jadwal"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET["halaman"], $jmlhalaman);
	
    echo "<div id=paging>Hal: $linkHalaman</div><br>";
	echo "<div>Total data : $jmldata</div>";

	
    break;


	case "tambahjadwal":
    echo "<h2 class=judul>TAMBAH JADWAL</h2>
		  <form method=POST action='$aksi?module=jadwal&act=input' enctype='multipart/form-data' autocomplete='off'>
          <table class=demo>
		  <tr><td>Kegiatan</td><td>  : <input type=text name='kegiatan' size=13 required='required'></td></tr>
		  <tr><td>Tanggal</td><td>  : <input type=text name='tanggal' size=30 required='required'></td></tr>
		  <tr><td>Waktu</td><td>  : <input type=text name='waktu' size=13 required='required'></td></tr>
		  <tr><td>Lokasi</td><td>  : <input type=text name='lokasi' size=13 required='required'></td></tr>
          <tr><td colspan=2><input type=submit class=tombol value=Simpan>
                            <input type=button class=tombol value=Batal onclick=self.history.back()></td></tr>
          </table></form><br><br><br>";
	break;

		  
	case "editjadwal":
    $edit = $connection->query("SELECT * FROM tb_jadwal WHERE id_jadwal=$_GET[id_jadwal]")or die(mysql_error());
    $r    = mysqli_fetch_array($edit);

    echo "<h2 class=judul>EDIT JADWAL</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=jadwal&act=update  autocomplete='off'>
          <input type=hidden name=id_jadwal value=$r[id_jadwal]>
		  <table class=demo>
          <tr><td>Kegiatan</td><td>     : <input type=text name='kegiatan' size=30 value='$r[kegiatan]'></td></tr>
		  <tr><td>Tanggal</td><td>     : <input type=text name='tanggal' size=13 value='$r[tanggal]'></td></tr>
		  <tr><td>Waktu</td><td>     : <input type=text name='waktu' size=30 value='$r[waktu]'></td></tr>
		  <tr><td>Lokasi</td><td>     : <input type=text name='lokasi' size=30 value='$r[lokasi]'></td></tr>
		  <tr><td colspan=2><input type=submit class=tombol value=Ubah>
                            <input type=button class=tombol value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  		  
}
?>
