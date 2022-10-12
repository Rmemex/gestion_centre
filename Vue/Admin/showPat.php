<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ADMIN | Liste des patients</title>
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
					<li><a href="accueil.php">Accueil</a></li>
					<li style="color: #0275d8">Patient</li>
					<li>Liste des patients</li>
				</ul>
				<input type="text" id="myInput" onkeyup="myFunction()" class="search" placeholder="Rechercher patient" style="float: right; padding: 7px 5px; width: 20%;position: relative; top: 10px;">
			</div>
		</div>

		<table class="tabl"  id="myTable">
			<thead>
				<tr>
					<th>#</th>
					<th>IM</th>
					<th>Nom et prénom(s)</th>
					<th>Contact</th>
					<th>Adresse</th>
					<th>Action</th>
				</tr>
			</thead>

			<?php 
			include("../../Controle/controlPatient.php");
			$Pat = new ControlPatient();
			$req = $Pat->getPat();
			while ($res = $req->fetch()) {
				?>
				<tr>
					<th><?php echo $res['idPatient'] ?></th>
					<th><?php echo $res['imPat'] ?></th>
					<td><?php echo $res['nomPat'] ." ".$res['prenomPat']?></td>
					<td><?php echo $res['numPat'] ?></td>
					<td><?php echo $res['adressePat'] ?></td>
					<th><a href="supPat.php?id=<?php echo $res['idPatient'] ?>">Supprimer</a></th>
				</tr>
			<?php } ?>
		</table>
		<script>
			function myFunction() {
			  var input, filter, table, tr, td, i, txtValue;
			  input = document.getElementById("myInput");
			  filter = input.value.toUpperCase();
			  table = document.getElementById("myTable");
			  tr = table.getElementsByTagName("tr");
			  for (i = 0; i < tr.length; i++) {
			    td = tr[i].getElementsByTagName("td")[0];
			    if (td) {
			      txtValue = td.textContent || td.innerText;
			      if (txtValue.toUpperCase().indexOf(filter) > -1) {
			        tr[i].style.display = "";
			      } else {
			        tr[i].style.display = "none";
			      }
			    }       
			  }
			}
		</script>
	</article>
</body>
</html>