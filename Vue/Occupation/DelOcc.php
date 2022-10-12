<?php 
	include("../../Controle/ControlOccupation.php");
	$Occ = new ControlOccupation();
	$Occ->supprimer($_GET['id']);
	header("location:occupation.php");
 ?>