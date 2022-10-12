<?php 
	$idP = $_GET['id'];
	$bdd = new PDO("mysql:host=localhost;dbname=cms","root","");
	$res = $bdd->query("DELETE FROM depart WHERE idDepart = '$idP' ");
	header("location:depart.php");
?>

