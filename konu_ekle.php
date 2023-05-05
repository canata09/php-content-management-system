<?php include("includes/connection.php"); ?> 
<?php include("includes/function.php"); ?> 
<?php bul(); ?>
<?php include("includes/header.php"); ?> 
			<table id="structure">
				<tr>
					<td id="navigation">
						<?php echo navigation($gelen_konu,$gelen_sayfa); ?>
						<br>
					</td>
					<td id="page">
						<h2>Konu Ekle</h2>
						<form action="konu_kaydet.php" method="post">
							<p>Konu Adı: 
								<input type="text" name="menu_ad" value="" id="menu_ad" />
							</p>
							<p>Pozisyon: 
								<select name="pozisyon">
								<?php 
									$k = konulari_getir();
									$konu_say = mysql_num_rows($k);
									for($say=1;$say<=$konu_say+1;$say++) {
										echo "<option value=\"".$say."\">".$say."</option>";
									}	
								?>
								</select>
							</p>
							<p>Görünürlük: 
								<input type="radio" name="goster" value="0" /> Hayır
								&nbsp;
								<input type="radio" name="goster" value="1" /> Evet
							</p>
							<input type="submit" value="Konu Ekle" />
						</form>
						<br>
						<a href="icerik.php"> Vazgeç </a>
					</td>
				</tr>
			</table>
<?php include("includes/footer.php"); ?> 