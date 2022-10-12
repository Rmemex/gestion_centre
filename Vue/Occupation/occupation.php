<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ADMINISTRATEUR | Spécialisation</title>
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
				   <a href="">Spécialisation</a><br>
				   <a href="../Admin/addDoc.php">Ajouter docteur</a><br>
				   <a href="../Admin/showDoc.php">Gérer docteur</a><br>
				</div>

			<button class="accordion"><b>Patient</b></button>
				<div class="panel">
				   <a href="../Admin/addPat.php">Ajouter patient</a><br>
				   <a href="../Admin/showPat.php">Gérer patient</a><br>
				</div>

			<a href="../Admin/histoRDV.php"><button class="accordion"><b>Historique rendez-vous</b></button></a>

			<a href="../Admin/histoconnex.php"><button class="accordion"><b>Historique connexion</b></button></a>
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
					<li style="color: #0275d8">Docteur</li>
					<li>Spécialisation</li>
				</ul>
			</div>
			<form method="post" action="" style="position: relative; left: 300px;">
		  		<input type="text" name="spec" placeholder="Entrer une spécialisation" required><br>
		    	<input type="submit" class="envoi" name="envoie" value="Enregistrer">
			</form>
		</div>
		<?php
			if (isset($_POST['envoie'])) {
				include("../../Controle/controlOccupation.php");
				$Oc = new ControlOccupation();
				$lbl = $_POST['spec'];
				echo $lbl.'<br>';
				$Oc->inscrire($lbl);
				header("location:occupation.php");
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
			include("../../Controle/ControlOccupation.php");
			$Occ = new ControlOccupation();
			$req = $Occ->affiche();
			while ($res = $req->fetch()) {
				?>
				<tr>
					<th><?php echo $res['idOcc'] ?></th>
					<td><?php echo $res['libele'] ?></td>
					<th><a href="DelOcc.php?id=<?php echo $res['idOcc'] ?>">Supprimer</a></th>
				</tr>
			<?php } ?>
		</table>
	</article>
</body>
</html>