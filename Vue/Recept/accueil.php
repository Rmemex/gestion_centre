<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>RECEPTION | Accueil</title>
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
			<div class="container">
				<div class="block">
					<a href="showPat.php"><b>Afficher patient</b></a>
				</div> 
				<div class="block1">
					<a href="ShowRdv.php"><b>Afficher rendez-vous</b></a>
				</div>
				<div class="block2">
					<a href="coDoc.php"><b>Docteur disponible</b></a>
				</div>
			</div>
	</article>
</body>
</html>