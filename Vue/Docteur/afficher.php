<?php 
	$idP= $_GET['id'];
	$idRdv= $_GET['idRdv'];
	session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<title>DOCTEUR | Dossier du patient</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../Asset/css/afficher.css">
	<link rel="stylesheet" type="text/css" href="../../Asset/css/popups.css">
	<style type="text/css">
		.btn{ position: relative; }
	</style>
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
		<H3>DOCTEUR</H3><hr>
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
			 		<li><a href="afficher.php?id=<?php ?>" style="text-decoration: none;color:#60768B"><?php echo $rs['nom']; ?> </a>: <?php echo $rs['statut']; ?> </li>
			 	</ul>
			 	<?php } ?>
			</fieldset>
		</div>

		<table class="tabl">
			<thead>
				<center><legend class="leg"><b>Historique médical</b></legend></center>
				<tr>
					<th>Dates</th>
					<th>Poids</th>
					<th>Tension</th>
					<th>Glycémie</th>
					<th>Température</th>
					<th>Signe</th>
					<th>Maladie</th>
					<th>Prescription</th>
				</tr>
			</thead>

			<?php 
				include("../../Controle/controlHisto.php");
	    		$cons = new ControlHist();
				$req = $cons->affiche($idP);
				while ($res = $req->fetch()) {
			?>
			<tr>
				<td><?php echo $res['dates'] ?></td>
				<td><?php echo $res['poids'] ?></td>
				<td><?php echo $res['tension'] ?></td>
				<td><?php echo $res['glycemie'] ?></td>
				<td><?php echo $res['temperature'] ?></td>
				<td><?php echo $res['signe'] ?></td>
				<td><?php echo $res['maladie'] ?></td>
				<td><a href="ordonnance.php?id=<?php echo $res['idPat'] ?>&amp;dates=<?php echo $res['dates'] ?>&amp;idD=<?php echo $_SESSION['id'] ?>&amp;idHist=<?php echo $res['idHisto'] ?>">Ordonnance</a></td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="2" style="border: 2px solid #dddddd; text-align: left"><b>Allergie :</b></td>
				<td colspan="7" style="border: 2px solid #dddddd; text-align: left" ><?php echo $res['allergie'] ?></td>
			</tr>
		</table>
		<div style="position: relative; top:-50px; left:-45px;">
			<button class="bouton" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Nouvelle consultation</button>
			<a href="endConsult.php?id= <?php echo $idRdv ?>"><button class="bouton" style="background-color: red; width: 12%;">Fin de consultation</button></a>
		</div>
							<!-- Popup -->
		<div id="id01" class="modal">
		    <form class="modal-content animate" method="post" >
		  	    <center><h3>Consultation</h3></center><hr style="position: relative; top:-10px">
			    <div class="container"> <!-- formulaire -->
			    	<label class="lbl">Date :</label>
			        <input type="date" name="date" class="contn" required></br>

			        <label class="lbl">Poids :</label>
			        <input type="text" name="poids" class="ptt" required>

			        <label class="lbl2">Tension :</label>
			        <input type="text" name="tension" class="ptt2" required></br>

			        <label class="lbl">Glycémie :</label>
			        <input type="text" name="gly" class="ptt" required>

			        <label class="lbl2">Température :</label>
			        <input type="text" name="temp" class="ptt2" required></br>

			        <label class="lbl">Signe :</label>
			        <input type="text" name="signe" class="contn" required></br>

			        <label class="lbl">Maladie :</label>
			        <input type="text" name="maladie" class="contn" required></br>

			        <label class="lbl">Allergie :</label>
			        <input type="text" name="allergie" class="contn" ></br>
			        <hr style="width: 106%; position: relative; left: -16px;">
			    </div>

			    <div class="rdv"> <!-- Rendez-vous -->
			    	<p style="position: relative; top:25px; left:20px;"><b>Rendez-vous</b></p><br>
			    	<label class="lbl3">Motif </label>
			        <textarea style="position: relative; left: -30px;" name="motif"></textarea></br>
			        <label class="lbl3">Date :</label>
			        <input type="date" name="dat" class="daty">
			        <label>Heure :</label>
			        <input type="text" name="heure" class="heure" placeholder="00:00">
			    </div>

			    <div class="ordo">
			    	<div style="position: relative; left: 25px; top: 10px;"> <!-- Ordonnance -->
			    		<label><b>Prescription</b></label> <br>
			    		<textarea name="presc" style="width: 365px; height: 400px;"></textarea>
			    	</div>
			    <input type="text" name="idPaty" value="<?php echo $idP ?>" hidden>
			    </div><hr style=" width: 99.5%; position: relative; top: -400px;">
					    
				<div class="boot" style="position: relative; top:-400px;">
					<input type="submit" class="btn" name="envoyer" value="Enregistrer"> 
					<button onclick="document.getElementById('id01').style.display='none'" class="btn">Fermer</button>
				</div>    
			</form>
			<?php 
				if (isset($_POST['envoyer'])) {

				$idPat = $_POST['idPaty'];
				$idD = $_SESSION ['id'];
				$date = $_POST['date'];
				$poids = $_POST['poids'];
				$tension = $_POST['tension'];
				$gly = $_POST['gly'];
				$temp = $_POST['temp'];
				$signe = $_POST['signe'];
				$maladie = $_POST['maladie'];
				$allergie = $_POST['allergie'];
				$presc = $_POST['presc'];

				$bdd = new PDO("mysql:host=localhost;dbname=cms","root","");
				$req = $bdd->query("INSERT INTO histopatient (idHisto, idPat , idDoc ,poids, tension, glycemie, temperature, signe, maladie, dates, allergie, prescription) VALUES (NULL,'$idPat', '$idD', '$poids','$tension', '$gly', '$temp', '$signe', '$maladie','$date', '$allergie', '$presc')");

				if (isset($_POST['motif'])) {
				$rs = $bdd->exec("INSERT INTO rdv (dates, motif, heure, idDoc, idPat, statut) VALUES ('".$_POST['dat']."','".$_POST['motif']."', '".$_POST['heure']."', '".$_SESSION['id']."', '".$_GET['id']."', '0') ");
				}
		    } ?>
		</div>
		<script>
		    var modal = document.getElementById('id01');

		    window.onclick = function(event) {
		        if (event.target == modal) {
		            modal.style.display = "none";
		        }
		    }
		</script>
	</article>
</body>
</html>