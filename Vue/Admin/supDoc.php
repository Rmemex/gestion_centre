<?php 
	$idP = $_GET['id'];
	$bdd = new PDO("mysql:host=localhost;dbname=cms","root","");
	$res = $bdd->query("DELETE FROM personnel WHERE idPerso = '$idP' ");
	header("location:showDoc.php");
?>

