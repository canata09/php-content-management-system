<?php include("includes/connection.php"); ?> 
<?php include("includes/function.php"); ?> 
<?php
	if(isset($_POST["submit"])) {
		echo "cumhurehrhwurw";
		$sayfa_id = mysql_prep($_GET["sayfa"]);
		$konu_id = mysql_prep($_POST["konu_id"]);
		$menu_ad = mysql_prep($_POST["menu_ad"]);
		$pozisyon = mysql_prep($_POST["pozisyon"]);
		$goster = mysql_prep($_POST["goster"]);
		$icerik = mysql_prep($_POST["icerik"]);
		$query = "UPDATE sayfalar SET 
			konu_id=$konu_id,	
			menu_ad='$menu_ad', 
			pozisyon=$pozisyon, 
			goster=$goster,
			icerik='$icerik'
			WHERE sayfa_id=$sayfa_id";
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
						<a href="sayfa_sil.php?s=<?php echo $sayfa["konu_id"];?>" onclick="return confirm('Emin misin?')" >Sayfa Sil</a>
						<h2>Sayfa Düzenle : <?php echo $sayfa["menu_ad"];?> </h2>
						<?php 
							if(!empty($mesaj)){
								echo "<p class=\"message\">";
								echo $mesaj."</p>";	
							}
						?>	
						<form action="sayfa_duzenle.php?sayfa=<?php echo $sayfa["sayfa_id"];?>" method="post">	
							<p>Sayfa Adı: 
								<input type="text" name="menu_ad" value="<?php echo $sayfa["menu_ad"];?>" id="menu_ad" />
							</p>
							<p>Konu Adı:
							<select name="konu_id">
							<?php
								$sorgu="SELECT * FROM konular";
								$result = mysql_query($sorgu,$connection);
								while($kon=mysql_fetch_array($result) ){
									
									$konu_i = $kon["konu_id"];
									$konu_a = $kon["menu_ad"];
									
									echo "<option value=\"".$konu_i."\">".$konu_a."</option>";
								}	
							?>	
							</select>
							</p>
							<p>Pozisyon: 
								<select name="pozisyon">
								<?php 
									$k = sayfalari_getir1();
									$sayfa_say = mysql_num_rows($k);
									echo "<option value=\"";
									echo $sayfa["pozisyon"];
									echo "\">";
									echo $sayfa["pozisyon"]. "</option>";
									for($say=1;$say<=$sayfa_say+1;$say++) {
										if($say==$sayfa["pozisyon"]){
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
								if($sayfa["goster"]==0) { echo " checked"; }
								?> /> Hayır
								&nbsp;
								<input type="radio" name="goster" value="1" <?php
								if($sayfa["goster"]==1) { echo " checked"; }
								?> /> Evet
							</p>
							Sayfa İçeriği: 
								<p><textarea name="icerik" id="icerik" cols="45" rows="5"><?php echo $sayfa["icerik"]; ?></textarea></p>
							</p>
							<input name="submit" type="submit" value="Değiştir" />
						</form>
						
						<br>
						<a href="icerik.php"> Vazgeç </a>
					</td>
				</tr>
			</table>
<?php include("includes/footer.php"); ?> 