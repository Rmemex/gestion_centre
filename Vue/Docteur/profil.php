<?php 
	session_start();
	include("../../Controle/ControlOccupation.php") ;
	$occ = new ControlOccupation();
	$list = $occ->getOcc();

	if (isset($_POST['envoyer'])) {
	
		$im = $_POST['im'];
		$occup = $_POST['spec'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$contact = $_POST['num'];
		$adresse = $_POST['adresse'];

		$bdd = new PDO("mysql:host=localhost;dbname=cms","root","");
		$res = $bdd->query("UPDATE personnel SET imPers = '$im', nomPers = '$nom', prenomPers = '$prenom', numPers = '$contact', adressePers = '$adresse', occup = '$occup' WHERE idPerso = '".$_SESSION['id']."' ");
	
		header("location:profil.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>DOCTEUR | Profil</title>
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
			<h3>DOCTEUR</h3><hr>
			<div>
				<ul class="liste">
					<li><a href="accueil.php">Accueil</a></li>
					<li style="color: #0275d8">Docteur</li>
					<li>Mon profil</li>
				</ul>
			</div>
			<?php 
				$bdd = new PDO("mysql:host=localhost;dbname=cms","root","");
				$bdd->exec("SET NAMES utf8");
				$req = $bdd->query("SELECT occupation.idOcc, occupation.libele lib, personnel.idPerso, personnel.imPers, personnel.nomPers, personnel.prenomPers, personnel.numPers, personnel.adressePers, personnel.occup FROM occupation INNER JOIN personnel ON occupation.idOcc = personnel.occup WHERE personnel.idPerso = '".$_SESSION['id']."' ");
				while ($res = $req->fetch()) {
			?>
			<form method="POST" action="" class="formul">
					<label for="spec">Spécialisation</label></br>
					<input type="text" name="spec" value="<?php echo $res['idOcc'];?>" hidden></br>
					<input type="text" class="formu" value="<?php echo $res['lib'];?>" readonly></br>
								
					<label for="im">IM </label></br>
					<input type="number" class="formu" name="im" value="<?php echo $res['imPers'];?>" readonly></br>

					<label for="nom">Nom </label><br/>
					<input type="text" name="nom" value="<?php echo $res['nomPers']; ?>"></br>

					<label for="prenom">Prenom </label><br/>
					<input type="text" name="prenom" value="<?php echo $res['prenomPers']; ?>"></br>

					<label for="num">Contact </label><br/>
					<input type="number" name="num" value="<?php echo $res['numPers']; ?>"></br>

					<label for="adresse">Adresse </label><br/>
					<input type="text" name="adresse" value="<?php echo $res['adressePers']; ?>"></br>

					<input type="submit" class="bouton" name="envoyer" value="Mettre à jour">
			</form>
			<?php } ?>
		</div>
	</article>
</body>
</html>