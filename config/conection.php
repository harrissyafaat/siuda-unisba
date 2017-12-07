<?php
//defined('_VALID') or die ('not allowed');
$host="localhost";
$user="root";
$pass="";
$db="siuda";

$connection = new mysqli($host, $user, $pass, $db);
if (!$connection){
	exit("Conection Determinate");
}
mysqli_query($connection, 'CREATE TEMPORARY TABLE `table`');
?>