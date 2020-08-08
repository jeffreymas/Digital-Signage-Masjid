<?php 
include 'config.php';
 $masjid = $_GET['id'];
	session_start();
	$_SESSION['masjid'] = $masjid;
	
	header("location:jadwaluser.php");

?>
 