<?php 
	session_start();
	include("../../Controle/ControlPatient.php") ;
	$occ = new ControlPatient();
	$list = $occ->getPat();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>DOCTEUR | Agenda</title>
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
					<li>Agenda</li>
				</ul>
			</div>
		</div>
		<table class="tabl">
			<thead>
				<tr>
					<th>Date</th>
					<th>Heure</th>
					<th>Patient</th>
					<th>Motif</th>
					<th>Action</th>
				</tr>
			</thead>

			<?php 
				$bdd = new PDO("mysql:host=localhost;dbname=cms","root","");
				$req = $bdd->query("SELECT patient.idPatient, patient.nomPat, patient.prenomPat, rdv.idRdv, rdv.dates, rdv.heure, rdv.motif FROM patient INNER JOIN rdv ON patient.idPatient = rdv.idPat INNER JOIN personnel ON personnel.idPerso = rdv.idDoc  WHERE rdv.idDoc = '".$_SESSION['id']."' ORDER BY rdv.dates ");
				while ($res = $req->fetch()) {
				?>
				<tr>
					<td><?php echo $res['dates'] ?> </td>
					<td><?php echo $res['heure'] ?></td>
					<td><?php echo $res['nomPat']." ".$res['prenomPat']  ?></td>
					<td><?php echo $res['motif'] ?></td>
					<th>
						<a href="modRdv.php?id=<?php echo $res['idRdv'] ?>&amp;idPat=<?php echo $res['idPatient'] ?>&amp;dates=<?php echo $res['dates'] ?>&amp;heure=<?php echo $res['heure'] ?>&amp;nom=<?php echo $res['nomPat'] ?>&amp;prenom=<?php echo $res['prenomPat'] ?>&amp;motif=<?php echo $res['motif'] ?>">Modifier</a><br>
					</th>
				</tr>
			<?php } ?>
		</table>
		<button class="boutn" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Ajouter RDV</button>
		<div id="id01" class="modal">
		    <form class="modal-content animate" method="POST">
		  	    <center><h3>Nouveau RDV</h3></center><hr style="position: relative; top:-10px">
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
			        <input type="date" name="dat" class="daty">
			        <label class="lbl1">Heure :</label>
			        <input type="text" name="heure" placeholder="00:00" class="heure" style="width: 15%;"><br>
			        <span><input type="submit" name="envoyer" value="Enregistrer" class="botn"> 
			        <button onclick="document.getElementById('id01').style.display='none'" class="botn">Annuler</button></span>
			    </div>  
			</form>
		<script>
		    var modal = document.getElementById('id01');

		    window.onclick = function(event) {
		        if (event.target == modal) {
		            modal.style.display = "none";
		        }
		    }
		</script>
		</div>
		<?php
			if (isset($_POST['envoyer'])) {
				$bdd = new PDO("mysql:host=localhost;dbname=cms","root","");
				$rs = $bdd->exec("INSERT INTO rdv (dates, motif, heure, idDoc, idPat, statut) VALUES ('".$_POST['dat']."','".$_POST['motif']."', '".$_POST['heure']."', '".$_SESSION['id']."', '".$_POST['idPat']."', '0') ");
			}
		?>
	</article>
</body>
</html>