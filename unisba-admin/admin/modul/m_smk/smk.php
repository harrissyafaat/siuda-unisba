<?php
include '../../config/conection.php';
$aksi="modul/m_smk/aksi_smk.php";

if(!isset($_GET['act'])){
$_GET['act']="";
}

switch($_GET["act"]){
  // Tampil SMK
  default:
    echo "<h2 class=judul>DATA SMK</h2>
          <input type=button class=button value='Tambah SMK' onclick=location.href='?module=smk&act=tambahsmk'>
          <table width=500px border=1px>
          <tr><th>No</th><th>Nama SMK</th><th>Opsi</th></tr>";
	
	$p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);	 	  
	
    $tampil=$connection->query("SELECT * FROM tb_smk ORDER BY id_smk LIMIT $posisi,$batas");
    $no=$posisi+1;
    while ($r=mysqli_fetch_array($tampil)){
		
      echo "<tr><td align=left>$no</td>
                <td><a href='?module=smk&act=viewjurusan&id_smk=$r[id_smk]'>$r[nama_smk]</a></td>
                <td align=left><a href=?module=smk&act=editsmk&id_smk=$r[id_smk]><b>Edit</b></a> | 
	                  <a href=$aksi?module=smk&act=hapus&id_smk=$r[id_smk] onclick=\"return confirm ('Apakah Anda yakin ingin menghapus data ini?')\"><b>Hapus</b></a>
		        </tr>";
    $no++;
    }
    echo "</table>";
	$jmldata = mysqli_num_rows($connection->query("SELECT * FROM tb_smk"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET["halaman"], $jmlhalaman);
	
    echo "<div id=paging>Hal: $linkHalaman</div><br>";
	echo "<div>Total data : $jmldata</div>";

	
    break;

  
  case "tambahsmk":
    echo "<h2 class=judul>TAMBAH SMK</h2>
          <form method=POST action='$aksi?module=smk&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td>Nama SMK</td><td>  : <input type=text name='nama_smk' size=30  required='required'></td></tr>
          <tr><td colspan=2><input type=submit class=tombol value=Simpan>
                            <input type=button class=tombol value=Batal onclick=self.history.back()></td></tr>
          </table></form><br><br><br>";
     break;
    
  case "editsmk":
    $edit = $connection->query("SELECT * FROM tb_smk WHERE id_smk='$_GET[id_smk]'");
    $r    = mysqli_fetch_array($edit);
    echo "<h2 class=judul>EDIT SMK</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=smk&act=update>
          <input type=hidden name=id_smk value=$r[id_smk]>
          <table>
          <tr><td>Nama SMK</td><td>     : <input type=text name='nama_smk' size=30 value='$r[nama_smk]'></td></tr>    
		  <tr><td colspan=2><input type=submit class=tombol value=Ubah>
                            <input type=button class=tombol value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break; 

	case "viewjurusan":
		echo "
			<h2 class=judul>Jurusan</h2>
			<a href='?module=smk&act=tambahjurusan&id_smk=$_GET[id_smk]'><button class='button'>Tambah</button></a>
			<table>		
				<tr>
					<th>Nama Jurusan</th><th>Batas Penerimaan</th><th colspan='2'>Aksi</th>
				</tr>";
				$q=$connection->query("select * from tb_jurusansmk where id_smk=$_GET[id_smk]");
				while($r=mysqli_fetch_array($q)){
					$q2=$connection->query("select * from tb_jurusan where id_jurusan=$r[id_jurusan]");
					$r2=mysqli_fetch_array($q2);
					echo "
						<tr>
						<td>$r2[nama_jurusan]</td><td>$r2[kuota]</td><td><a href='?module=smk&id_jurusan=$r[id_jurusan]&act=deletejurusan' onclick=\"return confirm ('Apakah Anda yakin ingin menghapus data ini?')\">Hapus</a></td><td><a href='?module=smk&id_jurusan=$r[id_jurusan]&act=editjurusan&id_smk=$_GET[id_smk]'>Edit</a></td>
						</tr>
					";
				}
		echo "	</table>";
		
		break;
	case "tambahjurusan":
		echo "
			<h2 class=judul>Jurusan</h2>
			<form method=POST action='?module=smk&act=prosestambahjurusan&id_smk=$_GET[id_smk]' enctype='multipart/form-data'>
			<table>
				<tr>
					<td>Nama Jurusan</td><td><input type='text' name='nama_jurusan'/></td>
				</tr>
				<tr>
					<td>Batas Penerimaan</td><td><input type='text' name='batas'/></td>
				</tr>
				<tr>
					<td colspan='2'><input type='submit' value='Tambah'/></td>
				</tr>
		";
		
		echo "
			</table>
		";
	break;
	
	case "prosestambahjurusan":
			if($connection->query("insert into tb_jurusan values(null,'$_POST[nama_jurusan]',$_POST[batas])")){
				$q=$connection->query("select * from tb_jurusan order by id_jurusan desc");
				$r=mysqli_fetch_array($q);
				if($connection->query("insert into tb_jurusansmk values('$_GET[id_smk]','$r[id_jurusan]')")){
					header("location:?module=smk&act=viewjurusan&id_smk=$_GET[id_smk]");
				}
			}
		break;
	
	case "deletejurusan":
		if($connection->query("delete from tb_jurusan where id_jurusan=$_GET[id_jurusan]")){
			header("location:$_SERVER[HTTP_REFERER]");
		}
		break;
		
	case "editjurusan":
		$q=$connection->query("select * from tb_jurusan where id_jurusan=$_GET[id_jurusan]");
		$r=mysqli_fetch_array($q);
		echo "
			<h2 class=judul>Jurusan</h2>
			<form method=POST action='?module=smk&act=proseseditjurusan&id_smk=$_GET[id_smk]&id_jurusan=$_GET[id_jurusan]' enctype='multipart/form-data'>
			<table>
				<tr>
					<td>Nama Jurusan</td><td><input type='text' name='nama_jurusan' value='$r[nama_jurusan]'/></td>
				</tr>
				<tr>
					<td>Batas Penerimaan</td><td><input type='text' name='batas' value='$r[kuota]'/></td>
				</tr>
				<tr>
					<td colspan='2'><input type='submit' value='Ubah'/></td>
				</tr>
		";
		
		echo "
			</table>
		";
		break;
		
	case "proseseditjurusan":
		if($connection->query("update tb_jurusan set nama_jurusan='$_POST[nama_jurusan]',kuota=$_POST[batas] where id_jurusan=$_GET[id_jurusan]")){
			header("location:?module=smk&act=viewjurusan&id_smk=$_GET[id_smk]");
		}
		break;
}
?>