<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ADMIN | Accueil</title>
	<link rel="stylesheet" type="text/css" href="../../Asset/css/acc.css">
	<link rel="stylesheet" type="text/css" href="../../Asset/css/sidebar.css">
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
		<H3>ADMINISTRATEUR</H3> <hr>
			<div class="container">
				<div class="block">
					<a href="showDoc.php"><b>Afficher docteur</b></a>
				</div>
				<div class="block1">
					<a href="showPat.php"><b>Afficher patient</b></a>
				</div> 
				<div class="block2">
					<a href="histoRDV.php"><b>Afficher rendez-vous</b></a>
				</div>
				<div class="block3">
					<a href="histoconnex.php"><b>Historique connexion</b></a>
				</div>
			</div>
	</article>
</body>
</html>