<?php
	if (isset($_POST['envoyer'])) {
		include("../../Controle/controlPatient.php");

	     $Pat = new ControlPatient();
	
		$idPat = $_GET['id'];
		$im = $_POST['im'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$depart = $_POST['depart'];
		$attrib = $_POST['attrib'];
		$sexe = $_POST['sexe'];
		$birth = $_POST['birth'];
		$num = $_POST['num'];
		$adresse = $_POST['adresse'];

		echo $im.'<br>'; echo $nom.'<br>'; echo $prenom.'<br>'; echo $sexe.'<br>'; echo $depart.'<br>'; echo $attrib.'<br>'; echo $birth.'<br>'; echo $num.'<br>'; echo $adresse.'<br>';

		$bdd = new PDO("mysql:host=localhost;dbname=progDTS","root","");
		$res = $bdd->query("UPDATE patient SET imPat = '$im', nomPat = '$nom', prenomPat = '$prenom', departement = '$depart', attribution = '$attrib', sexePat = '$sexe', birthPat = '$birth', numPat = '$num', adressePat = '$adresse' WHERE idPatient = '$idPat' ");
		
		header("location:showPat.php");
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ADMIN | Modifier patient</title>
	<link rel="stylesheet" type="text/css" href="../../Asset/css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../../Asset/css/fomr.css">
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
		<div>
			<h3>ADMINISTRATEUR</h3><hr>
			<div>
				<ul class="liste">
					<li><a href="accueil.php">Accueil</a></li>
					<li style="color: #0275d8">Patient</li>
					<li>Modifier patient</li>
				</ul>
			</div>
			<form method="POST" action="" class="formul">
					<label for="im">IM </label></br>
					<input type="number" class="formu" name="im" value="<?php echo $_GET['im'];?>" readonly></br>

					<label for="nom">Nom </label><br/>
					<input type="text" name="nom" value="<?php echo $_GET['nom']; ?>"></br>

					<label for="prenom">Prenom </label><br/>
					<input type="text" name="prenom" value="<?php echo $_GET['prenom']; ?>"></br>

					<label for="sexe">Sexe </label><br/>
					<input type="text" name="sexe" value="<?php echo $_GET['sexe']; ?>"></br>

					<label for="birth">Date de naissance </label><br/>
					<input type="text" name="birth" value="<?php echo $_GET['birth']; ?>"></br>

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