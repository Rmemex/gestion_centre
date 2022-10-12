<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>RECEPTION | Docteur disponible</title>
	<link rel="stylesheet" type="text/css" href="../../Asset/css/agenn.css">
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
				   <a href="addPat.php">Ajouter patient</a><br>
				   <a href="showPat.php">Gérer patient</a><br>
				</div>

			<a href="showRdv.php"><button class="accordion"><b>Rendez-vous</b></button></a>
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
		<H3>RECEPTION</H3> <hr>
			<div>
				<ul class="liste">
					<li><a href="accueil.php">Accueil</a></li>
					<li>Docteur disponible</li>
				</ul>
			</div>
			<p style="position: relative;left: 450px; color:#AAAAAA;">Aucun docteur disponible</p>
			<table class="tab">
				<thead> 
					<tr> 
						<th></th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</thead>

				<?php 
					$bdd = new PDO("mysql:host=localhost;dbname=cms","root","");
					$bdd->exec("SET NAMES utf8");
					$req = $bdd->query("SELECT personnel.prenomPers, occupation.libele, userlog.idU FROM occupation INNER JOIN personnel ON occupation.idOcc = personnel.occup INNER JOIN userlog ON personnel.idPerso = userlog.idU WHERE statut = '1' ");
					while ($res = $req->fetch()) {	
				?>
					<tr>
						<td>Dr <?php echo $res['prenomPers'] ?></td>
						<td> <?php echo $res['libele'] ?></td>
						<td><img src="../../Asset/Image/poin.png" alt="Actif" style="width: 16%; position: relative; top:4px;"></td>
						<td><a href="liste.php?id=<?php echo $res['idU'] ?>&amp; prenom=<?php echo $res['prenomPers'] ?>" class="lien">Liste d'attente</a></td>
					</tr>
				<?php } ?>
			</table>
	</article>
</body>
</html>