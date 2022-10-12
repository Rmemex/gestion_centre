<?php 
	include("../../Controle/controlPersonnel.php");
	$pers = new ControlPers();
	$list = $pers->affiche(); 
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
					<li style="color: #0275d8">Utilisateur</li>
					<li>Ajouter utilisateur</li>
				</ul>
			</div>
			<form method="POST" action="" class="formul">
					<label for="userid">Personnel</label></br>
					<select name="userid">
						<option value="">Selectionner personnel</option>
							<?php while ($res = $list->fetch()) { ?>
						<option value="<?php echo ($res['idPerso']);?>">Dr.<?php echo $res['prenomPers'] ?></option>
					<?php } ?>														
					</select></br>

					<label for="login">Login </label><br/>
					<input type="text" name="login" required></br>

					<label for="email">Email </label><br/>
					<input type="text" name="email" required></br>

					<label for="mdp">Mot de passe </label><br/>
					<input type="text" name="mdp" required></br>

					<label for="fonc">Fonction </label><br/>
					<input type="text" name="fonc" required></br>

					<input type="submit" class="bouton" name="envoyer" value="Enregistrer">
			</form>
		</div>
		<?php
			if (isset($_POST['envoyer'])) {
				include("../../Controle/controlUser.php");

			    $user = new ControlUser();
			    $userid = $_POST['userid'];
				$login = $_POST['login'];
				$email = $_POST['email'];
				$mdp = sha1($_POST['mdp']);
				$fonc = $_POST['fonc'];
			
				$user->inscrire($userid,$login, $email, $mdp, $fonc);
			
				header("location:showUser.php");
			}
		?>
	</article>
</body>
</html>