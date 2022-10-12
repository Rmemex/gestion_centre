<?php 
	$idP= $_GET['id'];
	session_start();
	$idD= $_SESSION['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>DOCTEUR | Dossier du patient</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../Asset/css/afficher.css">
</head>
<body>
	<header>
		<div class="topnav">
			<a href="deconnecter.php?decon=1" class="dec">Déconnecter</a>
			<img src="../../Asset/Image/logo.png" alt="logo"><h1>GESTION D'UN CENTRE MEDICAL</h1>
		</div>
	</header>
	<section>
    	<nav class="navg">
			<button class="accordion"><b>Patient</b></button>
				<div class="panel">
				   <a href="liste.php">Liste d'attente</a><br>
				   <a href="historique.php">Historique de consultation</a><br>
				</div>

			<a href="histoRDV.php"><button class="accordion"><b>Agenda</b></button></a>
		</nav>
		<script>
				var acc = document.getElementsByClassName("accordion");
				var i;

				for (i = 0; i < acc.length; i++) {
				  acc[i].addEventListener("click", function() {
				    this.classList.toggle("active");
				    var panel = this.nextElementSibling;
				    if (panel.style.display === "block") {
				      panel.style.display = "none";
				    } else {
				      panel.style.display = "block";
				    }
				  });
				}
		</script>
	</section>

	<article>
		<H3>DOCTEUR</H3><hr>
		<div>
			<ul class="liste">
				<li><a href="accueil.php">Accueil</a></li>
				<li style="color: #0275d8">Patient</li>
				<li>Dossier du patient</li>
			</ul>
		</div>
		<div>
			<?php 
				include("../../Controle/ControlPatient.php") ;
				$pat = new ControlPatient();
				$list = $pat->affiche($idP);
				$res = $list->fetch();
			?>
		<div class="l">
			<ul class="cont" style="list-style-type: none; word-spacing: 4px;">
			 	<li class="conte"><b>IM </b>: <?php echo $res['imPat']; ?> </li>
			 	<li class="conte"><b>Nom </b>: <?php echo $res['nomPat']; ?> </li>
			 	<li class="conte"><b>Prénom(s) </b>: <?php echo $res['prenomPat']; ?> </li>
			 	<li class="conte"><b>Direction </b>: <?php echo $res['departement']; ?> </li>
			 	<li class="conte"><b>Service </b>: <?php echo $res['attribution']; ?> </li>
			 	<li class="conte"><b>Sexe </b>: <?php echo $res['sexePat']; ?> </li>
			 	<li class="conte"><b>Date de naissance </b>: <?php echo $res['birthPat']; ?> </li>
			 	<li class="conte"><b>Contact </b>: <?php echo $res['numPat']; ?> </li>
			 	<li class="conte"><b>Adresse </b>: <?php echo $res['adressePat']; ?> </li>
			</ul><br>
		</div>

		<div class="field">
			<fieldset>
				<legend><b>Famille</b></legend>
					<?php 
					include("../../Controle/controlFamille.php") ;
					$F = new ControlFamille();
					$lst = $F->affiche($idP);
					while ($rs = $lst->fetch()){
				?>
				<ul class="cont" style="list-style-type: none; word-spacing: 4px;">
			 		<li><a href="afficher.php?id=<?php ?>" style="text-decoration: none;color:#60768B"><?php echo $rs['nom']; ?> </a>: <?php echo $rs['statut']; ?> </li>
			 	</ul>
			 	<?php } ?>
			</fieldset>
		</div>

		<table class="tabl">
			<thead>
				<center><legend style="font-size: 18px; padding: 14px 20px;"><b>Historique médical</b></legend></center>
				<tr>
					<th>Dates</th>
					<th>Poids</th>
					<th>Tension</th>
					<th>Glycémie</th>
					<th>Température</th>
					<th>Signe</th>
					<th>Maladie</th>
					<th>Prescription</th>
				</tr>
			</thead>

			<?php 
				include("../../Controle/controlHisto.php");
	    		$cons = new ControlHist();
				$req = $cons->affiche($idP);
				while ($res = $req->fetch()) {
			?>
			<tr>
				<td><?php echo $res['dates'] ?></td>
				<td><?php echo $res['poids'] ?></td>
				<td><?php echo $res['tension'] ?></td>
				<td><?php echo $res['glycemie'] ?></td>
				<td><?php echo $res['temperature'] ?></td>
				<td><?php echo $res['signe'] ?></td>
				<td><?php echo $res['maladie'] ?></td>
				<td><a href="ordonnance.php?id=<?php echo $res['idPat'] ?>&amp;dates=<?php echo $res['dates'] ?>&amp;idD=<?php echo $idD ?>&amp;idHist=<?php echo $res['idHisto'] ?>">Ordonnance</a></td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="2" style="border: 2px solid #dddddd; text-align: left"><b>Allergie :</b></td>
				<td colspan="7" style="border: 2px solid #dddddd; text-align: left" ><?php echo $res['allergie'] ?></td>
			</tr>
		</table>
	</article>
</body>
</html>