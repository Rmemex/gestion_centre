<?php 
	$idP = $_GET['id'];
	$bdd = new PDO("mysql:host=localhost;dbname=cms","root","");
	$res = $bdd->query("DELETE FROM attribut WHERE idAttrib = '$idP' ");
	header("location:attrib.php");
?>

