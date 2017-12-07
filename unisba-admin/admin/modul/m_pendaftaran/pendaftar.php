<script>
	$(document).ready(function()
{
$("#username").change(function()
{
var username = $("#username").val();
$("#pesan").html("<img src='loading.gif'>Cek username ...");

if(username=='')
{
$("#pesan").html('<img src="salah.png"> username tidak boleh kosong');
$("#username").css('border', '3px #C33 solid');
}
else
$.ajax({type: "POST", url: "validation.php", data: "username="+username, success:function(data)
{
if(data==0)
{
$("#pesan").html('<img src="true.png">');
$("#username").css('border', '3px #090 solid');
}
else
{
$("#pesan").html('<img src="salah.png"> username telah digunakan');
$("#username").css('border', '3px #C33 solid');
}

} });
})

$("#kirim").click(function()
{
var username = $("#username").val();
$("#pesan").html("<img src='loading.gif'>Cek username ...");

if(username=='')
{
$("#pesan").html('<img src="salah.png"> username tidak boleh kosong');
$("#username").css('border', '3px #C33 solid');
}
else
$.ajax({type: "POST", url: "validation.php", data: "username="+username, success:function(data)
{
if(data==0)
{
$("#pesan").html('<img src="true.png">');
$("#username").css('border', '3px #090 solid');
}
else
{
$("#pesan").html('<img src="salah.png"> username telah digunakan');
$("#username").css('border', '3px #C33 solid');
}

} });
})

</script>

<?php
include '../../config/conection.php';
$aksi="modul/m_pendaftar/aksi_pendaftar.php";
$url=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

if(!isset($_GET['act'])){
$_GET['act']="";
}

switch($_GET["act"]){
  // Tampil SMA
  default:
    echo "<h2 class=judul>Data Pendaftar Wisuda Online</h2>
          <table width=100% border=1px>
          <tr><td></td><td></td><td></td><td></td><td></td>
          <form method='POST' action='?module=pendaftar' enctype='multipart/form-data' autocomplete='off'>
          <td colspan=2 style='text-align:right'><input style='width:150px' type='text' name='cari' placeholder=' inputkan nim...'> <input type='submit' value='Cari..'> </td>
          <td style='text-align:left; width:110px;'><button href='?module=pendaftar'>Reset</button></td>
          </tr>
          <tr><th style='text-align:center;'>Validasi</th><th style='text-align:center;'>NIM</th><th style='text-align:center;'>Nama Lengkap</th><th style='text-align:center;'>Jenis Kelamin</th><th style='text-align:center;'>Tempat, Tgl Lahir</th><th style='text-align:center;'>Fakultas</th><th style='text-align:center;'>Jurusan</th><th colspan='2' style='text-align:center;'>No HP/Telp.</th>";
          if($_SESSION['level']==1){
          echo"<th style='text-align:center;'>Keuangan</th>";
      	  }
          echo "</tr>";
	
    	if($_POST['cari']==''){

    	$p      = new Paging;
	    $batas  = 30;
	    $posisi = $p->cariPosisi($batas);	  
		
		$q2 = $connection->query("select a.*, b.NAMA fakultas, c.NAMA prodi from tb_wisuda a
			left join tb_prodi c on c.ID = a.prodi 
			left join tb_fakultas b on b.ID = c.id_fakultas where (a.nama != '' and 	tmpt_lahir != '' and tgl_lahir != '' and jenis_kelamin != '') 
								ORDER BY c.ID DESC LIMIT $posisi,$batas");
		$no=1;
		}
		else if($_POST['cari']!=''){

		$q2 = $connection->query("select a.*, b.NAMA fakultas, c.NAMA prodi from tb_wisuda a
			left join tb_prodi c on c.ID = a.prodi 
			left join tb_fakultas b on b.ID = c.id_fakultas WHERE a.nim='$_POST[cari]'");
		}

		while($r2=mysqli_fetch_array($q2)){
			echo "<tr>";

			// Keuangan
			if($_SESSION['level']==3){

			    if($r2[checklist]==1){

	            echo "<td style='text-align:center; background-color:yellow;'><a href=$aksi?module=pendaftar&act=uncheck&id_wisuda=$r2[id_wisuda] onclick=\"return confirm ('Apakah Anda yakin ingin Unchecked data ini?')\"><b>OK</b></a></td>

			        ";
			    }

			    else if($r2[checklist]==0){

	            echo "<td style='text-align:center;'><a href=$aksi?module=pendaftar&act=check&id_wisuda=$r2[id_wisuda] onclick=\"return confirm ('Apakah Anda yakin ingin Checked data ini?')\"><b>NO</b></a></td>
			        ";
			    }

			}

			// Akademik
			if($_SESSION['level']==1){

			    if($r2[check_akad]==1){

	            echo "<td style='text-align:center; background-color:yellow;'><a href=$aksi?module=pendaftar&act=uncheck_akad&id_wisuda=$r2[id_wisuda] onclick=\"return confirm ('Apakah Anda yakin ingin Unchecked data ini?')\"><b>OK</b></a></td>

			        ";
			    }

			    else if($r2[check_akad]==0 && $r2[checklist]==1){

	            echo "<td style='text-align:center;'><a href=$aksi?module=pendaftar&act=check_akad&id_wisuda=$r2[id_wisuda] onclick=\"return confirm ('Apakah Anda yakin ingin Checked data ini?')\"><b>NO</b></a></td>
			        ";
			    }

			    else if($r2[check_akad]==0 && $r2[checklist]==0){

	            echo "<td style='text-align:center;'><a href='#' onclick=\"return alert ('Checked Gagal! Bagian Keuangan Belum Checked NIM ini.')\"><b>Belum</b></a></td>
			        ";
			    }

			}
				echo "
				<td style='text-align:center;'>$r2[nim]</td>			
                <td>$r2[nama]</td>
				<td>$r2[jenis_kelamin]</td>
				<td>$r2[tmpt_lahir], $r2[tgl_lahir]</td>
				<td>$r2[fakultas]</td>				
				<td>$r2[prodi]</td>
				<td colspan=2>$r2[telp_hp]</td>";
				
				if($_SESSION['level']==1){

				if($r2[checklist]==1){

	            echo "<td style='text-align:center; background-color:yellow;'><b>Bayar</b></td>";
			    }

			    else if($r2[checklist]==0){

	            echo "<td style='text-align:center;'><b>Belum</b></td>";

			    }

				}

               // <td style='text-align:center;'><a href=$aksi?module=pendaftar&act=hapus&id_wisuda=$r2[id_wisuda] onclick=\"return confirm ('Apakah Anda yakin ingin menghapus data ini?')\"><b>Hapus</b></a></td>
               echo "</tr>";
		}
      
    echo "</table>";

    $jmldata = mysqli_num_rows($connection->query("select a.*, b.NAMA fakultas, c.NAMA prodi from tb_wisuda a left join tb_prodi c on c.ID = a.prodi 
			left join tb_fakultas b on b.ID = c.id_fakultas where (a.nama != '' and 	tmpt_lahir != '' and tgl_lahir != '' and jenis_kelamin != '')"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET["halaman"], $jmlhalaman);
	
    echo "<div id=paging>Hal: $linkHalaman</div><br>";
	echo "<div>Total data : $jmldata</div>";

    break;
}
?>
<br>
<a href="http://localhost/wisuda/cetak_pendaftar.php"><button type="button" style="height: 30px; float: left; margin-left: 30%;">Export Data Excel</button></a>
<a href="http://localhost/wisuda/cetak_buku_wisuda.php"><button type="button" style="height: 30px; float: right; margin-right: 30%;">Cetak Buku Wisuda World</button></a>
</form>

<script type="text/javascript">

function konfirmasi() {
    var answer = confirm("Apakah Anda yakin ingin Checked data ini?")
}

</script>