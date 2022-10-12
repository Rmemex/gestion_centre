<?php 
 	session_start();
 	$idPat = $_GET['id'];
 	$idHist = $_GET['idHist'];
 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ordonnance médicale</title>
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
		<?php 
			include("../../Modele/Connexion/connexion.php");
			$bdd = new PDO("mysql:host=localhost;dbname=cms","root","");
			$bdd->exec("SET NAMES utf8");
			$ldate = date( 'Y-m-d '); 
			$req = $bdd->query("SELECT * FROM patient INNER JOIN histopatient ON patient.idPatient = histopatient.idPat INNER JOIN personnel ON personnel.idPerso= histopatient.idDoc  INNER JOIN occupation ON occupation.idOcc = personnel.occup AND patient.idPatient='$idPat' ");
			$res =  $req->fetch()
		 ?>
		<div class="topn">
				<img src="../../Asset/Image/logo2.png" alt="logo">
				<h3 style="position: relative; left:170px">Ordonnance Médicale</h3>
				<div class="d">
					<p>Centre Médico-Social</p>
					<p>Tel. 034 xx xxx xx / 033 xx xxx xx</p>
					<p>Lot II D13 Bis Tsiazotafo</p>
				</div>
			</div>
			<div class="d1">
				<p style="position: relative; left: 25px;"><b>Identification du prescripteur</b></p> 
				<label class="lbl">Dr.</label>
				<input type="text" name="nomD" class="put" value="<?php echo $res['nomPers']." ".$res['prenomPers']; ?>" readonly=""><br>
				<input type="text" name="occup" value="(<?php echo $res['libele']; ?>)" style="text-align: center; position: relative;left: 25px;" readonly=""><br>
				<label class="lbl">Tél.</label>
				<input type="number" name="numD" class="put" value="<?php echo $res['numPers']; ?>" readonly=""><br>
			</div>
			<div class="d2">
				<p style="text-align: center; "><b>Identification du patient</b></p>
				Nom et prénom(s) :<input type="text" name="nomP" value="<?php echo $res['nomPat']." ".$res['prenomPat']; ?>" readonly=""><br>
				
			</div>

			<table><thead><th class="top">Prescriptions relatives au traitement</th></thead>
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