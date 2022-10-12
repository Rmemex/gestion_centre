<?php 
	include("../../Controle/ControlOccupation.php") ;
	$occ = new ControlOccupation();
	$list = $occ->getOcc();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ADMIN | Ajout docteur</title>
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
					<li>Ajouter docteur</li>
				</ul>
			</div>
			<form method="POST" action="" class="formul">
					<label for="spec">Spécialisation</label></br>
					<select name="spec">
						<option value="">Selectionner occupation</option>
							<?php while ($res = $list->fetch()){ ?>
								<option value="<?php echo ($res['idOcc']);?>"><?php echo ($res['libele']);?></option>
						<?php } ?>														
					</select></br>

					<label for="im">IM </label></br>
					<input type="number" class="formu" name="im" placeholder="N° matricule" required></br>

					<label for="nom">Nom </label><br/>
					<input type="text" name="nom" required></br>

					<label for="prenom">Prénom(s) </label><br/>
					<input type="text" name="prenom" required></br>

					<label for="num">Contact </label><br/>
					<input type="number" name="num" required></br>

					<label for="adresse">Adresse </label><br/>
					<input type="text" name="adresse" required></br>

					<input type="submit" class="bouton" name="envoyer" value="Enregistrer">
			</form>
		</div>
		<?php
			if (isset($_POST['envoyer'])) {
				include("../../Controle/controlPersonnel.php");
			     $Pers = new ControlPers();
			
				$im = $_POST['im'];
				$occup = $_POST['spec'];
				$nom = $_POST['nom'];
				$prenom = $_POST['prenom'];
				$contact = $_POST['num'];
				$adresse = $_POST['adresse'];

				$Pers->inscrire($im,$nom, $prenom, $contact, $adresse,$occup);
			
				header("location:showDoc.php");
			}
		?>
	</article>
</body>
</html>