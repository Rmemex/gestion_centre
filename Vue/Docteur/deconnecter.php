<?php
include("../../Modele/Connexion/connexion.php");
session_start();
	if (isset($_GET['decon'])) {
		$_SESSION['dlogin']=="";
		date_default_timezone_set('Africa/Nairobi');
		$ldate=date( 'd-m-Y H:i:s ', time () );
		$statut = 0;
		$bdd = new PDO("mysql:host=localhost;dbname=cms","root","");
		$exist = $bdd->query("UPDATE userlog  SET logout = '$ldate', statut = '$statut' WHERE idU = '".$_SESSION['id']."' ORDER BY id DESC LIMIT 1");
		session_unset();
		session_destroy();
		header("location:../../index.php");
	}
?>