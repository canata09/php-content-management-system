<?php
	include("includes/connection.php");
	include("includes/function.php");
	$error = Array();
	if (!isset($_POST["menu_ad"]) || empty($_POST["menu_ad"])) {
		$error[]= 'menu_ad';
	}
	if (!empty($error)){
		header("Location: konu_ekle.php");
		exit;
	}
	if (!isset($_POST["pozisyon"]) || empty($_POST["pozisyon"])) {
		$error[]= 'menu_ad';
	}
	if (!empty($error)){
		header("Location: konu_ekle.php");
		exit;
	}
	$menu_ad = mysql_prep($_POST["menu_ad"]);
	$pozisyon = mysql_prep($_POST["pozisyon"]);
	$goster = mysql_prep($_POST["goster"]);
	$query = "INSERT INTO konular(menu_ad,pozisyon,goster) VALUES ('$menu_ad',$pozisyon,$goster)";
	$sonuc = mysql_query($query,$connection);
	if($sonuc){
		header("Location:icerik.php");
	}else {
		echo "Bir hata oluþtu : ". mysql_error();
	} 
	mysql_close($connection);
?>