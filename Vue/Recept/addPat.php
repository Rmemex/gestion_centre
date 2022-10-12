<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>RECEPTION | Ajout patient</title>
	<link rel="stylesheet" type="text/css" href="../../Asset/css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../../Asset/css/styu.css">
	<link rel="stylesheet" type="text/css" href="../../Asset/css/rd.css">
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
				   <a href="tst.php">Ajouter patient</a><br>
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
			<h3>RECEPTION</h3><hr>
			<div>
				<ul class="liste">
					<li><a href="accueil.php">Accueil</a></li>
					<li style="color: #0275d8">Docteur</li>
					<li>Ajouter docteur</li>
				</ul>
			</div>
		<form method="POST" action="" class="formul" id="myForm">
			<label>IM</label><br>
			<input type="number" name="im" class="formu" required=""> <br>
			<label>Nom</label><br>
			<input type="text" name="nom" class="formu" required=""> <br>
			<label>Prénom(s)</label><br>
			<input type="text" name="prenom" class="formu" required=""> <br>
			<label for="spec">Département</label></br>
			<input list="depart" type="text" id="myInput" name="appareil">
			<datalist id="depart">
				<?php 
					$bdd = new PDO("mysql:host=localhost;dbname=cms","root","");
					$bdd->exec("SET NAMES utf8");
					$req = $bdd->query("SELECT * FROM depart");
					while ($res = $req->fetch()) {;
				?>
				<option value="<?php echo $res['nom'] ?>" data-id="<?php echo $res['idDepart'] ?>"></option>
				<?php } ?>
			</datalist><br>
			<input type="text" name="depart" hidden="">
			<script type="text/javascript">
				document.addEventListener('DOMContentLoaded',function(){
					document.forms.myForm.appareil.addEventListener('change',function(oEvent){
						let oIdAppareil = this.form["depart"], aoOptions = this.list.options;
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

			<label for="spec">Attribution</label></br>
			<input list="attrib" type="text" id="myInput" name="app">
			<datalist id="attrib">
				<?php 
					$rq = $bdd->query("SELECT * FROM attribut");
					while ($rs = $rq->fetch()) {;
				?>
				<option value="<?php echo $rs['nom'] ?>" data-id="<?php echo $rs['idAttrib'] ?>"></option>
				<?php } ?>
			</datalist><br>
			<input type="text" name="attrib" hidden="">
					<script type="text/javascript">
						document.addEventListener('DOMContentLoaded',function(){
							document.forms.myForm.app.addEventListener('change',function(oEvent){
								let oIdApparei = this.form["attrib"], aoOption = this.list.options;
								oIdApparei.value = '';
								for(let options of aoOption){
									if(options.value == this.value) {
										oIdApparei.value = options.dataset.id
									break;
								}
							}
						})
					});
					</script>

			<label>Sexe</label><br>
			<input type="radio" name="sexe" value="Masculin" class="formu">Masculin 
			<input type="radio" name="sexe" value="Feminin" class="formu"> Féminin <br>
			<label>Date de naissance</label><br>
			<input type="date" name="birth" required=""> <br>
			<label>Contact</label><br>
			<input type="number" name="num" class="formu" required=""> <br>
			<label>Adresse</label><br>
			<input type="text" name="adresse" class="formu" required=""> <br>
			<input type="submit" name="ok" value="Enregistrer" class="bouton">
		</form>
<?php 
	if (isset($_POST['ok'])) {
		//$im = $_POST['im'];
		//$nom = $_POST['nom'];
		//$prenom = $_POST['prenom'];
		//$depart = $_POST['depart'];
		//$attrib = $_POST['attrib'];
		//$sexe = $_POST['sexe'];
		//$date = $_POST['birth'];
		//$num = $_POST['num'];
		//$adresse = $_POST['adresse'];

		//echo $im.'<br>';echo $nom.'<br>';echo $prenom.'<br>';echo $depart.'<br>';echo $attrib.'<br>';echo $sexe.'<br>';echo $date.'<br>';echo $num.'<br>';echo $adresse.'<br>';
		$bdd = new PDO("mysql:host=localhost;dbname=cms","root","");
		$req = $bdd->exec("INSERT INTO patient (idPatient,imPat, nomPat, prenomPat, departement, attribution, sexePat, birthPat, numPat, adressePat) VALUES (NULL, '".$_POST['im']."','".$_POST['nom']."', '".$_POST['prenom']."','".$_POST['depart']."', '".$_POST['attrib']."', '".$_POST['sexe']."', '".$_POST['birth']."', '".$_POST['num']."' , '".$_POST['adresse']."') ");

		header("location:showPat.php");
	}
?>
</body>
</html>
