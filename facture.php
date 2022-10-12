<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style type="text/css">
		body{ background-color: #404C53 }

		input[type=text], input[type=number] {border:none; margin: 2px 0;}

		.lbl { display: block; width: 100px; float: left; position: relative; left: 10px; top: 7px; margin: 2px 0;}

		.put { position: relative;left:-70px; }

		img { width: 49px;position: relative;left: 9px;top: 10px; }

		img, h3, .num{ display: inline-block }

		textarea { width: 80%; height: 275px; border: none; resize: none; font-size: 14px; line-height: 15px; position: relative; left:55px; top: 50px; }

		hr{ position: relative; top:-15px; }

		.dat { float: right; position: relative; top: -10px; right: 15px; }

		table { width: 100%; }

		.top{ border-top: 1px solid; border-bottom: 1px solid; padding: 8px 12px; text-align: center;}

		.corps{ background-color: white;width: 45%; height: 720px; position: relative; margin-left: auto; margin-right: auto }

		.d { font-size: 11px; line-height: 5px; text-align: center; position: relative; top: -20px; }

		.d1, .d2 { line-height:3px; display: inline-block; font-size: 14px; }

		.d1{ position: relative; left: 25px; top:-10px;}

		.d2 { position: relative; float: right; top:-10px; right: 20px; }

		.pri{ float: right; width:15%; padding: 8px 12px; position: relative; bottom: 40px; background:#66ff33; color: white; border: none; border-radius: 5px;}
	</style>
</head>
<body>
	<div class="corps" id="page">
		<div class="topn">
				<img src="../../Asset/Image/logo2.png" alt="logo">
				<h3 style="position: relative; left:170px">Facture</h3>
				<div class="d">
					<p>Nom magasin</p>
					<p>Tel. 034 xx xxx xx / 033 xx xxx xx</p>
					<p>Adresse</p>
				</div>
			</div>
			<div class="d1">
			</div>
			<div class="d2">
				<p style="text-align: center; "><b>Date :</b></p>
				
			</div>

			<table><thead><th class="top">Liste des articles</th></thead>
				<tbody><td>
				<div class="d3">
					<p class="dat">Date : <?php echo $_GET['dates']; ?> </p>
					<?php 
						$s = $bdd->query("SELECT prescription FROM histopatient WHERE idHisto = '$idHist' "); 
						$rs =  $s->fetch()
					?>
					<textarea><?php echo $rs['prescription']; ?></textarea>
				</div></td></tbody>
			</table>
			<p style="font-size: 14px; float: right; position: relative; right: 80px; bottom: -80px;">Signature</p>
	</div>
	<div>
		<input type="button" class="pri" value="Imprimer" onclick="imprimer(this.value);" />
		<script>
            $(function($) {
            });
			function imprimer(strid) {
			var prtContent = document.getElementById("page");
			var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
			WinPrint.document.write(prtContent.innerHTML);
			WinPrint.document.close();
			WinPrint.focus();
			WinPrint.print();
			WinPrint.close();
		    }
		</script>
	</div>
</body>
</html>