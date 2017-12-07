<?php
include '../../config/conection.php';
$aksi="modul/m_input_pendaftar/aksi_input_pendaftar.php";
$pass = $_SESSION['id_prodi'].'W'.date('dhis');
if(!isset($_GET['act'])){
$_GET['act']="";
}
switch($_GET['act']){
 
  default:
   
    echo "<h2 class=judul>Tambah Calon Wisudawan</h2>
          <form method=POST action='$aksi?module=input_pendaftar&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td>NIM</td><td>  : <input id='nim' type=number name='nim' size=30 required></td></tr>
          <tr><td>Password</td><td> : <input type=text name='password' value='$pass' size=30 required> <input type=hidden name='id_prodi' size=30 value='$_SESSION[id_prodi]'></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan onclick='return konfirmasi()'>
                            <input type='reset' value=Reset></td></tr>
          </table></form><br><br><br>";
    
    break;  
}
?>
<script type="text/javascript" language="JavaScript">
 function konfirmasi()
 {
 var nim = document.getElementById("nim").value;
 if(nim!=''){
 tanya = confirm("Anda ingin Menambahkan NIM Baru : "+nim+" ?");
 if (tanya == true) return true;
 else return false;
  }
 }</script>