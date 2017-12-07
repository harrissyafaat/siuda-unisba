<?php
echo "<li><a href='?module=home'><b>Beranda</b></a></li>";

if($_SESSION['level']==1){
echo "<li><a href='?module=berita'><b>Pengumuman</b></a></li>";
echo "<li><a href='?module=jadwal'><b>Jadwal</b></a></li>"; 
echo "<li><a href='?module=alur'><b>Alur</b></a></li>";
echo "<li><a href='?module=download'><b>Download</b></a></li>";  
}
?>