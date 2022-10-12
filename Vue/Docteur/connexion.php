<?php 
	session_start();
	include("../../Modele/Connexion/connexion.php");
	error_reporting(0);
	$username = $_POST['user'];
	$pass = ($_POST['pwd']); echo "$pass";
	if(isset($_POST['connecter']))
	{
		$bdd = new PDO("mysql:host=localhost;dbname=cms","root","");
		$req = $bdd->query("SELECT personnel.idPerso, user.id, user.userid, user.login, user.email, user.pass, user.fonction FROM user INNER JOIN personnel ON user.userid = personnel.idPerso WHERE login = '$username' AND pass = '$pass' AND fonction ='docteur'");
		$num = $req->fetch();
		if ($num > 0) {
			$_SESSION['dlogin'] = $username;
			$_SESSION['id'] = $num['idPerso'];
			date_default_timezone_set('Africa/Nairobi');
			$ldate=date( 'd-m-Y H:i:s  ', time());
			$statut = 1 ;
			$log= $bdd->query("INSERT INTO userlog (id,idU,logintime,statut) VALUES (NULL, '".$_SESSION['id']."', '$ldate', '$statut')");
			header("location:accueil.php");
		}
		else{
			$msg="Identifiant ou mot de passe incorrecte";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>DOCTEUR | Connexion</title>
		<link rel="stylesheet" type="text/css" href="../../Asset/css/connex.css">
	</head>
	<body>
	<H3>Connexion Docteur</H3>
	<fieldset class="card"><legend style="color: #545454;">Connectez-vous</legend>
			<form method="post" action="">
				<p>Entrer votre identifiant et votre mot de passe</p>
				<p style="color: red;font-size: 11px;"><?php if($msg){ echo $msg; } ?> </p>
		  		<label for="admail">Nom utilisateur</label><br>
		  		<input type="text" name="user" required><br>
		  		<label for="pwd">Mot de passe</label><br>
		  		<input type="password" name="pwd" id="show" required>
		  		<input type="checkbox" onclick="myFunction()">Afficher mot de passe

				<script>
				function myFunction() {
				  var x = document.getElementById("show");
				  if (x.type === "password") {
				    x.type = "text";
				  } else {
				    x.type = "password";
				  }
				}
				</script>
		  		
		    	<button type="submit" name="connecter" style="background-color: #7C7C7C">Connecter</button>
			 	<div>
			        <a href="#">Mot de passe oublié?</a>
				</div>
			</form>
	    </fieldset>
	<footer>
  		<p>&copy; R.Mendrika <?php echo date('Y'); ?> | Tous droits réservés </p>
	</footer>
</body>
</html>