<?php 
	include("../../Controle/ControlPatient.php");
	$Pat = new ControlPatient();
	$Pat->supprimer($_GET['id']);
	header("location:showPat.php");
 ?>