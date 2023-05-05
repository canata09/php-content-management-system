<?php
	$connection = mysql_connect("localhost","root","");
	if(!$connection){
		die("Veritabanı Bağlantı Hatası: ".mysql_error());
	}
	mysql_query("SET NAMES 'utf8'");
	$db_select = mysql_select_db("cms_db",$connection);
	if(!$db_select){
		die("Veritabanı Tablo Seçim Hatası: ".mysql_error());
	}
?>