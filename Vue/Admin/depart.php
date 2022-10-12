<?php 
	include("../../Controle/controlDepart.php");
	$Dep = new ControlDepart();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ADMINISTRATEUR | Département</title>
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
					<li><a href="../Admin/accueil.php">Accueil</a></li>
					<li style="color: #0275d8">Patient</li>
					<li>Département</li>
				</ul>
			</div>
			<form method="post" action="" style="position: relative; left: 300px;">
		  		<input type="text" name="nom" placeholder="Entrer un département" required><br>
		    	<input type="submit" class="envoi" name="envoie" value="Enregistrer">
			</form>
		</div>
		<?php
			if (isset($_POST['envoie'])) {
				$nom = $_POST['nom'];
				$Dep->inscrire($nom);
				header("location:depart.php");
			}
		?>

		<table class="tabl" style="position: relative; top: 30px;">
			<thead>
				<tr>
					<th>#</th>
					<th>Occupation</th>
					<th>Action</th>
				</tr>
			</thead>

			<?php 
			$req = $Dep->affiche();
			while ($res = $req->fetch()) {
				?>
				<tr>
					<th><?php echo $res['idDepart'] ?></th>
					<td><?php echo $res['nom'] ?></td>
					<th><a href="suDep.php?id=<?php echo $res['idDepart'] ?>">Supprimer</a></th>
				</tr>
			<?php } ?>
		</table>
	</article>
</body>
</html>