<?php include("includes/connection.php"); ?> 
<?php include("includes/function.php"); ?> 
<?php
	bul();
?>
<?php include("includes/header.php"); ?> 
			<table id="structure">
				<tr>
					<td id="navigation">
						<?php echo navigation($gelen_konu,$gelen_sayfa); ?>
						<br>
						<a href="konu_ekle.php"> + Yeni Konu Ekle </a>
						<br><br>
						<a href="sayfa_ekle.php"> + Yeni Sayfa Ekle </a>
					</td>
					<td id="page">
						<?php if(!is_null($konu)){ ?>
							<h2><?php echo $konu["menu_ad"]; ?></h2>
						<?php } elseif (!is_null($sayfa)) { ?>
							<h2><?php echo $sayfa["menu_ad"]; ?></h2>
							<div class="page-content">
								<?php echo $sayfa["icerik"]; ?>
							</div>
						<?php } else { ?>
							<h2>Konu veya Sayfa Seçilmedi...</h2>
						<?php } ?>
					</td>
				</tr>
			</table>
<?php include("includes/footer.php"); ?> 