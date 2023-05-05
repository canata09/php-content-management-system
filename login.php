<?php include("includes/connection.php"); ?> 
<?php include("includes/function.php"); ?> 
<?php include("includes/header.php"); ?>
<?php bul(); ?>
<?php 
	if(isset($_POST["submit"])) {
		$kullanici_ad = trim(mysql_prep($_POST["kullanici_ad"]));
		$sifre = trim(mysql_prep($_POST["sifre"]));
		$hashed_sifre=md5($sifre);
		$query="SELECT * FROM kullanici WHERE kullanici_ad = '$kullanici_ad' and sifre='$hashed_sifre'";
		$sonuc = mysql_query($query,$connection);
		if (mysql_num_rows($sonuc)==1) { 
			header("Location:yonetim.php"); 
		}else{
			header("Location:hata.php"); 
		}
	}
?>	
	<table id="structure">
		<tr>
			<td id="navigation">
				
			</td>
			<td id="page">
				<form id="form1" name="form1" method="post" action="login.php"><br>
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
						  <input type="submit" name="submit" id="submit" value="Giriş" /></td>
						</tr>
					</table>
				</form>		
			</td>
		</tr>
	</table>


<?php include("includes/footer.php"); ?>