<?php 
	include("../../Controle/ControlAttrib.php");
	include("../../Controle/ControlDepart.php");
	$Atr = new ControlAttrib();
	$dep = new ControlDepart();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ADMINISTRATEUR | Attribution</title>
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
					<li>Attribution</li>
				</ul>
			</div>
			<form method="post" action="" style="position: relative; left: 300px;">
					<select name="depart">
						<option value="">Selectionner le département</option>
							<?php 
							$list = $dep->getDepart();
							while ($res = $list->fetch()){ ?>
								<option value="<?php echo ($res['idDepart']);?>"><?php echo ($res['nom']);?></option>
						<?php } ?>														
					</select></br>
		  		<input type="text" name="nom" placeholder="Entrer une attribution" required><br>
		    	<input type="submit" class="envoi" name="envoie" value="Enregistrer">
			</form>
		</div>
		<?php
			if (isset($_POST['envoie'])) {
				$nom = $_POST['nom'];
				$depart = $_POST['depart'];
				echo $depart.'<br>';echo $nom;
				$Atr->inscrire($nom,$depart);
				header("location:attrib.php");
			}
		?>

		<table class="tabl" style="position: relative; top: 30px;">
			<thead>
				<tr>
					<th>#</th>
					<th>Département</th>
					<th>Attribution</th>
					<th>Action</th>
				</tr>
			</thead>

			<?php 
			$req = $Atr->show();
			while ($res = $req->fetch()) {
				?>
				<tr>
					<th><?php echo $res['idAttrib'] ?></th>
					<td><?php echo $res['nomD']  ?></td>
					<td><?php echo $res['nom'] ?></td>
					<th><a href="supAtrib.php?id=<?php echo $res['idAttrib'] ?>">Supprimer</a></th>
				</tr>
			<?php } ?>
		</table>
	</article>
</body>
</html>