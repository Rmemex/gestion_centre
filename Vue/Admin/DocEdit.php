<?php
	$idP = $_GET['id'];
	if (isset($_POST['envoyer'])) {

		$im = $_POST['im'];
		$occup = $_POST['spec'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$contact = $_POST['num'];
		$adresse = $_POST['adresse'];

		$bdd = new PDO("mysql:host=localhost;dbname=cms","root","");
		$res = $bdd->query("UPDATE personnel SET imPers = '$im', nomPers = '$nom', prenomPers = '$prenom', numPers = '$contact', adressePers = '$adresse', occup = '$occup' WHERE idPerso = '$idP' ");

		header("location:showDoc.php");
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ADMIN | Modifier docteur</title>
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
			<h3>ADMINISTRATEUR</h3><hr>
			<div>
				<ul class="liste">
					<li><a href="accueil.php">Accueil</a></li>
					<li style="color: #0275d8">Docteur</li>
					<li>Modifier docteur</li>
				</ul>
			</div>
			<form method="POST" action="" class="formul">
				<label for="spec">Spécialisation</label></br>
				<input type="number" name="spec" value="<?php echo $_GET['occ'];?>" hidden>
				<input type="text" class="formu" value="<?php echo ($_GET['lib']);?>" readonly></br>

				<label for="im">IM </label></br>
				<input type="number" class="formu" name="im" value="<?php echo $_GET['mat'];?>" readonly></br>

				<label for="nom">Nom </label><br/>
				<input type="text" name="nom" value="<?php echo $_GET['nom']; ?>"></br>

				<label for="prenom">Prenom </label><br/>
				<input type="text" name="prenom" value="<?php echo $_GET['pre']; ?>"></br>

				<label for="num">Contact </label><br/>
				<input type="number" name="num" value="<?php echo $_GET['num']; ?>"></br>

				<label for="adresse">Adresse </label><br/>
				<input type="text" name="adresse" value="<?php echo $_GET['adresse']; ?>"></br>

				<input type="submit" class="bouton" name="envoyer" value="Mettre à jour">
			</form>
		</div>
	</article>
</body>
</html>