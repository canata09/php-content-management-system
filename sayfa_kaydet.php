<?php
	include("includes/connection.php");
	include("includes/function.php");
	$error = Array();
	if (!isset($_POST["menu_ad"]) || empty($_POST["menu_ad"])) {
		$error[]= 'menu_ad';
	}
	if (!empty($error)){
		header("Location: sayfa_ekle.php");
		exit;
	}
	if (!isset($_POST["pozisyon"]) || empty($_POST["pozisyon"])) {
		$error[]= 'pozisyon';
	}
	if (!empty($error)){
		header("Location: sayfa_ekle.php");
		exit;
	}
	$menu_ad = mysql_prep($_POST["menu_ad"]);
	$konu_id = mysql_prep($_POST["konu_id"]);
	$pozisyon = mysql_prep($_POST["pozisyon"]);
	$goster = mysql_prep($_POST["goster"]);
	$icerik = mysql_prep($_POST["icerik"]);
	$query = "INSERT INTO sayfalar(konu_id,menu_ad,pozisyon,goster,icerik) VALUES ($konu_id,'$menu_ad',$pozisyon,$goster,'icerik')";
	$sonuc = mysql_query($query,$connection);
	if($sonuc){
		header("Location:icerik.php");
	}else {
		echo "Bir hata oluþtu : ". mysql_error();
	} 
	mysql_close($connection);
?>