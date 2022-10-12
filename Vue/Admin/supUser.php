<?php 
	include("../../Controle/controlUser.php");
		$User = new ControlUser();
		$User->supprimer($_GET['id']);
	header("location:showUser.php");
?>

