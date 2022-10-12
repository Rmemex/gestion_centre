<?php 
	$id = $_GET['id'];
	echo "$id";
	$bdd = new PDO("mysql:host=localhost;dbname=cms","root","");
	$req = $bdd->query("UPDATE rdv  SET statut = '1' WHERE idRdv = '$id' ");
	header("location:showRdv.php");
?>