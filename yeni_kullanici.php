<?php include("includes/connection.php"); ?> 
<?php include("includes/function.php"); ?> 
<?php include("includes/header.php"); ?>
<?php bul(); ?>
<?php 
	if(isset($_POST["submit"])) {
		$kullanici_ad = trim(mysql_prep($_POST["kullanici_ad"]));
		$sifre = trim(mysql_prep($_POST["sifre"]));
		$hashed_sifre=md5($sifre);
		$query="INSERT INTO kullanici(kullanici_ad,sifre) VALUES ('$kullanici_ad','$hashed_sifre')";
		$sonuc = mysql_query($query,$connection);
		if ($sonuc) {
			echo "Kullanıcı Başarılı Bir Şekilde Kaydedildi.";
		}else{
			echo "Kullanıcı Kaydedilemedi.";
		}
	}
?>	
	<table id="structure">
		<tr>
			<td id="navigation">
				<?php echo navigation($gelen_konu,$gelen_sayfa); ?>
				<br>
				<a href="konu_ekle.php"> + Yeni Konu Ekle </a><br><br>
				<a href="sayfa_ekle.php"> + Yeni Sayfa Ekle </a>
			</td>
			<td id="page">
				<form id="form1" name="form1" method="post" action="yeni_kullanici.php"><br>
					<table width="284" border="0">
						<tr>
						  <td width="124">Kullanıcı Adı</td>
						  <td width="144">
						  <input type="text" name="kullanici_ad" id="kullanici_ad" /></td>
						</tr>
						<tr>
						  <td>Kullanıcı Şifresi </td>
						  <td>
						  <input type="text" name="sifre" id="sifre" /></td>
						</tr>
						<tr>
						  <td colspan="2">
						  <input type="submit" name="submit" id="submit" value="Kaydet" /></td>
						</tr>
					</table>
				</form>		
			</td>
		</tr>
	</table>


<?php include("includes/footer.php"); ?>