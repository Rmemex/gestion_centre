<?php
	include("../../Controle/controlPersonnel.php");

	     $Pers = new ControlPers();
	
		$im = $_POST['im'];
		$occup = $_POST['spec'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$contact = $_POST['num'];
		$adresse = $_POST['adresse'];

		echo $im.'<br>';
		echo $occup.'<br>';
		echo $nom.'<br>';
		echo $prenom.'<br>';
		echo $contact.'<br>';
		echo $adresse.'<br>';
	
	$Pers->inscrire($im,$nom, $prenom, $contact, $adresse,$occup);
	
	header("location:showDoc.php");
?>