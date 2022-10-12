<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ADMIN | Historique RDV</title>
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
					<li>Historique de rendez-vous</li>
				</ul>
				<input type="text" id="myInput" onkeyup="myFunction()" class="search" placeholder="Rechercher patient" style="float: right; padding: 7px 5px; width: 20%;position: relative; top: 10px;">
			</div>
		</div>

		<table class="tabl" id="myTable">
			<thead>
				<tr>
					<th>#</th>
					<th>Patient</th>
					<th>Docteur</th>
					<th>Motif</th>
					<th>Date / Heure</th>
					<th>Statut</th>
				</tr>
			</thead>

			<?php 
			include("../../Controle/controlRdv.php");
			$rdv = new ControlRdv();
			$listR = $rdv->getR();
			?>
				<?php while ($res = $listR->fetch()){ ?>
				<tr>
					<th><?php echo $res['idRdv'] ?></th>
						<td><?php echo $res['nomPat']." ".$res['prenomPat']?></td>
						<td>Dr <?php echo $res['prenomPers']  ?></td>
						<td><?php echo $res['motif'] ?></td>
						<td><?php echo $res['dates']."  ".$res['heure'] ?></td>
						<td>
							<?php 
							if (($res['statut']==0) || ($res['statut']==1)) {
								echo "Active";
							}
							if ($res['statut']==2) {
								echo "Reçu";
							}
							if ($res['statut']==3) {
								echo "Annulé";
							}
							?>
						</td>
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