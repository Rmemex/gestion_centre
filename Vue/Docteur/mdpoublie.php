<?php
session_start();
error_reporting(0);
include("../../Modele/Connexion/connexion.php");

if(isset($_POST['reset']))
  {
    $contactno=$_POST['num'];
    $email=$_POST['email'];

    $bdd = new PDO("mysql:host=localhost;dbname=cms","root","");
	$req = $bdd->query("SELECT user.login, user.email FROM user WHERE login = '$username' AND mdp = '$pass' AND fonction ='docteur'");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['contactno']=$contactno;
      $_SESSION['email']=$email;
     header('location:recumdp.php');
    }
    else{
      $msg="Informations invalide, réessayez";
    }
  }
  ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>RECEPTION</title>
		<link rel="stylesheet" type="text/css" href="../../Asset/css/conex.css">
	</head>
	<body>
	<H3>Connexion Admin</H3>
	<fieldset class="card"><legend style="color: #545454;">Connectez-vous</legend>
			<form method="post" action="recumdp.php"> 
				<p><?php if($msg){echo $msg;}  ?> </p>
				<p>Entrer votre identifiant et votre mot de passe</p>
		  		<label for="email">Email</label><br>
		  		<input type="text" name="email" required><br>
		  		<label for="num">Numéro mobile</label><br>
		  		<input type="number" name="num" required>

		    	<button type="submit" name="reset" style="background-color: #7C7C7C">Changer</button>
			</form>
	    </fieldset>
	<footer>
  		<p>&copy; R.Mendrika <?php echo date('Y'); ?> | Tous droits réservés </p>
	</footer>
</body>
</html>