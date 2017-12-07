<?php
echo "<li><a href='?module=pendaftar'><b>Calon Wisudawan Terdaftar</b></a></li>";

if($_SESSION['level']==2){
echo "<li><a href='?module=input_pendaftar'><b>Input Calon Wisudawan</b></a></li>";
}
?>
