<?php 
	session_start();
	$idRdv = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>DOCTEUR | Agenda</title>
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
		<H3>DOCTEUR</H3><hr>
			<div>
				<ul class="liste">
					<li><a href="accueil.php">Accueil</a></li>
					<li>Modifier RDV</li>
				</ul>
			</div>
		</div>
		<form method="POST" action="" class="formul">
			<label for="date">Date</label></br>
			<input type="date" name="date" class="formu" value="<?php echo ($_GET['dates']);?>" ></br>

			<label for="heure">Heure </label></br>
			<input type="text" class="formu" name="heure" value="<?php echo $_GET['heure'];?>" ></br>

			<label for="nom">Patient </label><br/>
			<input type="text" value="<?php echo $_GET['nom']." ".$_GET['prenom'] ?>" readonly></br>
			<input type="text" name="nom" value="<?php echo $_GET['idPat'] ?>" hidden >

			<label for="motif">Motif </label><br/>
			<input type="text" name="motif" value="<?php echo $_GET['motif']; ?>"></br>

			<input type="submit" class="bouton" name="envoyer" value="Mettre à jour">
		</form>
	</article>
	<?php
		if (isset($_POST['envoyer'])) {
			include("../../Controle/controlRdv.php");

		    $Rdv = new ControlRdv();
			$date = $_POST['date'];
			$motif = $_POST['motif'];
			$heure = $_POST['heure'];
			$idPat = $_POST['nom'];
			$idDoc = $_SESSION['id'];

			echo $date.'<br>';
			echo $motif.'<br>';
			echo $heure.'<br>';
			echo $idPat.'<br>';
			echo $idDoc.'<br>';
		
			$Rdv->modifier($idRdv,$date,$motif,$heure,$idDoc,$idPat);
		
			header("location:histoRDV.php");
		}
	?>
</body>
</html>