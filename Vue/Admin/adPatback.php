<?php
	include("../../Controle/controlPatient.php");

	     $Pat = new ControlPatient();
	
		$im = $_POST['im'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$sexe = $_POST['sexe'];
		$birth = $_POST['birth'];
		$num = $_POST['num'];
		$adresse = $_POST['adresse'];

		echo $im.'<br>';
		echo $nom.'<br>';
		echo $prenom.'<br>'; 
		echo $sexe.'<br>';
		echo $birth.'<br>';
		echo $num.'<br>';
		echo $adresse.'<br>';
	
	$Pat->inscrire($im,$nom, $prenom, $sexe, $birth, $num, $adresse);
	
	header("location:showPat.php");
?>