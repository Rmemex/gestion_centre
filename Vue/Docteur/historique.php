<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>DOCTEUR | Historique de consultation</title>
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
					<li>Historique de consultation</li>
				</ul>
			</div>
		</div>
		<table class="tabl">
			<?php 
				include("../../Modele/Connexion/connexion.php");
				$bdd = new PDO("mysql:host=localhost;dbname=cms","root","");
				$ldate = date( 'Y-m-d '); 
				$req = $bdd->query("SELECT patient.idPatient, patient.nomPat, patient.prenomPat, rdv.idRdv, rdv.dates, rdv.heure, rdv.motif FROM patient INNER JOIN rdv ON patient.idPatient = rdv.idPat INNER JOIN personnel ON personnel.idPerso = rdv.idDoc  WHERE rdv.idDoc = '".$_SESSION['id']."' AND rdv.statut = 2");
			 ?>
			<thead>
				<tr>
					<th>Date</th>
					<th>Patient</th>
					<th>Motif</th>
					<th>Action</th>
				</tr>
			</thead>

			<?php 
				while ($res = $req->fetch()) {
				?>
				<tr>
					<td><?php echo $res['dates'] ?></td>
					<td><?php echo $res['nomPat'] ." ".$res['prenomPat'] ?></td>
					<td><?php echo $res['motif'] ?></td>
					<th>
						<a href="detail.php?id=<?php echo $res['idPatient'] ?>">Détail</a><br>
					</th>
				</tr>
			<?php } ?>
		</table>
	</article>
</body>
</html>