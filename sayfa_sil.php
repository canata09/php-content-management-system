<?php 
	include("includes/connection.php");
	include("includes/function.php");
	$id = $_GET["s"];
	$query = "DELETE FROM sayfalar WHERE konu_id=".$id;
	$sonuc = mysql_query($query,$connection);
	if(mysql_affected_rows()==1){
		header("Location:icerik.php");
	}else{
		echo "Silme Ýþleminde Hata Oluþtu" . mysql_error();
	}
	
	mysql_close($connection);
?>