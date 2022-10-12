<?php 
	session_start();
	$nom = $_POST['user'];
	$pass = $_POST['pass'];
	
	$bdd = new PDO("mysql:host=localhost;dbname=progdts","root","");
	$existe = $bdd->query("SELECT count(login) as nb FROM user WHERE login = '$name' AND mdp = '$pass' ");
	$nbUse = $exist->fetch();
	$nbUses = intval($nbUse['nb']);
	if ($nbUses == 1) {
		$_SESSION['login'] = true;
		header("location:Vue/accueil.php");
	}else{
		header("location:index.php");
	}
 ?>	