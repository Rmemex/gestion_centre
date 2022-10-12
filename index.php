<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>GESTION D'UN CENTRE MEDICAL | Accueil</title>
	<style type="text/css">
		body{
			background-color: #60768B; 
		}
		.container{ display: flex; flex-flow: row wrap ;justify-content: space-between;}

		.block, .block1, .block2{
			display: inline-block;
			background-color: white;
			border-radius: 7px;
			box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
			transition: 0.3s;
			margin-top: 20px;
		}
		.block{ padding: 40px 100px 40px 100px; position: relative; left:180px; }

		.block1{ padding: 40px 100px 40px 100px;}

		.block2{ padding: 40px 75px 40px 75px; position: relative; right:180px; }

		a{ text-decoration: none; color: black; }

		h1{ color: white; margin-top: 150px; text-align: center; font-size: 45px; word-spacing: 7px;}

	</style>
</head>
<body>
	<h1>SYSTEME DE GESTION D'UN CENTRE MEDICAL</h1>
	<div class="container"> 
		<div class="block">
			<a href="Vue/Recept/connexion.php"><b>RECEPTION</b></a>
		</div>
		<div class="block1">
			<a href="Vue/Docteur/connexion.php"><b>DOCTEUR</b></a>
		</div>
		<div class="block2">
			<a href="Vue/Admin/connexion.php"><b>ADMINISTRATEUR</b></a>
		</div>
	</div>
</body>
</html>