<?php
//defined('_VALID') or die ('not allowed');
$host="localhost";
$user="unisb654";
$pass="5F6b_bZlw(04";
$db="unisb654_pmb";

$conection=mysql_connect($host, $user, $pass);
if (!$conection){
	exit("Conection Determinate");
}
$db=mysql_select_db($db);
if (!$db){
	exit("Database Cant Load");
}
?>