<?php 
	$idDoc = $_GET['id'];
	date_default_timezone_set('Africa/Nairobi');
	$date = date('Y-m-d');
	$heure = date('h:i');
	include("../../Controle/ControlPatient.php") ;
	$occ = new ControlPatient();
	$list = $occ->getPat();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>RECEPTION | Liste d'attente</title>
	<link rel="stylesheet" type="text/css" href="../../Asset/css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../../Asset/css/styu.css">
	<link rel="stylesheet" type="text/css" href="../../Asset/css/rdv.css">
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
		<H3>RECEPTION</H3><hr>
			<div>
				<ul class="liste">
					<li><a href="accueil.php">Accueil</a></li>
					<li style="color: #0275d8">Docteur</li>
					<li>Liste d'attente</li>
				</ul>
			</div>
		</div>
		<table class="tabl">
			<thead>
				<center><legend class="leg"><b>Liste d'attente de Dr <?php echo $_GET['prenom']; ?></b></legend></center>
				<tr>
					<th>Date</th>
					<th>Heure</th>
					<th>Patient</th>
					<th>Motif</th>
				</tr>
			</thead>

			<?php 
				$bdd = new PDO("mysql:host=localhost;dbname=cms","root","");
				$bdd->exec("SET NAMES utf8");
				$req = $bdd->query("SELECT patient.idPatient, patient.nomPat, patient.prenomPat, rdv.idRdv, rdv.dates, rdv.heure, rdv.motif FROM patient INNER JOIN rdv ON patient.idPatient = rdv.idPat INNER JOIN personnel ON personnel.idPerso = rdv.idDoc  WHERE rdv.idDoc = '$idDoc' AND rdv.statut = '1' AND rdv.dates = '$date' ORDER BY rdv.heure");
				while ($res = $req->fetch()) {
				?>
				<tr>
					<td><?php echo $res['dates'] ?> </td>
					<td><?php echo $res['heure'] ?></td>
					<td><?php echo $res['nomPat']." ".$res['prenomPat']  ?></td>
					<td><?php echo $res['motif'] ?></td>
				</tr>
			<?php } ?>
		</table>
		<button class="boutn" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Ajouter</button>
		
		<div id="id01" class="modal">
			<form class="modal-content animate" method="post" id="myForm">
			<center><h3>Ajout à la liste d'attente</h3></center><hr style="position: relative;top:-20px">
			    <div class="rdv"> <!-- Rendez-vous -->
			    	<label class="lbl">Patient :</label>
					<input list="attrib" type="text" id="myInput" class="for" style="width: 50%" name="appareil">
					<datalist id="attrib">
						<?php 
							$bdd = new PDO("mysql:host=localhost;dbname=cms","root","");
							$rq = $bdd->query("SELECT * FROM patient");
							while ($rs = $rq->fetch()) {;
						?>
						<option value="<?php echo $rs['nomPat']." ".  $rs['prenomPat'] ?>" data-id="<?php echo $rs['idPatient'] ?>"></option>
						<?php } ?>
					</datalist><br>
					<input type="text" name="idPat" hidden="">
					<script type="text/javascript">
						document.addEventListener('DOMContentLoaded',function(){
							document.forms.myForm.appareil.addEventListener('change',function(oEvent){
								let oIdAppareil = this.form["idPat"], aoOptions = this.list.options;
								oIdAppareil.value = '';
								for(let option of aoOptions){
									if(option.value == this.value) {
										oIdAppareil.value = option.dataset.id
									break;
								}
							}
						})
					});
					</script>
			    	<label class="lbl">Motif </label>
			        <input type="text" name="motif" class="for"></br>
			        <label class="lbl">Date :</label>
			        <input type="text" name="dat" class="daty" value="<?php echo $date ?>">
			        <label class="lbl1">Heure :</label>
			        <input type="text" name="heure" value="<?php echo $heure ?>" class="heure" style="width: 15%;"><br>
			        <span><input type="submit" name="envoyer" value="Enregistrer" class="botn"> 
			        <button onclick="document.getElementById('id01').style.display='none'" class="botn">Annuler</button></span>
			    </div>  
		</form>
	<?php
		if (isset($_POST['envoyer'])) {
			$bdd = new PDO("mysql:host=localhost;dbname=cms","root","");
			$rs = $bdd->exec("INSERT INTO rdv (dates, motif, heure, idDoc, idPat, statut) VALUES ('".$_POST['dat']."','".$_POST['motif']."', '".$_POST['heure']."', '".$_GET['id']."', '".$_POST['idPat']."', '1') ");
		}
	?>
	</article>
</body>
</html>