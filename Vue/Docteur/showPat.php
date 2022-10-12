<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>DOCTEUR | Liste des patients</title>
	<link rel="stylesheet" type="text/css" href="../../Asset/css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../../Asset/css/styu.css">
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
		<div>
		<H3>DOCTEUR</H3><hr>
			<div>
				<ul class="liste">
					<li><a href="accueil.php">Accueil</a></li>
					<li style="color: #0275d8">Patient</li>
					<li>Liste des patients</li>
				</ul>
				<input type="text" name="recherche" class="search" placeholder="Rechercher patient" style="float: right; padding: 7px 5px; width: 20%;position: relative; top: 10px;">
			</div>
		</div>

		<table class="tabl">
			<thead>
				<tr>
					<th>#</th>
					<th>IM</th>
					<th>Nom et prénom(s)</th>
					<th>Contact</th>
					<th>Action</th>
				</tr>
			</thead>

			<?php 
			include("../../Controle/controlPatient.php");
			$Pat = new ControlPatient();
			$req = $Pat->getPat();
			while ($res = $req->fetch()) {
				?>
				<tr>
					<th><?php echo $res['idPatient'] ?></th>
					<td><?php echo $res['imPatient'] ?></td>
					<td><?php echo $res['nomPatient'] ." ".$res['prenomPatient']?></td>
					<td><?php echo $res['numPatient'] ?></td>
					<th>
						<a href="afficher.php?id=<?php echo $res['idPatient'] ?>">Afficher dossier</a><br>
					</th>
				</tr>
			<?php } ?>
		</table>
	</article>
</body>
</html>