<?php
	function sorgu_dogrulama($sonuc){
		if(!$sonuc){
			die("Veritabanı Sorgu Hatası: ".mysql_error());
		}
	}
	
	function konulari_getir(){
		global $connection;
		$sorgu="SELECT * FROM konular";
		$result = mysql_query($sorgu,$connection);
		sorgu_dogrulama($result);
		return $result;
	}
	
	function konulari_getir_kullanici(){
		global $connection;
		$sorgu="SELECT * FROM konular WHERE goster=1";
		$result = mysql_query($sorgu,$connection);
		sorgu_dogrulama($result);
		return $result;
	}
	
	function sayfalari_getir($konu_id){
		global $connection;
		$sorgu="SELECT * FROM sayfalar WHERE konu_id=".$konu_id;
		$result1=mysql_query($sorgu,$connection);
		sorgu_dogrulama($result1);
		return $result1;
	}
	
	function sayfalari_getir1(){
		global $connection;
		$sorgu="SELECT * FROM sayfalar";
		$result1=mysql_query($sorgu,$connection);
		sorgu_dogrulama($result1);
		return $result1;
	}
	
	function konu_getir($konu_id){
		global $connection;
		$query = "SELECT * FROM konular WHERE konu_id=".$konu_id;
		$sonuc = mysql_query($query,$connection);
		sorgu_dogrulama($sonuc);
		if($konu=mysql_fetch_array($sonuc)) {
			return $konu;
		}else{
			return NULL;
		}
	}
	
	function sayfa_getir($sayfa_id){
		global $connection;
		$query = "SELECT * FROM sayfalar WHERE sayfa_id=".$sayfa_id;
		$sonuc = mysql_query($query,$connection);
		sorgu_dogrulama($sonuc);
		if($sayfa=mysql_fetch_array($sonuc)) {
			return $sayfa;
		}else{
			return NULL;
		}
	}

	function bul(){
		global $konu;
		global $sayfa;
		global $gelen_konu;
		global $gelen_sayfa;
		if(isset($_GET["konu"])) {
			$gelen_konu = $_GET["konu"];
			$konu = konu_getir($gelen_konu);
			$gelen_sayfa = 0;
			$sayfa = NULL;
		}elseif(isset($_GET["sayfa"])) {
			$gelen_konu = 0;
			$konu = NULL;
			$gelen_sayfa = $_GET["sayfa"];
			$sayfa = sayfa_getir($gelen_sayfa);
		}else{
			$gelen_konu = 0;
			$gelen_sayfa = 0;
			$konu = NULL;
			$sayfa = NULL;
		}
	}

	function navigation($gelen_konu,$gelen_sayfa){
		$output = "<ul class=\"subject\">";
				$result = konulari_getir();
				while($row =mysql_fetch_array($result)){
					$output .=  "<li";
					if($gelen_konu==$row["konu_id"]){
						$output .=  " class=\"selected\" ";
					}
					$output .=  "><a href=\"konu_duzenle.php?konu=".$row["konu_id"]."\">".$row["menu_ad"] . "</a></li>"; 
					$result1 = sayfalari_getir($row["konu_id"]);
					$output .=  "<ul class=\"pages\">";
					while($row1 =mysql_fetch_array($result1)){
						$output .=  "<li";
						if($gelen_sayfa==$row1["sayfa_id"]){
							$output .=  " class=\"selected\" ";
						} 
						$output .=  "><a href=\"sayfa_duzenle.php?sayfa=".$row1["sayfa_id"]."\">".$row1["menu_ad"] . "</a></li>"; 
					} 
					$output .= "</ul>";
				}
		$output .= "</ul>";
		return $output;
	}
	
	function public_navigation($gelen_konu,$gelen_sayfa){
		$output = "<ul class=\"subject\">";
				$result = konulari_getir_kullanici();
				while($row =mysql_fetch_array($result)){
					$output .=  "<li";
					if($gelen_konu==$row["konu_id"]){
						$output .=  " class=\"selected\" ";
					}
					$output .=  "><a href=\"index.php?konu=".$row["konu_id"]."\">".$row["menu_ad"] . "</a></li>"; 
					$result1 = sayfalari_getir($row["konu_id"]);
					$output .=  "<ul class=\"pages\">";
					while($row1 =mysql_fetch_array($result1)){
						$output .=  "<li";
						if($gelen_sayfa==$row1["sayfa_id"]){
							$output .=  " class=\"selected\" ";
						} 
						$output .=  "><a href=\"index.php?sayfa=".$row1["sayfa_id"]."\">".$row1["menu_ad"] . "</a></li>"; 
					} 
					$output .= "</ul>";
				}
		$output .= "</ul>";
		return $output;
	}
	
	function mysql_prep($value){
		$value=mysql_real_escape_string($value);
		return $value;
	}
?>