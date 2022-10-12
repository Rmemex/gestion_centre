<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ADMIN | Historique de connexion</title>
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
			<button class="accordion"><b>Docteur</b></button>
				<div class="panel">
				   <a href="../Occupation/occupation.php">Spécialisation</a><br>
				   <a href="addDoc.php">Ajouter docteur</a><br>
				   <a href="showDoc.php">Gérer docteur</a><br>
				</div>

			<button class="accordion"><b>Patient</b></button>
				<div class="panel">
				   <a href="depart.php">Département</a><br>
				   <a href="attrib.php">Attribution</a><br>
				   <a href="showDoc.php">Gérer patient</a><br>
				</div>

			<button class="accordion"><b>Utilisateur</b></button>
				<div class="panel">
				   <a href="addUser.php">Ajouter utilisateur</a><br>
				   <a href="showUser.php">Gérer utilisateur</a><br>
				</div>

			<a href="histoRDV.php"><button class="accordion"><b>Historique rendez-vous</b></button></a>

			<a href="histoconnex.php"><button class="accordion"><b>Historique connexion</b></button></a>
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
		<H3>ADMINISTRATEUR</H3><hr>
			<div>
				<ul class="liste">
					<li><a href="accueil.php">Accueil</a></li>
					<li>Historique de connexion</li>
				</ul>
			</div>
		</div>

		<table class="tabl">
			<thead>
				<tr>
					<th>#</th>
					<th>Identifiant</th>
					<th>Connexion</th>
					<th>Deconnexion</th>
				</tr>
			</thead>

			<?php 
			include("../../Controle/controlUserlog.php");
			$Usl = new ControlUserlog();
			$req = $Usl->affiche();
			while ($res = $req->fetch()) {
				?>
				<tr>
					<th><?php echo $res['id'] ?></th>
					<td><?php echo $res['identifiant'] ?></td>
					<td><?php echo $res['login'] ?></td>
					<td><?php echo $res['logout'] ?></td>
				</tr>
			<?php } ?>
		</table>
	</article>
</body>
</html>