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
						<h2>Sayfa Ekle</h2>
						<form action="sayfa_kaydet.php" method="post">
							<p>Sayfa Adı: 
								<input type="text" name="menu_ad" value="" id="menu_ad" />
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
									for($say=1;$say<=$sayfa_say+1;$say++) {
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
							Sayfa İçeriği: 
								<p><textarea name="icerik" id="icerik" cols="45" rows="5"></textarea></p>
							</p>
							<input type="submit" value="Sayfa Ekle" />
						</form>
						<br>
						<a href="icerik.php"> Vazgeç </a>
					</td>
				</tr>
			</table>
<?php include("includes/footer.php"); ?> 