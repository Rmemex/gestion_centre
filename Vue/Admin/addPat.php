<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMIN | Ajout docteur</title>
	<link rel="stylesheet" type="text/css" href="../../Asset/css/sidebar.css">
</head>
<body>
	<header>
		<div class="topnav">
			<a href="deconnecter.php?decon=1" style="float: right; text-decoration:none; color:white;">Déconnecter</a>
			<h1>GESTION D'UN CENTRE MEDICAL</h1>
		</div>
	</header>
	<section>
    	<nav class="navg">
			<button class="accordion"><b>Docteur</b></button>
				<div class="panel">
				   <a href="">Spécialisation</a><br>
				   <a href="Etudiant/afficher.php">Ajouter docteur</a><br>
				   <a href="">Gérer docteur</a><br>
				</div>

			<button class="accordion"><b>Patient</b></button>
				<div class="panel">
				   <a href="Matiere/ajoutM.php">Ajouter patient</a><br>
				   <a href="Matiere/afficher.php">Gérer patient</a><br>
				</div>

			<button class="accordion"><b>Rendez-vous</b></button>
				<div class="panel">
				   <a href="Note/choiceClasse.php">Ajouter rendez-vous</a><br>
				   <a href="Note/affichenote.php">Gérer rendez-vous</a><br>
				</div>

			<a href="historique.php"><button class="accordion"><b>Historique connexion</b></button></a>
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
			<p>GESTION  DOCTEUR</p><br>
			<p>Liste Docteur</p>
			<form method="POST" action="adPatback.php">
				<div>
					<label for="im">IM </label></br>
					<input type="number" name="im" required="" /></br>

					<label for="nom">Nom </label><br/>
					<input type="text" name="nom" required="" /></br>

					<label for="prenom">Prenom </label><br/>
					<input type="text" name="prenom" required="" /></br>

					<label for="sexe">Sexe </label><br/>
					<select name="sexe" class="selection">
						<option value="Masculin">Masculin</option>
						<option value="Feminin">Feminin</option>
					</select><br/>

					<label for="birth">Prenom </label><br/>
					<input type="date" name="birth" required="" /></br>

					<label for="num">Contact </label><br/>
					<input type="number" name="num" required="" /></br>

					<label for="adresse">Adresse </label><br/>
					<input type="text" name="adresse" required="" /></br>

					<input type="submit" name="envoyer" value="Enregistrer" />
				</div>
			</form>
		</div>
	</article>
</body>
</html>