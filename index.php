<?php
	include ("includes/connection.php");
	include ("includes/function.php");
	bul();
	include ("includes/header.php");
?>
	<table id="structure">
	<tr>
		<td id="navigation">
			<?php echo public_navigation($gelen_konu, $gelen_sayfa); ?>
		</td>
		<td id="page">
			<?php if ($gelen_sayfa) { ?>
				<h2><?php echo htmlentities($sayfa["menu_ad"]); ?></h2>
				<div class="page-content">
					<?php echo($sayfa["icerik"]), "<b><br><p><a>";	?>
				</div>
			<?php } else { ?>
				<h2>HOŞGELDİNİZ</h2>
			<?php } ?>
		</td>
	</tr>
</table>
<?php
	include ("includes/footer.php");
?>	
