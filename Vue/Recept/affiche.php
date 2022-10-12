<?php 
 	$idP = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>RECEPTION | Dossier du patient</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../Asset/css/recept.css">
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
		<H3>RECEPTION</H3><hr>
		<div>
			<ul class="liste">
				<li><a href="accueil.php">Accueil</a></li>
				<li style="color: #0275d8">Patient</li>
				<li>Dossier du patient</li>
			</ul>
		</div>
		<div>
			<?php 
				include("../../Controle/ControlPatient.php") ;
				$pat = new ControlPatient();
				$list = $pat->affiche($idP);
				$res = $list->fetch();
			?>
		<div class="l">
			<ul class="cont" style="list-style-type: none; word-spacing: 4px;">
			 	<li class="conte"><b>IM </b>: <?php echo $res['imPat']; ?> </li>
			 	<li class="conte"><b>Nom </b>: <?php echo $res['nomPat']; ?> </li>
			 	<li class="conte"><b>Prénom(s) </b>: <?php echo $res['prenomPat']; ?> </li>
			 	<li class="conte"><b>Direction </b>: <?php echo $res['departement']; ?> </li>
			 	<li class="conte"><b>Service </b>: <?php echo $res['attribution']; ?> </li>
			 	<li class="conte"><b>Sexe </b>: <?php echo $res['sexePat']; ?> </li>
			 	<li class="conte"><b>Date de naissance </b>: <?php echo $res['birthPat']; ?> </li>
			 	<li class="conte"><b>Contact </b>: <?php echo $res['numPat']; ?> </li>
			 	<li class="conte"><b>Adresse </b>: <?php echo $res['adressePat']; ?> </li>
			</ul><br>
		</div>

		<div class="field">
			<fieldset>
				<legend><b>Famille</b></legend>
					<?php 
					include("../../Controle/controlFamille.php") ;
					$F = new ControlFamille();
					$lst = $F->affiche($idP);
					while ($rs = $lst->fetch()){
				?>
				<ul class="cont" style="list-style-type: none; word-spacing: 4px;">
			 		<li><a href="afficher.php?id=<?php ?>" style="text-decoration: none;color:#60768B"><?php echo $rs['nom']." ". $rs['prenom']; ?> </a>: <?php echo $rs['statut']; ?> </li>
			 	</ul>
			 	<?php } ?>
			 	<center><a style="color: blue; position: relative; top:160px; cursor: pointer;" onclick="document.getElementById('id01').style.display='block'"><u>Ajouter famille</u></a></center>
			</fieldset>
		</div>

		<div id="id01" class="modal">
			<form class="modal-content animate" method="post">
				<center><h4>Ajout famille</h4></center><hr>
				<div class="container">
					<label class="lbl">Nom:</label>
					<input type="text" name="nom" class="formu" required></br>

					<label class="lbl">Prénom(s) :</label>
					<input type="text" name="prenom" class="formu" required></br>

					<label class="lbl">Profession :</label>
					<input type="text" name="profession" class="formu" required></br>

					<label class="lbl">Date de naissance :</label>
					<input type="date" name="birth" class="formu" required></br>

					<label class="lbl">Contact:</label>
					<input type="text" name="num" class="formu" required></br>

					<label class="lbl">Adresse :</label>
					<input type="text" name="adresse" class="formu" required></br>

					<label class="lbl">Statut :</label>
					<select class="formu">
						<option value="Conjoint">Conjoint</option>
						<option value="Enfant">Enfant</option>
					</select><br>
				</div>
				<input type="submit" class="btn" name="envoyer" value="Enregistrer"> 
				<button onclick="document.getElementById('id01').style.display='none'" class="btn">Fermer</button>
			</form>
		</div>
	</article>
</body>
</html>