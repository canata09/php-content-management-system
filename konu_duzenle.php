<?php include("includes/connection.php"); ?> 
<?php include("includes/function.php"); ?> 
<?php
	if(isset($_POST["submit"])) {
		$konu_id = mysql_prep($_GET["konu"]);
		$menu_ad = mysql_prep($_POST["menu_ad"]);
		$pozisyon = mysql_prep($_POST["pozisyon"]);
		$goster = mysql_prep($_POST["goster"]);
		$query = "UPDATE konular SET 
			menu_ad='$menu_ad', 
			pozisyon=$pozisyon, 
			goster=$goster 
			WHERE konu_id=$konu_id";
		$sonuc = mysql_query($query,$connection);
		if (mysql_affected_rows()==1) {
			$mesaj="Konu Başarılı Bir Şekilde Değiştirilmiştir";
		}else{
			$mesaj="Güncelleştirme İşlemi Başarısız Oldu";
		}
	}
?>
<?php bul(); ?>
<?php include("includes/header.php"); ?> 
			<table id="structure"> 
				<tr>
					<td id="navigation">
						<?php echo navigation($gelen_konu,$gelen_sayfa); ?>
						<br>
					</td>
					<td id="page">
						<br>
						<a href="konu_sil.php?k=<?php echo $konu["konu_id"];?>" onclick="return confirm('Emin misin?')" >Konuyu Sil</a>
						<h2>Konu Düzenle : <?php echo $konu["menu_ad"];?> </h2>
						<?php 
							if(!empty($mesaj)){
								echo "<p class=\"message\">";
								echo $mesaj."</p>";	
							}
						?>	
						<form action="konu_duzenle.php?konu=<?php echo $konu["konu_id"];?>" method="post">	
							<p>Konu Adı: 
								<input type="text" name="menu_ad" value="<?php echo $konu["menu_ad"]; ?>" id="menu_ad" />
							</p>
							<p>Pozisyon: 
								<select name="pozisyon">
								<?php 
									$k = konulari_getir();
									$konu_say = mysql_num_rows($k);
									for($say=1;$say<=$konu_say+1;$say++) {
										if($say==$konu["pozisyon"]){
											echo "<option selected value=\"".$say."\">".$say."</option>";
										}else {
											echo "<option value=\"".$say."\">".$say."</option>";
										}
									}	
								?>
								</select>
							</p>
							<p>Görünürlük: 
								<input type="radio" name="goster" value="0" <?php 
								if($konu["goster"]==0) { echo " checked"; }
								?> /> Hayır
								&nbsp;
								<input type="radio" name="goster" value="1" <?php
								if($konu["goster"]==1) { echo " checked"; }
								?> /> Evet
							</p>
							<input name="submit" type="submit" value="Değiştir" />
						</form>
						
						<br>
						<a href="icerik.php"> Vazgeç </a>
					</td>
				</tr>
			</table>
<?php include("includes/footer.php"); ?> 